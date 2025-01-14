<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        nav {
            margin: 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        nav a {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        nav a:hover {
            background-color: #45a049;
        }

        .section {
            padding: 20px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <h1>Welcome to the Hospital Management System</h1>
        <p>Manage patients, appointments, and more!</p>
    </header>

    <!-- Navigation Menu -->
    <nav>
        <a href="add_patient.html">Add Patient</a>
        <a href="view_patients.html">View Patients</a>
        <a href="appointments.html">Appointments</a>
        <a href="reports.html">Reports</a>
    </nav>

    <!-- Main Content Section -->
    <div class="section">
        <h2>Hospital Management Features</h2>
        <p>Use the navigation menu to access the following sections of the system:</p>
        <ul>
            <li><strong>Add Patient</strong>: Add new patient records to the system.</li>
            <li><strong>View Patients</strong>: View and manage patient records.</li>
            <li><strong>Appointments</strong>: Schedule and manage patient appointments.</li>
            <li><strong>Reports</strong>: View and generate hospital-related reports.</li>
        </ul>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Hospital Management System. All rights reserved.</p>
    </footer>

</body>
</html>
