@extends("templates.main")

@section("titulo", "Alunos")

@section("principal")
<main id="main" data-aos="fade-in">

    <div class="breadcrumbs">
      <div class="container">
        <h2>Trainers</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->
    <br />

    <div class="container">
        <form action="/aluno" method="post" class="row">

            <div class="form-group col-6">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ $aluno->nome }}" />
            </div>

            <div class="form-group col-6">
                <label for="matricula">Matricula:</label>
                <input type="text" name="matricula" id="matricula" class="form-control" value="{{ $aluno->matricula }}" />
            </div>

            <div class="form-group col-6">
                <label for="turma_id">Turma:</label>
                <select name="turma_id" id="turma_id" class="form-control">
                    @foreach ($turmas as $turma)
                        @if ($turma->id == $aluno->turma_id)
                            <option value="{{ $turma->id }}" selected="selected" >{{ $turma->nome }}</option>
                        @else
                            <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group col-4">
                @csrf
                <input type="hidden" name="id" value="{{ $aluno->id }}" />
                <a href="/aluno" class="btn btn-primary" style="margin-top: 23px;">
                    <i class="bi bi-plus-square"></i> Novo
                </a>
                <button type="submit" class="btn btn-success" style="margin-top: 23px;">
                <i class="bi bi-save"></i> Salvar
                </button>
            </div>

        </form>
    </div>
</main>
@endsection