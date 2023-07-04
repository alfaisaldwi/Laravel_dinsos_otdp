@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<?php use App\Http\Controllers\PostController; ?>
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
                        <form method="POST" action="{{ route('data_otdp.update', $data_otdp->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="{{ $data_otdp->nama }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">No. Kepolisian</label>
                                    <input type="text" class="form-control" name="no_kepolisian" value="{{ $data_otdp->no_kepolisian }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Umur</label>
                                    <input type="text" class="form-control" name="umur" value="{{ $data_otdp->umur }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tempat Tanggal Lahir</label>
                                    <input type="text" class="form-control" name="ttl" value="{{ $data_otdp->ttl }}">
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <select class="form-control" name="pekerjaan">
                                        <option {{ $data_otdp->pekerjaan == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                        <option {{ $data_otdp->pekerjaan == 'Buruh' ? 'selected' : '' }}>Buruh</option>
                                        <option {{ $data_otdp->pekerjaan == 'Karyawan Swasta' ? 'selected' : '' }}>Karyawan Swasta</option>
                                        <option {{ $data_otdp->pekerjaan == 'Ibu Rumah Tangga' ? 'selected' : '' }}>Ibu Rumah Tangga</option>
                                        <option {{ $data_otdp->pekerjaan == 'Pelajar' ? 'selected' : '' }}>Pelajar</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Destinasi Tujuan</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="jawa" name="destinasi_tujuan" class="custom-control-input" value="jawa" {{ $data_otdp->destinasi_tujuan == 'jawa' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="jawa">Jawa</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="luar_jawa" name="destinasi_tujuan" class="custom-control-input" value="luar_jawa" {{ $data_otdp->destinasi_tujuan == 'luar_jawa' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="luar_jawa">Luar Jawa</label>
                                    </div>
                                </div>
                                <div class="form-group" id="form_pulau" style="{{ $data_otdp->destinasi_tujuan == 'luar_jawa' ? 'display:block;' : 'display:none;' }}">
                                    <label>Pilih Pulau Tujuan atau sekitarnya</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="sumatera" name="destinasi_pulau" class="custom-control-input" value="sumatera" {{ $data_otdp->destinasi_pulau == 'sumatera' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="sumatera">Sumatera</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kalimantan" name="destinasi_pulau" class="custom-control-input" value="kalimantan" {{ $data_otdp->destinasi_pulau == 'kalimantan' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="kalimantan">Kalimantan</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="sulawesi" name="destinasi_pulau" class="custom-control-input" value="sulawesi" {{ $data_otdp->destinasi_pulau == 'sulawesi' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="sulawesi">Sulawesi</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="bali" name="destinasi_pulau" class="custom-control-input" value="bali" {{ $data_otdp->destinasi_pulau == 'bali' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="bali">Bali &amp; Nusa Tenggara</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="papua" name="destinasi_pulau" class="custom-control-input" value="papua" {{ $data_otdp->destinasi_pulau == 'papua' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="papua">Papua</label>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('data_otdp.index') }}" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('layouts.footer')

<script>
    document.addEventListener('DOMContentLoaded', function() {
      var jawaRadio = document.getElementById('jawa');
      var luarJawaRadio = document.getElementById('luar_jawa');
      var formPulau = document.getElementById('form_pulau');
      var pulauRadios = formPulau.querySelectorAll('input[type="radio"]');

      jawaRadio.addEventListener('change', function() {
        formPulau.style.display = 'none';
        for (var i = 0; i < pulauRadios.length; i++) {
          pulauRadios[i].checked = false;
        }
      });

      luarJawaRadio.addEventListener('change', function() {
        formPulau.style.display = this.checked ? 'block' : 'none';
      });
    });
  </script>
