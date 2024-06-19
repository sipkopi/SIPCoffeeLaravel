@extends('layout.body')
@section('konten')


<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/css/pages/cards-advance.css" />
<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/apex-charts/apex-charts.css" />


<div class="row">
                <!-- Website Analytics -->


                <?php $jmlh_akun = 0 ?>
                @foreach ($t_akun as $item)
                    <?php $jmlh_akun = $jmlh_akun + 1 ?>
                @endforeach
            
            
                <?php $jmlh_lahan = 0 ?>
                @foreach ($t_lahan as $item)
                    <?php $jmlh_lahan = $jmlh_lahan + 1 ?>
                @endforeach

                <?php $jmlh_pere = 0 ?>
                @foreach ($t_pere as $item)
                    <?php $jmlh_pere = $jmlh_pere + 1 ?>
                @endforeach


                <?php $jmlh_kopi = 0 ?>
                @foreach ($t_kopi as $item)
                    <?php $jmlh_kopi = $jmlh_kopi + 1 ?>
                @endforeach


<!-- Subscriber Gained -->
<div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card">
                    <div class="card-body pb-0">
                      <div class="card-icon mb-2">
                        <div class="d-flex">
                           <span class="badge me-3 bg-label-primary rounded-pill p-3">
                          <i class="ti ti-users ti-sm"></i>
                        </span>
                        <h3 class="card-title mb-0 mt-2">{{$jmlh_akun}}</h3>
                        </div>

                      </div>
                      <h5 >Total Akun User</h5>
                    </div>
                    <div id="subscriberGained"></div>
                  </div>
                </div>

                <!-- Quarterly Sales -->
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card">
                    <div class="card-body pb-0">
                      <div class="card-icon mb-2">
                        <div class="d-flex">
                          <span class="badge me-3 bg-label-danger rounded-pill p-3">
                            <i class="ti ti-shopping-cart ti-sm"></i>
                          </span>
                          <h3 class="card-title mb-0 mt-2">{{$jmlh_kopi}}</h3>
                        </div>
                      </div>
                      <h5>Total Produk Kopi</h5>
                    </div>
                    <div id="quarterlySales"></div>
                  </div>
                </div>

                <!-- Order Received -->
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card">
                    <div class="card-body pb-0">
                      <div class="card-icon mb-2">
                        <div class="d-flex">
                          <span class="badge me-3 bg-label-warning rounded-pill p-3">
                            <i class="ti ti-package ti-sm"></i>
                          </span>
                          <h3 class="card-title mb-0 mt-2">{{$jmlh_pere}}</h3>
                        </div>
                      </div>
                      <h5>Total Peremajaan</h5>
                    </div>
                    <div id="orderReceived"></div>
                  </div>
                </div>

                <!-- Revenue Generated -->
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card">
                    <div class="card-body pb-0">
                      <div class="card-icon mb-2">
                        <div class="d-flex">
                          <span class="badge me-3 bg-label-success rounded-pill p-3">
                            <i class="ti ti-credit-card ti-sm"></i>
                          </span>
                          <h3 class="card-title mb-0 mt-2">{{$jmlh_lahan}}</h3>
                        </div>
                      </div>
                      <h5 >Total Lahan</h5>
                    </div>
                    <div id="revenueGenerated"></div>
                  </div>
                </div>

                                  <!-- View sales -->
                                  <div class="col-lg-12">
                                    <div class="card">
                                      <div class="d-flex align-items-center justify-conten-center row">
                                        <div class="col-7">
                                          <div class="card-body text-nowrap">
                                            <h5 class="card-title mb-3 mt-2">SIP-Kopi 🎉</h5>
                                            <!-- <p class="mb-2">Best seller of the month</p> -->
                                            <h4 class="text-primary mb-4">"Mempermudah petani kopi adalah urusan kami"</h4>
                                            <a href="https://sip-kopi.gitbook.io/sip-kopi/" class="btn btn-primary">Selengkapnya</a>
                                          </div>
                                        </div>
                                        <div class="col-5 text-center text-sm-left">
                                          {{-- <div class="card-body pb-0 px-0 px-md-4"> --}}
                                            <img 
                                              src="{{asset('assetsadmin')}}/img/logo2.png"
                                              alt="view sales" />
                                          {{-- </div> --}}
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- View sales -->

</div>

    <!-- Vendors JS -->
    <script src="{{asset('assetsadmin')}}/vendor/libs/apex-charts/apexcharts.js"></script>
   
    <!-- Page CSS -->
<script src="{{asset('assetsadmin')}}/js/cards-statistics.js"></script>



@endsection