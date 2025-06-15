<?php
include 'db_config.php';
$sql = "SELECT * FROM medical_records";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Manage Medical Records</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f8f9fa;
    }
    .container {
      display: flex;
    }
    .main {
      flex: 1;
      padding: 30px;
    }
    .form-section {
      background: #ffffff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      margin-bottom: 20px;
      max-width: 600px;
    }
    .form-section h2 {
      color: #0f766e;
      font-size: 22px;
      margin-bottom: 16px;
    }
    .form-section label {
      display: block;
      font-weight: 600;
      margin-bottom: 6px;
      color: #334155;
    }
    .form-section input[type="text"],
    .form-section input[type="date"],
    .form-section select,
    .form-section textarea {
      width: 100%;
      padding: 10px 14px;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      font-size: 14px;
      margin-bottom: 12px;
      font-family: 'Segoe UI', sans-serif;
    }
    .form-section button,
    .form-section input[type="submit"] {
      background-color: #0f766e;
      color: white;
      border: none;
      padding: 10px 18px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
      transition: background-color 0.3s ease;
    }
    .form-section button:hover,
    .form-section input[type="submit"]:hover {
      background-color: #115e59;
    }
    .styled-table {
      border-collapse: collapse;
      margin-top: 20px;
      font-size: 14px;
      min-width: 600px;
      border-radius: 12px 12px 0 0;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .styled-table thead tr {
      background-color: #0f766e;
      color: #ffffff;
      text-align: left;
      font-weight: bold;
    }
    .styled-table th, .styled-table td {
      padding: 12px 15px;
      border-bottom: 1px solid #e2e8f0;
    }
    .styled-table tbody tr:nth-of-type(even) {
      background-color: #f8fafc;
    }
    .styled-table tbody tr:hover {
      background-color: #f1f5f9;
    }
    .styled-table a {
      color: #0f766e;
      text-decoration: none;
      font-weight: 600;
    }
    .styled-table a:hover {
      text-decoration: underline;
    }
    .soft-btn {
      background-color: #0f766e;
      color: white;
      border: none;
      padding: 8px 14px;
      border-radius: 8px;
      font-size: 14px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      display: inline-block;
      text-decoration: none;
    }
    .soft-btn:hover {
      background-color: #115e59;
    }
  </style>
</head>
<body>
  <div class="container">
    <main class="main">
      
<h2>Manage Medical Records</h2>
<div class="form-section">
    <form method="post" action="add_medical_records.php">
        <label for="doctor">Doctor</label>
        <select name="doctor_id" id="doctor">
            <!-- Dynamically fill this with PHP if needed -->
            <option value="">-- Select Doctor --</option>
        </select>

        <label for="date">Date</label>
        <input type="date" name="date" id="date" required>

        <label for="notes">Notes</label>
        <textarea name="notes" id="notes" rows="4"></textarea>

        <input type="submit" value="Add Record">
    </form>
</div>

<h2>Existing Medical Records</h2>
<table class="styled-table">
    <thead>
        <tr>
            <th>Patient Name</th>
            <th>Doctor Name</th>
            <th>Date</th>
            <th>Notes</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <!-- Example row -->
        <tr>
            <td>Example Patient</td>
            <td>Example Doctor</td>
            <td>2025-06-08</td>
            <td>Some notes here</td>
            <td>
                <a href="records.php?id=1">Edit</a> |
                <a href="records.php?id=1">Delete</a>
            </td>
        </tr>
    </tbody>
</table>

    </main>
  </div>
</body>
</html>
