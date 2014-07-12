<?php
session_start();
        $studentid = $_SESSION['tid'];
        if($studentid==NULL)
        {
            header('Location: index.php');
        }
?>
    

<?php
        $studentid=$_GET['uid'];
                $ppath=$_GET['ppath'];
                ?>
<html>
<link rel="stylesheet" type="text/css" href="bootstrap.css">
<link rel="script" type="text/javascript" href="bootstrap.js">
<link rel="script" type="text/javascript" href="jquery.js">
<link rel="stylesheet" href="codemirror.css">
<script src="codemirror.js"></script>
<script src="clike.js"></script>

<script type="text/javascript" src="validation.js"></script>
<style type="text/css">
    textArea{
        resize : none; 
    }
</style>
  

<head>
    <title>Code Review</title>
</head>
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
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
          <li ><a href="teacherhome.php">Teacher Home</a></li>
        <li class="active"><a href="#">Code Area</a></li>
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

<div class="col-md-5">
<ul class="nav nav-tabs">
<?php

include_once 'connection.php';
        $username = "root";
        $password = "";
        $hostname = "localhost"; 
        $db="proj";
        $dbhandle = mysqli_connect($hostname, $username, $password,$db)
         or die("Unable to connect to MySQL");
        $count=0;
        $query='select fname from folder where sid="'.$studentid.'"';

          $result = mysqli_query($dbhandle,"select fname from folder where sid='$studentid'");
                 
       while ($row= mysqli_fetch_array($result)) 
        {
           $str="#$row[fname]";
           
            
?>
  <li ><a href=<?php echo $str ?> data-toggle="tab"><span class="glyphicon glyphicon-folder-open"></span> <?php echo $row['fname']?> </a></li> 
  <?php
        
        }
  ?>
  
	</ul>
<!--COde for tab content-->

<div class="tab-content"> <?php 

          $result = mysqli_query($dbhandle,"select fname from folder where sid='$studentid'");
          
       while ($row= mysqli_fetch_array($result)) 
        {
           ?>
    <div class="tab-pane" id=<?php echo $row['fname']?>>
        <form name="file_name" id="file_name"><?php
    
        $result1 = mysqli_query($dbhandle,"select ppath,pname from program where sid='$studentid' and  fname='$row[fname]'");
            while ($row1= mysqli_fetch_array($result1)) 
        {
                ?>
        <br>
        <input id="file_selected" name="file_selected" type="radio" value="<?php echo $row1['ppath']?>" onclick="javascript:loading(this.value);">&nbsp;<?php echo $row1['pname']?><span class="glyphicon glyphicon-file">&nbsp;</span>
       <?php }
            ?>
        <br>
        </form>
          <br>
          
         </div>
     <?php
        }
    ?>
 
    <div class="tab-pane" id="profile">
<div class="btn-group">
    <br>
    <br>
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <span class="glyphicon glyphicon-star"></span>Folder Manipulation <span class="caret"></span>
  </button>

  <ul class="dropdown-menu" role="menu">
    <li><a data-toggle="modal" data-target="#create_folder">Create Folder</a></li>
    <li><a data-toggle="modal" data-target="#modify_folder">Modify Folder</a></li>
    <li><a data-toggle="modal" data-target="#delete_folder">Delete Folder</a></li>
    
  </ul>
</div>
<div class="btn-group">
    <br>
    <br>
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <span class="glyphicon glyphicon-star"></span>File Manipulation <span class="caret"></span>
  </button>

  <ul class="dropdown-menu" role="menu">
    <li><a data-toggle="modal" data-target="#create_file">Create File</a></li>
    <li><a data-toggle="modal" data-target="#modify_file">Modify File</a></li>
    <li><a data-toggle="modal" data-target="#delete_file">Delete File</a></li>
    
  </ul>
</div>
  </div>
</div>
  </div>        

<!--COde for tab content ends here-->
<!--COde for manipulation here-->

<script type="text/javascript">
    
    function folderName()  
{    
    
var fname = document.forms['create_folder']['folder'].value;
if( fname ==="" )
   {
     alert( "Please provide your Folder Name!" );
     //document.register.txtusername.focus() ;
     return false;
   }
   else
   { 
 if(isChar(fname)){
    return true;
}else{
    alert('Enter only Char between a-z');
    return false;
}
}
}

    
</script>
<div class="modal fade" id="create_folder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Create Folder</h4>
      </div>
      <div class="modal-body">
          <form name='create_folder' action='create_folder.php' method='post'onSubmit="return folderName()" >          
              <label>Enter Folder Name&nbsp;</label><input type="text" name="folder" placeholder="Enter Folder Name">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>





<div class="modal fade" id="modify_folder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modify Folder</h4>
      </div>
      <div class="modal-body">
          <form name='modify_folder' action='modify_folder.php' method='post' onSubmit="return modifyName()">
              <label>Select Folder to be modified :</label>
              <br>
              
       <?php
        $result = mysqli_query($dbhandle,"select fname from folder where sid='$studentid'");
                 
       while ($row= mysqli_fetch_array($result)) 
        {
          // $str="#$row[fname]";
         
       
       ?>
              <input type="radio" name="folder" value="<?php echo $row['fname']?>">&nbsp;<?php echo $row['fname']?>
         
       <?php
        }      ?>   
              <br>
               <label>Enter New Name</label>
        <br><input class="form-control" type="text" placeholder="Enter New Name" name="folder_name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="delete_folder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Delete Folder</h4>
      </div>
      <div class="modal-body">
          <form name='delete_folder' action='delete_folder.php' method="post" onSubmit="return deleteval()">
              <label>Selected folder to be deleted:</label><br>
              <?php
        $result = mysqli_query($dbhandle,"select fname from folder where sid='$studentid'");
                 
       while ($row= mysqli_fetch_array($result)) 
        {
       ?>
              <input type="checkbox" name="folder[]" value="<?php echo $row['fname']?>">&nbsp;<?php echo $row['fname']?>
         
       <?php
        }      ?>   
             <!-- <input type="hidden" name="folder[]" value="not" >-->
             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>



<!--FIle Manipulation Code-->


<div class="modal fade" id="create_file" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Create File</h4>
      </div>
      <div class="modal-body">

          <form name='create_file' action='create_file.php' method='post' onSubmit="return create_file_val();"> <label>Select a folder to add file :<br></label>      <?php
        $result = mysqli_query($dbhandle,"select fname from folder where sid='$studentid'");
                 
       while ($row= mysqli_fetch_array($result)) 
        { 
       ?>
              <input type="radio" name="file" value="<?php echo $row['fname']?>">&nbsp;<?php echo $row['fname']?>
       <?php
       }      ?>   <br>
              <label>Enter the File Name (Without Extension)</label>
        <input class="form-control" type="text" placeholder="Enter New File Name" name="file_name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
        </div>
  </div>
</div>



<div class="modal fade" id="modify_file" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modify File</h4>
      </div>
      <div class="modal-body">
          <form name='modify_file' action='modify_file.php' method='post' onsubmit="return mod_file_val();">       
              <label>Select File to be Modify:(folder_name/file_name)</label><br>      <?php
        $result = mysqli_query($dbhandle,"select fname from folder where sid='$studentid'");        
       while ($row= mysqli_fetch_array($result)) 
        {   $result1 = mysqli_query($dbhandle,"select pname from program where sid='$studentid' and  fname='$row[fname]'");
            while ($row1= mysqli_fetch_array($result1)) 
        {
                $filepath=$row['fname'].'/'.$row1['pname'];
         ?>
              <input type="radio" name="file" value="<?php echo $filepath?>">&nbsp;<?php echo $filepath?></b>
       <?php
        } 
        
        }     ?>
              <br>
          <label>Enter New File Name</label><br>
          <input type="text" class="form-control" name="rename" placeholder="Enter New Name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button></form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Delete File</h4>
      </div>
      <div class="modal-body">
          <form role="form" action="delete_file.php" method="post" onsubmit="return del_file_val();">
              <label>Select a File to deleted(folder_name/file_name)</label><br>
<?php

        $result = mysqli_query($dbhandle,"select fname from folder where sid='$studentid'");
                 
       while ($row= mysqli_fetch_array($result)) 
        { 
            $result1 = mysqli_query($dbhandle,"select pname from program where sid='$studentid' and  fname='$row[fname]'");
            while ($row1= mysqli_fetch_array($result1)) 
        {
                $filepath=$row['fname'].'/'.$row1['pname'];
            
       ?>
              <input type="checkbox" name="folder[]" value="<?php echo $filepath?>">&nbsp;<?php echo $filepath?></b>
       <?php
        } 
        
        }     ?>
              
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--COde for manipulation ends here-->

           </div>
<center><strong>Code Area</strong>&nbsp;&nbsp;&nbsp;<span id="fn1"><?php echo $ppath    ?></span></center>
<div class="col-md-6">


    <textarea id="code" name="code" class="form-control" rows="15" disabled><?php
$f = fopen($ppath, "r");
while ( $line = fgets($f, 1000) ) {
print $line;
}
?>
    </textarea><br>

            <textarea class="form-control col-sm-3" name="input" rows="1" id="input"></textarea>

<div class="col-md-offset-4 ">
    <button type="button" class="btn btn-primary" onclick="javascript:CompileXMLDoc();">Compile</button>
&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-success"  onclick="javascript:saving();">Save</button>
&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" onclick="javascript:add_suggestion();">Add Suggestion</button>
<br>
</div>
		</div>

     
     
     <script language="JavaScript" type="text/javascript">
function loading(file_selected){
//    $("#code").load('abc.c');

document.getElementById("fn1").innerHTML=file_selected;
 $.ajax({
        type: 'post',
        url: 'loading.php',
        data: {
            file_name: file_selected
        },
        success: function( data ) {
            document.getElementById("code").value=data;
        }
    });
            document.getElementById("input").value="";
            document.getElementById("error").value="";
            document.getElementById("soln").value="";
    
}

 
function saving(){
        var ppath=document.getElementById("fn1").innerHTML;
        if(ppath=="")
        {
            alert("Please create/select a file!");
        }
        else
        {
        var x = document.getElementById("code").value;
         $.ajax({
             type: 'POST',
             url: 'savefile.php',
             data: {
                 p: ppath,
                 data: x
             },
        success: function( data ) {
            document.getElementById("input").value=data;
        }
          });
      }
}

function add_suggestion(){
        var ppath=document.getElementById("fn1").innerHTML;
        if(ppath==="")
        {
            alert("Please select a file!");
        }
        else
        {
        var x = document.getElementById("soln").value;
         $.ajax({
             type: 'POST',
             url: 'add_sug.php',
             data: {
                 p: ppath,
                 data: x
             },
        success: function( data ) {
            document.getElementById("input").value=data;
        }
          });
      }
}



function showsoln()
{
 $.ajax({
        type: 'post',
        url: 'load_soln.php',
        data: {
            file_name: "soln.txt"
        },
        success: function( data ) {
            document.getElementById("soln").value=data;
        }
    });
}


function CompileXMLDoc()
{
//Fetch Code Area content and save it in abc.c 
        var x = document.getElementById("code").value;
        var data = encodeURIComponent(String([x]));
         $.ajax({
             type: 'POST',
             url: 'save.php',
             data: 'c='+data,
             processData:false
          }); 
//Fetch Input Area content and save it in input     
        var y = document.getElementById("input").value;
        var input = encodeURIComponent(String([y]));
        $.ajax({
            type: 'POST',
            url: 'save1.php',
            data: 'c='+input,
            processData:false
         });
         
//Compile abc.c
        var xmlhttp;
        xmlhttp=new XMLHttpRequest();
        xmlhttp.open("GET","Compile2.php",false);
        xmlhttp.send();
        document.getElementById("error").value=xmlhttp.responseText;
        showsoln();
}


</script>
     
     
     


<div class="container">

    <div class="row">
        
    <div class="col-md-6">
        <textarea class="form-control" name="error" rows="4" id="error" disabled></textarea>
    </div>
    <div class="col-md-6">
        <textarea class="form-control" rows="4" name="soln" id="soln" placeholder="Stdin : Place suggestion for this Program"></textarea>
</div>
</div>
</div>


</body>
</html>