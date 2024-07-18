<form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="name" style="font-weight: bold;">Product Name :</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
        <label for="price" style="font-weight: bold;">Price :</label>
        <input type="number" class="form-control" name="price">
    </div>
    <div class="form-group">
        <label for="count" style="font-weight: bold;">count :</label>
        <input type="number" class="form-control" name="count">
    </div>
    <div class="form-group">
        <label for="image" style="font-weight: bold;">image :</label>
        <input type="file"  name="image">
    </div>


    <div class="form-group">
        <label for="categroy" style="font-weight: bold;">categroy :</label>
        <select name="category" id="" class="form-control" >
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <label for="brand" style="font-weight: bold;"> brand :</label>
        <select name="brand" id="" class="form-control" >
            @foreach ($brands as $barnd)
                <option value="{{$barnd->id}}">{{$barnd->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="des" style="font-weight: bold;">description :</label>
        <textarea name="description" style="height: 100px;" class="form-control"></textarea>

    </div>
    <button type="submit" class="btn btn-success form-control">Add Product</button>
</form>
