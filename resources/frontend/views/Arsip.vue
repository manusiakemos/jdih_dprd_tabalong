<template>
   <div id="arsip-view">
       <section id="produk-hukum-section" class="bg-primary">
           <div class="container pt-5">
               <div class="row">
                   <div class="col-12">
                       <h2 class="display-6 text-center text-white">PENCARIAN PRODUK HUKUM</h2>
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
       <waves-white fill="#634882"></waves-white>

       <section class="container-fluid">
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