<template>
    <div>
        <!-- Modal -->
        <div  class="modal fade" :class="{show:modal, ver:modal}" id="exampleModal" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">{{titleModal}}</h5>
                        <button @click="closeModal();" type="button" class="btn-close"  aria-label="Close"></button>
                    </div>
                    <form v-on:submit.prevent="save" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Logo de la Secretaría de Posgrado</label>
                                <input  ref="urlImg" accept=".svg" class="form-control" type="file" name="urlLogo" @change="obtenerImagen">
                                <span class="text-danger" v-if="errores.urlLogo">{{errores.urlLogo[0]}}</span>
                                <img v-if="selImagen" :src="imagen" class="img-thumbnail" alt="...">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Enlace</label>
                                <input class="form-control" type="url" v-model="info.urlCatalogo" name="link" id="url" placeholder="https://ejemplo.com" pattern="https://.*">
                                <p class="text-muted">Recuerda que el link de Drive debe estar publico y solo lectura <a :href="info.urlCatalogo" class="text-reset">Probar</a>.</p>
                                <span class="text-danger" v-if="errores.urlCatalogo">{{errores.urlCatalogo[0]}}</span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Horario de atención</label>
                                <textarea v-model="info.horarioAtencion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                <span class="text-danger" v-if="errores.horarioAtencion">{{errores.horarioAtencion[0]}}</span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Información de contacto</label>
                                <textarea v-model="info.correo" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                <span class="text-danger" v-if="errores.correo">{{errores.correo[0]}}</span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Misión</label>
                                <textarea v-model="info.mision" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                <span class="text-danger" v-if="errores.mision">{{errores.mision[0]}}</span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Visión</label>
                                <textarea v-model="info.vision" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                <span class="text-danger" v-if="errores.vision">{{errores.vision[0]}}</span>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">¿Quiénes Somos?</label>
                                <textarea v-model="info.quienesSomos" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                <span class="text-danger" v-if="errores.quienesSomos">{{errores.quienesSomos[0]}}</span>
                            </div>
                            <div class="row">
                                <label for="exampleFormControlTextarea1" class="form-label">Valores </label>
                                <div class="input-group mb-3 col-sm-4">
                                    <button @click="saveValor();" class="btn  btn-success" type="button" id="button-addon1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                        </svg>
                                    </button>
                                    <input  v-model="info.valores.nombre" type="text" class="form-control" placeholder="Agrgear un Valor"  aria-describedby="button-addon1">
                                </div>
                                <span class="text-danger" v-if="v_errores.nombre">{{v_errores.nombre[0]}}</span>
                            </div>
                            <div class="row">
                                <div v-for="valor in info.valores" :key="valor.id" class="col mb-3 col-6">
                                    <div class=" input-group">
                                    <button @click="eliminarValor(valor.id)" class="btn btn-danger" type="button" id="button-addon1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    </button>
                                    <input v-model="valor.nombre" type="text" class="form-control"  disabled aria-describedby="button-addon1">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button v-on:click="closeModal();" type="button" class="btn btn-secondary" >Close</button>
                            <button @click="save();" type="button" class="btn btn-success" >Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <dl class="row" v-for="info in infos" :key="info.id">
            <dt class="col-sm-3">Logo Institucion</dt>
           
                <dd class="col-sm-9"> <img :src="info.urlLogo" class="img-thumbnail" alt="..."></dd>
            <dt class="col-sm-3">Horario de Atención</dt>
            <dd class="col-sm-9">
                {{info.horarioAtencion}}
            </dd>
            <dt class="col-sm-3">Contacto</dt>
                <dd class="col-sm-9">{{info.correo}}</dd>
                
            <dt class="col-sm-3">Misión</dt>
            <dd class="col-sm-9">
                <p>{{info.mision}}</p>
            </dd>
            <dt class="col-sm-3">Visión</dt>
            <dd class="col-sm-9">
                <p>{{info.vision}}</p>
            </dd>
            <dt class="col-sm-3">Valores</dt>

            <dd class="col-sm-9 row">
                <li class="col-6" v-for="valor in info.valores" :key="valor.id">{{valor.nombre}}</li>
            </dd>
            <dt class="col-sm-3">¿Quiénes Somos?</dt>
            <dd class="col-sm-9">
                <p>{{info.quienesSomos}}</p>
            </dd>
            <button @click="openModal(info);"  class="btn btn-info">Editar Informacion</button>
        </dl>
    </div>
</template>

<script>
export default {
    data(){
        return{
            info: {
                id:0,
                urlCatalogo: '',
                urlLogo: null,
                horarioAtencion:'',
                correo:'',
                mision:'',
                vision:'',
                quienesSomos:'',
                imagen: false,
                valores:{
                    id:0,
                    nombre:'',
                    informacion_id:0,
                },
            },
            valor:
            {
                nombre:'',
                informacion_id:0,
            },
            selImagen: false,
            v_errores:{},
            errores: {},
            valores:[],
            infos:[],
            id:0,
            modal:0,
            titleModal:'',
            imagenMiniatura:'',
        }
    },
    methods: {
        async list(){
            try
            {
                const res = await axios.get('/dashboard/informacion');
                this.infos = res.data;
            }
            catch(error)
            {
                if(error.response.data)
                {
                    this.errores = error.response.data.errors;
                }
            }
        },
        async getValores(informacion_id)
        {
            try
            {
                const res = await axios.get('/dashboard/get_valores/'+informacion_id);
                this.info.valores = res.data;
            }
            catch(error)
            {
                if(error.response.data)
                {
                    this.errores = error.response.data.errors;
                }
            }
        },
        async saveValor()
        {
            try
            {
                let fields = new FormData();
                fields.append("nombre", this.info.valores.nombre);
                fields.append("informacion_id", this.id);
                const res = await axios.post('/dashboard/valores', fields);
                this.getValores(this.id);
                this.list();
            }
            catch(error)
            {
                if(error.response.data)
                {
                    this.v_errores = error.response.data.errors;
                }
            }
        },
        async eliminarValor(id) 
        {
            console.log(id);
            const  res = await axios.delete('/dashboard/valores/'+id);
            this.getValores(this.id);
            this.list();
            
        },
        async save() {
            try
            {
                let fields = new FormData();
                for(let key in this.info)
                {
                    fields.append(key,this.info[key]);
                }
                const res = await axios.post('/dashboard/informacion/'+ this.id, fields)
                .then(response=>
                {
                    if(response.data==1)
                    {
                        this.$swal({title: 'Exitoso',text: 'Actualizado con éxito',icon: 'success',confirmButtonText: 'Ok'});
                    }
                    else
                    {
                        this.$swal({title: 'Error!',text: 'Ha ocurrido un error' ,icon: 'error',confirmButtonText: 'Ok'});
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

        },
        openModal(data={}) {
            this.modal=1
            this.id=data.id;
            this.info.id=data.id;
            this.titleModal = "Modificar información publica";
            this.info.urlLogo= data.urlLogo;
            this.info.urlCatalogo= data.urlCatalogo;
            this.info.horarioAtencion=data.horarioAtencion;
            this.info.correo= data.correo;
            this.info.mision= data.mision;
            this.info.vision = data.vision
            this.info.valores = data.valores;
            this.info.imagen = false;  
            this.info.quienesSomos = data.quienesSomos;
        },
        closeModal() {
            this.errores = {};
            this.modal=0
            this.selImagen = false;
            this.$refs.urlImg.value=null;
            this.info.urlLogo = null;
            this.imagenMiniatura='';
            this.selImagen = false;
        },
        obtenerImagen(e)
        {
            this.info.imagen = true; 
            this.selImagen = true;
            this.info.urlLogo=e.target.files[0];
            this.cargarImagen(this.info.urlLogo); 
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
