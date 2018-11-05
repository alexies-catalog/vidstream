<template>
<div>
    <div class="page-single">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <div class="searh-form">
                            <h4 class="sb-title">Search film</h4>
                            <form v-on:submit.prevent class="form-style-1" action="#">
                                <div class="row">
                                    <div class="col-md-12 form-it">
                                        <label>Film name</label>
                                        <input @input="search()" v-model="tableData.search" name="search" type="text" id="search" placeholder="Enter keywords">
                                    </div>
                                    <div class="col-md-12 form-it">
                                        <label>Genres/Category</label>
                                        <div class="group-ip">
                                            <select v-model="tableData.searchG" @change="getFilms()" name="genre"  >
                                                <option value="" >All</option>
                                                <option v-for="genre in genres" @change="getFilms()" :key="genre.id" :value="genre.id">{{ genre.name }}</option>
                                            </select>
                                        </div>	
                                    </div>
                                    <div class="col-md-12 form-it">
                                        <label>Director</label>
                                        <select v-model="tableData.searchD" @change="getFilms()" name="director">
                                            <option value="" >All</option>
                                            <option v-for="director in directors" @change="getFilms()" :key="director.id" :value="director.id">{{ director.name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 form-it">
                                        <label>Actor</label>
                                        <select v-model="tableData.searchC" @change="getFilms()" name="cast">
                                            <option value="" >All</option>
                                            <option v-for="cast in casts" :key="cast.id" :value="cast.id">{{ cast.name }}</option>

                                        </select>
                                    </div>
                                    <div class="col-md-12 ">
                                        <input class="submit" type="submit" value="Search">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="topbar-filter">
                        <p class="pad-change">Found <span>{{pagination.from}} - {{pagination.to}}</span> of <span>{{ pagination.total }}</span></p>
                        <label>Sort by:</label>
                        <select v-model="sortKey" @change="getFilms()">
                            <option value="views_desc">Popularity Descending</option>
                            <option value="views_asc">Popularity Ascending</option>
                            <option value="rating_desc">Rating Descending</option>
                            <option value="rating_asc">Rating Ascending</option>
                            <option value="yearfinish_desc">Release date Descending</option>
                            <option value="yearfinish_asc">Release date Ascending</option>
                        </select>
                        <a href="celebritylist.html" class="list"><i class="ion-ios-list-outline active"></i></a>
                        <a  href="celebritygrid02.html" class="grid"><i class="ion-grid "></i></a>
                    </div>
                    <div class="flex-wrap-movielist">
                        <div v-for="film in films" :key="film.id" class="movie-item-style-2 movie-item-style-1">
                            <img :src="film.photo" alt="">
                            <div class="hvr-inner">
                                <a  href="/aboutFilm"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                            </div>
                            <div class="mv-item-infor">
                            <h6><a href="#">{{ film.title }}</a></h6>
                                <p>{{ film.genre.name }}</p>
                                <p>{{ film.director.name }}</p>
                                <p class="rate">
                                    <i v-for="(num, index) in rate(film.rating)" :key="index" class="ion-android-star"></i>
                                <span>{{ film.rating }}</span>/5</p>
                            </div>
                        </div>	
                                

                    </div>		
                        <div class="topbar-filter">
                            <main-pagination :pagination = pagination @next="next()" @prev="prev"></main-pagination>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
</template>

<script>
import Pagination from '../Pagination.vue';

export default {
    components: {
        mainPagination : Pagination,
    },

    created() {
        this.getFilms();
    },

    data(){
        return{
            rateNum: 2,
            films:[],
            genres:[],
            directors:[],
            casts:[],
            tableData: {
                draw: 0,
                search: '',
                searchD:'',
                searchG:'',
                searchC:'',
                field: '',
                data: ''
            },
            pagination: {
                lastPage: '',
                currentPage: '',
                total: '',
                lastPageUrl: '',
                nextPageUrl: '',
                prevPageUrl: '',
                from: '',
                to: ''
            },
            sortKey: 'views_desc',
        }
    },

    methods: {
        getFilms(url = '/filmData'){
            let sort = this.sortChange();
            this.tableData.field = sort[0];
            this.tableData.data = sort[1];
            this.tableData.draw++;
            console.log(this.tableData)
            axios.get(url, {params: this.tableData})
                .then(response => {
                    console.log(response);
                    let data = response.data;
                    if (this.tableData.draw == data.draw) {
                        this.films = data.data.data;
                        this.directors = data.director;
                        this.genres = data.genre;
                        this.casts = data.cast;
                        this.configPagination(data.data);
                    }
                })
                .catch(errors => {
                    console.log(errors);
                });
        },
        configPagination(data){
            this.pagination.lastPage = data.last_page;
            this.pagination.currentPage = data.current_page;
            this.pagination.total = data.total;
            this.pagination.lastPageUrl = data.last_page_url;
            this.pagination.nextPageUrl = data.next_page_url;
            this.pagination.prevPageUrl = data.prev_page_url;
            this.pagination.from = data.from;
            this.pagination.to = data.to;
        },
        next() {
            this.$nextTick(function(){
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            });
            this.getFilms(this.pagination.nextPageUrl);
        },
        prev() {
            this.$nextTick(function(){
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            });
            this.getFilms(this.pagination.prevPageUrl);
        },
        sortChange(){
            // alert(this.sortKey);
            var [first, second] = this.sortKey.split('_');
            //console.log([first, second]);
            return [first, second];
        },
        rate(r){
            return parseInt(r);
        },
        search: _.debounce(function (e) {
                alert("asd")
        }, 500),
    }
}
</script>
