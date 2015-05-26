<?php
include "../includes/functions.php";

// sql to delete a record
$sql = "DELETE FROM decks WHERE guid=";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

