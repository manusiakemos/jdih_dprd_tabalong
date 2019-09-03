@extends('layouts.master')

@section('content')
    <div>
        <main role="main">

            <div class="container-fluid bg-primary">
                @include('components.berita')
            </div>


        </main>
    </div>
@endsection

@push('script')

@endpush

@push('style')

@endpush