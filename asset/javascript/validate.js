
$(document).ready(function () {
    // hiển thị form      
    $("#form-sign-in").validate({
		rules: {
			"email": {
				required: true,
				email: true
			},
			"password": {
				required: true,
				minlength: 4
			}
				
			
		},
		messages: {
			"email": {
				required: "<br>Bắt buộc nhập username",
				email: "<br>Hinh như bạn nhập sai rồi"
			},
			"password": {
				required: "<br>Bắt buộc nhập password",
				minlength: "<br>Hãy nhập ít nhất 4 ký tự"
			}
		},
        submitHandler: function () {
            $.ajax({
                type: "POST",
                url: "http://localhost/----n-web-1/----n-web-1/sign_in.php",
                data: $("#form-sign-in").serializeArray(),
                dataType: "html",
                success: function (response) {
                    if(response !== '1'){
                        $(".notify-z").find('.noti').html(response);
                        $(".notify-z").addClass('open');
                    }else{
                        $(".notify-z").find('.noti').html('Đăng nhập thành công.<br>Chào mừng bạn trở lại');
                        $(".notify-z").addClass('open');
                        setTimeout(load,1500)
                     
                    }
                    
                }
            });
            function load() {
                window.location="http://localhost/----n-web-1/----n-web-1/index.php";    
            }
		}
	});
    
    $("#form-sign-up").validate({
		rules: {

			"name": {
				required: true
			},
			"email": {
				required: true,
				email: true
			},
			"password": {
				required: true,
				minlength: 4
			},
            "number_phone": {
				required: true,
				maxlength: 15,
				digits: true
			},
			"gender": {
				required: true,	
			},
			"birthday": {
				required: true,	
			},
			"adress": {
				required: true,	
			},
			
		},
		messages: {
            "name": {
				required: "<br>Bắt buộc nhập tên",
			},
			"email": {
				required: "<br>Bắt buộc nhập email",
				email: "<br>Hinh như bạn nhập sai rồi"
			},
			"password": {
				required: "<br>Bắt buộc nhập password",
				minlength: "<br>Hãy nhập ít nhất 4 ký tự"
			},
            "number_phone": {
				required: "<br>Số điện thoại không được để trống",
				maxlength: "<br>Số điện thoại quá dài",
				digits: "<br> Hẫy nhập số điện thoại hợp lệ đi nào"
			},
            "gender": {
				required: "<br>Bắt buộc nhập giới tính",
			}, 
            "birthday": {
				required: "<br>Bắt buộc nhập ngày sinh",
			},
             "adress": {
				required: "<br>Bắt buộc nhập địa chỉ",
			},
		},
        submitHandler: function () {
            $.ajax({
                type: "POST",
                url: "http://localhost/----n-web-1/----n-web-1/sign_up.php",
                data: $("#form-sign-up").serializeArray(),
                dataType: "html",
                success: function (response) {
                    if(response !== '1'){
                        $(".notify-z").find('.noti').html(response);
                        $(".notify-z").addClass('open');
                    }else{
                        $(".notify-z").find('.noti').html('Đăng ký thành công.<br>Mừng bạn đã đến');
                        $(".notify-z").addClass('open');
                        setTimeout(load,1500)
                     
                    }
                    
                }
            });
            function load() {
                window.location="http://localhost/----n-web-1/----n-web-1/index.php";    
            }
		}
	});

})