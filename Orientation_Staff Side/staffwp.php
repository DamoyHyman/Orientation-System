<?php
    session_start();
    if (!empty($_SESSION['user']) && !empty($_SESSION['user_priv']))
    {
        // Do nothing
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
                <h1>Welcome</h1>
                <p>Welcome <?php echo "<b>".$_SESSION['user']."</b>"?> to the administration side of the orientation system.  Here you will be able to search and upload to the database, 
                print student information, manage events for orientation, and edit questions for the questionaire in the students 
                regestration process.  If you have an administrator accoount you will have an extra option called permissions.  
                Here you can set up restriciton or add administrators to the staff loggging into the system.  Also, you can 
                decide who gets weekly or daily emails when changes are made to the website.  Select an option below 
                or click on the menu button on the top left corner.</p>
                <br>
                <br>
                <div class="center">
                    <?php
                        if ($_SESSION['user_priv'] == "S")
                        {
                            echo '<a href="database.php"><img src="images/DatabaseButton.png" alt="Database" width="200" height="200" ></a>';
                            echo '<a href="print.php"><img src="images/PrintButton.png" alt="Print" width="230" height="230"></a>';
                            echo '<a href="event.php"><img src="images/EventsButton.jpg" alt="Events" width="200" height="200"></a>';
                            echo '<a href="qstatistics.php"><img src="images/QuestionSymbol.jpg" alt="Question" width="210" height="210"></a>';
                            echo '<a href="permissions.php"><img src="images/PermissionButton.jpg" alt="Permission" width="190" height="190"></a>';
                        }
                    
                        else if ($_SESSION['user_priv'] == "N")
                        {
                            echo '<a href="print.php"><img src="images/PrintButton.png" alt="Print" width="230" height="230"></a>';
                            echo '<a href="qstatistics.php"><img src="images/QuestionSymbol.jpg" alt="Question" width="210" height="210"></a>';
                        }
                    ?>
                    
                    <!--a href="database.php"><img src="images/DatabaseButton.png" alt="Database" width="200" height="200" ></a-->
                    <!--a href="print.php"><img src="images/PrintButton.png" alt="Print" width="230" height="230"></a-->
                    <!--a href="event.php"><img src="images/EventsButton.jpg" alt="Events" width="200" height="200"></a-->
                    <!--a href="qstatistics.php"><img src="images/QuestionSymbol.jpg" alt="Question" width="210" height="210"></a-->
                    <!--a href="permissions.php"><img src="images/PermissionButton.jpg" alt="Permission" width="190" height="190"></a-->
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
