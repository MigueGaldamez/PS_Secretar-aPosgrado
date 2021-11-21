<template>
<div>
    <div class="colorGris text-center py-4 mt-4"  :style="'background-color:'+facultad.color+' !important; '">
        <h1 class=" text-uppercase mb-0 tituloFacu lh-sm">{{facultad.nombre}}</h1>
        <h5 class="text-light textoSuavecito">Aquí se muestran los posgrados de la facultad, tanto los ofertados como los no ofertados. </h5>
    </div>
        <div class="titulohr mb-2 mt-2"></div>
    <div class="container-fluid mb-2">
    
        <div class="row justify-content-center text-center">
       
      
       
        <h3>Paginación</h3>
        <div class="col col-auto">
           Mostrando: {{posgrados.from}} - {{posgrados.to }} de un total de: {{posgrados.total}}
        </div>       
        <div class="col col-auto">

             <nav>
                <ul class=" pagination">
                    <li class="page__numbers page-item"  :class="{deactivado:pagination.page==1}"  @click="pagination.page=1, listar();"><a class="page__link" href="#informacionPosgrado"><span>&laquo;</span></a></li>
                    <li class="page__numbers page-item"  :class="{deactivado:pagination.page==1}"  @click="pagination.page--, listar();"><a class="page__link"  href="#informacionPosgrado">&#60;</a></li>
                    <li class="page__numbers page-item"  v-for="n in paginas" :key="n" :class="{active:pagination.page==n}"  @click="pagination.page=n, listar();"><a class="page__link" href="#informacionPosgrado">{{n}}</a></li>
                    <li class="page__numbers page-item"  :class="{deactivado:pagination.page==posgrados.last_page}"  @click="pagination.page++, listar();"><a class="page__link"   href="#informacionPosgrado">&#62;</a></li>
                    <li class="page__numbers page-item"  :class="{deactivado:pagination.page==posgrados.last_page}"  @click="pagination.page=posgrados.last_page, listar();"><a class="page__link"  href="#informacionPosgrado" ><span >&raquo;</span></a></li>
                </ul>
            </nav>
        
        </div>
        <div class="col col-auto">
            Elementos por pagina
            <select class=" form-control form-select form-select-sm" v-model="pagination.per_page" @change="listar();">
            <option selected>Elementos por pagina</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            </select>
        </div>
    </div>
    </div>
      <div class="titulohr mb-4"></div>
    <div class="container-fluid ps-0 mt-4  mb-4">  
       
            <div v-for="posgrado in posgrados.data" :key="posgrado.id" class="card sinBordes mb-4 ">
                <div class="row">
                    <div class="col col-lg-3 col-sm-12 col-12 text-center">
                
                        <img  :src="posgrado.urlImagen" class="img-fluid" alt="">
                    </div>
                    <div class="col col-lg-9 col-sm-12 col-12 ">
                        <div class="card-block px-4">
                        
                            <h1 class="card-title textoSuavecito mb-2"><p class="card-text"><span class="bordeBajo">{{posgrado.nombre}}</span></p></h1>
                            <p><b>Descripción:</b><br>{{posgrado.descripcion}}
                            </p>
                            <h4 class="card-title textoSuavecito mb-0">Titulo a otorgar:</h4>
                            <h3 class="card-title textoSuavecito mb-0"><b>{{posgrado.titulo}}</b></h3>
                            
                            <small >Ofertado en: </small>
                            <div class="wrapper-tol">
                            
                                <input type="checkbox" />
                                
                                    <h5><span class="badge btn rounded-pill" :style="'background-color:'+facultad.color+' !important;'">Ver datos de contacto</span>
                                </h5>
                                <div class="tooltip">
                                    <b> {{facultad.contactoPosgrado}}
                                </b>
                                </div>
                            </div>
                        
                        
                            <a v-if="posgrado.ofertado" :href="'/catalogo'" class="btn btn-sm text-light colorRojo bottom-0">Ver detalles</a>
                           
                            <a v-if="!posgrado.ofertado" href="#" class="btn btn-sm text-light colorRojo disabled bottom-0">No ofertado</a>
                            
                        
                            
                        </div>
                    </div>
                </div> 
                  <div class="titulohr mb-4 mt-2"></div>
            </div>
      
       
    </div>
</div>
</template>

<script>
    export default {
        props:['facultad'],
        data(){
            return{
                posgrados:[],
                current: 1,
                pageSize: 5,
                facultades:[],
                id:0,
                pagination:{
                    page:1,
                    per_page:5,
                    idFacultad:this.facultad.id,
                },
                errors:[],
                paginas:[],
            }
        },
        computed: {
          
        },
        methods: {
             async listar()
            {
                try
                {
                    const res = await axios.get('/ObtenerFacultad/Oferta',{params:this.pagination,});
                    this.posgrados = res.data;
                    this.listarPaginas();
                }
                catch(error)
                {
                    if(error.response.data)
                    {
                        this.errores = error.response.data.errors;
                    }
                }

            },
             listarPaginas(){
                const n = 2;
                let arrayN=[];
                let ini = this.pagination.page - 2;
                if(ini<1){
                    ini=1;
                }
                let fin = this.pagination.page + 2;
                if(fin>this.posgrados.last_page){
                    fin=this.posgrados.last_page;
                }
                for(let i=ini; i<=fin; i++){
                    arrayN.push(i);
                }
                this.paginas=arrayN;    
            },
         
        },
        created() 
        {
            this.listar();
        },
        mounted() {
           
        }
    }
</script>
