<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
        $data = Product::find($id);
        $userId = Auth::user()->id;
        $characters = Character::where('user_id', $userId)->get();

        return view('order.index', [
            'product' => $data,
            'characters' => $characters
        ]);
    }

    public function show(){

        return view('order.details');
    }

    public function showOrders()
    {
        $userId = Auth::user()->id;
        $orders = User::find($userId)->orders;

        foreach($orders as $order){
            $productId['product_id'][] = $order->product_id;
        }

        foreach($productId as $id){
            $products = Product::find($id);
        }

        return view('user.orders', [
            'orders' => $orders,
            'products' => $products,
        ]);
    }

    public function updatesickles(Request $request){
        $user = Auth::user();

        $availableMoney = $user->sickles;
        $addSickles = $request->input('sickles');

        $user -> sickles = $availableMoney + $addSickles;
        $user -> save();

        return redirect() -> route('user.account')-> with('mssg', 'Congratulations, spend your money well!');
    }

    public function store(Request $request)
    {
        $product = Product::find($request->route('id'));
        $availableMoney = Auth::user()->sickles;
        $productPrice = $product->price;
        $availableTotal = $availableMoney - $productPrice;

        if(Auth::user()->sickles >= $productPrice){
            $user = Auth::user();
            $user -> sickles = $availableTotal;
            $user -> save();

            $order = Order::create([
                'user_id' => auth()->user()->id,
                'product_id' => $request->route('id')
            ]);
            return redirect()->route('order.show', ['id' => $order->id]);
        }else{
            return redirect()->route('order.error') -> with('mssg', 'You don´t have enough sickles!');
        }

    }
}
