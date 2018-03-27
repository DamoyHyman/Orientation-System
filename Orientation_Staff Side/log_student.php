<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        include('config.php');
        
     try
     {
        $znumber = $_POST['Znumber'];
        $password = $_POST['password'];
        
        // SQL script for Student login in StudentLogin Table
        $query = "SELECT * FROM StudentLogin WHERE student_id = :Znumber AND password = :password"; 
        $statement = $conn->prepare($query);
        $statement->execute(array('Znumber' => $znumber,
                                  'password' => $password
                                 )
                           ); 
        $Logincount = $statement->rowCount();
        
         // SQL script to find student in the Student Table
         $query = "SELECT * FROM STUDENT WHERE student_id = :Znumber";
         $statement = $conn->prepare($query);
         $statement->execute(array('Znumber' => $znumber)); 
         $result = $statement->fetchAll();
         $studentcount = $statement->rowCount();
         $row = $result[0];
         
                    
         
         // Disconnect from database
        $conn = null;
         
        
        if ($Logincount == 1 && $studentcount == 1)
        { 
            // Start and save user session
            session_start();
            
            // Identification Info
            $_SESSION['Z#'] = $row["student_id"];
            $_SESSION['student_type'] = $row["student_type"];
            $_SESSION['firstname'] = $row["student_fname"];
            $_SESSION['lastname'] = $row["student_lname"];
            $_SESSION['DOB'] = $row["birth_date"];
            $_SESSION['gender'] = $row["sex"];
            $_SESSION['major'] = $row["major"];
            $_SESSION['semester'] = $row["term_entry"];
            
            // Permanent Address
            $_SESSION['addr_one'] = $row["addr_lone"];
            $_SESSION['addr_two'] = $row["addr_ltwo"];
            $_SESSION['city'] = $row["addr_city"];
            $_SESSION['state'] = $row["addr_state"];
            $_SESSION['zip'] = $row["addr_zip"];
            $_SESSION['country'] = $row["addr_nation"];
            $_SESSION['phone_area'] = $row["phone_area_code"];
            $_SESSION['phone#'] = $row["phone_no"];
            
            // Redirect
            header("location: personal.php");
        }
         
         else 
        {
            // Disconnect from database
           $conn = null;
           $error = "Your Login Name or Password is invalid";
           echo '<div style = "font-size:11px; color:#cc0000; margin-top:20px">' .$error .'</div>';
        }
    }
     
    catch(PDOException $e)
    {
       echo $e->getMessage();
    }   
    }

?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Student Login form</title>
  <script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>

<link href='https://fonts.googleapis.com/css?family=Raleway:300,200' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <link rel="stylesheet" href="log/css/style.css">

  
</head>

<body>
    <div class="banner">
        <img src="owl.jpg" >
        <h1>FLORIDA ATLANTIC UNIVERSITY</h1>
        <p1>New Student Orientation</p1>
    </div>
     
  <div class="menu">
  <ul class="mainmenu">
     
    <a href="http://www.fau.edu/admissions/faq.php"><li class="menuitem">FAQs</li></a>
    <a href="http://www.fau.edu/mentoringproject/resources/sservices.php"><li class="menuitem">Student Services</li></a>
      <a href="https://www.fau.edu/studentunion/administration/#"><li class="menuitem"><link href="#">About</li></a>
  </ul>
</div>
<div class="form">
  <div class="forceColor"></div>
  <div class="topbar">
    <div class="spanColor" style=";align-content: center; align-items: center;align-self: center; text-align: center"></div>
    <div class="container" style="align-content: center; align-items: center;align-self: center; text-align: center; color:whitesmoke;font-size: 20px"> <a href="log_staff.php" style="color:whitesmoke;font-size: 20px">Log as staff</a>
      
    <a href="log_student.php" style="color:whitesmoke;font-size: 20px">/Log as student</a></div>
    
    <form action="" method="post">
        <input type="text" style="border-top: 10px"class="input" id="sisid" name= "Znumber"placeholder="Z#" required>
        <input type="password" class="input" id="password" name="password" placeholder="Password"> 
        <button class="submit" id="submit" >Login</button>
    </form>
    </div>
  <script src="login.js"></script>
  
</div>
    
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>
</html>
