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
              <li class="breadcrumb-item active">Data OTDP</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Orang Terlantar Dalam Perjalanan (OTDP)</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>No. Kepolisian</th>
                    <th>Umur</th>
                    <th>Tempat Tanggal Lahir</th>
                    <th>Pekerjaan</th>
                    <th>Destinasi Tujuan</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                    $no=0;
                    $no++
                  @endphp
                    @forelse ($data_otdps as $otdp)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$otdp->nama}} </td>
                    <td>{{$otdp->no_kepolisian}} </td>
                    <td>{{$otdp->umur}} </td>
                    <td>{{$otdp->ttl}} </td>
                    <td>{{$otdp->pekerjaan}} </td>
                    <td>{{$otdp->destinasi_tujuan}} </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="6">Tidak ada data.</td>
                </tr>
                  @endforelse

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('layouts.footer')

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print",]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>