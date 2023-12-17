@extends('user.layout.template')
@push('style')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    {{-- <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}"> --}}
@endpush
@section('content')
    <div class="container">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-11 col-xl-9 col-xxl-8">
                <section>
                    <!-- Skillset Card-->
                    <div class="card shadow border-0 rounded-4 mb-5">
                        <div class="card-body p-5">
                            @if (isset($alert))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-ban"></i> Gagal !</h5>
                                    {{ $alert }}
                                </div>
                            @endif
                            <!-- Professional skills list-->
                            <form action="{{ $url_form }}" method="POST">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input class="form-control @error('nama') is-invalid @enderror" id="name"
                                        name="nama" type="text" data-sb-validations="required" />
                                    <label for="name">Nama</label>
                                    @error('nama')
                                        <span style="font-size:13px; color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                        name="no_hp" type="text" />
                                    <label for="no_hp">No Hp</label>
                                    @error('no_hp')
                                        <span style="font-size:13px; color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select @error('nama') is-invalid @enderror" id="tema"
                                        name="tema" data-sb-validations="required">
                                        <option value="" selected disabled></option>
                                        @foreach ($tema as $item)
                                            <option value="{{ $item->tema_id }}">{{ $item->nama_tema }}</option>
                                        @endforeach
                                    </select>
                                    <label for="tema">Tema</label>
                                    @error('tema')
                                        <span style="font-size:13px; color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <span>
                                        <h6>Pembayaran</h6>
                                    </span>
                                    <div class="form-check" style="margin-left: 5px">
                                        <input class="form-check-input" type="radio" name="pembayaran" id="exampleRadios1"
                                            value="tunai">
                                        <label class="form-check-label" for="exampleRadios1">
                                            Tunai
                                        </label>
                                    </div>
                                    <div class="form-check" style="margin-left: 5px">
                                        <input class="form-check-input" type="radio" name="pembayaran" id="exampleRadios2"
                                            value="debit">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Debit
                                        </label>
                                    </div>
                                    <div id="debitForm" style="display: none">
                                        <img src="{{ asset('img/visa_logo.png') }}" width="40px"
                                            style="margin-left: 20px">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <div class="form-group">
                                                                <label for="formGroupExampleInput"
                                                                    style="font-size: 14px; color: gray">Card Number</label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <div class="form-group">
                                                                <label for="formGroupExampleInput"
                                                                    style="font-size: 14px; color: gray">Expiration
                                                                    Date</label>
                                                                <input type="month" id="monthInput" name="month"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <div class="form-group">
                                                                <label for="formGroupxampleInput"
                                                                    style="font-size: 14px; color: gray">CVV Number</label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="tgl" value="{{ $tanggal_request }}">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card md-5 mx-auto" style="width: 50%;">
                                            <div class="card-header d-flex justify-content-center">
                                                <h5 class="card-title"><b>{{ $studio->nama_studio }}</b></h5>
                                                <input type="hidden" name="studio" value="{{ $studio->studio_id }}">
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body ">
                                                <table class="table">
                                                    <thead class="text-center">
                                                        <th>Jam</th>
                                                        <th>Harga</th>
                                                    </thead>
                                                    <tbody class="text-center">
                                                        @foreach ($jam as $item)
                                                            <tr>
                                                                <td style="width: 50%">{{ $item->jam }}</td>
                                                                <td>{{ $studio->harga }}</td>
                                                                <input type="hidden" name="jam[]"
                                                                    value="{{ $item->order_jam_id }}">
                                                            </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td style="width: 25%" class="text-center"><b>Total</b></td>
                                                            <td>{{ $total }}</td>
                                                            <input type="hidden" name="total"
                                                                value="{{ $total }}">
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center" style="margin-top: 20px">
                                    <button type="submit" class="btn btn-outline-dark">Pesan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        // Get the radio buttons and the debit form element
        const tunaiRadio = document.getElementById('exampleRadios1');
        const debitRadio = document.getElementById('exampleRadios2');
        const debitForm = document.getElementById('debitForm');

        // Add event listeners to the radio buttons
        tunaiRadio.addEventListener('change', toggleDebitForm);
        debitRadio.addEventListener('change', toggleDebitForm);

        // Function to toggle the visibility of the debit form
        function toggleDebitForm() {
            debitForm.style.display = debitRadio.checked ? 'block' : 'none';
        }
    </script>
@endpush
