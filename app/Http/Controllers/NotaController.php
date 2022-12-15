<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Atividade;
use App\Models\Turma;
use App\Models\Aluno;
use App\Models\Nota;

class NotaController extends Controller
{  

    public function listaNota(){
        return DB::table("nota as n")
                ->join("atividade as a", "n.atividade_id", "=", "a.id")
                ->join("turma as t", "n.turma_id", "=", "t.id")
                ->join("aluno as al", "n.aluno_id", "=", "al.id")
                ->select("n.*")
                ->get();
    }
    
    public function index()
    {
        $nota = new Nota();
        $notas = $this->listaNota();
        $atividades = Atividade::All();
        $turmas = Turma::All();
        $alunos = Aluno::All();
        return view("nota.index", [
            "nota" => $nota,
            "notas" => $notas,
            "atividades" => $atividades,
            "turmas" => $turmas,
            "alunos" => $alunos
        ]);
    }

    
    public function store(Request $request)
    {
        if ($request->get("id") != ""){
            $nota = Nota::Find($request->get("id"));
        } else {
            $nota = new Nota();
        }
        $nota->atividade_id = $request->get("atividade_id");
        $nota->turma_id = $request->get("turma_id");
        $nota->aluno_id = $request->get("aluno_id");
        $nota->nota = $request->get("nota");
        $nota->save();
        $request->session()->get("status", "salvo");
        
        return redirect("/nota");
    }

    public function create(Request $request)
    {
        $nota = new Nota();
        $notas = $this->listaNota();
        $atividades = DB::table('atividade')->where('turma_id', $request->get('turma_id'))->get();
        $turmas = Turma::All();
        $alunos = DB::table('aluno')->where('turma_id',  $request->get('turma_id'))->get();
        return view("nota.form", [
            "nota" => $nota,
            "notas" => $notas,
            "atividades" => $atividades,
            "turmas" => $turmas,
            "alunos" => $alunos
        ]);
        
    }
    
    public function edit($id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
