<?php

namespace App\Http\Controllers;


use App\Http\Requests\subcategories\CreateSubcategoriesRequest;
use App\Http\Requests\subcategories\UpdateSubcategoriesRequest;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
    public function __construct()
    {
        $user= $this->middleware(['auth','admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subcategories.index')->with('subcategories', SubCategory::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subcategories.create')->with('categories' ,Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSubcategoriesRequest $request, Category $category)
    {
        
        SubCategory::create([
            'name' =>$request->name,
            'category_id' =>$request->category_id
        ]);
       

        session()->flash('success', 'Sub Category Created Successfully');

        return redirect(route('subcategories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( SubCategory $subcategory)
    {

        $categories= Category::all();
        return view('subcategories.create')
        ->with('subcategory', $subcategory)
        ->with('categories', $categories);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubcategoriesRequest $request,SubCategory $subcategory)
    {
        //
        
          $subcategory->update([
              'name' => $request->name,
              'category_id' =>$request->category_id,
    
          ]);
         
           //Flash Message
           session()->flash('success','Sub Category Updated Successfully');
           //Redirect
           return redirect(route('subcategories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();
        session()->flash('success','Category Deleted Successfully');
        //Redirect
        return redirect(route('subcategories.index'));
    }
}
