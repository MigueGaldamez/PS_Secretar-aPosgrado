@extends('layouts.frontend',['subtitulo' => "Catalogo 2022"])

@section('content')

@include('publico.cabecera',['titulo' => 'Catálogo 2022','descripcion'=>''])

<div class="colorGris mt-4 pb-1 pt-2">
    <h3 class="text-light text-center"><span class="textoSuavecito2">Catálogo de Posgrados</span></h3>
</div>
<div class="container"> 
     <a href="{{$informacion->urlCatalogo}}" class="btn btn-danger mt-2 text-light" type="button">Descargar catálogo</a>
    <div class="row my-3 my-sm-3 my-lg-1 my-md-1">
   
        <iframe height="550px" width="100%" src="{{URL::to('/')}}/catalogos/index.html" name="targetframe" allowTransparency="true" scrolling="no" frameborder="0" >
        </iframe>
        
    </div>    
    <div class="row text-center contenedorRazones mb-5">
     
        <h2 class="textoGris mt-5"><span class="textoSuavecito2">Razones para estudiar un Posgrado</span></h2>
        <div class="titulohr mb-4"></div>
        <div class="col razon">
           <p>La UES cuenta con excelencia académica que consolida el prestigio a nivel nacional e internacional.</p>
        </div>
        <div class="col razon">
           <p>La UES cuenta con la acreditación del Instituto del Alto Consejo de Evaluación de la Investigación de la Educación Superior (Hcéres-Francia).</p>
        </div>
        <div class="col razon">
            <p>La UES cuenta con mayor acceso a oportunidades de desarrollo académico y de investigación para sus estudiantes, docentes y personal.</p>
        </div>
    </div>
    
</div>
@endsection
