<!DOCTYPE html>
<!--[if IE 7]> <html lang="en" class="ie7"> <![endif]-->  
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Sarung Wadimor</title>

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- CSS Global Compulsory-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/headers/header1.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_responsive.css" />
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/icons/favicon.ico" />        
    <!-- CSS Implementing Plugins -->    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fancybox/source/jquery.fancybox.css" />           
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/effects.css" />           
    <!-- CSS Theme -->    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/default.css" id="style_color" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/headers/default.css" id="style_color-header-1" />    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head> 

<body>

<?php $this->load->view('staticview/topnheader');?>;

<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-50">
	<div class="container">
        <ul class="pull-right breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li><a href="">Pages</a> <span class="divider">/</span></li>
            <li class="active">Gallery</li>
        </ul>
    </div><!--/container-->
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="container">				
	<h3><?php echo $title;?></h3>
	<div class="row-fluid gallery">
        <ul class="thumbnails">
        <?php $c=0;?>
        <?php foreach($objs as $obj){?>
            <li class="span3">
                <a class="thumbnail fancybox-button zoomer" data-rel="fancybox-button" title="Project #1" href="<?php echo base_url();?>media/coraks/<?php echo $obj->image;?>">
                    <div class="overlay-zoom">	
                        <img src="<?php echo base_url();?>media/kelas/<?php echo $obj->img;?>" alt="" />
                        <div class="zoom-icon"></div>					
                    </div>												
                </a>
            </li>
            <?php $c++;?>
            <?php if($c%4==0){?>
            </ul>
            <ul class="thumbnails">
            <?php }?>
            <?php }?>
        </ul><!--/thumbnails-->


        <div class="pagination pagination-right">
            <ul>
                <li><a href="#">Prev</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li class="active"><a>3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">Next</a></li>
            </ul>
        </div>			
    </div><!--/row-fluid-->
</div><!--/container-->		
<!--=== End Content Part ===-->

<!--=== Footer ===-->
<div class="footer">
	<div class="container">
		<div class="row-fluid">
			<div class="span4">
                <!-- About -->
		        <div class="headline"><h3>About</h3></div>	
				<p class="margin-bottom-25">Wadimor adalah kebanggaan bangsa yang telah menjadi tradisi turun-menurun bagi masyarakat Indonesia yang religius.</p>	

	            <!-- Monthly Newsletter -->
		        <div class="headline"><h3>Monthly Newsletter</h3></div>	
				<p>Masukkan email anda pada form berikut untuk mendapatkan berita terbaru tentang Wadimor!</p>
				<form class="form-inline" />
					<div class="input-append">
						<input type="text" placeholder="Email Address" class="input-medium" />
						<button class="btn-u">Subscribe</button>
					</div>
				</form>							
			</div><!--/span4-->	
			
			<div class="span4">
                <div class="posts">
                    <div class="headline"><h3>New Products</h3></div>
                    <dl class="dl-horizontal">
                        <dt><a href="#"><img src="<?php echo base_url();?>assets/img/sliders/elastislide/work6.jpg" alt="" /></a></dt>
                        <dd>
                            <p><a href="#">Motif A</a><br />
                            Elegan dalam segala suasana ....
                            </p> 
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                    <dt><a href="#"><img src="<?php echo base_url();?>assets/img/sliders/elastislide/work10.jpg" alt="" /></a></dt>
                        <dd>
                            <p><a href="#">Motif B</a><br />
                            Keceriaan dalam kebersamaan ...
                            </p> 
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                    <dt><a href="#"><img src="<?php echo base_url();?>assets/img/sliders/elastislide/work11.jpg" alt="" /></a></dt>
                        <dd>
                            <p><a href="#">Motif C</a>
                            Lembut dan Percaya diri ..
                            </p> 
                        </dd>
                    </dl>
                </div>
			</div><!--/span4-->

			<div class="span4">
	            <!-- Monthly Newsletter -->
		        <div class="headline"><h3>Contact Us</h3></div>	
                <address>
					25, Lorem Lis Street, Orange <br />
					Surabaya, Indonesia <br />
					Phone: 800 123 3456 <br />
					Fax: 800 123 3456 <br />
					Email: <a href="mailto:info@wadimor.co.id" class="">info@wadimor.co.id</a>
                </address>

                <!-- Stay Connected -->
		        <div class="headline"><h3>Stay Connected</h3></div>	
                <ul class="social-icons">
                    <li><a href="#" data-original-title="Feed" class="social_rss"></a></li>
                    <li><a href="#" data-original-title="Facebook" class="social_facebook"></a></li>
                    <li><a href="#" data-original-title="Twitter" class="social_twitter"></a></li>
                    <li><a href="#" data-original-title="Goole Plus" class="social_googleplus"></a></li>
                    <li><a href="#" data-original-title="Pinterest" class="social_pintrest"></a></li>
                    <li><a href="#" data-original-title="Linkedin" class="social_linkedin"></a></li>
                    <li><a href="#" data-original-title="Vimeo" class="social_vimeo"></a></li>
                </ul>
			</div><!--/span4-->
		</div><!--/row-fluid-->	
	</div><!--/container-->	
</div><!--/footer-->	
<!--=== End Footer ===-->

<!--=== Copyright ===-->
<div class="copyright">
	<div class="container">
		<div class="row-fluid">
			<div class="span8">						
	            <p>2014 &copy; Unify. ALL Rights Reserved. <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
			</div>
		</div><!--/row-fluid-->
	</div><!--/container-->	
</div><!--/copyright-->	
<!--=== End Copyright ===-->

<!-- JS Global Compulsory -->           
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script>        
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
<!-- JS Implementing Plugins -->           
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/back-to-top.js"></script>
<!-- JS Page Level -->           
<script type="text/javascript" src="<?php echo base_url();?>assets/js/app.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        App.initFancybox();
    });
</script>
<!--[if lt IE 9]>
    <script src="<?php echo base_url();?>assets/js/respond.js"></script>
<![endif]-->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29166220-1']);
  _gaq.push(['_setDomainName', 'htmlstream.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body>
</html>
