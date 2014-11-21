<?php

//define db variables
$dbname = "randd_data";
$dbuser = "db_user";
$dbpass = "db_password";

//init connection
function create_db_connection($dbname, $dbuser, $dbpass) {
    return new PDO('mysql:host=localhost;dbname=' . $dbname . ';charset=utf8', $dbuser, $dbpass);
}

//query all users
function fetch_all_users($db) {
    $stmt = $db->query("SELECT * FROM users");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//convert to json to return to index.html for ease of use
function convert_to_json($data) {
    var_export($data);
}

//to start with dump out users
convert_to_json(
    fetch_all_users(
        create_db_connection($dbname, $dbuser, $dbpass)
    )
);