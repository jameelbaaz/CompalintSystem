<?php

namespace App\Http\Controllers;
use App\Charts\SampleChart;
use Charts;

use App\Complaint;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }





    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $complaint=Complaint::all();
        $chart = new SampleChart;
        $complaints_all= $complaint->count();
        $complaints_completed =$complaint->where('completed','=',1)->count();
        // $yesterday_users = Complaint::whereDate('created_at', today()->subDays(1))->count();
        // $users_2_days_ago = Complaint::whereDate('created_at', today()->subDays(2))->count();
        // dd($complaints_completed);
        $chart->labels(['Complaints']);
        $chart->dataset('Current Complaints', 'bar', [ $complaints_all ])
        ->options([
            'backgroundColor' => 'red',
            ]);
            $chart->labels(['Complaints completed']);
        $chart->dataset('Complaints Completed', 'bar', [ $complaints_completed ])
        ->options([
            'backgroundColor' => 'blue',
        ]);
        // dd($complaints_completed);
        return view('home', ['chart' =>  $chart]);
    }
}
