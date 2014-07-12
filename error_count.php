<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
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
<title>Error Report of Class</title>
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
        <script src="serial.js" type="text/javascript"></script>
  


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

        
        
     <?php
     include_once 'connection.php';
$stud=array();
$total=array();
$batch=array();
$i=0;
$j=0;
  $qu="SELECT DISTINCT bid FROM student";
  $ru=  mysqli_query($db_con, $qu);
  while($row1= mysqli_fetch_array($ru))
  {
  $total[$j]=0;
  $q="select sid from student where bid='$row1[bid]'";
  $batch[$j]=$row1[0];
         $r=  mysqli_query($db_con,$q);
         while($batrow=  mysqli_fetch_array($r))
         {
                $stud[$i]=$batrow['sid']; 
                $e="select count(error) as c from err where sid='$stud[$i]'";
                $result = mysqli_query($db_con,$e);
                $row= mysqli_fetch_array($result);    
                $comp=$row['c'];
                $total[$j]=$total[$j]+$comp;
                     $i++;
         }
         
         
         $j++;
      
  } ?> 

    <br><br><br><br>

 <script type="text/javascript">
            var chart;

            var chartData = [
                <?php 
                 $len=sizeof($total);
                 $i=0;
                 $label="A";
                 while($i<($len))
                 {
                     
                ?>{
                    "country": "<?php echo "Batch .$batch[$i]" ?>",
                    "visits": <?php echo $total[$i] ?>
                },
            <?php
                $i++;
                $label++;
                 }
                 ?> 
            ];

   AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "country";
                chart.startDuration = 0;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.labelRotation = 0;
                categoryAxis.gridPosition = "start";

                // value
                // in case you don't want to change default settings of value axis,
                // you don't need to create it, as one value axis is created automatically.

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.valueField = "visits";
                graph.balloonText = "[[category]]: <b>[[value]]</b>";
                graph.type = "column";
                graph.lineAlpha = 0;
                graph.fillAlphas = 0.8;
                graph.fillColors="#81acd5";
                chart.addGraph(graph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorAlpha = 0;
                chartCursor.zoomable = false;
                chartCursor.categoryBalloonEnabled = false;
                chart.addChartCursor(chartCursor);

                chart.creditsPosition = "top-left";

                chart.write("chartdiv");
            });
        </script>
       



    <center>
         <div  id="chartdiv" style="width: 40%;height: 400px;">
              </div> <br>    
              <h3><b>Batch ID (X-Axis) Vs. Number of Errors (Y-Axis)</b>
              </h3></center>
 </body>
</html>