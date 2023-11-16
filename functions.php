<?php 
    session_start();
    include("config.php");

    // login
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
    
        $login = "SELECT * FROM user WHERE uemail='$email' AND ustatus='Verified'";
        $prompt = mysqli_query($conn, $login);
        $getData = mysqli_fetch_array($prompt);
        
        if ($getData !== null) {
            if (password_verify($pass, $getData['upass'])) {
                $_SESSION['uemail'] = $getData;
                $_SESSION['get_data'] = $getData;
                unset($_SESSION['status']);
                header('location:index.php');
            } else {
                $_SESSION['status'] = 'Invalid Password';
                $_SESSION['status_icon'] = 'error';
                header('location:login.php');
            }
        } else {
            $_SESSION['status'] = 'Invalid Credentials or your account still unverified';
            $_SESSION['status_icon'] = 'error';
            header('location:login.php');
        }
    }


    if(isset($_POST['reg']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $pass1=$_POST['pass1'];
        $pass2=$_POST['pass2'];
        $utype=$_POST['utype'];
        $idnum = $_POST['idnum'];
        $uimage=$_FILES['uimage']['name'];
        $temp_name1 = $_FILES['uimage']['tmp_name'];
        
        $query = "SELECT * FROM user where uemail='$email'";
        $res=mysqli_query($conn, $query);
        $num=mysqli_num_rows($res);
        
        if($num == 1)
        {
            $_SESSION['status'] = 'Email already exists!';
                $_SESSION['status_icon'] = 'error';
                header('location:register.php');
        }
        else
        {
            if($pass1 != $pass2){
                $msg = "<p class='alert alert-danger'>Password does not match!</p> ";
            }elseif(!empty($name) && !empty($email) && !empty($phone) && !empty($pass1) && !empty($uimage)){
                if ($utype == 'agent') {
                    $sql="INSERT INTO user (uname,uemail,uphone,upass,utype,uimage,ustatus,idnum) VALUES ('$name','$email','$phone','".password_hash($pass1, PASSWORD_DEFAULT)."','$utype','$uimage','Unverified','$idnum')";
                    $result=mysqli_query($conn, $sql);
                    move_uploaded_file($temp_name1,"admin/user/$uimage");
                    if($result){
                            $_SESSION['status'] = 'Register Successfully! Please wait for the approval of your account...';
                            $_SESSION['status_icon'] = 'success';
                            header('location:login.php');
                    }
                    else{
                            $_SESSION['status'] = 'Register Not Successfully';
                            $_SESSION['status_icon'] = 'error';
                            header('location:register.php');
                    }
                }elseif ($utype == 'user') {
                    $sql="INSERT INTO user (uname,uemail,uphone,upass,utype,uimage,ustatus) VALUES ('$name','$email','$phone','".password_hash($pass1, PASSWORD_DEFAULT)."','$utype','$uimage','Unverified')";
                    $result=mysqli_query($conn, $sql);
                    move_uploaded_file($temp_name1,"admin/user/$uimage");
                    if($result){
                            $_SESSION['status'] = 'Register Successfully! Please wait for the approval of your account...';
                            $_SESSION['status_icon'] = 'success';
                            header('location:login.php');
                    }
                    else{
                            $_SESSION['status'] = 'Register Not Successfully';
                            $_SESSION['status_icon'] = 'error';
                            header('location:register.php');
                    }
                }
            }else{
                $_SESSION['status'] = 'Please Fill all the fields';
                $_SESSION['status_icon'] = 'error';
                header('location:register.php');
            }
        }
        
    }
    if (isset($_POST['submit_inquire'])) {
        $property_id = $_POST['property_id'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $cnum = $_POST['cnum'];
        $admin_agent_id = $_POST['admin_agent_id'];

        $conn->query("INSERT INTO registration (fname,email,cnum,property_id,admin_agent_id	) 
                VALUES('$fname', '$email','$cnum','$property_id','$admin_agent_id')") or die($conn->error);
        $_SESSION['status'] = 'Request for inquiry Successfully Saved!';
        $_SESSION['status_icon'] = 'success';
        header('location:property.php');
    }
?>