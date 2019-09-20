<template>
    <div id="defaultLayout">
        <navbar></navbar>
        <transition name="fade" mode="out-in">
            <router-view></router-view>
        </transition>
        <!--begin section 3-->
        <waves-white fill="#F9CE4C"></waves-white>
        <section class="bg-success" id="section3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <h2 class="display-6 text-center">GALERI</h2>
                        <gallery class="pb-5"></gallery>
                    </div>
                    <div class="col-lg-5">
                        <h2 class="display-6 text-center">INFO VIDEO</h2>
                        <video-profile class="pb-5"></video-profile>
                    </div>
                </div>
            </div>
        </section>
        <!--end section 3-->
       <footer-component></footer-component>
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
        height: 400px;
    }

</style>

<script>
    import Navbar from '../components/Navbar'
    import FooterComponent from '../components/Footer'
    import Gallery from "../components/Gallery";
    import VideoProfile from "../components/VideoProfil";
    import WavesWhite from "../components/WavesWhite/WavesWhite";

    export default {
        components: {
            Navbar,
            FooterComponent,
            Gallery,
            VideoProfile,
            WavesWhite
        },
        data() {
            return {
                title: "Setting",
            };
        }
    };
</script>