@extends('layouts.admin-layout.main')
@section('GestionPage')
<div class="pagetitle">
    <h1 class="fw-bold">Dashboard</h1>

</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <!-- Sales Card -->
                <div class="col-xxl-6 col-md-6">
                    <div class="card info-card product-card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filtre</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Aujourd'hui</a></li>
                                <li><a class="dropdown-item" href="#">Mois</a></li>
                                <li><a class="dropdown-item" href="#">Année</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Total d'entreprises</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                        <g clip-path="url(#clip0_2068_35211)">
                                            <path d="M21 0.03125L32 5.53125V17.7969L30 16.7969V7.76562L22 11.7656V15.7969L20 16.7969V11.7656L12 7.76562V11.3125L10 10.3125V5.53125L21 0.03125ZM21 10.0312L23.7656 8.64062L16.5312 4.5L13.2344 6.15625L21 10.0312ZM25.9219 7.57812L28.7656 6.15625L21 2.26562L18.6719 3.4375L25.9219 7.57812ZM18 17.7969L16 18.7969V18.7812L10 21.7812V28.8906L16 25.875V28.125L9 31.625L0 27.1094V16.5469L9 12.0469L18 16.5469V17.7969ZM8 28.8906V21.7812L2 18.7812V25.875L8 28.8906ZM9 20.0469L14.7656 17.1719L9 14.2812L3.23438 17.1719L9 20.0469ZM18 20.0312L25 16.5312L32 20.0312V28.2656L25 31.7656L18 28.2656V20.0312ZM24 29.0312V24.2656L20 22.2656V27.0312L24 29.0312ZM30 27.0312V22.2656L26 24.2656V29.0312L30 27.0312ZM25 22.5312L28.7656 20.6406L25 18.7656L21.2344 20.6406L25 22.5312Z" fill="#6D28D9" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_2068_35211">
                                                <rect width="32" height="32" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="ps-3">
                                    <h6>0</h6>
                                    <span class="text-success small pt-1 fw-bold">12%</span>
                                    <span class="text-muted small pt-2 ps-1">augmentation</span>
                                </div>
                            </div>
                        </div>


                    </div>
                </div><!-- End Sales Card -->
                <!-- Sales Card -->
                <div class="col-xxl-6 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>

                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Nombre de sous admin</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                     <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>0</h6>
                                    <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">augmentation</span>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->



            </div>
        </div>
        <!-- Reports -->
        <div class="col-lg-12">
            <div class="card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>
                        <li><a class="dropdown-item" href="#">Janvier</a></li>
                        <li><a class="dropdown-item" href="#">Fevrier</a></li>
                        <li><a class="dropdown-item" href="#">Mars</a></li>
                        <li><a class="dropdown-item" href="#">Avril</a></li>
                        <li><a class="dropdown-item" href="#">Mai</a></li>
                        <li><a class="dropdown-item" href="#">Juin</a></li>
                        <li><a class="dropdown-item" href="#">Juillet</a></li>
                        <li><a class="dropdown-item" href="#">Aout</a></li>
                        <li><a class="dropdown-item" href="#">Spetembre</a></li>
                        <li><a class="dropdown-item" href="#">Octobre</a></li>
                        <li><a class="dropdown-item" href="#">Novembre</a></li>
                        <li><a class="dropdown-item" href="#">Decembre</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Reports </h5>

                    <!-- Line Chart -->
                    <div id="reportsChart"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#reportsChart"), {
                                series: [{
                                    name: 'Chiffre d\'affaire'
                                    , data: [15, 18, 32, 18, 30, 24, 11]
                                }]
                                , chart: {
                                    height: 350
                                    , type: 'area'
                                    , toolbar: {
                                        show: false
                                    }
                                , }
                                , markers: {
                                    size: 4
                                }
                                , colors: ['#2eca6a']
                                , fill: {
                                    type: "gradient"
                                    , gradient: {
                                        shadeIntensity: 1
                                        , opacityFrom: 0.3
                                        , opacityTo: 0.8
                                        , stops: [0, 90, 100]
                                    }
                                }
                                , dataLabels: {
                                    enabled: false
                                }
                                , stroke: {
                                    curve: 'smooth'
                                    , width: 2
                                }
                                , xaxis: {
                                    type: 'month'
                                    , categories: ["janvier", "fevrier"
                                        , "mars", "avril"
                                        , "mai", "juin"
                                        , "juillet"
                                    ]
                                }
                                , tooltip: {
                                    x: {
                                        format: 'dd/MM/yy'
                                    }
                                , }
                            }).render();
                        });

                    </script>
                    <!-- End Line Chart -->

                </div>

            </div>

        </div><!-- End Reports -->



    </div>

</section>

<!-- End #main -->
@endsection
