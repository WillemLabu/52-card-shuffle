<?php

include "../includes/functions.php";

if (isset($_GET['id'])) {


    $id = $_GET['id'];

    $sql = "SELECT * FROM decks WHERE guid = '$id'";
    // Let's connect to the database
    $db = dbConnect();
    // Then, prepare the statement to run..
    $statement = $db->prepare($sql);
    // execute the prepared statement
    $statement->execute();
    // Go get the data.
    $data = $statement->fetchall(PDO::FETCH_ASSOC);
    // echo '<pre>', print_r($data) ,'</pre>';
    // Close the connection!
    $db = $statement = null;

    // Make the deck from string into array to shuffle again
    $deck = explode(',', $data[0]['deck']);
    shuffle($deck);
    echo '<pre>', print_r($deck), '</pre>';


}