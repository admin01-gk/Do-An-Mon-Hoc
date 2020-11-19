<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;

class FrontendController extends Controller
{
   public function gethome()
   {
       $data['product_dacbiet'] = Product::Where('product_dacbiet',1)->orderBy('product_id','desc')->take(8)->get();
       $data['product_news'] = Product::orderBy('product_id','desc')->take(8)->get();
       return view('frontend.home',$data);
       
   } 
   public function getDetail($id)
   {
       $data['item'] = Product::find($id) ;
       $data['comments'] = Comment::where('comment_product',$id)->get();
      return view('frontend.details',$data);
   }
   public function getCategory($id)
   {
      $data['cateName'] = Category::find($id);
      $data['items'] = Product::where('product_cate',$id)->orderBy('product_id','desc')->paginate(4);
      return view('frontend.category',$data);
   }
   public function postComment(Request $request,$id)
   {
       $comment = New Comment;
       $comment->comment_name= $request->name;
       $comment->comment_email= $request->email;
       $comment->comment_content= $request->content;
       $comment->comment_product = $id;
       $comment->save();
       return back();
   }
   public function getSearch(Request $request)
   {
      $result = $request->result;
      $data['keyword'] = $result;
      $result = str_replace('','%', $result);
      $data['items'] = Product::where('product_name','like','%'.$result.'%')->get();
      return view('frontend.search',$data) ; 
   }
}