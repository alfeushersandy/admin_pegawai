@extends('layouts.main')
@section('content')
        <!-- Begin Page Content -->
        <div class="container">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Karyawan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_karyawan }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Karyawan Aktif</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $karyawan_aktif }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                {{-- <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Karyawan Tidak Aktif</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $karyawan_tidak_aktif }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-times fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <!-- Pending Requests Card Example -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Karyawan Keluar</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $karyawan_keluar }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-walking fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                        
            </div>

            <!-- Content Row -->

            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            berdasarkan jabatan
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                        {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> --}}
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-pie me-1"></i>
                            Berdasarkan umur
                        </div>
                        <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                        {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> --}}
                    </div>
                </div>
            </div>
        

            

        </div>
        <!-- /.container-fluid -->

    
@endsection
@section('script')
<script>
    // / Bar Chart Example
var ctx = document.getElementById("myBarChart");

var myLineChart = new Chart(ctx, {
type: "bar",
data: {
labels: [
    "Direktur Utama",
    "Direktur",
    "General Manager",
    "Manager",
    "Supervisor",
    "Staff",
    "operasional",
],
datasets: [
    {
        label: "Jumlah Orang",
        backgroundColor: "rgba(2,117,216,1)",
        borderColor: "rgba(2,117,216,1)",
        data: [ JSON.parse(`{{ $Direktur_Utama }}`), JSON.parse(`{{ $Direktur }}`), JSON.parse(`{{ $General_Manager }}`),JSON.parse(`{{ $Manager }}`), JSON.parse(`{{ $Supervisor }}`), JSON.parse(`{{ $Staff }}`), JSON.parse(`{{ $Operasional }}`)],
    },
],
},
options: {
scales: {
    xAxes: [
        {
            time: {
                unit: "month",
            },
            gridLines: {
                display: true,
            },
            ticks: {
                maxTicksLimit: 7,
            },
        },
    ],
    yAxes: [
        {
            ticks: {
                min: 0,
                max: 150,
                maxTicksLimit: 7,
            },
            gridLines: {
                display: true,
            },
        },
    ],
},
legend: {
    display: false,
},
},
});
</script>

<script>
    // Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
    type: "pie",
    data: {
        labels: ["18-25", "26-35", "36-45", "46-55", ">55"],
        datasets: [
            {
                data: [
                    JSON.parse(`{{ $_1825 }}`), JSON.parse(
                        `{{ $_2635 }}`
                    ),
                    JSON.parse(`{{ $_3645}}`), JSON.parse(
                        `{{ $_4655 }}`
                    ),
                    JSON.parse(`{{ $_55 }}`),
                ],
                backgroundColor: ["#007bff", "#dc3545", "#ffc107", "#28a745"],
            },
        ],
    },
});
</script>
@endsection