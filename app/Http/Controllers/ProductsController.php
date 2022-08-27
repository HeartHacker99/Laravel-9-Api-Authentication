<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return Products::all();
    }

    public function create(Request $request)
    {
//                  Method One
//        return Products::create([
//            'name' => 'Product One',
//            'slug' => 'product-one',
//            'description' => 'This is Proudct One',
//            'price' => '99.99'
//        ]);

//                    Method Two Elequent
//        $product = new Products();
//        $product->name = 'Product Two';
//        $product->slug = 'product-two';
//        $product->description = 'Desctiption of Product Two';
//        $product->price = '199.99';
//        $product->save();
//        return '201: Product Created Successfully';
//

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required'
        ]);
//                        Method Three
        return Products::create($request->all());

    }

    public function show($id)
    {
        return Products::find($id);
    }

    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        $product->update($request->all());
        return $product;
    }

    public function destory($id)
    {
        return Products::destroy($id);
    }

    public function search($name)
    {
        return Products::where('name', 'like', '%'.$name.'%')->get();

    }
}
