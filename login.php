<?php
    include("connection.php");
    $user = $_POST["un"];
    $pass = $_POST["pw"];

    $myQuery = "SELECT * FROM student WHERE semail = '".$user."'";

    $result = $conn->query($myQuery);

    if( $result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        $pass2 = $row["password"];

        if(  password_verify($pass, $pass2) )
        {
            echo "
                <script type='text/javascript'>
                    
                    window.location.href='home.html';
                </script>
            ";
        }
    }
    else
    {
        echo "
                <script type='text/javascript'>
                    alert('Please signup');
                    window.location.href='registration.html';
                </script>
            ";
    }
?>