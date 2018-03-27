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
                <h1>Permissions</h1>
                <br>
                <form class="pure-form" method="post">
                    <h3>Add New User</h3>
                    <br>
                    <li><label>User system id:<input type="text" class="pure-input-rounded"name="Staffid" required></label></li>
                    <li><label>Name:<input type="text" class="pure-input-rounded"name="Staffname" required></label></li>
                    <li><label>Email:<input type="text" class="pure-input-rounded"name="StaffEmail" required></label></li>
                    <div class="form-group" align="left">
                        <br>
                        <label>Account Type:</label>
                        <select id="options" name="atype">
                            <option></option>
                        </select>
                    </div>
                    <li><label>Password:<input type="text" class="pure-input-rounded"name="StaffPassword" required></label></li>
                    <br>
                    <div align="left">
                    <input class="btn btn-outline-primary" type="submit" name="nuser" value="Create new user">
                    </div>
<?php
if(isset($_POST['nuser'])){
    $Staffid = $_POST['Staffid'];
    $Staffname = $_POST['Staffname'];
    $StaffEmail = $_POST['StaffEmail'];
    $atype = $_POST['atype'];
    $StaffPassword = $_POST['StaffPassword'];
    $sql = "INSERT INTO STAFF (staff_id, staff_name, staff_email, a_type, staff_password) VALUES ('$Staffid', '$Staffname', '$StaffEmail', '$atype', '$StaffPassword')";
    $result = $db->query($sql);
}
?>
                </form>
                <br>
                <h3>User Restrictions</h3>
                <br>
                <h3>Notification Email Options</h3>
                <br>
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