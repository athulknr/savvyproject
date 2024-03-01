<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = 'uploads/';
    $cv_file = $target_dir . basename($_FILES['cv']['name']);
    $cl_file = $target_dir . basename($_FILES['cl']['name']);
    
    // Check if file already exists
    if (file_exists($cv_file)) {
        echo 'CV file already exists. Please rename your file and try again.';
        exit();
    }
    if (file_exists($cl_file)) {
        echo 'Cover letter file already exists. Please rename your file and try again.';
        exit();
    }
    
    // Upload files
    if (move_uploaded_file($_FILES['cv']['tmp_name'], $cv_file) && move_uploaded_file($_FILES['cl']['tmp_name'], $cl_file)) {
        echo 'Your files have been uploaded successfully.';
    } else {
        echo 'Sorry, there was an error uploading your files. Please try again later.';
    }
}
?>
