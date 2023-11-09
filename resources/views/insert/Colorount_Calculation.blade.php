@extends('header.apps',['title'=>'Colorount Calculation'])
@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <p>
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Note : </h6>
            </div>
            <div class="card-body">
                <p>Form Untuk Melalukan Perhitungan Colorount Di <code> Machine </code> Atau <code> Tinta Returan</code></p>
                <ul>
                    <li>Pilih <a href="/pricelist">Price List</a> </li>
                    <li>Masukan Nilai Tinta Setelah Di Ukur Menginakan Lidi Atau Pengaris Contoh <code>12.4</code> Pastikan Mengunakan Tanda <b><code>. (Titik)</code></b></li>

                </ul>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Hitung Colorount</h6>

               {{$strtotime=date('Y-m-d H:i:s',time())}}

            </div>
            <div class="card-body">
                <div class="table-responsive">
                   <!--form input Data Logistik -->
                   <table class="table table-responsive">
                    <form action="/Hitung" method="post" id="frmcolo">
                       @csrf
                       <Tr>
                        <td colspan ="3" bgcolor="#CB2038" style="color:white" align="center">Jumlah Colorount/Cm</td>
                        <td rowspan="17">/</td>
                        <td colspan="2" bgcolor="#4E73DF" style="color:white" align="center">Harga / Pricelist</td>
                        <td rowspan="17">/</td>
                        <td colspan="2" bgcolor="#064E3B" style="color:white" align="center">Hasil By Rp/Pricelist</td>
                       </tr>
                       <tr>
                        <td>YD <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" onchange="hitungYD()" name="tintaYD" autocomplete="off" id="tintaYD" placeholder="Masukan Nilai YD..." class="form-control form-control-user"autofocus>
                        </td>
                        @foreach($datacolo as $datacolos)
                        <td align="center"><input type="text" name="hrgYD" id="hrg_YD" autocomplete="off" onchange="hitungYD()" value="{{ $datacolos->hrg }}" class="form-control form-control-user">
                        @endforeach
                         </td>
                        <td align="center">=</td>
                        <td>
                            <div id="hasilYD"></div>
                        </td>
                        <script>
                            function hitungYD(){
                                let YD= document.getElementById('tintaYD').value;
                                let tinggi=26;
                                let harga=document.getElementById('hrg_YD').value;
                                let pembagian=2;
                                let penjumlahan = parseInt((YD / tinggi)*harga*pembagian);
                                document.getElementById('hasilYD').innerHTML=penjumlahan.toLocaleString("en");
                            }
                            </script>
                    </tr>
                    <tr>
                        <td>PT <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="PT" id="tintaPT" onchange="hitungPT()" autocomplete="off" placeholder="Masukan Nilai PT..." class="form-control form-control-user" autofocus>
                        </td>
                        @foreach($datacoloPT as $datacolosPT)
                        <td align="center"><input type="text" name="hrgPT" id="hrg_PT" autocomplete="off" onchange="hitungPT()" value="{{ $datacolosPT->hrg }}" class="form-control form-control-user">
                        </td>
                        <td align="center">=</td>
                            @endforeach
                        
                        <td>
                            <div id="hasilPT"></div>
                            <script>
                            function hitungPT(){
                                let PT = document.getElementById('tintaPT').value;
                                let tinggi=26;
                                let harga=document.getElementById('hrg_PT').value;
                                let pembagian=2;
                                let penjumlahanPT = parseInt((PT / tinggi)*harga*pembagian);
                                document.getElementById('hasilPT').innerHTML=penjumlahanPT.toLocaleString("en");

                            }
                            </script>

                        </td>
                        
                    </tr>
                    <tr>
                        <td>YE <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="YE" id="tintaYE" onchange="hitungYE()" autocomplete="off" placeholder="Masukan Nilai YE..." class="form-control form-control-user" autofocus>
                        </td>
                        @foreach($datacoloYE as $datacolosYE)
                        <td align="center"><input type="text" name="hrgYE" id="hrg_YE" autocomplete="off" onchange="hitungYE()" value="{{ $datacolosYE->hrg }}" class="form-control form-control-user">
                        </td>
                        <td align="center">=</td>
                            @endforeach
                            <td>
                                <div id="hasilYE"></div>
                                <script>
                                function hitungYE(){
                                    let YE = document.getElementById('tintaYE').value;
                                    let tinggi=26;
                                    let harga=document.getElementById('hrg_YE').value;
                                    let pembagian=2;
                                    let penjumlahanYE = parseInt((YE / tinggi)*harga*pembagian);
                                    document.getElementById('hasilYE').innerHTML=penjumlahanYE.toLocaleString("en");
    
                                }
                                </script>
    
                            </td>
                        </tr>
                        <td>GK <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="GK" id="tintaGK" onchange="hitungGK()" autocomplete="off" placeholder="Masukan Nilai GK..." class="form-control form-control-user" autofocus>
                        </td>
                        @foreach($datacoloGK as $datacolosGK)
                        <td><input type="text" name="hrgGK" id="hrg_GK" onchange="hitungGK()" value="{{ $datacolosGK->hrg }}" class="form-control form-control-user"></td>
                        <td align="center">=</td>
                        @endforeach
                        <td>
                            <div id="hasilGK"></div>
                            <script>
                            function hitungGK(){
                                let GK = document.getElementById('tintaGK').value;
                                let tinggi=26;
                                let harga=document.getElementById('hrg_GK').value;
                                let pembagian=2;
                                let penjumlahanGK = parseInt((GK / tinggi)*harga*pembagian);
                                document.getElementById('hasilGK').innerHTML=penjumlahanGK.toLocaleString("en");
                            }
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td>BO <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="BO" id="tintaBO" onchange="hitungBO()" autocomplete="off" placeholder="Masukan Nilai BO..." class="form-control form-control-user" autofocus>
                        </td>
                        @foreach($datacoloBO as $datacolosBO)
                        <td><input type="text" name="BO" id="hrg_BO" onchange="hitungBO()" value="{{ $datacolosBO->hrg }}" class="form-control form-control-user"></td>
                        <td align="center">=</td>
                        @endforeach
                        <td>
                            <div id="hasilBO"></div>
                            <script>
                            function hitungBO(){
                                let BO = document.getElementById('tintaBO').value;
                                let tinggi=26;
                                let harga=document.getElementById('hrg_BO').value;
                                let pembagian=2;
                                let penjumlahanBO = parseInt((BO / tinggi)*harga*pembagian);
                                document.getElementById('hasilBO').innerHTML=penjumlahanBO.toLocaleString("en");
                            }
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td>BM <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="BM" autocomplete="off" placeholder="Masukan Nilai BM..." class="form-control form-control-user @error('YD') is-invalid @enderror" autofocus>
                            @error('BM')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                        <td><input type="text" name="BM" class="form-control form-control-user"></td>
                    </tr>
                    <tr>
                        <td>RE <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="RE" autocomplete="off" placeholder="Masukan Nilai RE..." class="form-control form-control-user @error('RE') is-invalid @enderror" autofocus>
                            @error('RE')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                        <td><input type="text" name="RE" class="form-control form-control-user"></td>
                    </tr>
                    <tr>
                        <td>DB <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="DB" autocomplete="off" placeholder="Masukan Nilai DB..." class="form-control form-control-user @error('DB') is-invalid @enderror" autofocus>
                            @error('DB')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                        <td><input type="text" name="DB" class="form-control form-control-user"></td>
                    </tr>
                    <tr>
                        <td>RD <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="RD" autocomplete="off" placeholder="Masukan Nilai RD..." class="form-control form-control-user @error('RD') is-invalid @enderror" autofocus>
                            @error('RD')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                        <td><input type="text" name="RD" class="form-control form-control-user"></td>
                    </tr>
                    <tr>
                        <td>YK <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="YK" autocomplete="off" placeholder="Masukan Nilai YK..." class="form-control form-control-user @error('YK') is-invalid @enderror" autofocus>
                            @error('YK')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                        <td><input type="text" name="YK" class="form-control form-control-user"></td>
                    </tr>
                    <tr>
                        <td>WP <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="WP" autocomplete="off" placeholder="Masukan Nilai WP..." class="form-control form-control-user @error('WP') is-invalid @enderror" autofocus>
                            @error('WP')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                        <td><input type="text" name="WP" class="form-control form-control-user"></td>
                    </tr>
                    <tr>
                        <td>RV <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="RV" autocomplete="off" placeholder="Masukan Nilai RV..." class="form-control form-control-user @error('RV') is-invalid @enderror" autofocus>
                            @error('RV')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                        <td><input type="text" name="RV" class="form-control form-control-user"></td>
                    </tr>
                    <tr>
                        <td>HP <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="HP" autocomplete="off" placeholder="Masukan Nilai HP..." class="form-control form-control-user @error('HP') is-invalid @enderror" autofocus>
                            @error('HP')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                        <td><input type="text" name="HP" class="form-control form-control-user"></td>
                    </tr>
                    <tr>
                        <td>OS <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="OS" autocomplete="off" placeholder="Masukan Nilai OS..." class="form-control form-control-user @error('OS') is-invalid @enderror" autofocus>
                            @error('OS')
                            <div class="invalid-feedback">
                                {{ $message }}
                                @enderror
                              </div>
                        </td>
                        <td><input type="text" name="OS" class="form-control form-control-user"></td>
                    </tr>
                    <tr>
                        <td>YV <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="YV" autocomplete="off" placeholder="Masukan Nilai YV..." class="form-control form-control-user">
                        </td>
                        <td><input type="text" name="YV" class="form-control form-control-user"></td>
                    </tr>
                </table>

                <!--end Form input data logistik-->
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                <script>
                    function Total(){
                        let totalGK=document.getElementById('penjumlahanGK').value;
                    }
                    </script>
                </button>

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
