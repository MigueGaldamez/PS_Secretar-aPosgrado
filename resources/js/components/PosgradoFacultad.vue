<template>
<div>
    <div class="container">
        <div class="row  mt-4">
            <div class="col col-lg-3 col-sm-6 py-1" v-for="facultad in facultades" :key="facultad.id">
            <div @click="mostrar=true; mostrarFacultad(facultad);" class="card" >       
                <div class="card-body">
                    <h5 class="card-title">{{facultad.nombre}}</h5>
                      <div class="titulohr mb-4"></div>
                </div>    
            </div>
            </div>
        </div>
        
    </div>
 
    <div v-if="mostrar">
        <div class="colorGris mt-4 pb-1 pt-2">
                <h3 class="text-light text-center"><span class="textoSuavecito">Tesis de Posgrados de la <b>{{facultad.nombre}}</b></span></h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="card-containerR mb-4">
                       <div class=" callout-right callout-right-primary row calloutTesis">
                            <div class="col">                          
                            <a href="" class="text-dark" ><h5 class="text-dark"><b>Medios de vida sostenible y potencial agroecoturístico del complejo Santa Rita-Zanjón El Chino, San Francisco Menéndez, Ahuachapán.</b></h5></a>
                            <span class="text-uppercase">MAESTRÍA EN AGRICULTURA SOSTENIBLE. </span><br>
                            <span class="card-text lh-sm"><small >Autor:<b>Amaya, Oscar Antonio</b> </small></span><br>
                            <span class="card-text lh-sm"><small >Publicado:<b>Martes 31 de agosto de 2021</b> </small></span>  
                            </div>     
                        </div>
                         <div class=" callout-right callout-right-primary row calloutTesis">
                            <div class="col">                          
                            <a href="" class="text-dark" ><h5 class="text-dark"><b>Medios de vida sostenible y potencial agroecoturístico del complejo Santa Rita-Zanjón El Chino, San Francisco Menéndez, Ahuachapán.</b></h5></a>
                            <span class="text-uppercase">MAESTRÍA EN AGRICULTURA SOSTENIBLE. </span><br>
                            <span class="card-text lh-sm"><small >Autor:<b>Amaya, Oscar Antonio</b> </small></span><br>
                            <span class="card-text lh-sm"><small >Publicado:<b>Martes 31 de agosto de 2021</b> </small></span>  
                            </div>     
                        </div>
                        <div class=" callout-right callout-right-primary row calloutTesis">
                            <div class="col">                          
                            <a href="" class="text-dark" ><h5 class="text-dark"><b>Medios de vida sostenible y potencial agroecoturístico del complejo Santa Rita-Zanjón El Chino, San Francisco Menéndez, Ahuachapán.</b></h5></a>
                            <span class="text-uppercase">MAESTRÍA EN AGRICULTURA SOSTENIBLE. </span><br>
                            <span class="card-text lh-sm"><small >Autor:<b>Amaya, Oscar Antonio</b> </small></span><br>
                            <span class="card-text lh-sm"><small >Publicado:<b>Martes 31 de agosto de 2021</b> </small></span>  
                            </div>     
                        </div>
                         <div class=" callout-right callout-right-primary row calloutTesis">
                            <div class="col">                          
                            <a href="" class="text-dark" ><h5 class="text-dark"><b>Medios de vida sostenible y potencial agroecoturístico del complejo Santa Rita-Zanjón El Chino, San Francisco Menéndez, Ahuachapán.</b></h5></a>
                            <span class="text-uppercase">MAESTRÍA EN AGRICULTURA SOSTENIBLE. </span><br>
                            <span class="card-text lh-sm"><small >Autor:<b>Amaya, Oscar Antonio</b> </small></span><br>
                            <span class="card-text lh-sm"><small >Publicado:<b>Martes 31 de agosto de 2021</b> </small></span>  
                            </div>     
                        </div>
                        <div class=" callout-right callout-right-primary row calloutTesis">
                            <div class="col">                          
                            <a href="" class="text-dark" ><h5 class="text-dark"><b>Medios de vida sostenible y potencial agroecoturístico del complejo Santa Rita-Zanjón El Chino, San Francisco Menéndez, Ahuachapán.</b></h5></a>
                            <span class="text-uppercase">MAESTRÍA EN AGRICULTURA SOSTENIBLE. </span><br>
                            <span class="card-text lh-sm"><small >Autor:<b>Amaya, Oscar Antonio</b> </small></span><br>
                            <span class="card-text lh-sm"><small >Publicado:<b>Martes 31 de agosto de 2021</b> </small></span>  
                            </div>     
                        </div>
                         <div class=" callout-right callout-right-primary row calloutTesis">
                            <div class="col">                          
                            <a href="" class="text-dark" ><h5 class="text-dark"><b>Medios de vida sostenible y potencial agroecoturístico del complejo Santa Rita-Zanjón El Chino, San Francisco Menéndez, Ahuachapán.</b></h5></a>
                            <span class="text-uppercase">MAESTRÍA EN AGRICULTURA SOSTENIBLE. </span><br>
                            <span class="card-text lh-sm"><small >Autor:<b>Amaya, Oscar Antonio</b> </small></span><br>
                            <span class="card-text lh-sm"><small >Publicado:<b>Martes 31 de agosto de 2021</b> </small></span>  
                            </div>     
                        </div>
                        <div class=" callout-right callout-right-primary row calloutTesis">
                            <div class="col">                          
                            <a href="" class="text-dark" ><h5 class="text-dark"><b>Medios de vida sostenible y potencial agroecoturístico del complejo Santa Rita-Zanjón El Chino, San Francisco Menéndez, Ahuachapán.</b></h5></a>
                            <span class="text-uppercase">MAESTRÍA EN AGRICULTURA SOSTENIBLE. </span><br>
                            <span class="card-text lh-sm"><small >Autor:<b>Amaya, Oscar Antonio</b> </small></span><br>
                            <span class="card-text lh-sm"><small >Publicado:<b>Martes 31 de agosto de 2021</b> </small></span>  
                            </div>     
                        </div>
                         <div class=" callout-right callout-right-primary row calloutTesis">
                            <div class="col">                          
                            <a href="" class="text-dark" ><h5 class="text-dark"><b>Medios de vida sostenible y potencial agroecoturístico del complejo Santa Rita-Zanjón El Chino, San Francisco Menéndez, Ahuachapán.</b></h5></a>
                            <span class="text-uppercase">MAESTRÍA EN AGRICULTURA SOSTENIBLE. </span><br>
                            <span class="card-text lh-sm"><small >Autor:<b>Amaya, Oscar Antonio</b> </small></span><br>
                            <span class="card-text lh-sm"><small >Publicado:<b>Martes 31 de agosto de 2021</b> </small></span>  
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
                 facultad: 
                {
                    id:0,
                    urlImagen: null,
                    nombre: '',
                    descripcion: '',
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
            mostrarFacultad(data={}){
                this.id = data.id;
                this.facultad.nombre = data.nombre;
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
