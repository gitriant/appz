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
                  <th>Nama Komputer</th>
                  <th>Ruangan</th>
                  <th>Status</th>
                  <th>Keterangan</th>
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

<!-- Modal komputer -->
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
          <input class="form-control" type="text" name="id-spe" id="id-spe" hidden>
          <div class="row">
            <div class="col-md-6">
              <div class="control-group">
                <label class="control-label">Nama Komputer</label>
                <div class="controls">
                  <input class="form-control" type="text" id="nama_komp" placeholder="Type something here..." class="span15">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="control-group">
                <label class="control-label">IP Address</label>
                <div class="controls">
                  <input class="form-control" type="text" id="ip" placeholder="xxx.xxx.xxx.xxx" class="span15">
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="control-group">
                <label class="control-label">MAC Address</label>
                <div class="controls">
                  <input class="form-control" type="text" id="mac" placeholder="xx:xx:xx:xx:xx:xx" class="span15">
                </div>
              </div>
            </div>
            <div class="col-md-7">
              <div class="control-group">
                <label class="control-label">Pengguna</label>
                <div class="controls">
                  <input class="form-control" type="text" id="user" placeholder="Pengguna komputer" class="span15">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="control-group">
                <label class="control-label">Email Pengguna</label>
                <div class="controls">
                  <input class="form-control" type="text" id="email" placeholder="Email" class="span15">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="control-group">
                <label class="control-label">Ruangan</label>
                <div class="controls">
                  <select class="form-control" tabindex="1" id="id_ruangan" data-placeholder="Select here.." class="span15">
                    <option value="">Pilih Ruangan</option>
                    @foreach($ruangan as $rua)
                    <option value="{{$rua->id_ruangan}}">{{$rua->nama_ruangan}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="control-group">
                <label class="control-label">Procesor</label>
                <div class="controls">
                  <input class="form-control" type="text" id="procesor" placeholder="Procesor" class="span15">
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="control-group">
                <label class="control-label">RAM</label>
                <div class="controls">
                  <input class="form-control" type="text" id="ram" placeholder="RAM" class="span15">
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="control-group">
                <label class="control-label">Hardisk</label>
                <div class="controls">
                  <input class="form-control" type="text" id="hardisk" placeholder="Hardisk" class="span15">
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="control-group">
                <label class="control-label">SSD</label>
                <div class="controls">
                  <input class="form-control" type="text" id="ssd" placeholder="SSD" class="span15">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="control-group">
                <label class="control-label">Keyboard</label>
                <div class="controls">
                  <input class="form-control" type="text" id="keyboard" placeholder="Jenis Keyboard-SN" class="span15">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="control-group">
                <label class="control-label">Monitor</label>
                <div class="controls">
                  <input class="form-control" type="text" id="monitor" placeholder="Jenis Monitor-SN" class="span15">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="control-group">
                <label class="control-label">Mouse</label>
                <div class="controls">
                  <input class="form-control" type="text" id="mouse" placeholder="Jenis Mouse-SN" class="span15">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="control-group">
                <label class="control-label">CPU</label>
                <div class="controls">
                  <input class="form-control" type="text" id="cpu" placeholder="Jenis CPU-SN" class="span15">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="control-group">
                <label class="control-label">Tahun Pembuatan</label>
                <div class="controls">
                  <input class="form-control" type="text" id="tahun" placeholder="Tahun Pembuatan" class="span15">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="control-group">
                <label class="control-label">Status</label>
                <div class="controls">
                  <select class="form-control" tabindex="1" id="status" data-placeholder="Select here.." class="span15">
                    <option value="">Select here..</option>
                    <option value="aktif">Aktif</option>
                    <option value="peminjaman">Peminjaman</option>
                    <option value="perbaikan">Perbaikan</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Keterangan</label>
            <div class="controls">
              <input class="form-control" type="text" id="keterangan" placeholder="Keterangan Komputer" class="span15">
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
<script src="/assets/jquery-3.5.1.js"></script>
<script src="/assets/js/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/js/datatables/dataTables.bootstrap4.min.js"></script>
<script src="/assets/js/datatables/dataTables.responsive.min.js"></script>
<script src="/assets/js/datatables/responsive.bootstrap4.min.js"></script>
<script src="/assets/js/core/jquery.min.js"> </script>
<script src="/assets/js/core/popper.min.js"></script>
<script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Plugin for the momentJs  -->
<script src="/assets/js/plugins/moment.min.js"></script>
<!--  Plugin for Sweet Alert -->
<script src="/assets/js/plugins/sweetalert2.js"></script>
<!-- Forms Validations Plugin -->
<script src="/assets/js/plugins/jquery.validate.min.js"></script>
<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="/assets/js/plugins/bootstrap-selectpicker.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
<script src="/assets/js/plugins/jquery.dataTables.min.js"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="/assets/js/plugins/bootstrap-tagsinput.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="/assets/js/plugins/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="/assets/js/plugins/fullcalendar.min.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="/assets/js/plugins/jquery-jvectormap.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="/assets/js/plugins/nouislider.min.js"></script>
<!-- Library for adding dinamically elements -->
<script src="/assets/js/plugins/arrive.min.js"></script>
<!-- Chartist JS -->
<script src="/assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="/assets/js/material-dashboard.js" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="/assets/demo/demo.js"></script>
<script>
  $(function() {
    var oTable = $('#users-table').DataTable({
      processing: true,
      serverSide: true,
      "columnDefs": [{
        "className": "text-center",
        "targets": [0, 1, 2, 3, 4, 5], // table ke 1
      }],
      ajax: {
        url: '{{ url("json_komputer") }}'
      },
      "fnCreatedRow": function(row, data, index) {
        $('td', row).eq(0).html(index + 1);
      },
      columns: [{
          data: 'id_komp',
          name: 'id_komp'
        },
        {
          data: 'nama_komp',
          name: 'nama_komp'
        },
        {
          data: 'nama_ruangan',
          name: 'nama_ruangan'
        },
        {
          data: 'status_komp',
          name: 'status'
        },
        {
          data: 'keterangan',
          name: 'keterangan'
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
      url: '{{ url("store_komputer") }}',
      data: {
        '_token': $('input[name=_token]').val(),
        'nama_komp': $('#nama_komp').val(),
        'ip': $('#ip').val(),
        'mac': $('#mac').val(),
        'user': $('#user').val(),
        'email': $('#email').val(),
        'id_ruangan': $("#id_ruangan option:selected").val(),
        'procesor': $('#procesor').val(),
        'ram': $('#ram').val(),
        'hardisk': $('#hardisk').val(),
        'ssd': $('#ssd').val(),
        'keyboard': $('#keyboard').val(),
        'monitor': $('#monitor').val(),
        'mouse': $('#mouse').val(),
        'cpu': $('#cpu').val(),
        'tahun': $('#tahun').val(),
        'keterangan': $('#keterangan').val(),
        'status': $("#status option:selected").val(),

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
      url: 'edit_komputer',
      data: {
        '_token': $('input[name=_token]').val(),
        'id': uid,
      },
      success: function(data) {
        //console.log(data);

        //isi form
        $('#id').val(data.id_komp);
        $('#id-spe').val(data.id_spesifikasi);
        $('#nama_komp').val(data.nama_komp);
        $('#ip').val(data.ip);
        $('#mac').val(data.mac);
        $('#user').val(data.user);
        $('#email').val(data.email);
        $('#id_ruangan').val(data.id_ruangan).attr('selected', 'selected');
        $('#procesor').val(data.procesor);
        $('#ram').val(data.ram);
        $('#hardisk').val(data.hardisk);
        $('#ssd').val(data.ssd);
        $('#keyboard').val(data.keyboard);
        $('#monitor').val(data.monitor);
        $('#mouse').val(data.mouse);
        $('#cpu').val(data.cpu);
        $('#tahun').val(data.tahun);
        $('#keterangan').val(data.keterangan);
        $('#status').val(data.status_komp).attr('selected', 'selected');
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
      url: 'update_komputer/' + id,
      data: {
        '_token': $('input[name=_token]').val(),
        'id_spesifikasi': $('#id-spe').val(),
        'nama_komp': $('#nama_komp').val(),
        'ip': $('#ip').val(),
        'mac': $('#mac').val(),
        'user': $('#user').val(),
        'email': $('#email').val(),
        'id_ruangan': $("#id_ruangan option:selected").val(),
        'procesor': $('#procesor').val(),
        'ram': $('#ram').val(),
        'hardisk': $('#hardisk').val(),
        'ssd': $('#ssd').val(),
        'keyboard': $('#keyboard').val(),
        'monitor': $('#monitor').val(),
        'mouse': $('#mouse').val(),
        'cpu': $('#cpu').val(),
        'tahun': $('#tahun').val(),
        'keterangan': $('#keterangan').val(),
        'status': $("#status option:selected").val(),
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
        url: 'delete_komputer/' + $(this).data('id') + '/' + $(this).data('idspe'),
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