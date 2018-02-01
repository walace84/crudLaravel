@extends('painel.templete.index')

@section('content')



	<h1 class="title-pg">Listagem dos produtos</h1>

	<!-- Essa rota renderiza um formulário para cadastro -->
	<a href="{{route('produtos.create')}}" type="button" class="btn btn-primary btn-add">
		<span class="glyphicon glyphicon-plus"></span> Cadastrar
	</a>

	<table class="table table-striped">
		<tr>
			<th>Nome</th>
			<th>Descrição</th>
			<th width="100px">Ações</th>
		</tr>
		<!-- Pega os dados do banco e passa na tabela -->
		@foreach($products as $product)
		<tr>
			<td>{{$product->name}}</td>
			<td>{{$product->description}}</td>
			<td>
				<!-- para editar o item passa rota e o metodo e o ID -->
				<a href="{{route('produtos.edit', $product->id)}}" class="edit action">
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</a>
				<!-- para visualizar o produto -->
				<a href="{{route('produtos.show', $product->id)}}" class="delete action">
					<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
				</a>
				
			</td>
		</tr>
		@endforeach
	</table>

	<!-- link de página do ProdutoController -->
	{!! $products->links() !!}


@endsection