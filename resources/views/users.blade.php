@extends('includes.master')



@if (Route::currentRouteName() == 'admins.edit')

    @section('title')
        Edit User
    @endsection

    @section('content')
        @include('pages.users.edit')
    @endsection



@else

    @section('title')
        User Page
    @endsection

    @section('content')
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add User
        </button>
        <br>
        <br>
        <!-- Table with stripped rows -->
        <table class="table datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Gmail</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>privliges</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Registerd At</th>
                    <th>Controll</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="col">{{$user->id}}</th>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->gender->name ?? 'N/A' }}</td>
                        <td>{{$user->pr->name ?? 'N/A' }}</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                            <a class="btn btn-success" href="{{route('admins.edit',$user->id)}}">Edit</a>
                            <form action="{{route('admins.destroy' , $user->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>
         <!-- End Table with stripped rows -->



        <!-- Modal create-->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('pages.users.create')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    @endsection



@endif


