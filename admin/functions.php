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
        $fname = $_POST['fname'];
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
                $conn->query("INSERT INTO admin (auser,aemail,apass,adob,fullname,aphone) VALUES('$user','$email','".password_hash($pass1, PASSWORD_DEFAULT)."','$dob','$fname','$phone')") or die($conn->error);
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

    // delete user
    if (isset($_POST['deleteUser'])) {
        $id = $_POST['del_user_id'];
        if ($id != null){
            $conn->query("DELETE FROM user WHERE uid = '$id'") or die($conn->error);
            $_SESSION['status'] = 'Successfully Deleted!';
            $_SESSION['status_icon'] = 'success';
            header('location:userlist.php');
        }else{
            $_SESSION['status'] = 'An Error Occured!';
            $_SESSION['status_icon'] = 'error';
            header('location:userlist.php');
        }
        
    }

    // verify account user
    if (isset($_POST['verify_user'])) {
        $id = $_POST['id'];
        $messages = $_POST['msg'];
        $emails = $_POST['email'];
        
        if ($id != ''){
            $conn->query("UPDATE user SET ustatus='Verified' WHERE uid='$id'") or die($conn->error);
            include 'verify_email.php';
            $_SESSION['status'] = 'Successfully Verified Account!';
            $_SESSION['status_icon'] = 'success';
            header('location:userlist.php');
        }else{
            $_SESSION['status'] = 'An Error Occured!';
            $_SESSION['status_icon'] = 'danger';
            header('location:userlist.php');
        }

    
    }

    // unverify account user
    if (isset($_POST['unverify_user'])) {
        $id = $_POST['id'];
        $messages = $_POST['msg'];
        $emails = $_POST['email'];
        
        if ($id != ''){
            $conn->query("UPDATE user SET ustatus='Unverified' WHERE uid='$id'") or die($conn->error);
            include 'unverify_email.php';
            $_SESSION['status'] = 'Account Unverified!';
            $_SESSION['status_icon'] = 'success';
            header('location:userlist.php');
        }else{
            $_SESSION['status'] = 'An Error Occured!';
            $_SESSION['status_icon'] = 'danger';
            header('location:userlist.php');
        }

        
    }

    // delete agent
    if (isset($_POST['deleteAgent'])) {
        $id = $_POST['del_agent_id'];
        if ($id != null){
            $conn->query("DELETE FROM user WHERE uid = '$id'") or die($conn->error);
            $_SESSION['status'] = 'Successfully Deleted!';
            $_SESSION['status_icon'] = 'success';
            header('location:userlist.php');
        }else{
            $_SESSION['status'] = 'An Error Occured!';
            $_SESSION['status_icon'] = 'error';
            header('location:useragent.php');
        }
        
    }

    // verify account agent
    if (isset($_POST['verify_agent'])) {
        $id = $_POST['id'];
        $messages = $_POST['msg'];
        $emails = $_POST['email'];
        
        if ($id != ''){
            $conn->query("UPDATE user SET ustatus='Verified' WHERE uid='$id'") or die($conn->error);
            include 'verify_email.php';
            $_SESSION['status'] = 'Successfully Verified Account!';
            $_SESSION['status_icon'] = 'success';
            header('location:useragent.php');
        }else{
            $_SESSION['status'] = 'An Error Occured!';
            $_SESSION['status_icon'] = 'danger';
            header('location:useragent.php');
        }

    
    }

    // unverify account agent
    if (isset($_POST['unverify_agent'])) {
        $id = $_POST['id'];
        $messages = $_POST['msg'];
        $emails = $_POST['email'];
        
        if ($id != ''){
            $conn->query("UPDATE user SET ustatus='Unverified' WHERE uid='$id'") or die($conn->error);
            include 'unverify_email.php';
            $_SESSION['status'] = 'Account Unverified!';
            $_SESSION['status_icon'] = 'success';
            header('location:useragent.php');
        }else{
            $_SESSION['status'] = 'An Error Occured!';
            $_SESSION['status_icon'] = 'danger';
            header('location:useragent.php');
        }

        
    }


?>