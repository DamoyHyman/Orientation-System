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
    

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    include('config.php');

    $_SESSION['campus'] = $_POST['campus'];
    $znum = $_SESSION['Z#'];
    $military = $_POST['Military'];
    $veterans = $_POST['Militarybenefit'];
    //$spiritual = $_POST["Spiritual"];    
    $faith = $_POST["faith"];
    $leadership = $_POST["Leadership"];
    //$tshirt = $_POST["T-shirt"];
    $tsize = $_POST["Tsize"];
    $mentor = $_POST["mentor"];
    $opa = $_POST["Owl Parent Association"];
   
    $query = $conn->prepare("INSERT INTO ANSWER VALUES('$znum',1, '$military');");
    $query->execute();

    $query = $conn->prepare("INSERT INTO ANSWER VALUES('$znum',2, '$veterans');");
    $query->execute();

    $query = $conn->prepare("INSERT INTO ANSWER VALUES('$znum',3, '$faith');");
    $query->execute();

    $query = $conn->prepare("INSERT INTO ANSWER VALUES('$znum',4, '$military');");
    $query->execute();

    $query = $conn->prepare("INSERT INTO ANSWER VALUES('$znum',5, '$leadership');");
    $query->execute();

    $query = $conn->prepare("INSERT INTO ANSWER VALUES('$znum',6, '$tsize');");
    $query->execute();

    $query = $conn->prepare("INSERT INTO ANSWER VALUES('$znum',7, '$mentor');");
    $query->execute();

    $query = $conn->prepare("INSERT INTO ANSWER VALUES('$znum',8, '$opa');");
    $query->execute();

    // Parent Info
    $p1firstname = $_POST["parent1firstname"];
    $p1lastname = $_POST["parent1lastname"];
    $p1email = $_POST["p1email"];
    $p1areacode = $_POST["p1areacode"];
    $p1phnumber = $_POST["p1phnumber"];
    $p2firstname = $_POST["parent2firstname"];
    $p2lastname = $_POST["parent2lastname"];
    $p2email = $_POST["p2email"];
    $p2areacode = $_POST["p2areacode"];
    $p2phnumber = $_POST["p2phnumber"];
    $accomodation = $_POST["accomodation"];
    
    $query = $conn->prepare("INSERT INTO PARENTS VALUES('$znum','$p1lastname', '$p1email', $p1areacode, $p1phnumber, '$p2firstname', '$p2lastname', '$p2email', $p2areacode, $p2phnumber);");
    $query->execute();

    $conn = null;
    


    $id= $_SESSION['Z#'];
    
    if(isset($_POST['submit_button'])){
        
     //   $stmp=$conn->prepare("INSERT INTO QUESTION(
     //   q1, q2, q3, q4, q5, q6, q7, q8 ,q9, q10, q11, q12, q13, q14, q15, q16, q17, q18, q19, q20) 
     //VALUES ($military, $veterans, $spiritual, $faith, $leadership, $tshirt, $tsize, $mentor, $opa, $accomodation) WHERE student_id = $sid;");
        
         $stmp1=$conn->prepare("UPDATE PARENTS where student_id= '$id' set firstname1 = $p1firstname, lastname1= $p2firstname, email1 = $p1email, phonecode1= $p1areacode, phone1 = $p1phnumber");
      
          $stmp1->execute();
                                  
    }

    //next page
    header("location: dates.php");
        

function user_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
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
        <div class="grid">
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="form-style-3">
                    
                    <form action="" type="post">
                    <div id="heading">
                <h1>Questionnaire</h1>
                <p class="center">The major listed below is what we have on record based on you application.</p>
                <p class="center">Unless you major is Architecture or Music, changing you major will not affect your orientation date and you <br>
                   can proceed with selecting an orientation date. If you have any questions about changing your major, please <br>
                   contact New Student Orientation at 561-297-2733.    
                </p>
                <p class="center">For Transfer student, the campus you select will impact which orientation session you see. You  may want to <br>
                   come back to this section and change your campus to see different orientation options.    
                </p>
                    </div>
                    
                <a href="#menu-toggle" id="menu-toggle" ><button style="float: left">Check Progress</button></a> 
                <a href="logout_student.php" class="btn btn-primary" id="upload" style="float: right;">Sign Out</a><br><br><br>
                        
                    <!-- Student Information grid -->
                    <div class="grid">
                    <form class="pure-form" action="parent.php" method="post">
                         <fieldset><legend><b>Student Information:</b></legend>
                             
                             <!-- Row 1 -->
                             <div class="row">
                                 <div class="col2">
                                     <li><label>Student type:</label></li>
                                </div>
                                 <div class="col8">
                                     <?php
                                        echo '<label><input class="pure-input-rounded" type="text" name="studenttype" value="';
                                        echo $_SESSION['student_type'];
                                        echo '" disabled></label>';
                                     ?>
                                     
                                     <!--label><input class="pure-input-rounded" type="text" name="studenttype" disabled></label-->
                                     
                                 </div>
                             </div>
                             <!-- Row 2 -->
                             <div class="row">
                                 <div class="col2">
                                    <li><label>Student Group(s):</label></li>
                                 </div>
                                     <div class="col8">
                                         <?php
                                            echo '<label><input class="pure-input-rounded" type="text" name="studentgroup" value="';
                                            echo null;
                                            'disabled></label>'
                                         ?>
                                         <!--label><input class="pure-input-rounded" type="text" name="studentgroup" disabled></label-->
                                     </div>
                             </div>
                             <!-- Row 3 -->
                             <div class="row">
                                 <div class="col2">
                                    <li><label>Semester:</label>
                                    </li>
                                 </div>
                                 <div class="col8">
                                     <?php
                                        echo '<label><input class="pure-input-rounded" type="text" name="semester" value="';
                                        echo $_SESSION['semester'];
                                        echo '"disabled></label>'
                                     ?>
                                     <!--label><input class="pure-input-rounded" type="text" name="semester"  disabled></label-->
                                 </div>
                            </div>
                             
                             <!-- Row 4 -->
                             <div class="row">
                                 <div class="col2">
                                 <li><label>Campus:</label>
                                     </li>        
                             </div>
                                 <div class="col8">
                                     <label><select name="campus">
                                            <option value="Boca Roton">Boca Roton </option>
                                            <option value="Jupiter">Jupiter</option>          
                                         </select></label>
                                 </div>
                               </div>
                             
                                <!-- Row 5 --> 
                             <div class="row">
                                 <div class="col2">
                             <li><label>Major:</label>
                             </li>
                               </div>
                                 <div class="col8">
                                     <?php
                                        echo '<label><input class="pure-input-rounded" type="text" name="major" value="';
                                        echo $_SESSION['major']; 
                                        echo '" disabled ></label>'
                                     ?>
                                     <!--label><input class="pure-input-rounded" type="text" name="major"  disabled ></label-->
                                 </div>
                            </div>
                        </fieldset>
                    </form>
                        </div>
                     <br><br>
                    
                    <!-- Additional Information form -->
                     <form class="pure-form" action="" method="post">
                           <fieldset><legend><b>Additional Information:</b></legend>
                               
                                   <div class="row">
                                       <div class="col4">
                                       <li>Are you a current member of the US Military or a US Military Veteran?</li>
                                    </div>
                                       <div class="col4">
                                           <input type="radio" name="Military" value="yes"> Yes
                                           <input type="radio" name="Military" value="no" > No
                                       </div>
                                        </div>
                               
                                   <div class="row">
                                       <div class="col4">
                                           <li name="">Are you a dependent receiving Veterans Affairs (VA) benefits?</li></div>
                                       <div class="col4">
                                            <input type="radio" name="Militarybenefit" value="yes"> Yes
                                            <input type="radio" name="Militarybenefit" value="no" > No
                                       </div>
                                    </div>
                               
                               <div class="row">
                                   <div class="col12">
                                       <li>Would you like to be contacted about one of FAU's faith based/spritual organization? If so, please
                                           indicate your preffered affiliaction (e.g Muslim, Christian, )
                                       </li>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col12 center">
                                       <label for="religion"><input type="text" name="faith"></label>
                                   </div>
                               </div>
                               
                               <div class="row">
                                       <div class="col4">
                                           <li>Would you like to be contacted for information about leadership opportunities on FAU's campus?</li></div>
                                       <div class="col4">
                                            <input type="radio" name="Leadership" value="yes"> Yes
                                            <input type="radio" name="Leadership" value="no" > No
                                       </div>
                                    </div>
                               
                               <div class="row">
                                   <div class="col12"><li><input type="checkbox" value="T-shirt"><b><u> Student Alumni Association</u></b> Membership ($25.00)(includes welcome package with T-shirt and <b><u>membership card</u></b>)
                                       </li>
                                   </div>
                               </div>
                               
                               <div class="row">
                                   <div class="col12 center">
                                       <label>T-Shirt size <select name="Tsize" required>
                                            <option value="Xs">Extra Small</option>
                                            <option value="S">Small</option> 
                                            <option value="L">Large</option>
                                           <option value="Xl">Extra Large</option>
                                         </select>
                                       </label>
                                   </div>
                               </div>
                               
                                   <div class="row">
                                       <div class="col4">
                                           <li>Are you interested in participating in the <b><u>Mentoring Project</u></b>?</li>
                                    </div>
                                       <div class="col4">
                                           <input type="radio" name="mentor" value="yes"> Yes
                                           <input type="radio" name="mentor" value="no" > No
                                       </div>
                                        </div>
                               
                               <div class="row">
                                   <div class="col12"><li><input type="checkbox" value="Owl Parent Association"><b><u>Owl Parent Association</u></b> Membership ($65.00)(includes lifetime membership for parents and families into the Owl Parent Association)
                                       </li>
                                   </div>
                               </div>
                               
                            </fieldset>
                        </form>
                    <br><br>
                    
                    <!-- Parent Information -->
                    <div class="grid">
                    <form class="pure-form" action="" method="post">
                         <fieldset><legend><b>Parent Information:</b></legend>
                           <li>Include your parent/guardian full name and e-mail address below:</li><br>
                             
                             <!-- Row 1 -->
                             <div class="row">
                                 <div class="col2">
                                     <li><label>Parent/Guardian 1 First Name:</label></li>
                                </div>
                                 <div class="col8">
                                     <label><input class="pure-input-rounded" type="text" name="parent1firstname"></label>
                                 </div>
                             </div>
                             
                             <!-- Row 2 -->
                             <div class="row">
                                 <div class="col2">
                                    <li><label>Parent/Guardian 1 Last Name:</label></li>
                                 </div>
                                     <div class="col8">
                                         <label><input class="pure-input-rounded" type="text" name="parent1lastname"></label>
                                     </div>
                             </div>
                             <!-- Row 3 -->
                             <div class="row">
                                 <div class="col2">
                                    <li><label>Parent/Guardian 1 E-Mail:</label>
                                    </li>
                                 </div>
                                 <div class="col8">
                                     <label><input class="pure-input-rounded" type="email" name="p1email"></label>
                                 </div>
                            </div>
                             
                             <!-- Row 4 -->
                             <div class="row">
                                 <div class="col2">
                                    <li><label>Parent/Guardian 1 Phone#:</label>
                                    </li>
                                 </div>
                                 <div class="col8">
                                     <label><input type="text" name="p1areacode" maxlength="3" size="3" placeholder="XXX">
                                            <input type="text" name="p1phnumber" maxlength="7" size="7" placeholder="XXXXXXX"></label>
                                 </div>
                            </div>
                             
                                <!-- Row 5 --> 
                              <div class="row">
                                 <div class="col2">
                                     <li><label>Parent/Guardian 2 First Name:</label></li>
                                </div>
                                 <div class="col8">
                                     <label><input class="pure-input-rounded" type="text" name="parent2firstname"></label>
                                 </div>
                             </div>
                             
                             <!-- Row 6 -->
                             <div class="row">
                                 <div class="col2">
                                    <li><label>Parent/Guardian 2 Last Name:</label></li>
                                 </div>
                                     <div class="col8">
                                         <label><input class="pure-input-rounded" type="text" name="parent2lastname"></label>
                                     </div>
                             </div>
                             <!-- Row 7 -->
                             <div class="row">
                                 <div class="col2">
                                    <li><label>Parent/Guardian 2 E-Mail:</label>
                                    </li>
                                 </div>
                                 <div class="col8">
                                     <label><input class="pure-input-rounded" type="email" name="p2email"></label>
                                 </div>
                            </div>
                             
                             <!-- Row 8 -->
                             <div class="row">
                                 <div class="col2">
                                    <li><label>Parent/Guardian 2 Phone#:</label>
                                    </li>
                                 </div>
                                 <div class="col8">
                                     <label><input type="text" name="p2areacode" maxlength="3" size="3" value="XXX">
                                            <input type="text" name="p2phnumber" maxlength="7" size="7" value="XXXXXXX"></label>
                                 </div>
                            </div>
                        </fieldset>
                    </form>
                        </div>
                     <br>
                    <!-- Accessibility -->
                     <form class="pure-form" action="" method="post">
                           <fieldset><legend><b>Accessibility:</b></legend>
                               <li>The office of New Student Orientation wishes to make Orientation sessions accessible to people of all abilities. If you need a resonable accomodation due to a disability to fully participate in any of these events, please contact Ashley Haynie by phone at 561-297-2733 or email at <b><u>ahaynie@fau.edu</u></b> or 711 TTY Relay Station. Please make your needs known 7 days prior to the orientation to allow sufficient time for accommodations. </li>
                               
                               <li><input type="checkbox" name="accommodation"> Accommodation Needs</li>
                         </fieldset>
                    
                    </form>
                         <div class="Submit" align="middle">
                            <input href="logout.php" type="submit" value="Exit" />
                            <input type="submit" value="Save Progress" />
                            <input type="submit" id="submit_button" name="submit_button" value="Save and Continue" />
                        </div>
                        </form>
                </div>
            </div>
               
            
        </div>
        <!-- /#page-content-wrapper -->
            </div>
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
        $('.pure-form').submit(function(){
            return true;
        })
        $("#submit_button").click(function(){
            $(".pure-form").trigger('submit');
        })
    </script>

</body>

</html>
