<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index()
    {
        $test = product::all();
        return view('page.product', compact('test'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'product' => 'required',
            'cash' => 'required',

        ],
            [
                'product.required' => "กรุณาป้อนรายการ",
                'cash.required' => "กรุณาป้อนราคา",

            ],

        );

        $add = new product;
        $add->product = $request->product;

        $add->cash = $request->cash;

        $add->save();
        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อยรอการอนุมัติจาก Admin");
    }

    public function delete($id)
    {

        //ลบข้อมูล
        $delete = product::find($id)->delete();
        return redirect()->back()->with('success', "ลบเรียบร้อยแล้ว");

    }

 

}
