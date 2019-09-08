<?php

namespace App\Http\Controllers;

use App\Category;
use App\Complaint;
use App\Http\Requests\Complaints\CreateComplaintsRequest;
use App\Service;
use App\SubCategory;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ComplaintsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
     
        if(request()->query('search')){
            $search=request()->query('search');
            $complaint=Complaint::where('user_id', '=', auth()->user()->id)
            ->where('customer_name' ,'LIKE', "%{$search}%")->paginate(5);
           
        }else{
            $complaint=Complaint::where('user_id', '=', auth()->user()->id)
           ->paginate(5);
        }
    
        return view('complaints.index')
        ->with('subcategories',SubCategory::all())
        ->with('categories', Category::all())
        ->with('services', Service::all())
        ->with('complaints', $complaint);
           
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('complaints.create')
        ->with('categories', Category::all())
        ->with('subcategories',SubCategory::all())
        ->with('services', Service::all());
    

     
    
    
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateComplaintsRequest $request, Complaint $complaint)
    {
        
            $data= request()->all();

            $complaint = new Complaint();
            $complaint->user_id = auth()->user()->id;
            $complaint->category = $data['category'];
            $complaint->subcategory = $data['subcategory'];
            $complaint->service = $data['service'];
            $complaint->description = $data['description'];
            $complaint->customer_name =$data['customer_name'];
            $complaint->job_assign = $data['job_assign'];
            $complaint->date_completed = $data['date_completed'];


        $complaint->save();

            
        // $complaint =Complaint::create([
        //     'user_id' => auth()->user()->id,
        //     'category' => $request->category,
        //     'subcategory' =>$request->subcategory,
        //     'service'=>$request->service,
        //     'description' => $request->description,
        //     'customer_name' =>$request->customer_name,
        //     'job_assign' => $request->job_assign,
        //     'completed'=> $request->completed,
        //     'date_completed'=>$request->date_completed,
        //     ]);

      
        

        session()->flash('success', 'Complaint Added Successfully');

        return redirect(route('complaints.index'));
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
    public function edit(Complaint $complaint)
    {
         return view('complaints.create')
         ->with('complaint', $complaint) 
         ->with('subcategories',SubCategory::all())
        ->with('categories', Category::all())
        ->with('services', Service::all());
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateComplaintsRequest $request, Complaint $complaint)
    {
     

        $data= request()->all();

        $complaint =  Complaint::first();
        $complaint->user_id = auth()->user()->id;
        $complaint->category = $data['category'];
        $complaint->subcategory = $data['subcategory'];
        $complaint->service = $data['service'];
        $complaint->description = $data['description'];
        $complaint->customer_name =$data['customer_name'];
        $complaint->job_assign = $data['job_assign'];
        $complaint->completed = $data['completed'];
        $complaint->date_completed = $data['date_completed'];

        $complaint->save();

  

    session()->flash('success', 'Complaint Update Successfully');

    return redirect(route('complaints.index'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        $complaint->delete();
        
        session()->flash('success','Complaint Deleted Successfully');
        //Redirect
        return redirect(route('complaints.index'));
    }

 public function complete(Complaint $complaint )
 {
  $complaint->completed =true;
  
  $complaint->save();
  session()->flash('success', 'Complaint completed Successfully');

  return redirect(route('complaints.index'));


    
     }
}
