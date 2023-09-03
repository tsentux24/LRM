@extends('header.apps',['title'=>'Edit Data Wajib Pajak '])
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
                <p>Form Untuk Melakukan Update Data <code> Wajib Pajak. </code></p>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Wajib Pajak</h6>

               {{$strtotime=date('Y-m-d H:i:s',time())}}

            </div>
            <div class="card-body">
                <div class="table-responsive">
                   <!--form input Data Logistik -->
                   <table class="table table-responsive" align="center">
                    <form action="/editWP/{{ $editwp->id }}" method="post">
                        @method('put')
                       @csrf
                       <tr>
                        <td>Status Wajib Pajak <span class="text-danger" title="This field is required">*</span></td><td>:</td><td>
                            <select name="Status"  class="form-control form-control-user @error ('Status') is-invalid @enderror">
                            <option value="">PILIH Status Wajib Pajak</option>
                            <option value="Active"{{ $editwp->status=="Active" ?'selected':''}}>Active</option>
                            <option value="Inactive"{{ $editwp->status=="Inactive"?'selected':'' }}>Inactive</option>
                            </select>
                            @error('Status')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Wajib Pajak <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="NamaWP" autocomplete="off" placeholder="Masukan Nama Wajib Pajak..." class="form-control form-control-user @error('NamaWP') is-invalid @enderror" autofocus value="{{ $editwp->wajib_pajak }}">
                            @error('NamaWP')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Group <span class="text-danger" title="This field is required">*</span></td><td>:</td><td>
                            <select name="group"  class="form-control form-control-user @error ('group') is-invalid @enderror">
                                <option value="">PILIH Group</option>
                                @foreach($datagroup as $datagroups)
                                <option value="{{ $datagroups->group }}"{{ $datagroups->group==$editwp->grup?'selected':'' }}>{{ $datagroups->group }}</option>
                                @endforeach
                                </select>
                            @error('group')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Vendor <span class="text-danger" title="This field is required">*</span></td><td>:</td><td>
                            <select name="vendor"  class="form-control form-control-user @error ('vendor') is-invalid @enderror">
                            <option value="">PILIH Vendor</option>
                            @foreach($dataVendor as $dataVendors)
                            <option value="{{ $dataVendors->nm_vendor }}"{{ $dataVendors ->nm_vendor==$editwp->vendor?'selected':'' }}>{{ $dataVendors->nm_vendor }}</option>
                            @endforeach
                            </select>
                            @error('vendor')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Pasang <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="date" value="{{ $editwp->tgl_pasang}}" name="Tanggal_Pasang" autocomplete="off" placeholder="Masukan Tanggal Pasang..." class="form-control form-control-user @error('Tanggal_Pasang') is-invalid @enderror" autofocus>
                            @error('Tanggal_Pasang')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat Wajib Pajak <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><textarea name="Alamat" autocomplete="off" placeholder="Masukan Alamat Wajib Pajak..." class="form-control form-control-user @error('Alamat') is-invalid @enderror" autofocus>{{ $editwp->alamat }}</textarea>
                            @error('Alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Kabupaten/Kota <span class="text-danger" title="This field is required">*</span></td><td>:</td><td>
                            <select name="Kabupaten"  class="select2 form-select-lg mb-3 @error('Kabupaten') is-invalid @enderror" data-live-search="true">
                            <option value="">PILIH Kabupaten Atau Kota</option>
                            @foreach($datawilayah as $datawilayahs)
                            <option value="{{ $datawilayahs->nm_area }}"{{ $datawilayahs->nm_area == $editwp->wilayah?'selected':'' }}>{{ $datawilayahs->nm_area }}
                            @endforeach
                            </select>
                            @error('Kabupaten')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Kategori Pajak <span class="text-danger" title="This field is required">*</span></td><td>:</td><td>
                            @php
                                   $kategori_wp=json_decode($editwp->kategori_wp);
                            @endphp
                            <div class="col-sm-10">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="ketegori[]" value="Restoran" name="kategori[]" {{ in_array('Restoran',$kategori_wp)?'checked':'' }}>
                                  <label class="form-check-label">
                                    Restoran
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="kategori[]" name="kategori[]" value="Hotel" {{ in_array('Hotel',$kategori_wp)?'checked':'' }}>
                                  <label class="form-check-label">
                                    Hotel
                                  </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="kategori[]" name="kategori[]" value="Hiburan" {{ in_array('Hiburan',$kategori_wp)?'checked':'' }}>
                                    <label class="form-check-label">
                                      Hiburan
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input"  type="checkbox" id="kategori[]" name="kategori[]" value="Parkir" {{ in_array('Parkir',$kategori_wp)?'checked':'' }}>
                                    <label class="form-check-label">
                                      Parkir
                                    </label>
                                  </div>
                              </div>
                              @error('kategori[]')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                        </td>
                    </tr>
                   <input type="hidden" name="updated_at" autocomplete="off" value="{{$strtotime=date('Y-m-d H:i:s',time())}}" class="form-control form-control-user" >
                </table>

                <!--end Form input data logistik-->
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Data Wajib Pajak</button>

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
