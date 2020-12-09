<?php


namespace App\Http\Controllers;


use App\Models\clue;
use App\Models\customers;
use http\Cookie;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use function PHPUnit\Framework\isEmpty;

class customersController extends Controller
{
     public function crateCustomers(Request $request){
         DB::beginTransaction();
         try{
             $er=customers::create($request->all());
             $er=new customers();
             $er->remarks=$request->input('remarks');
             $er->customer=$request->input('customer');
             $er->administrator_name=\Illuminate\Support\Facades\Cookie::get('administrator_name');
             $er->contact=$request->input('contact');
             $er->telephone=$request->input('telephone');
             $er->company_type=$request->input('company_type');
             $er->scale=$request->input('scale');
             $er->scource=$request->input('scource');
             $er->save();
             if(!$er.isEmpty()){
                 $er2=clue::where("customer",$request->input('customer'));
                 $er2->delete();
                 DB::commit();
                 return "ok";
             }
         }catch (Exception $e){
             DB::rollback();
             throw $e;
         }
     }

    public function delecteCustomers(Request $request)
    {
        $ty = $request->input('id');
        $er = customers::find($ty);
        if (!$er->isEmpty()) {
            $er->delete();
        }
    }

    public function updateCustomers(Request $request){
        $id=$request->input('id');
        $er=customers::find($id);
        if(!$er->isEmpty()){
            $er($request::all);
        }
    }
    public function  selectClue(Request $request){
        $er=customers::where('customer',$request->input("customer"));
        if(!$er->isEmpty()){
            return $er;
        }

    }

    public function forAllclue(){
        $clue=customers::paginate(10);
        return View('e',
            ['list'=>$clue]
        );
    }
}
