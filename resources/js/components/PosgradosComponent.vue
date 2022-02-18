<template >
    <div class="row">
        <div class="row">
            <div class="col-auto">
                <h1>Posgrados</h1>
            </div>
            <div class="col">
                <button @click="update=false; openModal();" type="button" class="btn btn-success ">
            Nuevo
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg> 
        </button>
            </div>
        </div>
        <!-- Modal -->
        <div  class="modal fade" :class="{show:modal, ver:modal}" id="exampleModal"  data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">{{titleModal}}</h5>
                        <button @click="closeModal();" type="button" class="btn-close"  aria-label="Close"></button>
                    </div>
                    <form v-on:submit.prevent="save" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div  class="mb-3 col-sm-6">
                                    <label for="formFile" class="form-label">Imagen representativa del posgrado</label>
                                    <input ref="urlImg"  accept="image/*" class="form-control" type="file" name="urlImagen" @change="obtenerImagen">
                                    <span class="text-danger" v-if="errores.urlImagen">{{errores.urlImagen[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <img v-if="selImagen" :src="imagen" class="img-thumbnail" alt="...">
                                </div>
                                <div class="mb-3 col-sm-6 offset-sm-3">
                                    <label for="nombre" class="form-label">Facultad</label>
                                    <select v-model="posgrado.facultad"  class="form-select" aria-label="facultad">
                                        <option value=0 >Selecciona una Facultad</option>
                                        <option v-for="facultad in facultades" :key="facultad.id" v-bind:value="facultad.id"> {{facultad.nombre}}</option>
                                    </select>
                                    <span class="text-danger" v-if="errores.facultad">{{errores.facultad[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-12" >
                                    <label for="nombrePosgrado" class="form-label">Nombre posgrado</label>
                                    <input v-model="posgrado.nombre" class="form-control" type="text" placeholder="Nombre" aria-label="Nombre de la facultad">
                                    <span class="text-danger" v-if="errores.nombre">{{errores.nombre[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <label for="descripcionPosgrado" class="form-label">Descripción</label>
                                    <textarea v-model="posgrado.descripcion" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                                    <span class="text-danger" v-if="errores.descripcion">{{errores.descripcion[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-12" >
                                    <label for="tituloPosgrado" class="form-label">Titulo</label>
                                    <input v-model="posgrado.titulo" class="form-control" type="text" placeholder="Titulo" aria-label="Título del posgrado">
                                    <span class="text-danger" v-if="errores.titulo">{{errores.titulo[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-4">
                                    <label for="TipoProgramaPosgrado" class="form-label">Tipo Pograma</label>
                                    <select v-model="posgrado.tipo_programa"  class="form-select" aria-label="tipo_programa">
                                        <option value=0 >Selecciona una Modalidad</option>
                                        <option v-for="tipo_programa in tipo_programas" :key="tipo_programa.id" v-bind:value="tipo_programa.id"> {{tipo_programa.nombre}}</option>
                                    </select>
                                    <span class="text-danger" v-if="errores.tipo_programa">{{errores.tipo_programa[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <input class="form-check-input" @change="ofertado(posgrado.ofertado)" v-model="posgrado.ofertado" true-value="1" false-value="0" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label"  for="flexSwitchCheckDefault">{{textOfertado}}</label>
                                    <span class="text-danger" v-if="errores.ofertado">{{errores.ofertado[0]}}</span>
                                </div>  
                            </div>         
                        </div>
                        <div class="modal-footer">
                            <button @click="save();" type="button" class="btn btn-success" >Guardar</button>
                            <button v-on:click="closeModal();" type="button" class="btn btn-secondary" >Close</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
        <!--Fin del modal -->
        <div v-if="cargando" class="d-flex align-items-center justify-content-center m-3">
            <strong>Cargando Datos...</strong>
            <div class="">
                <div class="spinner-grow text-danger" role="status"></div>
                <div class="spinner-grow text-warning" role="status"></div>
                <div class="spinner-grow text-info" role="status"></div>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-2">
            <div class="card border-dark">
                <div class="card-body row">
                    <!---->
                    <div class="col col-6">
                        <label for="customRange3" class="form-label">Mostrando: {{posgrados.from}} - {{posgrados.to }} | Total: {{posgrados.total}}</label>
                    </div>
                    <div class="col col-6">
                        <label  class="form-label">Mostrar:</label>
                        <select @change="filtros.page=1; list();" v-model="filtros.per_page" class="form-select form-select-sm" placeholder="Mostrar elementos">
                            <option value="4">4 Registros</option>
                            <option value="8">8 Registros</option>
                            <option value="15">15 Registros</option>
                            <option value="20">20 Registros</option>
                        </select> 
                    </div>
                </div>
            </div>
        </div>
        <div id="visorImagen">
            <span class="close">&times;</span>
            <img class="modal-content" id="full-image">
        </div>
         <div class="col-12 col-md-8 mb-2">
            <div class="card border-dark">
                <div class="card-body">
                    <form @submit.prevent="list">
            <div class="row mt-1 mb-1">
                <div class="col-sm-4">
                    <label  class="form-label">Facultad</label>
                    <select v-model="filtros.facultad" class="form-select form-select-sm" aria-label="facultad">
                        <option value=0 >Todas las facultades</option>
                        <option v-for="facultad in facultades" :key="facultad.id" v-bind:value="facultad.id"> {{facultad.nombre}}</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label  class="form-label">Nombre</label>
                    <input v-model="filtros.nombre"  class="form-control form-control-sm" type="text" placeholder="Nombre" aria-label="Nombre de la facultad">
                </div>
                <div class="col-sm-3">
                    <label  class="form-label">Ofertado</label>
                    <select v-model="filtros.ofertado"  class="form-select form-select-sm" aria-label="ofertado">
                        <option value="none">Todo</option>
                        <option value="1">Ofertado</option>
                        <option value="0">No ofertado</option>
                    </select>
                </div>
                <div class="col-sm-1 align-self-end">
                    <button @click="list(); filtros.page=1;"  type="submit" class="btn btn-outline-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
                </div>
            </div>
        </div>
        <div v-for="posgrado in posgrados.data" :key="posgrado.id" class=" col-sm-6 mb-3">
            <div class="card  h-100" >
                <div class="row g-0">
                    <div class="col-sm-4 rounded mx-auto d-block text-center">
                        <img :src="posgrado.urlImagen" class="img-fluid rounded-start imagenView" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="card-body">
                            <h5 class="card-title">{{posgrado.tipo_programa.nombre}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{posgrado.nombre}}</h6>
                            <p class="card-text"> Ofertado: 
                                <svg v-if="posgrado.ofertado == 1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg>
                                <svg v-if="posgrado.ofertado == 0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                            </p>
                            <p class="card-text">Titulo: {{posgrado.titulo}}</p>
                            <p class="card-text"><small class="text-muted">{{posgrado.facultad.nombre}}</small></p>
                            <div class="position-relative bottom-0 start-50 translate-middle-x mb-1 ">
                                <button type="button"   @click="update=true; openModal(posgrado);" class="btn btn-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg>
                                </button>
                                <button type="button" @click="eliminarM(posgrado.id);" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 text-center">
                <nav>
                    <ul class="pagination">
                        <li class="page-item" :class="{disabled:filtros.page==1}" >
                            <a class="page-link" @click="filtros.page=1, list();" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-backward-fill" viewBox="0 0 16 16">
                                    <path d="M.5 3.5A.5.5 0 0 0 0 4v8a.5.5 0 0 0 1 0V8.753l6.267 3.636c.54.313 1.233-.066 1.233-.697v-2.94l6.267 3.636c.54.314 1.233-.065 1.233-.696V4.308c0-.63-.693-1.01-1.233-.696L8.5 7.248v-2.94c0-.63-.692-1.01-1.233-.696L1 7.248V4a.5.5 0 0 0-.5-.5z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item" :class="{disabled:filtros.page==1}" >
                            <a class="page-link" @click="filtros.page--, list();" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                                    <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item" v-for="n in paginas" :key="n" :class="{active:filtros.page==n}">
                            <a class="page-link" @click="filtros.page=n, list();" href="#">
                                {{n}}
                            </a>
                        </li>
                        <li class="page-item" :class="{disabled:filtros.page==posgrados.last_page}" >
                            <a class="page-link" @click="filtros.page++, list();" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item" :class="{disabled:filtros.page==posgrados.last_page}" >
                            <a class="page-link" @click="filtros.page=posgrados.last_page, list();" href="#" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-forward-fill" viewBox="0 0 16 16">
                                    <path d="M15.5 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V8.753l-6.267 3.636c-.54.313-1.233-.066-1.233-.697v-2.94l-6.267 3.636C.693 12.703 0 12.324 0 11.693V4.308c0-.63.693-1.01 1.233-.696L7.5 7.248v-2.94c0-.63.693-1.01 1.233-.696L15 7.248V4a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>
<script>
export default 
    {
        data()
        {
            return{
                posgrado:
                {
                    id:0,
                    urlImagen: null,
                    facultad:null,
                    nombre:'',
                    descripcion:'',
                    titulo: '',
                    tipo_programa: null,
                    ofertado: 0,
                    imagen: false,
                },
                filtros:
                {
                    facultad:0,
                    ofertado:"none",
                    nombre:null,
                    page:1,
                    per_page:4,
                },
                selImagen: false,//para cuando seleccione una imagen
                cargando: false,
                textOfertado: '',
                errores:{},
                id:0,
                update:true,
                modal:0,
                titleModal:'',
                posgrados: [],
                facultades: [],
                tipo_programas: [],
                imagenMiniatura:'',
                paginas:[],
            }
        },
        methods:
        {
            async list()
            {
                try
                {
                    this.cargando = true;
                    const res = await axios.get('/dashboard/posgrados_api/',{params:this.filtros});
                    this.posgrados = res.data;
                    this.listarPaginas();
                    this.cargando = false;
                }
                catch(error)
                {
                    if(error.response.data)
                    {
                        this.errores = error.response.data.errors;
                    }
                }
            },
            listarPaginas()
            {
                
                const n = 2;
                let arrayN=[];
                let ini = this.filtros.page - 2;
                if(ini<1)
                {
                    ini=1;
                }
                let fin = this.filtros.page + 2;
                if(fin>this.posgrados.last_page)
                {
                    fin=this.posgrados.last_page;
                }
                for(let i=ini; i<=fin; i++)
                {
                    arrayN.push(i);
                }
                this.paginas=arrayN;    
            },
            async listarSelects()
            {
                const resF = await axios.get('/dashboard/facultades_list');
                const resT = await axios.get('/dashboard/tipo_programas_api');
                this.facultades = resF.data;
                this.tipo_programas =  resT.data;
            },
            eliminarM(id)
            {
                const confirmacion = false;
                this.$swal({
                    title: '¿Estás seguro?',
                    text: "No hay vuelta atras si lo borras",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, ¡Bórralo!',
                    cancelButtonText: 'Cancelar',
                    focusCancel: true
                }).then((result)=>
                {
                    if(result.isConfirmed)
                    {
                        this.eliminar(id);
                    }
                    else if(result.isDismissed)
                    {
                        console.log("Cancelar");
                    }
                });
            },
            async eliminar(id) 
            {
                try
                {   
                    const res = await axios.delete('/dashboard/posgrados_api/'+id)
                    .then(response=>{
                        if(response.data==1)
                        {
                            this.$swal({title: 'Exitoso',text: 'Eliminado con éxito',icon: 'success',confirmButtonText: 'Ok'});
                        }
                        else
                        {
                            this.$swal({title: 'Error!',text: 'Ha ocurrido un error' ,icon: 'error',confirmButtonText: 'Ok'});
                        }
                    });
                }
                catch(error)
                {
                    if(error.response.data)
                    {
                        this.errores = error.response.data.errors;
                    }
                }
                this.list();
            },
            ofertado(estado)
            {
                if(estado ==1)
                {
                    this.textOfertado = "Ofertado";
                }
                else
                {
                    this.textOfertado = "No Ofertado";
                } 
            },
            async save()
            {
                if(this.update)
                {
                    try
                    {
                        let fields = new FormData();
                        for(let key in this.posgrado)
                        {
                            fields.append(key,this.posgrado[key]);
                        }
                        const res = await axios.post('/dashboard/posgrados_api/'+this.id,fields)
                        .then(response=>{
                            if(response.data==1)
                            {
                                this.$swal({title: 'Exitoso',text: 'Actualizado con éxito',icon: 'success',confirmButtonText: 'Ok'});
                            }
                            else
                            {
                                this.$swal({title: 'Error!',text: 'Ha ocurrido un error' ,icon: 'error',confirmButtonText: 'Ok'});
                            }
                        });
                        this.closeModal();
                        this.list();
                    }
                    catch(error)
                    {
                        if(error.response.data)
                        {
                            this.errores = error.response.data.errors;
                        }
                    }
                }
                else
                {
                    try
                    {
                        let fields = new FormData();
                        for(let key in this.posgrado)
                        {
                            fields.append(key,this.posgrado[key]);
                        }
                        const res = await axios.post('/dashboard/posgrados_api', fields)
                        .then(response=>{
                            if(response.data==1)
                            {
                                this.$swal({title: 'Exitoso',text: 'Guardado con éxito',icon: 'success',confirmButtonText: 'Ok'});
                            }
                            else
                            {
                                this.$swal({title: 'Error!',text: 'Ha ocurrrido algo...',icon: 'error',confirmButtonText: 'Ok'});
                            }
                        });
                        this.closeModal();
                        this.list();
                    }
                    catch(error)
                    {
                        if(error.response.data)
                        {
                            this.errores = error.response.data.errors;
                        }
                    }
                }

            },
            openModal(data={}) 
            {
                this.modal=1;
                try
                {
                    if(this.update)
                    {
                        this.titleModal = "Modificar Posgrado";
                        this.id=data.id;
                        this.posgrado.id = data.id
                        this.posgrado.urlImagen = data.urlImagen;
                        this.posgrado.facultad = data.facultad.id;
                        this.posgrado.nombre = data.nombre;
                        this.posgrado.descripcion = data.descripcion;
                        this.posgrado.titulo = data.titulo;
                        this.posgrado.tipo_programa = data.tipo_programa.id;
                        this.posgrado.ofertado = data.ofertado;
                        this.posgrado.imagen = false;
                        this.ofertado(data.ofertado);
                    }
                    else
                    {
                        this.ofertado(data.ofertado);
                        this.titleModal = "Agregar nuevo Posgrado";
                        this.id=0;
                        this.posgrado.urlImagen = null;
                        this.posgrado.facultad = 0;
                        this.posgrado.nombre = '';
                        this.posgrado.descripcion = '';
                        this.posgrado.titulo = '';
                        this.posgrado.tipo_programa = 0;
                        this.posgrado.ofertado = 0;
                        this.posgrado.imagen = true;
                    }
                }
                catch(error)
                {
                    if(error.response.data)
                    {
                        this.errores = error.response.data.errors;
                        console.log(this.errores);
                    }
                }
            },
            closeModal() 
            {
                
                this.errores ={};
                this.selImagen = false;
                this.$refs.urlImg.value=null;
                this.posgrado.urlImagen = null;
                this.imagenMiniatura='';
                this.modal=0;
                this.textOfertado = '';

            },
            obtenerImagen(e)
            {
                this.posgrado.imagen = true;
                this.selImagen = true;
                this.posgrado.urlImagen=e.target.files[0];
                this.cargarImagen(this.posgrado.urlImagen); 
            },
            cargarImagen(file)
            {
                let reader = new FileReader();
                reader.onload = e=>
                {
                    this.imagenMiniatura =e.target.result;
                }
                reader.readAsDataURL(file);
            },
        },
        created()
        {
            try 
            {
                this.list();
                this.listarSelects();
            } 
            catch (error) 
            {
                console.log(error)
                this.cargando = false
            }
        },
        computed:
        {
            imagen()
            {
                return this.imagenMiniatura;
            },
        }
}
</script>