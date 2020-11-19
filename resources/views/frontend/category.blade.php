@extends('frontend.master')
@section('title','Danh Mục Sản Phẩm')
@section('main')
{{-- <link rel="stylesheet" href="css/category.css"> --}}
					<div id="wrap-inner">
						<div class="products">
							<h3>{{$cateName->category_name}}</h3>
						<div class="row product-list ">
								@foreach($items as $item)
								<div class="product-item col-md-3 col-sm-6 col-xs-12 ">
									<a href="#"><img height="150px" width="150px" src="{{asset('storage/'.$item->product_img)}}" class="img-thumbnail"></a>
									<p><a href="#">{{$item->product_name}}</a></p>
									<p class="price">{{number_format($item->product_price,0,',','.')}}đ</p>	  
									<div class="marsk">
										<p>	<a href="{{asset('detail/'.$item->product_id.'/'.$item->product_slug.'.html')}}">Xem chi tiết</a></p>
									</div>                                    
								</div>
									@endforeach   
							</div>             	                	
						</div>

						<div class="row text-center  "id="pagination">
							<div class="col-md-12 ">
							{{$items->links()}}
							</div>
						</div>
					</div>
@endsection
					
					<!-- end main -->
			