<?php

ini_set("display_errors", "1");
ini_set("display_startup_errors","1");
error_reporting(E_ALL);
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Define database connection parameters
  $servername = "localhost";
  $username = "root";
  $password = "aziziyah1";
  $dbname = "ift402";

  // Create a new connection to the database
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Get the input values from the form
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Validate input
  $username = filter_var($username, FILTER_SANITIZE_STRING);
  $email = filter_var($email, FILTER_VALIDATE_EMAIL);
  $password = filter_var($password, FILTER_SANITIZE_STRING);

  if (!$email) {
    die("Invalid email address");
  }

  // Prepare the SQL statement
  $stmt = $conn->prepare("INSERT INTO customer (username, email, password) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $username, $email, $password);

  // Execute the SQL statement
  if ($stmt->execute()) {
    echo "User created successfully";
  } else {
    echo "Error: " . $stmt->error;
  }

  // Close the database connection
  $stmt->close();
  $conn->close();
}
?>

<!-- Your HTML sign up form -->
<div class="signup-section">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit" name="signup_submit">Sign Up</button>
  </form>
</div>
