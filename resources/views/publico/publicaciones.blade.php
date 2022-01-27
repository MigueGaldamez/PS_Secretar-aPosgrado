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
                    <div class="col col-12 ">
                    
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
