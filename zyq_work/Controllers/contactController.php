<?php


namespace App\Http\Controllers;

class contactController extends Controller
{
    public function cratecontact(Request $request){
        $er=contact::create($request->all());
        $er=new crateBusiness_opportunities();
        $er->cooperation_company=$request->input('cooperation_company');
        $er->customer=$request->input('customer');
        $er->administrator_id=\Illuminate\Support\Facades\Cookie::get('id');
        $er->person_incharge=$request->input('person_incharge');
        $er->address=$request->input('address');
        $er->product=$request->input('product');
        $er->context=$request->input('context');
        $er->contract_income=$request->input('contract_income');
        $er->contract_date=$request->input('contract_date');
        $er->contact_information=$request->input('contact_information');
        $er->remarks=$request->input('remarks');
        $er->save();
        if(!$er.isEmpty()){
            return "ok";
        }
    }

    public function delectecontact(Request $request)
    {
        $ty = $request->input('id');
        $er = contact::find($ty);
        if (!$er->isEmpty()) {
            $er->delete();
        }
    }

    public function updatecontact(Request $request){
        $id=$request->input('id');
        $er=contact::find($id);
        if(!$er->isEmpty()){
            $er($request::all);
        }
    }
    public function  selectcontact(Request $request){
        $er=contact::where('customer',$request->input("customer"));
        if(!$er->isEmpty()){
            return $er;
        }

    }

    public function forAllcontact(){
        $clue=contact::paginate(10);
        return View('e',
            ['list'=>$clue]
        );
    }



}
