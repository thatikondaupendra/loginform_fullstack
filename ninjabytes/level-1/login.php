<?php
$sn="localhost";
$un="system";
$p="system";
$db="myDB1";

$conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
//creating table---
    //$s="CREATE TABLE Loginbase(username varchar(10) PRIMARY KEY,passwords varchar(30))";
    //$rs=mysqli_query($conn,$s);
//


if (array_key_exists('signupstart',$_POST)){
    inserting();
}

function inserting(){

?>
<html>
    <body>
<link rel="stylesheet" href="style.css">
<div class="box">
        <h1>Signup</h1>
<form method='post' action='http://localhost/ninjabytes/level-1/login.php'>
            <label for='un'>User Name:</label>
            <input type='text' name='un' id="in"/><br><br>
            <label for='pass'>Password:</label>
            <input type='text' name='pass' id="in"/>
            <br>
            <br>
            <input type='submit' id='submit' name='signupcomplete' value='Begin'>
</form>
</div>
<?php

}


if (array_key_exists('signupcomplete',$_POST)){
    insert();
}

function insert(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";

$conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}

//define variables
$sname=$id=$phno=$table="";

$username=$_POST['un'];
$pass=$_POST['pass'];

$sq="INSERT INTO loginbase  values 
('$username','$pass')";
//insert in database
$rs=mysqli_query($conn,$sq);
if($rs){
    echo "details record inserted";
}
else{
    echo "error:".$sq."<br>".mysqli_error($conn);
}
mysqli_close($conn);
}

if (array_key_exists('logins',$_POST)){
    login();
}

function login(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";

$conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}

//define variables
$username=$password="";

$username=$_POST['un'];
$pass=$_POST['pass'];

$sq="SELECT passwords from loginbase WHERE username='$username'";
//insert in database
$rs=mysqli_query($conn,$sq);
if($rs){
    echo "";
}
else{
    echo "t";
}
?>
<html>
    <body>
        
<link rel="stylesheet" href="style.css">
    <div class="box">
        <?php
$ss=mysqli_fetch_array($rs);
if($ss!=NULL){
if($ss[0]==$pass){
    ?> 
    <h1>valid authenticator</h1>   
     <?php
}
else{
     ?>
    <h1>pass word mis match</h1>
    <?php
}
}
else{
     ?>
    <h1>user doesn't exist</h1>
    <?php
}
mysqli_close($conn);
}
?>
</div>
</body>
</html>


