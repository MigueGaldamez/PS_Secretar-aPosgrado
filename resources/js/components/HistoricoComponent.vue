<template>
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
            <hr/>    
                <div class="row">
                    <div class="col-3 md-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevo-Modal" @click="modificar=false;abrirModal();">
                         Nuevo registro Historico
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
                                            <label for="anio">Año reseña</label>
                                            <input v-model="reseniaHistorica.anio" type="text" class="form-control" placeholder="Año reseña" id="anio">
                                            <span class="text-danger" v-if="errores.anio">{{errores.anio[0]}}</span>
                                        </div>
                                        <div class="my-4">
                                            <label for="importancia">Importancia</label>
                                            <select  v-model="reseniaHistorica.importancia" class="form-select" aria-label="Default select example" placeholder="Importancia" id="importancia">
                                                <option selected>Seleccione la Importancia</option>
                                                <option value="1">Muy importante</option>
                                                <option value="2">Importante</option>
                                                <option value="3">No tan Importante</option>
                                            </select>
                                               
                                            <span class="text-danger" v-if="errores.importancia">{{errores.importancia[0]}}</span>
                                        </div>
                                        <div class="my-4">
                                            <label for="descripcion">Descripción</label>
                                            <textarea v-model="reseniaHistorica.descripcion" type="text" class="form-control" placeholder="Descripcion" id="descripcion"></textarea>
                                            <span class="text-danger" v-if="errores.descripcion">{{errores.descripcion[0]}}</span>
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
                    </div>
                    <div class="col-3 md-3">
                        {{reseniaHistoricas.from}} - {{reseniaHistoricas.to }} total: {{reseniaHistoricas.total}}
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
                            
                            <th scope="col">Año</th>
                            <th scope="col">Importancia</th>
                            <th scope="col">Descripcion</th>                            
                            <th scope="col"  class="text-center">Acciones</th>                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="rese in reseniaHistoricas.data" :key="rese.id">
                            
                            <td>{{rese.anio}}</td>
                            <td>
                               <span v-if="rese.importancia==3" class="badge bg-secondary">No muy importante</span>
                               <span v-if="rese.importancia==2" class="badge bg-info">Importante</span>
                               <span v-if="rese.importancia==1" class="badge bg-success">Muy Importante</span> 
                             
                            <td>{{rese.descripcion}}</td>
                            <td  class="text-center ">   
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" :data-bs-target="'#nuevo-Modal'" @click="modificar=true; abrirModal(rese);">
                                Editar
                                </button>
                                                            
                                <button type="button" class="btn btn-danger btn-sm text-light" data-bs-toggle="modal" :data-bs-target="'#eliminarModal_'+rese.id">
                                    Eliminar
                                </button>
                            </td>
                            
                            <!-- Modal -->
                            <div class="modal fade" :id="'eliminarModal_'+rese.id"  tabindex="-1" :aria-labelledby="'eliminarModalLabel_'+rese.id" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" :id="'eliminarModalLabel_'+rese.id">Seguro que due desea eliminar este registro?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Seguro que desea eliminar el registro <b>{{rese.anio}}</b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-danger" @click="eliminar(rese.id);" data-bs-dismiss="modal">Si, Eliminar</button>
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
                                <li class="page-item" :class="{disabled:pagination.page==reseniaHistoricas.last_page}" ><a class="page-link" @click="pagination.page++, listar();" href="#">&#62;</a></li>
                                <li class="page-item" :class="{disabled:pagination.page==reseniaHistoricas.last_page}" ><a class="page-link" @click="pagination.page=reseniaHistoricas.last_page, listar();" href="#" ><span >&raquo;</span></a></li>
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
                reseniaHistorica:{
                    id:'',
                    anio:'',
                    importancia:'',
                    descripcion:'',
                  
                },
                id:0,
                modificar:true,
                modal:0,
                reseniaHistoricas:[],
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
                const res = await axios.get('/dashboard/reseniaHistorica/',{params:this.pagination,});
                this.reseniaHistoricas = res.data;
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
                if(fin>this.reseniaHistoricas.last_page){
                    fin=this.reseniaHistoricas.last_page;
                }
                for(let i=ini; i<=fin; i++){
                    arrayN.push(i);
                }
                this.paginas=arrayN;    
            },
            async eliminar(id){
                const res = await axios.delete('/dashboard/reseniaHistorica/'+id);
                this.cerrarModal();
                this.listar();

            },
            async guardar(){
                try{

                    if(this.modificar){
                        const res = await axios.put('/dashboard/reseniaHistorica/'+this.id,this.reseniaHistorica);  
                         
                    }
                    else{
                        const res = await axios.post('/dashboard/reseniaHistorica/',this.reseniaHistorica);
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
                
                    this.id=data.id;
                    this.reseniaHistorica.id = data.id;
                    this.tituloModal = "Modificar Reseña";
                    this.reseniaHistorica.anio=data.anio;
                    this.reseniaHistorica.descripcion=data.descripcion;
                    this.reseniaHistorica.importancia=data.importancia;   
                }
                else{
                    this.id=0;
                    this.reseniaHistorica.id = 0;
                    this.tituloModal='Agregar Reseña';
                    this.reseniaHistorica.anio='';
                    this.reseniaHistorica.descripcion='';
                    this.reseniaHistorica.importancia='';   
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