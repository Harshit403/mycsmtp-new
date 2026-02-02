
$(document).ready(function(){
	$(".btn-login").on('click',function(){
		var user_type = $('input[name="user_type"]:checked').val();
		var formDetails = $("#loginForm").serializeArray();
		var formdata = new FormData();
		$.each(formDetails, function(i,v){
			formdata.append(v.name,$.trim(v.value));
		});
		if(user_type=='admin'){
			var ajaxUrl = baseUrl+'verify/adminlogin';
			var redirect_url = baseUrl+'admin_panel';
		} else if(user_type=='examinar'){
			var redirect_url = baseUrl+'admin/assignment-level-list';
			var ajaxUrl = baseUrl+'verify/examinarlogin';
		}
		$.ajax({
			url:ajaxUrl,
			data:formdata,
			processData:false,
			contentType:false,
			type:'POST',
			dataType:'JSON',
			success:function(response){
				if(response.success){
					url = redirect_url;
					window.open(url,'_self');
				} else {
					bootbox.alert(response.message);
				}
			}
		})
	});
});