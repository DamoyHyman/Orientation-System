<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      // Connect to the database
    include("config.php");
     
     try
     {
        $username = $_POST['staff_id'];
        $password = $_POST['password'];
        
        // SQL script for user login
        $query = "SELECT * FROM STAFF WHERE staff_id = :username AND password = :password"; 
        $statement = $conn->prepare($query);
        $statement->execute(array('username' => $username, 'password' => $password)); 
        $count = $statement->rowCount();
        $result = $statement->fetchAll();
         
         // Disconnect from database
         $conn = null;
         
         if ($count == 1)
        {
            session_start();
            $row = $result[0];
            $_SESSION['user'] = $row["staff_id"];
            $_SESSION['user_priv'] = $row["priv"];
            
             $conn = null;
                 
             // Redirect
            header("location: staffwp.php");
            
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
<html>
<head>
  <meta charset="UTF-8">
  <title>Login form</title>
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
    <div>

        </div>
<div class="form">
  <div class="forceColor"></div>
  <div class="topbar">
    <div class="spanColor" style="color: whitesmoke; font-size: 25px"></div>   
      
        <div class="container" style="align-content: center; align-items: center;align-self: center; text-align: center; color:whitesmoke;font-size: 20px"> <a href="log_staff.php" style="color:whitesmoke;font-size: 20px">Log as staff</a>
      
    <a href="log_student.php" style="color:whitesmoke;font-size: 20px">/Log as student</a></div>
      
      <form action="" method="post">
        <input type="staffID" style="border-top: 10px"class="input" id="staff_id" placeholder="Email" name="staff_id"/>
        <input type="password" class="input" id="password" name="password"placeholder="Password"/>
          <button class="submit" id="submit" >Login</button>
      </form>
    </div>
  <script src="login.js"></script>
    
  <!--button class="submit" id="submit" >
      <a href="staffwp.php" style="color: whitesmoke">Log as staff</a>
    </button-->
</div>
    
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>
</html>