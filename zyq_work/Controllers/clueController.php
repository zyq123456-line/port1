<?php


namespace App\Http\Controllers;


use App\Models\clue;
use Illuminate\Http\Request;
use Illuminate\View\View;


class clueController extends Controller
{

   public function createClue(Request $request){
       $er=clue::create($request::all);
       if(!$er->isEmpty()){
           return "ok";
       }
   }

   public function delectClue(Request $request)
   {
       $ty = $request->input('id');
       $er = clue::find($ty);
       if (!$er->isEmpty()) {
           $er->delete();
       }
   }

   public function updateClue(Request $request){
       $id=$request->input('id');
       $er=clue::find($id);
       if(!$er->isEmpty()){
           $er($request::all);
       }

   }

   public function selectClue(Request $request){
       $er=clue::where('customer',$request->input("customer"));
       if(!$er->isEmpty()){
           return $er;
       }

   }

   public function forAllclue(){
       $clue=clue::paginate(10);
       return View('e',
           ['list'=>$clue]
       );
   }

}
