<?php 
ob_start();
 function frst_session_start() {

 if(!isset($_SESSION)){
		session_start();
	}
  $bob = session_id();
	return $bob;
		
	if ( !is_writable(session_save_path()) ) {
	   echo 'Session save path "'.session_save_path().'" is not writable!'; 
	}
	
}

include_once 'db_connect.php';


class home_data {
	
function base_tag(){

	global $mysqli;
	$stmt = $mysqli->prepare("SELECT id, url FROM website_setting WHERE id = 1");
	$stmt->execute();   
	$stmt->store_result();
	$stmt->bind_result($id, $weburl);
	$stmt->fetch();
	$stmt->close();	   
   
	return '<BASE href="'.$weburl.'">';
}
 
 
   public function slider(){
	global $mysqli;
	$statement = $mysqli->prepare("SELECT id, title, link, photo from slider 
	WHERE activity =  1 ORDER BY id ASC");
	$statement->execute();
	$statement->bind_result($pid, $title, $link, $pakPhoto);
	
	while ($statement->fetch()) {
		$slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $title));
			echo'
				<div class="slide" style="background-image:url(images/main-slider/content-image-3.png)">
					<div class="auto-container">
						<div class="clearfix">
							<div class="content">
								<h2>'.$title.'</h2>
								<div class="text">We love to provide a professional service that really helps businesses to achieve your goals.</div>
								<div class="link-box">
									<a href="'.$link.'" target="_blank" class="theme-btn btn-style-three"><span class="txt">Click Here</span></a>
								</div>
							</div>
							<div class="image-box">
								<div class="image">
									<img src="public/upload/';if ($pakPhoto == NULL){echo 'photo.png';}else{echo ($pakPhoto);}echo'"" alt="" title="">
								</div>
							</div>
						</div>
					</div>
				</div>';
		 }
	$statement->close();
	}


   public function serviceList(){
	global $mysqli;
	$statement = $mysqli->prepare("SELECT id, title, short_title, photo from services 
	WHERE activity =  1 ORDER BY id ASC limit 3");
	$statement->execute();
	$statement->bind_result($sid, $packageName, $shorTtitle, $pakPhoto);
	
	while ($statement->fetch()) {
		$slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $packageName));
			echo'
				<div class="services-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="icon-box">
							<span class="icon"><img width="30%" src="public/upload/';if ($pakPhoto == NULL){echo 'photo.png';}else{echo ($pakPhoto);}echo'"" alt=""/></span>
						</div>
						<div class="lower-content">
							<h3><a href="service/'.$sid.'/'.$slug.'">'.$packageName.'</a></h3>
							<div class="text">'.$shorTtitle.'</div>
						</div>
					</div>
				</div>';
		 }
   $statement->close();
	}
	
	
	public function teamMember(){
	global $mysqli;
	$statement = $mysqli->prepare("SELECT id, name, designation, photo from team 
	WHERE activity =  1 ORDER BY id ASC");
	$statement->execute();
	$statement->bind_result($sid, $name, $designation, $pakPhoto);
	while ($statement->fetch()) {
		
			echo'
				<div class="team-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1000ms">
						<div class="image">
							<a href="#"><img src="public/upload/';if ($pakPhoto == NULL){echo 'photo.png';}else{echo ($pakPhoto);}echo'"" alt="" title=""></a>
						</div>
						<div class="lower-content">
							<h3><a href="#">'.$name.'</a></h3>
							<div class="designation">'.$designation.'</div>
						</div>
					</div>
				</div>';
		 }
   $statement->close();
	}
	
	
   public function blogList(){
	global $mysqli;
	$statement = $mysqli->prepare("SELECT id, title, short_title, name, photo, create_at from blog 
	WHERE activity =  1 ORDER BY visitor DESC limit 3");
	$statement->execute();
	$statement->bind_result($bid, $packageName, $short_title, $name, $pakPhoto, $create_at);
	
	while ($statement->fetch()) {
		$slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $packageName));
			$dateFormate = date('j F Y', strtotime($create_at));
			echo'
				
				<div class="news-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1000ms">
						<div class="image">
							<a href="blog/'.$bid.'/'.$slug.'"><img src="public/upload/';if ($pakPhoto == NULL){echo 'photo.png';}else{echo ($pakPhoto);}echo'" alt="" /></a>
						</div>
						<div class="lower-content">
							<ul class="post-meta">
								<li>'.$name.'</li>
								<li>'.$dateFormate.'</li>
							</ul>
							<h3><a href="blog/'.$bid.'/'.$slug.'">'.$packageName.'</a></h3>
							<div class="text">'.$short_title.'</div>
							<a href="blog/'.$bid.'/'.$slug.'" class="read-more">Read More <span class="arrow flaticon-next-5"></span></a>
						</div>
					</div>
				</div>';
		 }
   $statement->close();
	}
	
	
   public function allBlogs(){
	global $mysqli;
	$statement = $mysqli->prepare("SELECT id, title, short_title, name, photo, create_at from blog 
	WHERE activity =  1 ORDER BY visitor DESC");
	$statement->execute();
	$statement->bind_result($bid, $packageName, $short_title, $name, $pakPhoto, $create_at);
	
	while ($statement->fetch()) {
		$slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $packageName));
			$dateFormate = date('j F Y', strtotime($create_at));
			echo'
				
				<div class="news-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1000ms">
						<div class="image">
							<a href="blog/'.$bid.'/'.$slug.'"><img src="public/upload/';if ($pakPhoto == NULL){echo 'photo.png';}else{echo ($pakPhoto);}echo'" alt="" /></a>
						</div>
						<div class="lower-content">
							<ul class="post-meta">
								<li>'.$name.'</li>
								<li>'.$dateFormate.'</li>
							</ul>
							<h3><a href="blog/'.$bid.'/'.$slug.'">'.$packageName.'</a></h3>
							<div class="text">'.$short_title.'</div>
							<a href="blog/'.$bid.'/'.$slug.'" class="read-more">Read More <span class="arrow flaticon-next-5"></span></a>
						</div>
					</div>
				</div>';
		 }
   $statement->close();
	}
	
	
public function allportfolio(){
	global $mysqli;
	$statement = $mysqli->prepare("SELECT id, name, link, type, photo, create_at from portfolio 
	WHERE activity =  1 AND show_web = 1 ORDER BY id DESC");
	$statement->execute();
	$statement->bind_result($bid, $name, $wlink, $type, $pakPhoto, $create_at);
	while ($statement->fetch()) {
			echo'
				<div class="feature-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeIn" data-wow-delay="0ms" data-wow-duration="1000ms">
						<a target="_blank" href="'.$wlink.'">
							<div class="icon-box">
								<span class="icon"><img src="public/upload/';if ($pakPhoto == NULL){echo 'photo.png';}else{echo ($pakPhoto);}echo'" alt="" /></span>
							</div>
							<h3>'.$name.'</h3>
						</a>
					</div>
				</div>';
		 }
   $statement->close();
	}


		
public function home_sec_one(){
	
		global $mysqli;
		$url_string_cat = 1;
		$stmt = $mysqli->prepare("SELECT id, menu, position FROM sd_home_edit
		WHERE position = ? AND menu > 0");
		$stmt->bind_param('s', $url_string_cat);  
		$stmt->execute();   
		$stmt->store_result();
		$stmt->bind_result($id, $menu_id, $position);
			
			while ($stmt->fetch()) {
				
				if ($stmt_m = $mysqli->prepare("SELECT name, photo from categories
				 WHERE id = ? ")){
				$stmt_m->bind_param('s', $menu_id);  
				$stmt_m->execute();   
				$stmt_m->bind_result($menu_name, $photo);
				$stmt_m->store_result();
				$stmt_m->fetch();
				$stmt_m->close();
                 }	
						
			echo '
			
			<section class="product_area mb-46">
				<div class="">
					<div class="row">
						<div class="col-lg-3 col-md-3">
							<div class="slcatb">
								<div class="top_category_header">
									<h3>'.$menu_name.'</h3>
									<a href="category/'.$menu_id.'/'.$menu_name.'">View More</a>
								</div>
							</div>
						</div>
						<div class="col-lg-9 col-md-3">
							<div class="product_carousel product_column4 owl-carousel">';
								global $mysqli;
								if ($stmt_pro = $mysqli->prepare("SELECT id, name, category, price, discount_per, discount, discount_price, photo 
								from products
								WHERE activity = 1 AND  category = ?
								ORDER BY id DESC limit 8")){
								$stmt_pro->bind_param('s', $menu_id);  
								$stmt_pro->execute();   
								$stmt_pro->bind_result($id, $name, $category, $price, $discount_per, $discount, $discount_price, $photo);
								$stmt_pro->store_result();
									}
								while ($stmt_pro->fetch()) {
									
									$str = preg_replace('/[^A-Za-z0-9\. -]/', '', $name);
									
									 echo '
										<article class="single_product">
											<figure>
												<div class="product_thumb">
													<div class="thubimg" style="background-image: url(images/products/';if ($photo == NULL){echo 'photo.png';}else{echo ($photo);}echo');"></div>
													<div class="label_product">';
														if ($discount_price > 0){
														echo '
															<span class="label_sale">'.$discount_per.'% off</span>';
															}
														echo'
													</div>
													
													<div class="addtocart">
														<a href="product/'.$id.'/'.$name.'" title="add to cart">Add to cart</a>
													</div>
												</div>
												<figcaption class="product_content">';
													if ($discount_price > 0){
													echo '
													<div class="price_box">
														<span class="current_price">৳'.($discount_price).'</span>
														<span class="old_price">৳'.($price).'</span>
													</div>';
													}
													else{
													echo'
													<div class="price_box">
														<span class="current_price">৳'.($price).'</span>
													</div>';
														}
													echo'
													<h3 class="product_name"><a href="product/'.$id.'/'.$name.'">'.$name.' </a></h3>
												</figcaption>
											</figure>
										</article>';
										}
															
									echo '
							
							</div>
						</div>
					</div>
				</div>
			</section>
				
				';
 
 				 }
			}
	
			
			
			
}
$obj_home = new home_data();
?>