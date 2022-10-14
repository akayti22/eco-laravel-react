@extends('admin.layout.master')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
    
@section('content')
<div>
    <h3>Create Product</h3>
    <a href="{{route('product.index')}}" class="btn btn-dark">All product</a>
</div>

<hr>

<form action="{{route('product.store')}}" enctype="multipart/form-data" method="POST">
@csrf
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <h3>Product Info</h3>
                <div class="form-group">
                    <label for="">Enter Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Enter Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Enter Description</label>
                    <textarea id="description" name="description"></textarea>
                </div>
            </div>
        </div>
    
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="">Enter Buy Price</label>
                <input type="number" class="form-control" name="buy_price">
            </div>
            <div class="form-group">
                <label for="">Enter Sell Price</label>
                <input type="number" class="form-control" name="sale_price">
            </div>
            <div class="form-group">
                <label for="">Enter Discount Price</label>
                <input type="number" class="form-control" name="discount_price">
            </div>
            <div class="form-group">
                <label for="">Enter Total Quantity</label>
                <input type="number" class="form-control" name="total_quantity">
            </div>
        </div>
    </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Choose supplier</label>
                    <select name="supplier_id" id="supplier" class="form-control">
                        @foreach($supplier as $d)
                            <option value="{{$d->id}}">{{$d->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Choose brand</label>
                    <select name="brand_id" id="brand" class="form-control">
                        @foreach($brand as $d)
                            <option value="{{$d->id}}">{{$d->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Choose Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($category as $d)
                            <option value="{{$d->id}}">{{$d->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Choose Color</label>
                    <select name="color_id[]" multiple id="color" class="form-control">
                        @foreach($color as $d)
                            <option value="{{$d->id}}">{{$d->name}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" value="Create" class="btn btn-dark">
            </div>
        </div>
    </div>
</div>
</form>

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $(function(){
            $('#description').summernote();
        })
    </script>
@endsection