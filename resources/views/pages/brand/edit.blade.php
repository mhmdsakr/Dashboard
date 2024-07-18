<form method="post" action="{{route('brands.update',$brand->id)}}">

    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="exampleInputEmail1">Brand Name</label>
      <input type="text" name="name" value="{{$brand->name}}" class="form-control" id="exampleInputEmail1">
    </div>
    <br>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
