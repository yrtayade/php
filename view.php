<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>View Data</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
        </tr>
    
    <?php
            include("connection.php");
            $email = $_GET["myVar"];
            
            $myQuery = "SELECT * FROM student WHERE semail='".$email."'";
            $result = $conn->query($myQuery);
            if( $result->num_rows > 0)
            {
                while($row = $result->fetch_assoc() )
                {
                    $fn = $row["fullname"]; 
                    $em = $row["semail"];
                    $cn = $row["contact"];
                    echo '
                        <tr>
                            <td>'.$fn.'</td>
                            <td>'.$em.'</td>
                            <td>'.$cn.'</td>
                        </tr>
                    ';
                }
            }
            else
            {
                echo "Not found";
            }
    ?>
    </table>
</body>
</html>