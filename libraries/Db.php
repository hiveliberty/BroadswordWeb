<?php

function insertUser($db, $user, $pass, $dbName, $eveName, $characterID, $corporationID, $allianceID, $discordID, $pending)
{

    $conn = new mysqli($db, $user, $pass, $dbName);

    $sql = "REPLACE INTO authUsers (eveName, characterID, corporationID, allianceID, discordID, pending) VALUES ('$eveName','$characterID','$corporationID','$allianceID','$discordID','$pending')";

    if ($conn->query($sql) === TRUE) {
        return null;
    } else {
        return null;
    }
}

function insertToken($db, $user, $pass, $dbName, $characterID, $accessToken, $refreshToken, $updatedOn)
{

    $conn = new mysqli($db, $user, $pass, $dbName);

    $sql = "REPLACE INTO tokenStorage (characterID, accessToken, refreshToken, updatedOn) VALUES ('$characterID','$accessToken','$refreshToken', '$updatedOn')";

    if ($conn->query($sql) === TRUE) {
        return null;
    } else {
        return null;
    }
}
