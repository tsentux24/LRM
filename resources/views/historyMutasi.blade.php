@extends('header.apps',['title' => 'History Logistik'])
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
            <div class="my-2"></div>
            <p>
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Note : </h6>
            </div>
            <div class="card-body">
                <p>Page Untuk melihat History Mutasi <code>Logistik</code></p>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data History Mutasi Logistik</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID, Serial, Imei</th>
                            <th>Nama Barang</th>
                            <th>Status Old</th>
                            <th>Status New</th>
                            <th>Kondisi</th>
                            <th>Tanggal Mutasi</th>
                            <th>Created At</th>
                            <th colspan="2" align="center">Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID, Serial, Imei</th>
                            <th>Nama Barang</th>
                            <th>Status Old</th>
                            <th>Status New</th>
                            <th>Kondisi</th>
                            <th>Tanggal Mutasi</th>
                            <th>Created At</th>
                            <th colspan="2" align="center">Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                      
                            @foreach($logtbllogistik as $HistoryDataAlls)
                            <tr>
                            <td>{{$HistoryDataAlls->no_seri}}</td>
                            <td>{{$HistoryDataAlls->nama_brg}}</td>
                            <td class="border-left-primary shadow h-100 py-2">{{$HistoryDataAlls->oldstatus}}</td>
                            <td class="border-left-success shadow h-100 py-2">{{$HistoryDataAlls->newstatus}}</td>
                            <td>{{$HistoryDataAlls->kondisi}}</td>
                            <td>{{$HistoryDataAlls->tgl_mutasi}}</td>
                            <td>{{$HistoryDataAlls->created_at}}</td>
                            <td >
                               <!--TAG FORM Delete
                               
                               
                               -->
                                <a href="edithistorylog/{{$HistoryDataAlls->id}}?Slug={{Crypt::encrypt('$HistoryDataAlls->id')}}" class="btn-primary btn btn-xs" ><i class="fa fa-edit" Title ="Edit {{ $HistoryDataAlls->nama_brg }}"></i></a>
                            </td>
                            <td><a href="Printhistorylog/{{$HistoryDataAlls->id}}?Slug={{Crypt::encrypt('$HistoryDataAlls->id')}}" class="btn-success btn btn-xs" ><i class="fa fa-print" title="Print {{ $HistoryDataAlls->newstatus }}"></i></a>
                            </td>
                            
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
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: 'Apakah Anda yakin ingin menghapus Data ini?',
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
