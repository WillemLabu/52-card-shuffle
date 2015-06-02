<?php

//echo 'test';
//echo '<pre>' , print_r($_POST)  , '<pre>';

switch ($_POST['option']) {
    case "shuffle":

        header('Location: ../../view_shuffle.php?id=' . $_POST['guid'] );

        break;
    case "deck":

        header('Location: ../../view_deck.php?id=' . $_POST['guid'] );

        break;
    case "delete":

        header('Location: ../../view_delete.php?id=' . $_POST['guid'] );

        break;
    default:

        echo "Your favorite color is neither red, blue, or green!";

}



?>