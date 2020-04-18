@extends('layout.template')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Fakultas</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


        <!-- Main row -->
        <div class="row">

          <section class="col-lg-12 ">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Insert Data</h3>

              </div><!-- /.card-header -->

              <div class="card-body">
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    Upload Validation Error
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="post" action="{{ url('/ruangan_store') }}" autocomplete="off" enctype="multipart/form-data">
                @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Jurusan</label>
                            <select class="form-control" id="id_jurusan" name="id_jurusan">
                                <option value="" hidden> -- Pilih Jurusan -- </option>
                                @foreach($dataJurusan as $jur)
                                    <option value="{{ $jur->id_jurusan }}">{{ $jur->fakultas->nama_fakultas .' - '. $jur->nama_jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Ruangan</label>
                            <input type="text" class="form-control" name="nama_ruang" id="nama_ruang" placeholder="Masukan Nama Ruangan" required>
                        </div>
                        <button type="submit" id="button1" class="btn btn-primary"><i class="fas fa-plus-circle"></i> INSERT</button>
                    </div>

                </form>




              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>


        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@stop
