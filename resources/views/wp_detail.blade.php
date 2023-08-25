@extends('header.apps',['title' => 'Detail Wajib Pajak'])
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
            <div class="my-2"></div>
            
            <hr>
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Wajib Pajak</div>
                                       
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Annual) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        TMD</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalTMD }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-tablet fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tasks Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">MPOS
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalMPOS }}</div>
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-solid fa-tablet fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        BAREBONE</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBAREBONE }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-regular fa-tablet-button fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        API</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAPI }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-sharp fa-solid fa-mobile fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Annual) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        PAC HOTEL</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPACHOTEL }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-solid fa-computer fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tasks Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">TMD-API
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalTMDAPI }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-thin fa-mobile-button fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        MINI-PC</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMINIPC }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-solid fa-laptop fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-md-6 mb-4 ">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        INACTIVE</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $inactive }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-solid fa-circle-exclamation fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <a href="addwp" id="btn_add_new_data" class="btn btn-success btn-social" title="Tambah Data Wilayah">
                <i class="fa fa-plus-circle"></i> Tambah Data Wajib Pajak
            </a>
            <hr>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Wajib Pajak</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Status</th>
                            <th>Grup</th>
                            <th>Nama WP</th>
                            <th>Vendor</th>
                            <th>Tgl Pasang</th>
                            <th>Alamat</th>
                            <th>Wilayah</th>
                            <th>Kategori</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Status</th>
                            <th>Grup</th>
                            <th>Nama WP</th>
                            <th>Vendor</th>
                            <th>Tgl Pasang</th>
                            <th>Alamat</th>
                            <th>Wilayah</th>
                            <th>Kategori</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            @foreach($dataWp as $dataWps)
                    
                            <tr>
                            @if($dataWps->status=='Active')
                            <td><span class="badge bg-success text-white">{{$dataWps->status}}</span></td>
                            @else
                            <td><span class="badge bg-danger text-white">{{$dataWps->status}}</span></td>
                            @endif
                            <td>{{$dataWps->grup}}</td>
                            <td>{{$dataWps->wajib_pajak}}</td>
                            <td>{{$dataWps->vendor}}</td>
                            <td>{{$dataWps->tgl_pasang}}</td>
                            <td>{{$dataWps->alamat}}</td>
                            <td>{{$dataWps->wilayah}}</td>
                            <td> 
                            @php
                                $kategori=json_decode($dataWps->kategori_wp,true);
                                foreach ((array)$kategori as $kategories) {
                                    # code...
                                    print_r ($kategories);
                                    echo ",";
                                }
                            @endphp
                            </td>
                            <td>{{$dataWps->created_at}}</td>
                            <td>{{$dataWps->updated_at}}</td>
                            <td>
                                    <a href="editWP/{{$dataWps->id}}?Slug={{Crypt::encrypt('$dataWps->id')}}" class="btn-primary btn btn-xs" ><i class="fa fa-edit"></i></a></td>
                    @endforeach
                        </tr>
                        </tbody>
                    </table>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
        var data = $('.form-data').serialize();
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: "Apakah Anda yakin ingin menghapus Data Ini.?",
              text: "Jika Anda menghapus Data ini,akan hilang selamanya.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
@include('sweetalert::alert')

    </html>
@endsection
