@extends('admin.master.app')

@section('title')
	Trash Data Peminjaman
@endsection

@section('content')
	<div id="main-content">
		@if(count($result) > 0)
			<div class="row">
				<div class="col-md-12">
					@if(Session::has('message')) @include('admin.master.message') @endif
					<div class="panel panel-default">
						<div class="panel-heading bg-red">
							<h3 class="panel-title"><strong>Trash </strong> Data Peminjaman</h3>
							<ul class="pull-right header-menu sr-only">
								<li class="dropdown" id="user-header">
									<a href="#" class="dropdown-toggle c-white" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
										<i class="fa fa-cog f-20"></i>
									</a>
										<ul class="dropdown-menu">
											<li>
												<a href="{{ route('admin.borrow.export','xlsx') }}">
													<i class="glyphicon glyphicon-file"></i> Export to Excel
												</a>
											</li>
										</ul>
								</li>
							</ul>
						</div>
						<div class="panel-body p-5">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-red">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th class="text-center">ID</th>
												<th class="text-center">NIS/NIM/NIP</th>
												<th class="text-center">Kode Buku</th>
												<th class="text-center">Tanggal Pinjam</th>
												<th class="text-center">Tanggal Kembali</th>
												<th class="text-center">Keterangan</th>
												<th class="text-center">Waktu Hapus</th>
											</tr>
										</thead>
										<tbody>
											@foreach($result as $borrow)
												<tr>
													<td>{{ $borrow->id }}</td>
													<td>{{ $borrow->member_id }}</td>
													<td>{{ $borrow->book_id }}</td>
													<td>{{ tanggal($borrow->tanggal_pinjam) }}</td>
													<td>{{ empty($borrow->tanggal_kembali) ? '' : tanggal($borrow->tanggal_kembali) }}</td>
													<td>{{ empty($borrow->tanggal_kembali) ? 'Peminjaman' : 'Pengembalian' }}</td>
													<td>{{ $borrow->deleted_at }}</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 table-red">
									<span class="pull-left">
										<small class="c-red">
											Showing {!! count($result) > 0 ? $result->perPage()*$result->currentPage()-$result->perPage()+1 : 0 !!}
											to {!! $result->perPage()*$result->currentPage() < $result->total() ? $result->perPage()*$result->currentPage() : $result->total() !!}
											of {!! $result->total() !!} entries</small></span>
									<span class="pull-right">{!! $result->render() !!}</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		@else
			<div class="alert alert-warning w-100 m-t-0 m-b-10" role="alert">
				<i class='fa fa-frown-o' style='padding-right:3px'></i>
				<span class="glyphicon glyphicon-exclamation-ok-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Oops! Trash data peminjaman tidak ditemukan . . .
			</div>
		@endif
	</div>
@endsection
