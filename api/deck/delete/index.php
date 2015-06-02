<?php 




// Get the id if it exists.
$id = isset($_GET['id']) ? $_GET['id'] : false;

// if ID IS NOT FOUND

	if (!$id) {

        echo '<div class="container">
                    <h3 class="bg-danger">Incorrect ID provided! </h3>
                 </div>
            ';

    }
 
    //connect
    $db = dbConnect();

    // wrong ID or real id compare to the SQL DATABASE!!!
	$sql = "SELECT * FROM decks WHERE guid = :id";

	// Then, prepare the statement to run..
    $statement = $db->prepare($sql);


	// execute the prepared statement REPLACE PLACEHOLDER :id with $id
    $statement->execute(array(':id' => $id));

        // This returns an array of all rows that match
    //  even if only one row does.
    // $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    // DATA BEING MADE RIGHT HERE!!! WITH DATA FROM DATABASE
    //This returns a proper 1 level array
    $data = $statement->fetch(PDO::FETCH_ASSOC); 

    // Close the connection! Becasue we dont need the database we took all we needed.
    $db = $statement = null;

    // IF THERE IS NO DATA(!$data) WITH THAT ID!

    if (!$data) {

        echo '<div class="container">
                    <h3 class="bg-danger">No Item fopund with that ID! </h3>
                 </div>
            ';
    }


    // here we have a proper id

    //connect
    $db = dbConnect();


	$sql = "DELETE FROM decks WHERE guid = :id";

	// Then, prepare the statement to run..
    $statement = $db->prepare($sql);


	// execute the prepared statement REPLACE PLACEHOLDER :id with $id
    $statement->execute(array(':id' => $id));

echo '<div class="container">
                    <h3 class="bg-success">The deck has now been deleted successfully  </h3>
                 </div>
            ';




	/*	$resp = new Response();
        $resp->code = 200;
        $resp->status = "SUCCESS";
        $resp->body = "DECK WAS DELETED WITH SUCCESS!";

        $db = $statement = null;

        echo json_encode($response);
	*/


?>