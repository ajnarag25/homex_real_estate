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
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
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
            }elseif(!empty($fname) && !empty($lname) && !empty($email) && !empty($phone) && !empty($pass1) && !empty($uimage)){
                if ($utype == 'agent') {
                    $sql="INSERT INTO user (fname,lname,uemail,uphone,upass,utype,uimage,ustatus,idnum) VALUES ('$fname', '$lname','$email','$phone','".password_hash($pass1, PASSWORD_DEFAULT)."','$utype','$uimage','Unverified','$idnum')";
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
                    $sql="INSERT INTO user (fname,lname,uemail,uphone,upass,utype,uimage,ustatus) VALUES ('$fname', '$lname','$email','$phone','".password_hash($pass1, PASSWORD_DEFAULT)."','$utype','$uimage','Unverified')";
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
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $cnum = $_POST['cnum'];
        $admin_agent_id = $_POST['admin_agent_id'];
        $uid = $_POST['uid'];
        $utype = $_POST['utype'];
        $message = $_POST['message'];
        if($uid == ''){
            $uid = 'None';
        }

        $conn->query("INSERT INTO inquire (fname, lname,email,cnum,property_id,admin_agent_id,uid,message,utype) 
                VALUES('$fname', '$lname', '$email','$cnum','$property_id','$admin_agent_id', '$uid','$message','$utype')") or die($conn->error);
        $_SESSION['status'] = 'Request for Inquiry Successfully Sent!';
        $_SESSION['status_icon'] = 'success';
        header('location:history.php');
    }

    if (isset($_POST['submit_inquire_no_acc'])) {
        $property_id = $_POST['property_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $cnum = $_POST['cnum'];
        $admin_agent_id = $_POST['admin_agent_id'];
        $uid = $_POST['uid'];
        $utype = $_POST['utype'];
        $message = $_POST['message'];
        if($uid == ''){
            $uid = 'None';
        }

        $conn->query("INSERT INTO inquire (fname, lname,email,cnum,property_id,admin_agent_id,uid,message,utype) 
                VALUES('$fname', '$lname', '$email','$cnum','$property_id','$admin_agent_id', '$uid','$message','$utype')") or die($conn->error);
        $_SESSION['status'] = 'Request for Inquiry Successfully Sent!';
        $_SESSION['status_icon'] = 'success';
        header('location:propertydetail.php?pid='.$property_id.'');
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
        $fname = $_SESSION['get_data']['fname'];
        $lname = $_SESSION['get_data']['lname'];
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
        totalfloor,user_type,useragent)VALUES('$title','$content','$ptype', '$stype','$bed','$bath','$balc','$kitc', '$hall', '$floor', '$asize', '$price', '$loc', '$city', '$feature','$aimage','$aimage1','$aimage2','$aimage3','$aimage4','$uid','$status', '$fimage','$fimage1','$fimage2','$totalfloor','$utype','$fname $lname')") or die($conn->error);
        
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

        if($uid == ''){
            $uid = 'None';
        }

        // Insert data into the database with file paths
        $conn->query("INSERT INTO reservation (name,email,phone,property_id,admin_agent_id,uid,payment_method, status,utype, company_id, payslip) 
                VALUES('$name', '$email','$phone','$property_id','$admin_agent_id', '$uid','$pay','New','$utype', '$company_id', '$payslip')") or die($conn->error);

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
    
    // send discount
    if (isset($_POST['agent_disc'])) {
        $id = $_POST['user_id'];
        if($_POST['discount']){
            $discount = $_POST['discount'];
        }else{
            $discount = $_POST['disc'];
        }

        // $uploadDirectory = 'uploads/';

        // $file = uploadFile('file_discount', $uploadDirectory);

        if ($id != ''){
            // $conn->query("UPDATE reservation SET discount='$discount' , computation='$file' WHERE id='$id'") or die($conn->error);
            $conn->query("UPDATE reservation SET discount='$discount' WHERE id='$id'") or die($conn->error);
            $_SESSION['status'] = 'Successfully Set a Discount!';
            $_SESSION['status_icon'] = 'success';
            header('location:custreservervation.php');
        }else{
            $_SESSION['status'] = 'An Error Occured!';
            $_SESSION['status_icon'] = 'danger';
            header('location:custreservervation.php');
        }

    }

    // change status
    if (isset($_POST['change_stat'])) {
        $status = $_POST['stat'];
        $property_id = $_POST['prop_id'];
    
        if ($property_id != '') {
            // Fetch the current status from the database
            $result = $conn->query("SELECT stype FROM property WHERE pid='$property_id'");
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $currentStatus = $row['stype'];
    
                // Check if there are no changes
                if ($currentStatus != $status) {
                    // Update the status
                    $conn->query("UPDATE property SET stype='$status' WHERE pid='$property_id'") or die($conn->error);
    
                    $_SESSION['status'] = 'Successfully Changed the Status';
                    $_SESSION['status_icon'] = 'success';
                } else {
                    $_SESSION['status'] = 'No Changes Made';
                    $_SESSION['status_icon'] = 'info';
                }
    
                header('location:custreservervation.php');
            } else {
                $_SESSION['status'] = 'An Error Occurred!';
                $_SESSION['status_icon'] = 'danger';
                header('location:custreservervation.php');
            }
        } else {
            $_SESSION['status'] = 'An Error Occurred!';
            $_SESSION['status_icon'] = 'danger';
            header('location:custreservervation.php');
        }
    }
    
    // mark as complete
    if (isset($_POST['mark_complete'])) {
        $id = $_POST['user_id'];

        if (!empty($id)){
            $conn->query("DELETE FROM sched_book WHERE user_id='$id'") or die($conn->error);
            $_SESSION['status'] = 'Successfully Marked as Complete!';
            $_SESSION['status_icon'] = 'success';
            header('location:custbooking.php');
        }else{
            $_SESSION['status'] = 'An Error Occured!';
            $_SESSION['status_icon'] = 'danger';
            header('location:custbooking.php');
        }

    }

    // tag status
    if (isset($_POST['tagging_status'])){
        $id = $_POST['user_id'];
        $property_id = $_POST['prop_id'];
        $stat = $_POST['tag_stat'];
        $dp = $_POST['downpayment'];

        if($dp < 20000 AND $dp != ''){
            $_SESSION['status'] = 'You inputted lower than P20,000';
            $_SESSION['status_icon'] = 'warning';
            header('location:custreservervation.php');
        }
        else{
            if($dp != ''){
                $downpayment = $dp;
            }else{
                $downpayment = 20000;
            }
            if ($id != ''){
                $conn->query("UPDATE reservation SET tag_stat='$stat', reservation_fee='$downpayment' WHERE uid='$id' AND property_id='$property_id'") or die($conn->error);
                $_SESSION['status'] = 'Successfully Tagged!';
                $_SESSION['status_icon'] = 'success';
                header('location:custreservervation.php');
            }else{
                $_SESSION['status'] = 'An Error Occured!';
                $_SESSION['status_icon'] = 'danger';
                header('location:custreservervation.php');
            }
        }
    }


    // reply message sched
    if (isset($_POST['reply_msg_sched'])){
        $id = $_POST['uid'];
        $reply = $_POST['reply'];

        if ($id != ''){
            $conn->query("UPDATE sched_book SET reply='$reply' WHERE id='$id'") or die($conn->error);
            $_SESSION['status'] = 'Successfully Send your Message';
            $_SESSION['status_icon'] = 'success';
            header('location:schedule.php');
        }else{
            $_SESSION['status'] = 'An Error Occured!';
            $_SESSION['status_icon'] = 'danger';
            header('location:schedule.php');
        }
    }

    // rechedule book for tripping
    if (isset($_POST['reched_book'])){
        $id = $_POST['uid'];
        $date = $_POST['date_sched'];
        $time = $_POST['time_sched'];

        if ($id != ''){
            $conn->query("UPDATE sched_book SET date_sched='$date', time_sched='$time' WHERE id='$id'") or die($conn->error);
            $_SESSION['status'] = 'Successfully Rescheduled your Tripping';
            $_SESSION['status_icon'] = 'success';
            header('location:schedule.php');
        }else{
            $_SESSION['status'] = 'An Error Occured!';
            $_SESSION['status_icon'] = 'danger';
            header('location:schedule.php');
        }
    }

    // reply message reserve
    if (isset($_POST['reply_msg_reserve'])){
        $id = $_POST['uid'];
        $reply = $_POST['reply'];

        if ($id != ''){
            $conn->query("UPDATE reservation SET reply='$reply' WHERE id='$id'") or die($conn->error);
            $_SESSION['status'] = 'Successfully Send your Message';
            $_SESSION['status_icon'] = 'success';
            header('location:reservation.php');
        }else{
            $_SESSION['status'] = 'An Error Occured!';
            $_SESSION['status_icon'] = 'danger';
            header('location:reservation.php');
        }
    }


    // forgot password
    if (isset($_POST['reset_password'])) {
        $emails = $_POST['email'];
        $setOTP = rand(0000,9999);

        $sql = "SELECT * FROM user WHERE uemail='$emails'";
        $result = mysqli_query($conn, $sql);
        $check = mysqli_num_rows($result);
        if ($check == 0){
            $_SESSION['status'] = 'Email is not registered';
            $_SESSION['status_icon'] = 'error';
            header('location:login.php');
        }else{
            $conn->query("UPDATE user SET otp=$setOTP WHERE uemail='$emails'") or die($conn->error);
            include 'otp_email.php';
            header("Location: otp.php");
        }

    }

    // otp submit
    if (isset($_POST['otp_submit'])) {
        $otp = $_POST['otp'];
        $_SESSION['otp'] = $otp;

        $sql = "SELECT * FROM user WHERE otp='$otp'";
        $result = mysqli_query($conn, $sql);
        $check = mysqli_num_rows($result);

        if ($check == 0){
            $_SESSION['status'] = 'OTP entered is wrong!';
            $_SESSION['status_icon'] = 'error';
            header('location:otp.php');
        }else{
            header("Location: change_pass.php");
        }
    }

    // change password
    if (isset($_POST['change_pass'])) {
        $password1 = $_POST['newpass1'];
        $password2 = $_POST['newpass2'];
        $get_otp = $_SESSION['otp'];
        
        if ($password1 != $password2){
            $_SESSION['status'] = 'Password does not match!';
            $_SESSION['status_icon'] = 'error';
            header('location:change_pass.php');
        }else{
            $conn->query("UPDATE user SET upass='".password_hash($password1, PASSWORD_DEFAULT)."' WHERE otp='$get_otp'") or die($conn->error);
            $_SESSION['status'] = 'Successfully Changed your Password';
            $_SESSION['status_icon'] = 'success';
            header('location:login.php');
        }

    }
    
?>