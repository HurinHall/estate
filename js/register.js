function changeCountry(country){
	$.ajax({
    	url : '/user/getCity',
       	dataType: "json",
    	type : 'POST',
    	data: {
      		c :country
    	},
    	error: function(XMLHttpRequest, textStatus, errorThrown){
      		alert(XMLHttpRequest.status+errorThrown+textStatus);
    	},
    	success: function(data){
    		var html = "";
    		$.each(data,function(index,array){
    				html += "<option value=\""+array+"\">"+array+"</option>";
       		});
       		$('select#city').html(html);
       		changeCity(country,data[0]);
    	}
    });
}

function changeCity(country,city){
	$.ajax({
    	url : '/user/getDistricts',
       	dataType: "json",
    	type : 'POST',
    	data: {
      		c1 :country,
      		c2 : city
    	},
    	error: function(XMLHttpRequest, textStatus, errorThrown){
      		alert(XMLHttpRequest.status+errorThrown+textStatus);
    	},
    	success: function(data){
    		var html = "";
    		$.each(data,function(index,array){
    				html += "<option value=\""+array+"\">"+array+"</option>";
       		});
       		$('select#county').html(html);
    	}
    });
}