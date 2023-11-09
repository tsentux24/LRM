@extends('header.apps',['title'=>'Edit Logistik Atau Machine'])
@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <p>
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Note : </h6>
            </div>
            <div class="card-body">
                <p>Form Untuk Menambahkan Data Logistik / Machine yang Terdapat Di Customer Atau Di Warehouse Atau Di <code>Technical</code></p>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update Data Machine</h6>

               {{$strtotime=date('Y-m-d H:i:s',time())}}

            </div>
            <div class="card-body">
                <div class="table-responsive">
                   <!--form input Data Logistik -->
                   <table class="table table-responsive" align="center">
                    <form action="/editlogistik/{{ $dataedit->no_seri }}" method="post">
                        @method('put')
                       @csrf
                       <tr>
                        <td>No Seri <span class="text-danger" title="This field is required">*</span></td><td>:</td><td>
                            <select name="Nomor_Seri" class="form-control form-control-user @error ('Nomor_Seri') is-invalid @enderror">
                                <option value="">Pilih Nomor Seri</option>
                                @foreach( $datanoseri as  $datanoseris)
                                <option value="{{  $datanoseris-> no_seri }}"{{  $datanoseris ->no_seri==$dataedit-> no_seri?'selected':'' }}>{{  $datanoseris -> nama_brg }}-{{  $datanoseris -> no_seri }}
                                @endforeach
                                </option>

                            </select>
                            @error('Nomor_Seri')
                            <div class="invalid-feedback">
                            {{ $message }}
                            @enderror
                            </div>
                        </td>
                    </tr>
                   
                   <input type="hidden" name="updated_at" autocomplete="off" value="{{$strtotime=date('Y-m-d H:i:s',time())}}" class="form-control form-control-user" >
                        <tr>
                            <td>Status Lokasi <span class="text-danger" title="This field is required">*</span></td><td>:</td><td>
                                <select name="Lokasi" class="form-control form-control-user @error ('Lokasi') is-invalid @enderror">
                                    <option value="">Pilih Status Lokasi</option>
                                    @foreach($datacostumer as $itemkonsumen)
                                    <option value="{{ $itemkonsumen-> nama_toko }}"{{ $itemkonsumen ->nama_toko==$dataedit-> costumer?'selected':'' }}>{{ $itemkonsumen -> kode_toko }}-{{ $itemkonsumen -> nama_toko }}
                                    @endforeach
                                    </option>

                                </select>
                                @error('Lokasi')
                                <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Kondisi Machine<span class="text-danger" title="This field is required">*</span></td><td>:</td><td>
                                <select name="kondisi_Machine" class="form-control form-control-user @error ('kondisi_Machine') is-invalid @enderror">
                                <option value="">Pilih Kondisi Machine</option>
                                <option value="BAIK"{{ $dataedit->kondisi=="BAIK"?'selected':''}}>BAIK</option>
                                <option value="RUSAK"{{ $dataedit -> kondisi=="RUSAK"?'selected':''}}>RUSAK</option>
                                </select>
                                @error('kondisi_Machine')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Note<span class="text-danger" title="This field is required">*</span></td><td>:</td><td>
                                <textarea cols="10" rows="5" name="Note" class="form-control form-control-user @error ('Note') is-invalid @enderror" Placeholder ="Masukan Note Atau Keterangan">{{ $dataedit->note }}</textarea>
                                @error('Note')
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
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Data Machine</button>

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
    @include('sweetalert::alert')
    </body>

    </html>
@endsection
