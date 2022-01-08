@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/artista/'.$artista->nombre ) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}

        @include('artista.formulario',['modo'=>'Editar']);

    </form>
</div>
@endsection