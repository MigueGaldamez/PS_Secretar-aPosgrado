<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                 <!--Modal-->
               <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" @click="modificar=false; abrirModal();">
                Nuevo
                </button>
               

                <!-- Modal -->
                <div class="modal" v-bind:class="{mostrar:modal}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{tituloModal}}</h5>
                        <button type="button" @click="cerrarModal();" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="my-4">
                            <label for="nombreUniversidad">Nombre Universidad</label>
                            <input v-model="universidad.nombreUniversidad" type="text" class="form-control" placeholder="Nombre Universidad" id="nombreUniversidad">
                            <span class="text-danger" v-if="errores.nombreUniversidad">{{errores.nombreUniversidad[0]}}</span>
                        </div>

                        <div class="my-4">
                            <label for="direccionUniversidad">Direccion Universidad</label>
                            <input v-model="universidad.direccionUniversidad" type="text" class="form-control" placeholder="Direccion Universidad" id="direccionUniversidad">
                             <span class="text-danger" v-if="errores.nombreUniversidad">{{errores.direccionUniversidad[0]}}</span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" @click="cerrarModal();" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button"  @click="guardar();" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>
                <!--FinModal-->
                <hr/>
                 <div class="row">
                    <div class="col-3 md-3">
                        {{universidades.from}} - {{universidades.to }} total: {{universidades.total}}
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
                <table class="table table-striped">
                    <thead class="table-dark"> 
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre universidad</th>
                        <th scope="col">Direccion Universidad</th>
                        <th scope="col" colspan="2" class="text-center">Acciones</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="uni in universidades.data" :key="uni.id">
                        <th scope="row">{{uni.id}}</th>
                        <td>{{uni.nombreUniversidad}}</td>
                        <td>{{uni.direccionUniversidad}}</td>
                        <td>
                            <button @click="modificar=true; abrirModal(uni);" class="btn btn-warning">Editar</button>
                        </td>
                        <td>
                            <button @click="eliminar(uni.id);" class="btn btn-danger">Eliminar</button>
                        </td>
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
                                <li class="page-item" :class="{disabled:pagination.page==universidades.last_page}" ><a class="page-link" @click="pagination.page++, listar();" href="#">&#62;</a></li>
                                <li class="page-item" :class="{disabled:pagination.page==universidades.last_page}" ><a class="page-link" @click="pagination.page=universidades.last_page, listar();" href="#" ><span >&raquo;</span></a></li>
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
        data(){
            return{
                universidad:{
                    nombreUniversidad:'',
                    correoUniversidad:'',
                },
                id:0,
                modificar:true,
                modal:0,
                universidades:[],
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
                const res = await axios.get('/universidads/',{params:this.pagination,});
                this.universidades = res.data;
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
                if(fin>this.universidades.last_page){
                    fin=this.universidades.last_page;
                }
                for(let i=ini; i<=fin; i++){
                    arrayN.push(i);
                }
                this.paginas=arrayN;    
            },
            async eliminar(id){
                const res = await axios.delete('/universidads/'+id);
                 this.listar();

            },
            async guardar(){
                try{

                    if(this.modificar){
                        const res = await axios.put('/universidads/'+this.id,this.universidad);
                                    
                    }
                    else{
                        const res = await axios.post('/universidads/',this.universidad);
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
                this.modal=1;
                if(this.modificar){
                    this.id=data.id;
                    this.tituloModal='Modificar Universidad';
                    this.universidad.nombreUniversidad=data.nombreUniversidad;
                    this.universidad.direccionUniversidad=data.direccionUniversidad;
                }
                else{
                    this.id=0;
                    this.tituloModal='Crear Universidad';
                    this.universidad.nombreUniversidad='';
                    this.universidad.direccionUniversidad='';
                }
            },
            cerrarModal(){
                this.modal=0;
                this.errores={};
            },
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            this.listar();
        }
    }
</script>
<style>
.mostrar{
    display:list-item;
    opacity: 1;
    background: rgba(44,38,75,0.849);
}
</style>
