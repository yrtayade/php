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

<table class="table table-bordered container mt-5">
    <tr>
        <th>Fullname</th>
        <th>Email</th>
        <th>Contact</th>
        
        <th>View</th>
        <th>Delete</th>
    </tr>
    

 
<?php
    include("connection.php");
    $myQuery = "SELECT * FROM student";
    $result = $conn->query($myQuery);
    if( $result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            $fn = $row["fullname"];
            $se = $row["semail"];
            $cn = $row["contact"];
            $pw = $row["password"];
             
            echo "
            <tr>
                <td>".$fn."</td>
                <td>".$se."</td>
                <td>".$cn."</td>
                
                <td>
                    <a href='view.php?myVar=$se'>View</a>
                </td>
                 <td>
                    <a href='delete.php?myVar=$se'>Delete</a>
                </td>
            </tr> 
            ";
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