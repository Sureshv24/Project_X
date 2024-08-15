<?php
// Database connection details
$servername = "localhost";
$username = "root"; // default username for XAMPP
$password = ""; // default password for XAMPP
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
 
   
   
    

    if($password==$password){

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
       
        $insert = mysqli_query($conn, "INSERT INTO register(username, email, password) VALUES ('$username','$email','$password')");
        if($insert){
            echo '
            <script>
               alert("Registration Successful");
               window.location = "login.html";
            </script>
        ';
        }
        else{
            echo '
            <script>
               alert("Some error occured");
               window.location = "login.html";
            </script>
        ';
        }

    }
    else{
        echo '
        <script>
               alert("password and confirm password does nor match");
               window.location = "/index.html";
        </script>
       ';
}

?>

