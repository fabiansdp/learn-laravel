@extends('layouts.master')

	@section('content')	
	<!-- Category section -->
	<section class="category-section spad">
		<div class="container-fluid">
			<div class="section-title">
				<h2>All Playlist</h2>
			</div>
			<div class="container">
				<div class="category-links">
					<a href="" class="active">All Playlist</a>
					<a href="{{ url('/form-add-playlist') }}">Add Playlist</a>
				</div>
			</div>
			<div class="category-items">
				<div class="row">
					<div class="col-md-4">
						<div class="category-item">
							<img src="{{ asset('frontend/img/playlist/9.jpg') }}" alt="">
							<div class="ci-text">
								<h4>Micke Smith</h4>
								<p>Live from Madrid</p>
							</div>
							<a href="artist.html" class="ci-link"><i class="fa fa-play"></i></a>
						</div>
					</div>
					<div class="col-md-4">
						<div class="category-item">
							<img src="{{ asset('frontend/img/playlist/2.jpg') }}" alt="">
							<div class="ci-text">
								<h4>Micke Smith</h4>
								<p>Live from Madrid</p>
							</div>
							<a href="artist.html" class="ci-link"><i class="fa fa-play"></i></a>
						</div>
					</div>
					<div class="col-md-4">
						<div class="category-item">
							<img src="{{ asset('frontend/img/playlist/7.jpg') }}" alt="">
							<div class="ci-text">
								<h4>Micke Smith</h4>
								<p>Live from Madrid</p>
							</div>
							<a href="artist.html" class="ci-link"><i class="fa fa-play"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->

	<!-- Songs section  -->
	<section class="songs-section">
		<div class="container">
			<!-- song -->
			@foreach ($songs as $song)
				<div class="song-item">
					<div class="row">
						<div class="col-lg-8">
							<div class="song-info-box">
								<img src="{{ asset('frontend/img/songs/1.jpg') }}" alt="">
								<div class="song-info">
									<h4>{{ $song->title }}</h4>
									<p>{{ $song->artist }}</p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-2">
							<div class="songs-links">
								<form class="d-inline-flex" method="post" action="/edit">
									@csrf
									<!-- @method('put') -->
									<button type="submit" class="btn btn-light">Edit</button>
								</form>

								<form class="d-inline-flex" method="post" action="/songs/{{ $song->id }}">
									@csrf
									@method('delete')
									<input type="hidden" name="id" value="{{ $song->id }}">
									<button type="submit" class="btn btn-light">Delete</button>
								</form>
							</div>												
						</div>
					</div>
				</div>
				<!-- end song -->
			@endforeach
			
			<div class="site-pagination pt-5 mt-5">
				<a href="#" class="active">01.</a>
				<a href="#">02.</a>
				<a href="#">03.</a>
				<a href="#">04.</a>
			</div>
		</div>
	</section>
	<!-- Songs section end -->
	@endsection

	@section('footer')
		@include('layouts.footer')
	@endsection
	
	@include('layouts.footer-script')

	</body>
</html>

