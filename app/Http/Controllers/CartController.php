<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use Mail;

class CartController extends Controller
{
    public function getAddCart($id)
    {
        $product = Product::find($id);
        Cart::add(['id'=>$id,'name'=>$product->product_name,'quantity'=> 1,'price'=>$product->product_price,'attributes'=>['img'=>$product->product_img]]);
       return redirect('cart/show');
               
               
    }
    public function getShowCart()
    {   $data['total'] = Cart::getTotal();
        $data['items'] = Cart::getcontent();
        return view('frontend.cart',$data);
    }
    public function getDeleteCart($id)
    {
        if($id=='all'){
        Cart::clear($id);
         
        }else{
            Cart::remove($id);
        }
        return back();
    }
    public function getUpdateCart(Request $request)
    {
        Cart::update($request->id, array(
            'quantity' => array(
            'relative' => false,
            'value' => $request->quantity
            ), 
        ));
    }
    public function postComplete(Request $request)
    {
       $data['info'] = $request->all();
       $email= $request->email; 
       $data['cart'] = Cart::getcontent();
       $data['total'] = Cart::getTotal();
       
    //    dd($data['cart']['53']);
       Mail::send('frontend.email', $data, function ($message) use($email) {
           $message->from('truongsadng.nishu@gmail.com', 'Ngo Truong Sa');
           $message->to($email, $email);         
           $message->subject('Xác Nhận Mua Hàng Từ MediaShop');
        });
        Cart::clear();

        return redirect('complete');
      
    }
    public function getComplete()
    {
        return view('frontend.complete');
    }
}