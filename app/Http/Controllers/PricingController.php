<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Pricing;

//Others
use Yajra\DataTables\DataTables;

//Requests
use App\Http\Requests\Pricing\StorePricingRequest; 

class PricingController extends Controller
{
    //
    public function index(Request $request) {
        $datas = Pricing::get(); 

        if($request->ajax()){ 
            return DataTables::of($datas)
                    ->addColumn('lec_price', function($data){
                        return '₱ '. $data->lec_price / 100; 
                    })
                    ->addColumn('lab_price', function($data){
                        return '₱ '. $data->lab_price / 100;
                    })
                    ->addColumn('discount', function($data){
                        return $data->discount.' %';
                    })
                    
                    ->make(true);
        }

        return view('pricing.index');
    }

    public function create(){ 
        return view('pricing.create');
    }

    public function store(StorePricingRequest $request) {
        $validated = $request->validated();

        $pricing = new Pricing; 

        $pricing->lec_price = $validated['lec_price'] * 100;
        $pricing->lab_price = $validated['lab_price'] * 100;
        $pricing->discount = $validated['discount'];
        $pricing->scheduled_date = $validated['scheduled_date'];

        $pricing->save(); 

        return redirect('pricings/create')->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Pricing successfully added',
        ]);
    }
}
