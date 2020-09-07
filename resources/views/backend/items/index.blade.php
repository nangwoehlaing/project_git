@extends('backendtemplate')
@section('content')
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
                           <a href="#" class="btn btn-outline-primary"><i class="fas fa-info"></i></a>
                            <a href="{{route('items.edit',$item->id)}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                           <form action="{{route('items.destroy',$item->id)}}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                               
                                <button class="btn btn-outline-danger "><i class="fas fa-trash"></i></button>
                            </form>
              </td>
            </tr>
            @endforeach
                     </tbody>
                   </thead>
               </table>
              </div>
           </div>

  

@endsection