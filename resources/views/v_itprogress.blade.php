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
    <link rel="stylesheet" href="/css/itprogress.css" />
  </head>

  <body>
    <!-- @if (!empty($alert)) -->
    <!-- <div class="alert alert-success">{{ $alert }}</div> -->
    <div style="margin-top: 30px; position: relative; text-align: center">
      <img src="/image/obeng.gif" width="300px" alt="" />
    </div>
    <!-- @else -->

    <div class="wrapper">
      <div class="title">IT Binus Bekasi</div>
      <div class="form">
        <div class="inputfield">
          <label>ID Tiket</label>
          <input
            type="text"
            class="input"
            id="id_ticket"
            value="{{$ticket->id_ticket}}"
            disabled
          />
        </div>
        <div class="inputfield">
          <label>Ruangan</label>
          <input
            type="text"
            class="input"
            id="ruangan"
            value="{{$ticket->nama_ruangan}}"
            disabled
          />
        </div>
        <div class="inputfield">
          <label>Masalah</label>
          <input
            type="text"
            class="input"
            id="problem"
            value="{{$ticket->problem}}"
            disabled
          />
        </div>
        <div class="inputfield">
          <label>Status Tiket</label>
          <div class="custom_select">
            <select id="status">
              <option disabled>Select Here</option>
              <option value="open">Pending</option>
              <option value="onprogres" selected>On Progres</option>
              <option value="close">Close</option>
            </select>
          </div>
        </div>

        <div class="inputfield">
          <label>Solusi</label>
          <textarea class="textarea" id="resolution"></textarea>
        </div>
        <div class="inputfield">
          <input
            type="submit"
            value="Hapus"
            class="btn"
            onclick="document.getElementById('form-add').reset();"
          />

          <input id="in" type="submit" value="Simpan" class="btn" />
        </div>
      </div>
    </div>

    <div style="margin-top: 30px; position: relative; text-align: center">
      <img src="/image/pubg.gif" width="300px" alt="" />
    </div>
    <!-- @endif -->
  </body>
  <script>
    // update
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
    $(".inputfield").on("click", "#in", function () {
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
