<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use DB;
class ProductController extends Controller
{
    //
    public function getProduct()
    {
        $data['productlist'] = DB::table('vp_product')->join('vp_categories','.vp_product.product_cate','=','vp_categories.category_id')->orderBy('product_id','desc')->get();
        return view('backend.product',$data);
    }
    public function getAddProduct()
    {
       $data['catelist'] = Category::all();
        return view('backend.addproduct',$data);
    }
    public function postAddProduct(AddProductRequest $request)
    {
        $filename = $request->product_img->getClientOriginalName();
        $product = new Product;
        $product->product_name = $request->name;
        $product->product_slug = Str::slug($request->name);
        $product->product_img = $filename;
        $product->product_price = $request->product_price;
        $product->product_baohanh = $request->product_baohanh;$product->product_khuyenmai = $request->product_khuyenmai;$product->product_tinhtrang = $request->product_tinhtrang;$product->product_phukien = $request->product_phukien;$product->product_trangthai = $request->product_trangthai;$product->product_mieuta = $request->product_mieuta;$product->product_cate = $request->product_cate;
        $product->product_dacbiet = $request->product_dacbiet;
        $product->save();
        $request->product_img->storeAs('public',$filename);
        return back();
    }
    public function getEditProduct($id)
    {
        $data['product'] = Product::find($id);
        $data['listcate']= Category::all();
        return view('backend.editproduct',$data);
    }
    public function postEditProduct(Request $request,$id)
    {
       $product = new Product;
       
        $arr['product_name'] = $request->product_name;
        $arr['product_slug'] = Str::slug($product->product_name);
        $arr['product_price'] = $request->product_price;
        $arr['product_baohanh'] = $request->product_baohanh;
        $arr['product_khuyenmai'] = $request->product_khuyenmai;
        $arr['product_phukien'] = $request->product_phukien;
        $arr['product_tinhtrang'] = $request->product_tinhtrang;
        $arr['product_trangthai'] = $request->product_trangthai;
        $arr['product_mieuta'] = $request->product_mieuta;
        $arr['product_cate'] = $request->product_cate;
        $arr['product_dacbiet'] = $request->product_dacbiet;
        if($request->hasfile('product_img')){
            $product_img = $request->product_img->getClientOriginalName();
                   $arr['product_img'] = $product_img;
            $request->product_img->storeAs('public',$product_img);
        }

        $product::where('product_id',$id)->update($arr);
        return redirect('admin/product');
    }
    public function getDeleteProduct($id)
    {
        Product::destroy($id);
        return back();
    }
}