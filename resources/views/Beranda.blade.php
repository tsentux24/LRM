<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    </script>
  <title>Logistic Report Management - Beranda</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/frontEnd" class="logo d-flex align-items-center">
        <img src="assets/img/logo.gif" alt="">
        <span class="d-none d-lg-block">Logistic Report Management</span>
      </a>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="https://eu.ui-avatars.com/api/?name={{ Auth::user()->name }}&bold=true&background=1B699A&color=FFFFFF" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->email }}</h6>
              <span>{{Auth::user()->role}}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <div class="dropdown-item d-flex align-items-center">
              <form action="/logout" method="post">
                @csrf
                <button class="btn btn-danger" style="background: #d73925;" Title="Keluar"><i class="bi bi-power"></i></button> Keluar
            </form>
            </li>
          </div>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

	    <section class="section dashboard">
  <main id="main" class="main">
  <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">MPOS PAC <span>| <?php echo date('Y-M-d');?></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-tablet"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalMPOS  }}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
			 <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">TMD PAC <span>| <?php echo date('Y-M-d');?></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-pc-horizontal"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                      
                        {{$totalTMD }}
                      </h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
			 <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">TOTAL <span>| <?php echo date('Y-M-d');?></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-database-fill-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $count }}</h6>
                      <span class="badge bg-info text-white fw-bold">Total</span> <span class="text-muted small pt-2 ps-1">Sudah termasuk Device/Logistik Yang <span class="badge bg-danger text-white">Rusak</span></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
			</div>
			</div>
			</div>
			
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Logistik</h5>
              <p>
			  Data logistik Tanggal <span class="badge bg-info"> <?php echo date('Y-M-d');?> </span> .Mohon Infokan Ke TS Bersangkutan Jika Terdapat Kesalahan Data Logistik Dengan Data Admin.!!! Contact TS Via WA.
			  </p>
       <a href="{{ route('export') }}" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#f7f7f8}</style><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM155.7 250.2L192 302.1l36.3-51.9c7.6-10.9 22.6-13.5 33.4-5.9s13.5 22.6 5.9 33.4L221.3 344l46.4 66.2c7.6 10.9 5 25.8-5.9 33.4s-25.8 5-33.4-5.9L192 385.8l-36.3 51.9c-7.6 10.9-22.6 13.5-33.4 5.9s-13.5-22.6-5.9-33.4L162.7 344l-46.4-66.2c-7.6-10.9-5-25.8 5.9-33.4s25.8-5 33.4 5.9z"/></svg>&nbsp;Export Excel</a>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">No Seri</th>
                    <th scope="col">Nama Device</th>
                    <th scope="col">Vendor</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Status</th>
                    <th scope="col">Keterangan</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach($dataFElogistik as $key => $datalogistik)
                 
                  <tr>
                    <th scope="row">{{ $dataFElogistik->firstitem() + $key }}</th>
                    <td>{{$datalogistik->no_seri}}</td>
                    <td>{{$datalogistik->nama_brg}}</td>
                    <td>{{$datalogistik->id_vendor}}</td>
                    <td>{{$datalogistik->wilayah}}</td>
                    <td>{{$datalogistik->istatus}}</td>
                    @if($datalogistik->kondisi=="RUSAK")
                    <td><span class="badge bg-danger text-white">{{$datalogistik->kondisi}}</span></td>
                    @else
                    <td><span class="badge bg-success text-white">{{$datalogistik->kondisi}}</span></td>
                    @endif
                  </tr>
                @endforeach
                </tbody>
              </table>
              {{ $dataFElogistik->links() }}
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Logistic Report Management</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by 753N7UX
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>