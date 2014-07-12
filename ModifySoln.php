<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        <title>
            Modify Solution
        </title>
    </head>
    <meta charset="UTF-8"><link rel="stylesheet" type="text/css" href="bootstrap.css">
<link rel="script" type="text/javascript" href="bootstrap.js">
<link rel="script" type="text/javascript" href="jquery.js">


<link rel="stylesheet" href="codemirror.css">
<script src="codemirror.js"></script>
<script src="clike.js"></script>
  <link href="dashboard.css" rel="stylesheet">

<script type="text/javascript" src="validation.js"></script>
  


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
          <li><a href="teacherhome.php">Teacher Home</a></li>
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
        <li class="dropdown active">
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

      <?php
      error_reporting(E_ERROR);
      

        $username = "root";
        $password = "";
        $hostname = "localhost"; 
        $db="proj";
        $dbhandle = mysqli_connect($hostname, $username, $password,$db)
         or die("Unable to connect to MySQL");
        mysqli_query($dbhandle,"SET NAMES 'utf8'");
        $sid=$_SESSION['sid']; 
        ?>



<div class="col-md-5 col-md-offset-3">
    
    <form  method="POST" action="ModifySoln1.php" >
        <center>
           
            <label for="SelError">Select Error</label> <select class="form-control" id="SelError" name="SelError" onclick="javascript:view(this.value);">
            <?php
            $result=mysqli_query($dbhandle, "select error from sol");        
            while($row= mysqli_fetch_array($result))
            {
                ?><option  value="<?php echo $row[error]; ?>">
                <?php echo $row[error];?>
                </option><?php 
            }

        ?>
                </select>
                <br><br>
            <label for="SelError">Generalised Error Statement: </label><input class="form-control" type="text" id="gestatement" name="gestatement"></h3><br>
            <label for="SelError">Solution</label>
            <textarea placeholder="Add Detail Solution Here" name="addsolnhere" class="form-control" rows="5"/></textarea>
            <br><br>
            <button name=btnadd type=submit value="Add"   class="btn btn-toolbar">Add</button>        
    </center>
    </form>
</div>
        <script type="text/javascript">
            function view(str)
            {
            document.getElementById('gestatement').value=str;
            }
        </script>
    </body>
</html>