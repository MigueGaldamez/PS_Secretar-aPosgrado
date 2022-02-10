@extends('layouts.frontend',['subtitulo' => 'Publicaciones'])

@section('content')

@include('publico.cabecera',['titulo' => 'Publicaciones','descripcion'=>'de la Universidad de El Salvador'])

<div class="colorGris mt-4 pb-1 pt-2">
    <h3 class="text-light text-center"><span class="textoSuavecito2">Publicaciones de la Universidad de El Salvador</span></h3>
</div>
<div class="container"> 
        <div class="row my-3 my-sm-3 my-lg-1 my-md-1">
            <div class="col col-lg-12 col-md-12 col-sm-12 col-12  my-1  my-md-5  my-lg-4">                
                <div class=" callout callout-danger row shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
                </svg>
              
                    <div class="col col-12 ">
                        <div class="alert alert-warning d-flex align-items-center alertaPubli" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        {{----}}
                        <div>
                        Apartado en Mantenimiento, disculpe las molestias.
                        </div>
                    </div>
                       <h3><span><b>Encontrar Publicaciones</b></span></h3>
                        <span>	BUSCA en la Red de Bibliotecas Virtuales de la Universidad de El Salvador</span>
                        <form class="mt-4" >
                            <div class="row">
                                <div class="form-group col">
                                    <label for="exampleInputEmail1">Que contengan esta palabra</label>
                                    <input type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese una palabra">
                                    <small id="emailHelp" class="form-text text-muted">Trata de ingresar palabras completas y con acentos.</small>
                                </div>
                                <div class="form-group col">
                                    <label for="exampleInputPassword1">Campo de la ciencia</label>
                                    <select class="form-select form-select-sm" aria-label="Default select example">
                                        <option selected>Todas las publicaciones</option>
                                        <option value="1">Documentos de trabajo</option>
                                        <option value="2">Libros y capítulos</option>
                                        <option value="3">Ponencias</option>
                                        <option value="2">Revistas y Artículos</option>
                                        <option value="3">Multimedia</option>
                                    </select>
                                </div>
                                <div class="w-100 mt-4"></div>
                                   <div class="form-group col">
                                    <label for="exampleInputPassword1">Campo de la ciencia</label>
                                    <select class="form-select form-select-sm" aria-label="Default select example">
                                        <option selected>Todas las colecciones</option>
                                        <option value="1">Colección 1</option>
                                        <option value="2">Colección 2</option>
                                        <option value="3">Colección 3</option>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="exampleInputPassword1">Indice por</label>
                                    <select class="form-select form-select-sm" aria-label="Default select example">
                                        <option selected>Texto Completo</option>
                                        <option value="1">Título</option>
                                        <option value="2">Tema</option>
                                        <option value="3">Autor</option>
                                         <option value="4">Resumen</option>
                                    </select>
                                </div>
                                <div class="w-100"></div>
                            </div>
                            <button class="mt-4 botoncitoRojo">Buscar en la biblioteca</button>
                        </form> 
                    </div>
                  
                </div>
            </div>
            
    </div>
</div>



@endsection
