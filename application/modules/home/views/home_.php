<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<head>
<title><?php echo $websetting->webtitle;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url()?>themes/theme1/web/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="<?php echo base_url();?>assets/owlcarousel/js/owl.carousel.css" />
<script type="text/javascript" src="<?php echo base_url()?>themes/theme1/web/js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>themes/theme1/web/js/easing.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>themes/theme1/web/js/move-top.js"></script>
</head>
<body>
	<div class="header">
  	  		<div class="wrap">
  	  		<?php $header_top = true;?>
  	  		<?php if($header_top){?>
  	  		<?php $this->load->view("header_top")?>
  	  		<?php }?>
  		    </div>
  		    <div class="navigation">
  		    	<a class="toggleMenu" href="#">Menu</a>
					<ul class="nav">
						<li>
							<a href="#">Home</a>
						</li>
						<li  class="test">
							<a href="#">Peralatan Perkantoran</a>
							<ul>
								<li>
									<a href="#">Meja</a>
									<ul>
										<li><a href="#">Meja Pertemuan</a></li>
										<li><a href="#">Meja Kerja</a></li>
									</ul>
								</li>
								<li>
									<a href="#">Rak Buku</a>
									<ul>
										<li><a href="#">Rak Buku Besar</a></li>
										<li><a href="#">Rak Buku Sedang</a></li>
									</ul>
								</li>
								<li>
									<a href="#">Pemotong Kertas</a>
									<ul>
										<li><a href="#">Pemotong Kertas Manual</a></li>
										<li><a href="#">Pemotong Kertas Elektronik</a></li>
									</ul>
								</li>
								<li>
									<a href="#">Mesin Laminating</a>
									<ul>
										<li><a href="#">Mesin Laminating #1</a></li>
										<li><a href="#">Mesin Laminating #2</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Computers</a>
							<ul>
								<li>
									<a href="#">Laptops</a>
									<ul>
										<li><a href="#">HP</a></li>
										<li><a href="#">Lenova</a></li>
										<li><a href="#">Dell</a></li>
										<li><a href="#">All Brands</a></li>
									</ul>
								</li>
								<li>
									<a href="#">Computer Accessories</a>
									<ul>
										<li><a href="#">Printer Cartridges</a></li>
										<li><a href="#">Printer Toner</a></li>
										<li><a href="#">Printer Ribbon</a></li>
										<li><a href="#">Flash Disk</a></li>
										<li><a href="#">Card Reader</a></li>
										<li><a href="#">Power Bank</a></li>
										<li><a href="#">Cooler</a></li>
										<li><a href="#">Mousepad</a></li>
										<li><a href="#">Keyboard</a></li>
										<li><a href="#">Kabel Printer</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Perlengkapan Kantor</a>
							<ul>
								<li>
									<a href="#">Kertas</a>
									<ul>
										<li><a href="#">A4</a></li>
										<li><a href="#">A5</a></li>
										<li><a href="#">Envelope</a></li>

									</ul>
								</li>
								<li>
									<a href="#">Alat Tulis</a>
									<ul>
										<li><a href="#">Pena</a></li>
										<li><a href="#">Spidol</a></li>
										<li><a href="#">Pensil</a></li>
										<li><a href="#">Correction Pen</a></li>
									</ul>
								</li>
								<li>
									<a href="#">Lain-lain</a>
									<ul>
										<li><a href="#">Stapler</a></li>
										<li><a href="#">Clipper</a></li>
										<li><a href="#">Post It</a></li>
										<li><a href="#">Cutter</a></li>
										<li><a href="#">Diary</a></li>
										<li><a href="#">Notebook</a></li>
										<li><a href="#">Kalkulator</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Hubungi Kami</a>
						</li>
					</ul>
					 <span class="left-ribbon"> </span>
      				 <span class="right-ribbon"> </span>
  		    </div>
  		    <?php $pageheader="slide";?>
  		    <?php switch($websetting->headertype){
  		    case "1":
			$this->load->view("slideheader");
			break;
			case "0":
			$this->load->view("staticheader");
			break;
			}?>
	</div>
</div>
   <!------------End Header ------------>
  <div class="main">
      <div class="content">
      <?php if($websetting->shownewproducts=="1"){?>
      <?php $this->load->view("newproduct");?>
      <?php }?>
    	  <div class="content_bottom">
    	    <div class="wrap">
    	    	<div class="content-bottom-left">
    	    		<div class="categories">
						   <ul>
								<h3>Browse All Categories</h3>
								<li><a href="#">Kertas</a></li>
								<li><a href="#">Meja kerja</a></li>
								<li><a href="#">Computers & Electronics</a></li>
								<li><a href="#">Alat Tulis</a></li>
								<li><a href="#">Tinta</a></li>
								<li><a href="#">Pemotong Kertas</a></li>
								<li><a href="#">Kartu Nama</a></li>
								<li><a href="#">Notebook dan Diary</a></li>
								<li><a href="#">Lain-lain</a></li>
						  	 </ul>
						</div>
						<div class="buters-guide">
						<h3>Panduan Pembelian</h3>
						<p><span>Kepuasan anda adalah kebahagiaan kami.</span></p>
						<p>Sehingga kami berkomitmen memberi anda segala upaya untuk membuat pilihan terbaik dengan usaha minimal. </p>
					  </div>
					  <div class="add-banner">
					  	<img src="<?php echo base_url()?>media/products/camera.png" alt="" />
					  	<div class="banner-desc">
					  		<h4>Electronics</h4>
					  	    <a href="#">More Info</a>
					  	</div>
					  	<div class="clear"></div>
					  </div>
					    <div class="add-banner add-banner2">
					  	<img src="<?php echo base_url()?>media/products/computer.png" alt="" />
					  	<div class="banner-desc">
					  		<h4>Computers</h4>
					  	    <a href="#">More Info</a>
					  	</div>
					  	<div class="clear"></div>
					  </div>
    	    	</div>

    	    	<div class="content-bottom-right">
    	    	<h3>Browse All Categories</h3>
    	    	<div class="section group group1"></div>
    	    	<div class="section group group2"></div>
    	    	<?php
					if($websetting->showfrontarticles==="1"){
						$this->load->view("front_articles");
					}
    	    	?>
		      </div>
		      <div class="clear"></div>
		   </div>
         </div>
      </div>
    </div>
   <div class="footer">
   	  <div class="wrap">
			 <div class="copy_right">
				<p>Copy rights (c). All rights Reseverd | Template by  <a href="#">mr X</a> </p>
		   </div>
		   <div class="footer-nav">
		   	<ul>
		   		<li><a href="#">Terms of Use</a> : </li>
		   		<li><a href="#">Privacy Policy</a> : </li>
		   		<li><a href="contact.html">Contact Us</a> : </li>
		   		<li><a href="#">Sitemap</a></li>
		   	</ul>
		   </div>
        </div>
    </div>
    <script src="<?php echo base_url();?>assets/owlcarousel/js/owl.carousel.js"></script>
    <script type="text/javascript">
    var mydomain = "belanjaatk";
		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });
			$.ajax({
				url:"http://"+mydomain+"/home/getproducts/0/4",
				dataType:"json",
				type:"get"
			}).done(function(data){
				$.each(data,function(x,y){
					if(y.alterprice==="-"){
						$(".group1").append('<div class="grid_1_of_4 images_1_of_4"><h4><a href="preview.html">'+y.name+'</a></h4><a href="preview.html"><img src="<?php echo base_url()?>media/products/'+y.image+'" alt="" /></a><div class="price-details"><div class="price-number"><span></span><p><span class="rupees">Rp. '+y.sellingprice+' </span></p></div><div class="add-cart"><h4><a href="preview.html">More Info</a></h4></div><div class="clear"></div></div></div>');
					}else{
						$(".group1").append('<div class="grid_1_of_4 images_1_of_4"><h4><a href="preview.html">'+y.name+'</a></h4><a href="preview.html"><img src="<?php echo base_url()?>media/products/'+y.image+'" alt="" /></a><div class="price-details"><div class="price-number"><span>Rp. '+y.alterprice+'</span><p><span class="rupees" style="text-decoration:line-through">Rp. '+y.sellingprice+' </span></p></div><div class="add-cart"><h4><a href="preview.html">More Info</a></h4></div><div class="clear"></div></div></div>');					}
				});
			}).fail(function(){
				console.log("Cannot load data");
			});
			$.ajax({
				url:"http://"+mydomain+"/home/getproducts/4/4",
				dataType:"json",
				type:"get"
			}).done(function(data){
				$.each(data,function(x,y){
					$(".group2").append('<div class="grid_1_of_4 images_1_of_4"><h4><a href="preview.html">'+y.name+'</a></h4><a href="preview.html"><img src="<?php echo base_url()?>media/products/'+y.image+'" alt="" /></a><div class="price-details"><div class="price-number"><p><span class="rupees">Rp. '+y.sellingprice+'</span></p></div><div class="add-cart"><h4><a href="preview.html">More Info</a></h4></div><div class="clear"></div></div></div>');
				});
			}).fail(function(){
				console.log("Cannot load data");
			});
			$.ajax({
				url:"http://"+mydomain+"/home/getnewrelease",
				dataType:"json",
				type:"get",
			}).done(function(data){
				$.each(data,function(x,y){
					$("#owl-demo").append('<div class="item"><img width="100px" height="100px" src="<?php echo base_url()?>media/products/'+y.image+'" alt="Owl Image"></div>');
				});
				$("#owl-demo").owlCarousel({
					autoPlay: 3000, //Set AutoPlay to 3 seconds
					items : 4,
					itemsDesktop : [1199,3],
					itemsDesktopSmall : [979,3]
				});

			});
		});
	</script>
    <a href="#" id="toTop"> </a>
	<script src="<?php echo base_url()?>themes/theme1/web/js/jquery.openCarousel.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url()?>themes/theme1/web/js/navigation.js"></script>
    <!--start owl carousel-->
    <script src="<?php echo base_url();?>assets/owlcarousel/js/bootstrap-collapse.js"></script>
    <script src="<?php echo base_url();?>assets/owlcarousel/js/bootstrap-transition.js"></script>
    <script src="<?php echo base_url();?>assets/owlcarousel/js/bootstrap-tab.js"></script>

    <script src="<?php echo base_url();?>assets/owlcarousel/js/google-code-prettify/prettify.js"></script>
	<script src="<?php echo base_url();?>assets/owlcarousel/js/application.js"></script>
	<!--end owl carousel-->
	<!--start banner rotator-->
    <script type="text/javascript" src="<?php echo base_url();?>assets/jssor/jssor.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/jssor/jssor.slider.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/implementjssor.js"></script>
	<!--end banner rotator-->
</body>
</html>

