<div>
    <div class="page-wrapper">
        <div class="page-content">
            @if (auth()->guard('admin')->user()->id == 1)
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                    <div class="col">
                        <div class="card radius-10 border-start border-0 border-4 border-info">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">Total Branch</p>
                                        <h4 class="my-1 text-info">{{ $branch }}</h4>

                                    </div>
                                    <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                            class='bx bxs-cart'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 border-start border-0 border-4 border-danger">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">Total Revenue</p>
                                        <h4 class="my-1 text-danger">{{ $booking }}</h4>
                                    </div>
                                    <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto">
                                        <i class='bx bxs-wallet'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 border-start border-0 border-4 border-success">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">Total Order</p>
                                        <h4 class="my-1 text-success">{{ $total_order }}</h4>
                                    </div>
                                    <div
                                        class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                        <i class='bx bxs-bar-chart-alt-2'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 border-start border-0 border-4 border-warning">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">Total Staff</p>
                                        <h4 class="my-1 text-warning">{{ $total_staff }}</h4>
                                    </div>
                                    <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i
                                            class='bx bxs-group'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->

                <div class="row">

                    <div class="col-12 col-lg-7 col-xl-8 d-flex">

                        <div class="card radius-10 w-100">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0">Sales Overview</h6>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                            data-bs-toggle="dropdown"><i
                                                class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center ms-auto font-13 gap-2 mb-3">
                                    <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1"
                                            style="color: #14abef"></i>Sales</span>
                                    <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1"
                                            style="color: #ffc107"></i>Booking</span>
                                </div>
                                <div class="chart-container-1">
                                    <canvas id="chart1"></canvas>
                                </div>
                            </div>

                        </div>

                    </div>


                    <div class="col-12 col-lg-4 d-flex">
                        <div class="card radius-10 w-100">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0">Users</h6>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                            data-bs-toggle="dropdown"><i
                                                class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-container-2">
                                    <canvas id="chart2"></canvas>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                                    Consigner <span class="badge bg-success rounded-pill">{{ $total_consigner }}</span>
                                </li>
                                <li
                                    class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                                    Consignee <span class="badge bg-danger rounded-pill">{{ $total_consignee }}</span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div><!--end row-->
            @endif
        </div>
    </div>

    @push('scripts')
        @if (auth()->guard('admin')->user()->id == 1)
            <script>
                $(function() {
                    "use strict";


                    // chart 1

                    var ctx = document.getElementById("chart1").getContext('2d');

                    var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStroke1.addColorStop(0, '#6078ea');
                    gradientStroke1.addColorStop(1, '#17c5ea');

                    var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStroke2.addColorStop(0, '#ff8359');
                    gradientStroke2.addColorStop(1, '#ffdf40');

                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: <?php echo json_encode($month_names); ?>,
                            datasets: [{
                                label: 'Sales',
                                data: <?php echo json_encode($total_sale); ?>,
                                borderColor: gradientStroke1,
                                backgroundColor: gradientStroke1,
                                hoverBackgroundColor: gradientStroke1,
                                pointRadius: 0,
                                fill: false,
                                borderRadius: 20,
                                borderWidth: 0
                            }, {
                                label: 'Booking',
                                data: <?php echo json_encode($total_booking); ?>,
                                borderColor: gradientStroke2,
                                backgroundColor: gradientStroke2,
                                hoverBackgroundColor: gradientStroke2,
                                pointRadius: 0,
                                fill: false,
                                borderRadius: 20,
                                borderWidth: 0
                            }]
                        },

                        options: {
                            maintainAspectRatio: false,
                            barPercentage: 0.5,
                            categoryPercentage: 0.8,
                            plugins: {
                                legend: {
                                    display: false,
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });


                    // chart 2
                    var consigner = "{{ $total_consigner }}";
                    var consignee = "{{ $total_consignee }}";

                    var ctx = document.getElementById("chart2").getContext('2d');

                    var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStroke1.addColorStop(0, '#fc4a1a');
                    gradientStroke1.addColorStop(1, '#f7b733');

                    var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStroke2.addColorStop(0, '#4776e6');
                    gradientStroke2.addColorStop(1, '#8e54e9');


                    var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStroke3.addColorStop(0, '#ee0979');
                    gradientStroke3.addColorStop(1, '#ff6a00');

                    var gradientStroke4 = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStroke4.addColorStop(0, '#42e695');
                    gradientStroke4.addColorStop(1, '#3bb2b8');

                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: ["Consigner", "Consignee"],
                            datasets: [{
                                backgroundColor: [
                                    gradientStroke1,
                                    gradientStroke2,
                                    gradientStroke3,
                                    gradientStroke4
                                ],
                                hoverBackgroundColor: [
                                    gradientStroke1,
                                    gradientStroke2,
                                    gradientStroke3,
                                    gradientStroke4
                                ],
                                data: [consigner, consignee],
                                borderWidth: [1, 1]
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            cutout: 82,
                            plugins: {
                                legend: {
                                    display: false,
                                }
                            }

                        }
                    });



                    // worl map

                    jQuery('#geographic-map-2').vectorMap({
                        map: 'world_mill_en',
                        backgroundColor: 'transparent',
                        borderColor: '#818181',
                        borderOpacity: 0.25,
                        borderWidth: 1,
                        zoomOnScroll: false,
                        color: '#009efb',
                        regionStyle: {
                            initial: {
                                fill: '#541545'
                            }
                        },
                        markerStyle: {
                            initial: {
                                r: 9,
                                'fill': '#fff',
                                'fill-opacity': 1,
                                'stroke': '#000',
                                'stroke-width': 5,
                                'stroke-opacity': 0.4
                            },
                        },
                        enableZoom: true,
                        hoverColor: '#009efb',
                        markers: [{
                            latLng: [21.00, 78.00],
                            name: 'Lorem Ipsum Dollar'

                        }],
                        hoverOpacity: null,
                        normalizeFunction: 'linear',
                        scaleColors: ['#b6d6ff', '#005ace'],
                        selectedColor: '#c9dfaf',
                        selectedRegions: [],
                        showTooltip: true,
                    });


                    // chart 3

                    var ctx = document.getElementById('chart3').getContext('2d');

                    var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStroke1.addColorStop(0, '#00b09b');
                    gradientStroke1.addColorStop(1, '#96c93d');

                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                            datasets: [{
                                label: 'Facebook',
                                data: [5, 30, 16, 23, 8, 14, 2],
                                backgroundColor: [
                                    gradientStroke1
                                ],
                                fill: {
                                    target: 'origin',
                                    above: 'rgb(21 202 32 / 15%)', // Area will be red above the origin
                                    //below: 'rgb(21 202 32 / 100%)'   // And blue below the origin
                                },
                                tension: 0.4,
                                borderColor: [
                                    gradientStroke1
                                ],
                                borderWidth: 3
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false,
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });









                    // chart 5

                    var ctx = document.getElementById("chart5").getContext('2d');

                    var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStroke1.addColorStop(0, '#f54ea2');
                    gradientStroke1.addColorStop(1, '#ff7676');

                    var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStroke2.addColorStop(0, '#42e695');
                    gradientStroke2.addColorStop(1, '#3bb2b8');

                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: [1, 2, 3, 4, 5],
                            datasets: [{
                                label: 'Clothing',
                                data: [40, 30, 60, 35, 60],
                                borderColor: gradientStroke1,
                                backgroundColor: gradientStroke1,
                                hoverBackgroundColor: gradientStroke1,
                                pointRadius: 0,
                                fill: false,
                                borderWidth: 1
                            }, {
                                label: 'Electronic',
                                data: [50, 60, 40, 70, 35],
                                borderColor: gradientStroke2,
                                backgroundColor: gradientStroke2,
                                hoverBackgroundColor: gradientStroke2,
                                pointRadius: 0,
                                fill: false,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            barPercentage: 0.5,
                            categoryPercentage: 0.8,
                            plugins: {
                                legend: {
                                    display: false,
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    var ctx = document.getElementById('chart21').getContext('2d');

                    var gradientStroke = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStroke.addColorStop(0, '#ee0979');
                    gradientStroke.addColorStop(1, '#ff6a00');

                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                            datasets: [{
                                label: 'Sales',
                                data: [9, 7, 14, 10, 12, 8],
                                backgroundColor: gradientStroke,
                                hoverBackgroundColor: gradientStroke,
                                borderColor: "#fff",
                                pointRadius: 6,
                                pointHoverRadius: 6,
                                pointHoverBackgroundColor: "#fff",
                                borderWidth: 2,
                                borderRadius: 20,

                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            barPercentage: 0.5,
                            categoryPercentage: 0.7,
                            plugins: {
                                legend: {
                                    display: false,
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    var ctx = document.getElementById('chart55').getContext('2d');

                    var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStroke1.addColorStop(0, '#17ead9');
                    gradientStroke1.addColorStop(1, '#6078ea');

                    var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStroke2.addColorStop(0, '#f80759');
                    gradientStroke2.addColorStop(1, '#bc4e9c');

                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: [1, 2, 3, 4, 5, 6, 7, 8],
                            datasets: [{
                                label: 'Downloads',
                                data: [0, 30, 60, 25, 60, 25, 50, 0],
                                pointBorderWidth: 2,
                                pointBackgroundColor: 'transparent',
                                pointHoverBackgroundColor: gradientStroke1,
                                borderColor: gradientStroke1,
                                fill: {
                                    target: 'origin',
                                    above: gradientStroke1, // Area will be red above the origin
                                    //below: 'rgb(21 202 32 / 100%)'   // And blue below the origin
                                },
                                tension: 0.4,
                                borderWidth: 2
                            }, {
                                label: 'Earnings',
                                data: [0, 60, 25, 80, 35, 75, 30, 0],
                                pointBorderWidth: 2,
                                pointBackgroundColor: 'transparent',
                                pointHoverBackgroundColor: gradientStroke2,
                                borderColor: gradientStroke2,
                                fill: {
                                    target: 'origin',
                                    above: gradientStroke2, // Area will be red above the origin
                                    //below: 'rgb(21 202 32 / 100%)'   // And blue below the origin
                                },
                                tension: 0.4,
                                borderWidth: 2
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false,
                                }
                            },
                            tooltips: {
                                enabled: false
                            },
                            scales: {
                                xAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        fontColor: '#585757'
                                    },
                                    gridLines: {
                                        display: true,
                                        color: "rgba(0, 0, 0, 0.07)"
                                    },
                                }],
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        fontColor: '#585757'
                                    },
                                    gridLines: {
                                        display: true,
                                        color: "rgba(0, 0, 0, 0.07)"
                                    },
                                }]
                            }
                        }
                    });

                });
            </script>
        @endif
    @endpush
</div>
