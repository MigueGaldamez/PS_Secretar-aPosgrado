<template>
<div>
      <div id="wrapper-facTes" class="mx-auto mt-4">
            <div id="carousel-facTes">
                <div id="content-facTes">               
                    <div class="item-facTes col col-12 col-md-6" v-for="(group, i) in facsGroups" :key="group.id">
                        <div class="accordion" :id="'accordion'+i">
                            <div  class="accordion-item nolist" v-for="facultad in facultades.slice(i * (facultades.length/4), (i + 1) * (facultades.length/4))" :key="facultad.id">
                                <h2 class="accordion-header" :id="'id_'+facultad.id">
                                    <button class="btn accordion-boton" type="button" data-bs-toggle="collapse" :data-bs-target="'#coll-'+facultad.id" aria-expanded="false" :aria-controls="'coll-'+facultad.id">
                                        <b>{{facultad.nombre}}</b>
                                    </button>
                                </h2>
                                <div :id="'coll-'+facultad.id" class="accordion-collapse collapse" :aria-labelledby="'id_'+facultad.id" :data-bs-parent="'#accordion'+i">
                                    <div class="accordion-body row ">
                                        <div class="col col-12" v-for="posgrado in facultad.posgrados_con_tesis" :key="posgrado.id">
                                            <a class="btn btn-link text-dark" @click="mostrar=true; mostrarPosgrado(posgrado); mostrarFacultad(facultad);">{{posgrado.nombre}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <button id="prev-facTes">
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
            <button id="next-facTes">
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
        <!--
   <div class="container">
       <div class="row mt-4">
            <div class="col col-3" v-for="(group, i) in facsGroups" :key="group.id">
                 <div class="accordion" :id="'accordion'+i">
                    <div  class="accordion-item nolist" v-for="facultad in facultades.slice(i * (facultades.length/4), (i + 1) * (facultades.length/4))" :key="facultad.id">
                        <h2 class="accordion-header" :id="'id_'+facultad.id">
                            <button class="btn accordion-boton" type="button" data-bs-toggle="collapse" :data-bs-target="'#coll-'+facultad.id" aria-expanded="false" :aria-controls="'coll-'+facultad.id">
                                <b>{{facultad.nombre}}</b>
                            </button>
                        </h2>
                         <div :id="'coll-'+facultad.id" class="accordion-collapse collapse" :aria-labelledby="'id_'+facultad.id" :data-bs-parent="'#accordion'+i">
                            <div class="accordion-body row ">
                                <div class="col col-12" v-for="posgrado in facultad.posgrados_con_tesis" :key="posgrado.id">
                                    <a class="btn btn-link text-dark" @click="mostrar=true; mostrarPosgrado(posgrado); mostrarFacultad(facultad);">{{posgrado.nombre}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>-->
 
 
    <div v-if="mostrar">
        <div class="colorGris mt-4 pb-1 pt-2"  :style="'background-color: '+facultad.color+';'">
                <h3 class="text-light text-center"><span class="textoSuavecito">Tesis de Posgrados de la <b>{{posgrado.nombre}}</b></span></h3>
        </div>
        <div class="container">
         
            <div class="row">
                <div v-for="tesis in posgrado.tesis" :key="tesis.id" class="card-containerR mb-1">
                       <div class=" callout-right callout-right-primary row calloutTesis"  :style="'border-right: 10px solid '+facultad.color+';'">
                            <div class="col">                          
                            <a :href="tesis.link" class="text-dark" ><h5 class="text-dark"><b>{{tesis.titulo}}</b></h5></a>
                            <span class="text-uppercase">{{posgrado.nombre}}</span><br>
                            <span class="card-text lh-sm"><small >Autor: <b>{{tesis.autor}}</b> </small></span><br>
                            <span class="card-text lh-sm"><small >Año de publicacion: <b>{{tesis.publicado}}</b> </small></span>  
                            </div>     
                        </div>
                       
                    
                </div>
            </div>
        </div>
    </div>
    <div v-else class="mb-4">
         <div class="colorGris mt-4 pb-1 pt-2">
                <h3 class="text-light text-center"><span class="textoSuavecito">No ha seleccionado ninguna Facultad</span></h3>
        </div>
    </div>    
</div>
</template>

<script>
    export default {
        data(){
            return{
                facultad: [],
                posgrado:[],
               
                facultades:[],
                id:0,
                imagenMiniatura:'',
                mostrar:false,
                }
        },
        computed: {
            facsGroups () {
                return Array.from(Array(Math.ceil(4)).keys())
            }
        },
        methods: {
             async list()
            {
                try
                {
                    const res = await axios.get('/facultades/conTesis');
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
            mostrarPosgrado(data={}){
                this.id = data.id;
                this.posgrado = data;
            },
            mostrarFacultad(data={}){
               
               this.facultad =data;
              
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
