<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:categories,name',
            'description' => 'required|string',
        ]); 
        $code = password_generator(4);
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'code' => "LCMC-".$code
        ];

        Category::create($data);
        activityLogger(auth()->user(), "Created new {$request->name} category");
        return redirect()->back()->with('msg', "New category created successfully");
    }

    public function delete(Request $request, string $id)
    {
        $categoryId = decrypt_data($id);
        $category = Category::find($categoryId);
        if(!$category) {
            return redirect()->back()->withErrors(["No category record found"]);
        }
        $category->delete();
        activityLogger(auth()->user(), "Deleted record for category {$category->name}");
        return redirect()->back()->with('msg', "Category deleted successfully.");
    }
    
}
