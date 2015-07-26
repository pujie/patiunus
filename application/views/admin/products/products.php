<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="<?php echo base_url();?>favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatable1.10.5/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatable1.10.5/media/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatable1.10.5/media/resources/demo.css">
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
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/default.css" id="style_color-header-1" />
<!-- end of tambahan-->
	<title>Produk</title>
	<style type="text/css" class="init">
		.pointer{cursor:pointer}
		.pointer :hover{

		}
		.images{list-style:none;}
		.images li{display:inline;float:left;padding:5px;}

	</style>
	<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/datatable1.10.5/media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/datatable1.10.5/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/datatable1.10.5/media/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/datatable1.10.5/media/resources/demo.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" class="init" src="<?php echo base_url();?>js/admin/products/products.js"></script>
</head>

<body class="dt-example">
<?php $this->load->view('admin/header')?>
<!--=== Breadcrumbs ===-->
<div class="row-fluid breadcrumbs margin-bottom-20">
	<div class="container">
        <h1 class="pull-left">Administrasi</h1>
        <ul class="pull-right breadcrumb">
            <li id="productadd"><img src="<?php echo base_url();?>assets/img/aquarius/ic_plus.png" /></li>
        </ul>
    </div><!--/container-->
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

	<div class="container">
		<section>
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Produk Baru</th>
						<th>Gallery</th>
						<th>Harga Jual</th>
						<th>Harga Diskon</th>
						<th>Aktif</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($objs as $obj){?>
					<tr rowid='<?php echo $obj->id;?>'>
						<td class='objname'><?php echo $obj->name;?></td>
						<td><?php echo ($obj->isnewrelease=='1')?'Ya':'Tidak';?></td>
						<td><?php echo ($obj->isgallery=='1')?'Ya':'Tidak';?></td>
						<td><?php echo $obj->sellingprice;?></td>
						<td><?php echo $obj->alterprice;?></td>
						<td class='activeproduct'><?php echo ($obj->active=='1')?'Ya':'Tidak';?></td>
						<td>
						<span class="productedit pointer" >
							<img src="<?php echo base_url();?>assets/img/aquarius/ic_edit.png">
						</span>
						<span class="productdelete pointer" >
							<img src="<?php echo base_url();?>assets/img/aquarius/ic_delete.png">
						</span>
						</td>
					</tr>
					<?php }?>

				</tbody>
			</table>

		</section>
	</div>

</body>
</html>
