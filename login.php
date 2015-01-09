<?php
// Claire De Lune by Debussy Slob on My Knob - Three 6 Mafia Explosions in the Sky - Your Hand in Mine
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
$error = "Email or Password is invalid";
}
else
{
    
// Define $username and $password
$email=$_POST['email'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost","root","I8~8(IV)RU}Pf.O'=9G51<'IOgm)9z","PhishTrain");
// To protect MySQL injection for Security purpose
$email = stripslashes($email);
$password = stripslashes($password);

$password = mysqli_real_escape_string($connection, $password);
// Selecting Database
// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT password from Users where Email='" . $email . "';";

$query = mysqli_query($connection, $query);
$res = mysqli_fetch_row($query);
$query = "SELECT ID from Users where Email='" . $email . "';";
$query = mysqli_query($connection, $query);

$id = mysqli_fetch_row($query);

if (password_verify($password, $res[0])) {
setcookie("uisd",$id[0],0,'/');
//$_SESSION['login_user']=$id[0]; // Initializing Session
header("Location: ../dashboard/"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}                                                                                                                                                                     
mysqli_close($connection); // Closing Connection
}
}