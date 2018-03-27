<?php
    session_start();
    if (!empty($_SESSION['Z#']))
    {
        // do nothing
    }

    else
    {
        header("Location: log_student.php");
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
                    <a href="personal.php"> <input id="info" input type="checkbox" name="info" onclick="">Personal Information</a>
                </li>
                <li>
                    <a href="questions.php"><input id="questions" input type="checkbox" name="questions" onclick="">Questionnaire</a>
                </li>
                <li>
                    <a href="dates.php"><input id="dates" input type="checkbox" name="dates" onclick="">Dates</a>
                </li>
                <li>
                    <a href="guests.html"><input id="guests" input type="checkbox" name="guests" onclick="">Guests</a>
                </li>
                <li>
                    <a href="prep.php"><input id="prep" input type="checkbox" name="prep" onclick="">Preplist</a>
                </li>
                <li>
                    <a href="reserve.php"><input id="rev" input type="checkbox" name="rev" onclick="">My Reservation</a>
                </li>
            </ul>
            <img src="faulogo1.jpg" align="left">
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="form-style-3">
                    <div id="heading">
                <h1>Dates</h1>
            
                <p>YOUR RESERVATION IS NOT COMPLETE UNTIL YOU SUBMIT YOUR ORIENTATION FEE. Once you submit payment, you will recieve a confirmation for your reservation. <br><br>
                        
                Orientation dates are filled first-come, first-served.Sessions will close automatically once filled, or two business days. If you do not see a date listed, that session has been closed. <br><br>
                        
                If you want to see dates for other campuses, pleasereturn to the Questionaire section and change the campus.</p>
            </div>
       
                <a href="#menu-toggle" id="menu-toggle" ><button style="float: left">Check Progress</button></a> 
                <a href="logout_student.php" class="btn btn-primary" id="upload" style="float: right;">Sign Out</a> <br><br><br>
                    
                <form class="pure-form" action="guests.html" method="post">
                    <fieldset><legend><b>Available Dates: </b></legend>
                    <?php
                        include('config.php');
                        $stype = "j";
                        //$_SESSION['campus'] = $_POST['campus'];
                        $campus = "Boca Raton";

                        
                        $query = "SELECT * FROM ORIENTATION WHERE student_type = :stype AND event_place = :place";
                        $statement = $conn->prepare($query);
                        $statement->execute(array('stype' => $stype, 'place' => $campus));
                        $result = $statement->fetchAll();
                        
                        
                        //iterate over all the rows
                        echo "<BR />";   
                        echo "<BR />";
                        
                        if(count($result)> 0)
                        {
                            //echo '<table border="10" style="background-color: white; border-color: red blue gold teal;"><tr><th>Date</th><th>PLace</th></tr>';
                        
                            for ($i = 0; $i < count($result); $i++)
                            {
                                $row = $result[$i];
                                echo '<input type="radio" name="avaliable_dates" value="';
                                echo i+1;
                                echo '">';
                                echo "<tr><td>" .$row["event_date"] ."</td><td>" .$row["event_place"] ."</td></tr>";
                                echo "<br>";
                            }
                        }
                        //Close connection
                        $conn = null;
                        
                        /*while($row = $result->fetch_assoc())
                        {
                            echo '<input type="checkbox">';
                            echo $row['event_date'] ."<BR/>" .$row['event_place'];
                        }*/
                    ?>

                   
                        </fieldset>
                                   <div class="Submit" align="middle">
                <input href="logout.php" type="submit" value="Exit" />
                <input href="#save"type="submit" value="Save Progress" />
                <input  type="submit" name="submit_form" value="Save and Continue" />
                   </div>
                    </form>
                </div>
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
    $("#sumbitform" ).click(function(f){
        f.preventDefault();
        
    })
                      $('.pure-form').submit(function(){
            return true;
        })
        $("#submit_form").click(function(){
            $(".pure-form").trigger('submit');
        })
    </script>
