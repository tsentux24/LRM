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
                    <form action=""  name="coloront" id="coloront" >
                       @csrf
                       <Tr>
                        <td colspan ="3" bgcolor="#CB2038" style="color:white" align="center">Jumlah Colorount/Cm</td>
                        <td rowspan="17">/</td>
                        <td colspan="2" bgcolor="#4E73DF" style="color:white" align="center">Harga / Pricelist</td>
                        <td rowspan="17">/</td>
                        <td colspan="2" bgcolor="#064E3B" style="color:white" align="center">Hasil By Rp/Pricelist</td>
                       </tr>
                       <tr>
                        <td>YD <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" value="0" onchange="hitungYD()" name="tintaYD"  autocomplete="off" id="tintaYD" placeholder="Masukan Nilai YD..." class="form-control form-control-user"autofocus>
                        </td>
                        @foreach($datacolo as $datacolos)
                        <td align="center"><input type="text" name="hrgYD" id="hrg_YD" autocomplete="off" onchange="hitungYD()" value="{{ $datacolos->hrg }}" class="form-control form-control-user">
                        @endforeach
                         </td>
                        <td align="center">=</td>
                        <td>
                            <input type="text" id="hasilYD" class="form-control form-control-user" readonly value="0">
                        </td>
                        <script>
                            function hitungYD(){
                                let YD= document.getElementById('tintaYD').value;
                                let tinggi=26;
                                let harga=document.getElementById('hrg_YD').value;
                                let pembagian=2;
                                let penjumlahan = parseInt((YD / tinggi)*harga*pembagian);
                                document.getElementById('hasilYD').value=penjumlahan;
                            }
                            </script>
                    </tr>
                    <tr>
                        <td>PT <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="PT" value="0" id="tintaPT" onchange="hitungPT()"  autocomplete="off" placeholder="Masukan Nilai PT..." class="form-control form-control-user" autofocus>
                        </td>
                        @foreach($datacoloPT as $datacolosPT)
                        <td align="center"><input type="text" name="hrgPT" id="hrg_PT" autocomplete="off" onchange="hitungPT()" value="{{ $datacolosPT->hrg }}" class="form-control form-control-user">
                        </td>
                        <td align="center">=</td>
                            @endforeach
                        
                        <td>
                            <input type="text" id="hasilPT" class="form-control form-control-user" readonly value="0">
                            <script>
                            function hitungPT(){
                                let PT = document.getElementById('tintaPT').value;
                                let tinggi=26;
                                let harga=document.getElementById('hrg_PT').value;
                                let pembagian=2;
                                let penjumlahanPT = parseInt((PT / tinggi)*harga*pembagian);
                                document.getElementById('hasilPT').value=penjumlahanPT;

                            }
                            </script>

                        </td>
                        
                    </tr>
                    <tr>
                        <td>YE <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="YE" value="0" id="tintaYE" onchange="hitungYE()" autocomplete="off" placeholder="Masukan Nilai YE..." class="form-control form-control-user" autofocus>
                        </td>
                        @foreach($datacoloYE as $datacolosYE)
                        <td align="center"><input type="text" name="hrgYE" id="hrg_YE" autocomplete="off" onchange="hitungYE()" value="{{ $datacolosYE->hrg }}" class="form-control form-control-user">
                        </td>
                        <td align="center">=</td>
                            @endforeach
                            <td>
                                <input type="text" id="hasilYE" class="form-control form-control-user" readonly value="0">
                                <script>
                                function hitungYE(){
                                    let YE = document.getElementById('tintaYE').value;
                                    let tinggi=26;
                                    let harga=document.getElementById('hrg_YE').value;
                                    let pembagian=2;
                                    let penjumlahanYE = parseInt((YE / tinggi)*harga*pembagian);
                                    document.getElementById('hasilYE').value=penjumlahanYE;
    
                                }
                                </script>
    
                            </td>
                        </tr>
                        <td>GK <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="GK"  value="0" id="tintaGK" onchange="hitungGK()" autocomplete="off" placeholder="Masukan Nilai GK..." class="form-control form-control-user" autofocus>
                        </td>
                        @foreach($datacoloGK as $datacolosGK)
                        <td><input type="text" name="hrgGK" id="hrg_GK" onchange="hitungGK()" value="{{ $datacolosGK->hrg }}" class="form-control form-control-user"></td>
                        <td align="center">=</td>
                        @endforeach
                        <td>
                            <input type="text" id="hasilGK" class="form-control form-control-user" readonly value="0">
                            <script>
                            function hitungGK(){
                                let GK = document.getElementById('tintaGK').value;
                                let tinggi=26;
                                let harga=document.getElementById('hrg_GK').value;
                                let pembagian=2;
                                let penjumlahanGK = parseInt((GK / tinggi)*harga*pembagian);
                                document.getElementById('hasilGK').value=penjumlahanGK;
                            }
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td>BO <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" value="0" name="BO" id="tintaBO" onchange="hitungBO()"  autocomplete="off" placeholder="Masukan Nilai BO..." class="form-control form-control-user" autofocus>
                        </td>
                        @foreach($datacoloBO as $datacolosBO)
                        <td><input type="text" name="BO" id="hrg_BO" onchange="hitungBO()" value="{{ $datacolosBO->hrg }}" class="form-control form-control-user"></td>
                        <td align="center">=</td>
                        @endforeach
                        <td>
                            <input type="text" id="hasilBO" class="form-control form-control-user" readonly value="0">
                            <script>
                            function hitungBO(){
                                let BO = document.getElementById('tintaBO').value;
                                let tinggi=26;
                                let harga=document.getElementById('hrg_BO').value;
                                let pembagian=2;
                                let penjumlahanBO = parseInt((BO / tinggi)*harga*pembagian);
                                document.getElementById('hasilBO').value=penjumlahanBO;
                            }
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td>BM <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="BM"  value="0" autocomplete="off" placeholder="Masukan Nilai BM..." class="form-control form-control-user"  id="tintaBM" onchange="hitungBM()" autofocus>
                            
                        </td>
                        @foreach($datacoloBM as $datacolosBM)
                        <td><input type="text" name="BM" class="form-control form-control-user" id="hrg_BM" onchange="hitungBM()" value="{{ $datacolosBM->hrg }}"></td>
                        <td align="center"> =</td>    
                        @endforeach
                        <td>
                            <input type="text" id="hasilBM" class="form-control form-control-user" readonly value="0">
                            <script>
                            function hitungBM(){
                                let BM = document.getElementById('tintaBM').value;
                                let tinggi=26;
                                let harga=document.getElementById('hrg_BM').value;
                                let pembagian=2;
                                let penjumlahanBM = parseInt((BM / tinggi)*harga*pembagian);
                                document.getElementById('hasilBM').value=penjumlahanBM;
                            }
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td>RE <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="RE"  value="0" id="tintaRE" onchange="hitungRE()" autocomplete="off" placeholder="Masukan Nilai RE..." class="form-control form-control-user" autofocus>
                          
                        </td>
                        @foreach($datacoloRE as $datacolosRE)
                        <td><input type="text" name="RE" id="hrg_RE" onchange="hitungRE()" value="{{ $datacolosRE ->hrg }}" class="form-control form-control-user"></td>
                        @endforeach
                        <td align="center">=</td>
                        </td>
                        <td>
                            <input type="text" id="hasilRE" class="form-control form-control-user" readonly value="0">
                            <script>
                            function hitungRE(){
                                let RE = document.getElementById('tintaRE').value;
                                let tinggi=26;
                                let harga=document.getElementById('hrg_RE').value;
                                let pembagian=2;
                                let penjumlahanRE = parseInt((RE / tinggi)*harga*pembagian);
                                document.getElementById('hasilRE').value=penjumlahanRE;
                            }
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td>DB <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="DB" value="0" id="tintaDB" onchange="hitungDB()"  autocomplete="off" placeholder="Masukan Nilai DB..." class="form-control form-control-user" autofocus>
                        </td>
                        @foreach($datacoloDB as $datacolosDB)
                        <td><input type="text" name="DB" id="hrg_DB" onchange="hitungDB()" value="{{ $datacolos->hrg }}"class="form-control form-control-user"></td>
                        @endforeach
                        <td align="center">=</td>
                        </td>
                        <td>
                            <input type="text" id="hasilDB" class="form-control form-control-user" readonly value="0">
                            <script>
                            function hitungDB(){
                                let DB = document.getElementById('tintaDB').value;
                                let tinggi=26;
                                let harga=document.getElementById('hrg_DB').value;
                                let pembagian=2;
                                let penjumlahanDB = parseInt((DB / tinggi)*harga*pembagian);
                                document.getElementById('hasilDB').value=penjumlahanDB;
                            }
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td>RD <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="RD" autocomplete="off" value="0" id="tintaRD" onchange="hitungRD()"  placeholder="Masukan Nilai RD..." class="form-control form-control-user" autofocus>
                        </td>
                        @foreach($datacoloRD as $datacolosRD)
                        <td><input type="text" name="RD" id="hrg_RD" onchange="hitungRD()" value="{{ $datacolosRD->hrg }}"class="form-control form-control-user"></td>
                        @endforeach
                        <td align="center">=</td>
                        </td>
                        <td>
                            <input type="text" id="hasilRD" class="form-control form-control-user" readonly value="0">
                            <script>
                            function hitungRD(){
                                let RD = document.getElementById('tintaRD').value;
                                let tinggi=26;
                                let harga=document.getElementById('hrg_RD').value;
                                let pembagian=2;
                                let penjumlahanRD = parseInt((RD / tinggi)*harga*pembagian);
                                document.getElementById('hasilRD').value=penjumlahanRD;
                            }
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td>YK <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="YK" autocomplete="off" value="0" id="tintaYK" onchange = "hitungYK()"  placeholder="Masukan Nilai YK..." class="form-control form-control-user" autofocus>
                        </td>
                        @foreach($datacoloYK as $datacolosYK)
                        <td><input type="text" name="YK" id="hrg_YK" onchange="hitungYK()" value="{{ $datacolosYK->hrg }}" class="form-control form-control-user"></td>
                        @endforeach
                        <td align="center">=</td>
                        </td>
                        <td>
                            <input type="text" id="hasilYK" class="form-control form-control-user" readonly value="0">
                            <script>
                            function hitungYK(){
                                let YK = document.getElementById('tintaYK').value;
                                let tinggi=26;
                                let harga=document.getElementById('hrg_YK').value;
                                let pembagian=2;
                                let penjumlahanYK = parseInt((YK / tinggi)*harga*pembagian);
                                document.getElementById('hasilYK').value=penjumlahanYK;
                            }
                            </script>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>WP <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="WP" id="tintaWP" value="0" onchange="hitungWP()" autocomplete="off" placeholder="Masukan Nilai WP..." class="form-control form-control-user" autofocus>
                          
                        </td>
                        @foreach($datacoloWP as $datacolosWP)
                        <td><input type="text" name="WP" id="hrg_WP" onchange="hitungWP()" value="{{ $datacolosWP->hrg }}" class="form-control form-control-user"></td>  
                        @endforeach
                        <td align="center">=</td>
                    </td>
                    <td>
                        <input type="text" id="hasilWP" class="form-control form-control-user" readonly value="0">
                        <script>
                        function hitungWP(){
                            let WP = document.getElementById('tintaWP').value;
                            let tinggi=26;
                            let harga=document.getElementById('hrg_WP').value;
                            let pembagian=2;
                            let penjumlahanWP = parseInt((WP / tinggi)*harga*pembagian);
                            document.getElementById('hasilWP').value=penjumlahanWP;
                        }
                        </script>
                    </td>
                    </tr>
                    <tr>
                        <td>RV <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="RV"  value="0" id="tintaRV" onchange="hitungRV()"  autocomplete="off" placeholder="Masukan Nilai RV..." class="form-control form-control-user" autofocus>
                        </td>
                        @foreach($datacoloRV as $datacolosRV)
                        <td><input type="text" name="RV" id="hrg_RV" onchange="hitungRV()"  value="{{ $datacolosRV->hrg }}"class="form-control form-control-user"></td>
                        @endforeach
                        <td align="center">=</td>
                    </td>
                    <td>
                        <input type="text" id="hasilRV" class="form-control form-control-user" readonly value="0">
                        <script>
                        function hitungRV(){
                            let RV = document.getElementById('tintaRV').value;
                            let tinggi=26;
                            let harga=document.getElementById('hrg_RV').value;
                            let pembagian=2;
                            let penjumlahanRV = parseInt((RV / tinggi)*harga*pembagian);
                            document.getElementById('hasilRV').value=penjumlahanRV;
                        }
                        </script>
                    </td>
                    </tr>
                    <tr>
                        <td>HP <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="HP" autocomplete="off" value="0" id="tintaHP" onchange="hitungHP()"  placeholder="Masukan Nilai HP..." class="form-control form-control-user"  autofocus>
                        </td>
                        @foreach($datacoloHP as $datacolosHP )
                        <td><input type="text" name="HP" id="hrg_HP" value="{{ $datacolosHP->hrg }}" onchange="hitungHP()" class="form-control form-control-user"></td>  
                        @endforeach
                        <td align="center">=</td>
                    </td>
                    <td>
                        <input type="text" id="hasilHP" class="form-control form-control-user" readonly value="0">
                        <script>
                        function hitungHP(){
                            let HP = document.getElementById('tintaHP').value;
                            let tinggi=26;
                            let harga=document.getElementById('hrg_HP').value;
                            let pembagian=2;
                            let penjumlahanHP = parseInt((HP / tinggi)*harga*pembagian);
                            document.getElementById('hasilHP').value=penjumlahanHP;
                        }
                        </script>
                    </td>
                    </tr>
                    <tr>
                        <td>OS <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="OS" autocomplete="off" id="tintaOS" value="0" onchange="hitungOS()" placeholder="Masukan Nilai OS..." class="form-control form-control-user" autofocus>
                        </td>
                        @foreach($datacoloOS as $datacolosOS)
                        <td><input type="text" id="hrg_OS" onchange="hitungOS()" value="{{ $datacolosOS->hrg }}" name="OS" class="form-control form-control-user"></td>
                        @endforeach
                        <td align="center">=</td>
                    </td>
                    <td>
                        <input type="text" id="hasilOS" class="form-control form-control-user" readonly value="0">
                        <script>
                        function hitungOS(){
                            let OS = document.getElementById('tintaOS').value;
                            let tinggi=26;
                            let harga=document.getElementById('hrg_OS').value;
                            let pembagian=2;
                            let penjumlahanOS = parseInt((OS / tinggi)*harga*pembagian);
                            
                            document.getElementById('hasilOS').value=penjumlahanOS;
                        }
                        </script>
                    </td>
                    </tr>
                    <tr>
                        <td>YV <span class="text-danger" title="This field is required">*</span></td><td>:</td><td><input type="text" name="YV" id="tintaYV" onchange="hitungYV()" autocomplete="off" value="0" placeholder="Masukan Nilai YV..." class="form-control form-control-user">
                        </td>
                        @foreach($datacoloYV as $datacolosYV)
                        <td><input type="text" name="YV" id="hrg_YV" onchange="hitungYV()" value="{{ $datacolos->hrg }}" class="form-control form-control-user"></td>
                        @endforeach
                        <td align="center">=</td>
                    </td>
                    <td>
                        
                        <input type="text" id="hasilYV" class="form-control form-control-user" readonly value="0">
                        <script>
                        function hitungYV(){
                            let YV = document.getElementById('tintaYV').value;
                            let tinggi=26;
                            let harga=document.getElementById('hrg_YV').value;
                            let pembagian=2;
                            let penjumlahanYV = parseInt((YV / tinggi)*harga*pembagian);
                            
                            document.getElementById('hasilYV').value=penjumlahanYV;
                        }
                        </script>
                    </td>
                    </tr>
                </table>

                <!--end Form input data logistik-->
            </div>
            <div class="modal-footer">
                <table>
                    <tr>
                        <td align="center"> <label for="hasil"><b>Hasil:</b></label>
                        <input type="text" style="padding: 42px 28px;" size="395" id="hasil" name="hasil" class="form-control form-control-user" readonly></td>
                        <td><button type="button" class="btn btn-primary" style="padding: 35px 38px;" onclick="hitung()"><i class="fa fa-calculator"></i> Hitung</button></td></tr>
                <script>
                    function hitung(){
                        
                        let totalYD= parseInt(document.getElementById("hasilYD").value);
                        let totalPT= parseInt(document.getElementById("hasilPT").value);
                        let totalYE= parseInt(document.getElementById("hasilYE").value);
                        let totalGK= parseInt(document.getElementById("hasilGK").value);
                        let totalBO= parseInt(document.getElementById("hasilBO").value);
                        let totalBM= parseInt(document.getElementById("hasilBM").value);
                        let totalRE= parseInt(document.getElementById("hasilRE").value);
                        let totalDB= parseInt(document.getElementById("hasilDB").value);
                        let totalRD= parseInt(document.getElementById("hasilRD").value);
                        let totalYK= parseInt(document.getElementById("hasilYK").value);
                        let totalWP= parseInt(document.getElementById("hasilWP").value);
                        let totalRV= parseInt(document.getElementById("hasilRV").value);
                        let totalHP= parseInt(document.getElementById("hasilHP").value);
                        let totalOS= parseInt(document.getElementById("hasilOS").value);
                        let totalYV= parseInt(document.getElementById("hasilYV").value);
                        let TOTAL = totalYD+totalPT+totalYE+totalGK+totalBO+totalBM+totalRE+totalDB+totalRD+totalYK+totalWP+totalRV+totalHP+totalOS+totalYV;
                        document.getElementById("hasil").value=TOTAL.toLocaleString("id");
                    }
                    </script>
                </table>

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
