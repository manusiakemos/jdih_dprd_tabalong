<template>
    <footer class="footer bg-black m-0 p-0">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-5">
                    <div id="kontak-kami">
                        <div class="text-white text-center text-lg-left">
                            <div>
                                <h4 class="text-white text-uppercase pt-3 pb-3 display-5">Kontak Kami</h4>
                                <div v-html="kontak.data ? kontak.data.value : ''"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="table-responsive">
                        <div id='map' class="shadow-lg"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-success container-fluid">
           <div class="row">
               <div class="col-12">
                   <h6 class="text-center text-uppercase pt-4 pb-1 display-6"
                       id="copyright"
                       v-html="copyright.data ? copyright.data.value : ''"></h6>
               </div>
           </div>
        </div>
    </footer>
</template>

<script>
    // import BlobBlue from "./BlobBlue/BlobBlue";
    export default {
        created() {
            this.getSetting()
        },
        mounted() {
            this.setMap();
        },
        data() {
            return {
                "copyright": "",
                "kontak": ""
            }
        },
        methods: {
            getSetting() {
                this.$http.get('/api/web-setting/kontak').then(res => {
                    this.kontak = res.data;
                });
                this.$http.get('/api/web-setting/copyright').then(res => {
                    this.copyright = res.data;
                });
            },
            setMap() {
                mapboxgl.accessToken = 'pk.eyJ1IjoibWFudXNpYWtlbW9zIiwiYSI6ImNqdzR2cHA5eDEyM3I0NnBjYXhmN3l0dWMifQ.gacuqFp1YJ_IkEERRO9Q7A';
                var map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/mapbox/streets-v11',
                    zoom: 15,
                    center: ['115.41892449494185', '-2.176045279407404']
                });
//2.1756352,115.4165891,17z
                new mapboxgl.Marker()
                    .setLngLat(['115.41892449494185', '-2.176045279407404'])
                    .addTo(map);
            }
        }
    }
</script>

<style scoped>
    #copyright {
        position: relative;
    }

    .bg-black {
        /*background: #0B032D;*/
        background: #000000;
    }

    .footer a {
        color: #FFFFFF;
    }
</style>