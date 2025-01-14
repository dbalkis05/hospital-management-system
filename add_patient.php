<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        input, button {
            padding: 8px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <h2>Add Patient</h2>

    <!-- Form for Adding Patient -->
    <form id="addPatientForm">
        <label for="name">Patient Name:</label>
        <input type="text" id="name" required>
        <br>
        <label for="age">Age:</label>
        <input type="number" id="age" required>
        <br>
        <label for="gender">Gender:</label>
        <select id="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <br>
        <label for="disease">Disease:</label>
        <input type="text" id="disease" required>
        <br>
        <button type="submit">Add Patient</button>
    </form>

    <!-- Patient List Table -->
    <h3>Patient List</h3>
    <table id="patientTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Disease</th>
            </tr>
        </thead>
        <tbody>
            <!-- Patient records will be dynamically added here -->
        </tbody>
    </table>

    <script>
        // Array to store patient data (replace this with a database for production)
        let patients = [];

        // Add patient function
        document.getElementById('addPatientForm').addEventListener('submit', function (e) {
            e.preventDefault();  // Prevent form submission and page reload
            
            const name = document.getElementById('name').value;
            const age = document.getElementById('age').value;
            const gender = document.getElementById('gender').value;
            const disease = document.getElementById('disease').value;

            // Create new patient object
            const newPatient = {
                id: patients.length + 1,  // Auto-increment ID
                name: name,
                age: age,
                gender: gender,
                disease: disease
            };

            // Add the new patient to the array
            patients.push(newPatient);

            // Clear the form fields
            document.getElementById('addPatientForm').reset();

            // Refresh the patient table to include the new patient
            displayPatients();
        });

        // Display patients in the table
        function displayPatients() {
            const tableBody = document.getElementById('patientTable').getElementsByTagName('tbody')[0];
            tableBody.innerHTML = '';  // Clear existing rows

            patients.forEach(patient => {
                const row = tableBody.insertRow();
                row.innerHTML = `
                    <td>${patient.id}</td>
                    <td>${patient.name}</td>
                    <td>${patient.age}</td>
                    <td>${patient.gender}</td>
                    <td>${patient.disease}</td>
                `;
            });
        }

        // Initial display (in case there are any pre-existing patients)
        displayPatients();
    </script>
</body>
</html>

