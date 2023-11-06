<?php 
    session_start();
    include("config.php");

    // login
    if (isset($_POST['login'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
    
        $login = "SELECT * FROM admin WHERE auser='$user'";
        $prompt = mysqli_query($conn, $login);
        $getData = mysqli_fetch_array($prompt);
    
        if ($getData !== null) {
            if (password_verify($pass, $getData['apass'])) {
                $_SESSION['auser'] = $getData;
                unset($_SESSION['status']);
                header('location:dashboard.php');
            } else {
                $_SESSION['status'] = 'Invalid Password';
                $_SESSION['status_icon'] = 'error';
                header('location:index.php');
            }
        } else {
            $_SESSION['status'] = 'Invalid Credentials';
            $_SESSION['status_icon'] = 'error';
            header('location:index.php');
        }
    }
    

    // register
    if(isset($_POST['register']))
    {
        $user=$_POST['name'];
        $email=$_POST['email'];
        $pass1=$_POST['pass1'];
        $pass2=$_POST['pass2'];
        $dob=$_POST['dob'];
        $phone=$_POST['phone'];
        
        $sql = "SELECT * FROM admin WHERE auser='$user' AND aemail='$email'";
        $result = mysqli_query($conn, $sql);

        if ($pass1 != $pass2){
            $_SESSION['status'] = 'Password does not match!';
            $_SESSION['status_icon'] = 'error';
            header('location:register.php');
        }elseif(strlen($pass1) <= 8){
            $_SESSION['status'] = 'Password Must Contain At Least 8 Characters!';
            $_SESSION['status_icon'] = 'error';
            header('location:register.php');
        }else{
            if (!$result->num_rows > 0) {
                $conn->query("INSERT INTO admin (auser,aemail,apass,adob,aphone) VALUES('$user','$email','".password_hash($pass1, PASSWORD_DEFAULT)."','$dob','$phone')") or die($conn->error);
                $_SESSION['status'] = 'Successfully Created the Account';
                $_SESSION['status_icon'] = 'success';
                header('location:index.php');
            }else{
                $_SESSION['status'] = 'Account Already Exists';
                $_SESSION['status_icon'] = 'warning';
                header('location:index.php');
            }
        }
    }

    // delete admin
    if (isset($_POST['deleteAdmin'])) {
        $id = $_POST['del_id'];
        if ($id != null){
            $conn->query("DELETE FROM admin WHERE aid = '$id'") or die($conn->error);
            session_destroy();
            header('location: index.php');
        }else{
            $_SESSION['status'] = 'An Error Occured!';
            $_SESSION['status_icon'] = 'error';
            header('location:adminlist.php');
        }
        
    }



?>