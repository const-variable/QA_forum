<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .ml-20{
            display: flex;
            margin-left: 20px;
        }

        .mtb-10{
            margin-top:10px;
            margin-bottom:10px;
        }
        
        .mtb-20{
            margin-top: 20px;
            margin-bottom:20px;
        }

        .title{
            font-size: 22px;
            font-weight: 600;
        }

        .box-color-grey{
            background: #f3f3f3;
            border:1px solid #d3d3d3;
            border-radius: 2px;
            padding-left: 5px;
            padding-right: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mtb-20">
            <div class="col-md-8 title">
                Add Question 
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card">
                    <div class="card-header">{{ __('Add Question') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="/question/post">
                            @csrf
    
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Question Title :') }}</label>
    
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                    <label for="catagory" class="col-md-4 col-form-label text-md-right">Category list:</label>
                                    <div class="col-md-6">
                                    <select class="form-control" id="catagory" name="catagory">
                                      <option value="1">Python</option>
                                      <option value="2">Laravel</option>
                                      <option value="3">Javascript</option>
                                      <option value="4">System Design</option>
                                      <option value="5">React</option>
                                    </select>
                                    </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description :') }}</label>
    
                                <div class="col-md-6">
                                    <textarea id="description" type="radio" class="form-control @error('user_type') is-invalid @enderror" name="description" value="user" required></textarea>
                                </div>
                            </div>
    
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Post') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
