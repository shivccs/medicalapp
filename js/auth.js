$(document).ready(function(){
	    		$('#Button1').attr("disabled","disabled");
	    		$('#capcha_error').hide();
	    		var randm = Math.random().toString(36).replace('0.', '').substr(5);
	    		var random_capcha = randm.substring(0,7);
	    		$('#show_capcha').append(random_capcha);
	    		$('#capcha_value').val(random_capcha);
	    		console.log(random_capcha);

	    		$('#txtcaptcha').keyup(function(){
	    			var i_value = $('#txtcaptcha').val();
	    			var c_value = $('#capcha_value').val(); 

	    			if (i_value==c_value) {
	    				$('#capcha_error').hide();
	    				$('#Button1').removeAttr("disabled");	
	    			}else{
	    				$('#capcha_error').show();
	    				$('#Button1').attr("disabled","disabled");
	    			}
	    		});
	    	});