$(document).ready(function() {
	var producttable = $('#example').dataTable( {
		"pagingType": "full_numbers"
	} ),thisdomain = 'http://patiunus/';
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
			url:thisdomain+'products/save',
			type:'post',
			data:{name:$('#name').val()}
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
} );
