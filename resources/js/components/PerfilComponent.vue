<template>
    <div>
        <div class="row">
            <div class="col col-12">
                <div class="card">
                    <div class="card-body container-fluid">
                        <h4>Mis permisos</h4>
                        <small>Dentro del sistema usted puede realizar cambios en los siguientes apartados</small>
                        <div class="row px-4">
                            <div  v-for="permi in permisosUsuario" :key="permi.id" class="form-check col col-4">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                    {{permi.opcion_permiso.opcionPermiso}}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col col-6 mt-4">
            <div class="card">
                <div class="card-body">
                    <h4>Cambiar Nombre</h4>
                    <small>Nombre actual: <strong>{{usuario.name}}</strong></small>
                        <div class="mb-3">
                            <label class="form-label">Nuevo Nombre</label>
                            <input type="text" v-model="usu.nombre" class="form-control">
                            <div class="form-text">Este solo es su nombre de usuario, seguira iniciando sesion con su correo electronico.</div>
                        </div>
                    <button class="btn btn-primary text-light" @click="cambiarNombre();">Cambiar nombre</button>
                </div>
            </div>
        </div>
        <div class="col col-6 my-4">
            <div class="card">
                <div class="card-body">
                    <h4>Cambiar Contraseña</h4>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Antigua contraseña</label>
                        <input v-model="pass.ant" type="password" class="form-control" id="exampleInputEmail1" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nueva contraseña</label>
                        <input v-model="pass.nue" type="password" class="form-control" id="exampleInputEmail1" >
                        <div id="emailHelp" class="form-text">Asegurese de ingresar mayusculas, minusculas y numeros para garantizar su seguridad.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Confirmar contraseña</label>
                        <input v-model="pass.conf" type="password" class="form-control" id="exampleInputEmail1" >
                    </div>
                    <button class="btn btn-primary text-light" @click="cambiarContrasenia();">Cambiar Contraseña</button>
                </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['facultad'],
        data(){
            return{
                usu:{
                    nombre:'',
                    id:'',
                },
                pass:{
                    id:'',
                    ant:'',
                    nue:'',
                    conf:'',
                },
                usuario:[],
                permisos:[],
                permisosUsuario:[],
                errors:[],
                paginas:[],
            }
        },
        computed: {
        },
        methods: {
            async listar()
            {
                try
                {
                    const res = await axios.get('/dashboard/permisoUsuarioP');
                    this.permisosUsuario = res.data;
                    const res2 = await axios.get('/dashboard/perfilUsuarioP');
                    this.usuario = res2.data;
                }
                catch(error)
                {
                    if(error.response.data)
                    {
                        this.errores = error.response.data.errors;
                    }
                }
            },
            async cambiarNombre(){
                this.usu.id = this.usuario.id;
                try{
                    const res = await axios.post('/dashboard/cambiarNombre',this.usu)
                    .then(response=>{
                        if(response.data==1)
                        {
                            this.$swal({title: 'Exitoso',text: 'Nombre actualizado con éxito',icon: 'success',confirmButtonText: 'Ok'});
                        }
                        else
                        {
                            this.$swal({title: 'Error!',text: 'Ha ocurrido un error',icon: 'error',confirmButtonText: 'Ok'});
                        }
                    });
                    this.listar();
                    this.usu.nombre ="";
                }
                catch(error){
                    if(error.response.data){
                        this.errores = error.response.data.errors;
                    }
                }
            },
            async cambiarContrasenia(){
                this.pass.id = this.usuario.id;
                try{
                    const res = await axios.post('/dashboard/cambiarPass',this.pass)
                    .then(response=>{
                        if(response.data==1)
                        {
                            this.$swal({title: 'Exitoso',text: 'Contraseña actualizada con éxito',icon: 'success',confirmButtonText: 'Ok'});
                        }
                        else if(response.data==2)
                        {
                            this.$swal({title: 'Error!',text: 'La contraseña actual es incorrecta' ,icon: 'error',confirmButtonText: 'Ok'});
                        }
                        else if(response.data==3)
                        {
                            this.$swal({title: 'Error!',text: 'Error al repetir la nueva contraseña' ,icon: 'error',confirmButtonText: 'Ok'});
                        }
                        else
                        {
                            this.$swal({title: 'Error!',text: 'ha ocurrido un error' ,icon: 'error',confirmButtonText: 'Ok'});
                        }
                    });
                    this.pass.ant =""; 
                    this.pass.nue ="";
                    this.pass.conf ="";  
                    
                }
                catch(error){
                    if(error.response.data){
                        this.errores = error.response.data.errors;
                    }
                }
            },
           
         
        },
        
        created() 
        {
            this.listar();
        },
        mounted() {
        }
    }
</script>
