<?php

	include "../includes/functions.php";

	// Our array of all the cards.
	$cards = [
		'c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7', 'c8', 'c9', 'c10', 'c11', 'c12', 'c13',
		'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'h7', 'h8', 'h9', 'h10', 'h11', 'h12', 'h13',
		'd1', 'd2', 'd3', 'd4', 'd5', 'd6', 'd7', 'd8', 'd9', 'd10', 'd11', 'd12', 'd13',
		's1', 's2', 's3', 's4', 's5', 's6', 's7', 's8', 's9', 's10', 's11', 's12', 's13'
	];

If (!isset($_GET['guid'])) {

    // Shuffle the deck
    shuffle($cards);

    // Create a new GUID
    $guid = GUID();

    // Insert the values into the db
    $db = dbConnect();

    $sql = "INSERT INTO decks (guid, deck)
				 VALUES      (:guid,:deck)";

    $statement = $db->prepare($sql);

    // And populate the placeholder(s)
    $statement->execute(
        array(
            ':guid' => $guid,
            ':deck' => implode(',' , $cards)
        )
    );

    // Close the connection!
    $db = $statement = null;


    // Nice response
    $response = new Response();

    // Create an object holding everything
    $body = (object) array(
        'id'   => $guid,
        'deck' => $cards
    );


    $response->code = 200;
    $response->status = "success";
    $response->body = $body;


    header("Content-Type: application/json");
    echo json_encode($response);


} elseif (isset($_GET['guid'])) {

    $guid = $_GET['guid'];

    echo $guid;

    // Insert the values into the db
    $db = dbConnect();

   /// prepare the select option
    $sql = 'SELECT name, guid, deck
             FROM decks
             WHERE guid = :guid';

    $statement = $db->prepare($sql);

    $statement->execute(array ('guid' => $guid));

    $statement->fetchAll();


    echo '<pre>' ,  print_r($statement)   , '</pre>';





}



/// append the url to and fetch the array in the same id

# http://localhost/php-class/52-card-shuffle/api/shuffle/ test
