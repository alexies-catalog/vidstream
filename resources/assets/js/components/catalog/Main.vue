<template>
    <div id="catalogdiv" class="row ipad-width2">
                <div class="col-md-3 col-xs-12 col-sm-12">
						<div class="sidebar">
								<div class="searh-form">
								<h4 class="sb-title">Search Item</h4>
								<form v-on:submit.prevent class="form-style-1 celebrity-form">
                                        <div class="row">
                                            <div class="col-md-12 form-it">
                                                
                                                <input @input="search()" v-model="tableData.search" type="text" placeholder="Enter keywords">
                                            </div>
                                            
                                            <!-- <div class="col-md-12 ">
                                                <input class="submit" type="button" value="Search"> 
                                            </div> -->
                                        </div>
                                    </form>
							</div>
							
						</div>
			</div>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="topbar-filter">
					<p class="pad-change">Found <span>{{pagination.from}} - {{pagination.to}}</span> of <span>{{ pagination.total }}</span></p>
					<label>Sort by:</label>
					<select v-model="sortKey" @change="getCatalog()">
                        <option value="title_asc">Title Ascending</option>
                        <option value="title_desc">Title Descending</option>
						<option value="yearfinish_desc">Year Finish Descending</option>
						<option value="yearfinish_asc">Year Finish Ascending</option>
					</select>
					<!-- <a class="list"><i class="ion-ios-list-outline active"></i></a> -->
					<!-- <a  href="celebritygrid02.html" class="grid"><i class="ion-grid "></i></a> -->
				</div>
                <div v-for="(catalog,index) in catalogs" :key="catalog.id" class="movie-item-style-2">
					<img :src = catalog.photo alt="" style="width: 200px; height: 100%">
					<div class="mv-item-infor">
						<h6><a :href="getUrl(catalog.slug)">{{ catalog.title }} <span>({{ catalog.yearfinish }})</span></a></h6>
						<p class="describe">{{ catalog.synopsis | liveSubstr }}</p>
						<p class="run-time"> Run Time: {{ catalog.runningtime }}’    .     <span>Tags:  <a v-for="tag in getTag(index)" :key="tag.id">&nbsp;{{ tag }}&nbsp;</a></span>    .     <span>Genre: <a v-for="genre in getGenre(index)" :key="genre.id">&nbsp;{{ genre }}&nbsp;</a></span></p>
						<p>Director: <a :href="'/members/'+getDirector(index).slug">{{ getDirector(index).name }}</a></p>
                        <p>Producer: <a :href="'/members/'+producer.slug" v-for="producer in getProducer(index,'Producer')" :key="producer.id">{{ producer.name }}.&nbsp;</a></p>
                        <p>Writer: <a :href="'/members/'+producer.slug" v-for="producer in getProducer(index,'Writer')" :key="producer.id">{{ producer.name }}.&nbsp;</a></p>
						<p>Casts: <a :href="'/members/'+producer.slug" v-for="producer in getProducer(index,'Actor')" :key="producer.id">{{ producer.name }}.&nbsp;</a></p>
                        <p>Awards: <a>{{ catalog.award }}</a></p>
					</div>
				</div>
				
				<div class="topbar-filter">
					<main-pagination :pagination = pagination @next="next()" @prev="prev"></main-pagination>
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

    created() {
        this.getCatalog();
    },

    data() {

        return {
            catalogs: [],
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
            sortKey: 'title_asc',
        }
    },

    filters: {
        liveSubstr: function(string) {
            if(string != null){
                if(string.length>200){
                    return string.substring(0,200) + '...';
                }
                return string + '...';
            }
            return 'No synopsis available';
        }
    },

    methods: {
        getCatalog(url = '/catalogData') {
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
        getDirector(index){
            var members = this.catalogs[index].members
            var director = {
                name:'',
                slug:''
            };
            members.forEach(function(obj) { 
                if(obj.pivot.member_profession == 'Director'){
                    director.name = obj.pivot.member_name;
                    director.slug = obj.slug;
                }
            });
            return director;
        },

        getProducer(index, prof){
            var members = this.catalogs[index].members
            var data = [];
            members.forEach(function(obj) { 
                if(obj.pivot.member_profession == prof){
                    var member = {
                        name:'',
                        slug:''
                    };
                    member.name = obj.pivot.member_name;
                    member.slug = obj.slug;
                    data.push(member);
                }
            });
            return data;
        },
        getTag(index){
            var members = this.catalogs[index].tags
            var tag_name = [];
            members.forEach(function(obj) { 
                tag_name.push(obj.name)
            });
            
            return tag_name;
        },
        getGenre(index){
            var members = this.catalogs[index].genres
            var tag_name = [];
            members.forEach(function(obj) { 
                tag_name.push(obj.name)
            });
            
            return tag_name;
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
