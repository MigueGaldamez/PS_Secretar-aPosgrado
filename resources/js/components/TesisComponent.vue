<template>
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
                                <div class="mb-3 col-sm-6 ">
                                    <label for="nombre" class="form-label">Posgrado al que pertenece</label>
                                    <select v-model="tesi.posgrado"  class="form-select" aria-label="posgrado">
                                        <option value=0 >Selecciona un Posgrado</option>
                                        <option v-for="posgrado in posgrados" :key="posgrado.id" v-bind:value="posgrado.id"> {{posgrado.nombre}}</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="publicado" class="form-label">Año publicado</label>
                                    <input class="form-control" type="number" v-model="tesi.publicado" name="tentacles" min="1800">
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <label for="titulo" class="form-label">Titulo</label>
                                    <textarea v-model="tesi.titulo" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <label for="autor" class="form-label">Autor/es</label>
                                    <textarea v-model="tesi.autor" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <label for="link" class="form-label">Link</label>
                                    <input class="form-control" type="url" v-model="tesi.link" name="link" id="url" placeholder="https://ejemplo.com" pattern="https://.*"> 
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
        <div v-if="cargando" class="d-flex align-items-center justify-content-center m-3">
            <strong>Loading...</strong>
            <div class="">
                <div class="spinner-grow text-danger" role="status"></div>
                <div class="spinner-grow text-warning" role="status"></div>
                <div class="spinner-grow text-info" role="status"></div>
            </div>
        </div>
        <div class="col-xm-12 col-sm-12">
            <table class="table table-striped table-bordered border-danger bg-white">
                <thead class="text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th>Posgrado</th>
                        <th>Publicado</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Link</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-center">
 
                    <tr v-for="tesi in tesis" :key="tesi.id">
                        <th >{{tesi.id}}</th>
                        <td>{{tesi.posgrado.nombre}}</td>
                        <td>{{tesi.publicado}}</td>
                        <td>{{tesi.titulo}}</td>
                        <td>{{tesi.autor}}</td>
                        <td>
                            <a class="btn btn-primary" :href="tesi.link" role="button">Link</a>
                        </td>
                        <td>
                            <button type="button" @click="update=true; openModal(tesi);" class="btn btn-outline-info btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                            </button>
                            <button type="button" @click="update=true; eliminarM(tesi.id);" class="btn btn-outline-danger btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                            </button>
                        </td>   
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
    export default 
    {
        data()
        {
            return{
                tesi:
                {
                    id:0,
                    posgrado:null,
                    publicado:  2021,
                    titulo:'',
                    autor:'',
                    link:'',
                },
                cargando: false,
                errors: [],
                errores:{},
                id:0,
                update:true,
                modal:0,
                titleModal:'',
                posgrados: [],
                tesis:[],
            }
        },
        methods:
        {
            async list()
            {
                try
                {
                    const res = await axios.get('/dashboard/tesis_api');
                    this.tesis = res.data;
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
            async listarSelects()
            {
                const resP = await axios.get('/dashboard/posgrados_api');
                this.posgrados = resP.data;
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
                    const res = await axios.delete('/dashboard/tesis_api/'+id);
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
            async save()
            {
                if(this.update)
                {
                    try
                    {
                        let fields = new FormData();
                        for(let key in this.tesi)
                        {
                            fields.append(key,this.tesi[key]);
                        }
                        const res = await axios.put('/dashboard/tesis_api/'+this.id, this.tesi)
                        .then(response=>{
                            if(response.data==1)
                            {
                                this.$swal({title: 'Exitoso',text: 'Actualizado con éxito',icon: 'success',confirmButtonText: 'Ok'});
                            }
                            else
                            {
                                this.$swal({title: 'Error!',text: console.log(response.data) ,icon: 'error',confirmButtonText: 'Ok'});
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
                        for(let key in this.tesi)
                        {
                            fields.append(key,this.tesi[key]);
                        }
                        //.then(response=>{console.log(response.data)})
                        const res = await axios.post('/dashboard/tesis_api', fields)
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
                this.modal=1
                try
                {
                    if(this.update)
                    {
                        this.titleModal = "Modificar Tesis";
                        this.id=data.id;
                        this.tesi.id = data.id;
                        this.tesi.posgrado= data.posgrado.id;
                        this.tesi.publicado= data.publicado;
                        this.tesi.titulo = data.titulo;
                        this.tesi.autor = data.autor;
                        this.tesi.link = data.link;
                    }
                    else
                    {
                        this.titleModal = "Agregar Tesis";
                        this.id=0;
                        this.tesi.posgrado= 0;
                        this.tesi.publicado= data.publicado;
                        this.tesi.titulo = data.titulo;
                        this.tesi.autor = data.autor;
                        this.tesi.link = data.link;
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
                this.modal=0
            },
        },
        created()
        {
            this.cargando = true;
            try 
            {
                this.listarSelects();
                this.list();
                
                
            } 
            catch (error) 
            {
                console.log(error)
                this.cargando = false
            }
        },
        computed:
        {
            
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