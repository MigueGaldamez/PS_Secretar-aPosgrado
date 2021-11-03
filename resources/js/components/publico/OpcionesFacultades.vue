<template>

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
    <div class="colorGris mt-4 py-2">
        <h3 class="textoSuavecito text-light">Investigaciones en curso de {{facultad.nombre}}</h3> 
    </div>
</div>
</template>

<script>
    export default {
        data(){
            return{
                facultad: {
                    id:0,
                    urlImagen: null,
                    nombre: '',
                    descripcion: '',
                   
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
