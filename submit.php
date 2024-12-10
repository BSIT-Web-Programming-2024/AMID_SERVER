<?php
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "contact_db";    

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO contacts (full_name, email, mobile, subject, message) 
            VALUES ('$full_name', '$email', '$mobile', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        
        echo "Your message has been sent successfully!";
    } else {
        
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    header("Location: form_page.php");
    exit();
}
?>
