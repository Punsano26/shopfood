<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/style.css">
        <title>CRUD food Information</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> <br>
                    <h3>รายชื่อลูกค้า <a href="addfood_dropdownlist.php" class="btn btn-info float-end">+เพิ่มลิสต์รายการอาหาร</a> </h3>
                    <table class="table table-striped  table-hover table-responsive table-bordered">
                        <thead align="center">                        
                            <tr>
                                <th width="10%">รหัสเมนูอาหาร</th>
                                <th width="20%">ชื่อเมนู</th>
                                <th width="20%">ราคา</th>
                                <th width="25%">รหัสประเภทรายการอาหาร</th>
                                <th width="10%">รูปภาพ</th>
                                <th width="5%">แก้ไข</th>
                                <th width="5%">ลบ</th>
                            </tr>                       
                        </thead>

                        <tbody>
                          <?php
                            require '../connect.php';
                            $sql =  "SELECT * FROM food_menu, food_type 
                            WHERE food_menu.foodtypeID = food_type.foodtypeID 
                            ORDER BY foodmenuID";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            foreach ($result as $r) { ?>
                            <tr>
                                <td><?= $r[0] ?></td>
                                <td><?= $r[1] ?></td>
                                <td><?= $r[2] ?></td>
                                <td><?= $r[3] ?></td>
                                 <td><img src="./image/<?= $r[4]; ?>" width="50px" height="50" alt="image" onclick="enlargeImg()" id="img1" ></td>
                                <td><a href="updatelistfrom.php?foodmenuID=<?= $r['foodmenuID'] ?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                                <td><a href="deletemenulist.php?foodmenuID=<?= $r['foodmenuID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td>
                            </tr>
                          <?php 
                                }
                          ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
        
    </body>
</html>