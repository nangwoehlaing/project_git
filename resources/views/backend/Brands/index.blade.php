@extends('backendtemplate')
@section('content')
  <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Brand List</h1>
            <a href="{{route('brands.create')}}" class="btn btn-info float-right">Add New</a>
          </div>
              <div class="row">
                <div class="col-md-12"> 
                  <table class="table table-bordered">
                   <thead class="thead-dark">
                     <tr>
                       <th>No</th>
                       <th>Name</th>
                       <th>Photo</th>
                        <th>Actions</th>
                     </tr>
                   </thead>
                     <tbody>
                      @php $i=1; @endphp
                      @foreach($brands as $brand)
                       <tr>
                         <td>{{$i++}}</td>
                         <td>{{$brand->name}}</td>
                         <td><img src='{{$brand->photo}}' width=120 height=100></td>
                         <td>
                           <a href="{{route('brands.edit',$brand->id)}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>

                             <form action="{{route('items.destroy',$brand->id)}}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger "><i class="fas fa-trash"></i></button>
                            </form>
                        </td>            

                    </tr>
                    @endforeach
                     </tbody>
                   
               </table>
              </div>
           </div>
</div>

  

@endsection