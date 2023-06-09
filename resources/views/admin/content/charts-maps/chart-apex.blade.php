@extends('admin/layouts/contentLayoutMaster')

@section('title', 'Apex Charts')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
 <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
 <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <p>
      An Apexcharts.js component for ApexCharts. Read full documnetation
      <a href="https://apexcharts.com/docs/installation/" target="_blank">here</a>.
    </p>
  </div>
</div>
<!-- apex charts section start -->
<section id="apexchart">
  <div class="row">
    <!-- Area Chart starts -->
    <div class="col-12">
      <div class="card">
        <div
          class="card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start"
        >
          <div>
            <h4 class="card-title">Line Chart</h4>
            <span class="card-subtitle text-muted">Commercial networks</span>
          </div>
          <div class="d-flex align-items-center">
            <i class="font-medium-2" data-feather="calendar"></i>
            <input
              type="text"
              class="form-control flat-picker bg-transparent border-0 shadow-none"
              placeholder="YYYY-MM-DD"
            />
          </div>
        </div>
        <div class="card-body">
          <div id="line-area-chart"></div>
        </div>
      </div>
    </div>
    <!-- Area Chart ends -->

    <!-- Column Chart Starts -->
    <div class="col-12">
      <div class="card">
        <div
          class="card-header d-flex flex-md-row flex-column justify-content-md-between justify-content-start align-items-md-center align-items-start"
        >
          <h4 class="card-title">Data Science</h4>
          <div class="d-flex align-items-center mt-md-0 mt-1">
            <i class="font-medium-2" data-feather="calendar"></i>
            <input
              type="text"
              class="form-control flat-picker bg-transparent border-0 shadow-none"
              placeholder="YYYY-MM-DD"
            />
          </div>
        </div>
        <div class="card-body">
          <div id="column-chart"></div>
        </div>
      </div>
    </div>
    <!-- Column Chart Ends -->

    <!-- Scatter Chart Starts -->
    <div class="col-12">
      <div class="card">
        <div
          class="card-header d-flex flex-md-row flex-column justify-content-md-between justify-content-start align-items-md-center align-items-start"
        >
          <h4 class="card-title">New Technologies Data</h4>
          <div class="btn-group btn-group-toggle mt-md-0 mt-1" data-toggle="buttons">
            <label class="btn btn-outline-primary active">
              <input type="radio" name="radio_options" id="radio_option1" checked="" />
              <span>Daily</span>
            </label>
            <label class="btn btn-outline-primary">
              <input type="radio" name="radio_options" id="radio_option2" />
              <span>Monthly</span>
            </label>
            <label class="btn btn-outline-primary">
              <input type="radio" name="radio_options" id="radio_option3" />
              <span>Yearly</span>
            </label>
          </div>
        </div>
        <div class="card-body">
          <div id="scatter-chart"></div>
        </div>
      </div>
    </div>
    <!-- Scatter Chart Ends -->

    <!-- Line Chart Starts -->
    <div class="col-12">
      <div class="card">
        <div
          class="card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start"
        >
          <div>
            <h4 class="card-title mb-25">Balance</h4>
            <span class="card-subtitle text-muted">Commercial networks & enterprises</span>
          </div>
          <div class="d-flex align-items-center flex-wrap mt-sm-0 mt-1">
            <h5 class="font-weight-bolder mb-0 mr-1">$ 100,000</h5>
            <div class="badge badge-light-secondary">
              <i class="text-danger font-small-3" data-feather="arrow-down"></i>
              <span class="align-middle">20%</span>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div id="line-chart"></div>
        </div>
      </div>
    </div>
    <!-- Line Chart Ends -->

    <!-- Bar Chart Starts -->
    <div class="col-xl-6 col-12">
      <div class="card">
        <div
          class="card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start"
        >
          <div>
            <p class="card-subtitle text-muted mb-25">Balance</p>
            <h4 class="card-title font-weight-bolder">$74,382.72</h4>
          </div>
          <div class="d-flex align-items-center mt-md-0 mt-1">
            <i class="font-medium-2" data-feather="calendar"></i>
            <input
              type="text"
              class="form-control flat-picker bg-transparent border-0 shadow-none"
              placeholder="YYYY-MM-DD"
            />
          </div>
        </div>
        <div class="card-body">
          <div id="bar-chart"></div>
        </div>
      </div>
    </div>
    <!-- Bar Chart Ends -->

    <!-- Candlestick Chart Starts -->
    <div class="col-xl-6 col-12">
      <div class="card">
        <div
          class="card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start"
        >
          <div>
            <h4 class="card-title mb-50">Stock Prices</h4>
            <p class="mb-0">$50,863.98</p>
          </div>
          <div class="d-flex align-items-center mt-md-0 mt-1">
            <i class="font-medium-2" data-feather="calendar"></i>
            <input
              type="text"
              class="form-control flat-picker bg-transparent border-0 shadow-none"
              placeholder="YYYY-MM-DD"
            />
          </div>
        </div>
        <div class="card-body">
          <div id="candlestick-chart"></div>
        </div>
      </div>
    </div>
    <!-- Candlestick Chart Ends -->

    <!-- Heatmap Chart Starts -->
    <div class="col-xl-6 col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">Daily Sales States</h4>
          <div class="dropdown">
            <i
              data-feather="more-vertical"
              class="cursor-pointer"
              role="button"
              id="heat-chart-dd"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
            </i>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="heat-chart-dd">
              <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div id="heatmap-chart"></div>
        </div>
      </div>
    </div>
    <!-- Heatmap Chart Ends -->

    <!-- RadialBar Chart Starts -->
    <div class="col-xl-6 col-12">
      <div class="card">
        <div
          class="card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start"
        >
          <h4 class="card-title mb-sm-0 mb-1">Statistics</h4>
        </div>
        <div class="card-body">
          <div id="radialbar-chart"></div>
        </div>
      </div>
    </div>
    <!-- RadialBar Chart Ends -->

    <!-- Radial Chart Starts-->
    <div class="col-xl-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Mobile Comparison</h4>
        </div>
        <div class="card-body">
          <div id="radar-chart"></div>
        </div>
      </div>
    </div>
    <!-- Radial Chart Ends-->

    <!-- Donut Chart Starts-->
    <div class="col-xl-6 col-12">
      <div class="card">
        <div class="card-header flex-column align-items-start">
          <h4 class="card-title mb-75">Expense Ratio</h4>
          <span class="card-subtitle text-muted">Spending on various categories </span>
        </div>
        <div class="card-body">
          <div id="donut-chart"></div>
        </div>
      </div>
    </div>
    <!-- Donut Chart Ends-->
    <!-- Apex charts section end -->
  </div>
</section>
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/charts/chart-apex.js')) }}"></script>
@endsection
