@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{url('/sencillo')}}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('sencillo.formulario',['modo'=>'Crear']);
    </form>
</div>
@endsection