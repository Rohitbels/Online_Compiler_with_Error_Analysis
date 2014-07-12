<?php
        header('Content-Type: text/html; charset=UTF-8');
        $username = "root";
        $password = "";
        $hostname = "localhost"; 
        $count=0;
        $db="proj";
        $dbhandle = mysqli_connect($hostname, $username, $password,$db)
         or die("Unable to connect to MySQL");
        mysqli_query($dbhandle,"SET NAMES 'utf8'");
        $studusr=$_POST['txtusername'];
        $studpass=$_POST['txtpassword'];
        $result = mysqli_query($dbhandle,"select * from student where sid='$studusr' and pwd='$studpass'");
        while($row= mysqli_fetch_array($result))
        {
            session_start();
            $_SESSION['sid']=$row['sid'];
            echo $_SESSION['sid'];
            header('Location: coding.php');
            $count=1;
        }
       
        $result1 = mysqli_query($dbhandle,"select * from login_teacher where tname='$studusr' and pwd='$studpass'");
        while($row= mysqli_fetch_array($result1))
        {
            session_start();
            $_SESSION['tid']=$row['tid'];
            echo $_SESSION['tid'];
            header('Location: teacherhome.php');
            $count=1;
        }
        
        $result2 = mysqli_query($dbhandle,"select * from admin where username='$studusr' and password='$studpass'");
        while($row= mysqli_fetch_array($result2))
        {
            session_start();
            $_SESSION['aid']=$row['aid'];
            echo $_SESSION['aid'];
            header('Location: adminhome.php');
            $count=1;
        }
        if($count==0)
        {
           header('Location: index1.php');
        }
        ?>