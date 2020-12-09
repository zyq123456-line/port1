<?php


namespace App\Http\Controllers;


use App\Models\business_opportunities;

class business_opportunitiesCotroller extends Controller
{
    public function crateBusiness_opportunities(Request $request){


            $er=crateBusiness_opportunities::create($request->all());
            $er=new crateBusiness_opportunities();
            $er->theme=$request->input('theme');
            $er->customer=$request->input('customer');
            $er->administrator_id=\Illuminate\Support\Facades\Cookie::get('id');
            $er->income=$request->input('income');
            $er->expect_date=$request->input('expect_date');
            $er->clinch_percentage=$request->input('clinch_percentage');
            $er->expect_product=$request->input('expect_product');
            $er->opportanity_progress=$request->input('opportanity_progress');
            $er->record=$request->input('record');
            $er->state=$request->input('state');
            $er->remarks=$request->input('remarks');
            $er->save();
            if(!$er.isEmpty()){
                return "ok";
            }
    }

    public function delecteBusiness_opportunities(Request $request)
    {
        $ty = $request->input('id');
        $er = Business_opportunities::find($ty);
        if (!$er->isEmpty()) {
            $er->delete();
        }
    }

    public function updateBusiness_opportunities(Request $request){
        $id=$request->input('id');
        $er=Business_opportunities::find($id);
        if(!$er->isEmpty()){
            $er($request::all);
        }
    }
    public function  selectBusiness_opportunities(Request $request){
        $er=Business_opportunities::where('customer',$request->input("customer"));
        if(!$er->isEmpty()){
            return $er;
        }

    }

    public function forAllBusiness_opportunities(){
        $clue=Business_opportunities::paginate(10);
        return View('e',
            ['list'=>$clue]
        );
    }


}
