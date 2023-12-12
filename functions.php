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
        $utype = $_POST['utype'];
        $message = $_POST['message'];
        if($uid == ''){
            $uid = 'None';
        }

        $conn->query("INSERT INTO inquire (fname,email,cnum,property_id,admin_agent_id,uid,message,utype) 
                VALUES('$fname', '$email','$cnum','$property_id','$admin_agent_id', '$uid','$message','$utype')") or die($conn->error);
        $_SESSION['status'] = 'Request for Inquiry Successfully Sent!';
        $_SESSION['status_icon'] = 'success';
        header('location:history.php');
    }


    if(isset($_POST['addProperty'])) {
        $title=$_POST['title'];
        $content=$_POST['content'];
        $ptype=$_POST['ptype'];
        // $bhk=$_POST['bhk'];
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
        $utype=$_SESSION['get_data']['utype'];
        $uname = $_SESSION['get_data']['uname'];
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

        $conn->query("INSERT INTO property (title, pcontent, type, stype,bedroom, bathroom, balcony, kitchen, hall, floor, size, price, region, city, feature,
        pimage, pimage1, pimage2, pimage3, pimage4,user_id, status, mapimage, topmapimage, groundmapimage, 
        totalfloor,user_type,useragent)VALUES('$title','$content','$ptype', '$stype','$bed','$bath','$balc','$kitc', '$hall', '$floor', '$asize', '$price', '$loc', '$city', '$feature','$aimage','$aimage1','$aimage2','$aimage3','$aimage4','$uid','$status', '$fimage','$fimage1','$fimage2','$totalfloor','$utype','$uname')") or die($conn->error);
        
        $_SESSION['status'] = 'Property Added Successfully!';
        $_SESSION['status_icon'] = 'success';
        header('location:property.php');

        
    }

    if (isset($_POST['submit_reserve'])) {
        $property_id = $_POST['property_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $admin_agent_id = $_POST['admin_agent_id'];
        $uid = $_POST['uid'];
        $utype = $_POST['utype'];
        $pay = $_POST['paymethod'];

        $uploadDirectory = 'uploads/';

        $company_id = uploadFile('company_id', $uploadDirectory);
        $payslip = uploadFile('payslip', $uploadDirectory);
        $govern1 = uploadFile('govern1', $uploadDirectory);
        $govern2 = uploadFile('govern2', $uploadDirectory);
        $id_pic = uploadFile('id_pic', $uploadDirectory);
        $billing = uploadFile('billing', $uploadDirectory);
        $bertmarriage = uploadFile('bertmarriage', $uploadDirectory);
        $coe = uploadFile('coe', $uploadDirectory);
        $tinpass = uploadFile('tinpass', $uploadDirectory);
        $spa = uploadFile('spa', $uploadDirectory);

        if($uid == ''){
            $uid = 'None';
        }

        // Insert data into the database with file paths
        $conn->query("INSERT INTO reservation (name,email,phone,property_id,admin_agent_id,uid,payment_method, status,utype, company_id, payslip, government_id_1, government_id_2, id_pics, billing, birth_marriage_cert, employment_job_cert, tin_passport, spa) 
                VALUES('$name', '$email','$phone','$property_id','$admin_agent_id', '$uid','$pay','New','$utype', '$company_id', '$payslip', '$govern1', '$govern2', '$id_pic', '$billing', '$bertmarriage', '$coe', '$tinpass', '$spa')") or die($conn->error);

        $_SESSION['status'] = 'Request for Reservation Successfully Sent!';
        $_SESSION['status_icon'] = 'success';
        header('location:reservation.php');
    }

    function uploadFile($inputName, $uploadDirectory) {
        $targetFile = $uploadDirectory . basename($_FILES[$inputName]['name']);
        move_uploaded_file($_FILES[$inputName]['tmp_name'], $targetFile);
        return $targetFile;
    }

    // send email agent
    if (isset($_POST['agent_msg'])) {
        $id = $_POST['user_id'];
        $messages = $_POST['msg'];
        $emails = $_POST['email'];
        
        if ($id != ''){
            $conn->query("UPDATE reservation SET message='$messages' WHERE id='$id'") or die($conn->error);
            include 'agent_send_email.php';
            $_SESSION['status'] = 'Successfully Sent the Message!';
            $_SESSION['status_icon'] = 'success';
            header('location:custreservervation.php');
        }else{
            $_SESSION['status'] = 'An Error Occured!';
            $_SESSION['status_icon'] = 'danger';
            header('location:custreservervation.php');
        }

        
    }

    // submit sched booking
    if (isset($_POST['submit_book'])) {
        $property_id = $_POST['property_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $admin_agent_id = $_POST['admin_agent_id'];
        $uid = $_POST['uid'];
        $utype = $_POST['utype'];
        $date = $_POST['date_sched'];
        $time = $_POST['time_sched'];
        
        if($uid == ''){
            $uid = 'None';
        }
        $conn->query("INSERT INTO sched_book (property_id, admin_agent_id, user_id, user_type, username, email, phone, date_sched, time_sched) 
                VALUES('$property_id', '$admin_agent_id','$uid','$utype','$name', '$email', '$phone', '$date', '$time')") or die($conn->error);

        $_SESSION['status'] = 'Request for Scheduling Successfully Sent!';
        $_SESSION['status_icon'] = 'success';
        header('location:schedule.php');
    }

    // send email agent booking
    if (isset($_POST['agent_msg_booking'])) {
        $id = $_POST['user_id'];
        $messages = $_POST['msg'];
        $emails = $_POST['email'];
        
        if ($id != ''){
            $conn->query("UPDATE sched_book SET message='$messages' WHERE id='$id'") or die($conn->error);
            include 'agent_send_email.php';
            $_SESSION['status'] = 'Successfully Sent the Message!';
            $_SESSION['status_icon'] = 'success';
            header('location:custbooking.php');
        }else{
            $_SESSION['status'] = 'An Error Occured!';
            $_SESSION['status_icon'] = 'danger';
            header('location:custbooking.php');
        }

        
    }
    
?>