@extends('backendtemplate')
@section('content')
  <div class="container-fluid">
  	<div class="row">
     <div class="col-md-12 mb-3"> 
      <h1 class="h3 mb-0 text-gray-800 d-inline-block">Order List</h1>
  </div>
</div>
<div class="row">
     <div class="col-md-12"> 
       <table class="table table-bordered">
          <thead class="thead-dark">
             <tr>
                <th>No</th>
                <th>Voucherno</th>
                <th>User</th>
                <th>Total</th>
                <th>Action</th>
             </tr>
         </thead>
             <tbody>
                      @php $i=1;  @endphp
                      @foreach($orders as $order)
                       <tr>
                         <td>{{$i++}}</td>
                         <td>{{$order->vouchrno}}</td>
                         <td>{{$order->user->name}}MMK</td>
                         <td>{{$order->total}}</td>
                         <td>
                         	<a href="{{ route('orders.show',$order->id) }}" class="btn btn-primary">Detail</a>
                          <a href="#" class="btn btn-success">Confirm</a>
                           <a href="#" class="btn btn-danger">Delete</a>
                         </td>
                     </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>
     </div>
</div>
@endsection