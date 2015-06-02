<?php



// Our array of all the cards.
$cards = [
    'c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7', 'c8', 'c9', 'c10', 'c11', 'c12', 'c13',
    'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'h7', 'h8', 'h9', 'h10', 'h11', 'h12', 'h13',
    'd1', 'd2', 'd3', 'd4', 'd5', 'd6', 'd7', 'd8', 'd9', 'd10', 'd11', 'd12', 'd13',
    's1', 's2', 's3', 's4', 's5', 's6', 's7', 's8', 's9', 's10', 's11', 's12', 's13'
];


If (!isset($_GET['id'])) {

    // Shuffle the deck
    shuffle($cards);

    $str_cards = implode(',', $cards);

    // Create a new GUID
    $guid = GUID();

    ?>
    <div class="container">
        <table class="table table-hover table-condensed table-striped ">
            <th>
                New Guide

            </th>
            <th>
                New Card Deck
            </th>
            <tr>
                <td><?php echo $guid; ?></td>
                <td><?php echo $str_cards; ?></td>
            </tr>
        </table>
        <hr>
    </div>

    <?php
    // Insert the values into the db
    $db = dbConnect();

    $sql = "INSERT INTO decks (guid, deck)
                         VALUES      (:guid,:deck)";

    $statement = $db->prepare($sql);

    // And populate the placeholder(s)
    $statement->execute(
        array(
            ':guid' => $guid,
            ':deck' => implode(',', $cards)
        )
    );
    // Close the connection!
    $db = $statement = null;


    ////// Return all the entries in the database and display them in a table
    // Create some SQL to check if guid is there
    $sql = "SELECT * FROM decks ";

    // Let's connect to the database
    $db = dbConnect();

    // Then, prepare the statement to run..
    $statement = $db->prepare($sql);

    // execute the prepared statement
    $statement->execute();

    // Go get the data.

    // This returns an array of all rows that match
    //  even if only one row does.
    // $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    // This returns a proper 1 level array
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Close the connection!
    $db = $statement = null;

    // echo '<pre>' , print_r($data) , '</pre>';
    ?>
    <div class="container">
        <table id="example" class="table table-striped table-bordered table table-hover">
                    <th>Stored Guide</th>
                    <th>Stored Card Deck</th>
        <?php
        foreach ($data as $item) {
            echo ' <tr>
                                <td>
                                    ' . $item['guid'] . '
                                </td>
                                <td>
                                    ' . $item['deck'] . '
                                </td>
                          </tr>
                    ';
        }
        ?>
        </table>

        <form action="api/includes/form.php" method="post" role="form">

            <div class="form-group col-xs-4">
                <label for="usr">Enter Guid ID:</label>
                <input type="text" class="form-control" id="usr" name="guid">
            </div>
            <div class="form-group col-xs-4">
                <label for="sel1">Select Action:</label>
                <select class="form-control" id="sel1" name="option">
                    <option value="shuffle">Shuffle</option>
                    <option value="deck">Show Deck</option>
                    <option value="delete">Delete</option>
                </select><br>
            </div>
            <div class="form-group col-xs-4" style="padding-top: 2%;  ">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </form>

    </div>

    <?php
    /*   // Nice response
       $response = new Response();

       // Create an object holding everything
       $body = (object)array(
           'id' => $guid,
           'deck' => $cards
       );


       $response->code = 200;
       $response->status = "success";
       $response->body = $body;*/


    // header("Content-Type: application/json");
    // echo json_encode($response);

} elseif (isset($_GET['id'])) {

    $id = $_GET['id'];

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

        echo '<div class="container">
                    <h3 class="bg-danger">Incorrect ID provided! </h3>
                 </div>
            ';
    }

    $deck = explode(',', $data['deck']);
    shuffle($deck);

    $sql = "UPDATE decks SET deck = :newDeck WHERE guid = :guid";
    //echo '<br>'.$sql;

    // Let's connect to the database
    $db = dbConnect();

    // Then, prepare the statement to run..
    $statement = $db->prepare($sql);

    // execute the prepared statement
    $hasupdated = $statement->execute(array(
        ':guid' => $id,
        ':newDeck' => implode(',', $deck)
    ));

    if ($hasupdated == FALSE) {

        echo '<div class="container">
                    <h3 class="bg-danger">Database could not be updated </h3>
                 </div>
            ';

    } else {
        $str_cards = implode(',', $deck);
        echo '
                <div class="container">
                    <table class="table table-hover table-striped ">
                        <th>Stored Guide</th>
                        <th>New Deck</th>
                        <tr>
                            <td>'. $_GET['id']  .'</td>
                            <td>'. $str_cards  . '</td>
                        </tr>
                    </table>
                </div>
        ';
    }

}






/// footer
?>
