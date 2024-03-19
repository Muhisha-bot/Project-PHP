<?php
session_start();
require_once('server.php');



if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']))
 {
    if($_POST['action'] == 'signup') 
    {

        $username = $_POST['username'];
        $password = $_POST['password'];
         
        $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";

        if ($conn->query($sql) === TRUE) {

            echo "kk";
            header("location: dashboard.php");
            exit;
        } else {
            echo"kl";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } 
    if($_POST['action'] == 'proj') 
    {

        $pname = $_POST['pname'];
        $cname = $_POST['cname'];
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        $amount=$_POST['amount'];

         
        $sql = "INSERT INTO proj (pname,cname,sdate,edate,amount) VALUES ('$pname', '$cname','$sdate','$edate','$amount')";

        if ($conn->query($sql) === TRUE) {
            header("location: dashboard.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
        elseif($_POST['action'] == 'signin') 
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = "SELECT username,password FROM user WHERE username = '$username' and password = '$password'";
        $result = mysqli_query($conn,$stmt);
        
        $count = mysqli_num_rows($result);

        if($count == 1) {
           
            header("location:dashboard.php");
     
         }
         else {
            $error = "Your Login Name or Password is invalid";
            header("location:index.php?error=".urlencode($error));
            exit();
         }
          

    }

    if($_POST['action'] == 'update') 
    {
        $update = $_GET['update'];
        $pname = $_POST['pname'];
        $cname = $_POST['cname'];
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        $amount=$_POST['amount'];
         
        $stmt = "update proj set pname='$pname',cname='$cname' ,sdate='$sdate', edate='$edate', amount='$edate' ,amount='$amount' where id='$update' ";

        $result = mysqli_query($conn,$stmt);
        
        

        if($result) {
           
            header("location:dashboard.php");
     
         }
         else {
       
            $error = "Your Login Name or Password is invalid";
            header("location:index.php?error=".urlencode($error));
            exit();
         }
    } 
 }
?>
