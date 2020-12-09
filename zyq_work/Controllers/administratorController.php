<?php


namespace App\Http\Controllers;


use App\Models\administrator;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class administratorController extends Controller
{
      public function administratorRegister(Request $request){
          $username = $request->input('username');
          $passowrd =$request->input('password');
          $er=administrator::where('username',$username);
          if(!$er->isEmpty()){
                if($er->password==$passowrd){
                    Cookie::queue('id',$er->id,'group',$er->group,'username',$er->username,'passowrd',$er->password,'administractor_name',$er->administractor_name,60);
                    return "ok";
                }else{
                    return "flash";
                }
          }else{
              return "flash";
          }
      }
}
