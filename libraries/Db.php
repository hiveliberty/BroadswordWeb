<?php

function insertUser($db, $user, $pass, $dbName, $eveName, $characterID, $corporationID, $allianceID, $discordID, $pending)
{

    $conn = new mysqli($db, $user, $pass, $dbName);

    $sql = "REPLACE INTO `discord_users_auth` (eve_name, character_id, corporation_id, alliance_id, discord_id, pending) VALUES ('$eveName','$characterID','$corporationID','$allianceID','$discordID','$pending')";

    if ($conn->query($sql) === TRUE) {
        return null;
    } else {
        return null;
    }
}

function insertToken($db, $user, $pass, $dbName, $characterID, $accessToken, $refreshToken, $updatedOn)
{

    $conn = new mysqli($db, $user, $pass, $dbName);

    $sql = "REPLACE INTO `token_storage` (character_id, token_access, token_refresh, updated) VALUES ('$characterID','$accessToken','$refreshToken', '$updatedOn')";

    if ($conn->query($sql) === TRUE) {
        return null;
    } else {
        return null;
    }
}
