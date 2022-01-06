<form action="{{url('/sencillo')}}" method="POST" enctype="multipart/form-data">
    @csrf

    @include('sencillo.formulario');
</form>