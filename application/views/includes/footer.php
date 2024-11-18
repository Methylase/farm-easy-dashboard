
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/js/scripts.js') ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/demo/chart-area-demo.js') ?>"></script>
<script src="<?php echo base_url('assets/demo/chart-bar-demo.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/js/datatables-simple-demo.js') ?>"></script>



<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
   /* $('table[id^="datatablesSimple"]').dataTable({
        dom: 'fltip',
		paging: true,
        scrollY: '50vh',
        scrollCollapse: true,
        "bAutoWidth": true,
        "pagingType": "full_numbers",
        "iDisplayLength": 10,
        "bLengthChange": true,
        ordering: false,

    });*/

	/*$('.service').on('change',function(){
		var sp_id =$(this).parents('tr').attr('id');
		var service_type = $(this).parents('tr').find('.service option:selected').text();
		$.ajax({
			url: "<?php echo site_url(); ?>change-service-type",
			type: 'POST',
			data: {sp_id:sp_id,service_type:service_type},                       
			dataType: 'json',
		}).done(function (data){
			$('.price').show();
			if(data.success){
				$('#show'+data.error).val(data.data);
			}

			});		   
		
	});*/

	$('.message').hide();
	$('.message').empty();
	
	/*$('.save').on('click',function(){
		var sp_id =$(this).parents('tr').attr('id');
		var service_type = $(this).parents('tr').find('.service option:selected').text();
		var amount = $(this).parents('tr').find('input').val();
		$.ajax({
			url: "<?php echo site_url(); ?>update-set-service-price",
			type: 'POST',
			data: {sp_id:sp_id,service_type:service_type,amount:amount},                       
			dataType: 'json',
		}).done(function (data){
			$('.price').show();
			if(data.success){
				$('.message').show();
				$('.message').html(data.message);
				location.reload();
			}

			});		   
		
	});*/
	
	$('.price').hide();
	$('#datatablesSimple tr.service_provider').each(function(){
		var sp_id =$(this).attr('id');
		var service_type = $(this).find('.service option:selected').text();
		$.ajax({
			url: "<?php echo site_url(); ?>get-service-price",
			type: 'POST',
			data: {sp_id:sp_id,service_type:service_type},                       
			dataType: 'json',
		}).done(function (data){
			$('.price').show();
			if(data.success){
				$('#show'+data.error).val(data.data);
			}else if(!data.success){
				console.log(data.message);
				$('#show'+data.error).attr('placeholder', data.message);
			}

		});
	})
});	  

$(document.body).on('change','.service',function(){
	var sp_id = $(this).attr('data_id');
	var service_type = $(this).parents('tr').find('.service option:selected').text();
	$.ajax({
		url: "<?php echo site_url(); ?>change-service-type",
		type: 'POST',
		data: {sp_id:sp_id,service_type:service_type},                       
		dataType: 'json',
	}).done(function (data){
		$('.price').show();
		if(data.success){
			$('#show'+data.error).val(data.data);
		}

	});		   
	  
});


$(document.body).on('click','.save',function(){
	var sp_id = $(this).parents('tr').find('.service').attr('data_id');
	var service_type = $(this).parents('tr').find('.service option:selected').text();
	var amount = $(this).parents('tr').find('input').val();
	$.ajax({
		url: "<?php echo site_url(); ?>update-set-service-price",
		type: 'POST',
		data: {sp_id:sp_id,service_type:service_type,amount:amount},                       
		dataType: 'json',
	}).done(function (data){
		$('.price').show();
		if(data.success){
			$('.message').show();
			$('.message').html(data.message);
			location.reload();
		}

	});
	  
});




</script>