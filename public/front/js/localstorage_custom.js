$(document).ready(function(){

	

	$.ajaxSetup({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
		}
	});
	showcart();
	cartnoti()
	$('.addtocartBtn').click(function(){
		var id = $(this).data('id');
		var name = $(this).data('name');
		var photo = $(this).data('photo');
		var price = $(this).data('price');
		var discount = $(this).data('discount');
		console.log(id);
		console.log(name);
		console.log(photo);
		console.log(price);
		console.log(discount);
		
		


		var cart = localStorage.getItem('cart');
		if(!cart){
			var mycart = new Array();
		}else{
			var mycart = JSON.parse(cart);
		}
		   var item = {
				id:id,
				name:name,
				photo:photo,
				price:price,
				discount:discount,
				qty:1
			};



		var hasid = false;
		$.each(mycart,function(i,v){
			if(v.id == id){
				hasid = true;
				v.qty++;
			}
		})
		if(!hasid){
			mycart.push(item);
		}
		// console.log(data);

		localStorage.setItem('cart', JSON.stringify(mycart));
		cartnoti();
		

	})


	function showcart()
	{

		var mycart = localStorage.getItem('cart');
		if(mycart)
		{
			var mycartobj = JSON.parse(mycart);
			var html='';
			var j=1;
			var total=0;
			var subtotal=0;
			
			$.each(mycartobj,function(i,v)
			{
				subtotal+=v.qty*v.price;
				total+=subtotal;
				html += `<tr>
							<td>
								<button class="btn btn-outline-danger remove btn-sm" style="border-radius: 50%"> 
									<i class="icofont-close-line"></i> 
								</button> 
							</td>
							<td> 
								<img src="${v.photo}" class="cartImg">						
							</td>
							<td>
							  <p> ${v.name}</P>
							</td>
							<td>
								<button class="btn btn-outline-secondary plus_btn" data-id=${i}> 
									<i class="icofont-plus"></i> 
								</button>
							</td>
							<td>
								<p> ${v.qty} </p>
							</td>
							<td>
								<button class="btn btn-outline-secondary minus_btn" data-id=${i}> 
									<i class="icofont-minus"></i>
								</button>
							</td>
							<td>
								<p class="text-danger"> 
									${v.price} Ks
								</p>
								<p class="font-weight-lighter"> 
								<del> ${v.discount} Ks </del> </p>
							</td>
							<td>
								${subtotal} Ks
							</td>	
							</tr>`;
			})
			html+=`<h3 class="text-right">Total:${total} Ks </h3>`
			$('#shoppingcart_table').html(html);
		}else{
			$('#shoppingcart_table').html('');
		}
	}

	



	//qty plus
	$('#shoppingcart_table').on('click','.plus_btn',function(){
		var id = $(this).data('id');
		var mycart = localStorage.getItem('cart');
		if(mycart)
		{
			var mycartobj = JSON.parse(mycart);
			$.each(mycartobj,function(i,v){
				if (i == id) {
					v.qty++;
				}
			})
			localStorage.setItem('cart',JSON.stringify(mycartobj));
			showcart();
			shownoti();
		}

	})


	// qty minus

	$('#shoppingcart_table').on('click','.minus_btn',function(){
		var id = $(this).data('id');
		var mycart = localStorage.getItem('cart');
		if(mycart)
		{
			var mycartobj = JSON.parse(mycart);
			$.each(mycartobj,function(i,v){
				if (i == id) {
					v.qty--;

					if(v.qty==0)
					{
						var ans = confirm("Are you sure to reduce?");
						if(ans){
							mycartobj.splice(id,1);
						}else{
							v.qty=1;
						}
					}

				}

			})
			localStorage.setItem('cart',JSON.stringify(mycartobj));
			showcart();
			shownoti();
		}
	})


	// delete data
	$('#shoppingcart_table').on('click','.remove',function(){
		var id = $(this).data('id');
		var mycart = localStorage.getItem('cart');
		if(mycart)
		{
			var mycartobj = JSON.parse(mycart);
			$.each(mycartobj,function(i,v){
				if (i == id) {
					var ans = confirm("Are you sure to reduce?");
					if(ans){
						mycartobj.splice(id,1);
					}

				}

			})
			localStorage.setItem('item',JSON.stringify(mycartobj));
			showcart();
			shownoti();
		}
	})

	// show count noti
	function cartnoti(){
		var mycart = localStorage.getItem('item');
		if(mycart){
			var noti = 0;
			var mycartobj = JSON.parse(mycart);
			$.each(mycartobj,function(i,v){
				noti+=v.qty;
			})
			$('.cartNoti').html(noti);
			
		}
	}

	//For But Now
	$('.buy_now').click(function(){
		var note=$('.note').val();
		//var total=$('.total').val();
		var mycart=localStorage.getItem('cart');
		if(mycart){
			//var shopArray =JSON.parse(shopString);
			$.post('/orders',{mycart:mycart,note:note},function(res){
				
					alert(res);
					localStorage.clear();
					showcart();
					
				
			})
		}
	})


});




