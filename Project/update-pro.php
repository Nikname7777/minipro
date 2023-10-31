<?php
@include 'update-pro-con.php';
$id = $_GET['edit'];

if (isset($_POST['update_product'])) {
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $product_image_tmp_name = $_FILES['image']['tmp_name'];
    $product_image_folder = 'image/' . $image;
   
    if (empty($pname) || empty($price) || empty($image))  {
      $message[] = 'please fill out all';
   } 
   else {
     
      $update = "UPDATE product SET pname='$pname', price='$price', image='$image' WHERE id = $id";
      $upload = mysqli_query($conn, $update);

      if ($upload) {
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:editpro.php');
      } else {
         $$message[] = 'please fill out all!';
      }

   }
}

;
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Updateproduct
   </title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="style-add.css">
</head>

<body>
   <div class="container" style="justify-content:center;padding-top:200px;padding-bottom:200px;height:100vh;">
      <div class="admin-product-form-container">
         <?php
         $select = mysqli_query($conn, "SELECT * FROM product WHERE id = '$id' ");
         while ($row = mysqli_fetch_assoc($select)) {
            ?>

            <form action="" method="post" enctype="multipart/form-data">
               <h3>Update product</h3>
               <input type="text" placeholder="enter product name" value="<?php echo $row['pname']; ?>"
                  name="pname" class="box">
               <input type="number" placeholder="enter product price" value="<?php echo $row['price']; ?>"
                  name="price" class="box">
               <input type="file" accept="image/png, image/jpeg, image/jpg" name="image" class="box">
               <input type="submit" class="btn" name="update_product" value="update product">
               <a href="editpro.php" class="btn">Back</a>
            </form>
            <?php
         }
         ;
         ?>
      </div>
   </div>

</body>

</html>