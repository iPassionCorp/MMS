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
        @if((!empty($pages[0]->url)))
            <div class="embed-container">
                <iframe id="iframe-page" sandbox="allow-same-origin allow-scripts allow-popups allow-forms" src="" style="border:0">
            </iframe></div>
        @else
             <div class="flex-center position-ref full-height">
                    <div class="content">
                        <div class="title">
                            Cannot be found.
                        </div>
                    </div>
                </div>
        @endif
        <script>
            var iframe = document.getElementById("iframe-page");
            var currentPos = -1;
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
