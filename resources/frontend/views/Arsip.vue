<template>
    <div id="arsip-view">
        <!--section 1-->
        <section class="bg-primary" id="section1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <arsip class="pt-5"></arsip>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <waves-red fill="#634882"></waves-red>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-6 mb-2 mt-5 text-uppercase text-center">produk hukum</h1></div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <widget-left></widget-left>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import WidgetLeft from "../components/WidgetLeft";
    import WavesWhite from "../components/WavesRed/WavesRed";
    import WavesRed from "../components/WavesRed/WavesRed";
    import Arsip from "../components/Arsip"

    export default {
        components: {
            WidgetLeft, WavesWhite, Arsip, WavesRed
        }
    }
</script>