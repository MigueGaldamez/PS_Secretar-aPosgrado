<template>
    <div class="row">
        <h2 class="textoGris mb-0 ps-0">Noticias</h2>   
        <div class="titulohr mb-4"></div>
        <div v-if="cargando" class="d-flex align-items-center justify-content-center m-3">
            <strong>Cargando Datos...</strong>
            <div class="">
                <div class="spinner-grow text-danger" role="status"></div>
                <div class="spinner-grow text-warning" role="status"></div>
                <div class="spinner-grow text-info" role="status"></div>
            </div>
        </div>
        <div v-for="noti in this.noticias.data" :key="noti.id" class="col col-lg-6 col-sm-12 col-12 mb-4">
            <div  class="card sinBordes">
                <img :src="noti.urlImagen" class="card-img-top" alt="...">
                    <div class="card-body paddinNoticias">
                        <b><a :href="'/noticia/'+noti.slug" class="text-dark"><h5 class="card-title">{{noti.titulo}}</h5></a></b>
                        <p class="card-text mt-n2"><small class="text-muted">Publicado: </small><b>{{noti.created_at}}</b></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 text-center">
                <nav>
                    <ul class="pagination">
                        <li class="page-item" :class="{disabled:filtros.page==1}" >
                            <a class="page-link" @click="filtros.page=1, list();" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-backward-fill" viewBox="0 0 16 16">
                                    <path d="M.5 3.5A.5.5 0 0 0 0 4v8a.5.5 0 0 0 1 0V8.753l6.267 3.636c.54.313 1.233-.066 1.233-.697v-2.94l6.267 3.636c.54.314 1.233-.065 1.233-.696V4.308c0-.63-.693-1.01-1.233-.696L8.5 7.248v-2.94c0-.63-.692-1.01-1.233-.696L1 7.248V4a.5.5 0 0 0-.5-.5z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item" :class="{disabled:filtros.page==1}" >
                            <a class="page-link" @click="filtros.page--, list();" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                                    <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item" v-for="n in paginas" :key="n" :class="{active:filtros.page==n}">
                            <a class="page-link" @click="filtros.page=n, list();" href="#">
                                {{n}}
                            </a>
                        </li>
                        <li class="page-item" :class="{disabled:filtros.page==noticias.last_page}" >
                            <a class="page-link" @click="filtros.page++, list();" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="page-item" :class="{disabled:filtros.page==noticias.last_page}" >
                            <a class="page-link" @click="filtros.page=noticias.last_page, list();" href="#" >
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
export default{
    data(){
        return{
            noticias: [],
            filtros:
            {
                titulo:null,
                page:1,
                per_page:4,
            },
            cargando: false,
            paginas:[],
        }
        
    },
    methods: {
        async list()
        {
            this.cargando = true;
            const res = await axios.get('/noticias_todas',{params:this.filtros,});
            this.noticias = res.data;
            this.listarPaginas();
            this.cargando = false;
        },
        listarPaginas()
        {
            const n = 2;
            let arrayN=[];
            let ini = this.filtros.page - 2;
            if(ini<1)
            {
                ini=1;
            }
            let fin = this.filtros.page + 2;
            if(fin>this.noticias.last_page)
            {
                fin=this.noticias.last_page;
            }
            for(let i=ini; i<=fin; i++)
            {
                arrayN.push(i);
            }
            this.paginas=arrayN;    
        },
    },
    created() 
    {
        this.list();
    },
}
</script>
