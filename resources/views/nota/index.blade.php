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
    <form class="row" action="/nota/create" method="get">

      <div class="form-group col-6">
        <label for="turma_id">Turma:</label>
        <select name="turma_id" id="turma_id" class="form-control">
          @foreach ($turmas as $turma)
            @if ($turma->id == $nota->turma_id)
              <option value="{{ $turma->id }}" selected="selected">{{ $turma->nome }}</option>
            @else
              <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
            @endif
          @endforeach
        </select>
      </div>

      <div class="form-group col-6">
        @csrf
        <button type="submit" class="btn btn-success" style="margin-top: 23px;">
          <i class="bi bi-save"></i> Confirmar
        </button>
      </div>
    </form>
  </div>
</main>



@endsection