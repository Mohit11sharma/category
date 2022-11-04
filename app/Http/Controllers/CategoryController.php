<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {   
        $category= Category::where('parent_id', 0)->get();

        return view('products', compact('category'));
    }

    public function add_category(Request $request)
    {
        //dd($request->all());
        $category = new Category();
        if(isset($request->type) && $request->type == 'Category'){
            $category->parent_id = 0;  
        }
        if(isset($request->type) && $request->type == 'Sub Category'){
            $category->parent_id = $request->category;
        }
        if(isset($request->type) && $request->type == 'Sub Sub category'){
            $category->parent_id = $request->subcategory;
        }
        
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();

        return redirect()->back();

    }

    public function ajax_get(Request $request)
    {
        $html = '<option value="">Select sub category</option>';
        $datas = Category::where('parent_id',$request->subcat)->get();
        foreach($datas as $data){
            $html .= '<option value="'.$data->id.'">'.$data->name.'</option>';
        }
        return $html;
    }
}
