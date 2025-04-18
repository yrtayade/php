<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php
    if( isset( $_GET["semail"]) )
    {
        $es = $_GET["semail"];
    }
    else
    {
        echo "No email";
    }
?>
    <div class="container">
        <div class="row p-5">
        <table class="table table-bordered table-dark">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Password</th>
            <th>Update/Edit</th>
            <th>Delete</th>
        </tr>
    <?php
        
        include("connection.php");
        

        $myQuery = "SELECT * FROM student WHERE semail='".$es."'";

        $result  = $conn->query( $myQuery  );

        if( $result->num_rows >0 )
        {
            while( $row = $result->fetch_assoc() )
            {
                
                $fn = $row["fullname"];
                $em = $row["semail"];
                $cn = $row["contact"];
                $pw = $row["password"];

                echo "
                    <tr>
                        <td>".$fn."</td>
                        <td>".$em."</td>
                        <td>".$cn."</td>
                        <td>".$pw."</td>
                        <td> <a href='' class='btn btn-warning'>Update</a>  </td>
                        <td> <a href='' class='btn btn-danger' >Delete</a>  </td>
                    </tr>
                ";

            }
        }
        else
        {
            echo "No data";
        }
    ?>

    </table>

    <a href="registration.html"> Go Back </a>
        </div>
    </div>
</body>
</html>
