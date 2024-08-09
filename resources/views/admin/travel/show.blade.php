


@extends('layouts.admin')

@section('content')

<section class="h-100 flex-grow-1 sec-index ">
    <div class="container my-container pt-4 w-100 ">

        <div class="row">
            <div class="col"><h1 class="mb-5 text-center">Dettagli del Viaggio</h1></div>
        </div>

        <div class="row ">

            <div class="col me-5">
                      <h5 class="card-title mb-2 text-capitalize ">Titolo: {{$travel->name}}</h5>
                      <p class="card-text">Data di Inizio: {{$travel->start_date}}</p>
                      <p class="card-text">Data di Fine: {{$travel->end_date}}</p>
                      <p class="card-text">Giorni Totali: {{$travel->days_tot}}</p>
                      <p class="card-text">Voto: {{$travel->vote}}</p>
                      {{-- <p class="card-text text-capitalize">Tipo: {{$project->type->name}}</p>

                      @if(count($project->technologies) > 0)
                            <p class="card-text">Tecnologia/e: @foreach ($project->technologies as $technology)
                                <span class="badge text-bg-success">{{$technology->name}}</span>
                            @endforeach</p>
                      @endif --}}


                      <p class="card-text">Descrizione: {{$travel->description}}</p>

                      <img
                      src="{{asset('storage/' . $travel->photo)}}"
                      alt="{{$travel->name}}"
                      class="img-fluid my-img mt-5"
                     >

            </div>

            <div class="d-flex my-3">

                <a href="{{route('adimn.home')}}" class="btn btn-primary mx-2">
                    <i class="fa-solid fa-backward"></i>
                </a>

                <form
                    action="{{route('adimn.travel.destroy', $travel)}}"
                    method="post"
                    onsubmit="return confirm('Sei sicuro di voler eliminare . {{$travel->name}} . ?')">
                @csrf
                @method('DELETE')
                    <button
                        type="submit"
                        class="btn btn-danger mx-2">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>

            </div>


        </div>

    </div>
</section>
@endsection
