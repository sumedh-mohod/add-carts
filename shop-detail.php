<!DOCTYPE html>
<html lang="en">
<head>

<?php $title= "shope-detail";
include "head.php"?>

</head>
<body>
<?php
require_once 'connect.php';
$sql = "SELECT * FROM products WHERE category_id= ?";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(1, $_GET['category_id']);
$stmt->execute();
$result = $stmt->fetchAll();
// var_dump($result); 

// after clicking on perticular element grabs its name element according to the id
$sql = "SELECT * FROM categories WHERE id= ?";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(1, $_GET['category_id']);
$stmt->execute();
$products = $stmt->fetch();
    var_dump ($products);
    
    ?>

	<!-- Start preloader -->
		<!-- <div id="preloader">
			<label>Loading</label>
		</div> -->
	<!-- End preloader -->

	
	<?php include "shop-header.php"?>

	<section class="page-banner" style="background-image:url(img/banner-img.jpg)" >
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12">
					<div class="page-title">
						<h1 class="page-headding"><?php echo $products['id'] ?><?php echo $products['name'] ?></h1>
						<ul>
							<li><a href="index.html" class="page-name">Home</a></li>
							<li><a href="shop-categories.html" class="page-name">Order Online</a></li>
							<li>Chicken bresast</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="product-det pt-100">
		<div class="container">
			<div class="row">
				<?php foreach($result as $results){?>
				<div class="col-lg-5 col-md-6 col-12">
					<div class="align-center mb-md-30">
					    <ul id="glasscas" class="gc-start">
					        <li><img src= <?php echo $results['image'] ?> alt="pizzon" width="300" height="400" /></li>
												        
					    </ul>
					</div>
				</div>
				<div class="col-xl-7 col-lg-7 col-md-7 mb-5">
					<div class="shop-detail">
						<div class="shop-name">
							<h3 class="title-shop" name="name"> <?php  echo  $results['name'] ?></h3>
							<div class="price-shop">
								<span class="filter-price filter-price-r">$ 20.00  </span>
								<span class="filter-price" name="price"><?php  echo  $results['price'] ?></span>
							</div>
							<p class="shop-desc"><?php  echo  $results['details'] ?></p>
						</div>
						<div class="crust-choose">
							<label class="title-crust">Choose Your Crust</label>
							<ul class="Choose">
								<li class="tab-link"><a href="javascript:void(0)">Classic Hand Tossed</a></li>
								<li class="tab-link"><a href="javascript:void(0)">Wheat Thin Crust</a></li>
								<li class="tab-link"><a href="javascript:void(0)">Classic Hand Tossed</a></li>
							</ul>
						</div>
						<div class="crust-choose">
							<label class="title-crust">Size of Crust</label>
							<ul class="Size">
								<li class="tab-link"><a href="javascript:void(0)">Medium</a></li>
								<li class="tab-link"><a href="javascript:void(0)">Large</a></li>
								<li class="tab-link"><a href="javascript:void(0)">Regular</a></li>
							</ul>
						</div>
						<div class="quantity-product">
							<label class="quantity">Qty:</label>
							<input type="number"  name="quantity"value="1" min="0" max="10">
							<a href="cart.php" id="addcart" class="add-cart"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Add to cart</a>
						</div>
						<div class="wiselist">
							<ul class="compare">
								<li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Wishlist </a></li>
								<li><a href="#"><i class="fa fa-signal" aria-hidden="true"></i> Compare</a></li>
								<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Email to Friends</a></li>
							</ul>
							<ul class="share">
								<li class="share-title">Share This :</li>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<?php }?>
			</div>
			

		</div>
	</section>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script>
        var queryString = window.location.search;
        var urlParams = new URLSearchParams(queryString);
        var id = urlParams.get('id');
        var isInsert = true;
		if (id) {
            axios.get('get-cart.php', {
                params: {
                    id: id
                }
            }).then(function(response) {
                console.log(response.data);
                document.getElementsByName('name')[0].value = response.data.name;
                document.getElementsByName('quantity')[0].value = response.data.quantity;
                document.getElementsByName('price')[0].value = response.data.price;
            }).catch(function(error) {
                console.log(error);
                alert(error);
            });
            isInsert = false;
        }
       
        document.getElementById("addcart").addEventListener("click", function(event) {
            event.preventDefault();
            
                axios.post('cart.php', {
                        name: document.getElementsByName('name')[0].innerHTML,
                        quantity: document.getElementsByName('quantity')[0].value,
                        price: document.getElementsByName('price')[0].innerHTML,
                    })
                    .then(function(response) {
                        console.log(response.data);
                        alert('data inserted - '+ response.data);
                    })
                    .catch(function(error) {
                        console.log(error);
                        alert('error');
                    });
             } );
    </script>
	<section class="desc-tabbing pt-100">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12">
					<div class="border-tab">
						<ul class="panel-tab">
							<li class="tab-link current" data-tab="tab-1"><a href="javascript:void(0)">Description</a></li>
							<li class="tab-link" data-tab="tab-3"><a href="javascript:void(0)">Reviews</a></li>
						</ul>
						<div class="product-desc-tab current" id="tab-1">
							<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. </p>
							<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
						</div>
						<div class="product-desc-tab" id="tab-3">
							<div class="comment-part">
								<h3>03 COMMENTS</h3>
								<ul>
									<li>
										<!-- <div class="comment-user">
											<img src="images/comment-img1.jpg" alt="comment-img">
										</div> -->
										<div class="comment-detail">
											<span class="commenter">
												<span>John Doe</span> (05 Jan 2020)
											</span>
											<p>Lorem ipsum dolor sit amet adipiscing elit labore dolore that sed do eiusmod tempor labore dolore that magna aliqua. Ut enim ad minim veniam, exercitation.</p>
											<a href="#" class="reply-btn btn btn-color small">Reply</a>
										</div>
										<div class="clearfix"></div>
									</li>
									<li>
										<ul>
											<li>
												<!-- <div class="comment-user">
													<img src="images/comment-img2.jpg" alt="comment-img">
												</div> -->
												<div class="comment-detail">
													<span class="commenter">
														<span>John Doe</span> (12 Jan 2020)
													</span>
													<p>Lorem ipsum dolor sit amet adipiscing elit labore dolore that sed do eiusmod tempor labore dolore that magna aliqua. Ut enim ad minim veniam, exercitation.</p>
													<a href="#" class="reply-btn btn btn-color small">Reply</a>
												</div>
												<div class="clearfix"></div>
											</li>
											<li>
												<!-- <div class="comment-user">
													<img src="images/comment-img3.jpg" alt="comment-img">
												</div> -->
												<div class="comment-detail">
													<span class="commenter">
														<span>John Doe</span> (15 Jan 2020)
													</span>
													<p>Lorem ipsum dolor sit amet adipiscing elit labore dolore that sed do eiusmod tempor labore dolore that magna aliqua. Ut enim ad minim veniam, exercitation.</p>
													<a href="#" class="reply-btn btn btn-color small">Reply</a>
												</div>
												<div class="clearfix"></div>
											</li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="leave-comment-part pt-100">
								<h3 class="reviews-head mb-30">Leave A Comment</h3>
								<form class="main-form">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Name" required="">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Subject" required="">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Email" required="">
											</div>
										</div>
										<div class="col-12">
											<div class="form-group">
												<textarea class="form-control" placeholder="Message" rows="8"></textarea>
											</div>
										</div>
										<div class="col-12">
											<button type="submit" class="btn post-comm">Post Comment</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="releted-product special-menu pt-100 pb-100">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12">
					<div class="headding-part text-center pb-50">
						<p class="headding-sub">Fresh From Pizzon</p>
						<h2 class="headding-title text-uppercase font-weight-bold">Related Products</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 col-lg-3 col-md-4 text-center pt-20">
					<div class="menu-img"><a href="shop-detail.html"><img src="images/rel-1.png" alt="menu" class="menu-image"></a></div>
					<a href="shop-detail.html" class="menu-title text-uppercase">margherita pizza</a>
					<p class="menu-des">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
					<span class="menu-price">$20.50</span>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-4 text-center pt-20">
					<div class="menu-img"><a href="shop-detail.html"><img src="images/rel-1.png" alt="menu" class="menu-image"></a></div>
					<a href="shop-detail.html" class="menu-title text-uppercase">RUM WITH SODA</a>
					<p class="menu-des">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
					<span class="menu-price">$20.50</span>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-4 text-center pt-20">
					<div class="menu-img"><a href="shop-detail.html"><img src="images/rel-2.png" alt="menu" class="menu-image"></a></div>
					<a href="shop-detail.html" class="menu-title text-uppercase">VEGETARIAN</a>
					<p class="menu-des">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
					<span class="menu-price">$20.50</span>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-4 text-center pt-20">
					<div class="menu-img"><a href="shop-detail.html"><img src="images/rel-3.png" alt="menu" class="menu-image"></a></div>
					<a href="shop-detail.html" class="menu-title text-uppercase">PEPPERONI PIZZA</a>
					<p class="menu-des">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
					<span class="menu-price">$20.50</span>
				</div>
			</div>
		</div>
	</section>

	<div class="top-scrolling">
		<a href="#header" class="scrollTo"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
	</div>

	<?php include "footer.php"?>

	<script src="js/jquery.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/modernizr.js"></script>
	<script>
	    $(document).ready( function () {
	        //If your <ul> has the id "glasscase"
	        $('#glasscase').glassCase({ 
	           	'thumbsPosition': 'bottom', 
	            'widthDisplayPerc' : 100,
	            isDownloadEnabled: false,
	        });
	    });
	</script>
	<script src="js/script.js"></script>
		
    <!-- script for add carts -->
	
</body>
</html>