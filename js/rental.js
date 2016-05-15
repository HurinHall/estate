$( "#datepicker" ).datepicker();
function changeCity(city){
	$.ajax({
    	url : '/user/getDistricts',
       	dataType: "json",
    	type : 'POST',
    	data: {
      		c1 :"New Zealand",
      		c2 :city
    	},
    	error: function(XMLHttpRequest, textStatus, errorThrown){
      		alert(XMLHttpRequest.status+errorThrown+textStatus);
    	},
    	success: function(data){
    		var html = "";
    		$.each(data,function(index,array){
    				html += "<option value=\""+array+"\">"+array+"</option>";
       		});
       		$('select#districts').html(html);
       		changeDistricts(data[0]);
    	}
    });
}

function changeDistricts(districts){
	$.ajax({
    	url : '/user/getSuburbs',
       	dataType: "json",
    	type : 'POST',
    	data: {
      		d :districts
    	},
    	error: function(XMLHttpRequest, textStatus, errorThrown){
      		alert(XMLHttpRequest.status+errorThrown+textStatus);
    	},
    	success: function(data){
    		var html = "";
    		$.each(data,function(index,array){
    				html += "<option value=\""+array+"\">"+array+"</option>";
       		});
       		$('select#suburbs').html(html);
    	}
    });
}