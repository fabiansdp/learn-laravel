@extends('layouts.master')

@section('content')
    <h1>{{ $song->title }}</h1>
    <p>{{ $song->genre }}</p>
    <p>{{ $song->year }}</p>
    <p>{{ $song->artist->name }}</p>
    <form class="d-inline-flex" method="get" action="/playlist/{{ $song-> id }}/edit">
        @csrf
        <button type="submit" class="btn btn-light">Edit</button>
    </form>
    <form class="d-inline-flex" method="post" action="/playlist/{{ $song->id }}">
        @csrf
        @method('delete')
        <input type="hidden" name="id" value="{{ $song->id }}">
        <button type="submit" class="btn btn-light">Delete</button>
    </form> 
@endsection

@section('footer')
    @include('layouts.footer')
@endsection

@include('layouts.footer-script')

</body>
</html>

