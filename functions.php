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
        $uid = $_POST['uid'];

        $conn->query("INSERT INTO inquire (fname,email,cnum,property_id,admin_agent_id,uid	) 
                VALUES('$fname', '$email','$cnum','$property_id','$admin_agent_id', '$uid')") or die($conn->error);
        $_SESSION['status'] = 'Request for inquiry Successfully Saved!';
        $_SESSION['status_icon'] = 'success';
        header('location:property.php');
    }
    if(isset($_POST['addProperty'])) {
        $title=$_POST['title'];
        $content=$_POST['content'];
        $ptype=$_POST['ptype'];
        $bhk=$_POST['bhk'];
        $bed=$_POST['bed'];
        $balc=$_POST['balc'];
        $hall=$_POST['hall'];
        $stype=$_POST['stype'];
        $bath=$_POST['bath'];
        $kitc=$_POST['kitc'];
        $floor=$_POST['floor'];
        $price=$_POST['price'];
        $city=$_POST['city'];
        $asize=$_POST['asize'];
        $loc=$_POST['loc'];
        $status='Available';
        $uid=$_SESSION['get_data']['uid'];
        $feature=$_POST['feature'];
        
        $totalfloor=$_POST['totalfl'];
        
        $aimage=$_FILES['aimage']['name'];
        $aimage1=$_FILES['aimage1']['name'];
        $aimage2=$_FILES['aimage2']['name'];
        $aimage3=$_FILES['aimage3']['name'];
        $aimage4=$_FILES['aimage4']['name'];
        
        $fimage=$_FILES['fimage']['name'];
        $fimage1=$_FILES['fimage1']['name'];
        $fimage2=$_FILES['fimage2']['name'];
        
        $temp_name  =$_FILES['aimage']['tmp_name'];
        $temp_name1 =$_FILES['aimage1']['tmp_name'];
        $temp_name2 =$_FILES['aimage2']['tmp_name'];
        $temp_name3 =$_FILES['aimage3']['tmp_name'];
        $temp_name4 =$_FILES['aimage4']['tmp_name'];
        
        $temp_name5 =$_FILES['fimage']['tmp_name'];
        $temp_name6 =$_FILES['fimage1']['tmp_name'];
        $temp_name7 =$_FILES['fimage2']['tmp_name'];
        
        move_uploaded_file($temp_name,"admin/property/$aimage");
        move_uploaded_file($temp_name1,"admin/property/$aimage1");
        move_uploaded_file($temp_name2,"admin/property/$aimage2");
        move_uploaded_file($temp_name3,"admin/property/$aimage3");
        move_uploaded_file($temp_name4,"admin/property/$aimage4");
        
        move_uploaded_file($temp_name5,"admin/property/$fimage");
        move_uploaded_file($temp_name6,"admin/property/$fimage1");
        move_uploaded_file($temp_name7,"admin/property/$fimage2");

        $conn->query("INSERT INTO property (title, pcontent, type, bhk, stype,bedroom, bathroom, balcony, kitchen, hall, floor, size, price, region, city, feature,
        pimage, pimage1, pimage2, pimage3, pimage4,user_id, status, mapimage, topmapimage, groundmapimage, 
        totalfloor)VALUES('$title','$content','$ptype', '$bhk', '$stype','$bed','$bath','$balc','$kitc', '$hall', '$floor', '$asize', '$price', '$loc', '$city', '$feature','$aimage','$aimage1','$aimage2','$aimage3','$aimage4','$uid','$status', '$fimage','$fimage1','$fimage2','$totalfloor')") or die($conn->error);
        
        $_SESSION['status'] = 'Property Added Successfully!';
        $_SESSION['status_icon'] = 'success';
        header('location:property.php');

        
    }
?>