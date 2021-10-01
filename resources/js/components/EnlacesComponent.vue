<template>
    <div>
    <!-- Button trigger modal -->
    <button @click="update=false; openModal();" type="button" class="btn btn-primary"  >
    Nuevo +
    </button>
    <!-- Modal -->
    <div  class="modal fade" :class="{show:modal}" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{titleModal}}</h5>
                    <button @click="closeModal();" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form v-on:submit.prevent="save" enctype="multipart/form-data">
                        <div class="row">
                            <div class="mb-3 col-sm-6">
                                <label for="formFile" class="form-label">Imagen o logo de la entidad</label>
                                <input accept="image/*" class="form-control" type="file" name="urlImagen" @change="obtenerImagen">
                            </div>
                            <div class="mb-3 col-sm-6">
                                <img :src="imagen" class="img-thumbnail" alt="...">
                            </div>
                            <div class="mb-3 col-sm-12" >
                                <label for="exampleFormControlTextarea1" class="form-label">Titulo del enlace</label>
                                <input v-model="enlace.titulo" class="form-control" type="text" placeholder="Nombre" aria-label="Nombre de la facultad">
                            </div>
                            <div class="mb-3 col-sm-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Descripcion pequeña</label>
                                <textarea v-model="enlace.descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="mb-3 col-sm-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Enlace</label>
                                <textarea v-model="enlace.link" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                        <button @click="save();" type="button" class="btn btn-success">Guardar</button>
                    </form>                 
                </div>
                <div class="modal-footer">
                    <button v-on:click="closeModal();" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-sm-3" v-for="enlace in enlaces" :key="enlace.id">
                <div class="card">
                    <img :src="enlace.urlImagen" class="card-img-top h-50" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Titulo: {{enlace.titulo}}</h5>
                        <p class="card-text">{{enlace.descripcion}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a target="_blank" :href="enlace.link" class="card-link">Ir al enlace:</a></li>
                    </ul>
                    <div class="card-body">
                        <button type="button"  @click="update=true; openModal(enlace);" class="btn btn-info card-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg>
                        </button>
                        <button type="button" @click="update=true; eliminar(enlace.id);" class="btn btn-danger card-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                        </button>
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
            enlace: 
            {
                id:0,
                urlImagen: null,
                titulo: '',
                descripcion: '',
                link: '',
            },
            update:true,
            modal:0,
            titleModal:'',
            enlaces:[],
            id:0,
            imagenMiniatura:'',
        }
    },
    methods: {
        async list()
        {
            try
            {
                const res = await axios.get('/dashboard/enlaces_api');
                this.enlaces = res.data;
            }
            catch(error)
            {
                if(error.response.data)
                {
                    this.errores = error.response.data.errors;
                }
            }

        },
        async eliminar(id) {
            const  res = await axios.delete('/dashboard/enlaces_api/'+id);
            this.list();
        },
        async save() {
            if(this.update)
            {
                try
                {
                    let fields = new FormData();
                    for(let key in this.enlace)
                    {
                        fields.append(key,this.enlace[key]);
                        
                    }
                    //.then(response=>{console.log(response.data)})
                    const res = await axios.post('/dashboard/enlaces_api/'+this.id, fields).then(response=>{console.log(response.data)})
                    this.imagenMiniatura = '';
                    this.enlace.urlImagen = '';
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
                    for(let key in this.enlace)
                    {
                        fields.append(key,this.enlace[key]);
                        
                    }
                    //.then(response=>{console.log(response.data)})
                    const res = await axios.post('/dashboard/enlaces_api', fields);
                    this.imagenMiniatura = '';
                    this.enlace.urlImagen = '';
                }
                catch(error)
                {
                    if(error.response.data)
                    {
                        
                        this.errores = error.response.data.errors;

                    }
                }
            }
            this.closeModal();
            this.list();
        },
        openModal(data={}) {
            this.modal=1
            if (this.update)
            {
                this.titleModal = "Modificar Enlace";
                this.id=data.id;
                this.enlace.id = data.id;
                //this.facultad.id=data.id;
                this.enlace.urlImagen = data.urlImagen;
                this.enlace.titulo = data.titulo;
                this.enlace.descripcion = data.descripcion;
                this.enlace.link = data.link;
            }
            else
            {
                this.id=0;
                this.titleModal = "Agregar Enlace";
                this.enlace.urlImagen = '';
                this.enlace.titulo ='';
                this.enlace.descripcion = '';
                this.enlace.link = '';
            }
        },
        closeModal() {
            this.modal=0
        },
        obtenerImagen(e)
        {
            this.enlace.urlImagen=e.target.files[0];
            this.cargarImagen(this.enlace.urlImagen); 
        },
        cargarImagen(file)
        {
            let reader = new FileReader();
            reader.onload = e=>
            {
                this.imagenMiniatura =e.target.result;
            }
            reader.readAsDataURL(file);
        }
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
<style>
.show
{
    display: list-item;
    opacity: 1;
}
</style>