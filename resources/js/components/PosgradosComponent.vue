<template >
    <div class="row">
        <div class="col-xm-12">
            <button @click="update=false; openModal();" type="button" class="btn btn-success ">
                Nuevo
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg> 
            </button>
        </div>
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
                                    <label for="formFile" class="form-label">Imagen representativa del posgrado</label>
                                    <input ref="urlImg" accept="image/*" class="form-control" type="file" name="urlImagen" @change="obtenerImagen">
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <img :src="imagen" class="img-thumbnail" alt="...">
                                </div>
                                <div class="mb-3 col-sm-6 offset-sm-3">
                                    <label for="nombre" class="form-label">Facultad</label>
                                    <select v-model="posgrado.facultad"  class="form-select" aria-label="facultad">
                                        <option value=0 >Selecciona una Facultad</option>
                                        <option v-for="facultad in facultades" :key="facultad.id" v-bind:value="facultad.id"> {{facultad.nombre}}</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-sm-12" >
                                    <label for="nombrePosgrado" class="form-label">Nombre posgrado</label>
                                    <input v-model="posgrado.nombre" class="form-control" type="text" placeholder="Nombre" aria-label="Nombre de la facultad">
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <label for="descripcionPosgrado" class="form-label">Descripción</label>
                                    <textarea v-model="posgrado.descripcion" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                                </div>
                                <div class="mb-3 col-sm-12" >
                                    <label for="tituloPosgrado" class="form-label">Titulo</label>
                                    <input v-model="posgrado.titulo" class="form-control" type="text" placeholder="Titulo" aria-label="Titulo del posgrado">
                                </div>
                                <div class="mb-3 col-sm-4">
                                    <label for="TipoProgramaPosgrado" class="form-label">Tipo Pograma</label>
                                    <select v-model="posgrado.tipo_programa"  class="form-select" aria-label="tipo_programa">
                                        <option value=0 >Selecciona una Modalidad</option>
                                        <option v-for="tipo_programa in tipo_programas" :key="tipo_programa.id" v-bind:value="tipo_programa.id"> {{tipo_programa.nombre}}</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <input class="form-check-input" @change="ofertado(posgrado.ofertado)" v-model="posgrado.ofertado" true-value="1" false-value="0" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label"  for="flexSwitchCheckDefault">{{textOfertado}}</label>
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
        <!--Fin del modal -->
        <div v-for="posgrado in posgrados" :key="posgrado.id" class=" col-sm-6">
            <div class="card mb-3" >
                <div class="row g-0">
                    <div class="col-md-4">
                        <img :src="posgrado.urlImagen" class="img-fluid rounded-start" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{posgrado.tipo_programa.nombre}}: {{posgrado.nombre}}</h5>
                            <p class="card-text"> Ofertado: 
                                <svg v-if="posgrado.ofertado == 1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg>
                                <svg v-if="posgrado.ofertado == 0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                            </p>
                            <p class="card-text">Titulo: {{posgrado.titulo}}</p>
                            <p class="card-text">{{posgrado.descripcion}}</p>
                            <p class="card-text"><small class="text-muted">{{posgrado.facultad.nombre}}</small></p>
                            <div class="position-relative bottom-0 start-50 translate-middle-x mb-1 ">
                                <button type="button"  @click="update=true; openModal(posgrado);" class="btn btn-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg>
                                </button>
                                <button type="button" @click="eliminarM(posgrado.id);" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default 
{
        data()
        {
            return{
                posgrado:
                {
                    id:0,
                    urlImagen: null,
                    facultad:null,
                    nombre:'',
                    descripcion:'',
                    titulo: '',
                    tipo_programa: null,
                    ofertado: 0,
                },
                textOfertado: '',
                errors: [],
                errores:{},
                id:0,
                update:true,
                modal:0,
                titleModal:'',
                posgrados: [],
                facultades: [],
                tipo_programas: [],
                imagenMiniatura:'',
            }
        },
        methods:
        {
            async list()
            {
                try
                {
                    const res = await axios.get('/dashboard/posgrados_api');
                    this.posgrados = res.data;
                }
                catch(error)
                {
                    if(error.response.data)
                    {
                        this.errores = error.response.data.errors;
                    }
                }
            },
            async listarSelects()
            {
                const resF = await axios.get('/dashboard/facultad_api');
                const resT = await axios.get('/dashboard/tipo_programas_api');
                this.facultades = resF.data;
                this.tipo_programas =  resT.data;
            },
            eliminarM(id)
            {
                const confirmacion = false;
                this.$swal({
                    title: '¿Estás seguro?',
                    text: "No hay vuelta atras si lo borras",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, ¡Bórralo!',
                    cancelButtonText: 'Cancelar',
                    focusCancel: true
                }).then((result)=>
                {
                    if(result.isConfirmed)
                    {
                        this.eliminar(id);
                    }
                    else if(result.isDismissed)
                    {
                        console.log("Cancelar");
                    }
                });
            },
            async eliminar(id) 
            {
                try
                {   
                    const res = await axios.delete('/dashboard/posgrados_api/'+id);
                }
                catch(error)
                {
                    if(error.response.data)
                    {
                        this.errores = error.response.data.errors;
                        console.log(this.errores);
                    }
                }
                this.list();
            },
            ofertado(estado)
            {
                if(estado ==1)
                {
                    this.textOfertado = "Ofertado";
                }
                else
                {
                    this.textOfertado = "No Ofertado";
                } 
            },
            async save()
            {
                if(this.update)
                {
                    try
                    {
                        let fields = new FormData();
                        for(let key in this.posgrado)
                        {
                            fields.append(key,this.posgrado[key]);
                        }
                        //.then(response=>{console.log(response.data)})
                        const res = await axios.post('/dashboard/posgrados_api/'+this.id,fields)
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
                    }
                    catch(error)
                    {
                        if(error.response.data)
                        {
                            this.errores = error.response.data.errors;
                            console.log(this.errores);
                        }
                    }
                }
                else
                {
                    try
                    {
                        let fields = new FormData();
                        for(let key in this.posgrado)
                        {
                            fields.append(key,this.posgrado[key]);
                        }
                        const res = await axios.post('/dashboard/posgrados_api', fields)
                        .then(response=>{
                        if(response.data==1)
                        {
                            this.$swal({title: 'Exitoso',text: 'Guardado con éxito',icon: 'success',confirmButtonText: 'Ok'});
                        }
                        else
                        {
                            this.$swal({title: 'Error!',text: 'Ha ocurrrido algo...',icon: 'error',confirmButtonText: 'Ok'});
                        }
                        });
                    }
                    catch(error)
                    {
                        if(error.response.data)
                        {
                            this.errores = error.response.data.errors;
                            console.log(this.errores);
                        }
                    }
                }
                this.closeModal();
                this.list();
            },
            openModal(data={}) 
            {
                this.modal=1;
                try
                {
                    if(this.update)
                    {
                        this.titleModal = "Modificar Posgrado";
                        this.id=data.id;
                        this.posgrado.id = data.id
                        this.posgrado.urlImagen = data.urlImagen;
                        this.posgrado.facultad = data.facultad.id;
                        this.posgrado.nombre = data.nombre;
                        this.posgrado.descripcion = data.descripcion;
                        this.posgrado.titulo = data.titulo;
                        this.posgrado.tipo_programa = data.tipo_programa.id;
                        this.posgrado.ofertado = data.ofertado;
                        this.ofertado(data.ofertado);
                    }
                    else
                    {
                        this.ofertado(data.ofertado);
                        this.titleModal = "Agregar nuevo Posgrado";
                        this.id=0;
                        this.posgrado.urlImagen = null;
                        this.posgrado.facultad = 0;
                        this.posgrado.nombre = '';
                        this.posgrado.descripcion = '';
                        this.posgrado.titulo = '';
                        this.posgrado.tipo_programa = 0;
                        this.posgrado.ofertado = 0;
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
                this.$refs.urlImg.value=null;
                this.posgrado.urlImagen = null;
                this.imagenMiniatura='';
                this.modal=0;
                this.textOfertado = '';

            },
            obtenerImagen(e)
            {
                this.posgrado.urlImagen=e.target.files[0];
                this.cargarImagen(this.posgrado.urlImagen); 
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
            this.listarSelects();
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