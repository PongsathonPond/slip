<?php

namespace App\Http\Controllers;

use App\Models\listall;
use App\Models\product;
use Illuminate\Http\Request;

class managerController extends Controller
{
    public function index()
    {

        $listall = listall::all();
        $products = product::all();
        $cartItems = \Cart::getContent();
        return view('page.manager', compact('products', 'cartItems', 'listall'));
    }

    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            ),
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('manager');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('manager');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('manager');
    }

    public function store(Request $request)
    {

        // $contents_arr = listall::create([
        //     'names' => $request->names,
        //     'lastname' => $request->lastname,
        //     'number' => $request->number,
        //     'total' => $request->total,
        //     'sum' => $request->sum,
        //     'listall' => [$request->listall],
        //     'cash' => [$request->cash],
        // ]);

        $addcal = new listall;
        $addcal->names = $request->names;
        $addcal->lastname = $request->lastname;
        $addcal->number = $request->number;
        $addcal->total = $request->total;
        $addcal->sum = $request->sum;
        $addcal->listall = [$request->listall];
        $addcal->cash = [$request->cash];

        $addcal->save();

        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อยรอการอนุมัติจาก Admin");
    }

}
