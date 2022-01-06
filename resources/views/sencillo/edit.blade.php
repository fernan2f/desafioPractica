<form action="{{ url('/sencillo/'.$sencillo->id_sencillo ) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('sencillo.formulario');

</form>