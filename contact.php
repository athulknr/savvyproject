<?php
if(isset($_POST['fsubmit']))
{
    //fetching data from the html form
    $name=$_POST["name"];
    $email=$_POST["email"];
    $subject=$_POST["subject"];
    $msg=$_POST["message"];


    //database details
    $host="localhost";
    $username="root";
    $password ="";
    $dbname="message";
 

    //create connection
   // $con=mysqli_connect($host,$username,$dbname);


// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
echo '<h2 style="text-align:center; font-weight:bold;">We have received your message and would like to thank you for writing to us.</h2><br><br>';



    //check connection whether it is working or not
    

    // inserting data from the html form
    $sql = "insert into details(name,mail,subject,message) values('$name','$email','$subject','$msg')";

    //save and check whether data is stored properly into database or not
    $save = mysqli_query($conn,$sql);
    if($save)
    {
       
        echo '<div style="text-align:center;">';
        echo '<a href="index.html" class="button" style="font-size: 20px;">Back to home</a>';
        echo '</div>';
        

        echo '<br>';
        echo '<!Doctype html>';
        echo '<html>';
        echo '<body>';
        echo '<form action="readdata.php" method="post">';
        
        echo '</form>';
        echo '</body>';
        echo '</html>';
    }
    else{
        echo "Error occured during sending the data.";
    }

    //close the connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
    
<style>
        body {
            font-family: Arial, sans-serif;
            background-color:#0d98ba;
            background-image: url('thankyou.jpg');
            background-size: cover;
            background-position: center;
            text-align: center;
        }
        
        h2 {
            color: #333;
            font-weight: bold;
            margin-top: 50px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #000;
            color: white;
            font-size: 20px;
            text-decoration: none;
            border-radius: 25px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
   
</body>
</html>







