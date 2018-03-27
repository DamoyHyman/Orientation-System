<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

</head>

<body>    
    <?php  
        session_start();
    
        include('config.php');
    if(!empty($_SESSION['Z#']))
    {
        echo "<h6>Now adding Guest.......</h6>";
    
        $guest1st=$_POST["guestfirstname"];
        $guestlast=$_POST["guestlastname"];
        $guestarea= $_POST["guestareacode"];
        $guestphone=$_POST["guestphnumber"];
        $guestemail = $_POST["email"];
        $student=$_SESSION['Z#'];
  
        $stmp=$conn->prepare("INSERT INTO GUEST VALUES('$student',' $guest1st', '$guestlast', '$guestarea', '$guestphone','$guestemail' , '444' );");
       
        $stmp->execute();
       
       $flag = $stmp->setFetchMode(PDO::FETCH_ASSOC);
       //$result = $stmp->fetchAll();
       $conn = null;
    
       
        //Redirect back to login
        header('Refresh: 2; URL = guests.html');
    }
    
?>  
    </body>
</html>