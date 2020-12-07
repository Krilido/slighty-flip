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
			<a href="{{route('disbursement.create')}}" class="btn btn-primary active" >Add</a>
		</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></div>
			<div class="breadcrumb-item">Daftar Kategori Menu</div>
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
						<h4>Disbursement List</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
								<div class="row">
									<div class="col-sm-12">
										<table class="table table-striped no-footer" >
											<thead>                                 
												<tr>
													<th>#</th>
													<th>ID</th>
													<th>Amount</th>
													<th>Bank Code</th>
                                                    <th>Account Number</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
												</tr>
											</thead>
											<tbody>   
												@foreach ($datas as $key => $data)
												<tr>
													<td>
														{{($key + 1) + (($datas->currentPage()-1) * 10) }}
													</td>
													<td>{{$data->id_api}}</td>
													<td>{{$data->amount}}</td>
                                                    <td>{{$data->bank_code}}</td>
                                                    <td>{{$data->account_number}}</td>
													<td>
														@if ($data->status == \App\Model\Disbursement::SUCCESS)	
														<div class="badge badge-success">SUCCESS</div>
														@endif
														@if ($data->status == \App\Model\Disbursement::PENDING)	
														<div class="badge badge-primary">PENDING</div>
                                                        @endif
                                                        @if ($data->status == \App\Model\Disbursement::INIT)	
														<div class="badge badge-secondary">INIT</div>
														@endif
													</td>
													<td>
                                                        <a href="{{route('disbursement.show',$data->id)}}" class="btn btn-info">Detail</a>
                                                        <a href="{{route('disbursement.sync',$data->id)}}" class="btn btn-warning">Sync</a>
                                                    </td>
												</tr>
												@endforeach                            
											</tbody>
										</table>
									</div>
									<div class='text-right float-right mt-3'>
										{{$datas->appends(request()->input())->links() }}
									</div>
								</div>
							</div>
						</div>
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
	@if (session('delete_success'))
		swal('Berhasil', 'Data berhasil dihapus!', 'success');
	@endif
	@if (session('update_success'))
		swal('Berhasil', 'Data berhasil diubah!', 'success');
	@endif
	@if (session('update_failed'))
		swal('Gagal', 'Data gagal diubah!', 'error');
	@endif
</script>
@endsection