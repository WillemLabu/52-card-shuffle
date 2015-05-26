<?php

include "../includes/functions.php";

$cards = [
    'c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7', 'c8', 'c9', 'c10', 'c11', 'c12', 'c13',
    'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'h7', 'h8', 'h9', 'h10', 'h11', 'h12', 'h13',
    'd1', 'd2', 'd3', 'd4', 'd5', 'd6', 'd7', 'd8', 'd9', 'd10', 'd11', 'd12', 'd13',
    's1', 's2', 's3', 's4', 's5', 's6', 's7', 's8', 's9', 's10', 's11', 's12', 's13'
];

// Get the id if it exists.
$id = isset($_GET['id']) ? $_GET['id'] : false;

if (!$id) {

    $resp = new Response();

    $resp->code = 404;
    $resp->status = "error";
    $resp->body = "Please supply a valid ID.";

    die (json_encode($resp));

}

// Create some SQL to check if guid is there
$sql = "SELECT * FROM decks WHERE guid = :id";

// Let's connect to the database
$db = dbConnect();

// Then, prepare the statement to run..
$statement = $db->prepare($sql);

// execute the prepared statement
$statement->execute(array(':id' => $id));

// Go get the data.

// This returns an array of all rows that match
//  even if only one row does.
// $data = $statement->fetchAll(PDO::FETCH_ASSOC);

// This returns a proper 1 level array
$data = $statement->fetch(PDO::FETCH_ASSOC);

// Close the connection!
$db = $statement = null;

if (!$data) {

    $resp = new Response();

    $resp->code = 404;
    $resp->status = "error";
    $resp->body = "That is not a valid Guid ID.";

    die (json_encode($resp));

}

//echo '<pre>', print_r($cards) , '</pre>';
// Shuffle the deck
shuffle($cards);
// echo '<pre>', print_r($cards) , '</pre>';
// Here, at least, we have some form of an ID

// Create some SQL
$sql = "UPDATE decks SET deck = :newDeck WHERE guid = :guid";
//echo '<br>'.$sql;

// Let's connect to the database
$db = dbConnect();

// Then, prepare the statement to run..
$statement = $db->prepare($sql);

// execute the prepared statement
$hasupdated = $statement->execute(array(
    ':guid' => $id,
    ':newDeck' => implode(',', $cards)
));

if ($hasupdated == FALSE ) {

    $resp = new Response();

    $resp->code = 404;
    $resp->status = "error";
    $resp->body = "NO UPDATE WAS MADE";

    die (json_encode($resp));

} else {


    $resp = new Response();

    $resp->code = 200;
    $resp->status = "success";
    $resp->body = "The new deck has been updated";

    die (json_encode($resp));

}

