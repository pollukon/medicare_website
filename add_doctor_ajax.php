
<?php
include 'db_config.php';

if (isset($_POST['name'], $_POST['specialization'], $_POST['availability'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $specialization = $conn->real_escape_string($_POST['specialization']);
    $availability = $conn->real_escape_string($_POST['availability']);

    $conn->query("INSERT INTO doctors (name, specialization, availability) VALUES ('$name', '$specialization', '$availability')");
}

$result = $conn->query("SELECT * FROM doctors");
while($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>".htmlspecialchars($row['name'])."</td>
        <td>".htmlspecialchars($row['specialization'])."</td>
        <td>".htmlspecialchars($row['availability'])."</td>
        <td>
            <button class='edit-btn' data-id='{$row['id']}'>Edit</button>
            <button class='delete-btn' data-id='{$row['id']}'>Delete</button>
        </td>
    </tr>";
}
?>
