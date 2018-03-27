<?php  

session_start();
include('config.php');
 /*$serverName = "localhost";   
   $database = "pcolas2015";  

   // Get UID and PWD from application-specific files.   
   $uid = "pcolas2015" ; 
   $pwd = "1Rmx38QsBu";  
*/

 
      //$conn = new PDO( "mysql:host=$serverName;dbname = $database", trim($uid), trim($pwd));   
      //$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );   
                 //     echo "connected";
      
      // $sql = "use pcolas2015;";
       //$conn->exec($sql);
     
       //code to check first page if valid input is used 
    
//$znumber=$_POST['znumber'];
//$password=$_POST['passw'];
//avoid hackers
//$znumber = mysql_real_escape_string($znumber);
//$password = mysql_real_escape_string($password);
//$conn = new mysqli($servername, $username, $password, $dbname);
  

    
//code to get info for second page student info page
    //1st form
//$z_number = $_GET['z#'];
//$z_number = $_GET['z#'];

//$suffix = $_GET['suffix'];

$znum = $_SESSION['Z#'];

//2nd form
$address1 = $_POST['address1'];
//$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zipcode'];
$country = $_POST['country'];

$area_code = $_POST['areacode'];
$phone_number = $_POST['phnumber'];
    
     if($address1 != $_SESSION['addr_one'])
     {
         $stmp=$conn->prepare("UPDATE STUDENT  SET addr_lone = '$address1' WHERE student_id =  '$znum';");

     /* $stmp=$conn->prepare("INSERT INTO STUDENT (student_id, student_fname, student_lname, sex, addr_lone, addr_ltwo, addr_city, addr_state, addr_zip, addr_nation, phone_area_code,phone_no, birth_date) VALUES ('Z22111111', '$first_name','$last_name','$gender','$address1','$address2','$city','$state','$zip','$country ','$area_code','$phone_number', '$date_query')");
      */
      $stmp->execute();
     //next page
         
        $stmp=$conn->prepare("UPDATE STUDENT set addr_city= '$city' WHERE student_id = '$znum'  ;");
           $stmp->execute();
        $stmp=$conn->prepare("UPDATE STUDENT SET addr_zip = $zip WHERE student_id = '$znum' ;");
           $stmp->execute();
         
         $stmp=$conn->prepare("UPDATE STUDENT SET  addr_nation = '$country' WHERE student_id = '$znum' ;");
           $stmp->execute();
         $stmp=$conn->prepare("UPDATE STUDENT SET phone_area_code = $area_code WHERE student_id = '$znum' ; ");
           $stmp->execute();
           $stmp=$conn->prepare("UPDATE STUDENT SET  phone_no= $phone_number  WHERE student_id = '$znum' ;");
           $stmp->execute();
         
     }
      $conn = NULL;
      header("location: http://lamp.cse.fau.edu/~pcolas2015/project1/questions.html");
      header("location: questions.php");

?>  