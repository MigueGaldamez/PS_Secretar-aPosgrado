<template>
<div>
    <div class="text-center">
         <div class="container text-center my-3">
            <div class="row mx-auto my-auto justify-content-center">
                <div id="informacionPosgrado" class="carousel slide recipeCarousel" data-bs-interval="false">
                    <div class="carousel-inner siOv" role="listbox">
                        <div v-for="facultad in facultades" :key="facultad.id" class="carousel-item active">
                            <div class="col-md-3 col-6 carou">
                                <div role="navigation" class="cardOv primary-navigation">
                                    <ul>  
                                        <li><a href="#">{{facultad.nombre}}</a>
                                            <ul class="dropdown">
                                                <li v-for="pos in facultad.posgrados_con_inv" :key="pos.id"><a href="#informacionPosgrado" @click="mostrarPosgrado(pos); mostrarFacultad(facultad);">{{pos.nombre}}</a></li>
                                                
                                            </ul>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev izquiInv" href="#informacionPosgrado" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next derecInv" href="#informacionPosgrado" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        
        </div>
      
      
      

        <div class="colorGris mt-4 py-3 stickyHeaderFacul" :style="'background-color: '+facultad.color+';'" id="titulo">
            <h3 class="textoSuavecito text-light" >Investigaciones en curso de {{posgrado.nombre}}</h3>    
             <h5 class="textoSuavecito text-light" >Facultad: {{facultad.nombre}}</h5>      
        </div>
   
    </div>


    
    <div  class="container">  
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
        <div v-for="(inv,index) in paginated" :key="inv.id" class="row my-4">
            <div v-if="index%2==0" class="card-containerR">
                <div class="float-layoutR">
                
                        <div class="cardR"  :style="'border-right: 10px solid '+facultad.color+';'">
                            <h5><a :href="''+inv.link" class="text-dark"><b>{{inv.titulo}}</b></a></h5>
                            
                            <small>Autor: <b>{{inv.autor}}</b></small><br>
                            <small>Facultad: <b>{{facultad.nombre}}</b></small>
                            <div class="row">
                                <div class="col">
                                    <p class="card-text"><small class="text-muted"><a :href="''+inv.link">Descargar</a> </small></p>
                                </div>
                                <div class="col">
                                    <p class="card-text text-end"><small >Año de publicación: <b>{{inv.publicado}}</b> </small></p>
                                </div>
                            </div>
                       
                    </div>
                </div>
            </div>
            <div  v-if="index%2!=0" class="card-containerL">
                <div class="float-layoutL">
                    
                
                        <div class="cardL" :style="'border-left: 10px solid '+facultad.color+';'">
                             <h5><a :href="''+inv.link" class="text-dark"><b>{{inv.titulo}}</b></a></h5>
                            
                            <small>Autor: <b>{{inv.autor}}</b></small><br>
                            <small>Facultad: <b>{{facultad.nombre}}</b></small>
                            <div class="row">
                                <div class="col">
                                    <p class="card-text"><small class="text-muted"><a :href="''+inv.link">Descargar</a> </small></p>
                                </div>
                                <div class="col">
                                    <p class="card-text text-end"><small >Año de publicación: <b>{{inv.publicado}}</b> </small></p>
                                </div>
                            </div>
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
                },
                current: 1,
                pageSize: 5,
                facultades:[],
                id:0,
                imagenMiniatura:'',
                mostrar:false,
                pagination:{
                    page:1,
                    per_page:5,

                },
                }
        },
        computed: {
            indexStart() {
            return (this.current - 1) * this.pageSize;
            },
            indexEnd() {
            return this.indexStart + this.pageSize;
            },
            paginated() {
            return this.posgrado.inv.slice(this.indexStart, this.indexEnd);
            },
            paginas(){
             return Array.from(Array(Math.ceil(this.posgrado.inv.length/this.pageSize)).keys())

            }
        },
        methods: {
             async list()
            {
                try
                {
                    const res = await axios.get('/facultades/conInv');
                    this.facultades = res.data;
                
                  
                    this.mostrarFacultad(this.facultades[0]);
                    this.mostrarPosgrado(this.facultades[0].posgrados_con_inv[0]);
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
                this.current=1;
            },
            mostrarPosgrado(data={}){
                
                this.posgrado = data;
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
