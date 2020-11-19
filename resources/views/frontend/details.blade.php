@extends('frontend.master')
@section('title','Chi Tiết Sản Phẩm')
@section('main')
	<link rel="stylesheet" href="css/details.css">
					<div id="wrap-inner">
						<div id="product-info">
							<div class="clearfix"></div>
							<h3>{{$item->product_name}}</h3>
							<div class="row">
								<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
									<img width="260px" height="260px"  src="{{asset('storage/'.$item->product_img)}}">
								</div>
								<div id="product-details" class="col-xs-12 col-sm-12 col-md-6 ml-5">
									<p>Giá: <span class="price">{{number_format($item->product_price,0,',','.')}}đ</span></p>
									<p>Bảo hành: {{$item->product_baohanh}} Tháng</p> 
									<p>Phụ kiện: {{$item->product_phukien}}</p>
									<p>Tình trạng: {{$item->product_tinhtrang}}</p>
									<p>Khuyến mại: {{$item->product_khuyenmai}}</p>
									<p>Còn hàng: @if ($item->product_trangthai==1) Còn Hàng @else Hết Hàng @endif</p>
									<p class="add-cart text-center"><a href="{{asset('cart/add/'.$item->product_id)}}">Đặt hàng online</a></p>
								</div>
							</div>							
						</div>
						<div id="product-detail">
							<h3>Chi tiết sản phẩm</h3>
						<p class="text-justify">{!!$item->product_mieuta!!}</p>
						</div>
						<div id="comment-list">
							@foreach($comments as $comment)
							<ul>
								<li class="com-title">
									{{$comment->comment_name}}
									<br>
									<span>{{date('d/m/y H:i',strtotime($comment->created_at))}}</span>	
								</li>
								<li class="com-details">
								{{$comment->comment_content}}
								</li>
							</ul>
							@endforeach
							
						
						</div>
						<div id="comment">
							<h3>Bình luận</h3>
							<div class="col-md-9 comment">
								<form method="post">
									<div class="form-group">
										<label for="email">Email:</label>
										<input required type="email" class="form-control" id="email" name="email">
									</div>
									<div class="form-group">
										<label for="name">Tên:</label>
										<input required type="text" class="form-control" id="name" name="name">
									</div>
									<div class="form-group">
										<label for="cm">Bình luận:</label>
										<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
									</div>
									<div class="form-group text-right">
										<button type="submit" class="btn btn-default">Gửi</button>
									</div>
									{{ csrf_field() }}
								</form>
							</div>
						</div>
						
					</div>					
					<!-- end main -->
@endsection			