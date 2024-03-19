
@extends('layouts.admin')

@section('title', 'Users')
@section('page-title', 'Welcome to Users')
@section('content')


    
@if ($errors->any())
        @foreach ($errors->all() as $error)
<div class="alert  alert-danger alert-dismissible shadow-soft fade show" role="alert">
    <span class="alert-inner--icon"><span class="fas fa-exclamation-circle"></span></span>
    <span class="alert-inner--text"><strong>Error!</strong> {{$error}} </span>
    <button type="button" class="close text-dark" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endforeach

@endif

@if (session('success'))


<div class="alert alert-success alert-dismissible shadow-soft fade show" role="alert">
    <span class="alert-inner--icon"><span class="far fa-thumbs-up"></span></span>
    <span class="alert-inner--text"><strong>Well done!</strong> {{session('success')}}</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

    @endif


            <!-- table -->
            <div class="table">
                <div class="head">
                    <h2>Table users</h2>
                    <!-- <button onclick="onclick()">&#9776;</button> -->
                    {{-- <button id="openModalButton">Create New User </button> --}}
                    <button type="button" id="openModalButton"  data-toggle="modal" data-target="#modal-form">Create New User</button>
                
                </div>

                <table>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Crated Data</th>
                    <th>Action</th>

                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <a class="actionButton editButton" href="#">Edit</a>
                               
                                <form style="display: inline;" method="POST" action="{{route('users.destroy', $user->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="actionButton deleteButton ">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                

                </table>

            </div>
 
      




<!-- Modal Content -->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-primary shadow-soft border-light p-4">
                    <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="card-header text-center pb-0">
                        <h2 class="h4">Create New User</h2>
                        <span>create new user here</span>   
                    </div>
                    <div class="card-body">
                        <form action="{{route('users.store')}}" method="POST" class="mt-3 text-left">
                            <!-- Form -->
                            @csrf
                            @method('POST')
                            <div class="form-group ">
                                <label for="exampleInputIcon3">Your Name</label>
                                <div class="input-group mb-4">
                                    <input  class="form-control" name="name" id="exampleInputIcon3"  placeholder="name" type="text" aria-label="name" required>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputIcon3">Your email</label>
                                <div class="input-group mb-4">
                                    <input  class="form-control" name="email" id="exampleInputIcon3" placeholder="example@company.com" type="text" aria-label="email adress" required>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="form-group">
                                    <label for="exampleInputPassword6">Password</label>
                                    <div class="input-group mb-4">
                                        <input class="form-control" name="password" id="exampleInputPassword6" placeholder="Password" type="password" aria-label="Password" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary mb-3">create</button>
                        </form>
                            <!-- End of Form -->
                     
    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Content -->


            @endsection