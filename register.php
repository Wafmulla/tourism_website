<?php
// Database connection details
$servername = "localhost";
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "registration_db"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and assign form inputs to variables
    $user_name = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the database
    $sql = "INSERT INTO users (username, email, password, phone) 
            VALUES ('$user_name', '$email', '$hashed_password', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>REGISTER</title>
    </head>
<body>
    
<div class="outer">

            
    <div class="contactmain">
            
          
        <div class="info">

            <div class="location">
                <i class="fas fa-map-marker-alt fa-3x text-red"></i>
                <span>LOCATION</span>
                <p>Visit our office for further booking</p>
            </div>
    
            <div class="email">
                <i class="far fa-envelope fa-3x text-red"></i>
                <span>E-MAIL</span>
                <P>travels@gmail.com</P>
            </div>
    
            <div class="call">
                <i class="fas fa-phone-square-alt fa-3x text-red"></i>
                <span>CALL</span>
                 <p>+918767543312</p>
            </div>
            <div class="imgbox">
             
                <img src="./img/pexels-scott-webb-137618.jpg" alt="">
            </div>
        </div>

        <div class="contact">
            <h1>Register</h1>
            <form action="register.php" method="POST">

                <label  for="username">Username</label><br>
                <input  type="text" name="username" id="username" required>
                <br>
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" required>
                <br>
                <label for="password">Password</label>
                <input type="password" id="password" name="password"  required>
                <br>
                <label for="phone">Phone</label><br>
                <input type="double" id="phone" required>
                <br>  
                <label for="terms">
                    <input type="checkbox" id="terms" name="terms" required>
                    I agree to the Terms & Conditions
                </label>
                <br>
                <input class="submit" type="submit" value="submit">
            </form>
        </div>

    
       

    </div>



</div>

   
    
</body>
</html>