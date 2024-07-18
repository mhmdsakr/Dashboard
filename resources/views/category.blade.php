@extends('includes.master')



@if (Route::currentRouteName() == 'category.edit')


    @section('title')
        Edit Category
    @endsection

    @section('content')
        @include('pages.category.edit')
    @endsection



@else

    @section('title')
        Category Page
    @endsection

    @section('content')
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add Category
        </button>
        <br>
        <br>
        <!-- Table with stripped rows -->
        <table class="table datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>controlls</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="col">{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td>
                        <a class="btn btn-success" href="{{route('category.edit',$category->id)}}">Edit</a>
                        {{-- <a class="btn btn-danger" href="">Delete</a> --}}
                        <form method="post" action="{{route('category.destroy',$category->id)}}">
                            @csrf
                            @method("DELETE")
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
                    @include('pages.category.create')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    @endsection



@endif


