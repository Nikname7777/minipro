<?php
$pname = $_POST['pname'];
$price = $_POST['price'];
$image = $_FILES['image']['name'];
$product_image_tmp_name = $_FILES['image']['tmp_name'];
$product_image_folder = 'image/' . $image;

$conn = new mysqli('localhost', 'root', '', 'bubble');
if (empty($pname) || empty($price) || empty($image)) {
   $message[] = 'please fill out all';
} else {
   $insert = "INSERT INTO product (pname, price, image) VALUES('$pname', '$price', '$image')";
   $upload = mysqli_query($conn, $insert);
   if ($upload) {
      move_uploaded_file($product_image_tmp_name, $product_image_folder);
      echo '<script>alert("new product added successfully");
                window.location.href =  "http://localhost/Bubble/project/editpro.php"
                </script>';
   } else {
      echo '<script>alert("could not add the product");
                window.location.href = "http://localhost/Bubble/project/addproduct.html"
                </script>';
   }
}
?>
