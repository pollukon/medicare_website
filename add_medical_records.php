<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = intval($_POST["user_id"]);
    $doctor_name = $conn->real_escape_string($_POST["doctor_name"]);
    $description = $conn->real_escape_string($_POST["description"]);
    $record_date = date("Y-m-d H:i:s");

    $sql = "INSERT INTO medical_records (user_id, doctor_name, description, record_date)
            VALUES ($user_id, '$doctor_name', '$description', '$record_date')";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        http_response_code(500);
        echo "Error: " . $conn->error;
    }
}
?>
