$(function(){
	$('#addCustomerForm').on('submit',function(e){
		e.preventDefault();
		var form = $(this);
		var url = form.attr('action');
		var type = form.attr('method');
		var data = form.serialize();
		
		$.ajax({
			url:url,
			data:data,
			type:type,
			dataType:"JSON",
			beforeSend:function(){
				$('.loading').fadeIn();
			},
			success: function(data){
				if(data == 'success'){
					swal({title: "Successfully!", text: "Customer Data!", icon: "success", timer:2000,});
					//$('#addCustomer').modal('hide');
					form[0].reset();	
					return getCustomerData();
				}
			} ,
			complete: function(){
				$('.loading').fadeOut();
			}
		});
		
	});

	//Get Data
	function getCustomerData(){
	var url = $('#getallData').data('url'); 
		$.ajax({
			url:url,
			type:"GET",
			dataType:"HTML",
			success:function(response){
				$("#showAllData").html(response);
				
			}
		});
	};

	//view Customer Data Information

	$(document).on("click","#view",function(e){
		e.preventDefault;
		var id = $(this).data("id");
		var url =$(this).attr('href');

		$.ajax({
			url:url,
			data:{id:id},
			type:"GET",
			dataType:"JSON",
			success: function(response){
				if($.isEmptyObject(response) != null){

					$(".view_name").text("Name: " + response.name);
					$(".view_phone").text("Phone: " + response.phone);
					$(".view_email").text("Email: " + response.email);
					$(".view_location").text("Location: " + response.location);
				}
			}
		})

	});


	//Edit Data Information
	$(document).on("click","#edit",function(e){
		e.preventDefault;
		var id = $(this).data("id");
		var url = $(this).attr('href');

		$.ajax({
			url:url,
			data:{id:id},
			type:"GET",
			dataType:"JSON",
			success(response){
				$('#namea').val(response.name);
				$('#phonea').val(response.phone);
				$('#eamil').val(response.email);
				$('#locationa').val(response.location);
				$('#customer_id').val(response.id);
			}

		})
	});

	$("#updateCustomerForm").on("submit",function(e){
		e.preventDefault();
		var form = $(this);
		var url = form.attr('action');
		var type = form.attr('method');
		var data = form.serialize();

		$.ajax({
			url:url,
			data:data,
			type:type,
			dataType:"JSON",
			beforeSend:function(){
				$('.loading').fadeIn();
			},
			success: function(response){
				if(response == 'success'){
					swal({title: "Updated!", text: "Customer Data!", icon: "success", timer:2000,});
					$('#updateCustomer').modal('hide');
					return getCustomerData();
				}
			},
			complete: function(){
				$('.loading').fadeOut();
			}
		})
	
	});




	// Delete Data Information

	$(document).on("click","#delete",function(e){
		e.preventDefault;
		var id = $(this).data('id');
		var url = $(this).attr('href');

		$.ajax({
			url:url,
			data:{id:id},
			type:"GET",
			dataType:"JSON",
			success: function(response){
				console.log(response);
				swal({title: "Deleted!", text: "Customer Data!", icon: "success", timer:3000,});	
				return getCustomerData();
			}
		})

	})



	

});