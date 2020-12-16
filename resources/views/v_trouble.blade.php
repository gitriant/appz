<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IT Support Bekasi</title>
    <link rel="stylesheet" type="text/css" href="/css/a.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="container-form">
        <div style="width: 100%;">
            <img src="/image/garisbiru.png" style="margin-left:250px;display:ruby-text" width="40px" height="90px" alt="">
            <img src="/image/logo-binus.png" style="margin-left:20px;margin-top: 10px" width="130px" alt="">
            <h2 style="text-align: center;">IT Binus Bekasi</h2>
        </div>


        <div class="select-box">
            <div class="options-container">
                @foreach ($kerusakan as $kerus)
                <div class="option">
                    <input type="radio" class="radio" value="{{$kerus->id_kerusakan}}" id="internet" name="category" />
                    <label for="internet">{{$kerus->jenis_kerusakan}}</label>
                </div>
                @endforeach
            </div>
            <div class="selected" id="problem">Pilih Kendala</div>
        </div>
        <button type="submit" id="kirim" class="btn-submit">Kirim</button>
        <img id="loading" class="hidden" width="50px" src="/image/loading.svg" alt="">
        <div class="btn-submit hidden" style="text-align: center;" id="timer">hello</div>
    </div>
    <section class="ps-timeline-sec">
        <div class="container">
            <ol class="ps-timeline">
                <li>
                    <div class="grey">
                        <div class="img-handler-top">
                            <img id="img-search" src="/image/search-grey.png" alt="" />
                        </div>
                        <div id="text-search" class="ps-bot-search">Mencari Teknisi</div>
                        <input class="ps-bot-in" type="text" style="border:0px;left:140px" id="id_ticket" value="{{$ticket}}" />

                        <span id="span-search" class="ps-sp-top grey">1</span>
                    </div>
                </li>
                <li>
                    <div class="img-handler-bot">
                        <img id="img-run" src="/image/run-grey.png" alt="" />
                    </div>
                    <div id="text-run" class="ps-top-run">
                        Teknisi sedang dalam perjalanan
                    </div>
                    <span id="span-run" class="ps-sp-bot grey">2</span>
                </li>
                <li>
                    <div class="img-handler-top-finish">
                        <img id="img-finish" src="/image/finish-grey.png" alt="" />
                    </div>
                    <div id="text-finish" class="ps-bot-finish">
                        Yeay !! Enjoy Your Work !
                    </div>
                    <span id="span-finish" class="ps-sp-top grey">3</span>
                </li>
            </ol>
        </div>
        <!-- Modal komputer -->
        <div id="myModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none ;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Survey</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" id="form-add">
                            {{ csrf_field() }}
                            <label for="">Rating Kepuasan</label>
                            <div class="rating">
                                <input type="radio" name="rating" value="5" id="5">
                                <label for="5">☆</label>
                                <input type="radio" name="rating" value="4" id="4">
                                <label for="4">☆</label>
                                <input type="radio" name="rating" value="3" id="3">
                                <label for="3">☆</label>
                                <input type="radio" name="rating" value="2" id="2">
                                <label for="2">☆</label>
                                <input type="radio" name="rating" value="1" id="1">
                                <label for="1">☆</label>
                            </div>
                            <label for="">Feedback Pengguna</label>
                            <textarea class="form-control" name="feedback" id="feedback" cols="30" rows="10"></textarea>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('form-add').reset();">Close</button>
                        <button id="in" type="button" class="btn btn-primary add" data-dismiss="modal">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="/js/a.js"></script>
    <script src="/assets/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="/css/bootstrap2.css">
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.min.js.map"></script>


    <script>
        //stopwatch
        function incTimer() {
            var currentMinutes = Math.floor(totalSecs / 60);
            var currentSeconds = totalSecs % 60;
            if (currentSeconds <= 9) currentSeconds = "0" + currentSeconds;
            if (currentMinutes <= 9) currentMinutes = "0" + currentMinutes;
            totalSecs++;
            $("#timer").text(currentMinutes + ":" + currentSeconds);
            setTimeout('incTimer()', 1000);
        }

        totalSecs = 0;
        //endstopwatch

        $('.container-form').on('click', '#kirim', function() {
            $("#kirim").addClass("hidden");
            $("#loading").removeClass("hidden");
            $.ajax({
                type: 'POST',
                url: '{{ url("create_ticket") }}',
                data: {
                    '_token': "{{ csrf_token() }}",
                    'problem': $('#problem').text(),
                },
                success: function(data) {
                    $("#text-search").removeClass("ps-bot-search");
                    $("#text-search").addClass("ps-bot-search-black");
                    $("#span-search").removeClass("ps-sp-top grey");
                    $("#span-search").addClass("ps-sp-top");
                    $("#loading").addClass("hidden");
                    $("#timer").removeClass("hidden");
                    incTimer()
                    $('#img-search').attr('src', '/image/search.png');
                    $("#id_ticket").val("#" + data[0]);
                    // $('<input class="ps-bot-in" type="text" style="border:0px;left:140px" id="id_ticket" value="#' + data[0] + '" />').insertAfter('#text-search');

                },
            });
        });

        var refreshIntervalId = setInterval(ajaxCall, 3000); //300000 MS == 5 minutes

        function ajaxCall() {
            $.ajax({
                type: 'POST',
                url: '{{ url("update_ticket") }}',
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id_ticket': $('#id_ticket').val(),
                    'timer': $('#timer').text(),
                },
                success: function(data) {

                    if (data.status == "open" && $("#timer").text() == 'hello')
                        $("#kirim").addClass("hidden"),
                        $("#timer").removeClass("hidden"),
                        incTimer();
                    else if (data.status == "onprogres" && $("#timer").text() == 'hello')
                        $("#kirim").addClass("hidden"),
                        $("#timer").removeClass("hidden"),
                        incTimer();
                    else if (data.status == "open")
                        $("#text-search").removeClass("ps-bot-search"),
                        $("#text-search").addClass("ps-bot-search-black"),
                        $("#span-search").removeClass("ps-sp-top grey"),
                        $("#span-search").addClass("ps-sp-top"),
                        $('#img-search').attr('src', '/image/search.png');
                    else if (data.status == 'onprogres')
                        $("#text-search").removeClass("ps-bot-search"),
                        $("#text-search").addClass("ps-bot-search-black"),
                        $("#span-search").removeClass("ps-sp-top grey"),
                        $("#span-search").addClass("ps-sp-top"),
                        $('#img-search').attr('src', '/image/search.png'),
                        $("#text-run").removeClass("ps-top-run"),
                        $("#text-run").addClass("ps-top-run-black"),
                        $("#text-search").text("Nomor Ticket Anda"),
                        $("#span-run").removeClass("ps-sp-bot grey"),
                        $("#span-run").addClass("ps-sp-bot"),
                        $('#img-run').attr('src', '/image/run.png'),
                        $('#text-run').text('Teknisi ' + data.nama + ' sedang dalam perjalanan')
                    else if (data.status == "close")
                        $("#text-finish").removeClass("ps-bot-finish"),
                        $("#text-finish").addClass("ps-bot-finish-black"),
                        $("#span-finish").removeClass("ps-sp-top grey"),
                        $("#span-finish").addClass("ps-sp-top"),
                        $('#img-finish').attr('src', '/image/finish.png'),
                        $('#myModal1').modal('show'),
                        clearInterval(refreshIntervalId);
                    // else
                    //     $("#message").html("<div class='error_log'><p class='error'>Invalid username and/or password.</p></div>");
                },
            });
        }
    </script>
    <Script>
        $(document).on('click', '#add', function() {
            $('#myModal1').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: '{{ url("close_ticket") }}',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'stars': $('input[name="rating"]:checked').val(),
                    'feedback': $('#feedback').val(),
                    'id_ticket': $('#id_ticket').val(),


                },
                success: function(data) {
                    document.getElementById("form-add").reset();
                    $("#id_ticket").val("");
                    location.reload();


                },
            });
        });
        //end add data
    </script>
</body>

</html>