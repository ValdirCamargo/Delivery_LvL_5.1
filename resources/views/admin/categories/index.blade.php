@extends('app')

@section('content')
    <div class="container">
        <h3>Categorias</h3>

        <ul>
            @foreach($categories as $category)
               <li>{{$category}}</li>
            @endforeach
        </ul>


    </div>


@endsection