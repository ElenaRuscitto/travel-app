@extends('layouts.admin')


@section('content')

<div class="my-container">


    <div class="list-group list-group-flush ">
        {{-- <a class="d-flex justify-content-end  " href="{{route('admin.projects.create')}}"> --}}

            <button class="btn btn-primary m-3"><i class="fa-solid fa-plus "></i></button>
            {{-- Aggiungi Viaggio --}}
        </a>
    </div>


    <table class="table table-striped">

        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>

    </table>
</div>


@endsection
