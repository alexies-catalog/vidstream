<template>
	        <tr>
	            <td class="col-sm-6">
	                <div class="form-group">
					  <select required @change="getMembers" class="form-control" name="profs[]" >
					  	<option></option>
					    <option v-for="profession in professions" :key="profession.id" :value=profession.name>{{ profession.name }}</option>
					  </select>
					</div>
	            </td>
	            <td class="col-sm-6">
	                <div class="form-group">
					  	<select required class="form-control" name="name[]" >
					  		<option></option>
					    	<option v-for="member in members" :key="member.id" :value=setValue(member.id,member.name)>{{ member.name }}</option>
					  	</select>
					</div>
	            </td>
	            <td class="col-sm-2"><a class="deleteRow"></a>

	            </td>
	        </tr>
</template>

<script>

export default {
	data() {
		return {
			professions: [],
			members: [],
			select: {
				value: ''
			}

		}
	},

	created() {
		this.getProfession();
	},

	methods: {

		getProfession(){
			axios.get('/admin/crewprofession')
                .then(response => {
                    //console.log(response);
                    let data = response.data;
                    this.professions = data;
                })
                .catch(errors => {
                    console.log(errors);
                });
		},
		getMembers(event){
			this.select.value = event.target.value
			//console.log( this.select.value);
			axios.get('/admin/getmembers', {params: this.select})
                .then(response => {
                    //console.log(response);
                    let data = response.data;
                    this.members = data;
                })
                .catch(errors => {
                    console.log(errors);
                });
		},
		setValue(id,name){
	    	return id + ',' +name;
	    	console.log(id+','+name);
	    }
	}
}

</script>