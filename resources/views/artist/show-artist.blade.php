@extends('layouts.master')

@section('content')
    <h1>{{ $artist->name }}</h1>
    <p>@if($artist->gender==='male') <?= 'Male'?> @else <?= 'Female'?> @endif</p>
    <p>{{ $artist->age }}</p>
    <form class="d-inline-flex" method="get" action="/artist/{{ $artist->id }}/edit">
        @csrf
        <button type="submit" class="btn btn-light">Edit</button>
    </form>
    <form class="d-inline-flex" method="post" action="/artist/{{ $artist->id }}">
        @csrf
        @method('delete')
        <input type="hidden" name="id" value="{{ $artist->id }}">
        <button type="submit" class="btn btn-light">Delete</button>
    </form>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection

@include('layouts.footer-script')

</body>
</html>