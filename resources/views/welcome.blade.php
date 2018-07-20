<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Monitor Multi Screen</title>
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <style>
            body,html {padding:0;margin:0;height:100%;}
            
              html {overflow-y:auto}
            
              .embed-container {
                  position: relative;
                  height: 100%;
                  max-width: 100%;
              }
            
              .embed-container iframe,
              .embed-container object,
              .embed-container embed {
                  position: absolute;
                  top: 0;
                  left: 0;
                  bottom: 0;
                  width: 100%;
                  height: 100%;
              }
              
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 36px;
                padding: 20px;
            }
            </style>
            @if(!empty($pages[0]->url))
                <div class="embed-container">
                    <iframe id="url" src="{{$pages[0]->url}}" style="border:0">
                </iframe></div>
            @else
                <div class="flex-center position-ref full-height">
                    <div class="content">
                        <div class="title">
                            Sorry, the page you are looking for could not be found.
                        </div>
                    </div>
                </div>
            @endif
    </body>
</html>
