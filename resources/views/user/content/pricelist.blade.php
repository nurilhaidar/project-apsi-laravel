@extends('user.layout.template')
@push('style')
    <style>
        .custom-btn {
            transition: background-color 0.5s ease, color 0.5s ease;
            color: black;
        }

        .custom-btn:hover {
            background-color: burlywood;
            color: white;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-11 col-xl-9 col-xxl-8">
                <section>
                    <!-- Skillset Card-->
                    <div class="card shadow border-0 rounded-4 mb-5">
                        <div class="card-body p-5 text-center">
                            <img src="{{ asset('img/PRICELIST.png') }}" width="300px">
                            <div class="text-center" style="margin-top: 50px">
                                <a href="{{ url('order') }}" class="btn btn-md btn-outline-light fw-bolder custom-btn">BOOK
                                    NOW</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
