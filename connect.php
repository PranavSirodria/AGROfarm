<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordC = $_POST['passwordC'];

    // Connection to the database
    $conn = new mysqli('localhost', 'root', '', 'test');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO registration (firstName, email, password, passwordC) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstName, $email, $password, $passwordC);
        $stmt->execute();
        echo "Registration Successful.";
        $stmt->close();
        $conn->close();
    }
} else {
    echo "Invalid Request.";
}
?>
