
<?php
include 'db_config.php';
$id = $_GET['id'];
$sql = "SELECT * FROM medical_records WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE medical_records SET patient_id='{$_POST["patient_id"]}', doctor_id='{$_POST["doctor_id"]}', date='{$_POST["date"]}', notes='{$_POST["notes"]}' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: medical_records.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<h2>Edit Medical_record</h2>
<form method="post">
patient_id: <input type='text' name='patient_id' value='<?php echo $row["patient_id"]; ?>' required><br>doctor_id: <input type='text' name='doctor_id' value='<?php echo $row["doctor_id"]; ?>' required><br>date: <input type='text' name='date' value='<?php echo $row["date"]; ?>' required><br>notes: <input type='text' name='notes' value='<?php echo $row["notes"]; ?>' required><br>
<input type="submit" value="Update">
</form>
