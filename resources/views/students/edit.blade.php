@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('EDIT STUDENT DATA') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/students/{{$student->id}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$student->id}}"></br>
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control" required="required" name="nim" value="{{$student->nim}}"></br>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" required="required" name="name" value="{{$student->name}}"></br>
                        </div>
                        <div class="form-group">
                            <label for="class">Class</label>
                            <select class="form-control" name="Kelas">
                                @foreach($kelas as $class)
                                    <option value="{{$class->id}}" {{ $student->class_id==$class->id ? "selected":"" }}> 
                                        {{ $class->class_name }}
                                    </option>
                                @endforeach
                            </select><br> 
                        </div>
                        <div class="form-group">
                            <label for="department">Department</label>
                            <input type="text" class="form-control" required="required" name="department" value="{{$student->department}}"></br>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" required="required" name="phone_number" value="{{$student->phone_number}}"></br>
                        </div>
                            <div class="form-group"><label for="photo">Feature Image</label>
                            <input type="file" class="form-control" required="required" name="photo" value="{{$student->photo}}"></br>
                            <img width="150px" src="{{asset('storage/'.$student->photo)}}">
                        </div>
                        <button type="submit" name="edit" class="btn btn-primary float-right">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection