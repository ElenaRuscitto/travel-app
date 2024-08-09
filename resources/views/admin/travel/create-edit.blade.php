@extends('layouts.admin')

@include('admin.partials.aside')


@section('content')

    <div class="container my-container">
        <h1 class="mb-5 text-center">{{$title}}</h1>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>
                    @endforeach

                </ul>
            </div>
        @endif


        {{-- messaggio di cancellazione avvenuta del progetto --}}
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
            {{session('error')}}
            </div>
        @endif

        <form action="{{$route}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method($method)
            <div class="mb-3">
                <label for="name" class="form-label">Titolo:</label>
                <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    id="name"
                    name="name"
                    value="{{old('name', $travel?->name)}}"
                    required>

                    @error('name')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                    @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Data di Inizio: </label>
                <input
                    type="date"
                    class="form-control w-25 @error('start_date') is-invalid @enderror"
                    id="start_date"
                    aria-describedby="emailHelp"
                    name="start_date"
                    value="{{old('start_date', $travel?->start_date)}}">
            </div>


            <div class="mb-3">
                <label for="type" class="form-label">Data di Fine: </label>
                <input
                    type="date"
                    class="form-control w-25 @error('end_date') is-invalid @enderror"
                    id="end_date"
                    aria-describedby="emailHelp"
                    name="end_date"
                    value="{{old('end_date', $travel?->end_date)}}">
            </div>


            <div class="mb-3">
                <label for="link" class="form-label">Giorni totali: </label>
                <input
                    type="number"
                    class="form-control w-25 @error('days_tot') is-invalid @enderror"
                    id="days_tot"
                    name="days_tot"
                    value="{{old('days_tot', $travel?->days_tot)}}">
                    @error('days_tot')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                    @enderror
            </div>

            <div class="mb-3">
                <label for="link" class="form-label">Voto: </label>
                <input
                    type="number"
                    class="form-control w-25 @error('vote') is-invalid @enderror"
                    id="vote"
                    name="vote"
                    value="{{old('vote', $travel?->vote)}}">
                    @error('vote')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                    @enderror
            </div>


            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input
                  type="file"
                  class="form-control"
                  name="image"
                  placeholder="Inserisci immagine"
                  onchange="showImage(event)"
                  value="{{old('photo', $travel?->photo)}}">
                  <img class="thumb w-25 mt-2" id="thumb" src="{{asset('storage/' . $travel?->photo)}}">
                  {{-- onerror="this.src='/img/no-image.png'"> --}}

            </div>


            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea
                    type="text"
                    class="form-control @error('description')is-invalid @enderror"
                    id="description"
                    aria-describedby="emailHelp"
                    name="description"
                    value="{{old('description', $travel?->description)}}">
                </textarea>

            </div>

            <div>

                <button type="submit" class="btn {{Route::currentRouteName() === 'admin.travels.create' ? 'btn-success' : 'btn-success'}} my-4">{{$button}}</button>
                <a class="btn btn-primary" href="{{route('adimn.home')}}">Torna ai Viaggi</a>


                {{-- <button class="btn btn-primary " type="submit">Aggiungi Progetto</button> --}}
            </div>
        </form>
    </div>




    <script>
        function showImage(event){
            const thumb = document.getElementById('thumb');
            thumb.src = URL.createObjectURL(event.target.files[0]);

        }
    </script>


@endsection
