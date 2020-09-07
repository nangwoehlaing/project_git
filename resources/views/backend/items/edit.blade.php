@extends('backendtemplate')
@section('content')
  <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Item Edit Form</h1>
        </div>
              <div class="row">
              	<div class="col-md-12">
              		<form action="{{route('items.update',$item->id)}}" method="post" enctype="multipart/form-data">
              			@csrf
              			@method('PUT')
                       <div class="form-group row">
                          <label for="inputcodeno " class="col-sm-2 col-form-label">Code No</label>
                              <div class="col-sm-10">
                                <input type="codeno" class="form-control" id="inputcodeno" name="codeno" value="{{$item->codeno}}" readonly="readonly">
                                <span class="text-danger">{{$errors->first('codeno')}}</span>
                              </div>
                               </div>
                              <div class="form-group row">
                                <label for="inputname" class="col-sm-2 col-form-label">Name</label>
                                 <div class="col-sm-10">
                                  <input type="nmae" class="form-control" id="inputname" name="name" value="{{$item->name}}">
                                  <span class="text-danger">{{$errors->first('name')}}</span>
                             </div>
              		
              	             </div>
              	             <div class="form-group row">
                                <label for="inputphoto" class="col-sm-2 col-form-label">Photo</label>
                                 <div class="col-sm-10">
                                  <input type="file" class="file" id="inputphoto" name="photo" >
                                  <img src="{{asset($item->photo)}}" class="img-fluid w-5">
                                  <input type="hidden" name="oldphoto" value="{{$item->photo}}">
                                  <span class="text-danger">{{$errors->first('photo')}}</span>
                             </div>
              		
              	             </div>

              	          <div class="form-group row">
                                <label for="inputprice" class="col-sm-2 col-form-label">Price</label>
                                 <div class="col-sm-10">
                                  <input type="price" class="form-control" id="inputprice" name="price" value="{{$item->price}}" >
                                  <span class="text-danger">{{$errors->first('price')}}</span>
                             </div>
              		
              	            </div>
              	            
              	            <div class="form-group row">
                                <label for="inputdiscount" class="col-sm-2 col-form-label">Discount</label>
                                 <div class="col-sm-10">
                                  <input type="number" class="form-control" id="inputdiscount" name="discount" value="{{$item->discount}}">
                                  <span class="text-danger">{{$errors->first('discount')}}</span>
                             </div>
              		
              	            </div>

              	            <div class="form-group row">
                                <label for="inputdescription" class="col-sm-2 col-form-label" >Description</label>
                                 <div class="col-sm-10">
                                  <textarea class="form-control" id="description" name="description"> {{$item->description}}</textarea><span class="text-danger">{{$errors->first('description')}}</span>
                             </div>
              		
              	            </div>
                                 
                            <div class="form-group row">
                            	<label for="inputbrand" class="col-sm-2 col-form-label" >Brand</label>
                               <div class="col-sm-10">
                               	<select class="form-control-md " id="inputBrand" name="brand">
                               		<optgroup label="Choose Brand">
                               			@foreach($brands as $brand)
                               			<option value="{{$brand->id}}">{{$brand->name}}</option>
                               			@endforeach
                               		</optgroup>
                               	</select>
                               	<span class="text-danger">{{$errors->first('brand')}}</span>
                               	
                               	</div>
                               </div>


                               	   <div class="form-group row">
                               	   	<label for="inputsubcategory" class="col-sm-2 col-form-label" >Subcategory</label>
                               <div class="col-sm-10">
                               	<select class="form-control-md " id="inputSubcategory" name="subcategory">
                               		<optgroup label="Choose Subcategory">
                               			@foreach($subcategories as $subcategory)
                               			<option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                               			@endforeach
                               		</optgroup>
                               	</select>
                               	<span class="text-danger">{{$errors->first('subcategory')}}</span>

                              
                             </div>
                            </div>





              	            <div class="form-group row">
                               <div class="col-sm-10">
                               <button type="update" class="btn btn-danger" name="btnsubmit" value="Update">Update</button>
                             </div>
                            </div>
                        </form>
              </div>
           </div>
  

@endsection