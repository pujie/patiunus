<!DOCTYPE html>
<!--[if IE 7]> <html lang="en" class="ie7"> <![endif]-->  
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Wadimor</title>

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
    <link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico" />        
    <!-- CSS Implementing Plugins -->    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/font-awesome/css/font-awesome.css" />
    <!-- CSS Theme -->    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/default.css" id="style_color" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/headers/default.css" id="style_color-header-1" />    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head> 

<body>
<!--=== Style Switcher ===-->    
<i class="style-switcher-btn icon-cogs"></i>
<div class="style-switcher">
    <div class="theme-close"><i class="icon-remove"></i></div>
    <div class="theme-heading">Theme Colors</div>
    <ul class="unstyled">
        <li class="theme-default theme-active" data-style="default" data-header="light"></li>
        <li class="theme-blue" data-style="blue" data-header="light"></li>
        <li class="theme-orange" data-style="orange" data-header="light"></li>
        <li class="theme-red" data-style="red" data-header="light"></li>
        <li class="theme-light" data-style="light" data-header="light"></li>
    </ul>
</div><!--/style-switcher-->
<!--=== End Style Switcher ===-->    

<?php $this->load->view('staticview/topnheader');?>

<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-20">
	<div class="container">
        <h1 class="color-green pull-left"></h1>
        <ul class="pull-right breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li><a href="blog.html">Blog</a> <span class="divider">/</span></li>
            <li class="active">Item</li>
        </ul>
    </div><!--/container-->
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="container">		
	<div class="row-fluid blog-page blog-item">
        <!-- Left Sidebar -->
    	<div class="span9">
        	<div class="blog margin-bottom-30">
            	<h3><?php echo $obj->subject;?></h3>
            	<ul class="unstyled inline blog-info">
                	<li><i class="icon-calendar"></i> March 02, 2014</li>
                	<li><i class="icon-pencil"></i> <?php echo $obj->author;?></li>
                </ul>
            	<ul class="unstyled inline blog-tags">
                    <li>
                        <i class="icon-tags"></i> 
                        <a href="#">Sejarah Sarung</a> 
                        <a href="#">Budaya</a>
                        <a href="#">Religi</a>
                    </li>
                </ul>
                <div class="blog-img"><img src="<?php echo base_url();?>media/blogs/<?php echo $obj->img1;?>" alt="" width="100" height="100" /></div>
                <?php echo $obj->content;?>
            </div><!--/blog-->

			<hr />


            <hr />

        </div><!--/span9-->

        <!-- Right Sidebar -->
    	<div class="span3">
        	<!-- Photo Stream -->
        	<div class="headline"><h3>Photo Stream</h3></div>
            <ul class="unstyled blog-ads">
            	<li><a href="#"><img src="<?php echo base_url();?>assets/img/corak/aloha1.jpg" alt="" class="hover-effect" /></a></li>
            	<li><a href="#"><img src="<?php echo base_url();?>assets/img/corak/aloha2.jpg" alt="" class="hover-effect" /></a></li>
            	<li><a href="#"><img src="<?php echo base_url();?>assets/img/corak/aloha3.jpg" alt="" class="hover-effect" /></a></li>
            	<li><a href="#"><img src="<?php echo base_url();?>assets/img/corak/aloha4.jpg" alt="" class="hover-effect" /></a></li>
            	<li><a href="#"><img src="<?php echo base_url();?>assets/img/corak/elegant1.jpg" alt="" class="hover-effect" /></a></li>
            	<li><a href="#"><img src="<?php echo base_url();?>assets/img/corak/elegant2.jpg" alt="" class="hover-effect" /></a></li>
            	<li><a href="#"><img src="<?php echo base_url();?>assets/img/corak/elegant3.jpg" alt="" class="hover-effect" /></a></li>
            	<li><a href="#"><img src="<?php echo base_url();?>assets/img/corak/elegant4.jpg" alt="" class="hover-effect" /></a></li>
            </ul>

        	<!-- Blog Tags -->
        	<div class="headline"><h3>Blog Tags</h3></div>
            <ul class="unstyled inline blog-tags">
            	<li><a href="#"><i class="icon-tags"></i> Sarung</a></li>
            	<li><a href="#"><i class="icon-tags"></i> Sejarah</a></li>
            	<li><a href="#"><i class="icon-tags"></i> Indonesia</a></li>
            	<li><a href="#"><i class="icon-tags"></i> Budaya</a></li>
            	<li><a href="#"><i class="icon-tags"></i> Religi</a></li>
            	<li><a href="#"><i class="icon-tags"></i> Acara</a></li>
            </ul>

        </div><!--/span3-->
    </div><!--/row-fluid-->        
</div><!--/container-->		
<!--=== End Content Part ===-->

<?php $this->load->view('staticview/footerncopyright');?>

<!-- JS Global Compulsory -->           
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script>        
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
<!-- JS Implementing Plugins -->           
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/back-to-top.js"></script>
<!-- JS Page Level -->           
<script type="text/javascript" src="<?php echo base_url();?>assets/js/app.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
    });
</script>
<!--[if lt IE 9]>
    <script src="<?php echo base_url();?>assets/js/respond.js"></script>
<![endif]-->

</body>
</html>	