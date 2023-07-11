@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data OTDP</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data OTDP</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('data_otdp.update', $dataOtdp->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="{{ $dataOtdp->nama }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">No. Kepolisian</label>
                                    <input type="text" class="form-control" name="no_kepolisian" value="{{ $dataOtdp->no_kepolisian }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Umur</label>
                                    <input type="text" class="form-control" name="umur" value="{{ $dataOtdp->umur }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tempat Tanggal Lahir</label>
                                    <input type="text" class="form-control" name="ttl" value="{{ $dataOtdp->ttl }}">
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <select class="form-control" name="pekerjaan">
                                        <option>Wiraswasta</option>
                                        <option>Buruh</option>
                                        <option>Karyawan Swasta</option>
                                        <option>Ibu Rumah Tangga</option>
                                        <option>Pelajar</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Destinasi Tujuan</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="jawa" name="destinasi" class="custom-control-input" value="jawa" {{ $dataOtdp->destinasi == 'jawa' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="jawa">Jawa</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="luar_jawa" name="destinasi" class="custom-control-input" value="luar_jawa" {{ $dataOtdp->destinasi == 'luar_jawa' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="luar_jawa">Luar Jawa</label>
                                    </div>
                                </div>
                                
                                <div class="form-group" id="form_pulau" style="{{ $dataOtdp->destinasi == 'luar_jawa' ? 'display: block;' : 'display: none;' }}">
                                    <label>Pilih Pulau Tujuan atau sekitarnya</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="sumatera" name="pulau" class="custom-control-input" value="sumatera" {{ $dataOtdp->pulau == 'sumatera' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="sumatera">Sumatera</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kalimantan" name="pulau" class="custom-control-input" value="kalimantan" {{ $dataOtdp->pulau == 'kalimantan' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="kalimantan">Kalimantan</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="sulawesi" name="pulau" class="custom-control-input" value="sulawesi" {{ $dataOtdp->pulau == 'sulawesi' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="sulawesi">Sulawesi</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="bali" name="pulau" class="custom-control-input" value="bali" {{ $dataOtdp->pulau == 'bali' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="bali">Bali &amp; Nusa Tenggara</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="papua" name="pulau" class="custom-control-input" value="papua" {{ $dataOtdp->pulau == 'papua' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="papua">Papua</label>
                                    </div>
                                </div>
                                <div id="form_kota" style="{{ $dataOtdp->destinasi != 'jawa' ? 'display: block;' : 'display: none;' }}">
                                    <div class="form-group">
                                        <label>Nama Kota</label>
                                        <input type="text" class="form-control" name="kota" value="{{ $dataOtdp->kota }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('layouts.footer')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var jawaRadio = document.getElementById('jawa');
        var luarJawaRadio = document.getElementById('luar_jawa');
        var formPulau = document.getElementById('form_pulau');
        var formKota = document.getElementById('form_kota');
        var destinasi = "{{ $dataOtdp->destinasi }}";
        var pulau = "{{ $dataOtdp->pulau }}";

        // Mengatur nilai pilihan destinasi
        if (destinasi === 'jawa') {
            jawaRadio.checked = true;
            formPulau.style.display = 'none';
            formKota.style.display = 'none';
        } else if (destinasi === 'luar_jawa') {
            luarJawaRadio.checked = true;
            formPulau.style.display = 'block';
            formKota.style.display = 'block';
        }

        // Mengatur nilai pilihan pulau
        var pulauRadios = formPulau.querySelectorAll('input[type="radio"]');
        for (var i = 0; i < pulauRadios.length; i++) {
            if (pulauRadios[i].value === pulau) {
                pulauRadios[i].checked = true;
                formKota.style.display = 'block';
            }
        }

        // Mengatur tampilan form pulau dan kota berdasarkan pilihan destinasi
        jawaRadio.addEventListener('change', function() {
            formPulau.style.display = 'none';
            formKota.style.display = 'block';
        });

        luarJawaRadio.addEventListener('change', function() {
            formPulau.style.display = 'block';
            formKota.style.display = 'block';
        });

        // Mengatur tampilan form kota berdasarkan pilihan pulau
        for (var i = 0; i < pulauRadios.length; i++) {
            pulauRadios[i].addEventListener('change', function() {
                formKota.style.display = this.checked ? 'block' : 'none';
            });
        }
    });
</script>
