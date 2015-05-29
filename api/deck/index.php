<?php


    // Get the id if it exists.
    $id = isset($_GET['id']) ? $_GET['id'] : false;

    // Handle the case that the user did not
    //  supply an ID at all.
    if (!$id) {

        echo '<div class="container">
                    <h3 class="bg-danger">Please supply an ID! </h3>
                 </div>
            ';

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

        echo '<div class="container">
                    <h3 class="bg-danger">No Deck was found with that ID! </h3>
                 </div>
            ';

    }


    // Here we actually have a proper ID! YAY :{D


    // Re-array-ify the deck we saved as a string
    $guid = $data['guid'];
    $card = $data['deck'];

?>
<div class="container">
    <table id="example" class="table table-striped table-bordered table table-hover">
        <th>Matched Guide</th>
        <th>Matced Card Deck</th>
        <tr>
            <td><?php echo $guid; ?></td>
            <td><?php echo $card; ?></td>
        </tr>
    </table>
</div>


