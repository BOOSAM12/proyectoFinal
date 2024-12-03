<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryView(){
        $categorys = Category::all();
        return view('category', compact('categorys'));
    }
    public function createCategory(Request $request){
        $validate = $request->validate(
            [
                'name' => 'required'
            ]
        );
        Category::create($validate);
        return redirect()->route('category')->with('success', 'Categoría creada correctamente');
    }
    public function updateCategoryView($id){
        $category = Category::find($id);
        return view('editCategory', compact('category'));
    }
    public function updateCategory(Request $request, $id){
        $validate = $request->validate(
            [
                'name' => 'required'
            ]
        );
        
        Category::find($id)->update($validate);
        return redirect()->route('category')->with('success', 'Categoría actualizada correctamente');
    }
    public function deleteCategory($id){
        Category::find($id)->delete();
        return redirect()->route('category')->with('success', 'Categoría eliminada correctamente');
    }
}
