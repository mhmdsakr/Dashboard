@extends('includes.master')



@if (Route::currentRouteName() == 'products.edit')


    @section('title')
        Edit Product
    @endsection

    @section('content')
        @include('pages.products.edit')
    @endsection



@else

    @section('title')
        Product Page
    @endsection

    @section('content')
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add Product
        </button>
        <br>
        <br>
        <!-- Table with stripped rows -->
        <table class="table datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>price</th>
                    <th>image</th>
                    <th>count</th>
                    <th>categroy</th>
                    <th>brand</th>
                    <th>controll</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="col">{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td><img src="{{asset('storage/image/'.$product->image)}}" style="width: 100px ; height:100px" alt="there is pic here"></td>
                        <td>{{$product->count}}</td>
                        <td>{{$product->category->name ?? 'N/A' }}</td>
                        <td>{{$product->brand->name ?? 'N/A' }}</td>
                        <td>
                            <a class="btn btn-success" href="{{route('products.edit' , $product->id)}}">Edit</a>
                            <form action="{{route('products.destroy' , $product->id)}}" method="post">
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
                    @include('pages.products.create')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    @endsection



@endif


