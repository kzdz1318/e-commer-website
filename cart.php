<?php include 'inc/header.php';?>

<?php 
if (isset($_GET['delpro'])) {
	$delId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delpro']);
	$delProduct = $ct->delProductByCart($delId);
}

 ?>

<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cartId = $_POST['cartId'];
    $quantity = $_POST['quantity'];
    $updateCart = $ct->updateCartQuantity($cartId,$quantity);

    if ($quantity <=0) {
    	$delProduct = $ct->delProductByCart($cartId);
    }
}
 ?>
 <?php  
if (!isset($_GET['id'])) {
	echo "<meta http-equiv = 'refresh' content ='0;URL=?id=nayem' />";
}
 ?>


 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
			    	<?php 
			    	if (isset($updateCart)) {
			    		echo $updateCart;
			    	}

			    	if (isset($delProduct)) {
			    		echo $delProduct;
			    	}
			    	 ?>

						<table class="tblone">


							<tr>
								<th width="5%">SL</th>
								<th width="30%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="15%">Quantity</th>
								<th width="15%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<tr>

							<?php 

							$getPro = $ct->getCartProduct();
							if ($getPro) {
								$i = 0;
								$sum = 0;
								$qty = 0;
								while ($result = $getPro->fetch_assoc()) {
								
								$i++;

							 ?>
								<td><?php echo $i;?></td>
								<td><?php echo $result['productName']; ?></td>
								<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
								<td>DZD. <?php echo $result['price']; ?></td>
					<td>
						<form action="" method="post">

							<input type="hidden" name="cartId" value="<?php echo $result['cartId']; ?>"/>
							<input type="number" name="quantity" value="<?php echo $result['quantity']; ?>"/>
							<input type="submit" name="submit" value="Update"/>
						</form>
					</td>
								<td>
							DZD. <?php
						$total = $result['price'] * $result['quantity'];
						echo $total;
						 ?>
							

									</td>
								<td><a onclick="return confirm('Are you Sure to Delete!')" href="?delpro=<?php echo $result['cartId']; ?>">X</a></td>
							</tr>
							
							<?php 
							$qty = $qty + $result['quantity'];
							$sum = $sum + $total;
							Session::set("qty",$qty);
							Session::set("sum",$sum);
							 ?>


						<?php } } ?>	
						</table>

						<?php
						$getData = $ct->checkCartTable();
							if ($getData){

								?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>DZD. <?php echo $sum; ?></td>
							</tr>
							<tr>
								<th>Delivery : </th>
								<td>300</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>DZD. 
									<?php 
									$vat = $sum * 0.1;
									$gtotal = $sum + 300;
									echo $gtotal;
									 ?>
								</td>
							</tr>

					   </table>
					<?php }else{
						header("Location:index.php");
						//echo "Cart Empty ! Please Shop Now...";
					} ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php';?>