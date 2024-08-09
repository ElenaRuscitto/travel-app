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

            @forelse ($travels as $travel )
            <tbody>
                    <tr>
                        <form
                            action="{{route('adimn.travel.update', $travel)}}"
                            method="POST"
                            id="form-edit {{$travel->id}}"
                            >
                            @csrf
                            @method('PUT')

                            <th class=" align-content-center text-capitalize">
                                {{$travel->name}}
                            </th>

                            <td class=" align-content-center ">
                                {{$travel->start_date}}
                                {{-- <input
                                    type="text"
                                    class="form-control p-0"
                                    name="type"
                                    value="{{$project->type->name}}"> --}}
                            </td>

                            <td class="align-content-center">
                                {{$travel->end_date}}
                            {{-- <td class=" align-content-center ">
                                @forelse ($project->technologies as $technology)
                                    <span class="badge text-bg-success"><a class="text-white text-decoration-none" href="{{route('admin.technology-projects', $technology)}}">{{$technology->name}}</a></span>
                                @empty
                                    - no technology -
                                @endforelse --}}


                            </td>


                            <td class="align-content-center">
                                {{$travel->days_tot}}
                            </td>

                            <td class="align-content-center">
                                {{$travel->vote}}
                            </td>

                            <td class="d-flex justify-content-center align-items-center ">


                                        <a href="{{route('adimn.travel.show', $travel)}}" class="btn btn-primary me-2">
                                        <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{route('adimn.travel.edit', $travel)}}" class="btn btn-warning my-2">
                                    <i class="fa-solid fa-pen"></i></a>

                        </form>
                                    <form
                                        action="{{route('adimn.travel.destroy', $travel)}}"
                                        method="post"
                                        onsubmit="return confirm('Sei sicuro di voler eliminare  - {{$travel->name}} - ?')">
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
