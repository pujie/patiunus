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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/padi.autocomplete.css" />
	<style type="text/css" class="init">
		.pointer{cursor:pointer}
		.pointer :hover{

		}
		.images{list-style:none;}
		.images li{display:inline;float:left;padding:5px;}

	</style>
	<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/datatable1.10.5/media/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/ajax_file_upload/ajaxupload.3.5.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/datatable1.10.5/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/datatable1.10.5/media/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/datatable1.10.5/media/resources/demo.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/padi.autocompletex.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.lazyload.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.lazy.min.js"></script>
	<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
	$.ajax({
		url:'<?php echo base_url();?>tests/teat',
		type:'post',
		dataType:'json'
	}).done(function(dt){
		$('#productparent').autocomp({
			data:dt,
		});
	}).fail(function(){
		console.log('Tidak dapat menarik json');
	});
	var producttable = $('#example').dataTable( {
		"pagingType": "full_numbers"
	} );
	$('#example tbody').on('click','tr .productedit',function(){
		var thisrow = $(this).parent().parent();
		thisrow.parent().find('tr').removeClass('selected');
		thisrow.addClass('selected');
		console.log('rowid : '+thisrow.attr('rowid'));
		$.ajax({
			url:'<?php echo base_url();?>categories/get',
			type:'post',
			dataType:'json',
			data:{id:thisrow.attr('rowid')}
		}).done(function(data){
			$('#dProductEdit').attr('objid',data['id']);
			$('#nameedit').val(data['name']);
			$('#productImageEdit').val(data['image']);
			$("#sellingpriceedit").val(data['sellingprice']);
			$("#alterpriceedit").val(data['alterprice']);
			$('#pictureEdit').html('');
			$('#activeedit').html('');
			$('#newreleaseedit').html('');
			$('#galleryeedit').html('');
			$('#pictureEdit').append('<em class="overflow-hidden"><img width="200" src="<?php echo base_url();?>media/products/'+data['image']+'" alt="" /></em>');
			switch(data['active']){
			case '0':
				$('#activeedit').append('<option value=1>Ya</option>');
				$('#activeedit').append('<option value=0 selected="selected">Tidak</option>');
			break;
			case '1':
				$('#activeedit').append('<option value=1 selected="selected">Ya</option>');
				$('#activeedit').append('<option value=0>Tidak</option>');
			break;
			}
			switch(data['isnewrelease']){
			case '0':
			console.log('not newreleased');
				$('#newreleaseedit').append('<option >Ya</option>');
				$('#newreleaseedit').append('<option selected="selected" >Tidak</option>');
				break;
			case '1':
			console.log('newreleased');
				$('#newreleaseedit').append('<option selected="selected" >Ya</option>');
				$('#newreleaseedit').append('<option >Tidak</option>');
				break;
			}
			switch(data['isgallery']){
			case '0':
			console.log('not gallery');
				$('#galleryeedit').append('<option >Ya</option>');
				$('#galleryeedit').append('<option selected="selected" >Tidak</option>');
				break;
			case '1':
			console.log('gallery');
				$('#galleryeedit').append('<option selected="selected" >Ya</option>');
				$('#galleryeedit').append('<option >Tidak</option>');
				break;
			}
			$('#dProductEdit').modal();
		}).fail(function(){
			console.log('Tidak dapat melakukan edit produk');
		});
	});
	$('#productadd').click(function(){
		$('#dProductAdd').modal();
	});
	$('.productdelete').click(function(){
		var thisrow = $(this).parent().parent();
		thisrow.parent().find('tr').removeClass('selected');
		thisrow.addClass('selected');
		$('#productoremove').text(thisrow.find('.objname').html());
		$('#dConfirmation').modal();
	});
	$('#btnRemove').click(function(){
	console.log("requested ID : "+$("#example").find("tr.selected").attr("rowid"));
		$.ajax({
			url:'<?php echo base_url();?>categories/remove',
			type:'post',
			data:{id:$("#example").find("tr.selected").attr("rowid")}
		}).done(function(data){
			console.log(data);
			$("#example").find("tr.selected").remove();
			//activeproduct
		}).fail(function(){
			console.log('Tidak dapat mengupdate produk');
		});
	});
	$('#btnSave').click(function(){
		$.ajax({
			url:'<?php echo base_url();?>categories/save',
			type:'post',
			data:{name:$('#name').val(),type:$("#ctype").val(),unit:$("#unit").val(),sellingprice:$("#sellingprice").val(),image:$("#productImageAdd").val()}
		}).done(function(data){
			console.log(data);
			producttable.fnAddData( [
			$('#name').val(),
			"Ya",
			"Ya","Ya",
			"Ya","<span class='productedit pointer' ><img src='<?php echo base_url();?>assets/img/aquarius/ic_edit.png'></span><span class='productdelete pointer' ><img src='<?php echo base_url();?>assets/img/aquarius/ic_delete.png'></span>" ]
		  );
		}).fail(function(){
			console.log('Tidak dapat menyimpan produk');
		});
	});
	$('#btnUpdate').click(function(){
		$.ajax({
			url:'<?php echo base_url();?>categories/update',
			type:'post',
			data:{id:$("#example").find("tr.selected").attr("rowid"),active:$('#activeedit').val(),sellingprice:$("#sellingpriceedit").val(),alterprice:$("#alterpriceedit").val(),image:$("#productImageEdit").val()}
		}).done(function(data){
			console.log(data);
		}).fail(function(){
			console.log('Tidak dapat mengupdate produk');
		});
	});
	$("#ctype").change(function(){
		switch($(this).val()){
			case "0":
			$("#dproductparent").hide();
			break;
			case "1":
			$("#dproductparent").show();
			break;
		}
	});
	initimageupload = function(){
	var btnUpload=$('#uploadimage');
	var status=$('#status');
	new AjaxUpload(btnUpload, {
		action: '<?php echo base_url();?>admin/category_upload_tmp',
		name: 'uploadfile',
		onSubmit: function(file, ext){
		if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
			// extension is not allowed
			status.text('Only JPG, PNG or GIF files are allowed');
			return false;
		}
		status.text('Uploading...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			status.text('');
			//Add uploaded file to list
			if(response==="success"){
				console.log("sukese");
//				$('#path').val(file);
				$("#productImageEdit").val(file);
				$('#pictureEdit').html('');
			$('#pictureEdit').append('<em class="overflow-hidden"><img width="200" src="<?php echo base_url();?>media/products/'+file+'" alt="" /></em>');
			}
			else{console.log("error")};
		}
	});
	}
	initimageuploadAdd = function(){
	var btnUpload=$('#uploadimageAdd');
	var status=$('#statusAdd');
	new AjaxUpload(btnUpload, {
		action: '<?php echo base_url();?>admin/category_upload_tmp',
		name: 'uploadfile',
		onSubmit: function(file, ext){
		if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
			// extension is not allowed
			status.text('Only JPG, PNG or GIF files are allowed');
			return false;
		}
		status.text('Uploading...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			status.text('');
			//Add uploaded file to list
			if(response==="success"){
				console.log("sukese");
//				$('#path').val(file);
				$("#productImageAdd").val(file);
				$('#pictureAdd').html('');
			$('#pictureAdd').append('<em class="overflow-hidden"><img width="200" src="<?php echo base_url();?>media/products/'+file+'" alt="" /></em>');
			}
			else if(response==="error"){console.log("error")}
			else{
				console.log("unknown weeorr");
				}
		}
	});
	}
	initimageupload();
	initimageuploadAdd();
} );

	</script>
</head>

<body class="dt-example">
			<div id="dInformation" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">Informasi</h3>
				</div>
				<div class="modal-body">
					<div class='row-fluid'>
						<div class="span12">
							<div class="without-head">
								Data telah tersimpan
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnClose">Tutup</button>
				</div>
			</div>
			<div id="dImages" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" >
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">Images</h3>
				</div>
				<div class="modal-body">
					<div class='row-fluid'>
						<div class="span12">
							<div class="without-head">
								<ul class='images'>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnClose">Tutup</button>
				</div>
			</div>

			<div id="dConfirmation" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">Konfirmasi</h3>
				</div>
				<div class="modal-body">
					<div class='row-fluid'>
						<div class="span12">
							<div class="without-head">
								Anda akan menghapus <span id='productoremove'></span>
								Anda yakin ?
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnRemove">Ya</button>
					<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnClose">Tutup</button>
				</div>
			</div>
			<div id="dProductAdd" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">Penambahan Produk</h3>
				</div>
				<div class="modal-body">
					<div class='row-fluid'>
						<div class="span12">
							<div class="without-head">
								<div class="row-form clearfix">
									<div class="span6">Nama:</div>
									<div class="span6">
										<input id="name" name="name"/>
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span6">Ditampilkan di gallery:</div>
									<div class="span6">
										<select>
										<option>Ya</option>
										<option>Tidak</option>
										</select>
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span6">Ditampilkan di New Release:</div>
									<div class="span6">
										<select>
										<option>Ya</option>
										<option>Tidak</option>
										</select>
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span6">Jenis:</div>
									<div class="span6">
										<select id="ctype">
										<option value="1">Produk</option>
										<option value="0">Kategori</option>
										</select>
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span6">Satuan:</div>
									<div class="span6">
										<input type='text' id='unit'/>
									</div>
								</div>
								<div class="row-form clearfix" id="dproductparent">
									<div class="span6">Parent:</div>
									<div class="span6">
										<input type='text' id='productparent'/>
									</div>
								</div>
								<div class="row-form clearfix" id="dproductparent">
									<div class="span6">Harga Jual:</div>
									<div class="span6">
										<input type='text' id='sellingprice'/>
									</div>
								</div>
								<div class="row-form clearfix" id="dproductparent">
									<div class="span6">Harga Pengganti:</div>
									<div class="span6">
										<input type='text' id='alterprice'/>
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span6">Image:</div>
									<div class="span6">
										<p><input type='text' id='productImageAdd'/></p>
										<p><a class="imageuploader" id="uploadimageAdd">Pilih Gambar</a></p>
										<span id="statusAdd"></span>
									</div>
								</div>
								<div id="pictureAdd" class="row-form clearfix">

								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btnClose" data-dismiss="modal" aria-hidden="true" id="btnSave">Simpan</button>
					<button class="btn btnClose" data-dismiss="modal" aria-hidden="true" id="btnClose">Tutup</button>
				</div>
			</div>

			<div id="dProductEdit" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" objid="" >
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">Edit Produk</h3>
				</div>
				<div class="modal-body">
					<div class='row-fluid'>
						<div class="span12">
							<div class="without-head">
								<div class="row-form clearfix">
									<div class="span6">Nama:</div>
									<div class="span6">
										<input id="nameedit" name="nameedit"/>
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span6">Aktif:</div>
									<div class="span6">
										<select  id='activeedit'></select>
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span6">Ditampilkan di gallery:</div>
									<div class="span6">
										<select id='galleryeedit'></select>
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span6">Ditampilkan di New Release:</div>
									<div class="span6">
										<select  id='newreleaseedit'></select>
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span6">Parent:</div>
									<div class="span6">
										<input type='text' id='productparent'/>
									</div>
								</div>
								<div class="row-form clearfix" id="dproductparent">
									<div class="span6">Harga Jual:</div>
									<div class="span6">
										<input type='text' id='sellingpriceedit'/>
									</div>
								</div>
								<div class="row-form clearfix" id="dproductparent">
									<div class="span6">Harga Pengganti:</div>
									<div class="span6">
										<input type='text' id='alterpriceedit'/>
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span6">Image:</div>
									<div class="span6">
										<p><input type='text' id='productImageEdit'/></p>
										<p><a class="imageuploader" id="uploadimage">Pilih Gambar</a></p>
										<span id="status"></span>
									</div>
								</div>
								<div id="pictureEdit" class="row-form clearfix">

								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btnClose" data-dismiss="modal" aria-hidden="true" id="btnUpdate">Simpan</button>
					<button class="btn btnClose" data-dismiss="modal" aria-hidden="true" id="btnCloseUpdate">Tutup</button>
				</div>
			</div>


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
