@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/genero/'.$generos->nombre ) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}

        @include('genero.formulario',['modo'=>'Editar']);

    </form>
</div>
@endsection