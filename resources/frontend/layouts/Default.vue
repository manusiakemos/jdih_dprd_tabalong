<template>
    <div id="defaultLayout">
        <navbar></navbar>
        <transition name="fade" mode="out-in">
            <router-view></router-view>
        </transition>
        <footer class="footer bg-dark m-0 p-0">
            <div class="container">
                <h4 class="text-white text-uppercase pt-5 display-5">Kontak Kami</h4>
                <div class="m-t-40">
                   <div class="row">
                       <div class="col-md-6">
                           <address class="text-white">
                               <strong>Kantor Biro Hukum dan Hak Asasi Manusia Sekretariat Daerah Provinsi Bali</strong><br>
                               Jl. Basuki Rahmat Nomor 1,  Gedung Unit III Lantai 2, Dangin Puri Kelod<br>
                               Denpasar Timur, Denpasar
                               <br><abbr title="Phone">Telepon:</abbr> (0361) 224671
                               <br><abbr title="Fax">Fax:</abbr> (0361) 241921/222716
                               <br><abbr title="Email">Email:</abbr> admin.birohukumham@baliprov.go.id
                           </address>
                       </div>
                   </div>
                </div>
                <div class="table-responsive pt-5 pb-3">
                    <div id='map'></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h6 class="text-white text-center mb-3 pb-5 display-6">Code By Diskominfo Tabalong</h6>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0;
    }

    #map {
        position: relative;
        bottom: 20px;
        width: 100%;
        height: 500px;
    }

</style>

<script>
    import Navbar from '../components/Navbar'

    export default {
        components: {
            Navbar,
        },
        data() {
            return {
                title: "Welcome",
            };
        },
        mounted() {
           this.setMap();
        },
        methods:{
            setMap(){
                mapboxgl.accessToken = 'pk.eyJ1IjoibWFudXNpYWtlbW9zIiwiYSI6ImNqdzR2cHA5eDEyM3I0NnBjYXhmN3l0dWMifQ.gacuqFp1YJ_IkEERRO9Q7A';
                var map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/mapbox/streets-v11',
                    zoom: 15,
                    center: ['115.41892449494185','-2.176045279407404']
                });
//2.1756352,115.4165891,17z
                new mapboxgl.Marker()
                    .setLngLat(['115.41892449494185','-2.176045279407404'])
                    .addTo(map);
            }
        }
    };
</script>