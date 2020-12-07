@extends('layout.main')
@section('title')
Dashboard Admin
@endsection

@section('content')
<section class="section">
	<div class="section-header">
		<h1 class="flex-header">
			Menu
			<a href="{{route('disbursement.create')}}" class="btn btn-primary active" >Add</a>
			<a href="{{route('disbursement')}}" class="btn btn-primary" >List</a>
		</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
			<div class="breadcrumb-item"><a href="{{route('disbursement')}}">List</a></div>
			<div class="breadcrumb-item">Tambah Menu</div>
		</div>
	</div>

	<div class="section-body">
		{{-- <h2 class="section-title">Menu</h2> --}}
		<div class="row">
			<div class="col"></div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4>Add Disbursement</h4>
					</div>
					<form method="POST" action="{{route('disbursement')}}" enctype="multipart/form-data">
						<div class="card-body">
							@if ($errors->any())
							<div class="alert alert-danger">
								<ul class='no-style mb-0'>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
								</ul>
							</div>
							@endif
							<div class="row">			
								<div class="col-sm-12">
									{{ csrf_field() }}
									<div class="form-group">
										<label for="inputEmail4">Bank Code</label>
										<input type="text" name="bank_code" class="form-control" placeholder="Bank Code">
									</div>
									<div class="form-group">
										<label for="inputEmail4">Account Number</label>
										<input type="text" name="account_number" class="form-control" placeholder="Account Number">
									</div>
									<div class="form-group">
										<label for="inputEmail4">Amount</label>
										<input type="text" name="amount" class="form-control" placeholder="Amount">
									</div>
									<div class="form-group">
										<label for="inputEmail4">Remark</label>
										<textarea name="remark" id="" class="form-control"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer text-right">
							<button class="btn btn-primary mr-1" type="submit">Submit</button>
							<button class="btn btn-secondary" type="reset">Reset</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('js')
<script>
	$("#table-1").dataTable({
		"columnDefs": [
			{ "sortable": false, "targets": [2,3] }
		]
	});
</script>
<script>
	"use strict";

	$("select").selectric();
	$.uploadPreview({
	input_field: "#image-upload",   // Default: .image-upload
	preview_box: "#image-preview",  // Default: .image-preview
	label_field: "#image-label",    // Default: .image-label
	label_default: "Choose File",   // Default: Choose File
	label_selected: "Change File",  // Default: Change File
	no_label: false,                // Default: false
	success_callback: null          // Default: null
	});
	$(".inputtags").tagsinput('items');
	
	!function(e){e.extend({uploadPreview:function(l){var i=e.extend({input_field:".image-input",preview_box:".image-preview",label_field:".image-label",label_default:"Choose File",label_selected:"Change File",no_label:!1,success_callback:null},l);return window.File&&window.FileList&&window.FileReader?void(void 0!==e(i.input_field)&&null!==e(i.input_field)&&e(i.input_field).change(function(){var l=this.files;if(l.length>0){var a=l[0],o=new FileReader;o.addEventListener("load",function(l){var o=l.target;a.type.match("image")?(e(i.preview_box).css("background-image","url("+o.result+")"),e(i.preview_box).css("background-size","cover"),e(i.preview_box).css("background-position","center center")):a.type.match("audio")?e(i.preview_box).html("<audio controls><source src='"+o.result+"' type='"+a.type+"' />Your browser does not support the audio element.</audio>"):alert("This file type is not supported yet.")}),0==i.no_label&&e(i.label_field).html(i.label_selected),o.readAsDataURL(a),i.success_callback&&i.success_callback()}else 0==i.no_label&&e(i.label_field).html(i.label_default),e(i.preview_box).css("background-image","none"),e(i.preview_box+" audio").remove()})):(alert("You need a browser with file reader support, to use this form properly."),!1)}})}(jQuery);
</script>
<script type="text/javascript" src='{{asset('assets/js/uploadfile.js')}}'></script>
@endsection