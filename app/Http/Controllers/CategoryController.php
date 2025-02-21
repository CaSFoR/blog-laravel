<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function index(){

        $categories = Category::all();
        return view('master-dashboard.categories',compact('categories'));
    } 

    public function edit(Category $category) {
        return view('master-dashboard.category-edit',compact('category'));
    }
    public function store(Request $request, Category $category)
    {
        $customMessages = [
            'title.unique' => 'Category with the same name already exists.',
        ];
        $validatedData = $request->validate([
            'title' => 'required|string|max:50|unique:categories,title',
        ],$customMessages);
        
        // Capitalize the first letter of the category name
        $validatedData['title'] = ucfirst($validatedData['title']);
        
        $category->create($validatedData);

        return redirect()->back()->with('success', 'Category created successfully');
    }

    public function update(Request $request, Category $category) {
        $validatedData = $request->validate([
            'title' => 'required|string|max:10',
        ]);
    
        $category->update($validatedData);
    
        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }
    
        public function destroy(Category $category)
        {
            $category->delete();
    
            return redirect()->route('category.index')->with('success', 'Category deleted successfully');
        }
    
}