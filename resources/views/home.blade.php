@extends('layouts.master')

@section('content')
    <div>
        <main role="main">

            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="container-fluid bg-primary">
                <div class="jumbotron bg-primary text-center text-white m-0">
                    <div class="container">
                        <h1 class="display-4">{{config('app.name')}}</h1>
                        <p>Selamat Datang di Website Jaringan Dokumentasi dan Informasi Hukum DPRD Kabupaten
                            Tabalong</p>
                    </div>
                </div>
            </div>

            <div class="container-fluid bg-gradient-primary">
                <div class="container pb-5 pt-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label>Judul</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label>Jenis</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label>Nomor</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label>Tahun</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary float-right">Cari Produk Hukum</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="display-6 text-center text-uppercase mt-5 mb-3">Produk Hukum</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-dark card-btn">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-dark card-btn">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-dark card-btn">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-dark card-btn">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-dark card-btn">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-dark card-btn">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /container fluid -->

            <div class="container-fluid bg-secondary">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="display-6 text-center text-uppercase mt-5 mb-3">Produk Hukum Terbaru</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-dark card-btn">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-dark card-btn">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-dark card-btn">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-dark card-btn">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-dark card-btn">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-dark card-btn">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /container fluid -->

            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="display-6 text-center text-uppercase mt-5 mb-3">Produk Hukum Terpopuler</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-dark card-btn">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-dark card-btn">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-dark card-btn">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-dark card-btn">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-dark card-btn">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-dark card-btn">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /container fluid -->

            <div class="container-fluid bg-primary">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="display-6 text-center text-white text-uppercase mt-5 mb-3">Berita Terbaru</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-news mb-3">
                                <img loading="lazy" src="{{asset('/assets/img/news/img01.jpg')}}" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text">
                                        <small class="text-muted">Last updated 3 mins ago</small>
                                    </p>
                                    <p>
                                        <a href="#" class="btn btn-dark card-btn">Go somewhere</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-news mb-3">
                                <img loading="lazy" src="{{asset('/assets/img/news/img01.jpg')}}" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text">
                                        <small class="text-muted">Last updated 3 mins ago</small>
                                    </p>
                                    <p>
                                        <a href="#" class="btn btn-dark card-btn">Go somewhere</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-news mb-3">
                                <img loading="lazy" src="{{asset('/assets/img/news/img01.jpg')}}" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text">
                                        <small class="text-muted">Last updated 3 mins ago</small>
                                    </p>
                                    <p>
                                        <a href="#" class="btn btn-dark card-btn">Go somewhere</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </main>
    </div>
@endsection

@push('script')

@endpush

@push('style')
    <style>
        .card.bg-info, .card.bg-primary {
            height: 200px;
        }

        .card-btn {
            position: absolute;
            bottom: 15px;
        }

        .bg-gradient-primary {
            background: rgb(231, 69, 69);
            background: linear-gradient(180deg, rgba(231, 69, 69, 1) 0%, rgba(231, 69, 69, 1) 0%, rgba(255, 255, 255, 1) 100%);
        }

        .card-news {
            height: 500px;
        }
    </style>
@endpush