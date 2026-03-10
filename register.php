<?php
include("db.php");

<form action="register.php" method="POST">

<input type="text" name="username" placeholder="Enter Username" required>

<input type="password" name="password" placeholder="Enter Password" required>

<button type="submit">Register</button>

</form>
$username = $_POST['username'];
$password = $_POST['password'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO registers (Username, PASSWORD) VALUES ('$username', '$hashed_password')";

if(mysqli_query($conn, $sql)){
    echo "Registration Successful! <a href='index.html'>Login Now</a>";
}
else{
    echo "Error: " . mysqli_error($conn);
}
?>