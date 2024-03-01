<?php
// Database details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "apply";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $zip = $_POST["zip"];

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO jobapply (fullname, email, address, city, zip) VALUES ('$fullname', '$email', '$address', '$city', '$zip')";

    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// dfkjgkdjg
// ...

// Check if a file is selected for upload


// ...



if (!empty($_FILES["file"]["name"]) && $_FILES["file"]["error"] == 0) {
    $targetDirectory = "uploads/"; // Specify the directory where you want to store the uploaded files
    $targetFile = $targetDirectory . basename($_FILES["file"]["name"]);

    // Get the file extension
    $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Define the allowed file types
    $allowedExtensions = array('pdf', 'doc', 'docx');

    // Check if the file extension is allowed
    if (in_array($fileExtension, $allowedExtensions)) {
        // Check if the uploaded file is a valid file type
        if ($_FILES["file"]["type"] == 'application/pdf' || $_FILES["file"]["type"] == 'application/msword' || $_FILES["file"]["type"] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                echo '<div style="text-align: center;">
                          <h3>Your application has been submitted successfully</h3>
                          <p>Thank you for applying.</p>
                          <a href="index.html">BACK TO HOME</a>
                      </div>';
            } else {
                echo "Failed to upload file.";
            }
        } else {
            echo "Only PDF and document files are allowed.";
        }
    } else {
        echo "Invalid file extension. Only PDF and document files are allowed.";
    }
} else {
    echo "No file uploaded.";
}


// Rest of your code to handle form data and database insertion
















// Close the connection
$conn->close();
?>






   