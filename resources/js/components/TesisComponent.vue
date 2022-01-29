<template>
    <div class="row">
        <!-- Modal -->
        <div  class="modal fade" :class="{show:modal, ver:modal}" id="exampleModal" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content modal-lg">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">{{titleModal}}</h5>
                        <button @click="closeModal();" type="button" class="btn-close"  aria-label="Close"></button>
                    </div>
                    <form v-on:submit.prevent="save" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="mb-3 col-sm-6 offset-sm-3">
                                    <label for="nombre" class="form-label">Facultad</label>
                                    <select @change="listPosgrado();" v-model="tesi.facultad"  class="form-select" aria-label="facultad">
                                        <option value=0 >Selecciona una Facultad</option>
                                        <option v-for="facultad in facultades" :key="facultad.id" v-bind:value="facultad.id"> {{facultad.nombre}}</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-sm-6 ">
                                    <label for="nombre" class="form-label">Posgrado al que pertenece</label>
                                    <select :disabled="loadingSelectPos"  v-model="tesi.posgrado"  class="form-select" aria-label="posgrado">
                                        <option value=0 >Selecciona un Posgrado</option>
                                        <option v-for="posgrado in posgrados" :key="posgrado.id" v-bind:value="posgrado.id"> {{posgrado.nombre}}</option>
                                    </select>
                                    <span class="text-danger" v-if="errores.posgrado">{{errores.posgrado[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="publicado" class="form-label">Año publicado</label>
                                    <input class="form-control" type="number" v-model="tesi.publicado" name="tentacles" min="1800">
                                    <span class="text-danger" v-if="errores.publicado">{{errores.publicado[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <label for="titulo" class="form-label">Titulo</label>
                                    <textarea v-model="tesi.titulo" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                                    <span class="text-danger" v-if="errores.titulo">{{errores.titulo[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <label for="autor" class="form-label">Autor/es</label>
                                    <textarea v-model="tesi.autor" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                                    <span class="text-danger" v-if="errores.autor">{{errores.autor[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <label for="link" class="form-label">Link</label>
                                    <input class="form-control" type="url" v-model="tesi.link" name="link" id="url" placeholder="https://ejemplo.com" pattern="https://.*">
                                    <span class="text-danger" v-if="errores.link">{{errores.link[0]}}</span> 
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <input class="form-check-input" v-model="tesi.estado" true-value="1" false-value="0" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label"  for="flexSwitchCheckDefault">Terminado</label>
                                    <br><small>Una vez cambie el estado a "Terminado" este cambiará del apartado de investigaciones al apartado de tesis</small>
                                    <span class="text-danger" v-if="errores.estado">{{errores.estado[0]}}</span>
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
        <div class="col-sm-4">
            <label for="customRange3" class="form-label">Mostrando: {{tesis.from}} - {{tesis.to }} | Total: {{tesis.total}}</label>
        </div>
        <div class="col-xm-12">
            <button @click="update=false; openModal();"  type="button" class="btn btn-success ">
                Nuevo
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg> 
            </button>
        </div>
        <div class="row mt-1 mb-1">
            <div class="col-sm-1">
                <label  class="form-label">Mostrar:</label>
                <select @change=" filtros.page=1; list();" v-model="filtros.per_page" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>Seleccione:</option>
                    <option value="4">4</option>
                    <option value="8">8</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
            </div>
        </div>
        <form @submit.prevent="list">
            <div class="row mt-1 mb-1">
                <div class="col-sm-3">
                    <label  class="form-label">Facultad</label>
                    <select @change="listPosgradoFiltro(); " v-model="filtros.facultad" class="form-select" aria-label="facultad">
                        <option value=0 >Todas las facultades</option>
                        <option v-for="facultad in facultades" :key="facultad.id" v-bind:value="facultad.id"> {{facultad.nombre}}</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="nombre" class="form-label">Posgrado al que pertenece</label>
                    <select :disabled="loadingSelectPos"  v-model="filtros.posgrado"  class="form-select" aria-label="posgrado">
                        <option value=0 >Todos los posgrados</option>
                        <option v-for="posgrado in posgrados" :key="posgrado.id" v-bind:value="posgrado.id"> {{posgrado.nombre}}</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <label  class="form-label">Título</label>
                    <input v-model="filtros.titulo"  class="form-control" type="text" placeholder="Titulo" aria-label="Titulño">
                </div>
                <div class="col-sm-1">
                    <label for="publicado" class="form-label">publicado:</label>
                    <input class="form-control" type="number" v-model="filtros.publicado" name="publicado" min="1800">
                </div>
                <div class="col-sm-2">
                    <label  class="form-label">Estado</label>
                    <select v-model="filtros.estado"  class="form-select " aria-label="estado">
                        <option value="none">Seleccione:</option>
                        <option value="1">Termiando</option>
                        <option value="0">En Proceso</option>
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
        <div class="col-xm-12 col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered border-primary ">
                    <thead class="text-center table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th>Posgrado</th>
                            <th>Publicado</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Link</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr v-for="tesi in tesis.data" :key="tesi.id">
                            <th >{{tesi.id}}</th>
                            <td>{{tesi.posgrado.nombre}}</td>
                            <td>{{tesi.publicado}}</td>
                            <td>{{tesi.titulo}}</td>
                            <td>{{tesi.autor}}</td>
                            <td>
                                <a class="btn btn-primary" :href="tesi.link" role="button">Link</a>
                            </td>
                            <td>
                                <button type="button" @click="update=true; openModal(tesi);"  class="btn btn-outline-info btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg>
                                </button>
                                <button type="button" @click="update=true; eliminarM(tesi.id);" class="btn btn-outline-danger btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                </button>
                            </td>   
                        </tr>
                    </tbody>
                </table>
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
                        <li class="page-item" :class="{disabled:filtros.page==tesis.last_page}" >
                            <a class="page-link" @click="filtros.page++, list();" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item" :class="{disabled:filtros.page==tesis.last_page}" >
                            <a class="page-link" @click="filtros.page=tesis.last_page, list();" href="#" >
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
                tesi:
                {
                    id:0,
                    facultad: 0,
                    posgrado:null,
                    publicado: null,
                    titulo:'',
                    autor:'',
                    link:'',
                    estado: "0",
                },
                filtros:
                {
                    facultad:0,
                    posgrado:0,
                    titulo: null,
                    publicado: null,
                    estado: "none",
                    page:1,
                    per_page:8,
                },
                loadingSelectPos : true,
                contSelect :0,
                cargando: false,
                errores:{},
                id:0,
                update:true,
                modal:0,
                titleModal:'',
                facultades: [],
                posgrados: [],
                tesis:[],
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
                    const res = await axios.get('/dashboard/tesis_api',{params:this.filtros});
                    this.tesis = res.data;
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
                if(fin>this.tesis.last_page)
                {
                    fin=this.tesis.last_page;
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
                this.facultades = resF.data;
            },
            async listPosgradoFiltro()
            {
                this.loadingSelectPos = true;
                const resP = await axios.get('/dashboard/posgrados_list/'+this.filtros.facultad);
                this.posgrados = resP.data;
                this.loadingSelectPos = false;
                this.filtros.posgrado=0
            },
            async listPosgrado()
            {
                
                this.loadingSelectPos = true;
                const resP = await axios.get('/dashboard/posgrados_list/'+this.tesi.facultad);
                this.posgrados = resP.data;
                this.loadingSelectPos = false;
                if (this.contSelect ==1)
                {
                    this.contSelect++;
                }
                else
                {
                    this.tesi.posgrado=0
                }
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
                    const res = await axios.delete('/dashboard/tesis_api/'+id)
                    .then(response=>{
                        if(response.data==1)
                        {
                            this.$swal({title: 'Exitoso',text: 'Eliminado con éxito',icon: 'success',confirmButtonText: 'Ok'});
                        }
                        else
                        {
                            this.$swal({title: 'Error!',text: response.data ,icon: 'error',confirmButtonText: 'Ok'});
                        }
                    });
                }
                catch(error)
                {
                    if(error.response.data)
                    {
                        this.errores = error.response.data.errors;
                        console.log(this.errores);
                    }
                }
                this.list();
            },
            async save()
            {
                if(this.update)
                {
                    try
                    {
                        let fields = new FormData();
                        for(let key in this.tesi)
                        {
                            fields.append(key,this.tesi[key]);
                        }
                        const res = await axios.put('/dashboard/tesis_api/'+this.id, this.tesi)
                        .then(response=>{
                            if(response.data==1)
                            {
                                this.$swal({title: 'Exitoso',text: 'Actualizado con éxito',icon: 'success',confirmButtonText: 'Ok'});
                            }
                            else
                            {
                                this.$swal({title: 'Error!',text: console.log(response.data) ,icon: 'error',confirmButtonText: 'Ok'});
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
                        for(let key in this.tesi)
                        {
                            fields.append(key,this.tesi[key]);
                        }
                        //.then(response=>{console.log(response.data)})
                        const res = await axios.post('/dashboard/tesis_api', fields)
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
                this.modal=1
                try
                {
                    if(this.update)
                    {
                        this.titleModal = "Modificar Tesis";
                        this.id=data.id;
                        this.tesi.id = data.id;
                        this.tesi.facultad = data.posgrado.facultad.id;
                        this.listPosgrado();
                        this.contSelect = 1;
                        this.tesi.posgrado= data.posgrado.id;
                        this.tesi.publicado= data.publicado;
                        this.tesi.titulo = data.titulo;
                        this.tesi.autor = data.autor;
                        this.tesi.link = data.link;
                        this.tesi.estado = data.estado;
                    }
                    else
                    {
                        this.titleModal = "Agregar Tesis";
                        this.id=0;
                        this.tesi.facultad= 0;
                        this.tesi.posgrado= 0;
                        this.tesi.publicado= new Date().getFullYear();
                        this.tesi.titulo = "";
                        this.tesi.autor = "";
                        this.tesi.link = "";
                        this.tesi.estado = 0;
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
                this.errores = {},
                this.modal=0
            },
        },
        created()
        {
            try 
            {
                this.listarSelects();
                this.list();
            } 
            catch (error) 
            {
                console.log(error)
                this.cargando = false
            }
        },
        computed:
        {
            
        }
    }
</script>
