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
							
							<!-- new button -->
                            <a href="cart.php" class="add-cart" data-product="<?php echo $product['id']?>"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Add to cart</a>

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
	
	<!-- desc-tabbing section -->
	<?php include "desc-tabbing.php"?>
     <!-- releted-product section -->
	<?php include "releted-product.php"?>

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
        var myFunction = function(event) {
            event.preventDefault();
            var productId = this.getAttribute("data-product");
            axios.post('cart.php', {
                id: id,
                name: document.getElementsByName('name')[0].innerHTML,
                quantity: document.getElementsByName('quantity')[0].value,
                price: document.getElementsByName('price')[0].innerHTML,
            })
};

var elements = document.getElementsByClassName("add-cart");
for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener('click', myFunction, false);
}
    </script>
</body>
</html>