@extends('layouts.admin')


@section('content')

<div class="my-container">

    {{-- @if(count($travels) > 0) --}}
        <div>
            <h1 class="text-center">I miei Viaggi</h1>
        </div>
    {{-- @endif --}}

    <div class="list-group list-group-flush ">
        <a class="d-flex justify-content-end  " href="{{route('adimn.travel.create')}}">

            <button class="btn btn-primary m-3"><i class="fa-solid fa-plus "></i></button>
            {{-- Aggiungi Viaggio --}}
        </a>
    </div>

    {{-- @if(count($travels) > 0) --}}
        <table class="table table-striped">
            @forelse ($travels as $travel )
                <thead>
                    <tr>
                        <th scope="col">Viaggio (*)</th>
                        <th scope="col">Data Inizio</th>
                        <th scope="col">Data Fine</th>
                        <th scope="col">n° giorni</th>
                        <th scope="col">Voto</th>
                        <th scope="col" class="text-center">Azioni</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <form
                            action="{{route('admin.travels.update', $project)}}"
                            method="POST"
                            id="form-edit {{$travel->id}}"
                            >
                            @csrf
                            @method('PUT')

                            <th class=" align-content-center ">
                                <input
                                    type="text"
                                    class="form-control p-0 text-capitalize"
                                    name="title"
                                    value="{{$travel->name}}">

                            </th>

                            <td class=" align-content-center ">
                                inpiut
                                {{-- <input
                                    type="text"
                                    class="form-control p-0"
                                    name="type"
                                    value="{{$project->type->name}}"> --}}
                            </td>


                            {{-- <td class=" align-content-center ">
                                @forelse ($project->technologies as $technology)
                                    <span class="badge text-bg-success"><a class="text-white text-decoration-none" href="{{route('admin.technology-projects', $technology)}}">{{$technology->name}}</a></span>
                                @empty
                                    - no technology -
                                @endforelse


                            </td> --}}


                            <td class=" align-content-center ">
                                <input
                                    type="text"
                                    class="form-control w-100 p-0"
                                    name="link"
                                    value="{{$travel->link}}">
                                    @error('link')
                                        <p class="text-danger text-small">{{$message}}</p>
                                    @enderror
                            </td>


                            <td class="d-flex justify-content-center align-items-center ">


                                        <a href="{{route('admin.travels.show', $travel)}}" class="btn btn-primary me-2">
                                        <i
                                    class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{route('admin.travels.edit', $travel)}}" class="btn btn-warning my-2"><i
                                    class="fa-solid fa-pen"></i></a>

                        </form>
                                    <form
                                        action="{{route('admin.travels.destroy', $travel)}}"
                                        method="post"
                                        onsubmit="return confirm('Sei sicuro di voler eliminare . {{$travel->name}} . ?')">
                                        @csrf
                                        @method('DELETE')
                                            <button
                                                type="submit"
                                                class="btn btn-danger mx-2"
                                                >
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                    </form>

                            </td>


                    </tr>
                    @empty
                    <h1>Non ci sono Viaggi</h1>


            @endforelse

                </tbody>


        </table>
    {{-- @endif --}}

</div>


@endsection
