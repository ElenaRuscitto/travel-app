@extends('layouts.admin')


@section('content')

    <div class="container my-container">

                <h1 class="text-center ">Elenco per Tipo</h1>


                <table class="table mt-5">

                        <thead>
                        <tr>
                            <th scope="col">TAPPE:</th>
                            <th scope="col">VIAGGIO:</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($stops as $stop )
                                <tr>

                                        <th class=" align-content-center"> {{$stop->name}} </th>

                                        <td class=" align-content-center ">
                                            <ul class="my-ul">
                                                @foreach ($stop->travels as $travel)
                                                    <li class="my-li"> <a href="{{route('adimn.travel.show', $travel)}}">{{$travel->name}} {{$travel->id}}</a></li>
                                                @endforeach
                                            </ul>

                                        </td>


                                </tr>


                            @endforeach

                        </tbody>


                </table>

            <div class="paginator">
                {{$stops->links()}}
            </div>


    </div>






    <script>
        function submitForm(id){
            const form = document.getElementById(`form-edit-${id}`);
            console.log(form);
            form.submit();
        }
    </script>

@endsection
