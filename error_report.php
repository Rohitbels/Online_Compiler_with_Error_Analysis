<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
    
        <script src="amcharts.js" type="text/javascript"></script>
        <script src="serial.js" type="text/javascript"></script>
        
        
        <script type="text/javascript">
            var chart;

            var chartData = [
        <?php
           header('Content-Type: text/html; charset=UTF-8');
     
        $username = "root";
$password = "";
$hostname = "localhost"; 
$db="proj";
$sid=$_GET['w1'];
$arr_comp=array();
$arr_pname=array();
$i=0;
        $_SESSION['sid']=$sid;
     
$dbhandle = mysqli_connect($hostname, $username, $password,$db)
  or die("Unable to connect to MySQL");
mysqli_query($dbhandle,"SET NAMES 'utf8'");
$count=0;

        $result1 = mysqli_query($dbhandle,"SELECT compilation,pname,ppath FROM program where sid='$sid'");
        while($row1 = mysqli_fetch_array($result1))
        {
            $arr_comp[$i]=$row1['compilation'];
            $arr_pname[$i]=$row1['pname'];
            $count++;
             $re = mysqli_query($dbhandle,"SELECT count(error) as c FROM err where sid='$sid' and pname='$row1[ppath]'");
              $cerr=  mysqli_fetch_array($re);  
        ?>
                
                {
                    "year": "<?php echo $row1['pname']?>",
                    "compilation": <?php echo $row1['compilation']?>,
                    "error": <?php echo $cerr['c']?>
                },
                        <?php
             }
            
            
mysqli_close($dbhandle);  

?>
            ];


            AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "year";
                chart.startDuration = 1;
                chart.plotAreaBorderColor = "#DADADA";
                chart.plotAreaBorderAlpha = 1;
                // this single line makes the chart a bar chart
                chart.rotate = true;

                // AXES
                // Category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridPosition = "start";
                categoryAxis.gridAlpha = 0.1;
                categoryAxis.axisAlpha = 0;

                // Value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.axisAlpha = 0;
                valueAxis.gridAlpha = 0.1;
                valueAxis.position = "top";
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // first graph
                var graph1 = new AmCharts.AmGraph();
                graph1.type = "column";
                graph1.title = "Compilation";
                graph1.valueField = "compilation";
                graph1.balloonText = "Compilation:[[value]]";
                graph1.lineAlpha = 0;
                graph1.fillColors = "#ADD981";
                graph1.fillAlphas = 1;
                chart.addGraph(graph1);

                // second graph
                var graph2 = new AmCharts.AmGraph();
                graph2.type = "column";
                graph2.title = "Error";
                graph2.valueField = "error";
                graph2.balloonText = "Error:[[value]]";
                graph2.lineAlpha = 0;
                graph2.fillColors = "#81acd9";
                graph2.fillAlphas = 1;
                chart.addGraph(graph2);

                // LEGEND
                var legend = new AmCharts.AmLegend();
                chart.addLegend(legend);

                chart.creditsPosition = "top-right";

                // WRITE
                chart.write("chartdiv");
            });
        </script>
    <?php
        $username = "root";
        $sid=$_GET['w1'];
        if($sid===NULL)
        {
            header('location:teacherhome.php');
        }
        $password = "";
        $hostname = "localhost"; 
        $db="proj";
        $dbhandle = mysqli_connect($hostname, $username, $password,$db)
         or die("Unable to connect to MySQL");
        mysqli_query($dbhandle,"SET NAMES 'utf8'");

        $result = mysqli_query($dbhandle,"SELECT error FROM err where sid='$sid' group by error order by count(*) desc");
        $row= mysqli_fetch_array($result);	
        $v1_dash_value=$row['error'];
        
        $result = mysqli_query($dbhandle,"select pname from err where sid='$sid' group by pname order by count(*) desc");
        $row= mysqli_fetch_array($result);    
        $ppath=$row['pname'];
       
        
        $result = mysqli_query($dbhandle,"SELECT pname from program where sid='$sid' and ppath='$ppath'");
        $row= mysqli_fetch_array($result);    	
        $v2_dash_value=$row['pname'];
        
        
        $result = mysqli_query($dbhandle,"select max(compilation) as m from program where sid='$sid'");
        $row= mysqli_fetch_array($result);    
        $comp=$row['m'];
        

         $result = mysqli_query($dbhandle,"SELECT pname from program where sid='$sid' and compilation='$comp'");
        $row= mysqli_fetch_array($result);    
        $v3_dash_value=$row['pname'];

        $result = mysqli_query($dbhandle,"SELECT error from err group by error order by count(*) desc");
        $row= mysqli_fetch_array($result);	
        $v4_dash_value=$row['error'];

        $v5_dash_value='View Code';

        
        $v1_dash_text='Most Common Error';
	$v2_dash_text='Most no. of errors in which program';
	$v3_dash_text='Most no. of compilation for which program';
	$v4_dash_text='Top Most Error';
	$v5_dash_text='View Code';
        
mysqli_close($dbhandle);
        

    ?>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Error Report</title>
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
<div class="row">
    <div class="col-md-6">
        <div class="dashboard clearfix">
    <ul class="tiles">
      <div class="col1 clearfix">
      <h3><b>Highlights</b></h3>  
        
          <li class="tile tile-big tile-1 slideTextUp" data-page-type="r-page" data-page-name="random-r-page">
              <a href="error_of_student.php" style="color: white">
          <div><p style="font-size:40px;"><span id="t1"><?php echo $v1_dash_text ?></span></p></div>
          <div><p style="font-size:20px;"><span id="v11"><?php echo $v1_dash_value ?></span></p></div>
              </a></li><br>
                <li class="tile tile-big tile-6 slideTextLeft" data-page-type="r-page" data-page-name="random-r-page">
          <div><p style="font-size:30px;"><span id="t2"><?php echo $v2_dash_text ?></span></p></div>
          <div><p style="font-size:45px;"><span id="v22"><?php echo $v2_dash_value ?></span></p></div>
      
                </li><br>
            <li class="tile tile-big tile-2 slideTextUp" data-page-type="r-page" data-page-name="random-r-page">
            <a href="codeperformance_student.php" style="color:white">
            <div><p style="font-size:36px;"><span id="t3"><?php echo $v3_dash_text ?></span></p></div>
          <div><p style="font-size:72px;"><span id="v33"><?php echo $v3_dash_value ?></span></p></div>
            </a></li>
          <li class="tile tile-big tile-11 slideTextUp" data-page-type="r-page" data-page-name="random-r-page">
            <a href="code_for_teacher.php?uid=<?php echo $sid ?> " style="color: white">
          <div><p style="font-size:40px;"><span id="t5"><?php echo $v5_dash_text ?></span></p></div>
          <div><p style="font-size:40px;"><span id="v55"><?php echo $v5_dash_value ?></span></p></div>
            </a></li>

      </div>
</div>
    </div>
  
  <div class="col-md-6"><h3><b>Performance Overview</b></h3>  
        <div id="chartdiv" style="width:500px; height:600px;"></div></div>
</div>

</body></html>