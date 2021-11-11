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
                                <label for="formFile" class="form-label">Logo de la Facultad</label>
                                <input ref="urlImg" accept="image/*" class="form-control" type="file" name="urlImagen" @change="obtenerImagen">
                            </div>
                            <div class="mb-3 col-sm-6">
                                <img :src="imagen" class="img-thumbnail" alt="...">
                            </div>
                            <div class="mb-3 col-sm-12" >
                                <label  class="form-label">Nombre de la Facultad</label>
                                <input v-model="facultad.nombre" class="form-control" type="text" placeholder="Nombre" aria-label="Nombre de la facultad">
                            </div>
                            <div class="mb-3 col-sm-12 ">
                                <label  class="form-label">Descripcion pequeña</label>
                                <textarea v-on:keyup="contadorCharD" v-model="facultad.descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                <div id="passwordHelpBlock" class="form-text">
                                {{charFaltantesD}}/255
                                </div>
                            </div>
                            <div class="mb-3 col-sm-12" >
                                <label  class="form-label">Informacion de contacto de Diplomado</label>
                                <textarea v-on:keyup="contadorCharC"   v-model="facultad.contactoDiplomado" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                <div id="passwordHelpBlock" class="form-text">
                                    {{charFaltantesC}}/120 | Puedes separar email, telefono con una ",". 
                                </div>
                            </div>
                            <div class="mb-3 col-sm-12" >
                                <label  class="form-label">Informacion de contacto de Posgrados</label>
                                <textarea v-on:keyup="contadorCharP"   v-model="facultad.contactoPosgrado" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                <div id="passwordHelpBlock" class="form-text">
                                    {{charFaltantesP}}/120 | Puedes separar email, telefono con una ",". 
                                </div>
                            </div>
                            <div class="mb-3 col-sm-6" >
                                <label class="form-label">Color Facultad</label>
                                <input type="color" class="form-control form-control-color" id="exampleColorInput" v-model="facultad.color" title="Choose your color">
                            </div>
                            <div class="mb-3 col-sm-6">
                                <input class="form-check-input" v-model="facultad.multidis" true-value="1" false-value="0" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label"  for="flexSwitchCheckDefault">Multi-Disciplinaria</label>
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
        <div class="col-sm-3" v-for="facultad in facultades" :key="facultad.id">
            <div class="card p-2 h-100" >
                <img :src="facultad.urlImagen" class="card-img-top h-50" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">Facultad de {{facultad.nombre}}</h5>
                        <p class="card-text ">{{facultad.descripcion}}</p>
                        <p v-bind:style="{color: facultad.color } "> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-palette-fill" viewBox="0 0 16 16">
                            <path d="M12.433 10.07C14.133 10.585 16 11.15 16 8a8 8 0 1 0-8 8c1.996 0 1.826-1.504 1.649-3.08-.124-1.101-.252-2.237.351-2.92.465-.527 1.42-.237 2.433.07zM8 5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm4.5 3a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM5 6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                        </svg></p>
                    <div class="position-relative bottom-0 start-50 translate-middle-x mb-1 ">
                        <button type="button"  @click="update=true; openModal(facultad);" class="btn btn-info">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg>
                        </button>
                        <button type="button" class="btn btn-danger">
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
            },
            //objetos para el contador de caracteres
            charMaxC:120,//Maximo para contacto de diplomado
            charFaltantesC:120, //Faltante para contacto de diplomado
            charMaxD:255,//Maximo para la descripcion
            charFaltantesD:255,//faltante para la descripcion
            charMaxP:120,//Maximo para contacto posgrado
            charFaltantesP:120,//faltante contacto posgrado
            update:true,
            modal:0,
            titleModal:'',
            facultades:[],
            id:0,
            imagenMiniatura:'',
        }
    },
    methods: {
        async list()
        {
            try
            {
                const res = await axios.get('/dashboard/facultad_api');
                this.facultades = res.data;
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
                        console.log(response.data);
                    }
                    else
                    {
                        this.$swal({title: 'Error!',text: "error" ,icon: 'error',confirmButtonText: 'Ok'});
                        console.log(response.data);
                    }
                    });
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
            }
        },
        closeModal() {
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
<style>
.show
{
    display: list-item;
    opacity: 1;
}

</style>