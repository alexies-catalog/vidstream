<template>
    <div class="pagination2" style="padding-left: 0; margin: 0 auto">
		<span>Page {{ pagination.currentPage }} of {{ pagination.lastPage }}:</span>
		<!-- <a class="active" href="#">1</a>
		<a href="#">2</a>
		<a href="#">3</a>
		<a href="#">4</a>
		<a href="#">5</a>
		<a href="#">6</a> -->
		<a v-if="pagination.prevPageUrl !== null" href="javascript:void(0)" @click.prevent="$emit('prev');"><i class="ion-arrow-left-b"></i></a>
		<a v-if="pagination.nextPageUrl !== null" href="javascript:void(0)" @click.prevent="$emit('next');"><i class="ion-arrow-right-b"></i></a>
	</div>
</template>

<script>
    export default {
        props: ['pagination'],
    }
</script>