<template>  
    <div class="row">
        <!-- Modal -->
        <div class="modal fade" :class="{show:modal}" id="nuevo-Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-lg">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{tituloModal}}</h5>
                        <button type="button"  @click="cerrarModal();" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form v-on:submit.prevent="guardar">
                        <div class="modal-body">
                            <div class="my-4">
                                <label for="anio">Año reseña</label>
                                <input v-model="reseniaHistorica.anio" type="text" class="form-control" placeholder="Año reseña" id="anio">
                                <span class="text-danger" v-if="errores.anio">{{errores.anio[0]}}</span>
                            </div>
                            <div class="my-4">
                                <label for="importancia">Importancia</label>
                                <select  v-model="reseniaHistorica.importancia" class="form-select" aria-label="Default select example" placeholder="Importancia" id="importancia">
                                    <option selected>Seleccione la Importancia</option>
                                    <option value="1">Muy importante</option>
                                    <option value="2">Importante</option>
                                    <option value="3">No tan Importante</option>
                                </select>
                                <span class="text-danger" v-if="errores.importancia">{{errores.importancia[0]}}</span>
                            </div>
                            <div class="my-4">
                                <label for="descripcion">Descripción</label>
                                <textarea style="height: 100px" v-model="reseniaHistorica.descripcion" type="text" class="form-control" placeholder="Descripcion" id="descripcion"></textarea>
                                <span class="text-danger" v-if="errores.descripcion">{{errores.descripcion[0]}}</span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button"  @click="cerrarModal();" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button"  @click="guardar();" class="btn btn-primary"  data-bs-dismiss="modal">Guardar Cambios</button>
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
        <div class="col-sm-4">
            <label for="customRange3" class="form-label">Mostrando: {{reseniaHistoricas.from}} - {{reseniaHistoricas.to }} | Total: {{reseniaHistoricas.total}}</label>
        </div>
        <div class="col-xm-12">
            <button @click="modificar=false;abrirModal();" type="button" class="btn btn-success ">
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
                <select @change="listar();" v-model="filtros.per_page" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>Seleccione:</option>
                    <option value="4">4</option>
                    <option value="8">8</option>
                    <option value="12">12</option>
                    <option value="20">20</option>
                </select>
            </div>
        </div>
        <form @submit.prevent="listar">
            <div class="row mt-1 mb-1">
                <div class="col-sm-1">
                    <label for="anio" class="form-label">Año:</label>
                    <input class="form-control" type="number" v-model="filtros.anio" name="anio" min="1800">
                </div>
                <div class="col-sm-3">
                    <label class="form-label" for="importancia">Importancia</label>
                    <select  v-model="filtros.importancia" class="form-select" aria-label="Default select example" placeholder="Importancia" id="importancia">
                        <option value="none">Seleccione la Importancia</option>
                        <option value="1">Muy importante</option>
                        <option value="2">Importante</option>
                        <option value="3">No tan Importante</option>
                    </select>
                </div>
                <div class="col-sm-1 align-self-end">
                    <button @click="listar();"  type="submit" class="btn btn-outline-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
        <div class="col-xm-12 col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered border-primary ">
                    <thead class="text-center table-dark"> 
                        <tr>
                            <th scope="col">Año</th>
                            <th scope="col">Importancia</th>
                            <th scope="col">Descripcion</th>                            
                            <th scope="col"  class="text-center">Acciones</th>                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="rese in reseniaHistoricas.data" :key="rese.id">
                            <td>{{rese.anio}}</td>
                            <td>
                                <span v-if="rese.importancia==3" class="badge bg-secondary">No muy importante</span>
                                <span v-if="rese.importancia==2" class="badge bg-info">Importante</span>
                                <span v-if="rese.importancia==1" class="badge bg-success">Muy Importante</span>
                            </td> 
                            <td>{{rese.descripcion}}</td>
                            <td>
                                <button type="button" @click="modificar=true; abrirModal(rese);" class="btn btn-outline-info btn-sm">
                                    <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg>
                                </button>
                                <button type="button" @click="modificar=true; eliminarM(rese.id);" class="btn btn-outline-danger btn-sm">
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
        <div class="row">
            <div class="col-sm-4 text-center">
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
                        <li class="page-item" :class="{disabled:filtros.page==reseniaHistoricas.last_page}" >
                            <a class="page-link" @click="filtros.page++, listar();" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item" :class="{disabled:filtros.page==reseniaHistoricas.last_page}" >
                            <a class="page-link" @click="filtros.page=reseniaHistoricas.last_page, listar();" href="#" >
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
    export default 
    {
        data()
        {
            return{
                reseniaHistorica:{
                    id:'',
                    anio:'',
                    importancia:'',
                    descripcion:'',
                },
                filtros:
                {
                    anio: null,
                    importancia: "none",
                    page:1,
                    per_page:4,
                },
                cargando:  false,
                id:0,
                modificar:true,
                modal:0,
                reseniaHistoricas:[],
                tituloModal:'',
                errores:{},
                paginas:[],
            }
        },
        methods:{
            async listar()
            {
                this.cargando = true;
                const res = await axios.get('/dashboard/reseniaHistorica/',{params:this.filtros,});
                this.reseniaHistoricas = res.data;
                this.listarPaginas();
                this.cargando = false;
            },
            listarPaginas(){
                const n = 2;
                let arrayN=[];
                let ini = this.filtros.page - 2;
                if(ini<1){
                    ini=1;
                }
                let fin = this.filtros.page + 2;
                if(fin>this.reseniaHistoricas.last_page){
                    fin=this.reseniaHistoricas.last_page;
                }
                for(let i=ini; i<=fin; i++){
                    arrayN.push(i);
                }
                this.paginas=arrayN;    
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
                    const res = await axios.delete('/dashboard/reseniaHistorica/'+id)
                    .then(response=>
                    {
                        if(response.data==1)
                        {
                            this.$swal({title: 'Exitoso',text: 'Eliminado con éxito',icon: 'success',confirmButtonText: 'Ok'});
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
                this.listar();
            },
            async guardar()
            {
                if(this.modificar)
                {
                    try
                    {
                        let fields = new FormData();
                        for(let key in this.reseniaHistorica)
                        {
                            fields.append(key,this.reseniaHistorica[key]);
                        }
                        const res = await axios.put('/dashboard/reseniaHistorica/'+this.id,fields)
                        .then(response=>
                        {
                            if(response.data==1)
                            {
                                this.$swal({title: 'Exitoso',text: 'Actualizado con éxito',icon: 'success',confirmButtonText: 'Ok'});
                            }
                            else
                            {
                                this.$swal({title: 'Error!',text: 'Ha ocurrrido algo...',icon: 'error',confirmButtonText: 'Ok'});
                            }
                        });
                        this.cerrarModal();
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
                        for(let key in this.reseniaHistorica)
                        {
                            fields.append(key,this.reseniaHistorica[key]);
                        }
                        const res = await axios.post('/dashboard/reseniaHistorica',fields)
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
                        this.cerrarModal();
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
            abrirModal(data={})
            {
                this.modal=1;
                if(this.modificar)
                {
                    this.id=data.id;
                    this.reseniaHistorica.id = data.id;
                    this.tituloModal = "Modificar Reseña";
                    this.reseniaHistorica.anio=data.anio;
                    this.reseniaHistorica.descripcion=data.descripcion;
                    this.reseniaHistorica.importancia=data.importancia;    
                }
                else
                {
                    this.id=0;
                    this.reseniaHistorica.id = 0;
                    this.tituloModal='Agregar Reseña';
                    this.reseniaHistorica.anio='';
                    this.reseniaHistorica.descripcion='';
                    this.reseniaHistorica.importancia='';   
                }
            },
            cerrarModal(){
                this.errores= {};
                this.modal=0;
                this.errores={};
            },
        },
        created(){
            this.listar();
        }
    }
</script>