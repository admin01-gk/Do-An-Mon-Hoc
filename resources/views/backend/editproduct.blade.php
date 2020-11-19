@extends('backend.master')
@section('title','Sửa Sản Phẩm ')
@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Sửa sản phẩm</div>
					<div class="panel-body">
						<form  method="post" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Tên sản phẩm</label>
									<input required type="text" name="product_name" class="form-control" value="{{$product->product_name}}">
									</div>
									<div class="form-group" >
										<label>Giá sản phẩm</label>
										<input required type="number" name="product_price" class="form-control"value="{{$product->product_price}}">
									</div>
									<div class="form-group" >
										<label>Ảnh sản phẩm</label>
										<input id="img" type="file" name="product_img" class="form-control hidden" onchange="changeImg(this)">
					          <img id="avatar" class="thumbnail" height="150px" src="{{asset('storage/'.$product->product_img)}}">
									</div>
									<div class="form-group" >
										<label>Phụ kiện</label>
										<input required type="text" name="product_phukien" class="form-control" value="{{$product->product_phukien}}">
									</div>
									<div class="form-group" >
										<label>Bảo hành</label>
										<input required type="text" name="product_baohanh" class="form-control" value="{{$product->product_baohanh}}">
									</div>
									<div class="form-group" >
										<label>Khuyến mãi</label>
										<input required type="text" name="product_khuyenmai" class="form-control" value="{{$product->product_khuyenmai}}">
									</div>
									<div class="form-group" >
										<label>Tình trạng</label>
										<input required type="text" name="product_tinhtrang" class="form-control" value="{{$product->product_tinhtrang}}">
									</div>
									<div class="form-group" >
										<label>Trạng thái</label>
										<select required name="product_trangthai" class="form-control" value="{{$product->product_trangthai}}">
											<option value="1" @if($product->product_trangthai==1) checked @endif>Còn hàng</option>
											<option value="0"@if($product->product_trangthai==0) checked @endif>Hết hàng</option>
					                    </select>
									</div>
									<div class="form-group" >
										<label>Miêu tả</label>
										<textarea class='ckeditor' required name="product_mieuta" >{{$product->product_mieuta}}</textarea>
										<script type="text/javascript">
										var editor = CKEDITOR.replace('product_mieuta',{
											language:'vi',
											filebrowserImageBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Images',
											filebrowserFlashBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Flash',
											filebrowserImageUploadUrl: '../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
											filebrowserFlashUploadUrl: '../../editor/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
										});
									</script>
									</div>
									<div class="form-group" >
										<label>Danh mục</label>
										<select required name="product_cate" class="form-control">
											@foreach ($listcate as $cate)
											<option value="{{$cate->category_id}}" @if($product->product_cate == $cate->category_id)selected @endif>{{$cate->category_name}}</option>
											@endforeach
					          </select>
									</div>
									<div class="form-group" >
										<label>Sản phẩm nổi bật</label><br>
										Có: <input type="radio" name="product_dacbiet" value="1" @if($product->product_dacbiet == 1 ) selected   @endif>
										Không: <input type="radio" checked name="product_dacbiet" value="0" @if($product->product_dacbiet == 0 ) selected @endif>
									</div>
									<input type="submit" name="submit" value="Cập Nhật" class="btn btn-primary">
									<a href="#" class="btn btn-danger">Hủy bỏ</a>
								</div>
							</div>
							{{csrf_field()}}
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->


@endsection>
		
