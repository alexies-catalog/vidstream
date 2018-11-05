<template>
<div>
    <div class="page-single">
        <div class="container">
            <div id="catalogdiv" class="row ipad-width2">
                    <div class="col-md-4 col-xs-12 col-sm-12">
						<div class="sidebar">
							<div class="searh-form">
								<h4 class="sb-title">Search Item</h4>
								<form v-on:submit.prevent class="form-style-1 celebrity-form">
                                        <div class="row">
                                            <div class="col-md-12 form-it">
                                                
                                                <input @input="search()" v-model="tableData.search" type="text" placeholder="Enter keywords">
                                            </div>

                                            <div class="col-md-12 form-it">
                                                <label>GENRE</label>
                                                <div class="group-ip">
                                                    <select v-model="tableData.searchG" @change="getCatalog()" name="genre"  >
                                                        <option value="" >All</option>
                                                        <option v-for="genre in genres" :key="genre.id" :value="genre.name">{{ genre.name }}</option>
                                                    </select>
                                                </div>  
                                            </div>

                                            <div class="col-md-12 form-it">
                                                <label>DIRECTOR</label>
                                                <div class="group-ip">
                                                    <select v-model="tableData.searchD" @change="getCatalog()" name="director"  >
                                                        <option value="" >All</option>
                                                        <option v-for="director in directors" :key="director.id" :value="director.name">{{ director.name }}</option>
                                                    </select>
                                                </div>  
                                            </div>

                                            <div class="col-md-12 form-it">
                                                <label>ACTOR</label>
                                                <div class="group-ip">
                                                    <select v-model="tableData.searchC" @change="getCatalog()" name="cast"  >
                                                        <option value="" >All</option>
                                                        <option v-for="cast in casts" :key="cast.id" :value="cast.name">{{ cast.name }}</option>
                                                    </select>
                                                </div>  
                                            </div>
                                            
                                            <!-- <div class="col-md-12 ">
                                                <input class="submit" type="button" value="Search"> 
                                            </div> -->
                                        </div>
                                </form>
							</div>
							
						</div>
			        </div>
    			<div class="col-md-8 col-sm-12 col-xs-12">
    				<div class="topbar-filter">
    					<p class="pad-change">Found <span>{{pagination.from}} - {{pagination.to}}</span> of <span>{{ pagination.total }}</span></p>
    					<label>Sort by:</label>
    					<select v-model="sortKey" @change="getCatalog()">
    						<option value="title_asc">Title Ascending</option>
                            <option value="title_desc">Title Descending</option>
                            <option value="yearfinish_desc">Year Finish Descending</option>
                            <option value="yearfinish_asc">Year Finish Ascending</option>
    					</select>
    					<!-- <a href="celebritylist.html" class="list"><i class="ion-ios-list-outline "></i></a> -->
    					<a  href="celebritygrid02.html" class="grid"><i class="ion-grid active"></i></a>
    				</div>
                    <div class="flex-wrap-movielist">
                            <div v-for="(catalog,index) in catalogs" :key="catalog.id" class="movie-item-style-2 movie-item-style-1">
                                <img :src= catalog.photo alt="">
                                <div class="hvr-inner">
                                    <a  :href="getUrl(catalog.slug)"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                </div>
                                <div class="mv-item-infor">
                                <h6><a :href="getUrl(catalog.slug)">{{ catalog.title }}</a></h6>
                                    <span v-for="(genre,index) in getGenre(index)">&nbsp;{{ genre }}&nbsp;</span>
                                    <p>&nbsp;{{ getDirector(index) }}</p>
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

    created() {
        this.getCatalog();
    },

    components: {
        mainPagination : Pagination,
    },


    data() {

        return {
            catalogs: [],
            genres:[],
            directors:[],
            casts:[],
            tableData: {
                draw: 0,
                search: '',
                searchC: '',
                searchD: '',
                searchG: '',
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
            sortKey: 'title_asc',
        }
    },

    methods: {
        getCatalog(url = '/filmData') {
            let sort = this.sortChange();
            this.tableData.field = sort[0];
            this.tableData.data = sort[1];
            this.tableData.draw++;
            axios.get(url, {params: this.tableData})
                .then(response => {
                    //console.log(response);
                    let data = response.data;
                    if (this.tableData.draw == data.draw) {
                        this.catalogs = data.data.data;
                        this.genres = data.genre;
                        this.directors = data.director;
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
            this.getCatalog(this.pagination.nextPageUrl);
        },
        prev() {
            this.$nextTick(function(){
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            });
            this.getCatalog(this.pagination.prevPageUrl);
        },
        sortChange(){
            // alert(this.sortKey);
            var [first, second] = this.sortKey.split('_');
            
            return [first, second];
        },
        rate(r){
            return parseInt(r);
        },
        getGenre(index){
            var members = this.catalogs[index].genres;
            var tag_name = [];
            members.forEach(function(obj) { 
                tag_name.push(obj.name)
            });
            //console.log(tag_name)

            return tag_name;
        },
        getDirector(index){
            var members = this.catalogs[index].members
            var director_name;
            members.forEach(function(obj) { 
                if(obj.pivot.member_profession == 'Director'){
                    director_name = obj.pivot.member_name;
                }
            });
            return director_name;
        },
        getUrl(slug){
            return '/films/' + slug;
        },
        search: _.debounce(function (e) {
            if(this.tableData.search === 'Sheira Man-awit'){
                alert('The Greatest Human Ever')
            }
            else{
                this.getCatalog();
            }
        }, 500),

        
    },
}
</script>

<style>

  div > div.slider-for-2.video-ft.slick-initialized.slick-slider > div{
    margin-top: 0px;
  }

  div > div.slider-for-2.video-ft.slick-initialized.slick-slider{
    margin-left: 0px;

  }
  .slick-slide {

      height: unset !important;

  }

</style>