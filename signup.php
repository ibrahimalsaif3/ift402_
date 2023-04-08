<?php
    $servername = "localhost";
    $username = "root";
    $password = "aziziyah1";
    $dbname = "ift402";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "aziziyah1";
    $dbname = "ift402";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Insert user information into database
        $sql = "INSERT INTO customer (username, email, password) VALUES ('$username', '$email', '$password')";

        if (mysqli_query($conn, $sql)) {
            echo "Signup successful!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
?>
