@extends('layouts.backend')
@section('title', 'Compose Email')
@section('content')
<form action="{{ route('emails.store') }}" class="validate" autocomplete="off" method="post" accept-charset="utf-8">
    <div class="row">
        <div class="col-md-8">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        {{ __('Compose Message') }}
                    </div>
                </div>
                <div class="card-body border">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="control-label">{{__('Users')}}</label>
                            <select name="user_type" id="user_type" class="form-control select2" required>
                                <option value="">{{ __('Select One') }}</option>
                                <option value="Admin">{{ __('Admin') }}</option>
                                <option value="Student">{{ __('Student') }}</option>
                                <option value="Parent">{{ __('Parent') }}</option>
                                <option value="Teacher">{{ __('Teacher') }}</option>
                                <option value="Accountant">{{ __('Accountant') }}</option>
                                <option value="Librarian">{{ __('Librarian') }}</option>
                                <option value="Employee">{{ __('Employee') }}</option>
                                <option value="Applicant">{{ __('Applicant') }}</option>
                                <option value="SuperAdmin">{{ __('IT Team - Technical Issues Only') }}</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6 student-group">
                                <label class="control-label">{{ __('Select Class') }}</label>
                                <select name="class_id" onchange="getSection();" class="form-control select2">
                                    <option value="">{{ __('Select One') }}</option>
                                    {{ create_option('classes','id','class_name',old('class_id')) }}
                                </select>
                            </div>

                            <div class="form-group col-sm-6 student-group">
                                <label class="control-label">{{ __('Select Section') }}</label>
                                <select name="section_id" onchange="get_students();" id="section_id" class="form-control select2">
                                    <option value="">{{ __('Select One') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-sm-12 student-group">
                            <label class="control-label">{{ __('Select Student') }}</label>
                            <select name="student_id" id="student_id" onchange="get_all_students();" class="form-control select2">
                                <option value="">{{ __('Select One') }}</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-12 general-group">
                            <label class="control-label">{{ __('Select Receiver') }}</label>
                            <select name="user_id" id="user_id" onchange="get_all_users();" class="form-control select2">
                                <option value="">{{ __('Select One') }}</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="control-label">{{__('Subject')}}</label>
                            <input class="form-control" name="subject" value="{{ old('subject') }}" required>
                        </div>

                        <div class="form-group col-md-12" >
                            <label class="control-label">{{__('Message')}}</label>
                            <textarea class="form-control summernote" name="body" id="editor" required>{{ old('body') }}</textarea>
                        </div>

                        <div class="card-footer col-12">
                            <button type="submit" class="btn btn-primary btn-sm float-end">{{__('Send Message')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">{{ __('User List') }}</div>
                </div>
                <div class="card-body" id="user_list">
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('js-script')
<script type="text/javascript">
    $(document).on('change','#user_type',function(){
		var user_type = $(this).val();

		if( user_type == "Student" ){
			$(".student-group").fadeIn();
			$(".general-group").css("display","none");
			$("#student_id").prop("required",true);
			$("#user_id").prop("required",false);
		}else{
			$(".student-group").css("display","none");
			$(".general-group").fadeIn();
			$("#student_id").prop("required",false);
			$("#user_id").prop("required",true);
			getUsers( user_type );
		}
	});

	function getUsers( type ) {
		$.ajax({
			url: "{{ url('users/get_users') }}/"+type,
			beforeSend: function(){
			    $("#preloader").css("display","block");
			},success: function(data){
				$("#preloader").css("display","none");
				var json =JSON.parse(data);
			    $('select[name=user_id]').html("");
				$('#user_list').html("");

				jQuery.each( json, function( i, val ) {
					$('select[name=user_id]').append("<option value='"+val['email']+"'>"+val['last_name']+" "+val['first_name']+" - "+val['email']+"</option>");
				});

				if( $('#user_id').has('option').length > 0 ) {
					$('select[name=user_id]').prepend("<option value='all'>All "+type+"</option>");
				}
			}
		});
	}

	function getSection() {

		if( $('select[name=class_id]').val() != "" ){
			var _token=$('input[name=_token]').val();
			var class_id=$('select[name=class_id]').val();
			$.ajax({
				type: "POST",
				url: "{{ url('sections/section') }}",
				data:{_token:_token,class_id:class_id},
				beforeSend: function(){
					$("#preloader").css("display","block");
				},success: function(data){
					$("#preloader").css("display","none");
					$('select[name=section_id]').html(data);
				}
			});
		}
	}


	function get_students(){

		if( $("#user_type").val() == "Student" && $('select[name=section_id]').val() !=""){
			var class_id = "/"+$('select[name=class_id]').val();
			var section_id = "/"+$('select[name=section_id]').val();
			var link = "{{ url('students/get_students') }}"+class_id+section_id;
			$.ajax({
				url: link,
				beforeSend: function(){
					$("#preloader").css("display","block");
				},success: function(data){
					$("#preloader").css("display","none");
					var json =JSON.parse(data);
					   $('select[name=student_id]').html("");
					   $('#user_list').html("");

					jQuery.each( json, function( i, val ) {
					   $('select[name=student_id]').append("<option value='"+val['email']+"'>"+val['roll']+" - "+val['first_name']+" "+val['last_name']+"</option>");
					});

					if( $('#student_id').has('option').length > 0 ) {
						$('select[name=student_id]').prepend("<option value='all'>{{ __('All Student') }}</option>");
					}
				}
			});
		}
	}

	function get_all_students(){
		if($("#student_id").val() == "all"){
			var class_id = "/"+$('select[name=class_id]').val();
			var section_id = "/"+$('select[name=section_id]').val();
			var link = "{{ url('students/get_students') }}"+class_id+section_id;
			$.ajax({
				url: link,
				beforeSend: function(){
					$("#preloader").css("display","block");
				},success: function(data){
					$("#preloader").css("display","none");
					var json =JSON.parse(data);
					$('#user_list').html("");

					jQuery.each( json, function( i, val ) {
					   $('#user_list')
					   .append('<div class="col-md-12">'+
									'<label class="c-container">'+
									   '<input type="checkbox" value="'+val['email']+'" name="students[]" checked="true">'+val['roll']+" - "+val['first_name']+" "+val['last_name']+
									   '<span class="checkmark"></span>'+
									'</label>'+
								'</div>');
					});

				}
			});
		}else{
		  $('#user_list').html("");
		}
	}

	function get_all_users(){
		if($("#user_id").val() == "all"){
			var user_type = "/"+$('select[name=user_type]').val();
			var link = "{{ url('users/get_users') }}"+user_type;
			$.ajax({
				url: link,
				beforeSend: function(){
					$("#preloader").css("display","block");
				},success: function(data){
					$("#preloader").css("display","none");
					var json =JSON.parse(data);
					$('#user_list').html("");

					jQuery.each( json, function( i, val ) {
					   $('#user_list')
					   .append('<div class="col-md-12">'+
									'<label class="c-container">'+
									   '<input type="checkbox" value="'+val['email']+'" name="users[]" checked="true">'+val['email']+
									   ' ('+val['last_name']+
                                    ')<span class="checkmark"></span>'+
									'</label>'+
								'</div>');
					});

				}
			});
		}else{
		  $('#user_list').html("");
		}
	}

</script>
@stop
