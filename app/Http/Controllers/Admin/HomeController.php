<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Visitor;
use App\Models\Ponto;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
  }

    public function index(){

    $visitsCount = 0;
    $onlineCount = 0;
    $pageCount = 0;
    $userCount = 0;    

    //Contagem de Visitantes
    $visitsCount = Visitor::count();

      //Contagem de Usuarios Online
    
      $datelimit = date('Y-m-d H:i:s', strtotime('-5 minutes'));
      
  
    //Contagem para o PagePie
    $pagePie = [];    
    $visitsAll = Visitor::selectRaw('page, count(page) as c')->groupBy('page')->get();
    foreach($visitsAll as $visit){
        $pagePie[$visit['page']] =intval($visit['c']);
    }



    //Contagem de Páginas
    $pontoCount = Ponto::count();


    //Contagem de Usuarios 
      $userCount = User::count();
      


    return view('admin.home', [

        'visitsCount' => $visitsCount,
        'onlineCount' => $onlineCount,
        'pageCount' => $pageCount,
        'userCount' => $userCount

    ]);
}

}
