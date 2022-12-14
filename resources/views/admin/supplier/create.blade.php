@extends('admin.layout.master')

@section('content')
    <h2>Create Supplier</h2>
    <div>
        <a href="{{route('supplier.index')}}" class="btn btn-dark">All Supplier</a>
    </div>
    <hr>
    <form action="{{route('supplier.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Enter Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Enter Phone</label>
            <input type="number" name="phone" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Enter Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Enter Description</label>
            <textarea  name="description" class="form-control"></textarea>
        </div>
        <input type="submit" value="Create" class="btn btn-dark"/>
    </form>
@endsection