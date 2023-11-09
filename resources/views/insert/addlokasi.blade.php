@extends('header.apps',['title'=>'Tambah Data Lokasi Atau Customer'])
@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <p>
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Note : </h6>
            </div>
            <div class="card-body">
                <p>Form Untuk Menambahkan Data <code> Lokasi </code> Atau <code> Customer</code></p>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Lokasi Atau Customer</h6>

               {{$strtotime=date('Y-m-d H:i:s',time())}}

            </div>
            <div class="card-body">
                <div class="table-responsive">
                   <!--form input Data Logistik -->
                   <table class="table table-responsive" align="center">
                    <form action="/insertlokasi" method="post">
                       @csrf
                       <tr>
                        <td>Kode Lokasi / Customer <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="Kode_Lokasi" autocomplete="off" placeholder="Masukan Kode Lokasi..." class="form-control form-control-user @error('Kode_Lokasi') is-invalid @enderror" autofocus>
                            @error('Kode_Lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Lokasi / Customer<span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="Nama_Lokasi" autocomplete="off" placeholder="Masukan Nama Lokasi..." class="form-control form-control-user @error('Nama_Lokasi') is-invalid @enderror" autofocus>
                            @error('Nama_Lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat Lokasi / Customer<span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="Alamat_Lokasi" autocomplete="off" placeholder="Masukan Alamat Lokasi..." class="form-control form-control-user @error('Alamat_Lokasi') is-invalid @enderror" autofocus>
                            @error('Alamat_Lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                    </tr>
                   <input type="hidden" name="created_at" autocomplete="off" value="{{$strtotime=date('Y-m-d H:i:s',time())}}" class="form-control form-control-user" >
                </table>

                <!--end Form input data logistik-->
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Data Lokasi</button>

                </form>
            </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    </body>

    </html>
@endsection