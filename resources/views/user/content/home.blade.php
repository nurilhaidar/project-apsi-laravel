@extends('user.layout.template')
@section('content')
    <header class="py-5">
        <div class="container px-5 pb-5">
            <div class="row gx-5 align-items-center">
                <div class="col-xxl-5">
                    <!-- Header text content-->
                    <div class="text-center text-xxl-start">
                        <h1 class="display-3 fw-bolder mb-5"><span style="color: burlywood">BOOK YOUR PHOTO
                                STUDIO !</span></h1>
                        <div class="d-grid d-sm-flex mb-3">
                            <a class="btn btn-lg px-5 py-3 fs-6 fw-bolder" href="{{ url('order') }}">BOOK
                                NOW</a>
                        </div>
                        <div class="d-grid d-sm-flex mb-3">
                            <a class="btn btn-lg px-5 py-3 fs-6 fw-bolder" href="{{ url('order') }}">BOOK
                                NOW</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-7">
                    <!-- Header profile picture collage -->
                    <div class="d-flex justify-content-center">
                        <div class="row">
                            <div class="col-md-4 mb-3 img-container">
                                <img src="{{ asset('img/FOTO 1.jpg') }}" alt="Image 1" class="img-fluid img-zoom">
                            </div>
                            <div class="col-md-4 mb-3 img-container">
                                <img src="{{ asset('img/FOTO 2.jpg') }}" alt="Image 2" class="img-fluid img-zoom">
                            </div>
                            <div class="col-md-4 mb-3 img-container">
                                <img src="{{ asset('img/FOTO 3.jpg') }}" alt="Image 3" class="img-fluid img-zoom">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
