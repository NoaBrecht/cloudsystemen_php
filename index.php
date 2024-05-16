<?php
// Include the database connection file
include_once("config.php");

// Fetch contacts (in descending order)
$result = mysqli_query($mysqli, "SELECT * FROM contacts ORDER BY id DESC");
?>
<html>

<head>
    <title>MariaDB Rolodex</title>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <table>
        <tr>
            <td>Name</td>
            <td>Age</td>
            <td>Email</td>
            <td><a class="button">Add Contact</a></td>
        </tr>
        <?php
        // Print contacts 
        while ($res = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $res['name'] . "</td>";
            echo "<td>" . $res['age'] . "</td>";
            echo "<td>" . $res['email'] . "</td>";
        }
        ?>
    </table>
</body>

</html>