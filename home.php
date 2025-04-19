<?php  session_start();  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include("connection.php");
        if(  !isset( $_SESSION["userLogin"] ) )
        {
            echo "
            <script type='text/javascript'>
            alert('please login');                
                window.location.href='login.html';
            </script>
            ";
        }
        
        $user = $_SESSION["userLogin"];
        
        $myQuery = "SELECT * FROM student WHERE semail='".$user."'";

        $result = $conn->query($myQuery);
        
        if( $result->num_rows > 0  )
        {
            $row = $result->fetch_assoc();

            $fname = $row["fullname"];
        }
      
    ?>
    <h1>Welcome   <?php  echo $fname; ?>  </h1>

    <a href="logout.php">Logout</a>
</body>
</html>