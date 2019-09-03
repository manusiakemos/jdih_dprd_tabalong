@extends('layouts.master')

@section('content')
    <div>
        <main role="main">
            @include('components.produk-hukum')
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
            height: 600px;
        }
    </style>
@endpush