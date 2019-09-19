<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="display-6 text-capitalize mt-5 mb-3">
                        {{berita.judul}}
                    </h1>
                    <div class="d-inline-block">
                        <small class="post-meta-date mr-3"><i class="fas fa-clock-o"></i>{{berita.created_at}}</small>
                        <small class="post-meta-category mr-3"><i class="fas fa-user"></i> {{berita.creator ?
                            berita.creator.nama : 'Anonym' }}
                        </small>
                        <small class="post-meta-comments mr-3"><i class="fas fa-eye"></i>Dilihat {{berita.dikunjungi}}
                            kali
                        </small>
                    </div>
                    <div class="d-block pt-4">
                        <div class="card">
                            <div class="card-body">
                                <img :src="berita.gambar"
                                     alt="berita" loading="lazy" class="img-shadow" style="height: 40vw; width: 100%">
                            </div>
                        </div>
                        <div v-html="berita.content" class="mt-5"></div>
                    </div>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                berita: "",
                slug: this.$route.params.slug
            }
        },
        created() {
            this.getData();
        },
        methods: {
            getData() {
                this.$http.get(`/api/web-berita/detail/${this.slug}`).then(res => {
                    this.berita = res.data;
                })
            }
        }
    }
</script>