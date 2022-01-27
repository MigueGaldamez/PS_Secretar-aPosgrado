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
        <div class="col col-6 mt-4">
            <div class="card">
                <div class="card-body">
                    <h4>Cambiar Nombre</h4>
                    <small>Nombre actual: <strong>{{usuario.name}}</strong></small>
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Este solo es su nombre de usuario, seguira iniciando sesion con su correo electronico.</div>
                        </div>
 
                    <button type="submit" class="btn btn-primary text-light">Cambiar nombre</button>
                    </form>
                   
                </div>
            </div>
        </div>
        <div class="col col-6 my-4">
            <div class="card">
                <div class="card-body">
                    <h4>Cambiar Contraseña</h4>
                    
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Antigua contraseña</label>
                            <input type="password" class="form-control" id="exampleInputEmail1" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nueva contraseña</label>
                            <input type="password" class="form-control" id="exampleInputEmail1" >
                            <div id="emailHelp" class="form-text">Asegurese de ingresar mayusculas, minusculas y numeros para garantizar su seguridad.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Confirmar contraseña</label>
                            <input type="password" class="form-control" id="exampleInputEmail1" >
                        </div>
 
                    <button type="submit" class="btn btn-primary text-light">Cambiar Contraseña</button>
                    </form>
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
           
         
        },
        created() 
        {
            this.listar();
        },
        mounted() {
           
        }
    }
</script>
