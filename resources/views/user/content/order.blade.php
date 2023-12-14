@extends('user.layout.template')
@push('style')
    <style>
        .custom-btn {
            padding: 10px;
            width: 30%;
            text-align: center;
            white-space: normal;
            /* margin-bottom: px; */
        }

        .custom-container {
            width: 70%;
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
                        <div class="card-body p-5">
                            <!-- Professional skills list-->
                            <form action="{{ url('/order') }}" method="GET">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="me-3 form-floating mb-3">
                                        <select name="studio" class="form-control">
                                            <option></option>
                                            @foreach ($studio as $studios)
                                                <option value="{{ $studios->studio_id }}"
                                                    @isset($studio_request)
                                                    @if ($studio_request == $studios->studio_id)
                                                        selected
                                                    @endif
                                                @endisset>
                                                    {{ $studios->nama_studio }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="name">Studio</label>
                                    </div>
                                    <div class="me-3 form-floating mb-3">
                                        <input class="form-control" name="tgl" id="tgl" type="date"
                                            value="{{ isset($tanggal_request) ? $tanggal_request : '' }}"
                                            min="{{ now()->format('Y-m-d') }}">
                                        <label for="tgl">Tanggal</label>
                                    </div>
                                    <div class="me-3 form-floating mb-3">
                                        <button type="submit" class="btn btn-outline-dark">
                                            <div class="bi bi-search"></div>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            @if (isset($alert_tgl))
                                <div class="row row-cols-1 row-cols-md-3 mb-1 justify-content-center">
                                    <p>Pilih tanggal dan studio dulu</p>
                                </div>
                            @else
                                @php
                                    $i = 1;
                                @endphp
                                <form action="{{ url('/order/create') }}" method="GET">
                                    <input type="hidden" name="tgl" value="{{ $tanggal_request }}">
                                    <input type="hidden" name="studio" value="{{ $studio_request }}">
                                    @foreach ($jam_order as $jam)
                                        @if (in_array($i, [1, 4, 7, 10, 13, 16]))
                                            <div class="row row-cols-1 row-cols-md-3 mb-1 justify-content-between">
                                        @endif
                                        <input type="checkbox" class="btn-check"
                                            {{ in_array($jam->order_jam_id, $booked) ? 'disabled' : '' }}
                                            id="btncheck{{ $i }}" autocomplete="off"
                                            value="{{ $jam->order_jam_id }}" name="selected_jam[]">
                                        <label class="btn btn-outline-dark custom-btn"
                                            for="btncheck{{ $i }}">{{ $jam->jam }}</label>
                                        @if (in_array($i, [3, 6, 9, 12, 15, 18]))
                        </div>
                        @endif
                        @php
                            $i++;
                        @endphp
                        @endforeach
                        <div class="row row-cols-1 row-cols-md-3 mb-1 justify-content-center" style="margin-top: 20px">
                            <button type="submit" class="btn btn-dark">Pesan</button>
                        </div>
                        @endif
                        </form>
                    </div>
            </div>
            </section>
        </div>
    </div>
    </div>
@endsection
