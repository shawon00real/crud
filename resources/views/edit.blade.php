@extends('master')

@section('title')
    CreateUser
@endsection


@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Edit User</h3>
                            <div class="card-body">
                                <form action="{{route('update')}}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="eid" value="{{$edit->id}}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="example" class="form-label">Id is: {{$edit->id}}</label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="example" class="form-label">Enter Your Name</label>
                                        <input type="text" name="name" value="{{$edit->name}}" class="form-control" id="example">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" name="email" value="{{$edit->email}}" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Image</label>
                                        <img class="mb-2" style="width: 100px; height: 100px; display: block; margin: 0 auto;" src="{{isset($edit->image) ? asset($edit->image) : "" }}">
                                        <input class="form-control" name="image" type="file" id="formFile">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


