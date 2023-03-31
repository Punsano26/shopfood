<?php

if (isset($_POST['foodmenuID'])) {
    require '../connect.php';

    $foodmenuID = $_POST['foodmenuID'];
    $foodmenuName = $_POST['foodmenuName'];
    $price = $_POST['price'];
    // $img = $_POST['Image'];

    $uploadFile = $_FILES['Image']['name'];
            $tmpFile = $_FILES['Image']['tmp_name'];
            echo " upload file = " . $uploadFile;
            echo " tmp file = " . $tmpFile;

    echo 'foodmenuID = ' . $foodmenuID;
    echo 'foodmenuName = ' . $foodmenuName;
    echo 'price = ' . $price; 
    
    
    $stmt = $conn->prepare(
        'UPDATE  food_menu SET foodmenuName = :foodmenuName, price = :price, Image = :Image WHERE foodmenuID=:foodmenuID'
    );
    $stmt->bindparam(':foodmenuName',$_POST['foodmenuName']);
    $stmt->bindparam(':price',$_POST['price']);
    $stmt->bindparam(':Image',$uploadFile);
    $stmt->bindparam(':foodmenuID', $_POST['foodmenuID']);
    $stmt->execute();

     $fullpath = "../image/" . $uploadFile;
            echo " fullpath = " . $fullpath;
            move_uploaded_file($tmpFile, $fullpath);


    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->rowCount() >= 0) {
        echo '
        <script type="text/javascript">
        
        $(document).ready(function(){
        
            swal({
                title: "Success!",
                text: "Successfuly update list food menu information",
                type: "success",
                timer: 2500,
                showConfirmButton: false
              }, function(){
                    window.location.href = "index.php";
              });
        });
        
        </script>
        ';
    }
    $conn = null;
}
?>