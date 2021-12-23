<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Ponto;



class PontoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:bater-ponto');

    }


    public function index()
    {
        $loggedId = intval(Auth::id());
        $pontos = Ponto::select('*')->where('idUser', $loggedId)->get();
        return view('admin.ponto.index', [
            'loggedId' => $loggedId,
            'pontos' => $pontos
        ]);
    }

    public function save1($id){
        $loggedId = intval(Auth::id());
        $date = Carbon::now();
        $date->toTimeString();

        $dateShow = Carbon::now();
        $dateShow->toDateString();

        $hasPonto = Ponto::find($id);

        $countPonto = Ponto::select('ponto1')->where('idUser', $loggedId)->where('id', $id)->get();
        
        if ($countPonto[0]->ponto1 == null){
            $hasPonto->ponto1 = $date;
            $hasPonto->save();
    
            return redirect()->route('ponto')->with('warning', 'Ponto marcado com sucesso no dia ' . $dateShow);
        }
        
        return redirect()->route('ponto')->with('alert', 'Já existem registros de ponto na 1° entrada');
            
    }

    public function save2($id){
        $loggedId = intval(Auth::id());
        $date = Carbon::now();
        $date->toDateTimeString();

        $dateShow = Carbon::now();
        $dateShow->toDateString();

        $hasPonto = Ponto::find($id);
        $countPonto = Ponto::select('ponto2')->where('idUser', $loggedId)->where('id', $id)->get();
        
        if ($countPonto[0]->ponto2 == null){
            $hasPonto->ponto2 = $date;
            $hasPonto->save();
    
            return redirect()->route('ponto')->with('warning', 'Ponto marcado com sucesso no dia ' . $dateShow);
        }
        
        return redirect()->route('ponto')->with('alert', 'Já existem registros de ponto na 1° saida');
            
    }

    public function save3($id){
        $loggedId = intval(Auth::id());
        $date = Carbon::now();
        $date->toDateTimeString();

        $dateShow = Carbon::now();
        $dateShow->toDateString();
        $hasPonto = Ponto::find($id);

        $countPonto = Ponto::select('ponto3')->where('idUser', $loggedId)->where('id', $id)->get();
        
        if ($countPonto[0]->ponto3 == null){
            $hasPonto->ponto3 = $date;
            $hasPonto->save();
    
       return redirect()->route('ponto')->with('warning', 'Ponto marcado com sucesso no dia ' . $dateShow);
        }
        
        return redirect()->route('ponto')->with('alert', 'Já existem registros de ponto na 2° entrada');
            
    }

    public function save4($id){
        $loggedId = intval(Auth::id());
        $date = Carbon::now();
        $date->toDateTimeString();

        $dateShow = Carbon::now();
        $dateShow->toDateString();
        $hasPonto = Ponto::find($id);

        $countPonto = Ponto::select('ponto4')->where('idUser', $loggedId)->where('id', $id)->get();
        
        if ($countPonto[0]->ponto4 == null){
            $hasPonto->ponto4 = $date;
            $hasPonto->save();
    
        return redirect()->route('ponto')->with('warning', 'Ponto marcado com sucesso no dia ' . $dateShow);
        }
        
        return redirect()->route('ponto')->with('alert', 'Já existem registros de ponto na 2° saida');
            
    }

    public function saveData(Request $request){
        $loggedId = intval(Auth::id());
        $date = Carbon::now();
        $date->toDateTimeString();
        $ponto = new Ponto();
        $data = $request->only([
            'data'
        ]);
            if (isset($request['data'])) {

            $hasData = Ponto::select('datas')
            ->where('datas', $request['data'])
            ->get();
            }

            if (count($hasData) !== 0 ) {
                return redirect()->route('ponto')->with('alert', 'Essa data já esta sendo utilizada');
            }

            if ($hasData !== $request['data']) {
                $ponto->datas = $data['data'];
                $ponto->idUser = $loggedId;
                $ponto->save();
                return redirect()->route('ponto')->with('warning', 'Data adicionada com sucesso');
            } 
        }
       
    }


