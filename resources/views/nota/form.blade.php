@extends("templates.main")

@section("titulo", "Atividades")

@section("principal")

<main id="main" data-aos="fade-in">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="container">
      <h2>Courses</h2>
      <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
    </div>
  </div><!-- End Breadcrumbs -->

  <div class="container">
    <form action="/nota" method="post" class="row">

      @foreach($atividades as $atividade)
        <input type="hidden" id="turma_id" name="turma_id" value="{{ $atividade->turma_id }}" />
      @endforeach

      <div class="form-group col-6">
        <label for="atividade_id">Atividade:</label>
        <select name="atividade_id" id="atividade_id" class="form-control">
          @foreach ($atividades as $atividade)
            @if ($atividade->id == $nota->atividade_id)
              <option value="{{ $atividade->id }}" selected="selected">{{ $atividade->data }}</option>
            @else
              <option value="{{ $atividade->id }}">{{ $atividade->data }}</option>
            @endif
          @endforeach
        </select>
      </div>

      <div class="form-group col-6">
        <label for="aluno_id">Aluno:</label>
        <select name="aluno_id" id="aluno_id" class="form-control">
          @foreach ($alunos as $aluno)
            @if ($aluno->id == $nota->aluno_id)
              <option value="{{ $aluno->id }}" selected="selected">{{ $aluno->nome }}</option>
            @else
              <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
            @endif
          @endforeach
        </select>
      </div>

      <div class="form-group col-6">
        <label for="nota">Nota:</label>
        <input type="text" name="nota" id="nota" class="form-control">
      </div>

      <div class="form-group col-6">
        @csrf
        <input type="hidden" id="id" name="id" value="{{ $nota->id }}" />
        <input type="submit" value="Salvar" class="btn btn-success" style="margin-top: 23px;">
      </div>
    </form>
  </div>
</main>
@endsection