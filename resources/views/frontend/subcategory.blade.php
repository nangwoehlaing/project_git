@extends('master')
@section('contact')

	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Subcategory name :{{$item_subcategories->name}}</h1>
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container">

		<!-- Breadcrumb -->
		<nav aria-label="breadcrumb ">
		  	<ol class="breadcrumb bg-transparent">
		    	<li class="breadcrumb-item">
		    		<a href="{{ route('homepage') }}" class="text-decoration-none secondarycolor"> Home </a>
		    	</li>
		    	<li class="breadcrumb-item">
		    		<a href="{{ route('homepage') }}" class="text-decoration-none secondarycolor"> Category </a>
		    	</li>
		    	<li class="breadcrumb-item">
		    		<a href="{{ route('homepage') }}" class="text-decoration-none secondarycolor">{{$item_subcategories->category->name}}  </a>
		    	</li>
		    	<li class="breadcrumb-item active" aria-current="page">
					{{$item_subcategories->name}}
		    	</li>
		  	</ol>
		</nav>

		<div class="row mt-5">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<ul class="list-group">
					@foreach($categories as $key=>$category)
			 <li class="list-group-item category{{$key}}category_select  
				  	 @if($category->id == $item_subcategories->category_id)
              {{'active'}} @endif" data-array="{{$categories}}" data-key = "{{$key}}" data-id='{{$category->id}}' data-target="#collapse{{$key}}" data-auth="{{Auth::check()? Auth::user()->getRoleNames()[0]:'unknown'}}" data-toggle="collapse" aria-expanded="false" >

              <a href="javascript:void(0)" class="text-decoration-none secondarycolor" > 
                {{$category->name}}
              </a>
            </li>
				 @endforeach
				</ul>
			</div>	


			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">

				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
						 @foreach($item_subcategories->items as $item)
						<div class="card pad15 mb-3">
						  	<img src="{{asset($item->photo))}}" alt="...">
						  	
						  	<div class="card-body text-center">
						  		<a href="{{route('itemdetailpage',$item->id)}}" style="text-decoration: none; color: gray">
						    	<h5 class="card-title text-truncate">{{$item->name}}</h5>
						    	
						    	<p class="item-price">
		                        	<strike>{{$item->discount}} Ks </strike><span class="d-block">{{$item->price}} Ks</span>
		                        </p>

		                        <div class="star-rating">
									<ul class="list-inline">
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
									</ul>
								</div>

								 @if(Auth()->user())
                  <a href="javascript:void(0)" class="addtocartBtn text-decoration-none btn_add_to_cart" data-id = '{{$item->id}}' data-name = '{{$item->name}}' data-photo = '{{$item->photo}}' data-price= '{{$item->price}}' data-discount = '{{$item->discount}}' data-user_id = "{{Auth::id()}}">Add to Cart</a>
                  @else

                  <a href="{{route('loginpage')}}" class="btn btn-secondary btn-block mainfullbtncolor checkoutbtn buy_now"> 
                    Login To Check Out
                  </a>
                @endif
                </div>
            </div>
          </div>
          @endforeach

					 @endforeach
				</div>


				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-end">
					    <li class="page-item disabled">
					      	<a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="icofont-rounded-left"></i>
					      	</a>
					    </li>
					    <li class="page-item">
					    	<a class="page-link" href="#">1</a>
					    </li>
					    <li class="page-item active">
					    	<a class="page-link" href="#">2</a>
					    </li>
					    <li class="page-item">
					    	<a class="page-link" href="#">3</a>
					    </li>
					    <li class="page-item">
					      	<a class="page-link" href="#">
					      		<i class="icofont-rounded-right"></i>
					      	</a>
					    </li>
					</ul>
				</nav>
			</div>
		</div>

		
	</div>
	@endsection