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

    <title>Question Management</title>

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
                <h1>Questionnaire</h1>
                <p class="center">In this section, you may view or delete the current questions in the system. You may also add a new question to the list as well.</p>
                <p class="center">If you have any questions, please contact New Student Orientation at 561-297-2733.</p>
                </div>
                <br>
                <div class="grid">
                    <form method="post">
                        <input class="btn btn-outline-primary" type="submit" name="display" value="Display Current Questions">
                    </form>   
                    <div id="div1" class="tablehor">
                        <table>
                        <tr>
                            <th>question_id</th>
                            <th>content</th>
                        </tr>    
<?php
if(isset($_POST['display'])){
    $query = "SELECT * FROM QUESTION";
    $result = $db->query($query);
    echo "<BR />";   
    echo "<BR />";                    
    while($row = $result->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $row['question_id'];?></td>
            <td><?php echo $row['content'];?></td>
        </tr>
<?php }
}
?>    
                        </table>
                        <br>
                    </div>                  
                    <form class="pure-form" method="post">
                    <div class="form-group" align="left">
                        <br>
                        <br>
                        <h3>Delete Questions</h3>
                        <br>
                        <label>Select question id:</label>
                            <select id="options" name="question">
<?php                       
$query = "SELECT question_id FROM QUESTION";
$result = $db->query($query);                        
while ($row = $result->fetch_assoc()){
echo "<option>" . $row['question_id'] . "</option>";
}
?>
                            </select>
                    </div>
                    <div align="left">
                        <input class="btn btn-outline-primary" type="submit" name="delete" value="Delete Question">
                    </div>
                    </form>
<?php
if(isset($_POST['delete'])){
    $questionid2 = $_POST['question'];
    $sql = "DELETE FROM QUESTION WHERE question_id='$questionid2'";
    $result = $db->query($sql);
}
?> 
                
                <br>
                <form class="pure-form" method="post">
                <br>
                <br>
                <h3>Create New Questions</h3>
                <br>   
                <li><label>Question id:<input type="text" class="pure-input-rounded"name="qid"></label>
                <br>
                <li><label>New question (Must be YESY or NO question):<input type="text" class="pure-input-rounded"name="nquestion"></label></li>
                <div align="left">
                    <input class="btn btn-outline-primary" type="submit" name="cnquestion" value="Create Question">
                </div>
<?php
if(isset($_POST['cnquestion'])){
    $qid = $_POST['qid'];
    $nquestion = $_POST['nquestion'];
    $sql = "INSERT INTO QUESTION (question_id, content) VALUES ('$qid', '$nquestion')";
    $result = $db->query($sql);
}
?>
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
    </script>
</body>

</html>

 