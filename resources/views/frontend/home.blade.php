@extends('frontend.master')
@section('title','Trang chủ')
@section('main')
			<div id="wrap-inner ">
						<div class="products ">
							<h3>sản phẩm nổi bật</h3>
							<div class="row product-list ">
								@foreach($product_dacbiet as $item)
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

						<div class="products">
							<h3>sản phẩm mới</h3>
							<div class="product-list row">
							@foreach($product_news as $item)
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
					</div>
@endsection
				
					
					<!-- end main -->
			