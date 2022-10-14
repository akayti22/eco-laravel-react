@extends('admin.layout.master')


@section('content')
<h2>All Product</h2>

<div>
    <a href="{{route('product.create')}}" class="btn btn-dark">Create New</a>
</div>
<hr>
<table class="table table-striped">
    <thead>
        <th>Name</th>
        <th>Phone</th>
        <th>Image</th>
        <th>Description</th>
        <th>Option</th>
    </thead>
    <tbody>
        @foreach($product as $d)
        <tr>
            <td>{{$d->name}}</td>
            <td><img src="{{asset('image/'.$d->image)}}" width="50px" class="img-thumbnail"/></td>
            <td>{{$d->total_quantity}}</td> 
            <td>{{$d->sell_price}}</td>
            <td>{{$d->buy_price}}</td>
            <td>
                <a href="{{route('product.edit',$d->id)}}" class="btn btn-primary">
                    <i class="fa fa-edit"></i>
                </a>
                <form method="POST" action="{{route('product.destroy',$d->id)}}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                    |
                    <a href="" class="btn btn-outline-success">Add Product</a>
                    <a href="" class="btn btn-outline-danger">Remove Product</a>

                </form>
            </td>           
        </tr>
        @endforeach
    </tbody>
</table>
{{ $product->links() }}

@endsection