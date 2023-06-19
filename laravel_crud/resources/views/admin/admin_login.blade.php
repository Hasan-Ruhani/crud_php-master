<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(Session::has('error-msg'))
                        <p class="text-danger">{{ Session::get('error-msg') }}</p>
                    @endif

                    <form action="{{url('/admin_login')}}" method="POST">
                        @csrf
                        <label for="email">Email</label> <br>
                        <input type="text" id="email" name="email" placeholder="Enter Your Email">   <br><br>
                        <label for="password">Password</label><br>
                        <input type="text" id="password" name="password" placeholder="Enter Your Password">   <br><br>
                        <input class="btn btn-primary" type="submit" id="button" value="Admin Login">
                    </form>
                </div>
            </div>
        </div>
    




  </body>
</html>