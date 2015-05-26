<?php

    include "../includes/functions.php";

    // Get the id if it exists.
    $id = isset($_GET['id']) ? $_GET['id'] : false;

    // Handle the case that the user did not
    //  supply an ID at all.
    if (!$id) {

        $resp = new Response();

        $resp->code = 404;
        $resp->status = "error";
        $resp->body = "Please supply a valid ID.";

        die (json_encode($resp));

    }

    // Here, at least, we have some form of an ID

    // Create some SQL
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


    // Let's see if anything was returned.
    if (!$data) {

        $resp = new Response();

        $resp->code = 404;
        $resp->status = "error";
        $resp->body = "NO deck was found with that ID.";

        die (json_encode($resp));

    }


    // Here we actually have a proper ID! YAY :{D


    // Re-array-ify the deck we saved as a string
    $deck = explode(',', $data['deck']);

    // Nice response
    $response = new Response();

    // Create an object holding everything
    $body = (object)array(
        'id' => $id,
        'deck' => $deck
    );

    $response->code = 200;
    $response->status = "success";
    $response->body = $body;

    header("Content-Type: application/json");
    echo json_encode($response);

