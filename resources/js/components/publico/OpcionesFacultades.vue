<template>
<div>
    <div class="text-center">
            <div id="wrapper-fac" class="mx-auto">
            <div id="carousel-fac">
                <div id="content-fac">
                    <div class="item-fac card-body" v-for="facultad in facultades" :key="facultad.id"  @click="mostrar=true; mostrarFacultad(facultad);">
                    <h4 class="textoSuavecito"> {{facultad.nombre}}</h4>
                    
                    </div>
                </div>
            </div>
            <button id="prev-fac">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                >
                <path fill="none" d="M0 0h24v24H0V0z" />
                <path d="M15.61 7.41L14.2 6l-6 6 6 6 1.41-1.41L11.03 12l4.58-4.59z" />
                </svg>
            </button>
            <button id="next-fac">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                >
                <path fill="none" d="M0 0h24v24H0V0z" />
                <path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z" />
                </svg>
            </button>
        </div>
        <div class="colorGris mt-4 py-2" :style="'background-color: '+facultad.color+';'">
            <h3 class="textoSuavecito text-light" >Investigaciones en curso de {{facultad.nombre}}</h3>      
        </div>
   
    </div>
    <div  v-for="pos in facultad.posgrados_con_inv" :key="pos.id" class="container">  
        <div v-for="(inv,index) in pos.inv" :key="inv.id" class="row my-4">
            <div v-if="index%2==0" class="card-containerR">
                <div class="float-layoutR">
                    <div class="card-imageR" >
                    <img src="">
                        <div class="cardR"  :style="'border-right: 10px solid '+facultad.color+';'">
                            <h4><b>{{inv.titulo}}</b></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                            <div class="row">
                                <div class="col">
                                    <a href="" class=""><p class="card-text"><small class="text-muted">Descargar </small></p></a>
                                </div>
                                <div class="col">
                                    <p class="card-text text-end"><small >Publicado:<b>Martes 31 de agosto de 2021</b> </small></p>
                                </div>
                            </div>      
                        </div>
                    </div>
                </div>
            </div>
            <div  v-if="index%2!=0" class="card-containerL">
                <div class="float-layoutL">
                    <div class="card-imageL">
                
                        <div class="cardL" :style="'border-left: 10px solid '+facultad.color+';'">
                            <h4><b>{{inv.titulo}}</b></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                            <div class="row">
                                <div class="col">
                                    <p class="card-text"><small class="text-muted">Descargar </small></p>
                                </div>
                                <div class="col">
                                    <p class="card-text text-end"><small >Publicado:<b>Martes 31 de agosto de 2021</b> </small></p>
                                </div>
                            </div>
                        </div>
                        <img src="">
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
                facultad: {
                },
                posgrado:{
                    id:0,
                    nombre:'',
                },
               
                facultades:[],
                id:0,
                imagenMiniatura:'',
                mostrar:false,
                }
        },
        methods: {
             async list()
            {
                try
                {
                    const res = await axios.get('/facultades/conInv');
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
            mostrarFacultad(data={}){
                this.id = data.id;
                this.facultad = data;
            },
       
        },
        created() 
        {
            this.list();
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
