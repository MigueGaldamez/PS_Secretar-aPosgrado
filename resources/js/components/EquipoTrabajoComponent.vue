<template>
    <div>  
        <div class="row">
            <div class="col-3 md-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevo-Modal" @click="modificar=false;abrirModal();">
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
                                <form v-on:submit.prevent="save" enctype="multipart/form-data">
                                    <div class="mb-3 col-sm-6">
                                        <label for="formFile" class="form-label">Logo de la Facultad</label>
                                        <input ref="urlImg" accept="image/*" class="form-control" type="file" name="urlImagen" @change="obtenerImagen">
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <img :src="imagen" class="img-thumbnail" alt="...">
                                    </div>
                                    <div class="my-4">
                                        <label for="nombre">Nombre Especialidad</label>
                                        <input v-model="equipoTrabajo.nombre" type="text" class="form-control" placeholder="Nombre Miembro" id="nombre">
                                        <span class="text-danger" v-if="errores.nombre">{{errores.nombre[0]}}</span>
                                    </div>
                                    <div class="my-4">
                                        <label for="descripcion">Cargo Miembro</label>
                                        <input v-model="equipoTrabajo.cargo" type="text" class="form-control" placeholder="Cargo" id="cargo">
                                        <span class="text-danger" v-if="errores.cargo">{{errores.cargo[0]}}</span>
                                    </div>
                                    <div class="my-4">
                                        <label for="descripcion">Descripción Miembro</label>
                                        <textarea v-model="equipoTrabajo.descripcion" type="text" class="form-control" placeholder="Descripcion" id="descripcion"></textarea>
                                        <span class="text-danger" v-if="errores.descripcion">{{errores.descripcion[0]}}</span>
                                    </div>
                                    <button type="button"  @click="guardar();" class="btn btn-primary"  >Guardar Cambios</button>
                                </form> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                
                            </div>
                            </div>
                        </div>
                    </div>
                    <!--FinModal-->
            </div>
            <div class="col-3 md-3">
                {{equipoTrabajos.from}} - {{equipoTrabajos.to }} total: {{equipoTrabajos.total}}
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
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Descripcion</th>                            
                    <th scope="col"  class="text-center">Acciones</th>                           
                </tr>
            </thead>
            <tbody>
                <tr v-for="equi in equipoTrabajos.data" :key="equi.id">
                    <td><img :src="equi.urlImagen"  class="img-thumbnail" alt="..."></td>
                    <td>{{equi.nombre}}</td>
                    <td>{{equi.cargo}}</td>
                    <td>{{equi.descripcion}}</td>
                    <td  class="text-center ">   
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" :data-bs-target="'#nuevo-Modal'" @click="modificar=true; abrirModal(equi);">
                        Editar
                        </button>
                                                    
                        <button type="button" class="btn btn-danger btn-sm text-light" data-bs-toggle="modal" :data-bs-target="'#eliminarModal_'+equi.id">
                            Eliminar
                        </button>
                    </td>
                    
                    <!-- Modal -->
                    <div class="modal fade" :id="'eliminarModal_'+equi.id"  tabindex="-1" :aria-labelledby="'eliminarModalLabel_'+equi.id" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" :id="'eliminarModalLabel_'+equi.id">Seguro que due desea eliminar este registro?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Seguro que desea eliminar el registro <b>{{equi.nombre}}</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger" @click="eliminar(equi.id);" data-bs-dismiss="modal">Si, Eliminar</button>
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
                        <li class="page-item" :class="{disabled:pagination.page==equipoTrabajos.last_page}" ><a class="page-link" @click="pagination.page++, listar();" href="#">&#62;</a></li>
                        <li class="page-item" :class="{disabled:pagination.page==equipoTrabajos.last_page}" ><a class="page-link" @click="pagination.page=equipoTrabajos.last_page, listar();" href="#" ><span >&raquo;</span></a></li>
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
                equipoTrabajo:{
                    urlImagen: null,
                    id:'',
                    nombre:'',
                    cargo:'',
                    descripcion:'',
                },
                id:0,
                imagenMiniatura:'',
                modificar:true,
                modal:0,
                equipoTrabajos:[],
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
                const res = await axios.get('/dashboard/equipoTrabajo/',{params:this.pagination,});
                this.equipoTrabajos = res.data;
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
                if(fin>this.equipoTrabajos.last_page){
                    fin=this.equipoTrabajos.last_page;
                }
                for(let i=ini; i<=fin; i++){
                    arrayN.push(i);
                }
                this.paginas=arrayN;    
            },
            async eliminar(id){
                const res = await axios.delete('/dashboard/equipoTrabajo/'+id).then(response=>{console.log(response.data)});
                this.cerrarModal();
                this.listar();

            },
            async guardar(){
                try{

                    if(this.modificar)
                    {
                        let fields = new FormData();
                        for(let key in this.equipoTrabajo)
                        {
                            fields.append(key,this.equipoTrabajo[key]);
                        }
                        const res = await axios.post('/dashboard/equipoTrabajo/'+this.id,fields);  
                        //console.log(this.equipoTrabajo); 
                        console.log('modifica');      
                    }
                    else
                    {
                        let fields = new FormData();
                        for(let key in this.equipoTrabajo)
                        {
                            fields.append(key,this.equipoTrabajo[key]);
                        }
                        const res = await axios.post('/dashboard/equipoTrabajo',fields);

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
                    this.tituloModal = "Modificar miembro";
                    this.id=data.id;
                    this.equipoTrabajo.id = data.id;
                    this.equipoTrabajo.nombre=data.nombre;
                    this.equipoTrabajo.descripcion=data.descripcion;
                    this.equipoTrabajo.cargo=data.cargo;   
                }
                else{
                    this.id=0;
                    this.equipoTrabajo.id = 0;
                    this.urlImagen = null;
                    this.tituloModal='Agregar Miembro';
                    this.equipoTrabajo.nombre='';
                    this.equipoTrabajo.descripcion='';
                    this.equipoTrabajo.cargo='';   
                }
            },
            cerrarModal(){
                this.modal=0;
                this.errores={};
            },
            obtenerImagen(e)
            {
                this.equipoTrabajo.urlImagen=e.target.files[0];
                this.cargarImagen(this.equipoTrabajo.urlImagen); 
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
        mounted() {
            console.log('Component mounted.')
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