<?php
// Replace the placeholders with your actual database credentials
$hostname = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database";

// Create a connection to the MySQL database
$mysqli = new mysqli($hostname, $username, $password, $database);

// Check if the connection was successful
if ($mysqli->connect_errno) {
  // Handle the connection error
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Collect the user information
  $email = $mysqli->real_escape_string($_POST["email"]);
  $password = $mysqli->real_escape_string($_POST["password"]);
  $firstName = $mysqli->real_escape_string($_POST["firstName"]);
  $lastName = $mysqli->real_escape_string($_POST["lastName"]);
  $dob = $mysqli->real_escape_string($_POST["dob"]);

  // Create the SQL query to insert the data into a table
  $sql = "INSERT INTO users (email, password, first_name, last_name, dob) VALUES ('$email', '$password', '$firstName', '$lastName', '$dob')";

  // Execute the query
  if ($mysqli->query($sql) === TRUE) {
    // Redirect to a success page
    header("Location: success.php");
    exit();
  } else {
    // Handle the query error
    echo "Error: " . $mysqli->error;
  }
}

// Close the database connection
$mysqli->close();
?>
