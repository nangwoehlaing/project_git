@extends('backendtemplate')
@section('content')
  <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category Edit Form</h1>
        </div>
              <div class="row">
              	<div class="col-md-12">
              		<form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
              			@csrf
                    @method('PUT')
                        <div class="form-group row">
                                <label for="inputname" class="col-sm-2 col-form-label">Name</label>
                                 <div class="col-sm-10">
                                  <input type="nmae" class="form-control" id="inputname" name="name" value="{{$category->name}}">
                                  <span class="text-danger">{{$errors->first('name')}}</span>
                             </div>
                  
                             </div>
                             <div class="form-group row">
                                <label for="inputphoto" class="col-sm-2 col-form-label">Photo</label>
                                 <div class="col-sm-10">
                                  <input type="file" class="file" id="inputphoto" name="photo">
                                   <img src="{{asset($category->photo)}}" class="img-fluid w-5">
                                  <input type="hidden" name="oldphoto" value="{{$category->photo}}">
                                  
                                  <span class="text-danger">{{$errors->first('photo')}}</span>
                             </div>
                             </div>

                             

                               <div class="form-group row">
                               <div class="col-sm-10">
                               <button type="update" class="btn btn-primary" name="btnsubmit" value="Update">Update</button>
                             </div>
                            </div>
                           </form>
                         </div>
                       </div>
                       @endsection


                         