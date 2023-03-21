<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Addfood now</title>
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
            //require 'connect.php';
    
            $sql = "INSERT INTO food_menu VALUES (:foodmenuID,:foodmenuName,:price,:foodtypeID,)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':foodmenuID', $_POST['foodmenuID']);
            $stmt->bindParam(':foodmenuName', $_POST['foodmenuName']);
            $stmt->bindParam(':price', $_POST['price']);
            $stmt->bindParam(':foodtypeID', $_POST['foodtypeID']);
            


            try {
                if ($stmt->execute()):
                    $message = 'Successfully add new customer';
                    // echo $stmt;
                else:
                    $message = 'Fail to add new customer';
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
                <form action="addfood_dropdownlist.php" method="POST">

                    <input type="text" placeholder="Enter food_MENU ID" name="foodmenuID">
                    <br> <br>
                    <input type="text" placeholder="foodname" name="foodmenuName">
                    <br> <br>
                    <input type="int" placeholder="price" name="price">
                    <br> <br>
                    
                    <label>Selcet a food type code </label>
                    <select name="food_type">
                        <?php while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $cc['foodtypeID']; ?>">
                                <?php echo $cc['foodtypeName']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <br> <br>

                    <input type="submit" value="Submit" name="submit" />
                </form>
            </div>
        </div>
    </div>
</body>

</html>