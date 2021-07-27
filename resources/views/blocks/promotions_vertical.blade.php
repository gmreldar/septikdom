<section id="promotions_vertical">
    <div>
        @foreach($promotions as $promotion)
            <a href="{{route('blog.article', [$promotion->category->link, $promotion->link])}}" class="post">
                {{--<div>--}}
                {{--<h2>--}}
                {{--{{$promotion->name}}--}}
                {{--</h2>--}}
                {{--</div>--}}
                <h3>
                    {{$promotion->name}}
                </h3>
                <div class="post-img_wrapper">
{{--                    <div class="post-img" style="background-image: url(/min/{{$promotion->discount_menu_img ? $promotion->discount_menu_img : ($promotion->discount_slider_img ? $promotion->discount_slider_img : $promotion->image)}});"></div>--}}
                    <div class=""><img src="/min/{{$promotion->discount_menu_img ? $promotion->discount_menu_img : ($promotion->discount_slider_img ? $promotion->discount_slider_img : $promotion->image)}}" alt=""></div>
                </div>
            </a>
        @endforeach
    </div>

    <style>
        .post {
            color: black;
            border-radius: 5px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            flex-direction: column;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin-bottom: 25px;
            height: 308px;
            overflow: hidden;
        }

        .post .post-img_wrapper {
            border-radius: 5px;
            overflow: hidden;
            width: 100%;
        }

        .post-img {
            width: 500px !important;
            height: 250px !important;
        }

        .post .post-img:hover {
            -webkit-transform: scale(1.1);
            -ms-transform: scale(1.1);
            transform: scale(1.1);
        }

        .post .post-img {
            position: relative;
            width: 100%;
            height: 308px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            border-radius: 5px;
            -webkit-transition: .3s ease-out;
            transition: .3s ease-out;
        }
    </style>
</section>