<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    
    <head>
<?php
session_start();
        $studentid = $_SESSION['tid'];
        if($studentid==NULL)
        {
            header('Location: index.php');
        }
?>

        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Compilation Report of Class</title>
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
        <script src="amcharts.js" type="text/javascript"></script>
        <script src="pie.js" type="text/javascript"></script>
  


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

     
    <br><br><br><br>   
        
         <?php
         $user='root';
$pass='';
$db='proj';
$db_con=  mysqli_connect('localhost',$user,$pass,$db) or die("Unable to connet");

$stud=array();
$total1=array();
$batch=array();
$prog=array();
$i=0;
$j=0;
  $qu="SELECT DISTINCT bid FROM student";
  $ru=  mysqli_query($db_con, $qu);
  while($row1= mysqli_fetch_array($ru))
  {
  $total1[$j]=0;
  $q="select sid from student where bid='$row1[bid]'";
         $batch[$j]=$row1[0];
         $r=  mysqli_query($db_con,$q);
         while($batrow = mysqli_fetch_array($r))
         {
                 
                        $pr="select compilation as c from program where sid='$batrow[sid]'";
                        $result = mysqli_query($db_con,$pr);
                        while( $row= mysqli_fetch_array($result))
                        {
                        $total1[$j]=$total1[$j]+$row['c'];
                        }
         }
         
         $j++;
      
  } ?>       
        
        
        <script type="text/javascript">
            var chart;
            var legend;
            var chartData = [
            {
                country: "<?php echo "Batch .$batch[0]" ?>",
                litres: <?php echo $total1[0] ?>
            },
            <?php
            $i=1;
            $l=sizeof($batch);
            while($i<$l)
            {
            ?>
                    
                  {
                country: "<?php echo "Batch .$batch[$i]" ?>",
                litres: <?php echo $total1[$i] ?>
            },
             
         <?php 
         $i++;
            }
         ?>
                ];

            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();
                chart.dataProvider = chartData;
                chart.titleField = "country";
                chart.valueField = "litres";
                chart.outlineColor = "#FFFFFF";
                chart.outlineAlpha = 0.8;
                chart.outlineThickness = 2;

                // WRITE
                chart.write("chartdiv");
            });
        </script>
    </head>
    
    <body>
        <div id="chartdiv" style="width: 100%; height: 400px;"></div>
    <center><h3><b>Batch Wise Percentage of Compilation of Programs</b></h3></center>
    </body>

</html>