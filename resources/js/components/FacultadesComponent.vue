<template>
    <div>
        <!-- Modal -->
        <div  class="modal fade" :class="{show:modal, ver:modal}" id="exampleModal" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">{{titleModal}}</h5>
                        <button @click="closeModal();" type="button" class="btn-close"  aria-label="Close"></button>
                    </div>
                    <form v-on:submit.prevent="save" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="mb-3 col-sm-6">
                                    <label for="formFile" class="form-label">Logo de la Facultad</label>
                                    <input ref="urlImg" accept="image/*" class="form-control" type="file" name="urlImagen" @change="obtenerImagen">
                                    <span class="text-danger" v-if="errores.urlImagen">{{errores.urlImagen[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <img v-if="selImagen" :src="imagen" class="img-thumbnail" alt="...">
                                </div>
                                <div class="mb-3 col-sm-12" >
                                    <label  class="form-label">Nombre de la Facultad</label>
                                    <input v-model="facultad.nombre" class="form-control" type="text" placeholder="Nombre" aria-label="Nombre de la facultad">
                                    <span class="text-danger" v-if="errores.nombre">{{errores.nombre[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-12 ">
                                    <label  class="form-label">Descripcion pequeña</label>
                                    <textarea v-on:keyup="contadorCharD" v-model="facultad.descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    <div id="passwordHelpBlock" class="form-text">
                                    {{charFaltantesD}}/255
                                    </div>
                                    <span class="text-danger" v-if="errores.descripcion">{{errores.descripcion[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-12" >
                                    <label  class="form-label">Informacion de contacto de Diplomado</label>
                                    <textarea v-on:keyup="contadorCharC"   v-model="facultad.contactoDiplomado" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    <div id="passwordHelpBlock" class="form-text">
                                        {{charFaltantesC}}/120 | Puedes separar email, telefono con una ",". 
                                    </div>
                                    <span class="text-danger" v-if="errores.contactoDiplomado">{{errores.contactoDiplomado[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-12" >
                                    <label  class="form-label">Informacion de contacto de Posgrados</label>
                                    <textarea v-on:keyup="contadorCharP"   v-model="facultad.contactoPosgrado" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    <div id="passwordHelpBlock" class="form-text">
                                        {{charFaltantesP}}/120 | Puedes separar email, telefono con una ",". 
                                    </div>
                                    <span class="text-danger" v-if="errores.contactoPosgrado">{{errores.contactoPosgrado[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-6" >
                                    <label class="form-label">Color Facultad</label>
                                    <input type="color" class="form-control form-control-color" id="exampleColorInput" v-model="facultad.color" title="Choose your color">
                                    <span class="text-danger" v-if="errores.color">{{errores.conlor[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <input class="form-check-input" v-model="facultad.multidis" true-value="1" false-value="0" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label"  for="flexSwitchCheckDefault">Multi-Disciplinaria</label>
                                    <span class="text-danger" v-if="errores.multidis">{{errores.multidis[0]}}</span>
                                </div> 
                            </div>           
                        </div>
                        <div class="modal-footer">
                            <button @click="save();" type="button" class="btn btn-success" >Guardar</button>
                            <button v-on:click="closeModal();" type="button" class="btn btn-secondary" >Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- fin del modal -->
        <div v-if="cargando" class="d-flex align-items-center justify-content-center m-3">
            <strong>Cargando Datos...</strong>
            <div class="">
                <div class="spinner-grow text-danger" role="status"></div>
                <div class="spinner-grow text-warning" role="status"></div>
                <div class="spinner-grow text-info" role="status"></div>
            </div>
        </div>
        <div class="col-sm-4">
            <label for="customRange3" class="form-label">Mostrando: {{facultades.from}} - {{facultades.to }} | Total: {{facultades.total}}</label>
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
                <select @change="pagination.page=1; list();" v-model="pagination.per_page" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>Seleccione:</option>
                    <option value="4">4</option>
                    <option value="8">8</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
            </div>
        </div>
        <div class="row mt-1 mb-1">
            <div class="col-sm-3" v-for="facultad in facultades.data" :key="facultad.id">
                <div class="card p-2 h-100  mb-1 " >
                    <img :src="facultad.urlImagen" class="card-img-top h-50 imagenFacultad" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Facultad de {{facultad.nombre}}</h5>
                            <p class="card-text ">{{facultad.descripcion}}</p>
                            <p v-bind:style="{color: facultad.color } "> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-palette-fill" viewBox="0 0 16 16">
                                <path d="M12.433 10.07C14.133 10.585 16 11.15 16 8a8 8 0 1 0-8 8c1.996 0 1.826-1.504 1.649-3.08-.124-1.101-.252-2.237.351-2.92.465-.527 1.42-.237 2.433.07zM8 5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm4.5 3a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM5 6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                            </svg></p>
                        <div class="position-relative bottom-0 start-50 translate-middle-x mb-1 ">
                            <button type="button"  @click="update=true; openModal(facultad);"  class="btn btn-info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 text-center">
                <nav>
                    <ul class="pagination">
                        <li class="page-item" :class="{disabled:pagination.page==1}" >
                            <a class="page-link" @click="pagination.page=1, list();" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-backward-fill" viewBox="0 0 16 16">
                                    <path d="M.5 3.5A.5.5 0 0 0 0 4v8a.5.5 0 0 0 1 0V8.753l6.267 3.636c.54.313 1.233-.066 1.233-.697v-2.94l6.267 3.636c.54.314 1.233-.065 1.233-.696V4.308c0-.63-.693-1.01-1.233-.696L8.5 7.248v-2.94c0-.63-.692-1.01-1.233-.696L1 7.248V4a.5.5 0 0 0-.5-.5z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item" :class="{disabled:pagination.page==1}" >
                            <a class="page-link" @click="pagination.page--, list();" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                                    <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item" v-for="n in paginas" :key="n" :class="{active:pagination.page==n}">
                            <a class="page-link" @click="pagination.page=n, list();" href="#">
                                {{n}}
                            </a>
                        </li>
                        <li class="page-item" :class="{disabled:pagination.page==facultades.last_page}" >
                            <a class="page-link" @click="pagination.page++, list();" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item" :class="{disabled:pagination.page==facultades.last_page}" >
                            <a class="page-link" @click="pagination.page=facultades.last_page, list();" href="#" >
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
    data(){
        return{
            facultad: 
            {
                id:0,
                urlImagen: null,
                nombre: '',
                contactoDiplomado: '',
                contactoPosgrado: '',
                color: '#CCCCCC',
                multidis: 0,
                descripcion: '',
                imagen: false,
            },
            //objetos para el contador de caracteres
            charMaxC:120,//Maximo para contacto de diplomado
            charFaltantesC:120, //Faltante para contacto de diplomado
            charMaxD:255,//Maximo para la descripcion
            charFaltantesD:255,//faltante para la descripcion
            charMaxP:120,//Maximo para contacto posgrado
            charFaltantesP:120,//faltante contacto posgrado
            selImagen: false, //para la imagen del modal
            errores: {},
            update:true,
            modal:0,
            titleModal:'',
            facultades:[],
            id:0,
            imagenMiniatura:'',
            cargando:  false,
            pagination:{
                    page:1,
                    per_page:4,
                },
            paginas:[],
        }
    },
    methods: {
        async list()
        {
            try
            {
                this.cargando = true;
                const res = await axios.get('/dashboard/facultad_api',{params:this.pagination,});
                this.facultades = res.data;
                this.listarPaginas();
                this.cargando = false;
            }
            catch(error)
            {
                if(error.response.data)
                {
                    this.errores = error.response.data.errors;
                }
            }

        },
        listarPaginas()
        {
            
            const n = 2;
            let arrayN=[];
            let ini = this.pagination.page - 2;
            if(ini<1)
            {
                ini=1;
            }
            let fin = this.pagination.page + 2;
            if(fin>this.facultades.last_page)
            {
                fin=this.facultades.last_page;
            }
            for(let i=ini; i<=fin; i++)
            {
                arrayN.push(i);
            }
            this.paginas=arrayN;    
        },
        async eliminar(id) {
            const  res = await axios.delete('/dashboard/facultad_api/'+id);
            this.list();
        },
        async save() {
            if(this.update)
            {
                try
                {
                    let fields = new FormData();
                    for(let key in this.facultad)
                    {
                        fields.append(key,this.facultad[key]);
                        
                    }
                    //.then(response=>{console.log(response.data)})
                    const res = await axios.post('/dashboard/facultad_api/'+this.id, fields)
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
                    this.closeModal();
                    this.list();
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
                    for(let key in this.facultad)
                    {
                        fields.append(key,this.facultad[key]);
                        
                    }
                    //.then(response=>{console.log(response.data)})
                    const res = await axios.post('/dashboard/facultad_api', fields)
                    .then(response=>{
                        if(response.data==1)
                        {
                            this.$swal({title: 'Exitoso',text: 'Guardado con éxito',icon: 'success',confirmButtonText: 'Ok'});
                        }
                        else
                        {
                            this.$swal({title: 'Error!',text: "error" ,icon: 'error',confirmButtonText: 'Ok'});
                        }
                    });
                    this.closeModal();
                    this.list();
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
        openModal(data={}) {
            this.modal=1
            if (this.update)
            {
                this.titleModal = "Modificar Facultad";
                this.id=data.id;
                this.facultad.id = data.id;
                this.facultad.urlImagen = data.urlImagen;
                this.facultad.nombre = data.nombre;
                this.facultad.contactoDiplomado = data.contactoDiplomado;
                this.facultad.contactoPosgrado = data.contactoPosgrado;
                this.facultad.color= data.color,
                this.facultad.multidis = data.multidis;
                this.facultad.descripcion = data.descripcion;
                this.charFaltantesC = 120 -  (encodeURI(data.contactoDiplomado).split(/%..|./).length - 1);
                this.charFaltantesD = 255 - (encodeURI(data.descripcion).split(/%..|./).length - 1);
                this.charFaltantesP = 120 - (encodeURI(data.contactoPosgrado).split(/%..|./).length - 1);
                this.facultad.imagen = false;
            }
            else
            {
                this.id=0;
                this.titleModal = "Agregar Facultad";
                this.facultad.urlImagen = '';
                this.facultad.nombre = '';
                this.facultad.contactoDiplomado='';
                this.facultad.contactoPosgrado = '';
                this.facultad.color= '#CCCCCC',
                this.facultad.multidis = 0;
                this.facultad.descripcion = '';
                this.charFaltantesC = 120;
                this.charFaltantesD = 255;
                this.charFaltantesP = 120;
                this.facultad.imagen = true;
            }
        },
        closeModal() {
            this.errores ={};
            this.selImagen = false;
            this.$refs.urlImg.value=null;
            this.imagenMiniatura='';
            this.modal=0
        },
        contadorCharD: function()//contador para la descripcion
        {
            this.charFaltantesD = this.charMaxD - (encodeURI(this.facultad.descripcion).split(/%..|./).length - 1);
        },
        contadorCharC: function()//contador para el ontacto diplomados
        {
            this.charFaltantesC = this.charMaxC - (encodeURI(this.facultad.contactoDiplomado).split(/%..|./).length - 1);
            
        },
        contadorCharP: function()//contador para el contacto posgrado
        {
            this.charFaltantesP = this.charMaxP -  (encodeURI(this.facultad.contactoPosgrado).split(/%..|./).length - 1);
            
        },
        obtenerImagen(e)
        {
            this.facultad.imagen = true;
            this.selImagen = true;
            this.facultad.urlImagen=e.target.files[0];
            this.cargarImagen(this.facultad.urlImagen); 
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
    created() 
    {
        this.list();
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
