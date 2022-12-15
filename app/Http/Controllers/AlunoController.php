<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Aluno;
use App\Models\Turma;

class AlunoController extends Controller
{
    public function listaAluno(){
        return DB::table("aluno as a")
                    ->join("turma as t", "a.turma_id", "=", "t.id")
                    ->select("a.*", "t.nome as nome_turma")
                    ->get();
    }
    
    public function index()
    {
        $aluno = new Aluno();
        $alunos = $this->listaAluno();
        $turmas = Turma::All();
        return view("aluno.index", [
            "aluno" => $aluno,
            "alunos" => $alunos,
            "turmas" => $turmas
        ]);
    }

    
    public function store(Request $request)
    {
        if ($request->get("id") != ""){
            $aluno = Aluno::Find($request->get("id"));
        } else {
            $aluno = new Aluno();
        }
        $aluno->nome = $request->get("nome");
        $aluno->matricula = $request->get("matricula");
        $aluno->turma_id = $request->get("turma_id");
        $aluno->save();
        $request->session()->get("status", "salvo");
        
        return redirect("/aluno");
    }

    
    public function edit($id)
    {
        $aluno = Aluno::Find($id);
        $alunos = $this->listaAluno();
        $turmas = Turma::All();
        return view("aluno.index", [
            "aluno" => $aluno,
            "alunos" => $alunos,
            "turmas" => $turmas
        ]);
    }

    
    public function destroy($id)
    {
        Aluno::Destroy($id);
        $request->session()->get("status", "excluido");
        return redirect("/aluno");
    }
}
