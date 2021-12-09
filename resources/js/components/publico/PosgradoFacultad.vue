<template>
<div>
      <div id="wrapper-facTes" class="mx-auto mt-4">
            <div id="carousel-facTes">
                <div id="content-facTes" >               
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

 
 
    <div v-if="mostrar" id="informacionPosgrado">
        <div class="colorGris mt-4 pb-1 py-3 stickyHeaderFacul"  :style="'background-color: '+facultad.color+';'" >
                <h3 class="text-light text-center"><span class="textoSuavecito">Tesis de Posgrados de la <b>{{posgrado.nombre}}</b></span></h3>
                  <h5 class="textoSuavecito text-light text-center" >En la Facultad: {{facultad.nombre}}</h5>   
        </div>
        <div class="container">
             <div class="col-12 md-12 text-center mt-2">
             <nav>
                <ul class=" pagination">
                    <li class="page__numbers page-item"  :class="{deactivado:current==1}"  @click="current=1"><a class="page__link" href="#informacionPosgrado"><span>&laquo;</span></a></li>
                    <li class="page__numbers page-item"  :class="{deactivado:current==1}" @click="current--" ><a class="page__link"  href="#informacionPosgrado">&#60;</a></li>
                    <li class="page__numbers page-item"  v-for="n in paginas" :key="n" :class="{active:current==n+1}" @click="current=n+1" ><a class="page__link" href="#informacionPosgrado">{{n+1}}</a></li>
                    <li class="page__numbers page-item"  :class="{deactivado:current==paginas.length}" @click="current++" ><a class="page__link"   href="#informacionPosgrado">&#62;</a></li>
                    <li class="page__numbers page-item"  :class="{deactivado:current==paginas.length}"  @click="current=paginas.length"><a class="page__link"  href="#informacionPosgrado" ><span >&raquo;</span></a></li>
                </ul>
            </nav>
        </div>
            <div class="row">
                <div v-for="tesis in paginated" :key="tesis.id" class="card-containerR mb-1">
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
                current: 1,
                pageSize: 5,
                facultades:[],
                id:0,
                imagenMiniatura:'',
                mostrar:true,
                }
        },
        computed: {
            facsGroups () {
                return Array.from(Array(Math.ceil(4)).keys())
            }, 
            indexStart() {
            return (this.current - 1) * this.pageSize;
            },
            indexEnd() {
            return this.indexStart + this.pageSize;
            },
            paginated() {
                if(this.posgrado.tesis!==undefined){
                    return this.posgrado.tesis.slice(this.indexStart, this.indexEnd);
                }else{
                    return 0;
                }
            },
            paginas(){
                if(this.posgrado.tesis!==undefined){
                    return Array.from(Array(Math.ceil(this.posgrado.tesis.length/this.pageSize)).keys())
                }else{
                    return 0;
                }

            }
        },
       
        methods: {
             async list()
            {
                try
                {
                    const res = await axios.get('/facultades/conTesis');
                    this.facultades = res.data;
                    this.mostrarFacultad(this.facultades[0]);
                    this.mostrarPosgrado(this.facultades[0].posgrados_con_tesis[0]);
                  
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
                this.current=1;
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
