<?php require_once 'connect.php';
    $sql = "SELECT * FROM categories";
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute();
    $products = $stmt->fetchAll();
    // var_dump ($products);
    foreach($products as $product) {
        // var_dump($product['name']); 
    }
    ?>

<header id="header">
		<div class="container">
			<div class="row m-0">
				<div class="col-xl-3 col-lg-2 col-md-4 col-3 p-0">
		            <div class="navbar-header">
			               	<a class="navbar-brand page-scroll" href="index.html">
			                	<img alt="pizzon" src="img/Darfield-Logo.png">
			                </a> 
		            </div>
			    </div>
			    <div class="col-xl-9 col-lg-10 col-md-8 col-9 p-0 text-right">
			        <div id="menu" class="navbar-collapse collapse" >
			            <ul class="nav navbar-nav">
				            <li class="level">
				                <a href="index.html" class="page-scroll">Home</a>
				            </li>
				            <li class="level dropdown set"> 
				                <a href="menu-1.html" class="page-scroll">Menu</a>
				                <span class="opener plus"></span>
				                <div class="megamenu mobile-sub-menu content megamenu-big">
				                    <div class="megamenu-inner-top">
				                        <ul class="sub-menu-level1">
					                        <li class="level2 menu-list-d">
					                            <div class="row">
					                            	<div class="col-xl-9 col-lg-9 col-md-9">
					                            		<div class="row">
														<?php foreach($products as $product) { ?>
					                            			<div class="col-xl-4 col-lg-4 col-md-4">
					                            				<div class="menu-grid">
					                            					<a href="shop-detail.php?category_id=<?php echo $product['id']?>" class="menu-grid-center">
						                            					<div class="pizza-menu">
						                            						<img src="<?php echo $product['image'] ?>" alt="pizza">
						                            					</div>
						                            					<div class="pizza-det">
						                            						<p class="Pizza-name-1"><?php echo $product['id'] ?><?php echo $product['name'] ?></p>
						                            						<span class="pizza-price-1">$12.99</span>
						                            					</div>
						                            				</a>
					                            				</div>
					                            			</div>
															<?php } ?>
					                            			<!-- <div class="col-xl-4 col-lg-4 col-md-4">
					                            				<div class="menu-grid">
					                            					<a href="shop-detail.html" class="menu-grid-center">
						                            					<div class="pizza-menu">
						                            						<img src="images/1-1.png" alt="pizza">
						                            					</div>
						                            					<div class="pizza-det">
						                            						<p class="Pizza-name-1">Vegetarian</p>
						                            						<span class="pizza-price-1">$12.99</span>
						                            					</div>
						                            				</a>
					                            				</div>
					                            			</div>
					                            			<div class="col-xl-4 col-lg-4 col-md-4">
					                            				<div class="menu-grid">
					                            					<a href="shop-detail.html" class="menu-grid-center">
						                            					<div class="pizza-menu">
						                            						<img src="images/2.png" alt="pizza">
						                            					</div>
						                            					<div class="pizza-det">
						                            						<p class="Pizza-name-1">Specialty</p>
						                            						<span class="pizza-price-1">$12.99</span>
						                            					</div>
						                            				</a>
					                            				</div>
					                            			</div>
					                            			<div class="col-xl-4 col-lg-4 col-md-4">
					                            				<div class="menu-grid">
					                            					<a href="shop-detail.html" class="menu-grid-center">
						                            					<div class="pizza-menu">
						                            						<img src="images/2-1.png" alt="pizza">
						                            					</div>
						                            					<div class="pizza-det">
						                            						<p class="Pizza-name-1">Ham & Cheese</p>
						                            						<span class="pizza-price-1">$12.99</span>
						                            					</div>
						                            				</a>
					                            				</div>
					                            			</div>
					                            			<div class="col-xl-4 col-lg-4 col-md-4">
					                            				<div class="menu-grid">
					                            					<a href="shop-detail.html" class="menu-grid-center">
						                            					<div class="pizza-menu">
						                            						<img src="images/3.png" alt="pizza">
						                            					</div>
						                            					<div class="pizza-det">
						                            						<p class="Pizza-name-1">Onion</p>
						                            						<span class="pizza-price-1">$12.99</span>
						                            					</div>
						                            				</a>
					                            				</div>
					                            			</div>
					                            			<div class="col-xl-4 col-lg-4 col-md-4">
					                            				<div class="menu-grid">
					                            					<a href="shop-detail.html" class="menu-grid-center">
						                            					<div class="pizza-menu">
						                            						<img src="images/4.png" alt="pizza">
						                            					</div>
						                            					<div class="pizza-det">
						                            						<p class="Pizza-name-1">Margheritapizza</p>
						                            						<span class="pizza-price-1">$12.99</span>
						                            					</div>
						                            				</a>
					                            				</div>
					                            			</div> -->
					                            		</div>
					                            	</div>
					                            	<div class="col-xl-3 col-lg-3 col-md-3">
					                            		<ul>
					                            			<li><a href="menu-2.html">Menu list</a></li>
					                            			<li><a href="menu-1.html">Menu grid</a></li>
					                            			<li><a href="#">Special Pizza</a></li>
					                            			<li><a href="#">All pizza</a></li>
					                            		</ul>
					                            	</div>
					                            </div>
					                        </li>
					                        <li class="level2 level2 menu-list-res">
					                            <ul class="sub-menu-level2 ">
					                              <li class="level3"><a href="menu-2.html"><span>■</span>Menu list</a></li>
					                              <li class="level3"><a href="menu-1.html"><span>■</span>Menu grid</a></li>
					                              <li class="level3"><a href="#"><span>■</span>Special Pizza</a></li>
					                              <li class="level3"><a href="#"><span>■</span>All pizza</a></li>
					                            </ul>
					                        </li>
				                        </ul>
				                    </div>
				                </div>
				            </li>
				            <li class="level set">
				                <a href="blog-leftside.html" class="page-scroll">Blog</a>
				                <span class="opener plus"></span> 
				                <div class="megamenu mobile-sub-menu content">
				                    <div class="megamenu-inner-top">
				                       	<ul class="sub-menu-level1">
				                         	<li class="level2">
				                            	<ul class="sub-menu-level2 ">
				                             		<li class="level3"><a href="blog-leftside.html"><span>■</span>Blog Leftside</a></li>
				                              		<li class="level3"><a href="blog-rightside.html"><span>■</span>Blog rightside</a></li>
				                              		<li class="level3"><a href="blog-detail.html"><span>■</span>Blog detail</a></li>
				                            	</ul>
				                          	</li>
				                        </ul>
				                    </div>
				                </div>
				            </li>
				            <li class="level">
				                <a href="reservation.html" class="page-scroll">Reservation</a>
				            </li>
				            <li class="level dropdown set"> 
				                <a href="about.html" class="page-scroll">Pages</a>
				               	<span class="opener plus"></span> 
				                <div class="megamenu mobile-sub-menu content">
				                    <div class="megamenu-inner-top">
				                        <ul class="sub-menu-level1">
				                          	<li class="level2">
				                            	<ul class="sub-menu-level2 ">
				                              		<li class="level3"><a href="about.html"><span>■</span>About Us</a></li>
				                              		<li class="level3"><a href="contact.html"><span>■</span>Contact</a></li>
				                              		<li class="level3"><a href="shop-grid.html"><span>■</span>Shop grid</a></li>
				                            	</ul>
				                          	</li>
				                        </ul>
				                    </div>
				                </div>
				            </li>
			            </ul>
			        </div>
			        <div class=" header-right-link">
			            <ul>
			                <li class="call-icon">
			                	<a href="#">
			                		<span class="icon"></span>
			                		<div class="link-text">+91 123 456 789</div>
			                	</a>
			                </li>
			                <li class="cart-icon"> 
			                	<a href="#"> 
			                		<span class="icon"></span>
			                		<div class="link-text">0 items - <span>$0.00</span></div>
			                	</a>
				                <div class="cart-dropdown header-link-dropdown">
				                    <ul class="cart-list link-dropdown-list">
				                      	<li> <a class="close-cart"><i class="fa fa-times-circle"></i></a>
				                        	<div class="media"> <a href="shop-detail.html" class="pull-left"> <img alt="Pizzon" src="images/1.png"></a>
				                          	<div class="media-body"> <span><a href="shop-detail.html">margherita pizza</a></span>
					                            <p class="cart-price">$14.99</p>
					                            <div class="product-qty">
					                              	<label>Qty:</label>
					                              	<div class="custom-qty">
					                                	<input type="text" name="qty" maxlength="8" value="1" title="Qty" class="input-text qty" disabled>
					                              	</div>
					                            </div>
				                          	</div>
				                        </div>
				                      	</li>
				                      	<li> <a class="close-cart"><i class="fa fa-times-circle"></i></a>
				                        	<div class="media"> <a class="pull-left"> <img alt="Pizzon" src="images/2.png"></a>
					                          	<div class="media-body"> <span><a href="#">GREEK PIZZA</a></span>
					                            	<p class="cart-price">$14.99</p>
					                            	<div class="product-qty">
						                              	<label>Qty:</label>
						                              	<div class="custom-qty">
						                                	<input type="text" name="qty" maxlength="8" value="1" title="Qty" class="input-text qty" disabled>
						                              	</div>
					                            	</div>
					                          	</div>
				                        	</div>
				                      	</li>
				                    </ul>
				                    <p class="cart-sub-totle"> 
				                    <span class="pull-left">Cart Subtotal</span> 
				                    <span class="pull-right"><strong class="price-box">$29.98</strong></span> </p>
				                    <div class="clearfix"></div>
				                    <div class="mt-20 text-left"> 
				                    	<a href="cart.html" class="btn-color btn">Cart</a> 
				                    	<a href="checkout.html" class="btn-color btn right-side">Checkout</a> 
				                    </div>
				                </div>
			                </li>
			                <li class="order-online">
			                	<a href="shop-categories.html" class="btn btn-green">Order online</a>
			                </li>
			                <li class="side-toggle">
			                  	<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"><span></span></button>
			                </li>
			            </ul>
			        </div>
			    </div>
			</div>
		</div>
	</header>