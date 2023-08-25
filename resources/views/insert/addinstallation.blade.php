@extends('header.apps',['title'=>'Tambah Data Installatio Atau Pemasangan'])
@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <p>
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Note : </h6>
            </div>
            <div class="card-body">
                <p>Form Untuk Melakukan Pemasangan Device Ke <code>WP (Wajib Pajak)</code>.</p>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Mutasi Logistik</h6>
        
               {{$strtotime=date('Y-m-d H:i:s',time());}}
               
            </div>
            <div class="card-body">
                <div class="table-responsive">
                   <!--form input Data Logistik -->
                   <table class="table table-responsive" align="center">
                    <form action="/insertPemasangan" method="post">
                       @csrf
                       <tr>
                        <td>No Seri / Nama Device <span class="text-danger" title="This field is required">*</span></td><td>:</td><td>
                            <select name="Nomor_Seri" class="select2 form-select-lg mb-3 @error('Nomor_Seri') is-invalid @enderror" data-live-search="true" autofocus>
                                <option value="">Pilih Noseri Device / Nama Device</option>
                                @foreach($datalogistik as $datalogistiks)
                                <option value="{{ $datalogistiks-> no_seri }}&#44;{{ $datalogistiks -> nama_brg }}">{{ $datalogistiks-> no_seri }}&#44;{{ $datalogistiks -> nama_brg }}</option>
                                    
                                @endforeach
                                </option>
                            </select>
                            @error('Nomor_Seri')
                            <div class="invalid-feedback">
                            {{ $message }}
                            @enderror
                            </div>
                            Klik Di Sini <a href="/addlogistik"> <i class="fa-solid fa-circle-plus"> </i> Data Logistik </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Wajib Pajak <span class="text-danger" title="This field is required">*</span></td><td>:</td><td>
                            <select name="Wajib_Pajak" class="select2 form-select-lg mb-3 @error('Wajib_Pajak') is-invalid @enderror" data-live-search="true">
                                <option value="">Pilih Wajib Pajak</option>
                                @foreach($dataWajibPajak as $dataWajibPajaks)
                                <option value="{{ $dataWajibPajaks -> wajib_pajak }}&#44;{{ $dataWajibPajaks -> vendor }}">{{ $dataWajibPajaks -> wajib_pajak }}&#44;{{ $dataWajibPajaks -> vendor }}</option>
                                    
                                @endforeach
                                </option>
                            </select>
                            @error('Wajib_Pajak')
                            <div class="invalid-feedback">
                            {{ $message }}
                            @enderror
                            </div>
                            Klik Di Sini <a href="/addwp"> <i class="fa-solid fa-circle-plus"> </i> Data Wajib Pajak </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Pemasangan<span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="date" name="Tanggal_Pemasangan" autocomplete="off" placeholder="Masukan Tanggal Pasang..." class="form-control form-control-user @error('Tanggal_Pemasangan') is-invalid @enderror">
                            @error('Tanggal_Pemasangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Keterangan<span class="text-danger" title="This field is required">*</span></td><td>:</td><td><textarea name="Keterangan" autocomplete="off" placeholder="Masukan Secara detail keterangan mutasi contoh : Pemasangan Baru/OK Dll..." rows="7" cols="100" class="form-control form-control-user @error('Keterangan') is-invalid @enderror" autofocus></textarea>
                            @error('Keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                    </tr>
                   <input type="hidden" name="created_at" autocomplete="off" value="{{$strtotime=date('Y-m-d H:i:s',time());}}" class="form-control form-control-user" >
                </table>

                <!--end Form input data logistik-->
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Data Pemasangan</button>

                </form>
                <script>
                    $('.select2').select2();
                </script>
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
<style type="text/css">
    .select2-container .select2-selection--single{
    height:34px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
}

</style>
    </body>

    </html>
@endsection
