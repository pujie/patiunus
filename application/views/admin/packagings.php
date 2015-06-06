<!DOCTYPE html>
<!--[if IE 7]> <html lang="en" class="ie7"> <![endif]-->  
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Packaging</title>

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
    <link rel="shortcut icon" href="favicon.ico" />        
    <!-- CSS Implementing Plugins -->    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/font-awesome/css/font-awesome.css" />
    <!-- CSS Theme -->    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/default.css" id="style_color" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/headers/default.css" id="style_color-header-1" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/stylesheet.css" />    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/najma.css" />        
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head> 

<body>
    <div id="dRemoveConfirmation" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p>Apakah anda yakin hendak menghapus packaging <span id="packagingname2delete"></span> ?.</p>
            <button packagingid2delete="" id="btndelete">Ya</button>
        </div>
    </div>      

<?php $this->load->view('admin/header')?>

<!--=== Breadcrumbs ===-->
<div class="row-fluid breadcrumbs margin-bottom-20">
	<div class="container">
        <h1 class="pull-left">Packaging</h1>
        <ul class="pull-right breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li><a href="">Admin</a> <span class="divider">/</span></li>
            <li class="active">Packaging</li>
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
		<div class="navigasi"><img src="<?php echo base_url();?>assets/img/aquarius/ic_plus.png" id="btnpackagingadd"></div>
		<!-- end of added by puji -->
        	<div class="span12">
                <table class="table" id="packagings">
                    <thead>
                        <tr class="info">
                            <th>Judul</th>
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
                            <td><img width="100" src="<?php echo base_url();?>media/packaging/<?php echo $obj->img;?>"></td>
                            <td><?php echo $obj->description;?></td>
                            <td><a href="<?php echo base_url();?>admin/packaging_edit/<?php echo $obj->id;?>"><img src="<?php echo base_url();?>assets/img/aquarius/ic_edit.png"></a>
                            <a class="packagingremove" packagingid="<?php echo $obj->id;?>"><img src="<?php echo base_url();?>assets/img/aquarius/ic_delete.png"></a>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div><!--/row-fluid-->
	</div><!--/row-fluid-->
    <!--//Default Tables styles -->        
</div><!--/container-->		
<!--=== End Content Part ===-->

<?php $this->load->view('admin/footer')?>

<!-- JS Global Compulsory -->           
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script>        
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
<!-- JS Implementing Plugins -->           
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/back-to-top.js"></script>
<!-- JS Page Level -->           
<script type="text/javascript" src="<?php echo base_url();?>assets/js/app.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        $("#packagings").dataTable();
        $(".packagingremove").click(function(){
            $.ajax({
				url:'<?php echo base_url();?>packagings/getjson/'+$(this).attr('packagingid'),
				dataType: 'json',
				async:false
            }).done(function(data){
                $("#btndelete").attr("packagingid2delete",data["id"]);
				$("#packagingname2delete").text(data["name"]);
            }).fail(function(){alert("tidak bisa");});
        	$("#dRemoveConfirmation").modal();
        });
        $("#btndelete").click(function(){
			window.location.href = "<?php echo base_url();?>admin/packaging_remove/"+$(this).attr("packagingid2delete");
        });
        $("#btnpackagingadd").click(function(){
			window.location.href = "<?php echo base_url();?>admin/packaging_add";
        });
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