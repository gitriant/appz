@extends('v_index')


@section('konten')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">{{$judul}}</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <a id="add"><button style="background-color: coral;border-color:coral;" class="btn btn-primary">Tambah Data</button></a>
            <table id="users-table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis Kerusakan</th>
                  <th style="width: 20%;">Aksi</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal kerusakan -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none ;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" id="form-add">
          {{ csrf_field() }}
          <input class="form-control" type="text" name="id" id="id" hidden>
          <div class="control-group">
            <label class="control-label">Jenis kerusakan</label>
            <div class="controls">
              <input class="form-control" type="text" id="jenis_kerusakan" placeholder="Type something here..." class="span15">
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('form-add').reset();">Close</button>
        <button id="in" type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>



<!--   Core JS Files   -->

<!--   Core JS Files   -->
<script src="/assets/jquery-3.5.1.js"></script>
<script src="/assets/js/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/js/datatables/dataTables.bootstrap4.min.js"></script>
<script src="/assets/js/datatables/dataTables.responsive.min.js"></script>
<script src="/assets/js/datatables/responsive.bootstrap4.min.js"></script>
<script src="/assets/js/core/jquery.min.js"> </script>
<script src="/assets/js/core/popper.min.js"></script>
<!-- <script src="/assets/js/core/bootstrap-material-design.min.js"></script> -->
<script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Plugin for the momentJs  -->
<script src="../assets/js/plugins/moment.min.js"></script>
<!--  Plugin for Sweet Alert -->
<script src="../assets/js/plugins/sweetalert2.js"></script>
<!-- Forms Validations Plugin -->
<script src="../assets/js/plugins/jquery.validate.min.js"></script>
<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
<script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="../assets/js/plugins/fullcalendar.min.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="../assets/js/plugins/jquery-jvectormap.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js"></script>
<!-- Library for adding dinamically elements -->
<script src="../assets/js/plugins/arrive.min.js"></script>
<!-- Chartist JS -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/material-dashboard.js" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/demo/demo.js"></script>
<script>
  $(function() {
    var oTable = $('#users-table').DataTable({
      processing: true,
      serverSide: true,
      "columnDefs": [{
        "className": "text-center",
        "targets": [0, 1, 2, ], // table ke 1
      }],
      ajax: {
        url: '{{ url("json_kerusakan") }}'
      },
      "fnCreatedRow": function(row, data, index) {
        $('td', row).eq(0).html(index + 1);
      },
      columns: [{
          data: 'id_kerusakan',
          name: 'id_kerusakan'
        },
        {
          data: 'jenis_kerusakan',
          name: 'jenis_kerusakan'
        },
        {
          data: 'aksi',
          name: 'aksi'
        }
      ],
    });
  });
  //add data
  $(document).on('click', '#add', function() {
    $('.modal-title').text('Tambah Data');
    $("#in").removeClass("btn btn-primary update");
    $("#in").addClass("btn btn-primary add");
    $('#in').text('Save');
    document.getElementById("form-add").reset();
    $('#myModal').modal('show');
  });
  $('.modal-footer').on('click', '.add', function() {
    $.ajax({
      type: 'POST',
      url: '{{ url("store_kerusakan") }}',
      data: {
        '_token': $('input[name=_token]').val(),
        'jenis_kerusakan': $('#jenis_kerusakan').val(),

      },
      success: function(data) {
        document.getElementById("form-add").reset();
        $('#users-table').DataTable().ajax.reload();

      },
    });
  });
  //end add data
  //edit data
  $(document).on('click', '#edit', function(e) {
    e.preventDefault();
    var uid = $(this).data('id');

    $.ajax({
      type: 'POST',
      url: 'edit_kerusakan',
      data: {
        '_token': $('input[name=_token]').val(),
        'id': uid,
      },
      success: function(data) {
        //console.log(data);

        //isi form
        $('#id').val(data.id_kerusakan);
        $('#jenis_kerusakan').val(data.jenis_kerusakan);

        id = $('#id').val();

        $('.modal-title').text('Edit Data');
        $("#in").removeClass("btn btn-primary add");
        $("#in").addClass("btn btn-primary update");
        $('#in').text('Update');
        $('#myModal').modal('show');

      },
    });

  });
  //end edit
  //update
  $('.modal-footer').on('click', '.update', function() {
    $.ajax({
      type: 'PUT',
      url: 'update_kerusakan/' + id,
      data: {
        '_token': $('input[name=_token]').val(),
        'jenis_kerusakan': $('#jenis_kerusakan').val(),

      },
      success: function(data) {
        document.getElementById("form-add").reset();
        $('#users-table').DataTable().ajax.reload();
      }
    });
  });
  //end update
  //delete

  $(document).on('click', '#delete', function(e) {
    e.preventDefault();
    if (confirm('Yakin akan menghapus data ini?')) {
      // alert("Thank you for subscribing!" + $(this).data('id') );

      $.ajax({
        type: 'DELETE',
        url: 'delete_kerusakan/' + $(this).data('id'),
        data: {
          '_token': $('input[name=_token]').val(),
        },
        success: function(data) {
          alert("Data Berhasil Dihapus");
          $('#users-table').DataTable().ajax.reload();
        }
      });

    } else {
      return false;
    }
  });
</script>

@endsection