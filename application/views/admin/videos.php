<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="http://wadimor.co.id/favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
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
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/default.css" id="style_color-header-1" />
	<title>Video</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatable1.10.5/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatable1.10.5/media/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatable1.10.5/media/resources/demo.css">
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
		url:'http://wadimor.co.id/tests/teat',
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
	$('#example tbody').on('click','tr .videoedit',function(){
		var thisrow = $(this).parent().parent();
		thisrow.parent().find('tr').removeClass('selected');
		thisrow.addClass('selected');
		console.log('rowid : '+thisrow.attr('rowid'));
		$.ajax({
			url:'http://wadimor.co.id/videos/get',
			type:'post',
			dataType:'json',
			data:{id:thisrow.attr('rowid')}
		}).done(function(data){
			$('#dvideoedit').attr('objid',data['id']);
			$('#nameedit').val(data['name']);
			$('#productImageEdit').val(data['tgp_path']);
			$('#mp4Edit').val(data['mp4_path']);
			$('#webmEdit').val(data['webm_path']);
			$('#oggEdit').val(data['ogg_path']);
			$('#activeedit').html('');
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
			$('#dvideoedit').modal();
		}).fail(function(){
			console.log('Tidak dapat melakukan edit Video');
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
			url:'http://wadimor.co.id/categories/update',
			type:'post',
			data:{id:$("#example").find("tr.selected").attr("rowid"),active:"0"}
		}).done(function(data){
			console.log(data);
			$("#example").find("tr.selected td.activeproduct").html('Tidak');
			//activeproduct
		}).fail(function(){
			console.log('Tidak dapat mengupdate produk');
		});
	});
	$('#btnSave').click(function(){
		$.ajax({
			url:'http://wadimor.co.id/videos/save',
			type:'post',
			data:{name:$('#name').val()}
		}).done(function(data){
			console.log(data);
		}).fail(function(){
			console.log('Tidak dapat menyimpan Video');
		});
	});
	$('#btnUpdate').click(function(){
		$.ajax({
			url:'http://wadimor.co.id/videos/update',
			type:'post',
			data:{id:$("#example").find("tr.selected").attr("rowid"),
				tgp_path:$("#productImageEdit").val(),
				mp4_path:$("#mp4Edit").val(),
				webm_path:$("#webmEdit").val()}
		}).done(function(data){
			console.log(data);
		}).fail(function(){
			console.log('Tidak dapat mengupdate Video');
		});
	});

	init3gpupload = function(){
	var btnUpload=$('#uploadtgp');
	var status=$('#status');
	new AjaxUpload(btnUpload, {
		action: 'http://wadimor.co.id/admin/tgp_upload_tmp',
		name: 'uploadfile',
		onSubmit: function(file, ext){
		if (! (ext && /^(3gp)$/.test(ext))){
			// extension is not allowed
			status.text('Hanya ekstensi 3GP yang diperbolehkan');
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
			}
			else{console.log("error")};
		}
	});
	}

	initmp4upload = function(){
	var btnUpload=$('#uploadmp4');
	var status=$('#mp4status');
	new AjaxUpload(btnUpload,{
		action:'http://wadimor.co.id/admin/mp4_upload_tmp',
		name:'uploadfile',
		onSubmit:function(file, ext){
		if(!(ext && /^(mp4)$/.test(ext))){
		status.text('Hanya extensi MP4 yang diperbolehkan');
		return false
		}
		status.text('Uploading...');
		},
		onComplete:function(file, response){
		status.text('');
		if(response==='success'){
		console.log("mp4 upload success");
		$("#mp4Edit").val(file);
		}
		}
	});
	}

	initwebmupload = function(){
	var btnUpload=$('#uploadwebm');
	var status=$('#webmstatus');
	new AjaxUpload(btnUpload,{
		action:'http://wadimor.co.id/admin/webm_upload_tmp',
		name:'uploadfile',
		onSubmit:function(file, ext){
		if(!(ext && /^(webm)$/.test(ext))){
		status.text('Hanya extensi Webm yang diperbolehkan');
		return false
		}
		status.text('Uploading...');
		},
		onComplete:function(file, response){
		status.text('');
		if(response==='success'){
		console.log("Webm upload success");
		$("#webmEdit").val(file);
		}
		}
	});
	}
	initoggupload = function(){
	var btnUpload=$('#uploadogg');
	var status=$('#oggstatus');
	new AjaxUpload(btnUpload,{
		action:'http://wadimor.co.id/admin/ogg_upload_tmp',
		name:'uploadfile',
		onSubmit:function(file, ext){
		if(!(ext && /^(ogg)$/.test(ext))){
		status.text('Hanya extensi ogg yang diperbolehkan');
		return false
		}
		status.text('Uploading...');
		},
		onComplete:function(file, response){
		status.text('');
		if(response==='success'){
		console.log("Ogg upload success");
		$("#oggEdit").val(file);
		}
		}
	});
	}
	
	init3gpupload();
	initmp4upload();
	initwebmupload();
	initoggupload();
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
			
			<div id="dConfirmation" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">Konfirmasi</h3>
				</div>
				<div class="modal-body">
					<div class='row-fluid'>
						<div class="span12">
							<div class="without-head">
<!--								Anda akan menghapus <span id='productoremove'></span>
								Anda yakin ?-->
								Video tidak dapat dihapus, namun bisa diganti
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<!--<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnRemove">Ya</button>-->
					<button class="btn" data-dismiss="modal" aria-hidden="true" id="btnClose">Tutup</button>
				</div>
			</div>
			<div id="dProductAdd" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">Penambahan Video</h3>
				</div>
				<div class="modal-body">
					<div class='row-fluid'>
						<div class="span12">
							<div class="without-head">
								<!--<div class="row-form clearfix">
									<div class="span6">Nama:</div>
									<div class="span6">
										<input id="name" name="name"/>
									</div>
								</div>-->
Fitur Penambahan Video tidak ada, karena tidak posisi Video sudah fixed, akan tetapi anda dapat mengganti Video yang telah ada.
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
<!--					<button class="btn btnClose" data-dismiss="modal" aria-hidden="true" id="btnSave">Simpan</button>-->
					<button class="btn btnClose" data-dismiss="modal" aria-hidden="true" id="btnClose">Tutup</button>
				</div>
			</div>
			
			<div id="dvideoedit" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" objid="" >
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">Edit Video</h3>
				</div>
				<div class="modal-body">
					<div class='row-fluid'>
						<div class="span12">
							<div class="without-head">
								<div class="row-form clearfix">
									<div class="span3">Nama</div>
									<div class="span9">
										<p>Video Profile</p>
									</div>
								</div>
								<div class="row-form clearfix">
									<div class="span3">3gp Video</div>
									<div class="span6">
										<p><input type='text' id='productImageEdit'/></p>
										<p></p>
										<span id="status"></span>
									</div>
									<div class="span3"><a class="imageuploader" id="uploadtgp">Upload</a></div>
								</div>
								<div class="row-form clearfix">
									<div class="span3">mp4 Video</div>
									<div class="span6">
										<p><input type='text' id='mp4Edit'/></p>
										<p></p>
										<span id="mp4status"></span>
									</div>
									<div class="span3"><a class="imageuploader" id="uploadmp4">Upload</a></div>
								</div>
								<div class="row-form clearfix">
									<div class="span3">Webm Video</div>
									<div class="span6">
										<p><input type='text' id='webmEdit'/></p>
										<p></p>
										<span id="webmstatus"></span>
									</div>
									<div class="span3"><a class="imageuploader" id="uploadwebm">Upload</a></div>
								</div>
								<div class="row-form clearfix">
									<div class="span3">Ogg Video</div>
									<div class="span6">
										<p><input type='text' id='oggEdit'/></p>
										<p></p>
										<span id="oggstatus"></span>
									</div>
									<div class="span3"><a class="imageuploader" id="uploadogg">Upload</a></div>
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
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li><a href="">Admin</a> <span class="divider">/</span></li>
            <li class="active">Produk</li>
        </ul>
    </div><!--/container-->
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

	<div class="container">
		<section>
			<h1>Video</h1>
		<div class="navigasi" id="productadd"><img src="<?php echo base_url();?>assets/img/aquarius/ic_plus.png" /></div>
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Posisi</th>
						<th>Ditampilkan</th>
						<th>Aksi</th>
					</tr>
				</thead>

				<tfoot>
					<tr>
						<th>Nama</th>
						<th>Posisi</th>
						<th>Ditampilkan</th>
						<th>Aksi</th>
					</tr>
				</tfoot>

				<tbody>
				<?php foreach($objs as $obj){?>
					<tr rowid='<?php echo $obj->id;?>'>
						<td class='objname'><?php echo $obj->name;?></td>
						<td>Profile Depan</td>
						<td>Ya</td>
						<td>
						<span class="videoedit pointer" >
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