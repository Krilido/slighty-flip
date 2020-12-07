@extends('layout.main')
@include('plugins.sweetalert')
@section('title')
Dashboard Admin
@endsection

@section('content')
<section class="section">
	<div class="section-header">
		<h1 class="flex-header">
			Disbursement
            <a href="{{route('disbursement.create')}}" class="btn btn-primary" >Add</a>
            <a href="{{route('disbursement')}}" class="btn btn-primary" >List</a>
		</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
			<div class="breadcrumb-item"><a href="{{route('disbursement')}}">List</a></div>
			<div class="breadcrumb-item">Detail</div>
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
						<h4>Detail Disbursement</h4>
					</div>
					<div class="card-body">
						<div class="card-body">
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-3 col-form-label">ID</label>
								<div class="col-sm-9 col-form-label">
									: {{$data->id_api}}
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-3 col-form-label">Amount</label>
								<div class="col-sm-9 col-form-label">
									: {{$data->amount}}
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-3 col-form-label">Status</label>
								<div class="col-sm-9 col-form-label">
									: {{$data->status}}
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-3 col-form-label">Time Stamp</label>
								<div class="col-sm-9 col-form-label">
									: {{$data->timestamp}}
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-3 col-form-label">Bank Code</label>
								<div class="col-sm-9 col-form-label">
									: {{$data->bank_code}}
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-3 col-form-label">Account Number</label>
								<div class="col-sm-9 col-form-label">
									: {{$data->account_number}}
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-3 col-form-label">Beneficiary Name</label>
								<div class="col-sm-9 col-form-label">
									: {{$data->beneficiary_name}}
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-3 col-form-label">Remark</label>
								<div class="col-sm-9 col-form-label">
									: {{$data->remark}}
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-3 col-form-label">Receipt</label>
								<div class="col-sm-9 col-form-label">
									: {{$data->receipt}}
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-3 col-form-label">Time Served</label>
								<div class="col-sm-9 col-form-label">
									: {{$data->time_served}}
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-3 col-form-label">Fee</label>
								<div class="col-sm-9 col-form-label">
									: {{$data->fee}}
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-3 col-form-label">Created At</label>
								<div class="col-sm-9 col-form-label">
									: {{$data->created_at}}
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer text-right">
						<form id="hapus" method="POST" action="{{route('disbursement.show',$data->id)}}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field()}}
                        </form>
                        <button title="Hapus" class="btn btn-danger hapus">Hapus</button>
                        <a href="{{route('disbursement.edit',$data->id)}}" class="btn btn-warning">Ubah</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('js')
<script>
	@if (session('create_success'))
		swal('Berhasil', 'Data berhasil disimpan!', 'success');
	@endif
	@if (session('create_failed'))
		swal('Gagal', 'Data gagal disimpan!', 'error');
	@endif

    $(".hapus").click(function(){ console.log('1');
        swal({
            title: 'Apakah anda yakin menghapus data ini ini?',
            text: 'data akan dihapus selamanya dan tidak akan bisa dikembalikan lagi!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $('form#hapus').submit();
            } else {
                
            }
        });
    });
</script>
@endsection