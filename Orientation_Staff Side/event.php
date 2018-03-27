<?php
    session_start();
    if (!empty($_SESSION['user']) && !empty($_SESSION['user_priv']))
    {
        require_once './php/db_connect.php';
    }

    else
    {
        echo "You are not logged in....";
        header("location: log_staff.php");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event Management</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li>
                    <a href="staffwp.php">Welcome</a>
                </li>
                <li>
                    <?php
                        if($_SESSION['user_priv'] == "S") 
                        {
                            echo '<a href="database.php">Database</a>';
                        }
                    ?>
                </li>
                <li>
                     <?php
                        if ($_SESSION['user_priv'] == "S" || $_SESSION['user_priv'] == "N")
                        {
                            echo '<a href="print.php">Print</a>';
                        }
                    ?>
                </li>
                <li>
                    <?php
                        if($_SESSION['user_priv'] == "S") 
                        {
                            echo '<a href="event.php">Manage Events</a>';
                        }
                    ?>
                </li>
                <li>
                     <?php
                        if($_SESSION['user_priv'] == "S" || $_SESSION['user_priv'] == "N") 
                        {
                            echo '<a href="qstatistics.php">Questionnaire</a>';
                        }
                    ?>
                </li>
                <li>
                    <?php
                        if($_SESSION['user_priv'] == "S") 
                        {
                            echo '<a href="permissions.php">Permissions</a>';
                        }
                    ?>
                </li>
            </ul>
            <br>
            <br>
            <br>
            <br>
            <br>
            <img class="logo" src="images/FloridaAtlanticLogo.jpg" width="250" height="800">
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <a href="#menu-toggle" class="btn btn-primary" id="menu-toggle">Menu</a>
                <a href="logout.php" class="btn btn-primary" id="upload" style="float: right;">Sign Out</a>
                <p></p>
                <div id="heading">
                <h1>Manage Events</h1>
                <p class="center">In this section, you have the option to create, delete, or update the orientation events. If any change has been made to an event, a confirmation email will be sent out to students/staff that were associated with that event</p>
                <p class="center">If you have any questions, please contact New Student Orientation at 561-297-2733.</p>
                </div>
                <br>
                <h3>Create Events</h3>
                <br>
                <form class="pure-form" method="post">
                <li><label>Event id:<input type="text" class="pure-input-rounded"name="eid"></label>
                <br>
                <div class="form-group" align="left">
                    <label>Student event type:</label>
                    <select id="options" name="tevent">
                        <option></option>
                        <option>B</option>
                        <option>J</option>
                    </select>
                </div>
                <div class="form-group" align="left">
                    <label>Admit event type:</label>
                    <select id="options" name="aevent">
                        <option></option>
                        <option>ST</option>
                        <option>TL</option>
                        <option>FC</option>
                        <option>RF</option>
                    </select>
                </div>
                <div class="form-group" align="left">
                <label>Date:</label>
                    <input type="date" name="edate">
                </div>
                <div class="form-group" align="left">
                    <label>Time:</label>
                    <select id="options" name="time1">
                        <option></option>
                        <option>1:00:00</option>
                        <option>2:00:00</option>
                        <option>3:00:00</option>
                        <option>4:00:00</option>
                        <option>5:00:00</option>
                        <option>6:00:00</option>
                        <option>7:00:00</option>
                        <option>8:00:00</option>
                        <option>9:00:00</option>
                        <option>10:00:00</option>
                        <option>11:00:00</option>
                        <option>12:00:00</option>
                    </select>
                </div>
                <div class="form-group" align="left">
                    <label>Location:</label>
                    <select id="options" name="locatione">
                        <option></option>
                        <option>Boca Raton</option>
                        <option>Jupiter</option>
                        <option>Davie</option>
                    </select>
                </div>
                <li><label>Maximum number of students:<input type="text" class="pure-input-rounded"name="NumberStudents"></label></li>
                <div align="left">
                    <input class="btn btn-outline-primary" type="submit" name="cevent" value="Create Event">
                </div>
<?php
if(isset($_POST['cevent'])){
    $eid = $_POST['eid'];
    $eventtype = $_POST['tevent'];
    $eventa = $_POST['aevent'];
    $day = $_POST['edate'];
    $time1 = $_POST['time1'];
    $numstud = $_POST['NumberStudents'];
    $location = $_POST['locatione'];
    $datetime = $day . ' ' . $time1;
    $sql = "INSERT INTO ORIENTATION (event_id, attending_students, student_type, admit_type, event_date, event_place) VALUES ('$eid', '$numstud', '$eventtype', '$eventa', '$datetime', '$location')";
    $result = $db->query($sql);
}
?>
                </form>
                
                
                <form class="pure-form" method="post">
                <div class="form-group" align="left">
                    <br>
                    <br>
                    <h3>Delete Events</h3>
                    <br>
                    <label>Upcoming events:</label>
                        <select id="options" name="event">
<?php                       
$query = "SELECT event_id FROM ORIENTATION";
$result = $db->query($query);                        
while ($row = $result->fetch_assoc()){
echo "<option>" . $row['event_id'] . "</option>";
}
?>
                        </select>
                </div>
                <div align="left">
                    <input class="btn btn-outline-primary" type="submit" name="delete" value="Delete">
                </div>
                </form>
<?php
if(isset($_POST['delete'])){
    $eventid2 = $_POST['event'];
    $sql = "DELETE FROM ORIENTATION WHERE event_id='$eventid2'";
    $result = $db->query($sql);
}
?> 
            </div>
        </div>
        
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
 