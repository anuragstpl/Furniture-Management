<?php include 'header.php';?>
<?php include 'updatecart.php'; ?>
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/heading-pages-01.jpg);">
	<h2 class="l-text2 t-center">
		Cart
	</h2>
</section>

<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
	<div class="container">
		<!-- Cart item -->
		<div class="container-table-cart pos-relative">
			<div class="wrap-table-shopping-cart bgwhite">
				<table class="table-shopping-cart">
					<tr class="table-head">
						<th class="column-1"></th>
						<th class="column-2">Product Name</th>
						<th class="column-3">Price</th>
						<th class="column-5">Total</th>
					</tr>
					<tbody>
						<?php 
						foreach ($orders as $key => $order) {?>
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="uploads/<?php echo $order['image']?>" alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-2"><?php echo $order['name']?></td>
							<td class="column-3">$<?php echo $order['price']?></td>
							<td class="column-5">$<?php echo $order['price']?></td>
						</tr>
						<?php 	}
						?>
						

					</tbody>

				</table>
			</div>
		</div>

		<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
			<div class="size10 trans-0-4 m-t-10 m-b-10">
				<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
					Confirm Order
				</button>
			</div>
		</div>

	</div>
</section>
<?php include 'footer.php';?>
