<template>
<div class="page-single">
    <div class="container">
        <div class="row ipad-width2">
            <div class="col-md-3 col-xs-12 col-sm-12">
                <div class="sidebar">
                    <div class="searh-form">
                        <h4 class="sb-title">Search Member</h4>
                        <form v-on:submit.prevent class="form-style-1 celebrity-form">
                            <div class="row">
                                <div class="col-md-12 form-it">
                                    <label>Member's name</label>
                                    <input @input="search()" v-model="tableData.search" type="text" placeholder="Enter keywords">
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
                    <select v-model="sortKey" @change="getProducer()">
						<option value="name_asc">Name Ascending</option>
                        <option value="name_desc">Name Descending</option>
                    </select>
                    <a @click.prevent href="#" class="grid"><i class="ion-grid active"></i></a>
                </div>

                <div class="celebrity-items">
                    <div class="ceb-item"  v-for="producer in producers" :key="producer.id" >
                        <!-- <a href="celebritysingle.html"><img :src="producer.profilepic" onerror="this.src='/images/member/thumbnail/default.png'"  alt=""></a> -->
                        <a :href="'/members/'+producer.slug"><img :src="producer.profilepic" onerror="this.src='/images/member/thumbnail/default.png'"  alt=""></a>
                        <div class="ceb-infor">
                            <h2><a :href="'/members/'+producer.slug">{{ producer.name }}</a></h2>
                            <span>{{tableData.pro}} </span>
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
        this.getProducer();
    },

    data(){
        return{
            producers: [],
            tableData: {
                draw: 0,
                search: '',
                field: '',
                data: '',
                pro: ''
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
        getProducer(url = '/producerData'){
            let pathArray = window.location.search.split('=');
            this.tableData.pro = pathArray[1];
            //console.log(this.tableData.pro)
            let sort = this.sortChange();
            this.tableData.field = sort[0];
            this.tableData.data = sort[1];
            this.tableData.draw++;
            axios.get(url, {params: this.tableData})
                .then(response => {
                    //console.log(response);
                    let data = response.data;
                    if (this.tableData.draw == data.draw) {
                        this.producers = data.data.data;
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
            this.getProducer(this.pagination.nextPageUrl);
        },
        prev() {
            this.$nextTick(function(){
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            });
            this.getProducer(this.pagination.prevPageUrl);
        },
        sortChange(){
            // alert(this.sortKey);
            var [first, second] = this.sortKey.split('_');
            
            return [first, second];
        },
        search: _.debounce(function (e) {
            if(this.tableData.search === 'Sheira Man-awit'){
                alert('The Greatest Human Ever')
            }
            else{
                this.getProducer();
            }
            
        }, 500),
    }
}

</script>

<style lang="scss" scoped>

</style>
