@extends('admin.master.app')

@section('title')
	Tambah Anggota
@endsection

@section('content')
	<div id="main-content" class="dashboard">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading bg-red">
						<h3 class="panel-title"><strong>Tambah</strong> Anggota</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<form id="form4" class="form-horizontal icon-validation" role="form" method="POST" action="{{ action('Admin\MemberController@store') }}" parsley-validate>
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group">
										<label class="col-sm-3 control-label">NIP/NIM/NIS</label>
										<div class="col-sm-7 input-icon right">
											<i class="fa"></i>
											<input type="text" name="id" class="form-control" value="{{ old('id') }}" parsley-type="digits" parsley-minlength="3" parsley-required="true" autocomplete="off" autofocus />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Nama</label>
										<div class="col-sm-7 input-icon right">
											<i class="fa"></i>
											<input type="text" name="nama" class="form-control" value="{{ old('nama') }}" parsley-minlength="3" parsley-required="true" autocomplete="off" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Tanggal Lahir</label>
										<div class="col-sm-7">
											<div class="row">
												<div class="col-sm-3">
													<select class="form-control" name="tanggal" data-live-search="true">
														<option value="0" selected>Tanggal</option>
														@for($i=1;$i<32;$i++)
															<option value="{{ $i }}">{{ $i }}</option>
														@endfor
													</select>
												</div>
												<div class="col-sm-4">
													<select class="form-control" name="bulan" data-live-search="true">
														<option value="0" selected>Bulan</option>
														@for($i=0;$i<12;$i++)
															<option value="{{ $i+1 }}">{{ bulan($i) }}</option>
														@endfor
													</select>
												</div>
												<div class="col-sm-3">
													<input type="year" name="tahun" class="form-control" maxlength="4" size="4" value="{{ old('year') }}" placeholder="Tahun" parsley-type="digits" autocomplete="off" />
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Jenis Kelamin</label>
										<div class="col-sm-7 skin-section">
											<ul class="list inline m-t-5">
												<li>
													<input tabindex="11" type="radio" data-style="square-blue" name="jk" value="Laki-Laki" checked />
													<label class="m-r-20">Laki-Laki</label>
												</li>
												<li>
													<input tabindex="11" type="radio" data-style="square-aero" name="jk" value="Perempuan" />
													<label>Perempuan</label>
												</li>
											</ul>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Jenis Anggota</label>
										<div class="col-sm-7 skin-section">
											<ul class="list inline m-t-5">
												<li>
													<input tabindex="11" type="radio" data-style="square-red" name="ja" value="Karyawan" checked />
													<label class="m-r-20">Karyawan</label>
												</li>
												<li>
													<input tabindex="11" type="radio" data-style="square-orange" name="ja" value="Non-Karyawan" />
													<label>Non-Karyawan</label>
												</li>
											</ul>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Nomor Telepon</label>
										<div class="col-sm-7 input-icon right">
											<i class="fa"></i>
											<input type="text" name="phone" class="form-control" value="{{ old('phone') }}" maxlength="12" parsley-type="digits" autocomplete="off" autofocus />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Alamat</label>
										<div class="col-sm-7">
											<textarea class="form-control" name="alamat">{{ old('alamat') }}</textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Keterangan</label>
										<div class="col-sm-7">
											<textarea class="form-control" name="keterangan">{{ old('keterangan') }}</textarea>
										</div>
									</div>
									<div class="form-group text-center">
										<button class="btn btn-danger" onclick="javascript:$('#form4').parsley('validate');">Submit</button>
										<button type="reset" class="btn btn-default">Cancel</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script src="{{ asset('/assets/plugins/parsley/parsley.js') }}"></script>
	<script src="{{ asset('/assets/plugins/parsley/parsley.extend.js') }}"></script>
	<script src="{{ asset('/assets/plugins/icheck/custom.js') }}"></script>
	<script src="{{ asset('/assets/js/form.js') }}"></script>
@endsection