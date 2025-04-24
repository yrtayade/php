
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
    <div class="container">
        <div class="row p-5 bg-warning">
            <div class="col-md-6 p-5">
                <form action="update.php" method="POST" enctype="multipart/form-data">
                    Fullname: 
                    <input type="text" name="fname" placeholder="Enter name" class="form-control" value="<?php echo $fn; ?>">
                    Email: 
                    <input type="email" name="semail" placeholder="Enter email" class="form-control" value="<?php echo $em; ?>">
                    Contact: 
                    <input type="text" name="contact" placeholder="Enter contact" class="form-control" value="<?php echo $cn; ?>">
                    <br>
                    <input type="text" placeholder="Enter Password" name="spassword" class="form-control">
                    <br>

                    <input type="radio" placeholder="Enter 
                    Password" name="gender" value="male">Male
                    <input type="radio" placeholder="Enter Password" name="gender" value="female">Female
                    <br>

                    <select name="branch" class="form-select">
                        <option value="21">CSE</option>
                        <option value="22">IT</option>
                    </select>
                    <br>
                    <input type="file" name="fileToUpload" class="form-control">
                    <br>
                    <input type="submit" class="btn btn-success" name="submit">
                </form>
            </div>
            <div class="col-md-6" p-5>
              <a href="select.php" class="btn btn-primary">View Data</a>
            </div>
        </div>

        <div class="row">
            <form action="selectData.php">
                <input type="text" name="semail" id="" placeholder="enter email to search">
                <input type="submit">
            </form>
        </div>
    </div>
</body>
</html>