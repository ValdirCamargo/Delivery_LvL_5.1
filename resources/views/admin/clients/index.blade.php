@extends('app')

@section('content')
    <div class="container">
        <h3>Clientes</h3>

        <a href="{{route('admin.clients.create')}}"class="btn btn-default">Novo Cliente</a>
<br><br>



        <table class="table table-bordered ">
            <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereco</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>CEP</th>
                <th>Acao</th>
            </tr>
            </thead>


            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->user->name}}</td>
                    <td>{{$client->user->email}}</td>
                    <td>{{$client->phone}}</td>
                    <td>{{$client->address}}</td>
                    <td>{{$client->city}}</td>
                    <td>{{$client->state}}</td>
                    <td>{{$client->zipcode}}</td>
                    <td>
                        <a href="{{route('admin.clients.edit',['id'=>$client->id])}}" class="btn btn-default btn-sm">
                            Editar
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>

            <!--  Exibe paginacao -->
            {!! $clients->render() !!}
            
        </table>
    </div>

@endsection