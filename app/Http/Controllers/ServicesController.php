<?php

namespace App\Http\Controllers;


use App\Service;
use App\SubCategory;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function __construct(){
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ser.index')
        ->with('subcategory', SubCategory::first())->with('services', Service::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ser.create')
        ->with('subcategories', SubCategory::all());
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Service::create([
            'name' => $request->name,
            'subcat_id' => $request->sub_category_id,
        ]);

        session()->flash('success', 'Service Create Successfully');

        return redirect(route('services.index'));
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
    public function edit(Service $service)
    {
        
        return view('ser.create')
        ->with('subcategories',SubCategory::all())
        ->with('services', Service::first());
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $service->update([
            'name' => $request->name,
            'subcat_id' =>$request->sub_category_id,]);

            //Flash Message
           session()->flash('success','Services Updated Successfully');
           //Redirect
           return redirect(route('services.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
     
        $service->delete();
        
        session()->flash('success','Service Deleted Successfully');
        //Redirect
        return redirect(route('services.index'));
    }
}
