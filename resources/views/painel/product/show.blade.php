@extends('painel.templete.index')

@section('content')

@if(isset($errors) && count($errors) > 0)

	<div class="alert alert-danger">
		@foreach($errors->all() as $erro)
			<p>{{$erro}}</p>
		@endforeach
	</div>

@endif

<h1 class="title-pg">
<a href="{{route('produtos.index')}}"><span class="glyphicon glyphicon-fast-backward"></span></a>
	Produto: <b>{{$product->name}}</b>
</h1>

<p><b>Ativo: </b>{{$product->active}}</p>
<p><b>Número: </b>{{$product->number}}</p>
<p><b>Categoria: </b>{{$product->category}}</p>
<p><b>Descrição: </b>{{$product->description}}</p>

<hr>

<form class="form" method="POST" action="{{route('produtos.destroy', $product->id)}}">
	{!! method_field('DELETE') !!}
	{{ csrf_field() }}
 	<button type="submit" class="btn btn-danger">Deletar: {{$product->name}}</button>
</form>	

@endsection