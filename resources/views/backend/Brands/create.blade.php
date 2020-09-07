@extends('backendtemplate')
@section('content')
  <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Brand Create Form</h1>
        </div>
              <div class="row">
              	<div class="col-md-12">
              		<form action="{{route('brands.store')}}" method="post" enctype="multipart/form-data">
              			@csrf
                        <div class="form-group row">
                                <label for="inputname" class="col-sm-2 col-form-label">Name</label>
                                 <div class="col-sm-10">
                                  <input type="nmae" class="form-control" id="inputname" name="name">
                                  <span class="text-danger">{{$errors->first('name')}}</span>
                             </div>
                  
                             </div>
                             <div class="form-group row">
                                <label for="inputphoto" class="col-sm-2 col-form-label">Photo</label>
                                 <div class="col-sm-10">
                                  <input type="file" class="file" id="inputphoto" name="photo">
                                  <span class="text-danger">{{$errors->first('photo')}}</span>
                             </div>
                             </div>

                             

                               <div class="form-group row">
                               <div class="col-sm-10">
                               <button type="create" class="btn btn-primary" name="btnsubmit" value="Create">Create</button>
                             </div>
                            </div>
                           </form>
                         </div>
                       </div>
                       @endsection


                         