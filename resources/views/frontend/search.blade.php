
@extends('frontend.master')
@section('title','Trang tìm kiếm')
@section('main')
	<link rel="stylesheet" href="css/search.css">


					<div id="wrap-inner">
						<div class="products">
							<h3>Tìm kiếm với từ khóa: <span>{{$keyword}}</span></h3>
							<div class="product-list row">
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

						{{-- <div class="row text-center  "id="pagination">
							<div class="col-md-12 ">
							{{$items->links()}}
							</div>
						</div> --}}
					</div>
@endsection
				