<!DOCTYPE html>
<!--[if IE 7]> <html lang="en" class="ie7"> <![endif]-->  
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Administrasi</title>

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- CSS Global Compulsory-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/headers/header1.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/plugins/bootstrap/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/style_responsive.css" />
    <link rel="shortcut icon" href="favicon.ico" />        
    <!-- CSS Implementing Plugins -->    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/plugins/font-awesome/css/font-awesome.css" />
    <!-- CSS Theme -->    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/themes/default.css" id="style_color" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/themes/headers/default.css" id="style_color-header-1" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/stylesheet.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/najma.css" />        
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head> 

<body>

<!--=== Top ===-->    
<?php $this->load->view('admin/top');?>
<!--=== End Top ===-->    

<!--=== Header ===-->
<div class="header">               
    <div class="container"> 
        <!-- Logo -->       
        <div class="logo">                                             
            <a href="index.html"><img id="logo-header" src="<?php echo base_url();?>assets/img/logowadimor.png" alt="Logo" /></a>
        </div><!-- /logo -->        
                                    
        <!-- Menu -->       
        <!-- Menu -->       
        <div class="navbar">                                
            <div class="navbar-inner">                                  
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a><!-- /nav-collapse -->                                  
                <div class="nav-collapse collapse">                                     
                    <ul class="nav top-2">
                        <li>
                            <a href="#" class="inactive" data-toggle="dropdown">Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/users" class="inactive">Users</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/blogs" class="inactive">Blogs</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/categories" class="inactive">Categories</a>
                        </li>
                    </ul>
                </div><!-- /nav-collapse -->                                
            </div><!-- /navbar-inner -->
        </div><!-- /navbar -->                          
    </div><!-- /container -->               
</div><!--/header -->      
<!--=== End Header ===-->

<!--=== Breadcrumbs ===-->
<div class="row-fluid breadcrumbs margin-bottom-20">
	<div class="container">
        <h1 class="pull-left"></h1>
        <ul class="pull-right breadcrumb">
            <li><a>Admin</a> <span class="divider">/</span></li>
            <li class='active'><a>Setting</a></li>
        </ul>
    </div><!--/container-->
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="container">		
	<div class="row-fluid">
        <!-- Default Tables styles -->


		<div class="row-fluid">
		<!-- start of added by puji -->
		<div class="navigasi"><img src="<?php echo base_url();?>assets/img/aquarius/ic_plus.png" id="btncategoryadd"></div>
		<!-- end of added by puji -->
        	<div class="span12">
                <table class="table table-bordered" id="categories">
                    <thead>
                        <tr class="info">
                            <th>Nama</th>
                            <th>Aktif</th>
                            <th>Gambar</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($objs as $obj){?>
                        <tr class="success">
                            <td><?php echo $obj->name;?></td>
                            <td><?php echo ($obj->active=='1')?'ya':'tidak';?></td>
                            <td><img width="100" src="<?php echo base_url();?>assets/categories/<?php echo $obj->image;?>"></td>
                            <td><?php echo $obj->description;?></td>
                            <td><a href="<?php echo base_url();?>admin/category_edit/<?php echo $obj->id;?>"><img src="<?php echo base_url();?>assets/img/aquarius/ic_edit.png"></a>
                            <a class="categoryremove" categoryid="<?php echo $obj->id;?>"><img src="<?php echo base_url();?>assets/img/aquarius/ic_delete.png"></a>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
				<?php echo $this->pagination->create_links();?>

            </div>

    </div><!--/row-fluid-->  
</div><!--/container-->		
<!--=== End Content Part ===-->

<!--=== Footer ===-->

<?php $this->load->view('admin/footer')?>
<!--=== End Footer ===-->

<!-- JS Global Compulsory -->           
<script type="text/javascript" src="assets/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="assets/js/modernizr.custom.js"></script>        
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
<!-- JS Implementing Plugins -->           
<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
<!-- JS Page Level -->           
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
    });
</script>
<!--[if lt IE 9]>
    <script src="assets/js/respond.js"></script>
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
