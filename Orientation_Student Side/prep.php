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
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div class="grid">
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="form-style-3">
                    <div id="heading">
                        <b><h1>Preplist</h1></b>
                        <li>Please read and acknowledge each of the items below to proceed.</li>
                
                        <li><h3>Preplist items</h3></li>
                        <li>Please review the following items:</li>
                    </div>
                 <br>
                      <a href="#menu-toggle" id="menu-toggle" ><button style="float: left">Check Progress</button></a> 
                <a href="logout_student.php" class="btn btn-primary" id="upload" style="float: right;">Sign Out</a> <br><br><br>
                    
                       <!-- Refund Policy -->
                   <form onsubmit="return checkForms(this);" action="reserve.php">
                        <fieldset><legend><b><h7>Refund Policy:</h7></b></legend>
                            <div class="row">
                                <div class="col10">
                                    <li>All orientation fees. including guest fees and orientation housing fees, are NON-REFUNDABLE. Pleas review your orientation reservation page carefully before submitting payment.
                                    </li>
                                    <br>
                                    <li role="checkbox"><input type="checkbox" name="refund" required> I have read and understand the above statemant.
                                    </li>
                                </div>
                            </div>
                        </fieldset>

                <br>
                 
                    <!-- Immunization Requirement -->
              
                    <fieldset><legend><b><h7>Immunization Requirement:</h7></b></legend>
                        <div class="row">
                            <div class="col10">
                                <li>All student must submit a signed immunization form before registering for classes. Student have an Immunization hold (IM) on their account until the form has be submitted. Submit your Immunization records before attending orientation 
                                </li>
                                <br>
                                <li><input type="checkbox" name="immunization requirement" required> I have read and understand the above statement.
                                </li>
                            </div>
                        </div>
                   </fieldset>

               <br>
                    <!-- OARS -->
    
                    <fieldset><legend><b><h7>OARS:</h7></b></legend>
                        <div class="row">
                            <div class="col10">
                                <li>Incoming first-year student will be advised via Online Advising and Resource  System (OARS) designed by University Advising Services. All freshman students must complete OARS before registering for classes and attending orientation. For more information, visit www.fau.edu/uas for detailed instructions and instructional videos or contact University Advising Services through email at advisingservices@fau.edu or 561-297-3064.
                                </li>
                                
                                <br>
                                <li><input type="checkbox" name="OARS" required> I have read and understand the above statement.
                                </li>
                            </div>
                        </div>
                    </fieldset>
                                   <div class="submit" align="middle">
                <input href="logout.php" type="submit" value="Exit" />
                <input href="#save" type="submit" value="Save Progress" />
                <input type="submit" value="Save and Continue" />
           </div>
       </form>
                </div>
            </div>
            <br>
            
        </div>
        <!-- /#page-content-wrapper -->
            </div>
        <!--- /#grid --->

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
        function checkForms(form)
    {
    ...
    if(!form.OARS.checked) {
      alert("");
      form.terms.focus();
      return false;
    }
    return true;
    
    }
        
    </script>

</body>

</html>
