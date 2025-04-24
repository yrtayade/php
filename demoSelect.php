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
     <link rel="stylesheet" href="style.css">
</head>
<body>
 
    <div class="container">
        <div class="row">
               
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
                    $ph = $row["photo"];
                    
                    echo '
                   <div class="col-md-3 p-3">
                    <div class="myCard">
                        <img src="'.$ph.'" class="img-fluid" alt="">
                        <h3>'.$fn.'</h3>
                        <p>'.$se.'</p>
                        <p>'.$cn.'</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
                    ';
                }
                
            }
            else
            {
                echo "Not found";
            }
        ?>
            
        </div>
    </div>
</body>
</html>