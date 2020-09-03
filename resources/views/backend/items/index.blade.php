@extends('backendtemplate')
@section('page')
  <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Item List</h1>
            <a href="{{route('items.create')}}" class="btn btn-info float-right">Add New</a>
          </div>
              <div class="row">
                <div class="col-md-12"> 
                  <table class="table table-bordered">
                   <thead class="thead-dark">
                     <tr>
                       <th>No</th>
                       <th>Code No</th>
                       <th>Name</th>
                       <th>Price</th>
                       <th>Actions</th>
                     </tr>
                     <tbody>
                      @php $i=1; @endphp
                      @foreach($items as $item)
                       <tr>
                         <td>{{$i++}}</td>
                         <td>{{$item->codeno}}</td>
                         <td>{{$item->name}}</td>
                         <td>{{$item->price}}MMK</td>
                         <td>
                           <a href="#" class="btn btn-primary">Detail</a>
                           <a href="{{route('items.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                           <a href="#" class="btn btn-danger">Delete</a>
                         </td>
                       </tr>
                       @endforeach
                     </tbody>
                   </thead>
               </table>
              </div>
           </div>

  

@endsection