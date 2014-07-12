<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        header('Content-Type: text/html; charset=UTF-8');
        $username = "root";
        $password = "";
        $hostname = "localhost"; 
        $db="proj";
        $dbhandle = mysqli_connect($hostname, $username, $password,$db)
         or die("Unable to connect to MySQL");
        mysqli_query($dbhandle,"SET NAMES 'utf8'");

        $result = mysqli_query($dbhandle,"SELECT distinct(error) FROM err where errorname='New Error'");
        while($row= mysqli_fetch_array($result))
        {
            echo $row['error']."<br>";
        }
        
        ?>
    </body>
</html>
