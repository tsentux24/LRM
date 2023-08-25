@extends('header.apps',['title'=>'Edit Data Wilayah'])
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
                <p>Form Untuk Melakukan Update Data  <code> Wilayah ->Untuk Detail Lokasi Device Berada. </code></p>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Wilayah</h6>
        
               {{$strtotime=date('Y-m-d H:i:s',time());}}
               
            </div>
            <div class="card-body">
                <div class="table-responsive">
                   <!--form input Data Logistik -->
                   <table class="table table-responsive" align="center">
                    <form action="/editWilayah/{{ $editWil->id }}" method="post">
                        @method('put')
                       @csrf
                       @php
                       $str=$editWil->kode_wilayah;
                       $pecah=explode('−',$str);
                   @endphp
                       <tr>
                        <td>Provinsi / Kabupaten <span class="text-danger" title="This field is required">*</span></td><td>:</td><td>
                            <select name="provinsi" class="select2 form-select-lg mb-3 @error('provinsi') is-invalid @enderror" data-live-search="true">
                                <option value="">Pilih Provinsi / Kabupaten</option>
                                @foreach($dataarea as $DataDetailAreaS)
                                <option value="{{ $DataDetailAreaS -> kode_area }}&#8722;{{ $DataDetailAreaS-> nm_area }}"{{ $DataDetailAreaS -> kode_area == $pecah[0]?'selected':''}}>{{ $DataDetailAreaS -> nm_area }} &#40; {{ $DataDetailAreaS-> kode_area }} &#41;</option>
                            @endforeach
                            </select>
                            @error('provinsi')
                            <div class="invalid-feedback">
                            {{ $message }}
                            @enderror
                            </div>
                        </td>
                    </tr>
                   
                    <tr>
                        <td>Wilayah<span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="Wilayah" autocomplete="off" placeholder="Masukan Wilayah..." value="{{ $editWil->nm_wilayah }}" class="form-control form-control-user @error('Wilayah') is-invalid @enderror" autofocus>
                            @error('Wilayah')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                    </tr>
                   <input type="hidden" name="updated_at" autocomplete="off" value="{{$strtotime=date('Y-m-d H:i:s',time());}}" class="form-control form-control-user" >
                </table>

                <!--end Form input data logistik-->
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Data Wilayah</button>

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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    
        <!-- Core plugin JavaScript-->
        <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    
        <!-- Custom scripts for all pages-->
        <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
    
        <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    
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
