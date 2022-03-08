$(document).ready(function(){


	$('#bt_registration').click(function(){
		var firstname 		= 	$('#fname').val();
		var lastname 		= 	$('#lastname').val();
		var fathername 		= 	$('#fathername').val();
		var gender 			= 	$('#gender').val();
		var email 			= 	$('#email').val();
		var mobile 			= 	$('#mobile').val();
		var dob 			= 	$('#dob').val();
		var role 			= 	$('#role').val();
		var address 		= 	$('#address').val();
		var aadhaar 		= 	$('#aadhaar').val();
		var pan 			= 	$('#pan').val();
		var bank_name 		= 	$('#bank_name').val();
		var acno 			= 	$('#acno').val();
		var basic_pay 		= 	$('#basic_pay').val();

	});//end of bt_registration function 
});//end of ready function 



function get_reel_info(reel_id){
	if (reel_id.length>0) {

		var data = {"reel_id":reel_id};
	     $.ajax({
	            type:'POST',
	            url:base_url+'rfid_reel_tagging/get_reel_info',
	            data:JSON.stringify(data),
	            dataType:'json',
	           
	        })
	        .done(function( json ) { 
	        	
	            if (json.status==true) {
	            	$('#reel_bill_no').text(json.data.bill_no);
	            	$('#reel_mill').text(json.data.company_name);
	            	$('#reel_color').text(json.data.color);
	            	$('#reel_category').text(json.data.category);
	            	$('#reel_bf').text(json.data.bf);
	            	$('#reel_gsm').text(json.data.gsm);
	            	$('#reel_size').text(json.data.size);
	            	$('#reel_weight').text(json.data.weight);





	            	$('#rfid_reel_id').val(reel_id);
					$('#reel_rfidtag').modal('show');
	            }else{	            	
	            	$('#noticeModal').show();
	            }	            
	          	
	        })
	        .fail(function( xhr, status, errorThrown ) {
			  //$('#error_modal_data').text( "Error: " + errorThrown);
	          //$('#error_modal').show();	          
	          //alert( "Sorry, there was a problem!" );
	          console.log( "Error: " + errorThrown );
	          console.log( "Status: " + status );
	          console.dir( xhr );
	        });
	}//end of if
}//end of function get_reel_info


$('#bt_assign_rfid').click(function(){
	$('#qrcode').empty();
	var val = $('#rfid_tag').val();
	jQuery('#qrcode').qrcode(val);

});


$('#bt_print_tag').click(function(){

});//end of bt_print_tag function 