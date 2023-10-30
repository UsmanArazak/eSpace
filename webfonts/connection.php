<?php



$server_name="localhost";
$user_name="root";
$password="";
$db_name="daura_techies_hub";
$msg="";

$db=mysqli_connect($server_name,$user_name,$password,$db_name);
if(!$db){
    die("connection failed:". mysqli_connect_error());
}

if(isset($_POST['register'])){

    $Name=mysqli_real_escape_string($db, $_POST['name']);

    $Email=mysqli_real_escape_string($db, $_POST['email']);

    $UserName=mysqli_real_escape_string($db, $_POST['username']);

    $PhoneNo=mysqli_real_escape_string($db, $_POST['phone']);

    $Address=mysqli_real_escape_string($db, $_POST['address']);

    $Terms=mysqli_real_escape_string($db, $_POST['terms']);

    if ( mysqli_num_rows(mysqli_query($db, "SELECT * FROM registration WHERE email='{$Email}'"))>0){

      $msg="<div> {$Email} - This  email address has been already exists.</div>";
    }

    else {

      $sql=" INSERT INTO registration (name, email, username, phone, address, terms) VALUE ('{$Name}', '{$Email}', {$UserName}', '{$PhoneNo}', '{$Address}', '{$Terms}')";

      $result = mysqli_query($db, $sql);
      
      if ($result){

        $msg ="<div> Registration has been successfully complete.</div>";
      }

        else {

          $msg ="<div>something wrong went.</div>";
       }
      }
    }
?>








