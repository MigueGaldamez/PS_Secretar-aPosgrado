<template>
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
            <hr/>    
                <div class="row">
                    <div class="col-3 md-3">
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#nuevo-Modal" @click="modificar=false;abrirModal();">
                            Nuevo
                        </button>

                            <!-- Modal -->
                        <div class="modal fade" id="nuevo-Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{tituloModal}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="my-4">
                                            <label for="titulo">Titulo Noticia</label>
                                            <input v-model="noticia.titulo" type="text" class="form-control" placeholder="Titulo Noticia" id="titulo">
                                            <span class="text-danger" v-if="errores.titulo">{{errores.titulo[0]}}</span>
                                        </div>
                                        <div class="my-4">
                                            <label for="fechaPublicacion">Fecha</label>
                                            <input v-model="noticia.fechaPublicacion" type="date" class="form-control" placeholder="Fecha" id="fechaPublicacion">
                                            <span class="text-danger" v-if="errores.fechaPublicacion">{{errores.fechaPublicacion[0]}}</span>
                                        </div>
                                       <div class="my-4">
                                            <label for="autor">Autor</label>
                                            <input v-model="noticia.autor" type="text" class="form-control" placeholder="Nombre Autor" id="autor">
                                            <span class="text-danger" v-if="errores.autor">{{errores.autor[0]}}</span>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="button"  @click="guardar();" class="btn btn-primary"  data-bs-dismiss="modal">Guardar Cambios</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!--FinModal-->
                             <div class="modal fade" id="texto-Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Agregar detalles a noticia</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                   
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="button"  @click="guardar();" class="btn btn-primary"  data-bs-dismiss="modal">Guardar Cambios</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!--FinModal-->
                    </div>
                    <div class="col-3 md-3">
                        {{noticias.from}} - {{noticias.to }} total: {{noticias.total}}
                    </div>
                    <div class="col-3 md-3">                        
                        <select class=" form-control form-select form-select-sm" v-model="pagination.per_page" @change="listar();">
                        <option selected>Elementos por pagina</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        </select>
                    </div>
                </div>
                <br>
                <table class="table table-striped table-sm table-hover text-center">
                    <thead class="table-dark"> 
                        <tr>
                            
                            <th scope="col">Nombre</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Descripcion</th>                            
                            <th scope="col"  class="text-center">Acciones</th>                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="noti in noticias.data" :key="noti.id">
                            
                            <td>{{noti.titulo}}</td>
                            <td>{{noti.fechaPublicacion}}</td>
                            <td>{{noti.autor}}</td>
                            <td  class="text-center ">   
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" :data-bs-target="'#nuevo-Modal'" @click="modificar=true; abrirModal(noti);">
                                Editar
                                </button>
                                                            
                                <button type="button" class="btn btn-danger btn-sm text-light" data-bs-toggle="modal" :data-bs-target="'#eliminarModal_'+noti.id">
                                    Eliminar
                                </button>
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" :data-bs-target="'#texto-Modal'" @click="modificar=true; abrirModal(noti);">
                                    Agregar texto a noticia 
                                </button>
                            </td>
                            
                            <!-- Modal -->
                            <div class="modal fade" :id="'eliminarModal_'+noti.id"  tabindex="-1" :aria-labelledby="'eliminarModalLabel_'+noti.id" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" :id="'eliminarModalLabel_'+noti.id">Seguro que due desea eliminar este registro?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Seguro que desea eliminar el registro <b>{{noti.titulo}}</b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-danger" @click="eliminar(noti.id);" data-bs-dismiss="modal">Si, Eliminar</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin Modal eliminar-->
                        </tr>
                        
                    
                    </tbody>
                </table>
                <div class="row">
                    
                    <div class="col-6 md-6 text-center">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item" :class="{disabled:pagination.page==1}" ><a class="page-link" @click="pagination.page=1, listar();" href="#"><span>&laquo;</span></a></li>
                                <li class="page-item" :class="{disabled:pagination.page==1}" ><a class="page-link" @click="pagination.page--, listar();" href="#">&#60;</a></li>
                                <li class="page-item" v-for="n in paginas" :key="n" :class="{active:pagination.page==n}"><a class="page-link" @click="pagination.page=n, listar();" href="#">{{n}}</a></li>
                                <li class="page-item" :class="{disabled:pagination.page==noticias.last_page}"><a class="page-link" @click="pagination.page++, listar();" href="#">&#62;</a></li>
                                <li class="page-item" :class="{disabled:pagination.page==noticias.last_page}"><a class="page-link" @click="pagination.page=noticias.last_page,listar();" href="#" ><span >&raquo;</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            
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
                    titulo:'',
                    fechaPublicacion:'',
                    autor:'',
                }
                ,
                id:0,
                modificar:true,
                modal:0,
                noticias:[],
                tituloModal:'',
                errores:{},
                pagination:{
                    page:1,
                    per_page:5,

                },
                paginas:[],
            }
        },
        methods:{
            async listar(){
                const res = await axios.get('/dashboard/noticia/',{params:this.pagination,});
                this.noticias = res.data;
                this.listarPaginas();

            },
            listarPaginas(){
                const n = 2;
                let arrayN=[];
                let ini = this.pagination.page - 2;
                if(ini<1){
                    ini=1;
                }
                let fin = this.pagination.page + 2;
                if(fin>this.noticias.last_page){
                    fin=this.noticias.last_page;
                }
                for(let i=ini; i<=fin; i++){
                    arrayN.push(i);
                }
                this.paginas=arrayN;    
            },
            async eliminar(id){
                const res = await axios.delete('/dashboard/noticia/'+id);
                this.cerrarModal();
                this.listar();

            },
            async guardar(){
                try{

                    if(this.modificar){
                        const res = await axios.put('/dashboard/noticia/'+this.id,this.noticia);     
                    }
                    else{
                        const res = await axios.post('/dashboard/noticia/',this.noticia);   
                    }  
                    this.cerrarModal();
                    this.listar();      

                }catch(error){
                    if(error.response.data){
                        this.errores = error.response.data.errors;
                    }
                }

            },
            abrirModal(data={}){
                
                if(this.modificar){
                    this.tituloModal = "Modificar Noticia";
                    this.id=data.id;
                    this.noticia.id = data.id;
                    this.noticia.titulo=data.titulo;
                    this.noticia.fechaPublicacion=data.fechaPublicacion;
                    this.noticia.autor=data.autor;   
                }
                else{
                    this.id=0;
                    this.noticia.id = 0;
                    this.tituloModal='Agregar Noticia' 
                    this.noticia.titulo='';
                    this.noticia.fechaPublicacion='';
                    this.noticia.autor='';    
                }
            },
            cerrarModal(){
                this.modal=0;
                this.errores={};
            },
        },
        created(){
            this.listar();
        }
    }
</script>