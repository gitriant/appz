@extends('v_index')


@section('konten')


<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
          <div class="card-icon">
            <i class="material-icons">content_copy</i>
          </div>
          <p class="card-category">Total Ticket</p>
          <h3 class="card-title">{{$ticket->total}}
          </h3>
        </div>
        <div class="card-footer">
          <div class="stats">
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
            <i class="material-icons">assignment_turned_in</i>
          </div>
          <p class="card-category">Close Ticket</p>
          <h3 class="card-title">{{$ticket->close}}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">update</i> View Ticket
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
            <i class="material-icons">info_outline</i>
          </div>
          <p class="card-category">Open Ticket</p>
          <h3 class="card-title">{{$ticket->open}}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">update</i> View Ticket
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-warning card-header-icon">
          <div class="card-icon">
            <i class="material-icons">schedule</i>
          </div>
          <p class="card-category">Pending Ticket</p>
          <h3 class="card-title">{{$ticket->onprogres}}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">update</i> View Ticket
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="card card-chart">
        <div class="card-header card-header-success">
          <!-- tempat isi chard -->
        </div>
        <div class="card-body">
          <h4 class="card-title">Daily Sales</h4>
          <p class="card-category">
            <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.
          </p>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">access_time</i> updated 4 minutes ago
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-chart">
        <div class="card-header card-header-warning">
          <!-- tempat isi chard -->
        </div>
        <div class="card-body">
          <h4 class="card-title">Email Subscriptions</h4>
          <p class="card-category">Last Campaign Performance</p>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">access_time</i> campaign sent 2 days ago
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-chart">
        <div class="card-header card-header-danger">
          <!-- tempat isi chard -->
        </div>
        <div class="card-body">
          <h4 class="card-title">Completed Tasks</h4>
          <p class="card-category">Last Campaign Performance</p>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">access_time</i> campaign sent 2 days ago
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 col-md-12">
      <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
              <span class="nav-tabs-title">Ticket:</span>
              <ul class="nav nav-tabs" data-tabs="tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#profile" data-toggle="tab">
                    <i class="material-icons">bug_report</i> Open
                    <div class="ripple-container"></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#messages" data-toggle="tab">
                    <i class="material-icons">code</i> Onprogres
                    <div class="ripple-container"></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#settings" data-toggle="tab">
                    <i class="material-icons">cloud</i> Close
                    <div class="ripple-container"></div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active" id="profile">
              <table class="table">
                <tbody>
                  @foreach($ticket_open as $open)
                  <tr>
                    <td>
                      <div class="form">
                        {{'#'.$open->id_ticket}}
                      </div>
                    </td>
                    <td>{{$open->problem}} - {{$open->nama_ruangan}}</td>
                    <!-- <td class="td-actions text-right">
                      <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                      </button>
                      <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                      </button>
                    </td> -->
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="tab-pane" id="messages">
              <table class="table">
                <tbody>
                  @foreach($ticket_onprogres as $onprogres)
                  <tr>
                    <td>
                      <div class="form">
                        {{'#'.$onprogres->id_ticket}}
                      </div>
                    </td>
                    <td>{{$onprogres->problem}} - {{$onprogres->nama_ruangan}}</td>
                    <td class="td-actions text-right">
                      <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <a href="/{{$onprogres->id_ticket}}/{{ Session::get('id_it')}}"><i class="material-icons">edit</i></a>
                      </button>
                      <!-- <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                      </button> -->
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="tab-pane" id="settings">
              <table class="table">
                <tbody>
                  @foreach($ticket_close as $close)
                  <tr>
                    <td>
                      <div class="form">
                        {{'#'.$close->id_ticket}}
                      </div>
                    </td>
                    <td>{{$close->problem}} - {{$close->nama_ruangan}}</td>
                    <!-- <td class="td-actions text-right">
                      <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                      </button>
                      <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                      </button>
                    </td> -->
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-warning card-header-icon">
          <div class="card-icon">
            <i class="material-icons">schedule</i>
          </div>
          <p class="card-category">RATA-RATA LAMA PERBAIKAN</p>
          <h3 class="card-title">{{$ticket_avg}}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-warning  card-header-icon">
          <div class="card-icon">
            <i class="material-icons">star</i>
          </div>
          <p class="card-category">Rating</p>
          <h3 class="card-title">{{$rate}}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="/assets/dist/chart.min.js"></script>
<script src="/assets/utils.js"></script>
<script>
  var DATA_COUNT = 12;

  var utils = Samples.utils;

  utils.srand(110);

  function getLineColor(ctx) {
    return utils.color(ctx.datasetIndex);
  }

  function alternatePointStyles(ctx) {
    var index = ctx.dataIndex;
    return index % 2 === 0 ? 'circle' : 'rect';
  }

  function makeHalfAsOpaque(ctx) {
    return utils.transparentize(getLineColor(ctx));
  }

  function adjustRadiusBasedOnData(ctx) {
    var v = ctx.dataPoint.y;
    return v < 10 ? 5 :
      v < 25 ? 7 :
      v < 50 ? 9 :
      v < 75 ? 11 :
      15;
  }

  function generateData() {
    return utils.numbers({
      count: DATA_COUNT,
      min: 0,
      max: 100
    });
  }

  var data = {
    labels: utils.months({
      count: DATA_COUNT
    }),
    datasets: [{
      data: generateData()
    }]
  };

  var options = {
    plugins: {
      legend: false,
      tooltip: true,
    },
    elements: {
      line: {
        fill: false,
        backgroundColor: getLineColor,
        borderColor: getLineColor,
      },
      point: {
        backgroundColor: getLineColor,
        hoverBackgroundColor: makeHalfAsOpaque,
        radius: adjustRadiusBasedOnData,
        pointStyle: alternatePointStyles,
        hoverRadius: 15,
      }
    }
  };

  var chart = new Chart('chart-0', {
    type: 'line',
    data: data,
    options: options
  });


  // eslint-disable-next-line no-unused-vars
  function addDataset() {
    chart.data.datasets.push({
      data: generateData()
    });
    chart.update();
  }

  // eslint-disable-next-line no-unused-vars
  function randomize() {
    chart.data.datasets.forEach(function(dataset) {
      dataset.data = generateData();
    });
    chart.update();
  }

  // eslint-disable-next-line no-unused-vars
  function removeDataset() {
    chart.data.datasets.shift();
    chart.update();
  }
</script>
@endsection