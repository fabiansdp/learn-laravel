@extends('layouts.master')

@section('content')
    <div class="row justify-content-center my-5">
        <div class="col-lg-6">
            <h3 class="text-center mb-5">Add Playlist</h3>
            <form action="/playlist" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="artistName">Artist Name</label>
                        <select class="custom-select mr-sm-2" name="artistName" id="artistName" required="require">
                            @foreach ($artists as $artist)
                                <option value="{{ $artist->name }}">{{ $artist->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="songTitle">Song Title</label>
                        <input type="text" class="form-control" id="songTitle" name="songTitle" required="require">
                    </div>

                    <div class="form-group">
                        <label for="songGenre">Song Genre</label>
                        <select class="custom-select mr-sm-2" name="optionGenre" required="require">
                            <option value="Pop">Pop</option>
                            <option value="Rock">Rock</option>
                            <option value="Jazz">Jazz</option>
                            <option value="K-Pop">K-Pop</option>
                            <option value="Blues">Blues</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="songYear">Song Year</label>
                        <input type="text" class="form-control" id="songYear" name="songYear" required="require">
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Add Playlist</button>
                    </div>
            </form>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
@endsection

@section('footer')
    @include('layouts.footer')
@endsection

@include('layouts.footer-script')

</body>
</html>