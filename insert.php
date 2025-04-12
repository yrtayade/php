<?php
    include("connection.php");
    if(  isset($_GET["submit"]) )
    {
        $f_name = $_GET["fname"];
        $s_email = $_GET["semail"];
        $s_contact = $_GET["contact"];
        $myQuery = "INSERT INTO student(fullname,semail,contact) VALUES('kamlesh'','".$s_email."','".$s_contact."')";
        if( $conn->query( $myQuery) == TRUE)
        {
            echo "
                <script type='text/javascript'>
                    alert('Data Inserted');
                    window.location.href='registration.html';
                </script>
            ";
        }
        else
        {
            echo "
            <script type='text/javascript'>
                alert('Something went wrong');
                window.location.href='registration.html';
            </script>
            ";
        }
    }
    else
    {
        echo "
        <script type='text/javascript'>
            alert('Please fill the form');
            window.location.href='registration.html';
        </script>
        ";
    }
?>