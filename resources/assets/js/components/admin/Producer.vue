<template>

	
	<div class="form-group">
	  	<select required v-for="crew in crewCount"  class="form-control" name="producer[]" >
		  	<option></option>
		    <option v-for="producer in producers" :key="producer.id" :value=setValue(producer.id,producer.name)>{{ producer.name }}</option>
	  	</select>
		<a href="javascript:void(0)" @click="addCrew" type="button" id="addrow">Add Film Producer</a>
	</div>
	            

</template>

<script>

export default {

	data() {
		return {
			producers: [],
			crewCount: [],
			members: [],
			select: {
				value: ''
			},
			value:''
		}
	},

	created() {
		this.getProducer();
	},

	methods: {
		getProducer(){
			this.select.value = 'producer';
			axios.get('/admin/getmembers', {params: this.select})
                .then(response => {
                    //console.log(response);
                    let data = response.data;
                    this.producers = data;
                })
                .catch(errors => {
                    console.log(errors);
                });
		},
		addCrew() {
		    this.crewCount.push({ value: ''});
	    },
	    setValue(id,name){
	    	return id + ',' +name;
	    }
	},

}

</script>