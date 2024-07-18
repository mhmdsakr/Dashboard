<form method="post" action="{{route('category.store')}}">

    @csrf
    <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" name="name" value="" class="form-control" id="exampleInputEmail1" placeholder="Add Category">
    </div>
    <br>

    <button type="submit" class="btn btn-primary">Add</button>
</form>
