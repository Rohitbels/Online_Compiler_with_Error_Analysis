<?php
        header('Content-Type: text/html; charset=UTF-8');

if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
}
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
<title>Teacher Registration Page</title>
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
var ini = document.forms["register"]["txtinitials"].value;
var pwd = document.forms["register"]["txtpassword"].value;
var addr = document.forms["register"]["addr"].value;

    if(tname==="")
    {
        alert('Please enter a Valid Teacher Name');
        return false;
    }
    if(isChar(tname))
    {
        return true;
    }
    else 
    {
        alert("Teacher FullName must not contain special characters!");
        return false;
    }

    if(ini==="")
    {
        alert('Please enter a Valid Teacher Initials');
        return false;
    }
    if(tname.length>50)
    {
        alert('Teacher Fullname must be less than 50 letters');
        return false;
    }
    
    if(pwd==="")
    {
        alert('Please set Codeword');
        return false;
    }
    if(spwd.length>30)
    {
        alert('Codeword must be less than 30 letters');
        return false;
    }
    
    if(addr==="")
    {
        alert('Invalid Address');
        return false;
    }
    if(addr.length>150)
    {
        alert('Address must be less than 150 letters');
        return false;
    }

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
        <li class="active"><a href="#">Add Teacher</a></li>
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
    <h2 style="font-family: calibri">Teacher Registration</h2>
    </div>
    <br>
    
    
<form class="form-horizontal" onSubmit="return formValidation();" name="register" action="teacher_registration.php" method="GET" role="form">
    <div class="form-group">        
        <label for="inputcodename" class="col-sm-2 control-label">Full-name </label> 
        <div class="col-sm-3">
        <input class="form-control" name=txtusername type=text id=txtusername placeholder="Teacher Full-Name" >
        </div>
    </div>

        <div class="form-group">
<label for="codewprd" class="col-sm-2 control-label">Initials </label>  
<div class="col-sm-3">
<input class="form-control" name=txtinitials type=text id=txtinitials placeholder="Teacher Initials" />
</div>
<br>
</div>
    
            <div class="form-group">
<label for="codewprd" class="col-sm-2 control-label" >Codeword </label>  
<div class="col-sm-3">
<input class="form-control" name=txtpassword type=password id=txtpassword placeholder="Teacher Codeword" />
</div>
<br>
</div>

    
        <div class="form-group">
<label for="addr" class="col-sm-2 control-label">Address </label>  
<div class="col-sm-3">
<input class="form-control" name="addr" type=text id="addr" placeholder="Address" />
</div>
<br>
</div>
    
    <br>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Begin</button>
    </div>
  </div>
  <br>
    
</form>
</body>
</html>
