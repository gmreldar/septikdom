<div class="h-search-container" style="">
    <div class="h-search-div">
        <div class="h-search">
            <div class="h-search-input">
                <input type="text" placeholder="Поиск" autocomplete="off" id="h-search-input">
                <svg class="icon-search" style="fill: rgb(171, 178, 167);">
                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-search') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                </svg>
            </div>
            <div class="h-search-result scrollbar" id="scrollbar"></div>
        </div>
    </div>

    <style>
        .h-search-container {
            position: relative;
            width: 300px
        }

        .h-search-div {
            position: absolute;
            top: -10px;
            left: 0;
            height: 40px;
            width: 300px;
        }

        .h-search {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            position: relative;
            margin-bottom: 24px;
            width: 100%;
        }

        .h-search-input {
            position: relative;
            width: 100%;
        }

        .h-search-input .icon-search {
            position: absolute;
            right: 15px;
            bottom: 14px;
            color: #abb2a7;
            -webkit-transition: .5s;
            transition: .5s;
        }

        .h-search-input input {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            border: 1px solid #eaebed;
            border-radius: 4px;
            padding: 10px 35px 10px 19px;
            -webkit-transition: .7s;
            transition: .7s;
            font-weight: 500;
            font-size: 18px;
            line-height: 20px;
            color: #151515;
            width: 100%;
        }

        .h-search-input input:focus {
            border: 1px solid #34a844;
        }

        div#scrollbar {
            overflow-y: scroll;
            max-height: 350px;
        }

        div#scrollbar::-webkit-scrollbar {
            width: 5px;
        }

        div#scrollbar::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            border-bottom-right-radius: 10px;
            overflow: hidden;
        }

        div#scrollbar::-webkit-scrollbar-thumb {
            background: black;
        }

        .h-search-result {
            opacity: 0;
            padding: 15px 0;
            width: 300px;
            z-index: 1000;
            position: absolute;
            left: 50%;
            top: 43px;
            background: white;

            -webkit-box-shadow: 1px 0px 18px 2px rgba(34, 60, 80, 0.33);
            -moz-box-shadow: 1px 0px 18px 2px rgba(34, 60, 80, 0.33);
            box-shadow: 1px 0px 18px 2px rgba(34, 60, 80, 0.33);

            transform: translateX(-50%);
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .h-search-result.active {
            opacity: 1;
        }

        @media (max-width: 1300px) {
            .h-search-container {
                position: relative;
                width: 100%;
                height: 42px;
            }

            .h-search-div{
                top: 0;
                width: 100%;
                /*width: 90%;*/
                /*left: 50%;*/
                /*transform: translateX(-50%);*/
            }

            .h-search-input input {
                border-radius: 0;
            }

            .h-search-result {
                width: 95%;
            }
        }

        .blogs > span {
            font-size: 18px;
            font-weight: 500;
            padding-left: 20px;
        }

        .blogs > .result {
            margin-top: 10px
        }

        .blogs > .result > .item {
            padding: 5px 10px;
        }

        .blogs > .result > .item > a {
            color: black;
        }

        .products > span {
            font-size: 18px;
            font-weight: 500;
            padding-left: 20px;
        }

        .products > .result {
            margin-top: 10px;
            margin-bottom: 15px;
        }

        .products > .result > .item {
            padding: 5px 10px;
        }

        .products > .result > .item > a {
            color: black;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $("#h-search-input, #search-input-mobile").focus(function () {
                $(".icon-search").css("fill", "#151515");
            });

            $("#h-search-input, #search-input-mobile").blur(function () {
                $(".h-search-result, .search-result-mobile").removeClass("active");
                $(".icon-search").css("fill", "#abb2a7");
            });

            $(".h-search input, .search-input-mobile input").keyup(function (e) {
                search($(this).val());
            });

            function search(val) {
                if (val.length >= 3) {
                    $.ajax({
                        url: '/search',
                        data: {words: val},
                        type: 'post',
                        success: function (data) {
                            $(".h-search-result, .h-search-result-mobile").html(data);
                            $(".h-search-result, .h-search-result-mobile").addClass("active");
                        },
                    });
                } else {
                    $(".h-search-result, .h-search-result-mobile").removeClass("active");
                }
            }
        })
    </script>
</div>