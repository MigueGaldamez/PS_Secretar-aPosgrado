@extends('layouts.frontend',['subtitulo' => 'Reseña'])

@section('content')
@include('publico.cabecera2',['titulo' => 'Reseña Historica','descripcion'=>''])

<div class="colorGris mt-2">
    <div class="container-fluid col-11" >
    {{--inicio carousel--}}
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="{{asset('img/historia/rectoria.jpg')}}" class="d-block w-100 imgBw" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="fondoNegroT">First slide label</h5>
                    <p class="fondoNegroT">Some representative placeholder content for the first slide.</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="{{asset('img/historia/ANTIGUOS.S3-.jpg')}}" class="d-block w-100 imgBw" alt="...">
                <div class="carousel-caption d-none d-md-block">
                   <h5 class="fondoNegroT">First slide label</h5>
                    <p class="fondoNegroT">Some representative placeholder content for the first slide.</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="{{asset('img/historia/rectoria.jpg')}}" class="d-block w-100 imgBw" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="fondoNegroT textoSuavecito">First slide label</h3>
                    <h5 class="fondoNegroT">Some representative placeholder content for the first slide.</h5>
                </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    {{--Fin carousel--}}
   
    </div>
</div>
<div class="container col-9 mt-4 mb-4">
         {{--inicio cards--}}
        <div class="row">
            <div class="col historia">
                <h3 class="textoDuro  lh-sm "><b>Acerca de la Universidad de El Salvador UES</b></h3>
                <h5 class="lh-sm subtituloHistoria">SubTitulo información</h5>
                <p class="has-dropcap textoSuavecito2 parrafo">La Universidad de El Salvador (UES) es la única universidad pública de
                    El Salvador, además de ser la más grande del país fue la primera que
                    se fundó en territorio salvadoreño.
                    Por decreto de la Asamblea Legislativa la UES, se creó el 16 de febrero
                    de 1841; más tarde en <b>1843</b> inició sus actividades impartiendo
                    matemáticas puras, lógica, moral, metafísica y física general.
                    En 1880, por resolución del Poder Ejecutivo se subdividió en
                    Facultades, algunas de las cuales desaparecieron tiempo después y
                    otras nuevas fueron creadas.
                    En mayo de 1937, por solicitud de las autoridades universitarias, el
                    Gobierno de la República formaliza la compraventa de 20 manzanas
                    de terreno de la finca San Carlos, ubicada al norte de la ciudad de San

                    Salvador. Dando inicio a las obras de construcción de la actual Ciudad
                    Universitaria en 1947. Dos años más tarde en 1949 se amplió este
                    predio, mediante la compraventa de 19 manzanas más.
                    Aunque su campus central está ubicado en el departamento de San
                    Salvador con 9 Facultades, también, cuenta con tres sedes
                    departamentales: la Facultad Multidisciplinaria Occidental, en el
                    departamento de Santa Ana, la Facultad Multidisciplinaria Paracentral,
                    en el departamento de San Vicente y la Facultad Multidisciplinaria
                    Oriental, en el departamento de San Miguel.
                    El artículo 61 de la Constitución de la República de El Salvador
                    garantiza que la Universidad de El Salvador goza de autonomía
                    académica, administrativa y financiera.
                    El reconocimiento a la excelencia académica llevó a la UES en 2014
                    que el Ranking Mundial de Universidades en la Web la clasificara
                    como la mejor universidad de la República de El Salvador, ubicando al
                    Alma Máter en la posición 3453 a nivel internacional.
                    A lo largo de su existencia la Universidad de El Salvador ha sido
                    testigo y protagonista de importantes cambios políticos y sociales del
                    país, ha superado daños en infraestructuras causados por terremotos,
                    ocupaciones militares que prolongaron el cierre del campus en varias
                    ocasiones, represión y persecución política de sus estudiantes y
                    trabajadores en un contexto de guerra civil.
                    Después de los Acuerdos de Paz de 1992, logró recuperar su
                    patrimonio físico para continuar con la excelencia académica.
                    Actualmente, la UES presenta una amplia oferta académica: 79
                    carreras en modalidad presencial y 7 a distancia; 71 maestrías, 9
                    doctorados, 27 especialidades médicas y 44 diplomados como parte
                    de la educación continua
                    En agosto de 2018, autoridades de la UES solicitaron al Presidente del
                    Alto Consejo de Evaluación de la Investigación en la Educación
                    Superior (Hcéres) Francia, el inicio del proceso de acreditación
                    institucional, para octubre de 2019 Hcéres otorgó la acreditación
                    institucional a la Universidad de El Salvador por un periodo de 5 años.
                    En la actualidad las autoridades de la UES continúan trabajando por
                    mantener en prestigio nacional e internacional que caracteriza la
                    excelencia académica en la formación de los profesionales que se

                    forman en esta casa de estudios, también en 2021 logró designar al
                    2021 como el año de la gratuidad beneficiando a los estudiantes
                    procedentes de instituciones públicas y privadas, exonerándolos de
                    matrícula y cuota de escolaridad.

                    Universidad de El Salvador, Hacia la Libertad por la Cultura.</p>
            </div>
             <div class="col historia">
                <h3 class="textoDuro  lh-sm"><b>Secretaría de Posgrado</b></h3>
                <h5 class="lh-sm subtituloHistoria">SubTitulo información</h5>
                <p class="has-dropcap textoSuavecito2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

               
            </div>
             
        </div>
        {{--FIn cards--}}
</div>

@endsection
