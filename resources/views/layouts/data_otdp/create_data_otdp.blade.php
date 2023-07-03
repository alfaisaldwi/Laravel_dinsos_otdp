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
              <li class="breadcrumb-item active">Tambah Data OTDP</li>
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
                <h3 class="card-title">Tambah Data OTDP</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('data_otdp.postcreate') }}" method="POST">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" name="namaC" placeholder="Nama">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">No. Kepolisian</label>
                    <input type="text" class="form-control" name="nokC" placeholder="No. Kepolisian">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Umur</label>
                    <input type="text" class="form-control" name="umurC" placeholder="Umur">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tempat Tanggal Lahir</label>
                    <input type="text" class="form-control" name="ttlC" placeholder="Contoh : Cirebon, 23 Februari 1998">
                  </div>
                  <div class="form-group">
                    <label>Pekerjaan</label>
                    <select class="form-control" name="pekerjaanC">
                        <option>Wirausaha</option>
                        <option>Petani</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                    </select>

                  </div>
                  <div class="form-group">
                    <label>Pilih Destinasi Tujuan</label>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="jawa" name="destinasiC" class="custom-control-input" value="jawa">
                      <label class="custom-control-label" for="jawa">Jawa</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="luar_jawa" name="destinasiC" class="custom-control-input" value="luar_jawa">
                      <label class="custom-control-label" for="luar_jawa">Luar Jawa</label>
                    </div>
                  </div>
                  <div class="form-group" id="form_pulau" style="display: none;">
                    <label>Pilih Pulau Tujuan atau sekitarnya</label>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="sumatera" name="pulauC" class="custom-control-input" value="sumatera">
                      <label class="custom-control-label" for="sumatera">Sumatera</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="kalimantan" name="pulauC" class="custom-control-input" value="kalimantan">
                      <label class="custom-control-label" for="kalimantan">Kalimantan</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="sulawesi" name="pulauC" class="custom-control-input" value="sulawesi">
                      <label class="custom-control-label" for="sulawesi">Sulawesi</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="bali" name="pulauC" class="custom-control-input" value="bali">
                      <label class="custom-control-label" for="bali">Bali &amp; Nusa Tenggara</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="papua" name="pulauC" class="custom-control-input" value="papua">
                      <label class="custom-control-label" for="papua">Papua</label>
                    </div>
                  </div>

                <!-- /.card-body -->

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </form>
            </div>
</div>
</div>
</div>
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
