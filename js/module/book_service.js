$(document).ready(function(){
  $('#bt_book').hide();
});

$('#bt_book').click(function(){
	var tpsheet = $('#tripsheet_no').val();
  var trip_date = $('#trip_date').val();
  var trip_hour = $('#trip_hour').val();
  var trip_min = $('#trip_min').val();
	var company = $('#company').val();
	var route_from = $('#route_from').val();
	var route_to = $('#route_to').val();
	var available_vehicle = $('#available_vehicle').val();
	var ttl_distance = $('#ttl_distance').val();
  var allowed_fuel = $('#allowed_fuel').val();
  var driver_expense = $('#driver_expense').val();
  var fastag_expense = $('#fastag_expense').val();
  var other_expense = $('#other_expense').val();
  var trip_duration = $('#trip_duration').val();

  var trip_amount = $('#trip_amount').val();
  var tds_rate = $('#tds_rate').val();
  var gst_rate = $('#gst_rate').val();
  var advance = $('#advance').val();



console.log(route_from);
console.log(route_to);

	if ((tpsheet=='')||(tpsheet.length<4)) {
		alert('Please enter tripsheet number.');
	}else if ((trip_date=='')||(trip_date.length<4)) {
    alert('Please select trip date');
  }else if ((company=='')||(company.length<4)) {
    alert('Please select company');
  }else if ((route_from=='')||(route_from.length<1)) {
		alert('Please select start destination');
	}else if ((route_to=='')||(route_to.length<1)) {
		alert('Please select end destination.');
	}else if ((available_vehicle=='')||(available_vehicle.length<1)) {
		alert('Please select vehicle.');
	}else if ((ttl_distance=='')||(ttl_distance.length<1)) {
    alert('Please enter total distance.');
  }else if ((trip_duration=='')||(trip_duration.length<1)) {
    alert('Please enter trip duration.');
  }else if ((allowed_fuel=='')||(allowed_fuel.length<1)) {
		alert('Please enter alloted fuel.');
	}else if (advance.length<1) {
    alert('Please enter advance amount.');
  }else{
		var DATA = {'tripsheet':tpsheet, 'trip_date':trip_date, 'trip_hour':trip_hour, 'trip_min':trip_min, 'company':company, 'from':route_from, 'to':route_to, 'vehicle_id': available_vehicle, 'ttl_distance':ttl_distance, 'allowed_fuel':allowed_fuel, 'driver_expense':driver_expense, 'fastag_expense':fastag_expense, 'other_expense':other_expense, 'trip_amount':trip_amount, 'tds_rate':tds_rate, 'gst_rate':gst_rate, 'advance':advance, 'trip_duration':trip_duration};
			$.ajax({
                type: 'POST',
                url: base_url + 'book_vehicle/assign_vehicle',
                data: JSON.stringify(DATA),
                dataType: 'json',
             })
             .done(function(json) {

                if (json.status==true) {
                	alert('Booking Completed');
                	setTimeout(
					  function() 
					  {
					    location.reload();
					  }, 2000);
                }else{
                	alert('Booking Failed');
                	setTimeout(
					  function() 
					  {
					    location.reload();
					  }, 2000);

                }
             
             })
              .fail(function(xhr, status, errorThrown) {
                alert('Something went wrong!');
             });
	}//end of if else ladder
});




 $('#route_from_st').change(function(){
      $('#route_from').empty();
      var state =$('#route_from_st').val();        
             $.ajax({
                type: 'POST',
                url: base_url + 'transport_registration/get_cities',
                data: JSON.stringify(state),
                dataType: 'json',
             })
             .done(function(json) {

                var city_html = '<option hidden>Select City</option>';

                $.each(json.cities, function(i, item) {
                    city_html = city_html + '<option value="'+item.id+'">'+item.name+'</option>';
                });

                $('#route_from').append(city_html); 
             
             })
              .fail(function(xhr, status, errorThrown) {
                alert('Something went wrong!');
             }); 
     
    }); // end of change state


  $('#route_to_st').change(function(){
      $('#route_to').empty();
      var state =$('#route_to_st').val();        
             $.ajax({
                type: 'POST',
                url: base_url + 'transport_registration/get_cities',
                data: JSON.stringify(state),
                dataType: 'json',
             })
             .done(function(json) {

                var city_html = '<option hidden>Select City</option>';

                $.each(json.cities, function(i, item) {
                    city_html = city_html + '<option value="'+item.id+'">'+item.name+'</option>';
                });

                $('#route_to').append(city_html); 
             
             })
              .fail(function(xhr, status, errorThrown) {
                alert('Something went wrong!');
             }); 
     
    }); // end of change state


  $('#company').change(function(){
     $('#company_email').empty();
     $('#company_phone').empty();
     $('#company_cperson').empty();
     $('#company_gstin').empty();
     $('#company_address').empty();


      var company =$('#company').val();        
             $.ajax({
                type: 'POST',
                url: base_url + 'book_vehicle/get_company_info',
                data: JSON.stringify(company),
                dataType: 'json',
             })
             .done(function(json) {

                if (json.cinfo) {
                  $('#company_email').text(json.cinfo.email);
                  $('#company_phone').text(json.cinfo.email);
                  $('#company_cperson').text(json.cinfo.contact_person);
                  $('#company_gstin').text(json.cinfo.gstin);
                  $('#company_address').text(json.cinfo.address);

                }
             
             })
              .fail(function(xhr, status, errorThrown) {
                alert('Something went wrong!');
             }); 
     
  });


  $('#route_from').change(function(){
      get_available_vehicle();     
  }); // end of change route_from

  $('#route_to').change(function(){
      get_available_vehicle();     
  }); // end of change route_to



  function get_available_vehicle(){
      var start_loc = $('#route_from').val();
      var end_loc = $('#route_to').val();

      if ((start_loc=='')||(start_loc==null)) {
        var from_loc = 'na';
        var to_loc = end_loc;
        console.log('one');
      }else if ((end_loc=='')||(end_loc==null)) {
        var from_loc = start_loc;
        var to_loc = 'na';
        console.log('two');
      }else{
        var from_loc = start_loc;
        var to_loc = end_loc             
      }//END OF IF ELSE

            $('#available_vehicle').empty();
            var DATA = {'start_loc':from_loc, 'end_loc':to_loc};        
             $.ajax({
                type: 'POST',
                url: base_url + 'book_vehicle/get_avail_vehicles',
                data: JSON.stringify(DATA),
                dataType: 'json',
             })
             .done(function(json) {

                var v_html = '<option hidden>Select Vehicle</option>';

                $.each(json.vehicles, function(i, item) {
                    v_html = v_html + '<option value="'+item.vehicle_id+'">'+item.vehicle_name+' ( Reg No'+item.registration_no+' )</option>';
                });

                $('#available_vehicle').append(v_html); 
             
             })
              .fail(function(xhr, status, errorThrown) {
                alert('Something went wrong!');
             });
  }//end of function 



  $('#trip_amount').keyup(function(){
      
      var trip_amount_val = $('#trip_amount').val();
      var trip_amount = parseFloat(trip_amount_val);
      if (trip_amount<=0) {
        $('#bt_book').hide();
        $('#bt_check').show();
      }else{
        console.log('trip_amount');
        var tds_rate_val = $('#tds_rate').val();
        var tds_rate = parseFloat(tds_rate_val);
        var tds_amount = (trip_amount*tds_rate)/100;

        console.log(tds_rate);
        console.log(tds_amount);
        $('#tds_amount').val(tds_amount);
        $('#final_amount').val(trip_amount-tds_amount);
      }
  });


  $('#gst_rate').change(function(){
      var final_amount_val = $('#final_amount').val();
      var final_amount = parseFloat(final_amount_val);


      var gst_rate_val = $('#gst_rate').val();
      var gst_rate = parseFloat(gst_rate_val);
      $('#bt_book').hide();
      $('#bt_check').show();
      if (final_amount<=0) {
        alert('Please enter valid trip amount!')
      }else{
        $('#advance').val(0);
        var gst_amount = (final_amount*gst_rate)/100;
        $('#gst_amount').val(gst_amount);
        $('#grand_amount').val(gst_amount+final_amount);
        $('#balance_amount').val(gst_amount+final_amount);
      }
  });


  $('#advance').keyup(function(){
      var grand_amount_val = $('#grand_amount').val();
      var grand_amount = parseFloat(grand_amount_val);


      var advance_val = $('#advance').val();
      var advance = parseFloat(advance_val);
      $('#bt_book').hide();
      $('#bt_check').show();
      if ((advance<0)||(grand_amount<0)) {
        alert('Please enter valid trip amount & Advance value');
      }else if (advance>=grand_amount) {
        alert('Advance should always less than Total');
      } else{
        $('#balance_amount').val(grand_amount-advance);
      }
  });//end of function 



  $('#bt_check').click(function(){
      var trip_amount_val = $('#trip_amount').val();
      var trip_amount = parseInt(trip_amount_val);

      var tds_rate_val = $('#tds_rate').val();
      var tds_rate = parseFloat(tds_rate_val);
      var tds_amount = (trip_amount*tds_rate)/100;

      $('#tds_amount').val(tds_amount);
      $('#final_amount').val(trip_amount-tds_amount);


      var final_amount_val = $('#final_amount').val();
      var final_amount = parseInt(final_amount_val);


      var gst_rate_val = $('#gst_rate').val();
      var gst_rate = parseInt(gst_rate_val);

      var gst_amount = (final_amount*gst_rate)/100;
      $('#gst_amount').val(gst_amount);
      $('#grand_amount').val(gst_amount+final_amount);
      $('#balance_amount').val(gst_amount+final_amount);


      var grand_amount_val = $('#grand_amount').val();
      var grand_amount = parseInt(grand_amount_val);


      var advance_val = $('#advance').val();
      var advance = parseInt(advance_val);

      var balance_amount_val = $('#balance_amount').val();
      var balance_amount = parseInt(balance_amount_val);

      if (trip_amount<=100) {
        alert('Please enter valid trip amount!');
        $('#bt_book').hide();
        $('#bt_check').show();
      }else if (balance_amount<0) {
        alert('Please check data');
        $('#bt_book').hide();
        $('#bt_check').show();
      }else{
        $('#bt_book').show();
        $('#bt_check').hide();
      }

  });//end of function 



    $('#station').change(function(){
     $('#last_balance').empty();

      var station =$('#station').val();        
             $.ajax({
                type: 'POST',
                url: base_url + 'fuel_expense/get_last_balance',
                data: JSON.stringify(station),
                dataType: 'json',
             })
             .done(function(json) {

                if (json.bal) {
                  $('#last_balance').text(json.bal);
                }
             
             })
              .fail(function(xhr, status, errorThrown) {
                alert('Something went wrong!');
             }); 
     
  });


$('#company_fund').change(function(){
     $('#last_balance').empty();

      var company =$('#company_fund').val();        
             $.ajax({
                type: 'POST',
                url: base_url + 'company_fund/get_last_balance',
                data: JSON.stringify(company),
                dataType: 'json',
             })
             .done(function(json) {

                if (json.bal) {
                  $('#last_balance').text(json.bal);
                }
             
             })
              .fail(function(xhr, status, errorThrown) {
                alert('Something went wrong!');
             }); 
     
  });
