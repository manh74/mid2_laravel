<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductType;
use App\Slide;
use App\Cart;
use App\Bill;
use App\BillDetail;
use App\Customer;
use App\User;
use App\Message;
use Session;
use Illuminate\Http\Request;
use Hash;
use Auth;
use phpDocumentor\Reflection\Types\Boolean;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

class PageController extends Controller
{

    public function getIndex(){
        $slide = Slide::all();
        $productNew = Product::where('new', 1)->paginate(8);
        $productTop = Product::where('new', 0)->paginate(8);
        return view('page.trangchu',compact('slide','productNew','productTop'));
    }

    public function getTypeProduct($type){
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id',$type)->first();
    	return view('page.loaisanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }

    public function getChitiet(Request $req){
        $sanpham = Product::where('id',$req->id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(6);
        $productNew = Product::where('new', 1)->paginate(4);
        $productTop = Product::where('new', 0)->paginate(4);
    	return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu','productNew','productTop'));
    }

    public function getLienHe(){
    	return view('page.lienhe');
    }

    public function getGioiThieu(){
    	return view('page.gioithieu');
    }

    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $request->session()->put('cart',$cart);
    	return redirect()->back();
    }

    public function getDelItemCart(Request $request, $id){
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            $request->session()->put('cart',$cart);
        } else{
            $request->session()->forget('cart');
        }

    	return redirect()->back();
    }


    public function getCheckout(){
        if(Session::has('login')){
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            return view('page.dat_hang')->with(['cart'=>Session::get('cart'),
            'product_cart'=>$cart->items,'totalQty'=>$cart->totalQty,'totalPrice'=>$cart->totalPrice]);
        } else {
            return redirect()->back()->with('alert','Xin lỗi! Bạn phải đăng nhập trước khi thực hiện đặt hàng..');
        }

    }

    public function postCheckout(Request $req){
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect('/index')->with('alert','Đặt hàng thành công');

    }

    public function getLogin(){
    	return view('page.dangnhap');
    }

    public function getSignup(){
    	return view('page.dangki');
    }

    public function postSignup(Request $req){

        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự'
            ]);
        $user = new User();
        $user->name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect('index')->with('alert','Tạo tài khoản thành công');
    }

    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 20 kí tự'
            ]
        );
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        $user = User::where([
                ['email','=',$req->email],
                ['password','=',Hash::make($req->password)]
            ]);

        if($user){
            if(Auth::attempt($credentials)){
            Session::put('login', 'true');
            Session::put('name', $credentials['email']);
            return redirect('/index')->with(['flag'=>'success','alert'=>'Đăng nhập thành công']);
            }
            else{
                return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
            }
        }
        else{
           return redirect()->back()->with(['flag'=>'danger','message'=>'Tài khoản chưa kích hoạt']);
        }

    }
    public function postLogout(){
        Auth::logout();
        Session::forget('login');
        return redirect()->route('trang-chu')->with(['flag'=>'success','alert'=>'Đăng xuất thành công']);
    }

    public function getSendMessage(Request $req){
        $message = new Message;
        $message->title = $req->title;
        $message->content = $req->content;
        $message->save();
        Session::flash('success', 'Bạn đã gửi tin nhắn thành công');
        return redirect()->route('trang-chu');
    }

    public function getAdmin(){
        if(Session::has('login')){
            // $data = DB::table('bills')
            // ->join('customer', 'customer.id', '=', 'bills.id_customer')
            // ->select('customer.name', 'customer.address', 'bills.date_order', 'bills.total','bills.payment')
            // ->get();
            $data = DB::table(DB::raw('bill_detail bd, bills b, products prd, customer cus'))
            ->select(DB::raw('cus.name', 'cus.address', 'b.date_order', 'b.total','b.payment'))
            ->where('bills.id', '=', 'bill_detail.id_bill')
            ->where('products.id', '=', 'bill_detail.id_product')
            ->where('customer.id', '=', 'bill_detail.id_product')
            ->orderBy('bills.date_order', 'desc')
            ->get();
            return view('page.admin', compact('data'));
        } else {
            return redirect()->back()->with('alert','Xin lỗi tính năng này đang được cập nhật!');
        }

    }


}
