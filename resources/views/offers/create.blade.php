<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="nav-item nav-link active" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">  {{ $properties['native'] }} </a>
                @endforeach
              </div>
            </div>
          </nav>
        <div class="flex-center position-ref full-height">
            
            <div class="content">
                <div class="title m-b-md">
                    {{__('message.AddOffer')}}
                </div>
                @if (Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                <br>
                @endif
                
                <form method="POST" action="{{ route('offers.store') }}">

                    @csrf
                    {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">
                            {{__('message.offerNameLabel')}}
                        </label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control "name="name"  autofocus>
                            @error('name')
                                <small class="form-text text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label text-md-right">
                            {{__('message.OfferPriceLabel')}}
                        </label>

                        <div class="col-md-6">
                            <input id="price" type="text" class="form-control" name="price" >
                            @error('price')
                                <small class="form-text text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="detials" class="col-md-4 col-form-label text-md-right">
                            {{__('message.OfferDetialsLabel')}}
                        </label>

                        <div class="col-md-6">
                            <input id="detials" type="text" class="form-control" name="detials" >
                            @error('detials')
                                <small class="form-text text-danger">
                                    {{$message}}
                                </small>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                Add
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
