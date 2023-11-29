@extends('master')

@section('title')
    ManageUser
@endsection



@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Manage User</h3>
                            <div class="card-body">
                                <table id="example" class="table table-striped table-bordered border-primary" >
                                    <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($blogs as $blog)
                                    <tr>
                                        <th>{{$blog->id}}</th>
                                        <td>{{$blog->name}}</td>
                                        <td>{{$blog->email}}</td>
                                        <td>
                                            <img style="width: 50px; height: 50px; border-radius:50% " src="{{isset($blog->image) ? asset($blog->image) : 'Image not found'}}">
                                        </td>
                                        <td>
                                            <a style="padding: 6px 20px; color: #fff;" href="{{route('edit', ['id'=>$blog->id])}}" class="btn btn-warning">Edit</a>
                                            <a href="{{route('delete', ['id'=>$blog->id])}}" class="btn btn-danger" onclick= "confirm('Are you sure?')">Delete</a>
                                        </td>

                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


