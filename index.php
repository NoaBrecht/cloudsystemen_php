<!DOCTYPE html>
<html>

<head>
    <title>cloudsystemen</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            color: yellow;
        }
    </style>
</head>

<body>
    <?php echo "<h2>Dit is een H2 via echo via php via docker</h2>" ?>

    <?php
    // Database configuration
    $servername = "database";  // or your database server address
    $username = "root";        // your database username
    $password = "my-secret-pw"; // your database password
    $dbname = "rolodex";       // your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data
        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO contacts (name, age, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $name, $age, $email);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New contact added successfully<br>";
        } else {
            echo "Error: " . $stmt->error . "<br>";
        }

        // Close the statement
        $stmt->close();
    }
    ?>

    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Add Contact">
    </form>

    <h2>Contact List</h2>

    <?php
    // Fetch and display the contacts
    $sql = "SELECT id, name, age, email FROM contacts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Email</th></tr>";
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["age"] . "</td><td>" . $row["email"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No contacts found";
    }

    // Close connection
    $conn->close();
    ?>
</body>

</html>