<?php
if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
}
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
<title>Teacher Deletion Page</title>
<style type="text/css">
    
    .pos
{
position:relative;
top:280px;
left:300px;	
}
.quo
{
	
font-family: calibri;

}
.quo-color
{
	color: red;

}

@font-face {
    font-family: 'Calibri';
    src: url('fonts/Calibri.ttf')format('truetype');
    font-weight: normal;
    font-style: normal;
}
.head-title
{
	font-size: 30;
  font-family: calibri;
}
body { padding-top: 70px; }

</style>

<script type="text/javascript">
    function isChar(str) {
  return /^[a-z,A-Z,0-9()]+$/.test(str);
}
    function formValidation()  
{  
  
var tname = document.forms["register"]["txtusername"].value;

    if(tname==="")
    {
        alert('Please enter a Valid Teacher Name');
        return false;
    }

    return true;
}</script>
</head>
<body>
    
    
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="brand"><p  class="navbar-text" >&nbsp;&nbsp;&nbsp;Analysis of Errors</small></p></div>


    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li ><a href="adminhome.php">Administrator Home</a></li>
        </ul>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Delete Teacher</a></li>
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

      
    </div><!-- /.navbar-collapse -->
</nav>
    
    <br>
    <br>
    <div class='col-md-offset-2'>
    <h2 style="font-family: calibri">Teacher Deletion Page</h2>
    </div>
    <br>
          <?php
      error_reporting(E_ERROR);

        $username = "root";
        $password = "";
        $hostname = "localhost"; 
        $db="proj";
        $dbhandle = mysqli_connect($hostname, $username, $password,$db)
         or die("Unable to connect to MySQL");
        mysqli_query($dbhandle,"SET NAMES 'utf8'");
        ?>

    
<form class="form-horizontal" onSubmit="return formValidation();" name="register" action="teacher_delete.php" method="GET" role="form">
    <div class="form-group">        
        <label for="inputcodename" class="col-sm-2 control-label">Select Teacher</label> 
        <div class="col-sm-3">
            <select id="SelTeacher" name="SelTeacher" class="form-control">
                            <?php
            $result=mysqli_query($dbhandle, "select * from login_teacher");        
            while($row= mysqli_fetch_array($result))
            {
                ?><option value="<?php echo $row[fullname]; ?>">
                <?php echo $row[fullname];?>
                </option><?php 
            }

        ?>
                </select>

        </div>
    </div>  
    <br>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-danger">Delete</button>
    </div>
  </div>
  <br>
    
</form>
</body>
</html>
