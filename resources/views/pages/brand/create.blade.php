<form method="post" action="{{route('brands.store')}}">

    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Brand Name</label>
      <input type="text" name="name" value="" class="form-control" id="exampleInputEmail1" placeholder="Add brand">
    </div>
    <br>

    <button type="submit" class="btn btn-primary">Add</button>
</form>
