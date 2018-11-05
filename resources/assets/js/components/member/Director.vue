<template>
<div class="page-single">
    <div class="container">
        <div class="row ipad-width2">
            <div class="col-md-3 col-xs-12 col-sm-12">
                <div class="sidebar">
                    <div class="searh-form">
                        <h4 class="sb-title">Search Director</h4>
                        <form v-on:submit.prevent class="form-style-1 celebrity-form">
                            <div class="row">
                                <div class="col-md-12 form-it">
                                    <label>Director's name</label>
                                    <div class="form-group">                                    
                                        <input @input="search()" v-model="tableData.search" type="text" placeholder="Enter keywords">
                                        <span class="fa fa-search"></span>
                                    </div>
                                </div>
                                <!-- <div class="col-md-12 form-it">
                                    <label>Hall of Fame</label>
                                    <select>
                                        <option value="HughJackman" selected>-- Select --</option>
                                        <option value="saab">Diamond</option>
                                        <option value="saab">Ruby</option>
                                    </select>
                                </div> -->
                                <!-- <div class="col-md-12 ">
                                    <input class="submit" type="submit" value="Search">
                                </div> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="topbar-filter">
                    <p>Found <span>{{pagination.from}} - {{pagination.to}}</span> of <span>{{ pagination.total }}</span></p>
                    <label>Sort by:</label>
                    <select v-model="sortKey" @change="getDirector()">
						<option value="name_asc">Name Ascending</option>
                        <option value="name_desc">Name Descending</option>
                    </select>
                    <!-- <a href="celebritylist.html" class="list"><i class="ion-ios-list-outline "></i></a> -->
                    <a  href="celebritygrid01.html" class="grid"><i class="ion-grid active"></i></a>
                </div>

                <div class="celebrity-items">
                    <div class="ceb-item"  v-for="director in directors" :key="director.id" >
                        <a href="celebritysingle.html"><img :src="director.profilepic" alt=""></a>
                        <div class="ceb-infor">
                            <h2><a href="celebritylist.html">{{ director.name }}</a></h2>
                            <span>Director </span>
                        </div>
                    </div>
                </div>
                <div class="topbar-filter">
                    <!-- <label>Reviews per page:</label>
                    <select>
                        <option value="range">9 Reviews</option>
                        <option value="saab">10 Reviews</option>
                    </select> -->
                    
                    <!-- <div class="pagination2">
                        <span>Page {{ pagination.currentPage }} of {{ pagination.lastPage }}:</span>
                        <a href="" @click.prevent="next()"><i class="ion-arrow-left-b"></i></a>
                        <a href="" @click.prevent><i class="ion-arrow-right-b"></i></a>
                    </div> -->
                    <main-pagination :pagination = pagination @next="next()" @prev="prev"></main-pagination>
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
        mainPagination : Pagination
    },

    created(){
        this.getDirector();
    },

    data(){
        return{
            directors: [],
            tableData: {
                draw: 0,
                search: '',
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
            sortKey: 'name_asc',
        }
    },

    methods: {
        getDirector(url = '/directorData'){
            let sort = this.sortChange();
            this.tableData.field = sort[0];
            this.tableData.data = sort[1];
            this.tableData.draw++;
            axios.get(url, {params: this.tableData})
                .then(response => {
                    console.log(response);
                    let data = response.data;
                    if (this.tableData.draw == data.draw) {
                        this.directors = data.data.data;
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
            this.getDirector(this.pagination.nextPageUrl);
        },
        prev() {
            this.$nextTick(function(){
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            });
            this.getDirector(this.pagination.prevPageUrl);
        },
        sortChange(){
            // alert(this.sortKey);
            var [first, second] = this.sortKey.split('_');
            
            return [first, second];
        },
        search: _.debounce(function (e) {
            this.getDirector();
        }, 500),
    }
}

</script>

<style lang="scss" scoped>

</style>
