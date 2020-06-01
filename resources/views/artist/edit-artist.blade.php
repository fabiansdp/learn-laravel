@extends('layouts.master')

@section('content')
    <div class="row justify-content-center my-5">
        <div class="col-lg-6">
            <h3 class="text-center mb-5">Edit Playlist</h3>
            <form action="/artist/{{ $artist->id }}" method="POST">
                @csrf
                @method('put')
                    <div class="form-group">
                        <label for="name">Artist Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $artist->name }}" required="require">
                    </div>
                    
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="custom-select mr-sm-2" name="gender" id="gender" required="require">
                            <option value="male" @if($artist->gender === 'male') selected @endif>Male</option>
                            <option value="female"@if($artist->gender === 'female') selected @endif>Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" class="form-control" id="age" name="age" value="{{ $artist->age }}" required="require">
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update Artist</button>
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