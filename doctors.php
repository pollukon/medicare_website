<?php
session_start();
include 'db_config.php';

header("Access-Control-Allow-Origin: *");

if (
    isset($_SERVER['HTTP_ACCEPT']) &&
    strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false
) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    $result = $conn->query("SELECT id, name FROM doctors");
    $doctors = [];
    while ($row = $result->fetch_assoc()) {
        $doctors[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($doctors);
    exit;
}
?>
<!-- fallback: normal HTML page if not AJAX -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Doctor Directory</title>
  <!-- original styling and body kept below -->

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Patient Dashboard</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f8f9fa;
    }

    .container {
      display: flex;
    }

    .sidebar {
      width: 250px;
      background-color: #ffffff;
      border-right: 1px solid #e2e8f0;
      padding: 24px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .sidebar .logo {
      font-size: 20px;
      font-weight: 700;
      color: #0f766e;
      margin-bottom: 24px;
    }

    .sidebar .profile {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 32px;
    }

    .sidebar .profile-initials {
      background-color: #cbd5e1;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      color: #1e293b;
    }

    .sidebar nav a {
      display: flex;
      align-items: center;
      gap: 12px;
      text-decoration: none;
      color: #334155;
      padding: 10px 14px;
      border-radius: 8px;
      margin-bottom: 6px;
      font-weight: 500;
      transition: background 0.2s ease;
    }

    .sidebar nav a.active, .sidebar nav a:hover {
      background-color: #e0f2fe;
      color: #0284c7;
    }

    .sidebar .logout {
      color: #ef4444;
      font-weight: 600;
      text-decoration: none;
      padding: 10px 14px;
      border-radius: 8px;
      transition: background 0.2s ease;
    }

    .sidebar .logout:hover {
      background-color: #fee2e2;
    }


    .main {
      flex: 1;
      padding: 30px;
    }

    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .topbar h1 {
      font-size: 26px;
      color: #0f172a;
    }

    .topbar button {
      background-color: #0f766e;
      color: white;
      border: none;
      padding: 10px 16px;
      border-radius: 8px;
      cursor: pointer;
    }

    .cards {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 20px;
    }

    .card {
      flex: 1 1 200px;
      background: white;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .card h3 {
      font-size: 14px;
      color: #64748b;
    }

    .card p {
      font-size: 24px;
      font-weight: bold;
      margin-top: 5px;
    }

    .appointment, .notifications {
      margin-top: 30px;
      background: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .appointment h2,
    .notifications h2 {
      font-size: 20px;
      margin-bottom: 20px;
    }

    .appointment .item,
    .notifications .item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
    }

    .soft-btn {
      background-color: #e2e8f0;
      border: none;
      padding: 8px 14px;
      border-radius: 8px;
      font-size: 14px;
      margin-right: 10px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .soft-btn:hover {
      background-color: #cbd5e1;
    }

    .soft-btn.primary {
      background-color: #0f766e;
      color: white;
    }

    .soft-btn.primary:hover {
      background-color: #0d5f57;
    }

    .notification-bubble {
      background-color: red;
      color: white;
      border-radius: 50%;
      padding: 2px 6px;
      font-size: 12px;
      margin-left: 6px;
    }
  </style>
</head>

<main>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Doctor Directory</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f8f9fa;
    }

    .container {
      display: flex;
    }

    .sidebar {
      width: 250px;
      background-color: #ffffff;
      border-right: 1px solid #e2e8f0;
      padding: 24px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .sidebar .logo {
      font-size: 20px;
      font-weight: 700;
      color: #0f766e;
      margin-bottom: 24px;
    }

    .sidebar .profile {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 32px;
    }

    .sidebar .profile-initials {
      background-color: #cbd5e1;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      color: #1e293b;
    }

    .sidebar nav a {
      display: flex;
      align-items: center;
      gap: 12px;
      text-decoration: none;
      color: #334155;
      padding: 10px 14px;
      border-radius: 8px;
      margin-bottom: 6px;
      font-weight: 500;
      transition: background 0.2s ease;
    }

    .sidebar nav a.active, .sidebar nav a:hover {
      background-color: #e0f2fe;
      color: #0284c7;
    }

    .sidebar .logout {
      color: #ef4444;
      font-weight: 600;
      text-decoration: none;
      padding: 10px 14px;
      border-radius: 8px;
      transition: background 0.2s ease;
    }

    .sidebar .logout:hover {
      background-color: #fee2e2;
    }


    .main {
      flex: 1;
      padding: 30px;
    }

    .main h1 {
      font-size: 26px;
      color: #0f172a;
    }

    .search-bar {
      display: flex;
      gap: 10px;
      margin: 20px 0;
      flex-wrap: wrap;
    }

    .search-bar input, .search-bar select, .search-bar button {
      padding: 10px 14px;
      border-radius: 8px;
      border: 1px solid #cbd5e1;
      background: white;
      font-size: 14px;
      cursor: pointer;
    }

    .tags {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 20px;
    }

    .tags button {
      padding: 8px 16px;
      border-radius: 20px;
      border: none;
      background-color: #e2e8f0;
      cursor: pointer;
    }

    .tags button.active {
      background-color: #0f766e;
      color: white;
    }

    .doctor-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 20px;
    }

    .card {
      background: white;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .initials {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .green-bg { background-color: #99f6e4; color: #065f46; }
    .blue-bg { background-color: #dbeafe; color: #1e40af; }

    .card h3 {
      margin: 5px 0;
      font-size: 18px;
    }

    .card .stars {
      color: #facc15;
      font-size: 14px;
      margin-bottom: 8px;
    }

    .info {
      font-size: 14px;
      color: #475569;
      margin-bottom: 5px;
    }

    .actions button {
      padding: 8px 14px;
      border-radius: 6px;
      border: none;
      margin-right: 10px;
      font-size: 14px;
      cursor: pointer;
    }

    .view-btn {
      background-color: #e2e8f0;
    }

    .book-btn {
      background-color: #0f766e;
      color: white;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="sidebar">
    <div>
      <div class="logo">MediCare</div>
      <div class="profile">
        <div class="profile-initials">JD</div>
        <div>
          <div><strong>John Doe</strong></div>
          <div style="font-size: 12px; color: #64748b;">Patient ID: P-12345</div>
        </div>
      </div>
      <nav>
        <a href="dashboard.html">Dashboard</a>
        <a href="doctors.php">Doctors</a>
        <a href="records.php">Medical Records</a>
        <a href="settings.html">Settings</a>
      </nav>
    </div>
    <a class="logout" href="#">Log out</a>
  </div>

  <div class="main">
    <h1>Doctor Directory</h1>

    <!-- Search and Filters -->
    <div class="search-bar">
      <input type="text" id="searchInput" placeholder="Search by name or specialty" oninput="applyFilters()">
      <select id="availabilityFilter" onchange="applyFilters()">
        <option value="All">All Availability</option>
        <option value="Today">Today</option>
        <option value="Tomorrow">Tomorrow</option>
      </select>
      <select id="sortFilter" onchange="applyFilters()">
        <option value="default">Sort By</option>
        <option value="rating">Rating (High → Low)</option>
      </select>
    </div>

    <!-- Department Tags -->
    <div class="tags" id="departmentTags">
      <button class="active" onclick="selectDepartment(this, 'All')">All Departments</button>
      <button onclick="selectDepartment(this, 'Cardiology')">Cardiology</button>
      <button onclick="selectDepartment(this, 'Neurology')">Neurology</button>
      <button onclick="selectDepartment(this, 'Orthopedics')">Orthopedics</button>
      <button onclick="selectDepartment(this, 'Pediatrics')">Pediatrics</button>
      <button onclick="selectDepartment(this, 'Dermatology')">Dermatology</button>
      <button onclick="selectDepartment(this, 'General Practice')">General Practice</button>
    </div>

    <!-- Doctor Cards -->
    <div class="doctor-grid" id="doctorGrid"></div>
  </div>
</div>

<script>
  const doctors = [
    { name: 'Dr. Sarah Johnson', specialty: 'Cardiology', rating: 4.9, availability: 'Today', location: '3rd Floor', experience: '15+ years', initials: 'SJ', color: 'green' },
    { name: 'Dr. Michael Chen', specialty: 'General Practice', rating: 4.0, availability: 'Tomorrow', location: '1st Floor', experience: '8 years', initials: 'MC', color: 'blue' },
    { name: 'Dr. Aisha Khan', specialty: 'Pediatrics', rating: 4.8, availability: 'Today', location: '2nd Floor', experience: '10 years', initials: 'AK', color: 'green' },
    { name: 'Dr. Robert Lee', specialty: 'Neurology', rating: 4.3, availability: 'Friday', location: '4th Floor', experience: '12 years', initials: 'RL', color: 'blue' },
    { name: 'Dr. Emily Morales', specialty: 'Dermatology', rating: 4.7, availability: 'Monday', location: '1st Floor', experience: '9 years', initials: 'EM', color: 'green' },
    { name: 'Dr. David Singh', specialty: 'Orthopedics', rating: 4.2, availability: 'Wednesday', location: 'Basement', experience: '11 years', initials: 'DS', color: 'blue' },
  ];

  let currentDepartment = 'All';

  function selectDepartment(btn, department) {
    document.querySelectorAll('.tags button').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    currentDepartment = department;
    applyFilters();
  }

  function applyFilters() {
    const search = document.getElementById('searchInput').value.toLowerCase();
    const avail = document.getElementById('availabilityFilter').value;
    const sort = document.getElementById('sortFilter').value;

    let filtered = doctors.filter(doc => {
      const matchesSearch = doc.name.toLowerCase().includes(search) || doc.specialty.toLowerCase().includes(search);
      const matchesDepartment = currentDepartment === 'All' || doc.specialty === currentDepartment;
      const matchesAvailability = avail === 'All' || doc.availability === avail;
      return matchesSearch && matchesDepartment && matchesAvailability;
    });

    if (sort === 'rating') {
      filtered.sort((a, b) => b.rating - a.rating);
    }

    renderDoctors(filtered);
  }

  function renderDoctors(data) {
    const grid = document.getElementById('doctorGrid');
    grid.innerHTML = '';
    data.forEach(doc => {
      const card = document.createElement('div');
      card.className = 'card';
      card.innerHTML = `
        <div class="initials ${doc.color === 'green' ? 'green-bg' : 'blue-bg'}">${doc.initials}</div>
        <h3>${doc.name}</h3>
        <small>${doc.specialty}</small>
        <div class="stars">⭐ ${doc.rating.toFixed(1)}</div>
        <div class="info">🧠 ${doc.experience} experience</div>
        <div class="info">📍 ${doc.location}</div>
        <div class="info">📅 Next: ${doc.availability}</div>
        <div class="actions">
          <button class="view-btn">View Profile</button>
          <button class="book-btn">Book Appointment</button>
        </div>
      `;
      grid.appendChild(card);
    });
  }

  // Initial load
  applyFilters();
</script>

<h2>Add New Doctor</h2>
<form id="addDoctorForm">
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="specialization" placeholder="Specialization" required>
    <input type="text" name="availability" placeholder="Availability" required>
    <button type="submit">Add Doctor</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#addDoctorForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'add_doctor_ajax.php',
            data: $(this).serialize(),
            success: function(response) {
                $('#doctorTableBody').html(response); // Reload the table body
                $('#addDoctorForm')[0].reset();
            }
        });
    });
});
</script>

</body>
</html>

