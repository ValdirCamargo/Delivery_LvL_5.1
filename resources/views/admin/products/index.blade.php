@extends('app')

@section('content')
    <div class="container">
        <h3>Produtos</h3>

        <a href="{{route('admin.products.create')}}"class="btn btn-default">Novo Produto</a>
<br><br>



        <table class="table table-bordered ">
            <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Preco</th>
                <th>Acao</th>
            </tr>
            </thead>


            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>R$ {{$product->price}}</td>
                    <td>
                        <a href="{{route('admin.products.edit',['id'=>$product->id])}}" class="btn btn-default btn-sm">
                            Editar
                        </a>

                        <a href="{{route('admin.products.destroy',['id'=>$product->id])}}" class="btn btn-danger btn-sm">
                            Deletar
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>

            <!--  Exibe paginacao -->
            {!! $products->render() !!}
            
        </table>
    </div>

@endsection