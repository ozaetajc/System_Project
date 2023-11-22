<?php
   $course =$_POST['course'];
   $year=$_POST['year'];
   $sy =$_POST['sy'];
   $admit =$_POST['admit'];
   $term =$_POST['term'];
   $fname =$_POST['fname'];
   $lname =$_POST['lname'];
   $mname =$_POST['mname'];
   $sname =$_POST['sname'];
   $gender =$_POST['gender'];
   $status =$_POST['status'];
   $nationality =$_POST['nationality'];
   $religion =$_POST['religion'];
   $age =$_POST['age'];
   $dob =$_POST['dob'];
   $pob =$_POST['pob'];
   $email =$_POST['email'];
   $address =$_POST['address'];
   $mobile =$_POST['mobile'];
   $elementary =$_POST['elementary'];
   $school_address1 =$_POST['school_address1'];
   $year_graduated1 =$_POST['year_graduated1'];
   $juniorhigh =$_POST['juniorhigh'];
   $school_address2 =$_POST['school_address2'];
   $year_graduated2 =$_POST['year_graduated2'];
   $photo = $_FILES['photo']['name'];
   $form_137 = $_FILES['form_137']['name'];
   
   $father_fname =$_POST['father_fname'];
   $father_lname =$_POST['father_lname'];
   $father_mname =$_POST['father_mname'];
   $father_sname =$_POST['father_sname'];
   $father_occupation =$_POST['father_occupation'];
   $father_email =$_POST['father_email'];
   $father_mobile =$_POST['father_mobile'];
   $father_age =$_POST['father_age'];

   $mother_fname =$_POST['mother_fname'];
   $mother_lname =$_POST['mother_lname'];
   $mother_mname =$_POST['mother_mname'];
   $mother_sname =$_POST['mother_sname'];
   $mother_occupation =$_POST['mother_occupation'];
   $mother_email =$_POST['mother_email'];
   $mother_mobile =$_POST['mother_mobile'];
   $mother_age =$_POST['mother_age'];

   $guardian_fname =$_POST['guardian_fname'];
   $guardian_lname =$_POST['guardian_lname'];
   $guardian_mname =$_POST['guardian_mname'];
   $guardian_sname =$_POST['guardian_sname'];
   $guardian_occupation =$_POST['guardian_occupation'];
   $guardian_email =$_POST['guardian_email'];
   $guardian_mobile =$_POST['guardian_mobile'];
   $guardian_age =$_POST['guardian_age'];



   $conn = new mysqli('localhost','root','','enrollment_system');
   if($conn->connect_error){
       die('Connection Failed : '.$conn->connect_error);
   }else{
    $stmt = $conn->prepare("insert into registration(course,fname,lname,mname,sname,year,sy,admit,term,gender,status,nationality,religion,age,dob,pob,email,address,mobile,elementary,school_address1,year_graduated1,juniorhigh,school_address2,year_graduated2,photo,form_137,
    father_fname,father_lname,father_mname,father_sname,father_occupation,father_email,father_mobile,father_age,mother_fname,mother_lname,mother_mname,mother_sname,mother_occupation,mother_email,mother_mobile,mother_age,
    guardian_fname,guardian_lname,guardian_mname,guardian_sname,guardian_occupation,guardian_email,guardian_mobile,guardian_age)
    values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param("ssssssissssssissssississibbssssssiissssssiissssssii",$course,$fname,$lname,$mname,$sname,$year,$sy,$admit,$term,$gender,$status,$nationality,$religion,$age,$dob,$pob,$email,$address,$mobile,$elementary,$school_address1,$year_graduated1,$juniorhigh,$school_address2,$year_graduated2,$photo,$form_137,
    $father_fname,$father_lname,$father_mname,$father_sname,$father_occupation,$father_email,$father_mobile,$father_age,$mother_fname,$mother_lname,$mother_mname,$mother_sname,$mother_occupation,$mother_email,$mother_mobile,$mother_age,
    $guardian_fname,$guardian_lname,$guardian_mname,$guardian_sname,$guardian_occupation,$guardian_email,$guardian_mobile,$guardian_age);
    
    if ($stmt->execute()) {
        $target_dir = "uploads/";
        move_uploaded_file($_FILES['photo']['tmp_name'], $target_dir . $photo);
        move_uploaded_file($_FILES['form_137']['tmp_name'], $target_dir . $form_137);


        header("Location: student_signup.php");
    exit();

    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>