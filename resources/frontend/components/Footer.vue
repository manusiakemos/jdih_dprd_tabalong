<template>
    <footer class="footer bg-black m-0 p-0">
        <div class="container  pt-5 pb-3">
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
                       <!-- <div id='map' class="shadow-lg"></div>-->
                    </div>
                </div>
                <div class="col-12">
                    <h6 class="text-warning text-center text-lg-left text-uppercase mb-3 pt-5 pb-2 display-6" id="copyright"
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
        }
    }
</script>

<style scoped>
    #copyright{
        position: relative;
    }
    .bg-black {
        /*background: #0B032D;*/
        background: #000000 ;
    }

    .footer a {
        color: #FFFFFF;
    }
</style>