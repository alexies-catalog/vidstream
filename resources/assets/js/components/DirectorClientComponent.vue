<template>
  <div >
				<nav aria-label="Page navigation example">
					<ul class="pagination">
						<li class="page-item" v-bind:class="[{disabled: !pagination.prev_page_url}]" >
							<a class="page-link" href="#" @click="fetchDirectors(pagination.prev_page_url)">Previous</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#" @click="fetchDirectors(pagination.next_page_url)" >Next</a></li>
					</ul>
				</nav>
		<div class="celebrity-items" >
			<div v-for="director in directors" v-bind:key="director.id">
				<div class="ceb-item" >
					<a href="celebritysingle.html"><img src="images/uploads/ceb1.jpg" alt=""></a>
					<div class="ceb-infor">
					<h2><a href="celebritylist.html">{{director.name}}</a></h2>
					<span>Director </span>
					</div>
				</div>
			</div>
			
		</div>
  </div>
</template>

<script>
  export default {
    data(){
      return{
        name:'hello',
        directors:[],
        director:{
          id:'',
          name:'',
          awards:'',
          about:'',
          halloffame:'',
          profilepic:'',
        },
        director_id: '',
        pagination:{},
        edit:false,
        }
      },
      created(){
        this.fetchDirectors();
      },
      methods: {
        fetchDirectors() {
					let vm=this;
						// alert('fdf');
						fetch('api/directors') //url that fetch
						.then(res=>res.json()) // map the response into json
						.then(res => { //get the actual data
						this.directors=res.data; 
						console.log(res.data); //to get the actual data not an object, you need to get the res.data. 
					});

					page_url = page_url || '/api/directors'
					fetch(page_url) //url that fetch
					.then(res=>res.json()) // map the response into json
					.then(res => { //get the actual data
						// console.log(res.data); //to get the actual data not an object, you need to get the res.data.
						this.directors=res.data; 
						vm.makePagination(res.meta, res.links); //this wil get the value of meta and links that stores the pagination and links in the response of the api/articles. Then it will store it in vm
					})
					.catch(err => console.log(err)); //to catch any error encounter and put in console
					}, 		
					makePagination(meta, links){
						let pagination={
							current_page:meta.current_page,
							last_page:meta.last_page,
							next_page_url:links.next,
							prev_page_url:links.prev
						}
						this.pagination=pagination; 
					}
    	} 
  }
</script>
