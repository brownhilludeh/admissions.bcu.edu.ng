
$(function () {
	 $(document).on('click', '.btn-remove', function () {
        var c = confirm('Delete! Proceed to permanently delete this record?');
        if (c) {
            return true;
        }
        return false;
    });

    $(document).on('click', '.btn-restore', function () {
        var c = confirm('Restore! Click OK to restore this record!');
        if (c) {
            return true;
        }
        return false;
    });

    $(document).on('click', '.btn-archive', function () {
        var c = confirm('Archive! Click OK to move this record to archive.');
        if (c) {
            return true;
        }
        return false;
    });
    // Full Modal 
    $(document).on('click','#modal-fullscreen',function(){
			$("#main_modal >.modal-dialog").toggleClass("fullscreen-modal");
		});

	//Mask Plugin
	$('.year').mask('0000-0000');
	
	$("input:required, select:required, textarea:required").prev().append("<span class='required'> *</span>");
  // $(".form-horizontal input:required,  select:required, textarea:required").parent().prev().append("<span class='required'> *</span>");
  
  
	// dropify 
	$('.dropify').dropify();
	// select2
	$(".select2").select2(); 
	// datepicker
	$(".datepicker").datepicker();
	//Form validation
	validate();
	function validate(){
	// //Validation Form
	$(".validate").validate({
		submitHandler: function(form) {
			form.submit();
		},invalidHandler: function(form, validator) {},
		  errorPlacement: function(error, element) {}
	});
}
	//Ajax Modal Function
	$(document).on("click",".ajax-modal",function(){
		 var link = $(this).attr("href");
		 var title = $(this).data("title");
		 var fullscreen = $(this).data("fullscreen");
		 $.ajax({
			 url: link,
			 beforeSend: function(){
				$("#preloader").css("display","block"); 
			 },success: function(data){
				$("#preloader").css("display","none");
				$('#main_modal .modal-title').html(title);
				$('#main_modal .modal-body').html(data);
				$("#main_modal .alert-success").css("display","none");
				$("#main_modal .alert-danger").css("display","none");
				$('#main_modal').modal('show'); 
				
				if(fullscreen ==true){
					$("#main_modal >.modal-dialog").addClass("fullscreen-modal");
				}else{
					$("#main_modal >.modal-dialog").removeClass("fullscreen-modal");
				}
				
				//init Essention jQuery Library
				$("select.select2").select2();
				$('.year').mask('0000-0000');
				$(".ajax-submit").validate();
				$(".datepicker").datepicker();	
				$(".dropify").dropify();
				$("input:required, select:required, textarea:required").prev().append("<span class='required'> *</span>");
			 }
		 });
		 
		 return false;
	 }); 
	 
	 $("#main_modal").on('show.bs.modal', function () {
         $('#main_modal').css("overflow-y","hidden"); 		
     });
	 
	 $("#main_modal").on('shown.bs.modal', function () {
		setTimeout(function(){
		  $('#main_modal').css("overflow-y","auto");
		}, 1000);	
	 });
  //Ajax Modal Submit
	 $(document).on("submit",".ajax-submit",function(){			 
		 var link = $(this).attr("action");
		 $.ajax({
			 method: "POST",
			 url: link,
			 data:  new FormData(this),
			 mimeType:"multipart/form-data",
			 contentType: false,
			 cache: false,
			 processData:false,
			 beforeSend: function(){
				 
			 },success: function(data){
		
				var json = JSON.parse(data);
				if(json['result'] == "success"){
					$("#main_modal .alert-success").html(json['message']);
					$("#main_modal .alert-success").css("display","block");
					if(json['action'] == "update"){
						$('#row_'+json['data']['id']).find('td').each (function() {
						   if(typeof $(this).attr("class") != "undefined"){
							   $(this).html(json['data'][$(this).attr("class")]);
						   }
						});  
						
					}else if(json['action'] == "store"){
						$('.ajax-submit')[0].reset();
						
						var new_row = $("table").find('tr:eq(1)').clone();
						
						$(new_row).attr("id", "row_"+json['data']['id']);
						
						$(new_row).find('td').each (function() {
						   if($(this).attr("class") == "dataTables_empty"){
							   window.location.reload();
						   }	
						   if(typeof $(this).attr("class") != "undefined"){
							   $(this).html(json['data'][$(this).attr("class")]);
						   }
						}); 
						
						var url  = window.location.href; 
						$(new_row).find('form').attr("action",url+"/"+json['data']['id']);
						$(new_row).find('.btn-warning').attr("href",url+"/"+json['data']['id']+"/edit");
						$(new_row).find('.btn-info').attr("href",url+"/"+json['data']['id']);
						
						$("table").prepend(new_row);
		
						window.setTimeout(function(){window.location.reload()}, 2000);
					}
				}else{
					jQuery.each( json['message'], function( i, val ) {
					   $("#main_modal .alert-danger").append("<p>"+val+"</p>");
					});
					$("#main_modal .alert-danger").css("display","block");
				}
			 }
		 });

		 return false;
	 });
	//Ajax submit with validate
	 $(".bp-submit-validate").validate({
		 submitHandler: function(form) {
			 var elem = $(form);
			 $(elem).find("button[type=submit]").prop("disabled",true);
			 var link = $(form).attr("action");
			 $.ajax({
				 method: "POST",
				 url: link,
				 data:  new FormData(form),
				 mimeType:"multipart/form-data",
				 contentType: false,
				 cache: false,
				 processData:false,
				 beforeSend: function(){
				   button_val = $(elem).find("button[type=submit]").text();
				   $(elem).find("button[type=submit]").html('<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>');
				 
				 },success: function(data){
					$(elem).find("button[type=submit]").html(button_val);
					$(elem).find("button[type=submit]").attr("disabled",false);				
					var json = JSON.parse(data);
					if(json['result'] == "success"){
						Command: toastr["success"](json['message']);
					}else{
						jQuery.each( json['message'], function( i, val ) {
						   Command: toastr["error"](val);
						});
					}
				 }
			 });

			return false; 
		},invalidHandler: function(form, validator) {},
		  errorPlacement: function(error, element) {}
	 });
	 
	 //Ajax submit without validate
	 $(document).on("submit",".bp-submit",function(){		 
		 var elem = $(this);
		 $(elem).find("button[type=submit]").prop("disabled",true);
		 var link = $(this).attr("action");
		 $.ajax({
			 method: "POST",
			 url: link,
			 data:  new FormData(this),
			 mimeType:"multipart/form-data",
			 contentType: false,
			 cache: false,
			 processData:false,
			 beforeSend: function(){
			   button_val = $(elem).find("button[type=submit]").text();
			   $(elem).find("button[type=submit]").html('<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>');
			 
			 },success: function(data){
				$(elem).find("button[type=submit]").html(button_val);
				$(elem).find("button[type=submit]").attr("disabled",false);				
				var json = JSON.parse(data);
				if(json['result'] == "success"){
					Command: toastr["success"](json['message']);
				}else{
					jQuery.each( json['message'], function( i, val ) {
					   Command: toastr["error"](val);
					});
					
				}
			 }
		 });

		 return false;
	 });
	
		// Print Command
	$(document).on('click','.print',function(){
		$("#preloader").css("display","block");
		var div = "#"+$(this).data("print");	
		$(div).print({
			timeout: 1000,
		});		
	});
});

document.querySelectorAll('.sidebar-submenu').forEach(e => {
    e.querySelector('.sidebar-menu-dropdown').onclick = (event) => {
        event.preventDefault()
        e.querySelector('.sidebar-menu-dropdown .dropdown-icon').classList.toggle('active')

        let dropdown_content = e.querySelector('.sidebar-menu-dropdown-content')
        let dropdown_content_lis = dropdown_content.querySelectorAll('li')

        let active_height = dropdown_content_lis[0].clientHeight * dropdown_content_lis.length

        dropdown_content.classList.toggle('active')

        dropdown_content.style.height = dropdown_content.classList.contains('active') ? active_height + 'px' : '0'
    }
});
let sidebar = document.querySelector('.sidebar');
let overlay = document.querySelector('.overlay');
document.querySelector('#mobile-toggle').onclick = () => {
    sidebar.classList.toggle('active')
    overlay.classList.toggle('active')
}
document.querySelector('#sidebar-close').onclick = () => {
    sidebar.classList.toggle('active')
    overlay.classList.toggle('active')
}

 window.addEventListener("load", () => {
  const loader = document.querySelector(".preloader");
  
  loader.classList.add("loader-hide");
 });
