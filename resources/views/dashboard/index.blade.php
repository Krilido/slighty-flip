@extends('layout.main')
@section('title')
Dashboard Admin
@endsection


@section('content')
<section class="section">
	<div class="section-header">
		<h1 class="flex-header">
			Dashbord
			{{-- <a href="#" class="btn btn-primary active" >Tambah</a>
			<a href="#" class="btn btn-primary" >Daftar</a> --}}
		</h1>
		<div class="section-header-breadcrumb">
			{{-- <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
			<div class="breadcrumb-item"><a href="#">Promo</a></div>
			<div class="breadcrumb-item">Tambah Promo</div> --}}
		</div>
	</div>

	<div class="section-body">
		<div class="row">
			<div class="col"></div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4>Ini Dashboard</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('js')

@endsection