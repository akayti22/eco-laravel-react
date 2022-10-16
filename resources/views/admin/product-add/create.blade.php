@extends('admin.layout.master')

@section('content')
    <h2>@if($action == 'add')
            Add Product
        @elseif($action == 'reduce')
            Remove Product
        @endif
        (Purchase Product) <b class="text-danger">{{$product_name}}</b></h2>
    <div>
        <a href="{{route('product-add.index')}}" class="btn btn-dark">All Transition</a>
    </div>
    <hr>
    <form action="{{route('product-add.store').'?pid='.request()->pid . '&action=' . $action}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">choose supplier</label>
            <select name="supplier_id" class="form-control">
                @foreach($supplier as $d)
                <option value="{{$d->id}}">{{$d->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Enter Quabtity</label>
            <input type="number" name="total_quantity" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="">Enter Description</label>
            <textarea  name="description" class="form-control"></textarea>
        </div>
        <input type="submit" value="@if($action == 'add')Add @elseif($action == 'reduce')Remove @endif" class="btn btn-dark"/>
    </form>
@endsection