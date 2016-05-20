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
    		var html1 = "<li class=\"multiselect-item multiselect-all\"><a tabindex=\"0\" class=\"multiselect-all\"><label class=\"checkbox\"><input type=\"checkbox\" value=\"multiselect-all\">  Select all</label></a></li>";
    		$.each(data,function(index,array){
    				html += "<option value=\""+array+"\">"+array+"</option>";
    				html1 += "<li><a tabindex=\"0\"><label class=\"checkbox\"><input type=\"checkbox\" value=\""+array+"\"> "+array+"</label></a></li>";
       		});
       		$('.multiselect-container.dropdown-menu').html(html1);
       		$('select#suburbs').html(html);
    	}
    });
}
$('button#search').click(function(){
	$('#searchList').html("<img src=\"/img/loader.gif\" style=\"position: absolute;top: calc(50% - 32px);left: calc(50% - 32px);\">");
	$.ajax({
    	url : '/rental/search',
    	dataType: "json",
    	type : 'POST',
    	data: {
    		city :$('select#city').val(),
      		districts :$('select#districts').val(),
      		suburbs :$('select#suburbs').val(),
      		available :$('input#datepicker').val(),
      		bedroom :$('select#bedroom').val(),
      		bathroom :$('select#bathroom').val(),
      		parking :$('select#parking').val(),
      		type :$('select#type').val(),
      		optional :$('select#optional').val(),
      		price :$('.slider').slider( "values" ),
      		page :1,
      		order :$('select#order').val()
    	},
    	error: function(XMLHttpRequest, textStatus, errorThrown){
      		alert(XMLHttpRequest.status+errorThrown+textStatus);
    	},
    	success: function(data){
    		var html = "";
    		$.each(data,function(index,array){
    				html += "<div class=\"col-sm-6 col-md-4 col-lg-3\"><div class=\"thumbnail\"><div class=\"caption\"><h5>"+array['suburbs']+"</h5><h5>"+array['districts']+"</h5><h5>"+array['city']+"</h5><p class=\"text-success\"><i class=\"fa fa-usd\" aria-hidden=\"true\"></i> "+array['price']+"</p><p>"+array['type']+"</p><p><img src=\"/img/icons/bed-icon.png\"> "+array['bedroom']+"&nbsp;<img src=\"/img/icons/bath-icon.png\"> "+array['bathroom']+"&nbsp;<img src=\"/img/icons/parking-icon.png\"> "+array['parking']+"</p><p class=\"text-danger\">Available: "+array['available']+"</p><p class=\"text-right\"><a href=\"/rentalDetail?id="+array['id']+"\" class=\"btn btn-primary\" role=\"button\" target=\"_blank\">Detail <span class=\"glyphicon glyphicon-menu-right\" aria-hidden=\"true\"></span></a></p></div></div></div>";
       		});
       		$('#searchList').html(html);
    	}
    });
    $.ajax({
    	url : '/rental/searchPage',
    	type : 'POST',
    	data: {
    		city :$('select#city').val(),
      		districts :$('select#districts').val(),
      		suburbs :$('select#suburbs').val(),
      		available :$('input#datepicker').val(),
      		bedroom :$('select#bedroom').val(),
      		bathroom :$('select#bathroom').val(),
      		parking :$('select#parking').val(),
      		type :$('select#type').val(),
      		optional :$('select#optional').val(),
      		price :$('.slider').slider( "values" )
    	},
    	error: function(XMLHttpRequest, textStatus, errorThrown){
      		alert(XMLHttpRequest.status+errorThrown+textStatus);
    	},
    	success: function(data){
    		var html = "";
    		for(var i=1;i<=data;i++){
	    		html += "<option value="+i+">"+i+"</option>";
    		}
       		$('#pagenum').html(html);
    	}
    });
});

$('select#order').change(function(){
	$('#searchList').html("<img src=\"/img/loader.gif\" style=\"position: absolute;top: calc(50% - 32px);left: calc(50% - 32px);\">");
	$.ajax({
    	url : '/rental/search',
       	dataType: "json",
    	type : 'POST',
    	data: {
    		city :$('select#city').val(),
      		districts :$('select#districts').val(),
      		suburbs :$('select#suburbs').val(),
      		available :$('input#datepicker').val(),
      		bedroom :$('select#bedroom').val(),
      		bathroom :$('select#bathroom').val(),
      		parking :$('select#parking').val(),
      		type :$('select#type').val(),
      		optional :$('select#optional').val(),
      		price :$('.slider').slider( "values" ),
      		page :$('select#pagenum').val(),
      		order :$('select#order').val()
    	},
    	error: function(XMLHttpRequest, textStatus, errorThrown){
      		alert(XMLHttpRequest.status+errorThrown+textStatus);
    	},
    	success: function(data){
    		    		var html = "";
    		$.each(data,function(index,array){
    				html += "<div class=\"col-sm-6 col-md-4 col-lg-3\"><div class=\"thumbnail\"><div class=\"caption\"><h5>"+array['suburbs']+"</h5><h5>"+array['districts']+"</h5><h5>"+array['city']+"</h5><p class=\"text-success\"><i class=\"fa fa-usd\" aria-hidden=\"true\"></i> "+array['price']+"</p><p>"+array['type']+"</p><p><img src=\"/img/icons/bed-icon.png\"> "+array['bedroom']+"&nbsp;<img src=\"/img/icons/bath-icon.png\"> "+array['bathroom']+"&nbsp;<img src=\"/img/icons/parking-icon.png\"> "+array['parking']+"</p><p class=\"text-danger\">Available: "+array['available']+"</p><p class=\"text-right\"><a href=\"/rentalDetail?id="+array['id']+"\" class=\"btn btn-primary\" role=\"button\" target=\"_blank\">Detail <span class=\"glyphicon glyphicon-menu-right\" aria-hidden=\"true\"></span></a></p></div></div></div>";
       		});
       		$('#searchList').html(html);
    	}
    });
});

$('select#pagenum').change(function(){
	$('#searchList').html("<img src=\"/img/loader.gif\" style=\"position: absolute;top: calc(50% - 32px);left: calc(50% - 32px);\">");
	$.ajax({
    	url : '/rental/search',
       	dataType: "json",
    	type : 'POST',
    	data: {
    		city :$('select#city').val(),
      		districts :$('select#districts').val(),
      		suburbs :$('select#suburbs').val(),
      		available :$('input#datepicker').val(),
      		bedroom :$('select#bedroom').val(),
      		bathroom :$('select#bathroom').val(),
      		parking :$('select#parking').val(),
      		type :$('select#type').val(),
      		optional :$('select#optional').val(),
      		price :$('.slider').slider( "values" ),
      		page :$(this).children('option:selected').val(),
      		order :$('select#order').val()
    	},
    	error: function(XMLHttpRequest, textStatus, errorThrown){
      		alert(XMLHttpRequest.status+errorThrown+textStatus);
    	},
    	success: function(data){
    		    		var html = "";
    		$.each(data,function(index,array){
    				html += "<div class=\"col-sm-6 col-md-4 col-lg-3\"><div class=\"thumbnail\"><div class=\"caption\"><h5>"+array['suburbs']+"</h5><h5>"+array['districts']+"</h5><h5>"+array['city']+"</h5><p class=\"text-success\"><i class=\"fa fa-usd\" aria-hidden=\"true\"></i> "+array['price']+"</p><p>"+array['type']+"</p><p><img src=\"/img/icons/bed-icon.png\"> "+array['bedroom']+"&nbsp;<img src=\"/img/icons/bath-icon.png\"> "+array['bathroom']+"&nbsp;<img src=\"/img/icons/parking-icon.png\"> "+array['parking']+"</p><p class=\"text-danger\">Available: "+array['available']+"</p><p class=\"text-right\"><a href=\"/rentalDetail?id="+array['id']+"\" class=\"btn btn-primary\" role=\"button\" target=\"_blank\">Detail <span class=\"glyphicon glyphicon-menu-right\" aria-hidden=\"true\"></span></a></p></div></div></div>";
       		});
       		$('#searchList').html(html);
    	}
    });
});