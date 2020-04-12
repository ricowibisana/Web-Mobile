@extends('layout.template')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Barang</h1>
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
            <div class="card">
              <div class="card-header">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <form class="form-inline" style="position: relative" action="{{ url('/barang') }}">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="mdi mdi-magnify"></i>
                                    </button>
                                </div>
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" name="search" aria-label="Search">
                                <div class="input-group-append">
                                    <a class="btn btn-danger" href="{{ route('barang.barang') }}" style="color: #fff;">SHOW ALL</a>
                                </div>
                            </div>
                            <div style="position: absolute; right: 10px; ">
                                <a class="btn btn-success" href="#" style="color: #fff"><i class="mdi mdi-file-excel"></i>&nbsp; EXPORT</a>
                                <a class="btn btn-primary" href="{{ url('/barangCreate') }}" style="color: #fff"><i class="mdi mdi-plus"></i>&nbsp; ADD</a>
                            </div>
                        </form>
                    </div>
                </div>

              </div><!-- /.card-header -->

              <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dataBarang as $barang)
                            <tr>
                                <td>{{ $barang->id_barang }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->jumlah_barang }}</td>
                                <td>
                                    <a class="btn btn-info" name="btn-update" href="{{ url('/barangUpdate'. $barang->id_barang) }}"> 
                                    <i class="mdi mdi-pencil"></i></a>
                                    <a class="btn btn-danger" name="btn-delete" href="{{ url('/barangDelete'. $barang->id_barang) }}" onclick="return confirm('Yakin ingin menghapus data barang {{ $barang->nama_fakultas}}?')"> 
                                    <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="3"><center>Data kosong</center></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <br>
                  {{ $dataBarang->links() }}
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
