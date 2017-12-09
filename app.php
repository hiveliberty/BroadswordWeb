<?php

define("BASEDIR", __DIR__);
ini_set("display_errors", 1);
error_reporting(E_ALL);
//phpinfo();
require_once(BASEDIR . "/config/config.php");
require_once(BASEDIR . "/vendor/autoload.php");

$app = new \Slim\Slim($config["slim"]);
$app->add(new \Zeuxisoo\Whoops\Provider\Slim\WhoopsMiddleware());
$app->view(new \Slim\Views\Twig());

// Load libraries
foreach(glob(BASEDIR . "/libraries/*.php") as $lib)
    require_once($lib);

session_start();

// Routes
$app->get("/", function() use ($app, $config) {
	$discordState = uniqid();
	$app->render("index.twig", array("discordURL" => "https://discordapp.com/api/oauth2/authorize?client_id=" . $config["discord"]["clientID"] . "&redirect_uri=" . $config['discord']['callbackURL'] . "&response_type=code" . "&scope=identify guilds.join" . "&state=" . $discordState));
});

$app->get("/auth-evesso/", function() use ($app, $config) {
    $code = $app->request->get("code");
    //$state = $app->request->get("state");
	//$discordID = $app->request->get("state");
	$discordID = $_SESSION['discordID'];

    $tokenURL = "https://login.eveonline.com/oauth/token";
    $base64 = base64_encode($config["sso"]["clientID"] . ":" . $config["sso"]["secretKey"]);

    $data = json_decode(sendData($tokenURL, array(
        "grant_type" => "authorization_code",
        "code" => $code
    ), array("Authorization: Basic {$base64}")));

    $accessToken = $data->access_token;


    // Verify Token
    $verifyURL = "https://login.eveonline.com/oauth/verify";
    $data = json_decode(sendData($verifyURL, array(), array("Authorization: Bearer {$accessToken}")));

    $characterID = $data->CharacterID;
    $characterData = json_decode(json_encode(new SimpleXMLElement(getData("https://api.eveonline.com/eve/CharacterInfo.xml.aspx?characterID={$characterID}"))));
    $corporationID = $characterData->result->corporationID;
    if (!isset($characterData->result->allianceID)) { $allianceID = 1; } else { $allianceID = $characterData->result->allianceID; }

    $inviteLink = $config["discord"]["inviteLink"];

    // Generate an auth string
    //$authString = uniqid();
	
	// Set active to yes
	$active = '1';

	//insertUser($config["db"]["url"], $config["db"]["user"], $config["db"]["pass"], $config["db"]["dbname"], $characterID, $corporationID, $allianceID, $authString, $active);
	
	insertUser2($config["db"]["url"], $config["db"]["user"], $config["db"]["pass"], $config["db"]["dbname"], $characterID, $corporationID, $allianceID, $discordID, $active);
	
	unset($_SESSION['discordID']);
	
    $app->render("authed.twig");
});

$app->get("/auth-discord/", function() use ($app, $config) {
	$code = $app->request->get("code");
	
	$discordProvider = new \Discord\OAuth\Discord([
		'clientId' => $config["discord"]["clientID"],
		'clientSecret' => $config["discord"]["secretKey"],
		'redirectUri' => $config["discord"]["callbackURL"]
	]);
	
	$token = $discordProvider->getAccessToken('authorization_code', [
		'code' => $code,
	]);

	// Get the user object.
	$user = $discordProvider->getResourceOwner($token);

	// Get the id.
	$discordID = $user->id;
	$_SESSION['discordID'] = $discordID;

	// Accept an invite
	$invite = $user->acceptInvite($config["discord"]["inviteLink"]);

    $app->render("evesso.twig", array("crestURL" => "https://login.eveonline.com/oauth/authorize?response_type=code&redirect_uri=" . $config['sso']['callbackURL'] . "&client_id=" . $config['sso']['clientID'] . "&scope=publicData" . "&state=" . $discordID, "discordID" => $discordID));
});

$app->run();

/**
 * Var_dumps and dies, quicker than var_dump($input); die();
 *
 * @param $input
 */
function dd($input)
{
    var_dump($input);
    die();
}
