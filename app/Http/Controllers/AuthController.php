<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\AddCart;

class AuthController extends Controller
{
    // ----open-login-page-view--
    
    public function login_view(){
        return view('auth.login');
    }

    // ----register-form----

    public function register_form(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        //save in user table
        User::create([
            'name' => $request->name,
            'password' => \Hash::make($request->password)
        ]);

        //login here
        if (\Auth::attempt($request->only('name','password'))) {
           return redirect('home');
        }

        //redirect to register if any error is founded
        return redirect('register')->withError('Error');
    }

    // ---login--form---

    public function login_form(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        //login here
        if (\Auth::attempt($request->only('name','password'))) {
            $a = \Auth::id();
            session()->put('user_id', $a);
           return redirect('home');
        }
        //redirect to register if any error is founded
        return redirect('login')->withError('login details are not matched');

    }

    // ----logout----

    public function logout()
    {
        \Session::flush();
        \Auth::logout();
        return redirect('login');
    }

    // ---home-view----

    public function home_view(){
        $data = Category::get();
        return view('home', compact('data'),
        ['images' => Product::simplePaginate(6)]);
    }

    // ---contact-view----
    
    public function contact_view(){
        $data1 = Category::get();
        return view('contact',compact('data1'));
    }

    // ---all-product-view----
    
    public function all_product()
    {
        $data1 = Category::get();
        return view('all_product', compact('data1'),
        ['images' => Product::get()]);
    }

    // ---if-user-have-error-----

    public function error()
    {
        return back()->withError('You need to login first');
    }

    // ----special-view---

    public function special_view()
    {
        $data1 = Category::get();
        return view('special', compact('data1'),
        ['images' => Product::where('special', 'LIKE','%'. '1' .'%')->get()]);
    }

    // --add-category-view---

    public function add_category(){
        return view('add_category');
    }

    // --add-category-form---

    public function add_category_form(Request $request)
    {
       $add = new Category;
        if ($request->isMethod('post')) {
            $add->category_name=$request->get('category_name');
            $add->save();
        }  
        return back();
    }

    // ---search_categogy---

    public function search_categogy($id)
    {
        $data1 = Category::get();
        $data = Category::find($id);
        $a=$data->category_name;
        return view('all_product',compact('data1'),['images' => Product::where('p_category', 'LIKE','%'. $a .'%')->get()]);
    }

    // --add-product-view---

    public function add_product()
    {
        $data = Category::SimplePaginate();
        return view('add_product', compact('data'));
    }

    // --add-product-form---

    public function add_product_form(Request $request)
    {
        $image = $request->p_image;
        $name = $image->getClientOriginalName();
        $image->storeAs('public/images',$name);

        $add = new Product;
        if ($request->isMethod('post')) {
            $special = (isset($_POST['special']) == '1' ? '1' : '0');
            $add->p_name=$request->get('p_name');
            $add->p_prize=$request->get('p_prize');
            $add->p_model=$request->get('p_model');
            $add->p_image= $name;
            $add->special= $special;
            $add->p_manufacturer=$request->get('p_manufacturer');
            $add->p_category=$request->get('p_category');
            $add->save();
        }  
        return redirect('all_products');
    }

    // ----add_to_cart_display-view-----

    public function add_to_cart_display($id)
    {
        $data = Category::get();
        $findrecord = Product::where('id',$id)->get();
        return view('add_to_cart_display', compact('findrecord','data'));

    }

    // ----add_to_cart_form---

    public function add_to_cart_form(Request $request)
    {
       if (session()->exists('user_id')) {
        $value = session()->get('user_id');
        }
       $add = new AddCart;
       if ($request->isMethod('post')) {
            $price = $request->get('product_price');
            $quantity = $request->get('quantity');
            $total_prize = $price*$quantity;
            $add->total_price=$total_prize;
            $add->product_id=$request->get('product_id');
            $add->user_id=$value;
            $add->quantity= $quantity;
            $add->save();
        } 
        return redirect('my_cart');
    }

    // -----display-my-cart-data---

    public function my_cart(){
        $id = session('user_id');
        $data = Category::get();
        $product = AddCart::where('user_id',$id)->with('user')->
        with('product')->get();
        return view('mycart', compact('data','product'));
    }
    
    // ---search_cart---

    public function search_cart($id)
    {

       // $a =Auth::get();
       // dd($a);
    }

    // ---delete_cart_record---

    public function delete_cart($id)
    {
        $ob = AddCart::find($id);
        $ob->delete();
        return redirect()->back()->with('status','cart deleted');
    }
    
}
