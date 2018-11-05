<template>
    <div class="slider movie-items" style="background-image: url('images/bg-mfi.png')">
        <div class="container">
            <div class="row">
                <div  class="slick-multiItemSlider">
                    <div> 
                        <div class="trailers" style="padding-top: 0px;padding-bottom: 0px;     background-color: unset;">
                            <div class="container">
                                <div class="row ipad-width">
                                    <div class="col-md-12" style=" padding-left: 0px !important;">
                            
                                        <div class="videos">
                                            <div class="slider-for-2 video-ft">
                                                <!-- @foreach($films as $film) -->
                                                <div v-for="catalog in catalogs" :key="catalog.id">
                                                    <iframe class="item-video" src="" :data-src="catalog.youtube_url"></iframe>
                                                </div>
                                            </div>
                                            <div class="slider-nav-2 thumb-ft">
                                                <div class="item" v-for="catalog in catalogs" :key="catalog.id">
                                                    <div class="trailer-img">
                                                        <!-- <img src="images/uploads/trailer7.jpg"  alt="photo by Barn Images" width="4096" height="2737"> -->
                                                        <img :src= catalog.photo alt="photo by Barn Images" width="4096" height="2737">
                                                    </div>
                                                    <div class="trailer-infor">
                                                        <h4 class="desc">{{ catalog.title }}</h4>
                                                        <p>2:30</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['catalogs'],
}
</script>
