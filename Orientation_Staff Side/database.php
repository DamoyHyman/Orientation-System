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

    <title>Staff Orientation System Website</title>
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
                <a href="database.php" class="btn btn-primary" id="upload">Search</a>
                <a href="databaseu.php" class="btn btn-primary" id="upload">Upload CSV</a>
                <a href="logout.php" class="btn btn-primary" id="upload" style="float: right;">Sign Out</a>
                <p></p>
                <h1>Search Student Information</h1>
                <form method="post">
                    <br>
                    Enter students Z number: <input type="text" name="id">
                    <br><br>
                    <input class="btn btn-outline-primary" type="submit" name="search" value="Search">
                    <button class="btn btn-outline-primary" onclick="printContent('div1')">Print</button>
                </form>
                <br>
                <div id="div1" class="tablehor">
                    <table>
                    <tr>
                        <th>student_pidm</th>
                        <th>student_id</th>
                        <th>student_lname</th>
                        <th>student_fname</th>
                        <th>addr_lone</th> 
                        <th>addr_ltwo</th>  
                        <th>addr_lthree</th>  
                        <th>addr_city</th>
                        <th>addr_state</th>
                        <th>addr_zip</th> 
                        <th>addr_nation</th>
                        <th>phone_area_code</th>
                        <th>phone_no</th> 
                        <th>email</th> 
                        <th>birth_date</th>
                        <th>sex</th> 
                        <th>student_type</th> 
                        <th>admit_type</th>
                        <th>major</th> 
                        <th>college</th> 
                        <th>term_entry</th> 
                        <th>residency</th> 
                        <th>hours_earned</th> 
                        <th>gway</th> 
                        <th>vet_one</th> 
                        <th>vet_two</th> 
                        <th>vet_three</th> 
                        <th>vet_four</th> 
                        <th>hold1</th> 
                        <th>hold2</th> 
                        <th>hold3</th> 
                        <th>hold4</th> 
                        <th>hold5</th> 
                        <th>hold6</th> 
                        <th>hold7</th> 
                        <th>hold8</th> 
                        <th>CONCENTRATION</th> 
                        <th>ADMATTRIBUTE</th> 
                        <th>PROSPECT_EMAIL</th>
                    </tr>    
<?php
if(isset($_POST['search'])){
    $id = $_POST['id'];
    $query = "SELECT * FROM STUDENT WHERE student_id = '$id'";
    $result = $db->query($query);
    //iterate over all the rows
    echo "<BR />";   
    echo "<BR />";                    
    while($row = $result->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $row['student_pidm'];?></td>
            <td><?php echo $row['student_id'];?></td>
            <td><?php echo $row['student_lname'];?></td>
            <td><?php echo $row['student_fname'];?></td>
            <td><?php echo $row['addr_lone'];?></td>
            <td><?php echo $row['addr_ltwo'];?></td>
            <td><?php echo $row['addr_lthree'];?></td>
            <td><?php echo $row['addr_city'];?></td>
            <td><?php echo $row['addr_state'];?></td>
            <td><?php echo $row['addr_zip'];?></td>
            <td><?php echo $row['addr_nation'];?></td>
            <td><?php echo $row['phone_area_code'];?></td>
            <td><?php echo $row['phone_no'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['birth_date'];?></td>
            <td><?php echo $row['sex'];?></td>
            <td><?php echo $row['student_type'];?></td>
            <td><?php echo $row['admit_type'];?></td>
            <td><?php echo $row['major'];?></td>
            <td><?php echo $row['college'];?></td>
            <td><?php echo $row['term_entry'];?></td>
            <td><?php echo $row['residency'];?></td>
            <td><?php echo $row['hours_earned'];?></td>
            <td><?php echo $row['gway'];?></td>
            <td><?php echo $row['vet_one'];?></td>
            <td><?php echo $row['vet_two'];?></td>
            <td><?php echo $row['vet_three'];?></td>
            <td><?php echo $row['vet_four'];?></td>
            <td><?php echo $row['hold1'];?></td>
            <td><?php echo $row['hold2'];?></td>
            <td><?php echo $row['hold3'];?></td>
            <td><?php echo $row['hold4'];?></td>
            <td><?php echo $row['hold5'];?></td>
            <td><?php echo $row['hold6'];?></td>
            <td><?php echo $row['hold7'];?></td>
            <td><?php echo $row['hold8'];?></td>
            <td><?php echo $row['CONCENTRATION'];?></td>
            <td><?php echo $row['ADMATTRIBUTE'];?></td>
            <td><?php echo $row['PROSPECT_EMAIL'];?></td>
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