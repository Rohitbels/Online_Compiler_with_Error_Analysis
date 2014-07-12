<html>  
<head>
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
<title>Login Page</title>
<meta content="width=device-width">
<style type="text/css">
    
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
</head>
<body>
   <script lang="text/javascript">
window.onload = function() {
  document.getElementById("Inputcodename").focus();
};
</script>     
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="brand"><p  class="navbar-text" >&nbsp;&nbsp;&nbsp;Analysis of Errors</small></p></div>


<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="Register.php">New User? Click here!</a></li>
        </ul>
      </ul>
        
      
    </div><!-- /.navbar-collapse -->
</nav>
    <div class="container">
        <center>
        <img class="img-responsive" src="itsf.jpg" width="500" height="430">
         <h3>Coding is like the closest thing we have to <abbr class="quo-color" title="attribute">Super Power</abbr></h3>

          <div class=" col-lg-8 col-lg-offset-2" >

              <div class="jumbotron ">

                   <center>
                       <form class="form-inline" role="form" action="validate.php" method="post">
  <div class="form-group">
    <label class="sr-only" for="CodeName">CodeID</label>
    <input class="form-control" name=txtusername type=text id=Inputcodename placeholder="CodeID" >
                                            
  </div>
  <div class="form-group">
    <label class="sr-only" for="CodeWord">Codeword</label>
    <input name=txtpassword class="form-control" type=password id=txtpassword placeholder="Codeword" >
                                  
  </div>

  <button type="submit" class="btn btn-primary">Begin!</button>
</form>
                   </center>
                                            </div> 
    </div>
         </center>
<script lang="text/javascript">
alert("Invalid Codename/Codeword!");
</script>
    </body>
</html>

