<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Monitor Multi Screen</title>
        <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
        <script src="{{asset('assets/jquery.min.js')}}"></script>
    </head>
    <body>
        {{-- @foreach ($pages as $item)
            <span data-url="{{$item->url}}" data-duration="{{$item->duration}}"></span>
        @endforeach --}}
                <div class="embed-container">
                    <iframe id="iframe-page" src="" style="border:0">
                </iframe></div>
                {{-- <div class="flex-center position-ref full-height">
                    <div class="content">
                        <div class="title">
                            Sorry, the page you are looking for could not be found.
                        </div>
                    </div>
                </div> --}}
        <script>
            var iframe = document.getElementById("iframe-page");
            var currentPos = -1;
            // var data = [
            //     @foreach ($pages as $item)
            //         "{{$item->url}}",
            //     @endforeach
            // ];
            var data = [
                @foreach ($pages as $item)
                    {"url":"{{$item->url}}","duration": {{$item->duration}}},
                @endforeach
            ];

            function changeUrl() {
                if (++currentPos >= data.length) currentPos = 0;
                iframe.src = data[currentPos].url;

                console.log("index",currentPos,"iframe",iframe.src,"duration",data[currentPos].duration);

                setTimeout(changeUrl, data[currentPos].duration);
            }
            
            changeUrl();
        </script>
    </body>
</html>
