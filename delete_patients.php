<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Patient</title>
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
    <h2>Hospital Patient Management</h2>

    <!-- Form for Adding/Updating Patient -->
    <h3>Add or Update Patient</h3>
    <form id="addPatientForm">
        <input type="hidden" id="patientId"> <!-- Hidden field to store the patient's ID for updates -->
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
        <button type="submit">Save Patient</button>
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
        // Array to store patient data (in production, this would be replaced by a database)
        let patients = [];

        // Add or Update patient function
        document.getElementById('addPatientForm').addEventListener('submit', function (e) {
            e.preventDefault();  // Prevent form submission and page reload
            
            const patientId = document.getElementById('patientId').value;
            const name = document.getElementById('name').value;
            const age = document.getElementById('age').value;
            const gender = document.getElementById('gender').value;
            const disease = document.getElementById('disease').value;

            // If patientId is set, update the existing patient
            if (patientId) {
                const patient = patients.find(p => p.id == patientId);
                patient.name = name;
                patient.age = age;
                patient.gender = gender;
                patient.disease = disease;
            } else {
                // Add a new patient
                const newPatient = {
                    id: patients.length + 1,  // Auto-increment ID
                    name: name,
                    age: age,
                    gender: gender,
                    disease: disease
                };
                patients.push(newPatient);
            }

            // Reset the form and patientId field
            document.getElementById('addPatientForm').reset();
            document.getElementById('patientId').value = '';

            // Refresh the patient table to reflect the updates
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

        // Edit patient function (pre-fill form with patient data)
        function editPatient(id) {
            const patient = patients.find(p => p.id === id);

            // Fill the form with the patient's data
            document.getElementById('patientId').value = patient.id;
            document.getElementById('name').value = patient.name;
            document.getElementById('age').value = patient.age;
            document.getElementById('gender').value = patient.gender;
            document.getElementById('disease').value = patient.disease;
        }

        // Delete patient function
        function deletePatient(id) {
            // Filter out the patient with the given id
            patients = patients.filter(p => p.id !== id);
            
            // Refresh the patient table after deletion
            displayPatients();
        }

        // Initial display (in case there are any pre-existing patients)
        displayPatients();
    </script>
</body>
</html>
