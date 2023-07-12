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
                        <form action="{{ route('data_otdp.update', $dataOtdp->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama"
                                        value="{{$dataOtdp->nama}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">No. Kepolisian</label>
                                    <input type="text" class="form-control" name="no" placeholder="No. Kepolisian"
                                        value="{{$dataOtdp->no_kepolisian}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Umur</label>
                                    <input type="number" class="form-control" required name="umur"
                                        value="{{$dataOtdp->umur}}" placeholder="Umur">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tempat Tanggal Lahir</label>
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="text" class="form-control" required name="tempat_lahir"
                                                value="{{$dataOtdp->tempat_lahir}}" placeholder="Contoh : Cirebon">
                                        </div>
                                        <div class="col-8">
                                            <input type="date" class="form-control" required name="tanggal_lahir"
                                                value="{{$dataOtdp->tanggal_lahir}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Alamat</label>
                                    <textarea class="form-control" required name="alamat"
                                        placeholder="Alamat">{{$dataOtdp->alamat}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <select class="form-control" name="pekerjaan">
                                        <option value="Wiraswasta" {{$dataOtdp->pekerjaan === 'Wiraswasta' ? 'selected'
                                            : '' }}>Wiraswasta</option>
                                        <option value="Buruh" {{$dataOtdp->pekerjaan === 'Buruh' ? 'selected'
                                            : '' }}>Buruh</option>
                                        <option value="Karyawan Swasta" {{$dataOtdp->pekerjaan === 'Karyawan Swasta' ?
                                            'selected'
                                            : '' }}>Karyawan Swasta</option>
                                        <option value="Ibu Rumah Tangga" {{$dataOtdp->pekerjaan === 'Ibu Rumah Tangga' ?
                                            'selected'
                                            : '' }}>Ibu Rumah Tangga</option>
                                        <option value="Pelajar" {{$dataOtdp->pekerjaan === 'Pelajar' ? 'selected'
                                            : '' }}>Pelajar</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Destinasi Tujuan</label>
                                    <select class="form-control" id="destinasi_tujuan" name="destinasi_tujuan">
                                        <option value="Jawa" {{ $dataOtdp->destinasi_tujuan === 'Jawa Barat' ||
                                            $dataOtdp->destinasi_tujuan === 'Jawa Tengah' || $dataOtdp->destinasi_tujuan
                                            === 'Jawa Timur' ? 'selected' : '' }}>Jawa</option>
                                        <option value="Luar Jawa" {{ $dataOtdp->destinasi_tujuan !== 'Jawa Barat' &&
                                            $dataOtdp->destinasi_tujuan !== 'Jawa Tengah' && $dataOtdp->destinasi_tujuan
                                            !== 'Jawa Timur' ? 'selected' : '' }}>Luar Jawa</option>

                                    </select>
                                </div>
                                <div class="form-group" id="form_pulau" {{$dataOtdp->destinasi_pulau == null ?
                                    'style=display:none;' :''}} >
                                    <label>Pulau Tujuan</label>
                                    <select class="form-control" id="destinasi_pulau" name="destinasi_pulau">
                                        <option value="Sumatra" {{$dataOtdp->destinasi_pulau === 'Sumatra' ?
                                            'selected'
                                            : '' }}>Sumatra</option>
                                        <option value="Kalimantan" {{$dataOtdp->destinasi_pulau === 'Kalimantan' ?
                                            'selected'
                                            : '' }}>Kalimantan</option>
                                        <option value="Sulawesi" {{$dataOtdp->destinasi_pulau === 'Sulawesi' ?
                                            'selected'
                                            : '' }}>Sulawesi</option>
                                        <option value="Bali_Nusa_Tenggara" {{$dataOtdp->destinasi_pulau ===
                                            'Bali_Nusa_Tenggara' ?
                                            'selected'
                                            : '' }}>Bali Nusa Tenggara</option>
                                        <option value="Papua" {{$dataOtdp->destinasi_pulau === 'Papua' ?
                                            'selected'
                                            : '' }}>Papua</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <select class="form-control" id="provinsi" name="provinsi">
                                        <option value="{{ $dataOtdp->provinsi}}">{{$dataOtdp->provinsi}}</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">File</label>
                                    <input class="form-control-file" type="file" name="file" id="file">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
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
    const destinasiTujuan = document.getElementById("destinasi_tujuan");
const formPulau = document.getElementById("form_pulau");
const pulauTujuan = document.getElementById("destinasi_pulau");
const provinsiTujuan = document.getElementById("provinsi");

destinasiTujuan.addEventListener("change", function() {
  if (destinasiTujuan.value === "Jawa") {
    formPulau.style.display = "none";
    pulauTujuan.value = "";
    provinsiTujuan.style.display = "block";
    provinsiTujuan.disabled = false;
    showProvinsiJawa();
  } else {
    formPulau.style.display = "block";
  }
});

pulauTujuan.addEventListener("change", function() {
  if (pulauTujuan.value === "") {
    provinsiTujuan.innerHTML = ""; // Clear existing options
    return;
  }

  if (destinasiTujuan.value === "Luar Jawa") {
    showProvinsiNonJawa(pulauTujuan.value);
  }
});

function showProvinsiJawa() {
  provinsiTujuan.innerHTML = ""; // Clear existing options

  const jawaProvinsi = ["Jawa Barat", "Jawa Tengah", "Jawa Timur", "DKI Jakarta"];
  for (let provinsi of jawaProvinsi) {
    const option = document.createElement("option");
    option.value = provinsi;
    option.textContent = provinsi;
    provinsiTujuan.appendChild(option);
  }
}

function showProvinsiNonJawa(pulau) {
  provinsiTujuan.innerHTML = ""; // Clear existing options

  // Define provinsi for each pulau
  const pulauProvinsi = {
    Sumatra: ["Aceh", "Sumatra Utara", "Sumatra Barat", "Riau", "Kepulauan Riau", "Jambi", "Bengkulu", "Sumatra Selatan", "Kepulauan Bangka Belitung", "Lampung"],
    Kalimantan: ["Kalimantan Barat", "Kalimantan Tengah", "Kalimantan Selatan", "Kalimantan Timur", "Kalimantan Utara"],
    Sulawesi: ["Sulawesi Utara", "Sulawesi Tengah", "Sulawesi Selatan", "Sulawesi Tenggara", "Gorontalo", "Sulawesi Barat"],
    "Bali_Nusa_Tenggara": ["Bali", "Nusa Tenggara Barat", "Nusa Tenggara Timur"],
    Papua: ["Papua Barat", "Papua", "Papua Selatan", "Papua Tengah", "Papua Pegunungan", "Papua Barat Daya"]
  };

  const selectedProvinsi = pulauProvinsi[pulau];
  if (selectedProvinsi) {
    for (let provinsi of selectedProvinsi) {
      const option = document.createElement("option");
      option.value = provinsi;
      option.textContent = provinsi;
      provinsiTujuan.appendChild(option);
    }
  }
}
</script>