<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Demo</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        *{
            margin:0px;
            padding:0px;
        }
    </style>
</head>
<body>

    <div class="container-fluid" style="padding:0px;">

        <ul id="slides">
            <!-- <li class="slide showing">Slide 1</li>
            <li class="slide">Slide 2</li>
            <li class="slide">Slide 3</li> -->

        </ul>
    </div>

    <script>
        // var slides = document.querySelectorAll('#slides .slide');
        // var currentSlide = 0;
        // var slideInterval = setInterval(nextSlide,2000);

        // function nextSlide(){
        //     slides[currentSlide].className = 'slide';
        //     currentSlide = (currentSlide+1)%slides.length;
        //     slides[currentSlide].className = 'slide showing';
        // }
    </script>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {

            var slides = [
                @foreach( $slides as $slide )
                    "{{ $slide->slide_url }}",
                @endforeach
            ];

            setInterval(function(){
                slides = [];
                $.ajax({
                    type: 'get',
                    url: '{{ route("poll_slides") }}',
                    success: function(data){
                        data.map( slide => {
                            slides.push(slide.slide_url);
                        });
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            }, 5000);



            var currentSlide = 0;
            var slideInterval = setInterval(nextSlide,2000);

            function nextSlide(){

                if( slides.length > 0 ){
                    console.log(slides[currentSlide]);
                    currentSlide = (currentSlide+1)%slides.length;
                    $(".slide").remove();
                    $("#slides").append('<img class="slide img img-fluid" src="'+slides[currentSlide]+'" />');
                }

            }




        });
    </script>
</body>
</html>
