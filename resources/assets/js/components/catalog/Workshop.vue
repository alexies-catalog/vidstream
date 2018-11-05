<template>
	<div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="sidebar">
                <div class="sb-search sb-it">
                    <h4 class="sb-title">Search</h4>
                    <input @input="search()" v-model="data.search" type="text" placeholder="Enter keywords">
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="topbar-filter">
                <p class="pad-change">Found <span>{{pagination.from}} - {{pagination.to}}</span> of <span>{{ pagination.total }}</span></p>

                <label>Filter by:</label>
                <select v-model="data.filter" @change="getWorkshops()">
                    <option value="all">All Workshops</option>
                    <option value="upcoming">Upcoming Workshops</option>
                    <option value="past">Past Workshops</option>
                </select>

                <label>Sort by:</label>
                <select v-model="sortKey" @change="getWorkshops()">
                    <option value="start_date-desc">Date Increasing</option>
                    <option value="start_date-asc">Date Decreasing</option>
                    <option value="name-asc">Alphabetical</option>
                </select>

                <a href="celebritylist.html" class="list"><i class="ion-ios-list-outline active"></i></a>
            </div>
            <div class="blog-item-style-1 blog-item-style-3"
                v-for="workshop in workshops" :key="workshop.id">

                <img :src="workshop.workshopthumbnail" alt="">
                <div class="blog-it-infor">
                    <h3><a :href="'/workshops/'+workshop.slug">{{workshop.name}}</a></h3>
                    <span class="time">{{workshop.start_date}}</span>
                    <p>{{workshop.description}}</p>
                </div>

            </div>
            <ul class="pagination">
                <li class="icon-prev"><a v-if="pagination.prevPageUrl !== null" @click.prevent=prev href="#"><i class="ion-ios-arrow-left"></i></a></li>
                <span style="color:white">Page {{ pagination.currentPage }} of {{ pagination.lastPage }}&emsp;</span>
                <li class="icon-next"><a v-if="pagination.nextPageUrl !== null" @click.prevent=next href="#"><i class="ion-ios-arrow-right"></i></a></li>
            </ul>
        </div>    
    </div>
</template>

<script>

export default {
	created() {
        this.getWorkshops();
    },

    data() {
    	return {
    		workshops: [],
    		data: {
    			draw: 0,
                search: '',
                filter: 'all',
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
            sortKey: 'start_date-desc'
    	}
    },

    methods: {
    	getWorkshops(url = '/getWorkshops') {
            let sort = this.sortChange();
            this.data.field = sort[0];
            this.data.data = sort[1];
    		this.data.draw++;
    		axios.get(url, {params: this.data})
                .then(response => {
                    //console.log(response);
                    this.workshops = response.data.data.data;
                    this.configPagination(response.data.data);
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
        sortChange(){
            // alert(this.sortKey);
            var [first, second] = this.sortKey.split('-');
            
            return [first, second];
        },
        next() {
            this.$nextTick(function(){
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            });
            this.getWorkshops(this.pagination.nextPageUrl);
        },
        prev() {
            this.$nextTick(function(){
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            });
            this.getWorkshops(this.pagination.prevPageUrl);
        },
        search: _.debounce(function (e) {
            if(this.data.search === 'Sheira Man-awit'){
                alert('The Greatest Human Ever')
            }
            else{
                this.getWorkshops();
            }
        }, 500),
    }
}
</script>