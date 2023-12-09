<?php
$host = "172.31.22.43";
$username = "Om200556124";
$password = "f24aExs8Lf";
$dbname = "Om200556124";

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if the connection was successful

// Use prepared statements to prevent SQL injection
$fname = $_POST["rfname"];
$lname = $_POST["rlname"];
$gmail = $_POST["registerEmail"];
$plain_password = $_POST["registerPassword"];

// Hash the password
$hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

// Check for duplicate email
$duplicate = "SELECT * FROM Myregister WHERE email='$gmail'";
$result1 = mysqli_query($conn, $duplicate);

if (mysqli_num_rows($result1) > 0) {
    // Email already exists, handle duplicate entry (e.g., show an error message)
    echo "Duplicate data";
} else {
    // Insert the hashed password into the database
    $query = "INSERT INTO Myregister (fname, lname, email, password) VALUES ('$fname', '$lname', '$gmail', '$hashed_password')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Registration successful
        echo "Registration successful";
    } else {
        // Registration failed
        echo "Registration failed";
    }
}

// Close the database connection
mysqli_close($conn);
?>
