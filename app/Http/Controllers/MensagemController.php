<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mensagem;
use App\Events\MensagemEvent;
use App\User;

class MensagemController extends Controller
{
  public function index(Request $request){
       if($request->getMethod() == 'GET'){
           return view('form');
       }
       if($request->getMethod() == 'POST'){
           $data = $request->all();
           $m = new Mensagem($data);
           $m->save();
           $e = new MensagemEvent($m);
           event($e);
           return ['success'=>true];
       }
   }
}
