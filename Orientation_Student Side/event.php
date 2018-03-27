<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "database";

//Create Connection
$conn = new PDO ("mysql:host=$servername, dbname=$dbname", trim($uid), trim($pwd));

//Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
                    <a href="staffwp.html">Welcome</a>
                </li>
                <li>
                    <a href="database.html">Database</a>
                </li>
                <li>
                    <a href="print.html">Print</a>
                </li>
                <li>
                    <a href="events.html">Manage Events</a>
                </li>
                <li>
                    <a href="qstatistics.html">Questionnaire</a>
                </li>
                <li>
                    <a href="permissions.html">Permissions</a>
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
                <a href="" class="btn btn-primary" id="upload" style="float: right;">Sign Out</a>
                <p></p>
                <div id="heading">
                <h1>Manage Events</h1>
                <p class="center">In this section, you have the option to create, delete, or update the orientation events. If any change has been made to an event, a confirmation email will be sent out to students/staff that were associated with that event</p>
                <p class="center">If you have any questions, please contact New Student Orientation at 561-297-2733.</p>
                </div>
                <br>
                <h3>Create Events</h3>
                <br>
                <form class="pure-form" action="createevent.php" method="post">
                <div class="form-group" align="left">
                    <label>Type of event:</label>
                    <select id="options" name="tevent">
                        <option></option>
                        <option>Freshman</option>
                        <option>Transfer</option>
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
                        <option>12:00</option>
                        <option>1:00</option>
                        <option>2:00</option>
                        <option>3:00</option>
                        <option>4:00</option>
                        <option>5:00</option>
                        <option>6:00</option>
                        <option>7:00</option>
                        <option>8:00</option>
                        <option>9:00</option>
                        <option>10:00</option>
                        <option>11:00</option>
                    </select>
                    <select id="options" name="time2">
                        <option></option>
                        <option>AM</option>
                        <option>PM</option>
                    </select>
                </div>
                <li><label>Maximum number of students:<input type="text" class="pure-input-rounded"name="NumberStudents"></label></li>
                <div align="left">
                    <input type="submit" class="btn btn-primary" value="Create Event" />
                </div>
                </form>
                
                <?php

$eventtype = $_POST["tevent"];
$day = $_POST["edate"];
$time1 = $_POST["time1"];
$time2 = $_POST["time2"];
$numstud = $_POST["NumberStudents"];
$createEvent ="INSERT INTO ORIENTATION(student_type, event_date, event_time, attending_students) VALUES('$eventtype', '$day', '$time1', '$numstud');";

if ($conn->query($createEvent) === TRUE){
    echo "Event added";
    $to = "SELECT email FROM STUDENT WHERE student_id = ORIENTATION.student_id & event_id = ORIENTATION.event_id";
$subject = "New Event Created";
$txt = "A new event has been created! Please be sure to mark this date: ' . $day . '";
$headers = "From: orientationstaff@fau.edu" . "\r\n" .
"CC: orientationleader@fau.edu";

mail($to,$subject,$txt,$headers);

}
else {
    echo "Error in adding event!" . $conn->error;
}

                
                ?>
                
                <form class="pure-form" action="deleteevent.php" method="post">
                <div class="form-group" align="left">
                    <br>
                    <br>
                    <h3>Delete Events</h3>
                    <br>
                    <label>Upcoming events:</label>
                    <select id="options" name="uevents">
                        <option></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div align="left">
                    <input type="submit" class="btn btn-primary" value="Delete Event" />
                </div>
                </form>
                
                 <?php
        
        $event = $_POST["uevents"];
$deleteEvent ="DELETE FROM ORIENTATION WHERE event_id = '$event';"; 

if ($conn->query($deleteEvent) === TRUE){
    echo "Event deleted";
    $to = "SELECT email FROM STUDENT WHERE student_id = ORIENTATION.student_id & event_id = ORIENTATION.event_id;";
$subject = "Event deleted";
$txt = "An event has been deleted! Please be sure to check this date: ' . $day . '";
$headers = "From: orientationstaff@fau.edu" . "\r\n" .
"CC: orientationleader@fau.edu";

mail($to,$subject,$txt,$headers);
}
else {
    echo "Error in deleting event!" . $conn->error;
}
        
        ?>
                
                <form class="pure-form" action="updateevent.php" method="post">
                <div class="form-group" align="left">
                    <br>
                    <br>
                    <h3>Update Events</h3>
                    <br>
                    <label>Upcoming events:</label>
                    <select id="options" name="uevents">
                        <option></option>
                    </select>
                </div>
                <div align="left">
                    <input type="submit" class="btn btn-primary" value="Update Event" />
                </div>
                </form>
            </div>
        </div>
  <?php
        
        $event = $_POST["uevents"];
$updateEvent = "UPDATE FROM ORIENTATION WHERE event_id = '$event'';"; 

if ($conn->query($updateEvent) === TRUE){
    echo "Event updated";
    $to = "SELECT email FROM STUDENT WHERE student_id = ORIENTATION.student_id & event_id = ORIENTATION.event_id;";
$subject = "Event updated";
$txt = "An event has been updated! Please be sure to check this date: ' . $day . '";
$headers = "From: orientationstaff@fau.edu" . "\r\n" .
"CC: orientationleader@fau.edu";

mail($to,$subject,$txt,$headers);
}
else {
    echo "Error in updating event!" . $conn->error;
}

?>
        
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


$conn->close();

?>
 