<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Submitted</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #111827;
        }

        .wrapper {
            width: 420px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            color: #fff;
            border-radius: 10px;
            padding: 30px 40px;
        }

        .wrapper img {
            max-width: 100%;
            max-height: 100%;
            display: block;
        }

        .wrapper h1 {
            font-size: 36px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="wrapper">
            @foreach ($results as $key => $result)
                @if ($loop->last)
                    <a> {{$key}} </a>
                    <img src="{{asset('storage/images/' . $result)}}" alt="an image">
                    @break
                @endif
                <div>
                    <a>
                        {{$key}} = {{$result}}
                    </a>
                </div>
            @endforeach
            @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div> 
            @endif
    </div>
</body>
</html>