<?php
include 'db_config.php';
$result = $conn->query("SELECT * FROM medical_records ORDER BY record_date DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Medical Records</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f8f9fa;
    }
    .container { padding: 40px; }
    table {
      width: 100%;
      border-collapse: collapse;
      background: #ffffff;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 12px 16px;
      border-bottom: 1px solid #e5e7eb;
      text-align: left;
    }
    th {
      background-color: #f1f5f9;
      color: #334155;
    }
    tr:hover {
      background-color: #f9fafb;
    }
    h1 {
      color: #0f172a;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Medical Records</h1>
    <table>
      <thead>
        <tr>
          <th>User ID</th>
          <th>Doctor</th>
          <th>Description</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row["user_id"]) ?></td>
          <td><?= htmlspecialchars($row["doctor_name"]) ?></td>
          <td><?= htmlspecialchars($row["description"]) ?></td>
          <td><?= htmlspecialchars($row["record_date"]) ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
