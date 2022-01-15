<template>
    <div>  
        <div class="row">
            <div class="col-4 md-3">
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Nuevo Usuario
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="limpiar()"></button>
                    </div>
                    <div class="modal-body">
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                            </symbol>
                        </svg>
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                            <div>Por razones de seguridad los usuarios se crean por defecto sin ningun permiso .</div>
                        </div>
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                <input type="text" v-model="nuevoUsuario.nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Este es su identificador, de preferencia poner nombres completos.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Correo</label>
                                <input type="email" v-model="nuevoUsuario.correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Con este correo podrá iniciar sesión.</div>
                                <span v-if="errores" class="text-danger"><strong>Correo en uso</strong></span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Contraseña</label>
                                <input type="password" v-model="nuevoUsuario.contrasenia" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Luego sera necesario compartirle la contraseña.</div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  @click="limpiar()">Descartar</button>
                        <button type="button" class="btn btn-primary text-light" @click="crearUsuario(), limpiar()">Crear Usuario</button>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->            
            <div class="col-4 md-3">
                Mostrando {{usuarios.from}} - {{usuarios.to }} | total: {{usuarios.total}}
            </div>
            <div class="col-4 md-3">      
                Mostrar                  
                <select class="form-control form-select form-select-sm bg-light" v-model="pagination.per_page" @change="listar();">
                <option selected>Elementos por pagina</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col col-12 col-md-6 mb-4" v-for="usu in usuarios.data" :key="usu.id">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p><b> {{usu.name}}</b><br>{{usu.email}}</p>
                            </div>
                            <div class="col-6 text-end">
                                <button type="button" class="btn btn-success text-light btn-sm" data-bs-toggle="modal" data-bs-target="#modalUsuario" @click="cargarUsuario(usu)">
                                    Modificar
                                </button>
                                <a v-if="usu.activo==1" class="btn btn-danger text-light btn-sm" @click="cambiarEstado(usu.id)">Desactivar</a>
                                <a v-if="usu.activo==0" class="btn btn-secondary text-light btn-sm" @click="cambiarEstado(usu.id)">Activar</a>
                            </div>
                            <!-- Modal -->
                                <div class="modal fade" id="modalUsuario" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modificar Usuario</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="limpiar()"></button>
                                        </div>
                                        <div class="modal-body">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                                </symbol>
                                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                </symbol>
                                            </svg>
                                            <div class="alert alert-warning d-flex align-items-center" role="alert">
                                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                                <div>No es recomendable cambiar el correo ya que podria dejar sin acceso al usuario.</div>
                                            </div>
                                        <form>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                                <input type="text" v-model="nuevoUsuario.nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                <div id="emailHelp" class="form-text">Este es su identificador, de preferencia poner nombres completos.</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Correo</label>
                                                <input type="email" v-model="nuevoUsuario.correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                <div id="emailHelp" class="form-text">Con este correo podrá iniciar sesión.</div>
                                            </div>
                                            
                                        </form>
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  @click="limpiar()">Descartar</button>
                                            <button type="button" class="btn btn-success text-light" data-bs-dismiss="modal" @click="modificarUsuario(usu), limpiar()">Modificar</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->  
                        </div>
                        <div class="row">
                            <div v-for="opt in opcionesPermisos" :key="opt.id" class="col col-6"> 
                                <div v-if="usu.permiso.includes(opt.id)">
                                </div>
                                <div  class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" :checked="usu.permiso.includes(opt.id)" @click="editarPermiso(usu.id,opt.id);">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Modificar  {{opt.opcionPermiso}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>       
            </div>
        </div>
        <div class="row">
            <div class="col-6 md-6 text-center">
                <nav>
                    <ul class="pagination">
                        <li class="page-item" :class="{disabled:pagination.page==1}" ><a class="page-link" @click="pagination.page=1, listar();" href="#"><span>&laquo;</span></a></li>
                        <li class="page-item" :class="{disabled:pagination.page==1}" ><a class="page-link" @click="pagination.page--, listar();" href="#">&#60;</a></li>
                        <li class="page-item" v-for="n in paginas" :key="n" :class="{active:pagination.page==n}"><a class="page-link" @click="pagination.page=n, listar();" href="#">{{n}}</a></li>
                        <li class="page-item" :class="{disabled:pagination.page==usuarios.last_page}"><a class="page-link" @click="pagination.page++, listar();" href="#">&#62;</a></li>
                        <li class="page-item" :class="{disabled:pagination.page==usuarios.last_page}"><a class="page-link" @click="pagination.page=usuarios.last_page,listar();" href="#" ><span >&raquo;</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <hr>
    </div>
</template>
<script>
    
    export default {
        components: {
        },
        data(){
            return{         
                cambio:{
                    idUsuario:0,
                    idOpcionPermiso:0,
                },
                nuevoUsuario:{
                    nombre:'',
                    correo:'',
                    contrasenia:'',
                },
                usuarioActual:[],
                usuarios:[],
                opcionesPermisos:[],
                errores:false,
                pagination:{
                    page:1,
                    per_page:5,
                },
                paginas:[],
            }
        },
        methods:{
            async listar(){
                const res = await axios.get('/dashboard/usuariosPermisos/',{params:this.pagination,});
                this.usuarios = res.data;
                const res2 = await axios.get('/dashboard/opcionesPermisos/');
                this.opcionesPermisos = res2.data;
                this.listarPaginas();
                this.usuarios.data.forEach(element => {
                    var arr = [];
                    element.permiso.forEach(elemento => {
                        arr.push(elemento.opcionPermiso_id)
                    });
                    
                    element.permiso = arr;
                });
            },
            listarPaginas(){
                const n = 2;
                let arrayN=[];
                let ini = this.pagination.page - 2;
                if(ini<1){
                    ini=1;
                }
                let fin = this.pagination.page + 2;
                if(fin>this.usuarios.last_page){
                    fin=this.usuarios.last_page;
                }
                for(let i=ini; i<=fin; i++){
                    arrayN.push(i);
                }
                this.paginas=arrayN;    
            },
            async editarPermiso(idUsu,idOpcionPermi){
                this.cambio.idUsuario = idUsu;
                this.cambio.idOpcionPermiso = idOpcionPermi;
                try{
                    const res = await axios.post('/dashboard/modificarPermiso',this.cambio)
                    .then(response=>{
                        if(response.data==1 || $response.data)
                        {
                            this.$swal({title: 'Exitoso',text: 'Actualizado con éxito',icon: 'success',confirmButtonText: 'Ok'});
                        }
                        else
                        {
                            this.$swal({title: 'Error!',text: response.data ,icon: 'error',confirmButtonText: 'Ok'});
                        }
                    });
                }catch(error){
                    if(error){
                        this.errores = error.response.data;
                    }
                }
            },
            async crearUsuario(){
                try{
                    const res = await axios.post('/dashboard/crearUsuario',this.nuevoUsuario)
                    .then(response=>{
                        if(response.data==1)
                        {
                            this.$swal({title: 'Exitoso',text: 'Usuario creado con éxito',icon: 'success',confirmButtonText: 'Ok'});
                        }
                        else
                        {
                            this.$swal({title: 'Error!',text: response.data ,icon: 'error',confirmButtonText: 'Ok'});
                        }
                    }); 
                }catch(error){
                    if(error){
                        this.errores = error.response.data;
                    }
                }
                this.limpiar();
                this.listar(); 
            },
             async modificarUsuario(usu){
                try{
                    const res = await axios.post('/dashboard/modificarUsuario',this.nuevoUsuario); 
                }catch(error){
                    if(error){
                        this.errores = error.response.data;
                    }
                }
                this.listar(); 
            },
            async cambiarEstado(id){
                const res = await axios.post('/dashboard/cambiarEstado','id='+id); 
                this.listar(); 
            },
            limpiar(){
                this.nuevoUsuario.nombre = '';
                this.nuevoUsuario.correo = '';
                this.nuevoUsuario.contrasenia = '';
                this.nuevoUsuario.id = '';
                this.errores=false;
            },
            cargarUsuario(usu){
                this.nuevoUsuario.nombre = usu.name;
                this.nuevoUsuario.correo = usu.email;
                this.nuevoUsuario.id = usu.id;
            }
        },
        created(){
            this.listar();
        }
    }
</script>