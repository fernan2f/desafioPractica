@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{url('/genero')}}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('genero.formulario',['modo'=>'Crear']);
    </form>
</div>
@endsection