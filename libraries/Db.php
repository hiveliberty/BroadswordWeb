<?php

function insertUser($db, $user, $pass, $dbName, $characterID, $corporationID, $allianceID, $authString, $active)
{

    $conn = new mysqli($db, $user, $pass, $dbName);

    $sql = "INSERT INTO pendingUsers (characterID, corporationID, allianceID, authString, active) VALUES ('$characterID','$corporationID','$allianceID','$authString','$active')";

    if ($conn->query($sql) === TRUE) {
        return null;
    } else {
        return null;
    }
}

function insertUser2($db, $user, $pass, $dbName, $characterID, $corporationID, $allianceID, $discordID, $active)
{

    $conn = new mysqli($db, $user, $pass, $dbName);

    $sql = "INSERT INTO doAuthorize (characterID, corporationID, allianceID, discordID, active) VALUES ('$characterID','$corporationID','$allianceID','$discordID','$active')";

    if ($conn->query($sql) === TRUE) {
        return null;
    } else {
        return null;
    }
}