<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Atividade;
use App\Models\Turma;

class AtividadeController extends Controller
{
    public function listaAtividade(){
        return DB::table("atividade as a")
                    ->join("turma as t", "a.turma_id", "=", "t.id")
                    ->select("a.*", "t.nome as nome_turma")
                    ->get();
    }

    public function index()
    {
        $atividade = new Atividade();
        $atividades = $this->listaAtividade();
        $turmas = Turma::All();
        return view("atividade.index", [
            "atividade" => $atividade,
            "atividades" => $atividades,
            "turmas" => $turmas
        ]);
    }

    
    public function store(Request $request)
    {
        if ($request->get("id") != ""){
            $atividade = Atividade::Find($request->get("id"));
        } else {
            $atividade = new Atividade();
        }
        $atividade->turma_id = $request->get("turma_id");
        $atividade->valor = $request->get("valor");
        $atividade->data = $request->get("data");
        $atividade->save();
        $request->session()->get("status", "salvo");
        
        return redirect("/atividade");
    }

    
    public function edit($id)
    {
        $atividade = Atividade::Find($id);
        $atividades = $this->listaAtividade();
        $turmas = Turma::All();
        return view("atividade.index", [
            "atividade" => $atividade,
            "atividades" => $atividades,
            "turmas" => $turmas
        ]);
    }

    
    public function destroy($id)
    {
        Atividade::Destroy($id);
        $request->session()->get("status", "excluido");
        return redirect("/atividade");
    }
}
