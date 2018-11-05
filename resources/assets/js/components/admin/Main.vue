<template>

	<div class="form-group">
		<label for="photo">Picture</label>
		<input @change="onImageChange" type="file" class="form-control" name="photo" />
		<img :src="image" class="img-responsive" height="70" width="90">
	</div>

</template>

<script>

export default {

	data() {
		return {
			image: ''
		}
	},

	methods: {
		onImageChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
        },
        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.image = e.target.result;
            };
            reader.readAsDataURL(file);
        }
	},

}

</script>