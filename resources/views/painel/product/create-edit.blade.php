@extends('painel.templete.index')

@section('content')
<!-- trás o nome do produto caso esteja na area de editar -->
<h1 class="title-pg">
<a href="{{route('produtos.index')}}"><span class="glyphicon glyphicon-fast-backward"></span></a>
	Gestão Produto: <b>{{$product->name or 'Novo'}}</b>
</h1>
<!--= RETORNO DE ERRO DO FORMULÁRIO =-->
<!-- A variavel $errors é padrão do laravel, não foi feito nada a mais para retorno esses erro que vem do ProductFormRequest -->
@if(isset($errors) && count($errors) > 0)

	<div class="alert alert-danger">
		@foreach($errors->all() as $erro)
			<p>{{$erro}}</p>
		@endforeach
	</div>

@endif

<!-- Envia para rota de cadastro -->
<!-- Pelo fato de ter o PRODUCT dentro do método EDIT, podemos trazer os campos preenchidos no formulário,fazendo uma verificação no value de cada campo -->

<!-- FAZ A VERIFICAÇÃO PARA VER EM QUAL FORMULÁRIO ESTÁ -->
@if(isset($product))
<form class="form" method="POST" action="{{route('produtos.update', $product->id)}}">
	{!! method_field('PUT') !!} <!-- o metodo UPDATE só recebe campo do tipo PUT -->
@else
<form class="form" method="POST" action="{{route('produtos.store')}}">
@endif

  {{ csrf_field() }}

  <div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" class="form-control" name="name" value="{{$product->name or old('name')}}">
  </div>

  <label for="active">Ativo:</label>
  <input type="checkbox"  value="1" name="active" @if(isset($product) && $product->active == '1') checked @endif >

  <div class="form-group">
    <label for="number">Número:</label>
    <input type="text" class="form-control" name="number" value="{{$product->number or old('number')}}">
  </div>

  <!-- Percorre a categoria que está vindo do método create do ProdutoController -->
  <div class="form-group">
	  <select name="category" class="form-control">
		    <option value="">Escolha a Categoria</option>
		    @foreach($categorys as $category)
		    <option value="{{$category}}" @if(isset($product) && $product->category == $category) selected @endif> {{$category}} </option>
		    @endforeach
	  </select>
  </div>

  <div class="form-group">
	  <label for="comment">Descrição:</label>
	  <textarea class="form-control" rows="5" name="description">{{$product->description or old('description')}}</textarea>
  </div>

  <button type="submit" class="btn btn-primary">Enviar</button>

</form>

@endsection