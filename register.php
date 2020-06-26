<?php

include("conn.php");

// First we create variable to define what we get from user. as a value we use method and parametr
$name = $_GET["name"];
$surname = $_GET["surname"];
$phone = $_GET["phone"];
$email = $_GET["email"];
$password = $_GET["password"];

$verification = rand(0,10000).rand(0,10000);
$state = 0;

// These variables is stand for user data which user input it when he/she done registration
// and we get them to upload our db

// /////////////////////////////////////////////////////
// /////////////////////////////////////////////////////

// Control for same mail and phone

$control = mysqli_query($connect, "select * from app_users where email = '$email' or phone = '$phone'");
$count = mysqli_num_rows($control);

// We create a class for toast message to turn it to json format
class User{
    public $text;
    public $tf;
    public $count;
}
// create a object for class
$user = new User();



// Testing user has account or not?
if($count >0 )
{   
    // Create a message 
    $user -> text = "Entered creditanals have an account wan to login? or change your creditanals";
    $user -> tf = false;
    $user -> count = $count;
    // encode it as json format
    echo(json_encode($user));

}
else
{
    
    // function for adding these datails to our db
    $addUser = mysqli_query($connect, "insert into app_users(name,surname, phone, email, password, verification, state) values('$name', '$surname','$phone','$email','$password','$verification','$state')");
    

    // Sending mail for verification

// Mail data
// For Confirm route a new page
    $submit ="http://localhost/myapp/activate.php?mail =".$email."&verification=".$verification."";
    
    $to = "ibragim.abdulazizli@gmail.com";
    $subject = "Please verify your account";
    $text = "Hello Mr/Mrs You need to activate your account to use app. <a href = '".$submit."'>Submit</a>";
    $from = "From: info@cafein.com";
    $from .= "Content-Type: text/html; charset= UTF-8\r\n";
    $from .= "MIME-Version: 1.0\r\n";
    // sendin mail
    mail($to,$subject,$text,$from); 
    
    // Sending json format to user activateing account

    

}







?>
