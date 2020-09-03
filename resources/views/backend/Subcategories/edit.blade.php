@extends('backendtemplate')
@section('page')
  <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Subcategory Edit Form</h1>
        </div>
              <div class="row">
              	<div class="col-md-12">
              		<form action="{{route('subcategories.update',$subcategory->id)}}" method="post" enctype="multipart/form-data">
              			@csrf
                    @method('PUT')
                        <div class="form-group row">
                                <label for="inputname" class="col-sm-2 col-form-label">Name</label>
                                 <div class="col-sm-10">
                                  <input type="nmae" class="form-control" id="inputname" name="name" value="{{$subcategory->name}}">
                                  <span class="text-danger">{{$errors->first('name')}}</span>
                             </div>
                  
                             </div>
                              <div class="form-group row">
                              <label for="inputcategory" class="col-sm-2 col-form-label" >Category</label>
                               <div class="col-sm-10">
                                <select class="form-control-md " id="inputCategory" name="category">
                                  <optgroup label="Choose Category">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                  </optgroup>
                                </select>
                                <span class="text-danger">{{$errors->first('category')}}</span>
                                
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


                         