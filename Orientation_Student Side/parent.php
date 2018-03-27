<?php
    session_start();
    include('config.php');
    
$stype = $sgroup = $semester = $major = $military = $veterans = $spiritual = $faith = $leadership = $tshirt = $tsize = $mentor = $opa = 
$p1firstname = $p1lastname = $p1email = $p1areacode = $p1phnumber = 
$p2firstname = $p2lastname = $p2email = $p2areacode = $p2phnumber =
$accomodation = null;
    

    $_SESSION['campus'] = $_POST["campus"];
    $znum = $_SESSION['Z#'];
    $military = $_POST["Military"];
    $veterans = $_POST["Militarybenefit"];
    //$spiritual = $_POST["Spiritual"];    
    $faith = $_POST["faith"];
    $leadership = $_POST["Leadership"];
    //$tshirt = $_POST["T-shirt"];
    $tsize = $_POST["Tsize"];
    $mentor = $_POST["mentor"];
    $opa = $_POST["Owl Parent Association"];
   
    $query = $conn->prepare("INSERT INTO ANSWER VALUES('$znum',1, '$military');");
    $query->execute();

    $query = $conn->prepare("INSERT INTO ANSWER VALUES('$znum',2, '$veterans');");
    $query->execute();

    $query = $conn->prepare("INSERT INTO ANSWER VALUES('$znum',3, '$faith');");
    $query->execute();

    $query = $conn->prepare("INSERT INTO ANSWER VALUES('$znum',4, '$military');");
    $query->execute();

    $query = $conn->prepare("INSERT INTO ANSWER VALUES('$znum',5, '$leadership');");
    $query->execute();

    $query = $conn->prepare("INSERT INTO ANSWER VALUES('$znum',6, '$tsize');");
    $query->execute();

    $query = $conn->prepare("INSERT INTO ANSWER VALUES('$znum',7, '$mentor');");
    $query->execute();

    $query = $conn->prepare("INSERT INTO ANSWER VALUES('$znum',8, '$opa');");
    $query->execute();

    // Parent Info
    $p1firstname = $_POST["parent1firstname"];
    $p1lastname = $_POST["parent1lastname"];
    $p1email = $_POST["p1email"];
    $p1areacode = $_POST["p1areacode"];
    $p1phnumber = $_POST["p1phnumber"];
    $p2firstname = $_POST["parent2firstname"];
    $p2lastname = $_POST["parent2lastname"];
    $p2email = $_POST["p2email"];
    $p2areacode = $_POST["p2areacode"];
    $p2phnumber = $_POST["p2phnumber"];
    $accomodation = $_POST["accomodation"];
    
    $query = $conn->prepare("INSERT INTO PARENTS VALUES('$znum','$p1lastname', '$p1email', $p1areacode, $p1phnumber, '$p2firstname', '$p2lastname', '$p2email', $p2areacode, $p2phnumber);");
    $query->execute();

    $conn = null;
    


    $id= $_SESSION['Z#'];
    
    if(isset($_POST['submit_button'])){
        
     //   $stmp=$conn->prepare("INSERT INTO QUESTION(
     //   q1, q2, q3, q4, q5, q6, q7, q8 ,q9, q10, q11, q12, q13, q14, q15, q16, q17, q18, q19, q20) 
     //VALUES ($military, $veterans, $spiritual, $faith, $leadership, $tshirt, $tsize, $mentor, $opa, $accomodation) WHERE student_id = $sid;");
        
         $stmp1=$conn->prepare("UPDATE PARENTS where student_id= '$id' set firstname1 = $p1firstname, lastname1= $p2firstname, email1 = $p1email, phonecode1= $p1areacode, phone1 = $p1phnumber");
      
          $stmp1->execute();
                                  
    }

    //next page
    header("location: dates.php");
        

function user_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}


?>
                        
                    