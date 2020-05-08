<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;

class ProductController extends Controller
{
    public function index(){

        $tbl_product = DB::table('products')->get();

        return view('product.index', compact('tbl_product'));
    }

    public function create(){

        return view('product.create');
    }

    public function insert(Request $request){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['details'] = $request->details;

        $image = $request->file('logo');
        if($image){
            $upload_date = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_name = $upload_date.'.'.$ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_name;
            $success = $image->move($upload_path, $image_name);

            $data['logo'] = $image_url;
            $tbl_product = DB::table('products')->insert($data);

            return redirect()->route('product.index')
                                ->with('success', 'Product added successfully.'); 
        }

    }

    public function edit($id){
        $tbl_product = DB::table('products')->where('id', $id)->first();
        return view('product.edit', compact('tbl_product'));
    }

    public function update(Request $request, $id){

        $current_logo = $request->old_logo;

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['details'] = $request->details;

        $image = $request->file('logo');
        if($image){
            unlink($current_logo);
            $upload_date = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_name = $upload_date.'.'.$ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_name;
            $success = $image->move($upload_path, $image_name);

            $data['logo'] = $image_url;
            $tbl_product = DB::table('products')->where('id', $id)->update($data);

            return redirect()->route('product.index')
                                ->with('success', 'Product updated successfully.'); 
        }

    }

    public function delete($id){
        $data = DB::table('products')->where('id', $id)->first();
        $image = $data->logo;
        unlink($image);

        $tbl_product = DB::table('products')->where('id', $id)->delete();

        return redirect()->route('product.index')
                                ->with('success', 'Product deleted successfully.');

    }

    public function view($id){
        $tbl_product = DB::table('products')->where('id', $id)->first();
        return view('product.show', compact('tbl_product'));
    }


}
