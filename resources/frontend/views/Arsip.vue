<template>
   <div id="arsip-view">
       <section id="produk-hukum-section">
           <div class="container pt-5">
               <div class="row">
                   <div class="col-12">
                       <h2 class="display-6 text-center">PENCARIAN PRODUK HUKUM</h2>
                   </div>
               </div>
           </div>
           <div class="container">
               <div class="row">
                   <div class="col-lg-12">
                       <arsip></arsip>
                   </div>
               </div>
           </div>
       </section>

       <section class="bg-success">
           <waves-white fill="#FFFFFF"></waves-white>
           <widget-left></widget-left>
       </section>
   </div>
</template>

<script>
    import Arsip from "../components/Arsip";
    import WidgetLeft from "../components/WidgetLeft";
    import WavesWhite from "../components/WavesRed/WavesRed";
   export default {
       components:{
            Arsip, WidgetLeft, WavesWhite
       }
   }
</script>