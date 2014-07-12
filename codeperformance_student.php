<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<?php
session_start();
        $studentid = $_SESSION['tid'];
        if($studentid==NULL)
        {
            header('Location: index.php');
        }
?>
    

    <head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Error Report Batch-wise</title>
<link rel="stylesheet" type="text/css" href="bootstrap.css">
<link rel="script" type="text/javascript" href="bootstrap.js">
<link rel="script" type="text/javascript" href="jquery.js">
<link rel="script" type="text/javascript" href="script.js">


<link rel="stylesheet" href="codemirror.css">
<script src="codemirror.js"></script>
<script src="clike.js"></script>
<link href="dashboard.css" rel="stylesheet">
<link href="demo-styles.css" rel="stylesheet">

<script type="text/javascript" src="validation.js"></script>
  

<?php
$sid=$_SESSION['sid'];
$username = "root";
$password = "";
$hostname = "localhost"; 
$db="proj";
$dbhandle = mysqli_connect($hostname, $username, $password,$db)
  or die("Unable to connect to MySQL");
mysqli_query($dbhandle,"SET NAMES 'utf8'");
$count=0;
?><center><br><strong>Codes Performed by each Student <?php echo $sid;?></strong><table class="table table-hover" >
        <tr><th>Sr. No.</th><th>Program Name</th><th>Compilation</th><th>View Code</th></tr><?php
        $result1 = mysqli_query($dbhandle,"SELECT pname,compilation,ppath FROM program where sid='$sid'order by sid");
        while($row1 = mysqli_fetch_array($result1))
        {
            $count=$count+1;
            ?><tr><td>
<?php echo $count . "</td><td>" . $row1['pname'] . "</td><td>" . $row1['compilation'] . "</td><td><a href=code_for_teacher1.php?uid=" . $sid . "&ppath=".$row1['ppath'] . ">View Code</a>";
            echo "</tr>";   
        }
mysqli_close($dbhandle);  

?>
<body>

  <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="bootstrap.js"></script>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and to0ggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Analysis of Errors</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li ><a href="teacherhome.php">Teacher Home</a></li>
        <li class="active" ><a href="#">Error Report</a></li>
         </ul>
        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<b class="caret"></b></a>
          <ul class="dropdown-menu">
              <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Solution<b class="caret"></b></a>
          <ul class="dropdown-menu">
              <li><a href="AddSoln.php">Add Solution</a></li>
              <li><a href="ModifySoln.php">Modify Solution</a></li>
              <li><a href="DelSoln.php">Delete Solution</a></li>
          </ul>
        </li>
      </ul>
        
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br><br><br>

</body></html>