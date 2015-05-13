@extends('public.app')

@section('title')
	Beranda
@endsection

@section('style')
	<link href="{{ asset('/plugins/iview/iview.css') }}" rel="stylesheet">
	<link href="{{ asset('/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="row">
					<div class="col-md-12">
						<div class="slider">
							<div id="iview">
								<div data-iview:image="{{ asset('/img/slide-.jpg') }}" data-iview:pausetime="40000">
									<div class="iview-caption metro-box1 orange" data-transition="wipeUp" data-x="94" data-y="209">
										<a href="{{ route('book','original') }}">
											<div class="box-hover"></div>
											<i class="fa fa-tasks fa-fw"></i>
											<span>Buku Asli</span>
										</a>
									</div>
									<div class="iview-caption metro-box1 blue" data-transition="wipeUp" data-x="266" data-y="209">
										<a href="{{ route('book','research') }}">
											<div class="box-hover"></div>
											<i class="fa fa-university fa-fw"></i>
											<span>Buku PKL</span>
										</a>
									</div>
									<div class="iview-caption metro-box2" data-transition="expandLeft" data-x="438" data-y="209">
										<div class="monthlydeals">
											<div class="monthly-deals slide" id="monthly-deals">
												<div class="carousel-inner">
													<div class="item active"> <img alt="" src="{{ asset('/img/slider-deal1.jpg') }}"> </div>
													<div class="item"> <img alt="" src="{{ asset('/img/slider-deal2.jpg') }}"> </div>
													<div class="item"> <img alt="" src="{{ asset('/img/slider-deal3.jpg') }}"> </div>
												</div>
											</div>
										</div>
									</div>
									<div class="iview-caption metro-box1 purple" data-transition="wipeDown" data-x="438" data-y="37">
										<a href="{{ route('book') }}">
											<div class="box-hover"></div>
											<i class="fa fa-book fa-fw"></i>
											<span>Koleksi Buku</span>
										</a>
									</div>
									<div class="iview-caption metro-box1 dark-blue" data-transition="wipeDown" data-x="610" data-y="37">
										<a href="{{ route('book','download') }}">
											<div class="box-hover"></div>
											<i class="fa fa-file-pdf-o fa-fw"></i>
											<span>Ebook</span>
										</a>
									</div>
									<div class="iview-caption metro-heading" data-transition="expandLeft" data-x="95" data-y="40">
										<h1>PERPUSTAKAAN INTI</h1>
									</div>
									<div class="iview-caption metro-heading" data-transition="wipeLeft" data-x="95" data-y="100">
										<span class="text-larger">
											Memiliki sekitar {{ $book }} koleksi buku yang terdiri dari buku referensi, pengetahuan umum, ensiklopedia dan laporan hasil penelitian yang dilakukan di<br>PT. INTI (Persero)
										</span>
									</div>
								</div>
								@if(count($sliders) > 0)
									@foreach($sliders as $slider)
										<div data-iview:image="{{ asset('/img/slide-'.(empty($slider->mime) ? '.jpg' : $slider->id.'.'.$slider->mime)) }}">
											<div class="iview-caption caption2" data-easing="easeInOutElastic" data-transition="expandLeft" data-x="90" data-y="50">{{ $slider->judul }}</div>
											<div class="iview-caption caption3" data-easing="easeInOutElastic" data-transition="expandLeft" data-x="90" data-y="111">{{ $slider->keterangan }}</div>
										</div>
									@endforeach
								@endif
								<div data-iview:image="{{ asset('/img/slide-.jpg') }}">
									<div class="iview-caption caption3 btm-bar" data-height="107px" data-transition="expandRight" data-width="867px" data-x="0" data-y="300">
										<h1><b>Perpustakaan INTI</b></h1>
										{{ address(1) }}<br>{{ address(2) }}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix s-10"></div>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-gray">
							<div class="panel-body">
								<span class="panel-body-title-icon"><img class="img" src="{{ asset('/favicon.ico.png') }}"></span>
								{!! $beranda !!}
							</div>
						</div>
					</div>
				</div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12">
				<div class="visible-xs clearfix s-20"></div>
				<div class="row">
					<div class="col-md-12">
						<div class="box">
							<div class="box-heading">
								<span>Buku Terbaru</span>
							</div>
							<div class="box-content">
								<div class="panel-group" id="sidebar">
									<div class="panel panel-default">
										<div class="panel-heading opened" data-parent="#sidebar" data-target="#asli" data-toggle="collapse">
											<h4 class="panel-title"> <a href="#"> <span class="fa fa-minus"></span> Buku Asli </a> </h4>
										</div>
										<div class="panel-collapse collapse in" id="asli">
											<div class="panel-body recent">
												<ul>
													@foreach($asli as $book)
														<?php $authors = [] ?>
														@foreach($book->author as $author)
															<?php $authors[] = $author->nama ?>
														@endforeach
														<li class="item">
															<a href="#{{ $book->id }}" data-target="#{{ $book->id }}" data-toggle="modal">{{ $book->judul }}</a>
															<div class="modal fade" id="{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																<div class="modal-dialog">
																	<div class="modal-content">
																		<div class="modal-body table-responsive">
																			<table class="table table-striped">
																				<thead>
																					<tr><th colspan="2" class="text-center">{{ $book->judul }}</th></tr>
																				</thead>
																				<tbody>
																					<tr><td><strong>Kode</strong></td><td> {{ $book->id }}</td></tr>
																					<tr><td><strong>Judul</strong></td><td> {{ $book->judul }}</td></tr>
																					<tr><td><strong>Edisi</strong></td><td> {{$book->edisi }}</td></tr>
																					<tr><td><strong>Pengarang</strong></td><td> {{ implode(', ',$authors) }}</td></tr>
																					<tr><td><strong>Penerbit</strong></td><td> {{ $book->publisher->nama }}</td></tr>
																					<tr><td><strong>Subyek</strong></td><td> {{ $book->subject->nama }}</td></tr>
																				</tbody>
																			</table>
																			@if(!empty($book->file->book_id) AND file_exists(public_path('files/').$book->file->filename.'.'.$book->file->mime))
																				<button type="button" class="btn btn-success pull-left" data-dismiss="modal">Download</button>
																			@endif
																			<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
																		</div>
																	</div>
																</div>
															</div>
														</li>
													@endforeach
												</ul>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading" data-parent="#sidebar" data-target="#pkl" data-toggle="collapse">
											<h4 class="panel-title"> <a href="#"> <span class="fa fa-plus"></span> Buku PKL </a> </h4>
										</div>
										<div class="panel-collapse collapse" id="pkl">
											<div class="panel-body recent">
												<ul>
													@foreach($pkl as $book)
														<?php $authors = [] ?>
														@foreach($book->author as $author)
															<?php $authors[] = $author->nama ?>
														@endforeach
														<li class="item">
															<a href="#{{ $book->id }}" data-target="#{{ $book->id }}" data-toggle="modal">{{ $book->judul }}</a>
															<div class="modal fade" id="{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																<div class="modal-dialog">
																	<div class="modal-content">
																		<div class="modal-body table-responsive">
																			<table class="table table-striped">
																				<thead>
																					<tr><th colspan="2" class="text-center">{{ $book->judul }}</th></tr>
																				</thead>
																				<tbody>
																					<tr><td><strong>Kode</strong></td><td> {{ $book->id }}</td></tr>
																					<tr><td><strong>Judul</strong></td><td> {{ $book->judul }}</td></tr>
																					<tr><td><strong>Edisi</strong></td><td> {{$book->edisi }}</td></tr>
																					<tr><td><strong>Pengarang</strong></td><td> {{ implode(', ',$authors) }}</td></tr>
																					<tr><td><strong>Penerbit</strong></td><td> {{ $book->publisher->nama }}</td></tr>
																					<tr><td><strong>Subyek</strong></td><td> {{ $book->subject->nama }}</td></tr>
																				</tbody>
																			</table>
																			@if(!empty($book->file->book_id) AND file_exists(public_path('files/').$book->file->filename.'.'.$book->file->mime))
																				<button type="button" class="btn btn-success pull-left" data-dismiss="modal">Download</button>
																			@endif
																			<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
																		</div>
																	</div>
																</div>
															</div>
														</li>
													@endforeach
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix s-10"></div>
				<div class="row">
					<div class="col-md-12">
						<div class="box">
							<div class="box-heading">
								<span>Facebook</span>
							</div>
							<div class="box-content">
								<div id="fb-root"></div>
								<div class="fb-page" data-href="https://www.facebook.com/pages/Perpustakaan-INTI/457424021090691" data-width="500px" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
									<div class="fb-xfbml-parse-ignore">
										<blockquote cite="https://www.facebook.com/pages/Perpustakaan-INTI/457424021090691">
											<a href="https://www.facebook.com/pages/Perpustakaan-INTI/457424021090691">Perpustakaan INTI</a>
										</blockquote>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
      </div>
    </div>
	</div>
@endsection

@section('script')
	<script src="{{ asset('/plugins/iview/raphael-min.js') }}"></script>
	<script src="{{ asset('/plugins/iview/jquery.easing.js') }}"></script>
	<script src="{{ asset('/plugins/iview/iview.js') }}"></script>
	<script src="{{ asset('/plugins/iview/retina-1.1.0.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
	<script>
		(function($) {
			"use strict";
			$('#iview').iView({
				pauseTime: 12345,
				pauseOnHover: true,
				directionNavHoverOpacity: 0.6,
				timer: "360Bar",
				timerBg: '#2da5da',
				timerColor: '#fff',
				timerOpacity: 0.9,
				timerDiameter: 20,
				timerPadding: 1,
				touchNav: true,
				timerStroke: 2,
				timerBarStrokeColor: '#fff'
			});
			$('#monthly-deals').carousel({
				interval: 3000
			});
			$('.recent').mCustomScrollbar({
				theme:"minimal-dark",
				autoExpandScrollbar: true
			});
			$('.box .collapse').on('shown.bs.collapse', function(){
				$(this).parent().find(".fa-plus").removeClass("fa-plus").addClass("fa-minus");
				$(this).parent().find(".panel-heading").removeClass("closed").addClass("opened");
			}).on('hidden.bs.collapse', function(){
				$(this).parent().find(".fa-minus").removeClass("fa-minus").addClass("fa-plus");
				$(this).parent().find(".panel-heading").removeClass("opened").addClass("closed");
			});
		})(jQuery);
	</script>
	<script>
		(function(d, s, id){
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
@endsection
