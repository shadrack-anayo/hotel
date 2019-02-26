<?php

//page-register process
	require_once ("Connection.php");
    
	
if(isset($_POST["page-register"])){
$fullname = $_POST["fullname"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];


//Encrypting the password using bluefish
$HashPass = password_hash($password, PASSWORD_DEFAULT);


$user_insert = "INSERT INTO users(fullname, email, username, password)VALUES('$fullname' ,'$email', '$username', '$HashPass')";

if($rug->query($user_insert) === TRUE){
	print "A new user was registered successfuly";
	header("Location:../page-login.html");
	exit();
 }else{
	 die("Failed to Register a new user: " . $rug->error);
 }
}
//page-login process

 if(isset($_POST["page-login"])){
    //Variable declaration
   $entered_email = $_POST["email"];
   $entered_password = $_POST["password"];
   
   //Verify is the entered_email matches any record
   $spot_email = "SELECT * FROM users WHERE email = '$entered_email' LIMIT 1";
   
   //Executing the select query
   $email_res = $rug->query($spot_email);
   
   //Count at least one matching row
   if($email_res->num_rows > 0){
	   //Create a session.
	   $_SESSION["control"] = $email_res->fetch_assoc();
	   
	   //Use the session to fetch the stored password.
	   $stored_password = $_SESSION["control"]["password"];
	   
	   //Verify if the entered_password is identical to the stored_password
	   if(password_verify($entered_password, $stored_password)){
	   //if the two passwords match, redirect to viewUsers.php
       header("Location: ../index.html");
       exit();
	}
   }else{
	      // Otherwise destroy the control session and redirect back to page-login.html.
		  unset($_SESSION["control"]);
		  header("Location: ../page-login.html");
		  exit();
        } 
	
   }	 
  
?>