<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <title>Update ลิสต์อาหารหรือเครื่องดื่ม </title>
</head>

<body>

  <?php
  require '../connect.php';

  $sql_select_list = "SELECT * FROM food_type";
  $stmt_c = $conn->prepare($sql_select_list);
  $stmt_c->execute();
  echo "foodmenuID = " . $_GET['foodmenuID'];

  if (isset($_GET['foodmenuID'])) {
    $sql_select_menu = 'SELECT * FROM food_menu WHERE foodmenuID=?';
    $stmt = $conn->prepare($sql_select_menu);
    $stmt->execute([$_GET['foodmenuID']]);
    echo "get = " . $_GET['foodmenuID'];
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  }
  ?>


  <div class="container">
    <div class="row">
      <div class="col-md-4"> <br>
        <h3>ฟอร์มแก้ไข ลิสต์อาหารหรือเครื่องดื่ม</h3>
        <form action="update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="foodmenuID" value="<?= $result['foodmenuID'] ?>">

          <label for="name" class="col-sm-2 col-form-label"> ชื่อเมนูที่จะแก้ไข: </label>

          <input type="text" name="foodmenuName" class="form-control" required value="<?= $result['foodmenuName'] ?>">


          <label for="name" class="col-sm-2 col-form-label"> ราคา: </label>

          <input type="number" name="price" class="form-control" required value="<?= $result['price'] ?>">

          <label for="name" class="col-sm-2 col-form-label"> ราคา: </label>

          <input type="file" name="Image" class="form-control" required value="">

          <br> <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
        </form>
      </div>
    </div>
  </div>

</body>