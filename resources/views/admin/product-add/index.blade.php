@extends('admin.layout.master')


@section('content')
<h2>All Product Purchase</h2>

<hr>

<table class="table table-striped">
    <thead>
        <th>Product Image</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Supplier</th>
        <th>Description</th>
    </thead>
    <tbody>
        @foreach($purchase as $d)
       <tr>
            <td>
                <img src="{{$d->product->image_url}}" width="100px" class="img-thumbnail" alt="">
            </td>
            <td>{{$d->product->name}}</td>
            <td><b class="badge badge-success">{{$d->total_quantity}}</b></td>
            <td>{{$d->supplier->name}}</td>
            <td>desc</td>
       </tr>
       @endforeach
    </tbody>
</table>

{{ $purchase->links() }}
@endsection