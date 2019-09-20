<template>
    <div>
        <main role="main">

            <!-- Main jumbotron for a primary marketing message or call to action -->
            <section class="bg-primary" id="section1">
                <div class="jumbotron bg-primary text-center text-white m-0">
                    <div class="container">
                        <h1 class="display-4 d-sm-block">{{$store.state.app_name}}</h1>
                        <p>Selamat Datang di Website Jaringan Dokumentasi dan Informasi Hukum DPRD Kabupaten
                            Tabalong</p>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <arsip></arsip>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <waves-red fill="#634882"></waves-red>
            <!-- end section 1-->
            <!--begin section 2-->
            <section id="section2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <slider class="pb-3 pt-5"></slider>
                            <berita-terbaru></berita-terbaru>
                            <berita-terpopuler></berita-terpopuler>
                        </div>
                        <div class="col-lg-4">
                            <widget-left></widget-left>
                        </div>
                    </div>
                </div>
            </section>
            <!--end section 2-->
        </main>
    </div>
</template>

<style>
    .bg-gradient-primary {
        background: rgb(108, 35, 96);
        background: linear-gradient(180deg, rgba(108, 35, 96, 1) 13%, rgba(16, 23, 28, 1) 100%);
    }
</style>

<script>
    import Slider from "../components/Slider";
    import WavesWhite from "../components/WavesWhite/WavesWhite";
    import WavesRed from "../components/WavesRed/WavesRed";
    import WidgetLeft from "../components/WidgetLeft"
    import Arsip from "../components/Arsip"
    import BeritaTerbaru from "../components/BeritaTerbaru"
    import BeritaTerpopuler from "../components/BeritaTerpopuler"

    export default {
        components: {
            Arsip, BeritaTerbaru, WavesWhite, Slider, WavesRed, WidgetLeft, BeritaTerpopuler
        }
    }
</script>