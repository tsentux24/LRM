@extends('header.apps',['title'=>'Tambah Data Logistik'])
@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <p>
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Note : </h6>
            </div>
            <div class="card-body">
                <p>Form Untuk Menambahkan Data Logistik yang Masuk ke Ts <code>( Technical Support)</code>, Dari Wp,HB (Sebagai Stock Logistik)</p>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Logistik</h6>

               {{$strtotime=date('Y-m-d H:i:s',time())}}

            </div>
            <div class="card-body">
                <div class="table-responsive">
                   <!--form input Data Logistik -->
                   <table class="table table-responsive" align="center">
                    <form action="/insertlogistik" method="post">
                       @csrf
                    <tr>
                        <td>Nama Barang <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="nm_brg" autocomplete="off" placeholder="Masukan Nama Barang..." class="form-control form-control-user @error('nm_brg') is-invalid @enderror" autofocus>
                            @error('nm_brg')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Imei,No Seri,ID <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="imei" autocomplete="off" placeholder="Masukan Imei,No Seri,ID..." class="form-control form-control-user @error('imei') is-invalid @enderror" autofocus>
                            @error('imei')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                    </tr>
                   <input type="hidden" name="created_at" autocomplete="off" value="{{$strtotime=date('Y-m-d H:i:s',time())}}" class="form-control form-control-user" >
                        <tr>
                            <td>Status Lokasi <span class="text-danger" title="This field is required">*</span></td><td>:</td><td>
                                <select name="vendor" class="form-control form-control-user @error ('vendor') is-invalid @enderror">
                                    <option value="">Pilih Status Lokasi</option>
                                    @foreach($datakonsumen as $itemkonsumen)
                                    <option value="{{ $itemkonsumen-> nama_toko }}">{{ $itemkonsumen -> kode_toko }}-{{ $itemkonsumen -> nama_toko }}
                                    @endforeach
                                    </option>

                                </select>
                                @error('vendor')
                                <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                                </div>
                                Klik Di Sini <a href="/addvendor"> <i class="fa-solid fa-circle-plus"> </i> Data Lokasi </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Kondisi Mechine<span class="text-danger" title="This field is required">*</span></td><td>:</td><td>
                                <select name="kondisi_device" class="form-control form-control-user @error ('kondisi_device') is-invalid @enderror">
                                <option value="">Pilih Kondisi</option>
                                <option value="BAIK">BAIK</option>
                                <option value="RUSAK">RUSAK</option>
                                </select>
                                @error('kondisi_device')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </td>
                        </tr>
                </table>

                <!--end Form input data logistik-->
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Data Logistik</button>

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
