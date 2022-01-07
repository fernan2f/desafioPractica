@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/sencillo/'.$sencillo->id_sencillo ) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}

        @include('sencillo.formulario',['modo'=>'Editar']);

    </form>
</div>
@endsection