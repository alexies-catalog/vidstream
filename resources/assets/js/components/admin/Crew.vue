<template>

	<table id="myTable" class=" table order-list" >
	    <thead>
	        <tr>
	            <td>Profession</td>
	            <td>Name</td>
	        </tr>
	    </thead>
	    <tbody >
	    	<add-crew  v-for="(crew,i) in crewCount" :key="i"></add-crew>
	    </tbody>
	    <tfoot>
	        <tr>
	            <td colspan="2" style="text-align: right;">
	                <input @click="addCrew" type="button" class="btn btn-block " id="addrow" value="Add Crew" />
	            </td>
	        </tr>
	        <tr>
	        </tr>
	    </tfoot>
	</table>

</template>

<script>

import AddCrew from './AddCrew.vue';
export default {

    components: {
        AddCrew : AddCrew
    },

	data() {
		return {
			crewCount: [],
		}
	},


	methods: {
		addCrew() {
		    this.crewCount.push({ value: ''});
	    }
	},

}

</script>