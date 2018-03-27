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

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar2.css" rel="stylesheet">

    <script>
    function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
    }
    </script>    
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
                <h1>Print</h1>
                <br>
                <form method="post">
                    <div class="form-group" align="left">
                        <label>Student Type:</label>
                        <select id="options" name="studentt">
                            <option>J</option>
                            <option>U</option>
                            <option>B</option>
                            <option>E</option>
                            <option>S</option>
                        </select>
                        <label>Admit Type:</label>
                        <select id="options" name="admitt">
                            <option>ST</option>
                            <option>TL</option>
                            <option>FC</option>
                            <option>RF</option>
                        </select>
                        <label>Event:</label>
                        <select id="options" name="event">
<?php                       
$query = "SELECT event_date FROM ORIENTATION";
$result = $db->query($query);                        
while ($row = $result->fetch_assoc()){
echo "<option>" . $row['event_date'] . "</option>";
}
?>
                        </select>
                        <label>Term:</label>
                        <select id="options" name="term">
<?php                       
$query = "SELECT term_entry FROM STUDENT";
$result = $db->query($query);                        
while ($row = $result->fetch_assoc()){
echo "<option>" . $row['term_entry'] . "</option>";
}
?>
                        </select>
                    </div>
                    <div align="left">
                        <input class="btn btn-outline-primary" type="submit" name="display" value="Display">
                        <button class="btn btn-outline-primary" onclick="printContent('div1')">Print</button>
                    </div>
                </form>    
                <br>
                <div id="div1" class="tablehor">
                    <table>
                    <tr>
                        <th>student_id</th>
                        <th>student_lname</th>
                        <th>student_fname</th>
                        <th>major</th> 
                        <th>college</th> 
                    </tr>    
<?php
if(isset($_POST['display'])){
    $studentt = $_POST['studentt'];
    $admitt = $_POST['admitt'];
    $event = $_POST['event'];
    $term = $_POST['term'];
    $query = "SELECT * FROM STUDENT_ORIENTATION INNER JOIN STUDENT ON STUDENT_ORIENTATION.student_id = STUDENT.student_id INNER JOIN ORIENTATION ON STUDENT_ORIENTATION.event_id = ORIENTATION.event_id WHERE STUDENT.student_type = '$studentt' AND STUDENT.admit_type = '$admitt' AND ORIENTATION.event_date = ' $event' AND STUDENT.term_entry = '$term'";
    $result = $db->query($query);
    echo "<BR />";   
    echo "<BR />";                    
    while($row = $result->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $row['student_id'];?></td>
            <td><?php echo $row['student_lname'];?></td>
            <td><?php echo $row['student_fname'];?></td>
            <td><?php echo $row['major'];?></td>
            <td><?php echo $row['college'];?></td>

        </tr>
<?php }
}
?>    
                    </table>    
                </div>
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