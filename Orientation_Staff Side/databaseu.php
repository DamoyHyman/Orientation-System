<?php
require_once './php/db_connect.php';
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
                    <a href="database.php">Database</a>
                </li>
                <li>
                    <a href="print.php">Print</a>
                </li>
                <li>
                    <a href="event.php">Manage Events</a>
                </li>
                <li>
                    <a href="qstatistics.php">Questionnaire</a>
                </li>
                <li>
                    <a href="permissions.php">Permissions</a>
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
                <a href="database.php" class="btn btn-primary" id="upload">Search</a>
                <a href="databaseu.php" class="btn btn-primary" id="upload">Upload CSV</a>
                <a href="" class="btn btn-primary" id="upload" style="float: right;">Sign Out</a>
                <p></p>
                <h1>Upload CSV File</h1>
                <form>
                    <br>
                    <input type="file" name="csv">
                    <br><br>
                    <input class="btn btn-outline-primary" type="submit" value="Upload">
                </form> 
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