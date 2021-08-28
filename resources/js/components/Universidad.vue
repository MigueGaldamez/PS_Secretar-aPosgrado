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
                        </div>

                        <div class="my-4">
                            <label for="direccionUniversidad">Direccion Universidad</label>
                            <input v-model="universidad.direccionUniversidad" type="text" class="form-control" placeholder="Direccion Universidad" id="direccionUniversidad">
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
                        <tr v-for="uni in universidades" :key="uni.id">
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
            }
        },
        methods:{
            async listar(){
                const res = await axios.get('/universidads');
                this.universidades = res.data;

            },
            async eliminar(id){
                const res = await axios.delete('/universidads/'+id);
                 this.listar();

            },
            async guardar(){
                if(this.modificar){
                    const res = await axios.put('/universidads/'+this.id,this.universidad);
                                
                }
                else{
                     const res = await axios.post('/universidads/',this.universidad);
                }  
                this.cerrarModal();
                this.listar();      

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
