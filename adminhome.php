<html>
<link rel="stylesheet" type="text/css" href="bootstrap.css">
<link rel="script" type="text/javascript" href="bootstrap.js">
<link rel="script" type="text/javascript" href="jquery.js">
<?php
session_start();
        $studentid = $_SESSION['aid'];
        if($studentid==NULL)
        {
            header('Location: index.php');
        }
?>

<link rel="stylesheet" href="codemirror.css">
<script src="codemirror.js"></script>
<script src="clike.js"></script>
  <link href="dashboard.css" rel="stylesheet">

<script type="text/javascript" src="validation.js"></script>
        <script src="amcharts.js" type="text/javascript"></script>
        <script src="serial.js" type="text/javascript"></script>
        <script src="pie.js" type="text/javascript"></script>

        <head><title>Administrator Dashboard</title></head>
<body >

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
        <li class="active"><a href="#">Administrator Home</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<b class="caret"></b></a>
          <ul class="dropdown-menu">
              <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <center><b><h2>List of Teachers</h2></b></center>
            <div class="jumbotron3">
               <div id="1" class="jumbotron">
            <div class="container">
                <form method="post"><br><?php
         $c=0;
         
         include_once 'connection.php';
         
        
         
         $q="select * from login_teacher order by fullname";
         $r=  mysqli_query($db_con,$q);
         
         while($row1= mysqli_fetch_array($r))
         {
             ?> 
            <div class="col-sm-4">
                <h4> 
                    <a href=''  id="fullname" style="text-decoration:none;color: white;">&nbsp;<?php echo $row1['fullname'];?></a></h4>&nbsp;&nbsp;&nbsp;
           </div>
               <?php
         }?></form></div>
               </div></div>
                <center><b><h2>Teacher Modification</h2></b></center>
          <div class="jumbotron2">
        <div id="3" class="jumbotron">
            
            <div class="container">
<br>
                <div class="col-md-4">   

                <form action="add_teacher.php">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Add Teacher</button></form></div>

                <div class="col-md-4">   
                    <form action="delete_teacher.php">

                    <button type="submit" class="btn btn-danger btn-lg btn-block">Delete Teacher</button></form>
                </div>                             


            </div>
        </div></div>

            
            
        </div>
      </div>
    </div>



<!-- Graph Code Begins-->
</body>
</html>