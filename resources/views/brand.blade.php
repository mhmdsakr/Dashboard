@extends('includes.master')



@if (Route::currentRouteName() == 'brands.edit')


    @section('title')
        Edit Brand
    @endsection

    @section('content')
        @include('pages.brand.edit')
    @endsection



@else

    @section('title')
        Brand Page
    @endsection

    @section('content')
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add Brand
        </button>
        <br>
        <br>
        <!-- Table with stripped rows -->
        <table class="table datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Brand Name</th>
                    <th>controlls</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <th scope="col">{{$brand->id}}</th>
                        <td>{{$brand->name}}</td>
                        <td>
                            <a class="btn btn-success" href="{{route('brands.edit',$brand->id)}}">Edit</a>
                            {{-- <a class="btn btn-danger" href="">Delete</a> --}}
                            <form action="{{route('brands.destroy',$brand->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">delete</button>
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
                    @include('pages.brand.create')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    @endsection



@endif


