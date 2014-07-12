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

    <?php
        header('Content-Type: text/html; charset=UTF-8');
        $username = "root";
        $bid=$_GET['w1'];
        if($bid===NULL)
        {
            header('location:teacherhome.php');
        }
        $_SESSION['bid1']=$bid;
        $password = "";
        $hostname = "localhost"; 
        $db="proj";
        $dbhandle = mysqli_connect($hostname, $username, $password,$db)
         or die("Unable to connect to MySQL");
        mysqli_query($dbhandle,"SET NAMES 'utf8'");

        switch($bid)
        {
            case 'A':
            {
                $result = mysqli_query($dbhandle,"SELECT error FROM err where sid between '4501' AND '4515' group by error order by count(*) desc");
                $row= mysqli_fetch_array($result);	
                $v1_dash_value=$row['error'];
        
          
                $result = mysqli_query($dbhandle,"SELECT sid FROM err where sid between '4501' AND '4515' group by sid order by count(*) desc");
                $row= mysqli_fetch_array($result);    	
                $v2_dash_value=$row['sid'];
        
                $result = mysqli_query($dbhandle,"select max(compilation) as m from program where sid between '4501' AND '4515'");
                $row= mysqli_fetch_array($result);    
                $comp=$row['m'];
                
                
                $result = mysqli_query($dbhandle,"select sid from program where sid between '4501' AND '4515' and compilation='$comp'");
                $row= mysqli_fetch_array($result);    
                $sid=$row['sid'];
        
                $v3_dash_value=$row['sid'];
          
                break;
            }
        
            case 'B':
            {
                $result = mysqli_query($dbhandle,"SELECT error FROM err where sid between '4516' AND '4530' group by error order by count(*) desc");
                $row= mysqli_fetch_array($result);	
                $v1_dash_value=$row['error'];
        
          
                $result = mysqli_query($dbhandle,"SELECT sid FROM err where sid between '4516' AND '4530' group by sid order by count(*) desc");
                $row= mysqli_fetch_array($result);    	
                $v2_dash_value=$row['sid'];
        
                $result = mysqli_query($dbhandle,"select max(compilation) as m from program where sid between '4516' AND '4530'");
                $row= mysqli_fetch_array($result);    
                $comp=$row['m'];
                
                
                $result = mysqli_query($dbhandle,"select sid from program where sid between '4516' AND '4530' and compilation='$comp'");
                $row= mysqli_fetch_array($result);    
                $sid=$row['sid'];
        
                $v3_dash_value=$row['sid'];
          
                break;
            }    
            
            case 'C':
            {
                $result = mysqli_query($dbhandle,"SELECT error FROM err where sid between '4531' AND '4545' group by error order by count(*) desc");
                $row= mysqli_fetch_array($result);	
                $v1_dash_value=$row['error'];
        
          
                $result = mysqli_query($dbhandle,"SELECT sid FROM err where sid between '4531' AND '4545' group by sid order by count(*) desc");
                $row= mysqli_fetch_array($result);    	
                $v2_dash_value=$row['sid'];
        
                $result = mysqli_query($dbhandle,"select max(compilation) as m from program where sid between '4531' AND '4545'");
                $row= mysqli_fetch_array($result);    
                $comp=$row['m'];
                
                
                $result = mysqli_query($dbhandle,"select sid from program where sid between '4531' AND '4545' and compilation='$comp'");
                $row= mysqli_fetch_array($result);    
                $sid=$row['sid'];
        
                $v3_dash_value=$row['sid'];
          
                break;
            }    

            case 'D':
            {
                $result = mysqli_query($dbhandle,"SELECT error FROM err where sid between '4546' AND '4560' group by error order by count(*) desc");
                $row= mysqli_fetch_array($result);	
                $v1_dash_value=$row['error'];
        
          
                $result = mysqli_query($dbhandle,"SELECT sid FROM err where sid between '4546' AND '4560' group by sid order by count(*) desc");
                $row= mysqli_fetch_array($result);    	
                $v2_dash_value=$row['sid'];
        
                $result = mysqli_query($dbhandle,"select max(compilation) as m from program where sid between '4546' AND '4560'");
                $row= mysqli_fetch_array($result);    
                $comp=$row['m'];
                
                
                $result = mysqli_query($dbhandle,"select sid from program where sid between '4546' AND '4560' and compilation='$comp'");
                $row= mysqli_fetch_array($result);    
                $sid=$row['sid'];
        
                $v3_dash_value=$row['sid'];
          
                break;
            }    
            case 'E':
            {
                $result = mysqli_query($dbhandle,"SELECT error FROM err where sid between '4561' AND '4580' group by error order by count(*) desc");
                $row= mysqli_fetch_array($result);	
                $v1_dash_value=$row['error'];
        
          
                $result = mysqli_query($dbhandle,"SELECT sid FROM err where sid between '4561' AND '4580' group by sid order by count(*) desc");
                $row= mysqli_fetch_array($result);    	
                $v2_dash_value=$row['sid'];
        
                $result = mysqli_query($dbhandle,"select max(compilation) as m from program where sid between '4561' AND '4580'");
                $row= mysqli_fetch_array($result);    
                $comp=$row['m'];
                
                
                $result = mysqli_query($dbhandle,"select sid from program where sid between '4561' AND '4580' and compilation='$comp'");
                $row= mysqli_fetch_array($result);    
                $sid=$row['sid'];
        
                $v3_dash_value=$row['sid'];
          
                break;
            }    
            default:
            {
                header('Location:teacherhome.php');
            }
        }
/*        $result = mysqli_query($dbhandle,"SELECT error FROM err where sid='$sid' group by error order by count(*) desc");
        $row= mysqli_fetch_array($result);	
        $v1_dash_value=$row['error'];
        
        $result = mysqli_query($dbhandle,"select pid from err where sid='$sid' group by pid order by count(*) desc");
        $row= mysqli_fetch_array($result);    
        $pid=$row['pid'];
       
        
        $result = mysqli_query($dbhandle,"SELECT pname from program where sid='$sid' and pid='$pid'");
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
*/
        
        $v1_dash_text='Most Common Error';
	$v2_dash_text='Most no. of errors to which student';
	$v3_dash_text='Most no. of compilation by which student';
	$v5_dash_text='View Student Statistics';
        $v5_dash_value='Codes Performed by each Student in Batch '.$bid;
mysqli_close($dbhandle);
        

    ?>

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

  <div class="dashboard clearfix">
    <ul class="tiles">
        <div style="margin-left: 2.5%">
      <div class="col11 clearfix">
          <li class="tile tile-big tile-1 slideTextUp" data-page-type="r-page" data-page-name="random-r-page">
          <div><p style="font-size:40px;"><span id="t1"><?php echo $v1_dash_text ?></span></p></div>
          <div><p style="font-size:20px;"><span id="v11"><?php echo $v1_dash_value ?></span></p></div>
            </li>
           
      </div>

      <div class="col21 clearfix">
                <li class="tile tile-big tile-6 slideTextLeft" data-page-type="r-page" data-page-name="random-r-page">
          <div><p style="font-size:30px;"><span id="t2"><?php echo $v2_dash_text ?></span></p></div>
          <div><p style="font-size:60px;"><span id="v22"><?php echo $v2_dash_value ?></span></p></div>
        </li>

        
      </div>
      <div class="col31 clearfix">
        <li class="tile tile-big tile-2 slideTextUp" data-page-type="r-page" data-page-name="random-r-page">
          <div><p style="font-size:36px;"><span id="t3"><?php echo $v3_dash_text ?></span></p></div>
          <div><p style="font-size:72px;"><span id="v33"><?php echo $v3_dash_value ?></span></p></div>
        </li>
        
      </div>
        </div>
              <div class="col4 clearfix">
        <div style="margin-right: 2.5%">

        <li class="tile tile-big tile-11 slideTextUp" data-page-type="r-page" data-page-name="random-r-page">
            <a href="codeperformance.php" style="color: white">
          <div><p style="font-size:40px;"><span id="t5"><?php echo $v5_dash_text ?></span></p></div>
          <div><p style="font-size:40px;"><span id="v55"><?php echo $v5_dash_value ?></span></p></div>
            </a></li>
              </div>
              </div>
    </ul>
  </div><!--end dashboard-->



</body></html>