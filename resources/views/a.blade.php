<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link
            rel="stylesheet"
            type="text/css"
            href="{!! asset('css/a.css') !!}"
        />
        <link
            href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            rel="stylesheet"
        />

        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;1,400&display=swap"
            rel="stylesheet"
        />
    </head>
    <body>
        <div class="container-form">
            <div id="binus-ribbon">
                <span
                    class="svgcon-binus-ribbon svg the-ribbon"
                    style="background-image: none"
                    ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="42"
                        height="77"
                        viewBox="0 0 42 77"
                    >
                        <g fill="none">
                            <rect
                                width="28"
                                height="42"
                                x="14"
                                y="28"
                                fill="#AFD7F4"
                                opacity=".6"
                            ></rect>
                            <rect
                                width="28"
                                height="14"
                                y="14"
                                fill="#00A1E0"
                            ></rect>
                            <rect
                                width="28"
                                height="14"
                                y="28"
                                fill="#76BDE9"
                                opacity=".7"
                            ></rect>
                            <rect
                                width="28"
                                height="14"
                                y="42"
                                fill="#AFD7F4"
                                opacity=".4"
                            ></rect>
                            <rect
                                width="14"
                                height="14"
                                x="28"
                                y="28"
                                fill="#76BDE9"
                            ></rect>
                            <rect
                                width="14"
                                height="14"
                                x="28"
                                y="56"
                                fill="#AFD7F4"
                                opacity=".4"
                            ></rect>
                            <rect
                                width="14"
                                height="14"
                                x="28"
                                y="42"
                                fill="#76BDE9"
                                opacity=".4"
                            ></rect>
                            <path
                                fill="#FFF"
                                d="M28,70 C28,66.1341333 31.1341333,63 35,63 C38.8658667,63 42,66.1341333 42,70 L28,70 Z"
                                opacity=".4"
                            ></path>
                            <path
                                fill="#76BDE9"
                                d="M0,28 C3.86586667,28 7,31.1341333 7,35 C7,38.8658667 3.86586667,42 0,42 L0,28 Z"
                                opacity=".7"
                            ></path>
                            <path
                                fill="#AFD7F4"
                                d="M28,42 C24.1341333,42 21,38.8658667 21,35 C21,31.1341333 24.1341333,28 28,28 L28,42 Z"
                                opacity=".88"
                            ></path>
                            <path
                                fill="#FFF"
                                d="M42,56 C38.1341333,56 35,52.8658667 35,49 C35,45.1341333 38.1341333,42 42,42 L42,56 Z"
                                opacity=".25"
                            ></path>
                            <path
                                fill="#FFF"
                                d="M28,70 C24.1341333,70 21,66.8658667 21,63 C21,59.1341333 24.1341333,56 28,56 L28,70 Z"
                                opacity=".5"
                            ></path>
                            <path
                                fill="#AFD7F4"
                                d="M42,70 C42,73.8658667 38.8658667,77 35,77 C31.1341333,77 28,73.8658667 28,70 L42,70 Z"
                                opacity=".5"
                            ></path>
                            <path
                                fill="#00A1E0"
                                d="M42,28 C42,31.8654 38.8658667,35 35,35 C31.1341333,35 28,31.8654 28,28 L42,28 Z"
                                opacity=".65"
                            ></path>
                            <path
                                fill="#76BDE9"
                                d="M14,28 C14,31.8658667 10.8658667,35 7,35 C3.13413333,35 0,31.8658667 0,28 L14,28 Z"
                                opacity=".7"
                            ></path>
                            <path
                                fill="#AFD7F4"
                                d="M28,42 C28,45.8663333 24.8658667,49 21,49 C17.1341333,49 14,45.8663333 14,42 L28,42 Z"
                                opacity=".8"
                            ></path>
                            <path
                                fill="#4CB3E6"
                                d="M14,42 C14,38.1341333 17.1341333,35 21,35 C24.8658667,35 28,38.1341333 28,42 L14,42 Z"
                                opacity=".65"
                            ></path>
                            <path
                                fill="#FFF"
                                d="M14,42 C17.8658667,42 21,45.1346 21,49 C21,52.8663333 17.8658667,56 14,56 L14,42 Z"
                                opacity=".3"
                            ></path>
                            <path
                                fill="#FFF"
                                d="M28,56 C31.8658667,56 35,59.1346 35,63 C35,66.8663333 31.8658667,70 28,70 L28,56 Z"
                                opacity=".25"
                            ></path>
                            <path
                                fill="#FFF"
                                d="M14,56 C17.8658667,56 21,59.1346 21,63 C21,66.8663333 17.8658667,70 14,70 L14,56 Z"
                                opacity=".3"
                            ></path>
                            <polygon
                                fill="#008ED3"
                                points="0 14 28 14 28 28 42 28 42 0 0 0"
                            ></polygon>
                        </g></svg
                ></span>
            </div>
            <h2>IT Binus Bekasi</h2>

            <div class="select-box">
                <div class="options-container">
                    <div class="option">
                        <input
                            type="radio"
                            class="radio"
                            id="internet"
                            name="category"
                        />
                        <label for="internet">Internet terputus</label>
                    </div>
                    <div class="option">
                        <input
                            type="radio"
                            class="radio"
                            id="layar"
                            name="category"
                        />
                        <label for="layar">Layar tidak tampil</label>
                    </div>
                    <div class="option">
                        <input
                            type="radio"
                            class="radio"
                            id="mouse"
                            name="category"
                        />
                        <label for="mouse">Mouse rusak</label>
                    </div>
                    <div class="option">
                        <input
                            type="radio"
                            class="radio"
                            id="mouse"
                            name="category"
                        />
                        <label for="mouse">Mouse rusak</label>
                    </div>
                    <div class="option">
                        <input
                            type="radio"
                            class="radio"
                            id="mouse"
                            name="category"
                        />
                        <label for="mouse">Mouse rusak</label>
                    </div>
                    <div class="option">
                        <input
                            type="radio"
                            class="radio"
                            id="keyboard"
                            name="category"
                        />
                        <label for="keyboard">Keyboard rusak</label>
                    </div>
                    <div class="option">
                        <input
                            type="radio"
                            class="radio"
                            id="lainnya"
                            name="category"
                        />
                        <label for="lainnya">Lainnya</label>
                    </div>
                </div>
                <div class="selected">Pilih Kendala</div>
            </div>
            <button type="submit" class="btn-submit">Kirim</button>
        </div>
        <section class="ps-timeline-sec">
            <div class="container">
                <ol class="ps-timeline">
                    <li>
                        <div class="grey">
                            <div class="img-handler-top">
                                <img src="image/search-grey.png" alt="" />
                            </div>
                            <div class="ps-bot-search">Mencari Teknisi</div>
                            <span class="ps-sp-top">01</span>
                        </div>
                    </li>
                    <li>
                        <div class="img-handler-bot">
                            <img src="image/run-grey.png" alt="" />
                        </div>
                        <div class="ps-top-run">
                            Teknisi Ucok sedang dalam perjalanan
                        </div>
                        <span class="ps-sp-bot">02</span>
                    </li>
                    <li>
                        <div class="img-handler-top-finish">
                            <img src="image/finish-grey.png" alt="" />
                        </div>
                        <div class="ps-bot-finish">
                            Yeay !! Enjoy Your Work !
                        </div>
                        <span class="ps-sp-top">03</span>
                    </li>
                    <li>
                        <div class="img-handler-bot-rating">
                            <input type="radio" name="star" id="star1" /><label
                                for="star1"
                            ></label>
                            <input type="radio" name="star" id="star2" /><label
                                for="star2"
                            ></label>
                            <input type="radio" name="star" id="star3" /><label
                                for="star3"
                            ></label>
                            <input type="radio" name="star" id="star4" /><label
                                for="star4"
                            ></label>
                            <input type="radio" name="star" id="star5" /><label
                                for="star5"
                            ></label>
                        </div>

                        <div class="ps-top-feedback">Feedback</div>
                        <span class="ps-sp-bot">04</span>
                    </li>
                </ol>
            </div>
        </section>
        <script
            type="text/javascript"
            src="{!! asset('js/a.js'  ) !!}"
        ></script>
    </body>
</html>
