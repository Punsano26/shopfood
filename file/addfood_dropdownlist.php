<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Addfood now</title>
    <style type="text/css">
        img {
            transition: transform 0.25s ease;
        }

        img:hover {
            -webkit-transform: scale(1.5);
            /* or some other value */
            transform: scale(1.5);
        }
    </style>
</head>

<body>


    <?php
    require '../connect.php';

    $sql_select = 'select * from food_type order by foodtypeID';
    $stmt_s = $conn->prepare($sql_select);
    $stmt_s->execute();

    if (isset($_POST['submit'])) {

        if (!empty($_POST['foodmenuID']) && !empty($_POST['foodmenuName'])) {
            echo '<br>' . $_POST['foodmenuID'];
            //require 'connect.php'

            $uploadFile = $_FILES['image']['name'];
            $tmpFile = $_FILES['image']['tmp_name'];
            echo " upload file = " . $uploadFile;
            echo " tmp file = " . $tmpFile;
    
            $sql = "INSERT INTO food_menu 
            VALUES (:foodmenuID,:foodmenuName,:price,:foodtypeID,:image)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':foodmenuID', $_POST['foodmenuID']);
            $stmt->bindParam(':foodmenuName', $_POST['foodmenuName']);
            $stmt->bindParam(':price', $_POST['price']);
            $stmt->bindParam(':foodtypeID', $_POST['foodtypeID']);
            $stmt->bindparam(':image', $uploadFile);
            
            echo "image =" .$uploadFile;

            $fullpath = "../image/" . $uploadFile;
            echo " fullpath = " . $fullpath;
            move_uploaded_file($tmpFile, $fullpath);

            try {
                if ($stmt->execute()):
                    $message = 'Successfully add new ลิสต์อาหารหรือเครื่องดื่ม';
                    // echo $stmt;
                else:
                    $message = 'Fail to add new ลิสต์อาหารหรือเครื่องดื่ม';
                endif;
                echo $message;
            } catch (PDOException $e) {
                echo 'Fail! ' . $e;
            }

            $conn = null;
        }

        header('location:index.php');
    }
    ?>



    <div class="container">
        <div class="row">
            <div class="col-md-4"> <br>
                <h3>ฟอร์มเพิ่มข้อมูลรายการอาหาร</h3>
                <form action="addfood_dropdownlist.php" method="POST" enctype="multipart/form-data">

                    <input type="text" placeholder="Enter food_MENU ID" name="foodmenuID" require>
                    <br> <br>
                    <input type="text" placeholder="foodname" name="foodmenuName" require>
                    <br> <br>
                    <input type="number" placeholder="price" name="price">
                    <br> <br>
                    
                    <label>Selcet a food type code </label>
                    <select name="foodtypeID">
                        <?php while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $cc['foodtypeID']; ?>">
                                <?php echo $cc['foodtypeName']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <br> <br>

                    แนบรูป:
                    <input type="file" name=image required>
                    <br><br>

                    <input type="submit" value="Submit" name="submit" />
                </form>
            </div>
        </div>
    </div>
</body>

</html>