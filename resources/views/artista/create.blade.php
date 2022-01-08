@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{url('/artista')}}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('artista.formulario',['modo'=>'Crear']);
    </form>
</div>
@endsection