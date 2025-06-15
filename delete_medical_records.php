
<?php
include 'db_config.php';
$id = $_GET['id'];
$sql = "DELETE FROM medical_records WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header("Location: medical_records.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
