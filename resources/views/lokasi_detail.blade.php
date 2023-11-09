@extends('header.apps',['title' => 'Detail Lokasi'])
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
            <div class="my-2"></div>
            <a href="addlokasi" id="btn_add_new_data" class="btn btn-success btn-social" title="Tambah Data">
                <i class="fa fa-plus-circle"></i> Tambah Data Lokasi
            </a>  
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
                <h6 class="m-0 font-weight-bold text-primary">Data Logistik</h6>
            </div>
            <div class="card-body no-padding mb-0">
                <div class="table-responsive no-padding mb-0">
                    <table class="table table-bordered mb-0" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Kode Costumer</th>
                            <th>Nama Costumer</th>
                            <th>Alamat</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Kode Costumer</th>
                            <th>Nama Costumer</th>
                            <th>Alamat</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                      
                            @foreach($datakonsumen as $datakonsumens)
                            <tr>
                                <td>{{$datakonsumens->kode_toko}}</td>
                                <td>{{$datakonsumens->nama_toko}}</td>
                                <td>{{$datakonsumens->alamat}}</td>
                                <td>{{$datakonsumens->created_at}}</td>
                                <td>{{$datakonsumens->updated_at}}</td>
                            <td align="center">
                                <form method="POST" action="{{ route('datalogistik.delete', $datakonsumens->kode_toko) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm show_confirm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash"></i></button>
                                    <hr>
                                   <a href="#" class="btn-primary btn btn-xs btn-sm show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-edit"></i></a></td>
                                    </form>
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
