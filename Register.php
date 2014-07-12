<?php
if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
}
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
<title>Registration Page</title>
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
  
var sname = document.forms["register"]["txtusername"].value;
var spwd = document.forms["register"]["txtpassword"].value;
var spwda = document.forms["register"]["txtpassword_again"].value;
var sid = document.forms["register"]["studentid"].value;

    if(sname==="")
    {
        alert('Please enter a Valid Codename');
        return false;
    }
    if(sname.length>15)
    {
        alert('Codename must be less than 15 letters');
        return false;
    }
    
    if(spwd==="")
    {
        alert('Please set Codeword');
        return false;
    }
    if(spwda==="")
    {
        alert('Invalid Re-Codeword');
        return false;
    }
    if(spwd!==spwda)
    {
        alert("Codeword doesn't match!");
        return false;
    }
    if(spwd.length>15)
    {
        alert('Codeword must be less than 15 letters');
        return false;
    }
    
    if(sid==="")
    {
        alert('Invalid StudentID');
        return false;
    }
    if(sid>4599)
    {
        alert('Student ID should be in between 4501 to 4599');
        return false;
    }
    if(sid<4501)
    {
        alert('Student ID should be in between 4501 to 4599');
        return false;
    }
        if(isChar(sname))
    {
    return true;
    }
    else 
    {
                alert("CodeName must not contain special characters!");
        return false;
    }
}</script>
</head>
<body>
    
    
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="brand"><p  class="navbar-text" >&nbsp;&nbsp;&nbsp;Analysis of Errors</small></p></div>


<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Back to Login Page!</a></li>
        </ul>
      </ul>
        
      
    </div><!-- /.navbar-collapse -->
</nav>
    
    <br>
    <br>
    <div class='col-md-offset-2'>
    <h2 style="font-family: calibri">Registration</h2>
    </div>
    <br>
    
    
<form class="form-horizontal" onSubmit="return formValidation();" name="register" action="registration.php" method="GET" role="form">
    <div class="form-group">        
        <label for="inputcodename" class="col-sm-2 control-label">Codename </label> 
        <div class="col-sm-3">
        <input class="form-control" name=txtusername type=text id=Inputcodename placeholder="Codename" >
        </div>
    </div>

        <div class="form-group">
<label for="codewprd" class="col-sm-2 control-label">Codeword </label>  
<div class="col-sm-3">
<input class="form-control" name=txtpassword type=password id=txtpassword placeholder="Codeword" />
</div>
<br>
</div>
    
            <div class="form-group">
<label for="codewprd" class="col-sm-2 control-label" >Re-enter Codeword </label>  
<div class="col-sm-3">
<input class="form-control" name=txtpassword_again type=password id=txtpassword_again placeholder="Re-Enter Codeword" />
</div>
<br>
</div>

    
        <div class="form-group">
<label for="studentid" class="col-sm-2 control-label">Student ID </label>  
<div class="col-sm-3">
<input class="form-control" name="studentid" type=text id="studentid" placeholder="Student ID" />
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
