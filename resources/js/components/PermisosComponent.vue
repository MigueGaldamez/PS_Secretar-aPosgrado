<template>
    <div>  
        <div class="row">
            <!-- Modal -->
            <div  class="modal fade" :class="{show:modal, ver:modal}" id="exampleModal" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">{{titleModal}}</h5>
                            <button @click="closeModal();" type="button" class="btn-close"  aria-label="Close"></button>
                        </div>
                        <form v-on:submit.prevent="save">
                            <div class="modal-body">
                                <svg v-if="!update" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                    </symbol>
                                </svg>
                                <div v-if="!update" class="alert alert-primary d-flex align-items-center" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                                    <div>Por razones de seguridad los usuarios se crean por defecto sin ningun permiso .</div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-sm-12">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input type="text" v-model="usuario.name" class="form-control" >
                                        <div id="emailHelp" class="form-text">Este es su identificador, de preferencia poner nombres completos.</div>
                                        <span class="text-danger" v-if="errores.name">{{errores.name[0]}}</span>
                                    </div>
                                    <svg v-if="update" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                        </symbol>
                                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                        </symbol>
                                    </svg>
                                    <div v-if="update" class="alert alert-warning d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        <div>No es recomendable cambiar el correo ya que podria dejar sin acceso al usuario.</div>
                                    </div>
                                    <div class="mb-3 col-sm-12">
                                        <label for="exampleInputEmail1" class="form-label">Correo</label>
                                        <input type="email" v-model="usuario.correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text">Con este correo podrá iniciar sesión.</div>
                                        <span class="text-danger" v-if="errores.correo">{{errores.correo[0]}}</span>
                                    </div>
                                    <div v-if="!update" class="mb-3 col-sm-12">
                                        <label for="password" class="form-label">Contraseña</label>
                                        <input type="password" v-model="usuario.contrasenia" class="form-control" >
                                        <div id="emailHelp" class="form-text">Luego sera necesario compartirle la contraseña.</div>
                                        <span class="text-danger" v-if="errores.contrasenia">{{errores.contrasenia[0]}}</span>
                                    </div>
                                </div>             
                            </div>
                            <div class="modal-footer">
                                <button @click="save();" type="button"  class="btn btn-success">Guardar</button>
                                <button v-on:click="closeModal();" type="button" class="btn btn-secondary" >Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!--Fin del modal -->
        <div class="col-sm-4">
            <label for="customRange3" class="form-label">Mostrando: {{usuarios.from}} - {{usuarios.to }} | Total: {{usuarios.total}}</label>
        </div>
        <div class="col-xm-12">
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
                    <select @change="filtros.page=1; listar();" v-model="filtros.per_page" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option selected>Seleccione:</option>
                        <option value="4">4</option>
                        <option value="8">8</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </select>
                </div>
            </div>
            <form @submit.prevent="listar">
                <div class="row mt-1 mb-1">
                    <div class="col-sm-6">
                        <label  class="form-label">Nombre o Apellidos: </label>
                        <input v-model="filtros.name"  class="form-control" type="text" placeholder="Nombres o Apellidos" aria-label="Nombre de usuario">
                    </div>
                    <div class="col-sm-1 align-self-end">
                        <button @click="listar(); filtros.page=1;"  type="submit" class="btn btn-outline-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
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
                                <button type="button" class="btn btn-success text-light btn-sm"  @click="update=true; openModal(usu);">
                                    Modificar
                                </button>
                                <a v-if="usu.activo==1" class="btn btn-danger text-light btn-sm" @click="cambiarEstado(usu.id)">Desactivar</a>
                                <a v-if="usu.activo==0" class="btn btn-secondary text-light btn-sm" @click="cambiarEstado(usu.id)">Activar</a>
                            </div>
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
                        <li class="page-item" :class="{disabled:filtros.page==usuarios.last_page}" >
                            <a class="page-link" @click="filtros.page++, listar();" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item" :class="{disabled:filtros.page==usuarios.last_page}" >
                            <a class="page-link" @click="filtros.page=usuarios.last_page, listar();" href="#" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-forward-fill" viewBox="0 0 16 16">
                                    <path d="M15.5 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V8.753l-6.267 3.636c-.54.313-1.233-.066-1.233-.697v-2.94l-6.267 3.636C.693 12.703 0 12.324 0 11.693V4.308c0-.63.693-1.01 1.233-.696L7.5 7.248v-2.94c0-.63.693-1.01 1.233-.696L15 7.248V4a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                            </a>
                        </li>
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
                usuario:{
                    id:0,
                    name: null,
                    correo:'',
                    contrasenia:'',
                },
                update:true,
                modal:0,
                titleModal:'',
                usuarioActual:[],
                usuarios:[],
                opcionesPermisos:[],
                errores: {},
                filtros:{
                    name: null,
                    page:1,
                    per_page:4,
                },
                paginas:[],
            }
        },
        methods:{
            async listar(){
                const res = await axios.get('/dashboard/usuariosPermisos/',{params:this.filtros,});
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
                let ini = this.filtros.page - 2;
                if(ini<1){
                    ini=1;
                }
                let fin = this.filtros.page + 2;
                if(fin>this.usuarios.last_page){
                    fin=this.usuarios.last_page;
                }
                for(let i=ini; i<=fin; i++){
                    arrayN.push(i);
                }
                this.paginas=arrayN;    
            },
            openModal(data={}) 
            {
                this.modal=1
                try
                {
                    if(this.update)
                    {
                        this.titleModal = "Modificar Usuario";
                        this.id=data.id;
                        this.usuario.name = data.name;
                        this.usuario.correo =data.email;
                        this.usuario.id = data.id;
                    }
                    else
                    {
                        this.titleModal = "Agregar Usuario";
                        this.id=0;
                        this.usuario.name = '';
                        this.usuario.correo = '';
                        this.usuario.contrasenia = '';
                        this.usuario.id = 0;
                    }
                }
                catch(error)
                {
                    if(error.response.data)
                    {
                        this.errores = error.response.data.errors;
                        console.log(this.errores);
                    }
                }
            },
            closeModal() 
            {
                this.errores ={};
                this.modal=0
                this.textOfertado = '';
            },
            async save()
            {
                if(this.update)
                {
                    try
                    {
                        let fields = new FormData();
                        for(let key in this.usuario)
                        {
                            fields.append(key,this.usuario[key]);
                        }
                        const res = await axios.post('/dashboard/modificarUsuario',fields)
                        .then(response=>{
                            if(response.data==1)
                            {
                                this.$swal({title: 'Exitoso',text: 'Actualizado con éxito',icon: 'success',confirmButtonText: 'Ok'});
                            }
                            else
                            {
                                this.$swal({title: 'Error!',text: 'Ha ocurrrido algo...' ,icon: 'error',confirmButtonText: 'Ok'});
                            }
                        })
                        .finally(() => {
                            console.log('Experiment completed');
                        });
                        this.closeModal();
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
                    try
                    {
                        let fields = new FormData();
                        for(let key in this.usuario)
                        {
                            fields.append(key,this.usuario[key]);
                        }
                        const res = await axios.post('/dashboard/crearUsuario',fields)
                        .then(response=>{
                            if(response.data==1)
                            {
                                this.$swal({title: 'Exitoso',text: 'Guardado con éxito',icon: 'success',confirmButtonText: 'Ok'});
                            }
                            else
                            {
                                this.$swal({title: 'Error!',text: 'Ha ocurrrido algo...',icon: 'error',confirmButtonText: 'Ok'});
                            }
                        })
                        .finally(() => {
                            console.log('Experiment completed');
                        });
                        this.closeModal();
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
                            this.$swal({title: 'Error!',text: 'Ha ocurrido un error' ,icon: 'error',confirmButtonText: 'Ok'});
                        }
                    });
                }catch(error){
                    if(error){
                        this.errores = error.response.data.errors;
                    }
                }
            },
            async cambiarEstado(id){
                const res = await axios.post('/dashboard/cambiarEstado','id='+id); 
                this.listar(); 
            },
        },
        created(){
            this.listar();
        }
    }
</script>