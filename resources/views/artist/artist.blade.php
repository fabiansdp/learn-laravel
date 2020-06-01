@extends('layouts.master')

	@section('content')	
	<!-- Category section -->
	<section class="category-section spad">
		<div class="container-fluid">
			<div class="section-title">
				<h2>All Artists</h2>
			</div>
			<div class="container">
				<div class="category-links">
					<a href="" class="active">All Artists</a>
					<a href="{{ url('/artist/create') }}">Add Artist</a>
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

    <!-- Artist Section -->
    <section class="artists-section">
		<div class="container">
			<!-- song -->
			@foreach ($artists as $artist)
				<div class="song-item">
					<div class="row">
						<div class="col-lg-8">
							<div class="song-info-box">
								<img src="{{ asset('frontend/img/songs/1.jpg') }}" alt="">
								<div class="song-info">
									<h4><a href="artist/{{ $artist->id }}">{{ $artist->name }}</a></h4>
								</div>
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
	@endsection

	@section('footer')
		@include('layouts.footer')
	@endsection
	
	@include('layouts.footer-script')

	</body>
</html>