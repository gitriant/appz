<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>IT BINUS BEKASI</title>
        <link
            rel="stylesheet"
            type="text/css"
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"
        />
        <script src="/js/a.js"></script>
        <script src="/assets/jquery-3.5.1.js"></script>
        <link rel="stylesheet" href="/css/bootstrap2.css" />
        <script src="/js/bootstrap.min.js"></script>
    </head>

    <body>
        @if (!empty($alert))
        <div class="alert alert-success">
            {{ $alert }}
        </div>
        <div style="margin-top: 30px; position: relative; text-align: center">
            <img src="/image/obeng.gif" width="300px" alt="" />
        </div>
        @else
        <div
            style="
                position: relative;
                width: 400px;
                margin: 0 auto;
                border-style: solid;
                border-color: burlywood;
                border-radius: 5px;
            "
        >
            <div class="momo" style="padding: 10px">
                <div
                    style="
                        height: 50px;
                        line-height: 50px;
                        text-align: center;
                        background-color: blueviolet;
                        border-radius: 5px;
                        font-size: 0.8cm;
                    "
                >
                    IT BINUS BEKASI
                </div>

                <form style="margin-top: 5px" id="form-add">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">ID TICKET</label>
                        <input
                            type="text"
                            class="form-control"
                            id="id_ticket"
                            value="{{$ticket->id_ticket}}"
                            disabled
                        />
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ruangan</label>
                        <input
                            type="text"
                            class="form-control"
                            id="ruangan"
                            value="{{$ticket->nama_ruangan}}"
                            disabled
                        />
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Masalah</label>
                        <input
                            type="text"
                            class="form-control"
                            id="problem"
                            value="{{$ticket->problem}}"
                            disabled
                        />
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1"
                            >Status Ticket</label
                        >
                        <select class="form-control" id="status">
                            <option>Select Here</option>
                            <option value="open">OPEN</option>
                            <option value="onprogres" selected>
                                On Progres
                            </option>
                            <option value="close">Close</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"
                            >Solution</label
                        >
                        <textarea
                            class="form-control"
                            id="resolution"
                            rows="3"
                        ></textarea>
                    </div>
                </form>
                <button
                    type="button"
                    class="btn btn-secondary"
                    onclick="document.getElementById('form-add').reset();"
                >
                    Close
                </button>
                <button
                    id="in"
                    type="button"
                    class="btn btn-primary"
                    data-dismiss="modal"
                >
                    Save changes
                </button>
            </div>
        </div>
        <div style="margin-top: 30px; position: relative; text-align: center">
            <img src="/image/pubg.gif" width="300px" alt="" />
        </div>
        @endif
    </body>
    <script>
        //update
        $("#status").on("change", function () {
            $.ajax({
                type: "POST",
                url: '{{ url("ustatus_ticket") }}',
                data: {
                    _token: "{{ csrf_token() }}",
                    id_ticket: $("#id_ticket").val(),
                    status: $("#status").val(),
                },
                success: function (data) {
                    console.log(data);
                    //isi form
                },
            });
        });
        //end update
        //add solution
        $(".momo").on("click", "#in", function () {
            $.ajax({
                type: "POST",
                url: '{{ url("solu_ticket") }}',
                data: {
                    _token: "{{ csrf_token() }}",
                    id_ticket: $("#id_ticket").val(),
                    status: $("#status").val(),
                    resolution: $("#resolution").val(),
                },
                success: function (data) {
                    //console.log(data);
                    //isi form
                    window.location.href = "/dashboard";
                },
            });
        });
        //end add solution
    </script>
</html>
