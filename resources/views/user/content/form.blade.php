@extends('user.layout.template')
@push('style')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
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
                                <input type="hidden" name="tgl" value="{{ $tanggal_request }}">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-6">
                                        <div class="card md-5">
                                            <div class="card-header d-flex justify-content-center">
                                                <h3 class="card-title"><b>{{ $studio->nama_studio }}</b></h3>
                                                <input type="hidden" name="studio" value="{{ $studio->studio_id }}">
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body p-0">
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
                                    <!-- /.card-body -->
                                </div>
                                <div class="form-floating mb-3 text-center">
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
