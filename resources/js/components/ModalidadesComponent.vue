<template>
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
                            <div class="row">
                                <div class="mb-3 col-sm-12">
                                    <span class="badge bg-primary">Azul</span>
                                    <span class="badge bg-success">Verde</span>
                                    <span class="badge bg-danger">Rojo</span>
                                    <span class="badge bg-warning text-dark">Amarillo</span>
                                    <span class="badge bg-light text-dark">Gris</span>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="color" class="form-label">Color</label>
                                    <select v-model="modalidad.color"  class="form-select" aria-label="color">
                                        <option value="None" disabled >Selecciona un color</option>
                                        <option value="Azul">Azul</option>
                                        <option value="Verde">Verde</option>
                                        <option value="Rojo">Rojo</option>
                                        <option value="Amarillo">Amarillo</option>
                                        <option value="Gris">Gris</option>
                                    </select>
                                    <span class="text-danger" v-if="errores.color">{{errores.color[0]}}</span>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="nombre" class="form-label">Nombre de la modalidad</label>
                                    <input v-model="modalidad.nombre" class="form-control" type="text" placeholder="Modalidad" aria-label="nombre">
                                    <span class="text-danger" v-if="errores.nombre">{{errores.nombre[0]}}</span>
                                </div>  
                            </div>       
                        </div>
                        <div class="modal-footer">
                            <button @click="save();" type="button" class="btn btn-success" >Guardar</button>
                            <button v-on:click="closeModal();" type="button" class="btn btn-secondary" >Cerrar</button>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
        <!--Fin del modal -->
        <div v-if="cargando" class="d-flex align-items-center justify-content-center m-3">
            <strong>Cargando Datos...</strong>
            <div class="">
                <div class="spinner-grow text-danger" role="status"></div>
                <div class="spinner-grow text-warning" role="status"></div>
                <div class="spinner-grow text-info" role="status"></div>
            </div>
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
        <div class="col-xm-12 col-sm-6 offset-sm-3">
            <div class="table-responsive">
                <table class="table table-striped table-bordered border-primary">
                    <thead class="text-center table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr v-for="modalidad in modalidades" :key="modalidad.id">
                            <th >{{modalidad.id}}</th>
                            <td>
                                <span :class="['badge', badgeColor(modalidad.color)]">{{modalidad.nombre}}</span>
                            </td>
                            <td>
                                <button type="button" @click="update=true; openModal(modalidad);"  class="btn btn-outline-info btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg>
                                </button>
                            </td>
                            <td>
                                <button type="button" @click="update=true; eliminarM(modalidad.id);" class="btn btn-outline-danger btn-sm">
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
    </div>
</template>
<script>
    export default 
    {
        data()
        {
            return{
                modalidad:
                {
                    id:0,
                    nombre:'',
                    color: '',
                },
                cargando:  false,
                errores:{},
                id:0,
                update:true,
                modal:0,
                titleModal:'',
                modalidades:[],
            }
        },
        methods:
        {
            badgeColor(color)
            {
                if(color == 'Azul')
                {
                    color = 'bg-primary';
                }
                else if (color == 'Verde')
                {
                    color ='bg-success';
                }
                else if(color == 'Rojo')
                {
                    color ='bg-danger';
                }
                else if(color == 'Amarillo')
                {
                    color ='bg-warning text-dark';
                }
                else if(color == 'Gris')
                {
                    color ='bg-light text-dark';
                }
                else
                {
                    color ='bg-light'; 
                }
                return color;
            },
            async list()
            {
                try
                {
                    this.cargando = true;
                    const res = await axios.get('/dashboard/modalidades_api');
                    this.modalidades = res.data;
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
                    const  res = await axios.delete('/dashboard/modalidades_api/'+id)
                    .then(response=>
                    {
                        if(response.data==1)
                        {
                            this.$swal({title: 'Exitoso',text: 'Eliminado con éxito',icon: 'success',confirmButtonText: 'Ok'});
                        }
                        else
                        {
                            this.$swal({title: 'Error!',text: 'Ha ocurrido un error' ,icon: 'error',confirmButtonText: 'Ok'});
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
                
                this.list();
            },
            async save()
            {
                if(this.update)
                {
                    try
                    {
                        let fields = new FormData();
                        for(let key in this.modalidad)
                        {
                            fields.append(key,this.modalidad[key]);
                        }
                        const res = await axios.put('/dashboard/modalidades_api/'+this.id, this.modalidad)
                        .then(response=>{
                            if(response.data==1)
                            {
                                this.$swal({title: 'Exitoso',text: 'Actualizado con éxito',icon: 'success',confirmButtonText: 'Ok'});
                            }
                            else
                            {
                                this.$swal({title: 'Error!',text: 'Ha ocurrido un error',icon: 'error',confirmButtonText: 'Ok'});
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
                        for(let key in this.modalidad)
                        {
                            fields.append(key,this.modalidad[key]);
                        }
                        const res = await axios.post('/dashboard/modalidades_api', fields)
                        .then(response=>
                        {
                            if(response.data==1)
                            {
                                this.$swal({title: 'Exitoso',text: 'Guardado con éxito',icon: 'success',confirmButtonText: 'Ok'});
                            }
                            else
                            {
                                this.$swal({title: 'Error!',text: 'Ha ocurrrido algo...',icon: 'error',confirmButtonText: 'Ok'});
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
            openModal(data={}) 
            {
                this.modal=1
                try
                {
                    if(this.update)
                    {
                        this.titleModal = "Modificar Modalidad";
                        this.id=data.id;
                        this.modalidad.id = data.id;
                        this.modalidad.nombre = data.nombre;
                        this.modalidad.color = data.color;
                    }
                    else
                    {
                        this.titleModal = "Agregar Modalidad";
                        this.id=0;
                        this.modalidad.nombre = '';
                        this.modalidad.color = 'None';
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
                this.errores = {};
            },
        },
        created()
        {
            this.list();
        },
        computed:
        {
        },
    }
</script>
