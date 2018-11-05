<template>
<div class="row">
	<div class="topbar-filter">
		<p>Found <span>{{pagination.from}} - {{pagination.to}}</span> of <span>{{ pagination.total }}</span></p>
		<label>Filter by:</label>
		<select v-model="sortKey" @change="getFilms()">
			<option value="title_asc">Title Ascending</option>
            <option value="title_desc">Title Descending</option>
			<option value="yearfinish_desc">Year Finish Descending</option>
			<option value="yearfinish_asc">Year Finish Ascending</option>
		</select>
	</div>
	<!-- movie cast -->
	<div class="mvcast-item">											
		<div class="cast-it" v-for="film in films" :key="film.id">
			<div class="cast-left cebleb-film">
				<img class="small-pic" :src="film.photo" alt="">
				<div>
					<a :href="'/films/'+film.slug">{{film.title}} </a>
				</div>
			</div>
			<p>...  {{film.yearfinish}}</p>
		</div>
	</div>
	<div class="topbar-filter">
	<main-pagination :pagination = pagination @next="next()" @prev="prev"></main-pagination>
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
		this.getFilms();
	},

	data() {
		return {
			films: [],
			data: {
				name:'',
				field:'',
				data:''
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
		getFilms(url = '/singlefilmmember') {
			let slug = window.location.pathname.split('/');
            this.data.name = slug[2];
            let sort = this.sortChange();
            this.data.field = sort[0];
            this.data.data = sort[1];
            axios.get(url, {params: this.data})
                .then(response => {
                	this.films = response.data.data
                    this.configPagination(response.data)
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
            console.log(this.pagination);
        },
        sortChange(){
            // alert(this.sortKey);
            var [first, second] = this.sortKey.split('_');
            
            return [first, second];
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
	},
}


</script>

