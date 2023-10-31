<?php
@include 'editpro-con.php';

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	mysqli_query($conn, "DELETE FROM product WHERE id = $id");
	header('location:editpro.php');
}
;
?>

<?php
$select = mysqli_query($conn, "SELECT * FROM product");
?>


<!doctype html>
<html lang="en">

<head>
	<title>ADD PRODUCT</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="style-edit.css">

</head>

<body>
	<section class="ftco-section" style="padding-top:50px;padding-button:50px;height:80vh;">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-4">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<form action="editpro-con.php" method="post">
							<table class="table">
								<thead class="thead-primary">
									<tr>
										<th>&nbsp;</th>
										<th>&nbsp;</th>
										<th>Product</th>
										<th>Price</th>
										<th>&nbsp;</th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<?php while ($row = mysqli_fetch_assoc($select)) {
									?>
									<tbody>
										<tr class="alert" role="alert">
											<td>
												<label>

												</label>
											</td>
											<td>
												<div class="img">
													<img width="100px" ; src="image/<?php echo $row['image'] ?>" alt="">
												</div>
											</td>
											<td>
												<div class="email">
													<span>
														<?php echo $row['pname'] ?>
													</span>
													
												</div>
											</td>
											<td>$
												<?php echo $row['price'] ?>
											</td>
											<td>
											<a href="update-pro.php?edit=<?php echo $row['id']; ?>"><button
                                                        type="button" class="close">
                                                        <span>Edit</span>
                                                    </button></a>
                                            </td>
											<td>
												<a href="editpro.php?delete=<?php echo $row['id']; ?>"><button
														type="button" class="close">
														<span>Delete</span>
													</button></a>
											</td>
										</tr>

									</tbody>

								<?php }
								;
								?>
							</table>
                            
						</form>
					</div>
					<a href="addproduct.html"><input type="button" class="btn" name="add product"
							value="add product"></a>
				</div>
			</div>
		</div>

	</section>
</body>

</html>