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
                        <button id="button-add" class="btn btn-primary">Add Data</button>
                        <h4>Filter</h4>
                        <div style="display: block ruby;">
                            <div class="col-md-3 controls">
                                <select class="form-control" tabindex="1" id="filter_stat" data-placeholder="Select here.." class="span15" onChange="tab();">
                                    <option value="all">Semua Ticket</option>
                                    <option value="open">Open Ticket</option>
                                    <option value="onprogres">Onprogres Ticket</option>
                                    <option value="close">Close Ticket</option>
                                </select>
                            </div>
                            <div class="col-md-2 controls">
                                <select class="form-control" tabindex="1" id="filter_M" data-placeholder="Select here.." class="span15" onChange="tab();">
                                    <option value="0">January</option>
                                    <option value="1">Febuary</option>
                                    <option value="2">March</option>
                                    <option value="3">April</option>
                                    <option value="4">May</option>
                                    <option value="5">June</option>
                                    <option value="6">July</option>
                                    <option value="7">August</option>
                                    <option value="8">September</option>
                                    <option value="9">October</option>
                                    <option value="10">November</option>
                                    <option value="11">December</option>
                                </select>
                            </div>
                            <div class="col-md-2 controls">
                                <select class="form-control" tabindex="1" id="filter_Y" data-placeholder="Select here.." class="span15" onChange="tab();">
                                    <option value="2030">2030</option>
                                    <option value="2029">2029</option>
                                    <option value="2028">2028</option>
                                    <option value="2027">2027</option>
                                    <option value="2026">2026</option>
                                    <option value="2025">2025</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                </select>
                            </div>
                        </div>
                        </br>
                        <table id="users-table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No Ticket</th>
                                    <th>Nama Komputer</th>
                                    <th>Masalah</th>
                                    <th>Nama Teknisi</th>
                                    <th>Status</th>
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

<!-- Modal ruangan -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none ;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" role="form" id="form-add" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input class="form-control" type="text" name="id" id="id" hidden>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="control-group">
                                <label class="control-label">Nomer Ticket</label>
                                <div class="controls">
                                    <input class="form-control" type="text" name="id_ticket" id="id_ticket" placeholder="Type something here..." class="span15">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group">
                                <label class="control-label">Nama Komputer</label>
                                <div class="controls">
                                    <!-- <input class="form-control" type="text" id="nama_komp" placeholder="Type something here..." class="span15"> -->
                                    <select class="form-control" tabindex="1" name="nama_komp" id="nama_komp" class="span15">
                                        <option value="#" selected>Select here..</option>
                                        @foreach($komputer as $komputer)
                                        <option value="{{$komputer->id_komp}}">{{$komputer->nama_komp}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group">
                                <label class="control-label">IP Komputer</label>
                                <div class="controls">
                                    <input class="form-control" type="text" name="ip" id="ip" placeholder="Type something here..." class="span15">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group">
                                <label class="control-label">Masalah</label>
                                <div class="controls">
                                    <select class="form-control" tabindex="1" name="problem" id="problem" class="span15">
                                        <option value="#" selected>Select here..</option>
                                        @foreach($kerusakan as $kerusakan)
                                        <option value="{{$kerusakan->jenis_kerusakan}}">{{$kerusakan->jenis_kerusakan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="control-group">
                                <label class="control-label">Masalah</label>
                                <div class="controls">
                                    <textarea class="form-control" type="text" name="note" id="note" placeholder="Type something here..." class="span15"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group">
                                <label class="control-label">Resolution</label>
                                <div class="controls">
                                    <input class="form-control" type="text" name="resolution" id="resolution" placeholder="Type something here..." class="span15">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="control-group">
                                <label class="control-label">Feedback</label>
                                <div class="controls">
                                    <input class="form-control" type="text" name="feedback" id="feedback" placeholder="Type something here..." class="span15">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="control-group">
                                <label class="control-label">Status</label>
                                <div class="controls">
                                    <select class="form-control" tabindex="1" name="status" id="status" class="span15">
                                        <option value="#" selected>Select here..</option>
                                        <option value="open">Open</option>
                                        <option value="onprogres">Onprogres</option>
                                        <option value="close">Close</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('form-add').reset();">Close</button>
                <button id="in" type="button" class="btn btn-primary">Save changes</button>
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
    $(document).ready(function() {
        var d = new Date();
        $('#filter_M').val(d.getMonth()).attr('selected', 'selected');
        $('#filter_Y').val(d.getFullYear()).attr('selected', 'selected');
        tab();
    });

    function tab() {
        var oTable = $('#users-table').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            "columnDefs": [{
                "className": "text-center",
                "targets": [0, 1, 2, 3, 4, 5], // table ke 1
            }],
            ajax: {
                url: '/json_ticket/' + $('#filter_stat').val() + '/' + $('#filter_M').val() + '/' + $('#filter_Y').val()
            },

            columns: [{
                    data: 'id_ticket',
                    name: 'id_ticket'
                },
                {
                    data: 'nama_komp',
                    name: 'nama_komp'
                },
                {
                    data: 'problem',
                    name: 'problem'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'aksi',
                    name: 'aksi'
                }
            ],
        });
    };
    //add data
    $(document).on('click', '#button-add', function() {
        $.ajax({
            type: 'POST',
            url: 'search_ticket',
            data: {
                '_token': "{{ csrf_token() }}",
            },
            success: function(data) {

                //isi form
                $('#id_ticket').val(data);


                //$('.modal-title').text('Rincian Data');
                $("#in").removeClass("btn btn-primary update");
                $("#in").addClass("btn btn-primary add");
                $('#in').text('Save');
                $('#myModal').modal('show');

            },
        });

    });
    //get ip pc
    $(document).on('change', '#nama_komp', function() {
        $.ajax({
            type: 'POST',
            url: 'get_ip',
            data: {
                '_token': "{{ csrf_token() }}",
                'id': $('#nama_komp').val()
            },
            success: function(data) {
                //console.log(data);

                //isi form
                $('#ip').val(data.ip);

            },
        });

    });
    //store data
    $('.modal-footer').on('click', '.add', function() {
        var form = document.getElementById("form-add");
        var fd = new FormData(form);
        $.ajax({
            type: 'POST',
            url: '{{ url("create_ticket") }}',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#myModal').modal('hide');
                document.getElementById("form-add").reset();
                location.reload();

            },
        });
    });
    //end add
    //edit data
    $(document).on('click', '#edit', function(e) {
        e.preventDefault();
        var uid = $(this).data('id');

        $.ajax({
            type: 'POST',
            url: 'edit_ticket',
            data: {
                '_token': "{{ csrf_token() }}",
                'id': uid,
            },
            success: function(data) {
                //console.log(data);

                //isi form
                $('#id').val(data.id_ticket);
                $('#id_ticket').val(data.id_ticket);
                $('#resolution').val(data.resolution);
                $('#nama_komp').val(data.nama_komp);
                $('#ip').val(data.ip);
                $('#problem').val(data.problem);
                $('#feedback').val(data.feedback);
                $('#status').val(data.status);

                id = $('#id').val();

                $('.modal-title').text('Rincian Data');
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
            url: 'update_ruangan/' + id,
            data: {
                '_token': "{{ csrf_token() }}",
                'nama_ruangan': $('#nama_ruangan').val(),

            },
            success: function(data) {
                document.getElementById("form-add").reset();
                $('#users-table').DataTable().ajax.reload();
            }
        });
    });
    //end update
</script>

@endsection