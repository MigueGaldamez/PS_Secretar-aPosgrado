<template>
    <div class="row">
        <!-- Modal -->
        <div  class="modal fade" id="exampleModal" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{tituloModal}}</h5>
                        <button @click="cerrarModal();" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  
                    </div>
                    <form v-on:submit.prevent="guardar" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div  class="mb-3 col-sm-6">
                                    <label for="formFile" class="form-label">Imagen representativa del noticia</label>
                                    <input ref="urlImg"  accept="image/*" class="form-control" type="file" name="urlImagen" @change="obtenerImagen">
                                    <span class="text-danger" v-if="errores.urlImagen">{{errores.urlImagen[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <img v-if="selImagen" :src="imagen" class="img-thumbnail" alt="...">
                                </div>
                                <div class="mb-3 col-sm-12" >
                                    <label for="titulo" class="form-label">Titulo</label>
                                    <input v-model="noticia.titulo" class="form-control" type="text" placeholder="Titulo de la noticia" aria-label="Titulo de la noticia">
                                    <span class="text-danger" v-if="errores.titulo">{{errores.titulo[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <input class="form-check-input" @change="publicado(noticia.publicado)" v-model="noticia.publicado" true-value="1" false-value="0" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label"  for="flexSwitchCheckDefault">{{textPublicado}}</label>
                                    <span class="text-danger" v-if="errores.publicado">{{errores.publicado[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-6 form-check form-switch">
                                    <input class="form-check-input" v-model="noticia.destacado " true-value="1" false-value="0" id="flexSwitchCheckDefault" type="checkbox" role="switch">
                                    <label class="form-check-label"  for="flexSwitchCheckDefault">Destacado</label>
                                    <span class="text-danger" v-if="errores.destacado">{{errores.destacado[0]}}</span>
                                </div>   
                            </div>         
                        </div>
                        <div class="modal-footer">
                            <button @click="guardar();" type="button" class="btn btn-success" data-bs-dismiss="modal">Guardar</button>
                            <button v-on:click="cerrarModal();" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
        <!--FinModal-->
        <div v-if="cargando" class="d-flex align-items-center justify-content-center m-3">
            <strong>Cargando Datos...</strong>
            <div class="">
                <div class="spinner-grow text-danger" role="status"></div>
                <div class="spinner-grow text-warning" role="status"></div>
                <div class="spinner-grow text-info" role="status"></div>
            </div>
        </div>
        <div class="col-sm-4">
            <label for="customRange3" class="form-label">Mostrando: {{noticias.from}} - {{noticias.to }} | Total: {{noticias.total}}</label>
        </div>
        <div class="col-sm-12">
            <button @click="modificar=false; abrirModal();" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-success ">
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
                <select @change="listar();" v-model="filtros.per_page" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>Seleccione:</option>
                    <option value="4">4</option>
                    <option value="8">8</option>
                    <option value="12">12</option>
                    <option value="20">20</option>
                </select>
            </div>
        </div>
        <form @submit.prevent="listar">
            <div class="row mt-1 mb-1">
                <div class="col-sm-4">
                    <label  class="form-label">Titulo</label>
                    <input v-model="filtros.titulo"  class="form-control" type="text" placeholder="Titulo" aria-label="Titulo de la noticia">
                </div>
                <div class="col-sm-2">
                    <label  class="form-label">Publicado</label>
                    <select v-model="filtros.publicado"  class="form-select " aria-label="Publicado">
                        <option value="none">Todo:</option>
                        <option value="1">Publicado</option>
                        <option value="0">No publicado</option>
                    </select>
                </div>
                <div class="col-sm-1 align-self-end">
                    <button @click="listar();"  type="submit" class="btn btn-outline-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
        <table class="table table-striped table-sm table-hover text-center">
            <thead class="table-dark"> 
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Publicado/Destacado</th>
                    <th scope="col">Creado</th>
                    <th scope="col">Detalle de la Noticia</th>                                
                    <th scope="col"  class="text-center">Acciones</th>                           
                </tr>
            </thead>
            <tbody>
                <tr v-for="noti in noticias.data" :key="noti.id">
                    <td><img :src="noti.urlImagen" class="img-thumbnail" ></td>
                    <td>{{noti.titulo}}</td>
                    <td>
                            <div v-if="noti.publicado ==1" class="text-success"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                </svg>
                            </div>
                            <div v-else class="text-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                                    <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
                                </svg>
                            </div>
                            <div v-if="noti.destacado ==1"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" text-warning bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                            </div>
                    </td>
                    <td>{{noti.created_at}}</td>
                    <td>
                        <a role="button" :href="'noticia/'+noti.id+'/detalle'"   class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Agrega un Detalle " >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-plus" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z"/>
                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                            </svg>
                        </a>
                        <a role="button" :href="'noticia/'+noti.id"   class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver Noticia Completa " >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-richtext" viewBox="0 0 16 16">
                                <path d="M7.5 3.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm-.861 1.542 1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047L11 4.75V7a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 7v-.5s1.54-1.274 1.639-1.208zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                            </svg>
                        </a>
                        
                    </td>
                    <td  class="text-center ">
                        <button  type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#exampleModal"  @click="modificar=true; abrirModal(noti);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg>
                        </button>                          
                        <button type="button" @click="eliminarM(noti.id);" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-sm-4 text-center">
                <nav>
                    <ul class="pagination">
                        <li class="page-item" :class="{disabled:filtros.page==1}" >
                            <a class="page-link" @click="filtros.page=1, listar();" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-backward-fill" viewBox="0 0 16 16">
                                    <path d="M.5 3.5A.5.5 0 0 0 0 4v8a.5.5 0 0 0 1 0V8.753l6.267 3.636c.54.313 1.233-.066 1.233-.697v-2.94l6.267 3.636c.54.314 1.233-.065 1.233-.696V4.308c0-.63-.693-1.01-1.233-.696L8.5 7.248v-2.94c0-.63-.692-1.01-1.233-.696L1 7.248V4a.5.5 0 0 0-.5-.5z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item" :class="{disabled:filtros.page==1}" >
                            <a class="page-link" @click="filtros.page--, listar();" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                                    <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item" v-for="n in paginas" :key="n" :class="{active:filtros.page==n}">
                            <a class="page-link" @click="filtros.page=n, listar();" href="#">
                                {{n}}
                            </a>
                        </li>
                        <li class="page-item" :class="{disabled:filtros.page==noticias.last_page}" >
                            <a class="page-link" @click="filtros.page++, listar();" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item" :class="{disabled:filtros.page==noticias.last_page}" >
                            <a class="page-link" @click="filtros.page=noticias.last_page, listar();" href="#" >
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
    export default {
        components: {
        },
        data(){
            return{
                noticia:{
                    id:'',
                    urlImagen: null,
                    titulo:'',
                    publicado: 0,
                    imagen: false,
                    destacado: 0,
                },
                filtros:
                {
                    titulo:null,
                    publicado:"none",
                    page:1,
                    per_page:4,
                },
                selImagen: false,//para cuando seleccione una imagen
                cargando: false,
                textPublicado: '',
                id:0,
                modificar:true,
                modal:0,
                noticias:[],
                tituloModal:'',
                errores:{},
                imagenMiniatura:'',
                paginas:[],
            }
        },
        methods:{
            async listar()
            {
                this.cargando = true;
                const res = await axios.get('/dashboard/noticia_api/',{params:this.filtros,});
                this.noticias = res.data;
                this.listarPaginas();
                this.cargando = false;
            },
            listarPaginas(){
                const n = 2;
                let arrayN=[];
                let ini = this.filtros.page - 2;
                if(ini<1){
                    ini=1;
                }
                let fin = this.filtros.page + 2;
                if(fin>this.noticias.last_page){
                    fin=this.noticias.last_page;
                }
                for(let i=ini; i<=fin; i++){
                    arrayN.push(i);
                }
                this.paginas=arrayN;    
            },
            publicado(estado)
            {
                if(estado ==1)
                {
                    this.textPublicado = "Publicado";
                }
                else
                {
                    this.textPublicado = "No Publicado";
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
                    const res = await axios.delete('/dashboard/noticia_api/'+id)
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
                    }
                }
                this.listar();
            },
            async guardar(){
                try{
                    if(this.modificar)
                    {
                        
                        try
                        {
                            let fields = new FormData();
                            for(let key in this.noticia)
                            {
                                fields.append(key,this.noticia[key]);
                            }
                            //.then(response=>{console.log(response.data)})
                            const res = await axios.post('/dashboard/noticia_api/'+this.id,fields)
                            .then(response=>{
                                if(response.data==1)
                                {
                                    this.$swal({title: 'Exitoso',text: 'Actualizado con éxito',icon: 'success',confirmButtonText: 'Ok'});
                                }
                                else
                                {
                                    this.$swal({title: 'Error!',text: response.data ,icon: 'error',confirmButtonText: 'Ok'});
                                }
                            });
                            this.cerrarModal();
                            this.listar();
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
                        let fields = new FormData();
                        for(let key in this.noticia)
                        {
                            fields.append(key,this.noticia[key]);
                        }
                        const res = await axios.post('/dashboard/noticia_api',fields)
                        .then(response=>{
                            if(response.data==1)
                            {
                                this.$swal({title: 'Exitoso',text: 'Guardado con éxito',icon: 'success',confirmButtonText: 'Ok'});
                            }
                            else
                            {
                                this.$swal({title: 'Error!',text: response.data ,icon: 'error',confirmButtonText: 'Ok'});
                            }
                        });   
                    }  
                    this.cerrarModal();
                    this.listar();      
                }catch(error){
                    if(error.response.data){
                        this.errores = error.response.data.errors;
                    }
                }
            },
            abrirModal(data={})
            {
                this.modal=1;
                if(this.modificar){
                    this.tituloModal = "Modificar Noticia";
                    this.id=data.id;
                    this.noticia.id = data.id;
                    this.noticia.titulo=data.titulo;
                    this.noticia.urlImagen = data.urlImagen;
                    this.noticia.publicado = data.publicado;
                    this.noticia.destacado = data.destacado;
                    this.noticia.imagen = false;
                    this.publicado(data.publicado);
                }
                else{
                    this.id=0;
                    this.noticia.id = 0;
                    this.tituloModal='Agregar Noticia' 
                    this.noticia.titulo='';
                    this.noticia.urlImagen = null;
                    this.noticia.publicado = 0;
                    this.noticia.destacado = 0;
                    this.publicado(data.publicado);
                    this.noticia.imagen = true;
                }
            },
            cerrarModal(){
                this.modal=0;
                this.selImagen = false;
                this.$refs.urlImg.value=null;
                this.noticia.urlImagen = null;
                this.imagenMiniatura='';
                this.errores={};
            },
            obtenerImagen(e)
            {
                this.noticia.imagen = true;
                this.selImagen = true;
                this.noticia.urlImagen=e.target.files[0];
                this.cargarImagen(this.noticia.urlImagen); 
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
        created(){
            this.listar();
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
<style>
.ver
{
    display: list-item;
    opacity: 1;
}
</style>