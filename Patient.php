<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
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
    <h2>Hospital Management System</h2>

    <!-- Form for Adding/Editing Patient -->
    <h3>Add/Update Patient</h3>
    <form id="patientForm">
        <input type="hidden" id="patientId">
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
        <button type="submit">Save</button>
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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Patient records will be dynamically added here -->
        </tbody>
    </table>

    <script>
        // Store patient data in an array (replace this with a database in a real app)
        let patients = [];

        // Add or Update patient
        document.getElementById('patientForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const id = document.getElementById('patientId').value;
            const name = document.getElementById('name').value;
            const age = document.getElementById('age').value;
            const gender = document.getElementById('gender').value;
            const disease = document.getElementById('disease').value;

            if (id) {
                // Update patient
                const patient = patients.find(p => p.id == id);
                patient.name = name;
                patient.age = age;
                patient.gender = gender;
                patient.disease = disease;
            } else {
                // Add new patient
                const newPatient = {
                    id: patients.length + 1,
                    name: name,
                    age: age,
                    gender: gender,
                    disease: disease
                };
                patients.push(newPatient);
            }

            // Reset form
            document.getElementById('patientForm').reset();
            document.getElementById('patientId').value = '';

            // Refresh table
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
                    <td>
                        <button onclick="editPatient(${patient.id})">Edit</button>
                        <button onclick="deletePatient(${patient.id})">Delete</button>
                    </td>
                `;
            });
        }

        // Edit patient
        function editPatient(id) {
            const patient = patients.find(p => p.id == id);
            document.getElementById('patientId').value = patient.id;
            document.getElementById('name').value = patient.name;
            document.getElementById('age').value = patient.age;
            document.getElementById('gender').value = patient.gender;
            document.getElementById('disease').value = patient.disease;
        }

        // Delete patient
        function deletePatient(id) {
            patients = patients.filter(p => p.id !== id);
            displayPatients();
        }

        // Initial display
        displayPatients();
    </script>
</body>
</html>
