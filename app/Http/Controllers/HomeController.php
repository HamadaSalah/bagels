<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Messages;
use App\Models\News;
use App\Models\Order;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = News::latest()->take(3)->get();
        $categories = Category::all();
        $sliders = Slider::all();
        $pop_products = Product::where('type', 'popular')->take(6)->get();
        $new_products = Product::where('type', 'new')->take(6)->get();
        return view('index', compact('sliders', 'pop_products', 'new_products', 'categories', 'news'));
    }
    public function about() {
        $about = About::first();
        return view('about', compact('about'));
    }
    public function contact() {
        return view('contact');
    }
    public function shop(Request $request) {
        if ($request->get('from') != null) {
            $from = number_format((float)$request->get('from') ,2, '.', '');
            $to = number_format((float)$request->get('to'),2, '.', '');
            $products = Product::whereBetween('price', [$from, $to])->paginate(9);
        }
        elseif ($request->get('cat') != null) {
            $products = Product::where('category_id', $request->get('cat'))->paginate(9);
        }
         else {
            $products = Product::paginate(9);
        }
        
        $cats = Category::all();
        return view('shop', compact('products', 'cats'));
    }
    public function SendMessage(Request $request) {
        $vlidation = $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $requestData = $request->except('_token');
        Messages::create($requestData);
        return redirect()->route('home')->with('success', 'Message Send Successfully');

    }

    ///ADD TO CART
    public function AddToCart($id) {
        $requestData['product_id'] = $id;
        $requestData['session_id'] = auth()->user()?->id ?? Session::getId();
        $check = Cart::where('session_id', $requestData['session_id'])->where('product_id', $id)->first();
        if ($check== null) {
            Cart::create($requestData);
        } else {
            $newcount = $check->count +1 ;
            $check->update([
                'count' => $newcount
            ]);
        }
        return redirect()->back();
    }
    public function deleteCart($id) {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect()->back();
    }
    public function cart() {
        if(isset(auth()->user()->id)) {
            $carts = Cart::where('session_id', auth()->user()->id)->get();
        }
        else {
            $carts = Cart::where('session_id', Session::getId())->get();
        }

        return view('cart', compact('carts'));
    }
    public function cartPlus($id) {
        $cart = Cart::where('product_id',$id)->first();
        $newcount = $cart->count +1 ;
        $cart->update([
            'count' => $newcount
        ]);
        return redirect()->back();
    }
    public function cartMin($id) {
        $cart = Cart::where('product_id',$id)->first();
        if ($cart->count == 1) {
            $cart->delete();
        } else {
            $newcount = $cart->count -1 ;
            $cart->update([
                'count' => $newcount
            ]);
        }
        
        return redirect()->back();
    }
    public function checkout(Request $request) {

        $requestData = $request->except('_token');

        Order::create([
            'user_id' => auth()->user()->id,
            'details' => $request->details,
            'address' => $request->address,
            'street' => $request->street,
        ]);

        $datas = Cart::where('session_id', auth()->user()->id)->get();

        foreach($datas as $data) {

            $data->delete();
            
        }
        return redirect()->route('home');

    }
    public function shop_single($id) {
        $product = Product::findOrFail($id);
        return view('shop_single', compact('product'));
    }
    public function post($id) {
        $product = Product::findOrFail($id);
        return view('single-post', compact('product'));
    }
    public function menu() {
        $products = Product::all();
        return view('products', compact('products'));
    }
    public function categories() {
        $cats = Category::with('products')->get();
        return view('categories', compact('cats'));
    }
}
