<template>
    <div class="WavesFooter">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path :fill="fill" fill-opacity="1"
                  d="M0,128L80,128C160,128,320,128,480,112C640,96,800,64,960,80C1120,96,1280,160,1360,192L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
        </svg>
    </div>
</template>

<script>
    export default {
        props: {
            fill:{
                required:false,
                default: "#10171C"
            }
        },
    };
</script>
