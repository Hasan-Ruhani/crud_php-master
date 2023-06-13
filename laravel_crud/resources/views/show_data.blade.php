{{-- <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Home</title>
  </head>
   
  <body> --}}

   
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <div class="container">
                          <a href="{{url('/add-data')}}" class="btn btn-primary my-3">Add Data</a>
                
                          @if(Session::has('msg'))              {{-- when data insert successfully than show this message --}}
                            <p class="alert alert-success">{{ Session::get('msg') }}</p>
                          @endif
                
                          <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                
                                @foreach ($showData as $key => $data)    {{-- crud stor data show table formate --}}
                                  <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $data -> name }}</td>
                                    <td>{{ $data -> email }}</td>
                                    <td>
                                        <a href="{{ url('/edit-data/'.$data->id) }}" class="btn btn-success">Edit</a> |
                                        <a href="{{ url('/delete-data/'.$data->id) }}" onclick = "return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>  {{-- onclick use by delete confirmation --}}
                                    </td>
                                  </tr>
                                @endforeach
                                
                              </tbody>
                            </table>
                            {{ $showData -> links() }}    {{-- it use for page paginate (main code (App\Http\Providers\AppServiceProvider.php)) --}}
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
      
 

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html> --}}