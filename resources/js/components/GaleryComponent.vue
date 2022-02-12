<template>
<div>
      
    <div class="row">
        <!-- Modal -->
        <div  class="modal fade" :class="{show:modal, ver:modal}" id="exampleModal" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">{{titleModal}}</h5>
                        <button @click="closeModal();" type="button" class="btn-close"  aria-label="Close"></button>
                    </div>
                    <form v-on:submit.prevent="save" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="mb-3 col-sm-6">
                                    <label for="formFile" class="form-label">Imagen</label>
                                    <input ref="urlImg" accept="image/*" class="form-control" type="file" name="urlImagen" @change="obtenerImagen">
                                    <span class="text-danger" v-if="errores.urlImagen">{{errores.urlImagen[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <img v-if="selImagen" :src="imagen" class="img-thumbnail" alt="...">
                                </div>
                                <div class="mb-3 col-sm-12" >
                                    <label  class="form-label">Título</label>
                                    <input v-model="galery.titulo" class="form-control" type="text" placeholder="Título" aria-label="Titulo de la imagen">
                                    <span class="text-danger" v-if="errores.titulo">{{errores.titulo[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-12" >
                                    <label  class="form-label">Subtítulo</label>
                                    <input v-model="galery.subtitulo" class="form-control" type="text" placeholder="Subtítulo" aria-label="Subtitulo de la imagen">
                                    <span class="text-danger" v-if="errores.subtitulo">{{errores.subtitulo[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-4" >
                                    <label  class="form-label">Categoría</label>
                                    <select  v-model="galery.orden" class="form-select" aria-label="Default select example" id="Orden">
                                        <option value="0" selected>Seleccione La Categoría</option>
                                        <option value="1">Campus</option>
                                        <option value="2">Arte, Cultura y Deporte</option>
                                        <option value="3">Eventos académicos</option>
                                        <option value="4">Investigación y Proyección Social</option>
                                    </select> 
                                    <span class="text-danger" v-if="errores.orden">{{errores.orden[0]}}</span>                               
                                </div>
                            </div>         
                        </div>
                        <div class="modal-footer">
                            <button @click="save();" type="button" class="btn btn-success" >Guardar</button> 
                            <button v-on:click="closeModal();" type="button" class="btn btn-secondary" >Cerrar</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
     
        <div v-if="cargando" class="d-flex align-items-center justify-content-center m-3">
            <strong>Cargando Datos...</strong>
            <div class="">
                <div class="spinner-grow text-danger" role="status"></div>
                <div class="spinner-grow text-warning" role="status"></div>
                <div class="spinner-grow text-info" role="status"></div>
            </div>
        </div>
        <div class="col-sm-4">
            <label for="customRange3" class="form-label">Mostrando: {{galeries.from}} - {{galeries.to }} | Total: {{galeries.total}}</label>
        </div>
            <!-- Button trigger modal -->
        <div class="col-sm-12">
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
                <select @change="pagination.page=1; list();" v-model="pagination.per_page" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>Seleccione:</option>
                    <option value="4">4</option>
                    <option value="8">8</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
            </div>
        </div>
        <div class="col-sm-3" v-for="galery in galeries.data" :key="galery.id">
            <div class="card p-2 h-100" >
                <img :src="galery.urlImagen" class="card-img-top h-50 imagenView" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">{{galery.titulo}}</h5>
                        <p class="card-text ">{{galery.subtitulo}}</p>
                    <div class="position-relative bottom-0 start-50 translate-middle-x mb-1 ">
                        <button type="button"  @click="update=true; openModal(galery);"  class="btn btn-info">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg>
                        </button>
                        <button type="button" @click="update=true; eliminarM(galery.id);"  class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 text-center">
                <nav>
                    <ul class="pagination">
                        <li class="page-item" :class="{disabled:pagination.page==1}" >
                            <a class="page-link" @click="pagination.page=1, list();" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-backward-fill" viewBox="0 0 16 16">
                                    <path d="M.5 3.5A.5.5 0 0 0 0 4v8a.5.5 0 0 0 1 0V8.753l6.267 3.636c.54.313 1.233-.066 1.233-.697v-2.94l6.267 3.636c.54.314 1.233-.065 1.233-.696V4.308c0-.63-.693-1.01-1.233-.696L8.5 7.248v-2.94c0-.63-.692-1.01-1.233-.696L1 7.248V4a.5.5 0 0 0-.5-.5z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item" :class="{disabled:pagination.page==1}" >
                            <a class="page-link" @click="pagination.page--, list();" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                                    <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item" v-for="n in paginas" :key="n" :class="{active:pagination.page==n}">
                            <a class="page-link" @click="pagination.page=n, list();" href="#">
                                {{n}}
                            </a>
                        </li>
                        <li class="page-item" :class="{disabled:pagination.page==galeries.last_page}" >
                            <a class="page-link" @click="pagination.page++, list();" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item" :class="{disabled:pagination.page==galeries.last_page}" >
                            <a class="page-link" @click="pagination.page=galeries.last_page, list();" href="#" >
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
     <div id="visorImagen">
            <span class="close">&times;</span>
            <img class="modal-content" id="full-image">
        </div>
</div>
</template>
<script>
export default {
    data(){
        return{
            galery:
            {
                id:0,
                urlImagen: null,
                titulo: '',
                subtitulo: '',
                imagen: false,
                orden: '',
            },
            cargando: false,
            selImagen: false,//para cuando seleccione una imagen
            errores: {},
            update:true,
            modal:0,
            titleModal:'',
            galeries:[],
            id:0,
            imagenMiniatura:'',
            pagination:{
                page:1,
                per_page:4,
            },
            paginas:[],
        }
    },
    methods: {
        async list()
        {
            try
            {
                this.cargando = true;
                const res = await axios.get('/dashboard/galery_api',{params:this.pagination,});
                this.galeries = res.data;
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
            let ini = this.pagination.page - 2;
            if(ini<1)
            {
                ini=1;
            }
            let fin = this.pagination.page + 2;
            if(fin>this.galeries.last_page)
            {
                fin=this.galeries.last_page;
            }
            for(let i=ini; i<=fin; i++)
            {
                arrayN.push(i);
            }
            this.paginas=arrayN;    
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
                const res = await axios.delete('/dashboard/galery_api/'+id);
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
        async save() {
            if(this.update)
            {
                try
                {
                    let fields = new FormData();
                    for(let key in this.galery)
                    {
                        fields.append(key,this.galery[key]);
                    }
                    const res = await axios.post('/dashboard/galery_api/'+this.id, fields)
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
                    for(let key in this.galery)
                    {
                        fields.append(key,this.galery[key]);
                    }
                    //.then(response=>{console.log(response.data)})
                    const res = await axios.post('/dashboard/galery_api', fields)
                    .then(response=>{
                        if(response.data==1)
                        {
                            this.$swal({title: 'Exitoso',text: 'Guardado con éxito',icon: 'success',confirmButtonText: 'Ok'});
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

        },
        openModal(data={}) {
            this.modal=1
            if (this.update)
            {
                this.titleModal = "Modificar Imagend de galería";
                this.id=data.id;
                this.galery.id = data.id;
                this.galery.urlImagen = data.urlImagen;
                this.galery.titulo = data.titulo;
                this.galery.subtitulo = data.subtitulo;
                this.galery.imagen = false;
                this.galery.orden = data.orden;
            }
            else
            {
                this.id=0;
                this.titleModal = "Agregar una Imagen a la galería";
                this.galery.urlImagen = null;
                this.galery.titulo = '';
                this.galery.subtitulo = '';
                this.galery.imagen = true;
                this.galery.orden = 0;
            }
        },
        closeModal() {
            this.selImagen = false;
            this.errores = {};
            this.$refs.urlImg.value=null;
            this.imagenMiniatura='';
            this.modal=0
        },
        obtenerImagen(e)
        {
            this.galery.imagen = true;
            this.selImagen = true;
            this.galery.urlImagen=e.target.files[0];
            this.cargarImagen(this.galery.urlImagen); 
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
        this.list();
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
