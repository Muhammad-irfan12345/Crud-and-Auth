<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
        
<body class="antialiased bg-gray-100 dark:bg-gray-900">
    <div class="flex-col w-full md:flex md:flex-row md:min-h-screen">
       @include('layouts\sidebar')
        <div class="w-full">
           <!-- Page Heading -->
            <header class="bg-white shadow dark:bg-gray-700">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                   <h4>{{Auth::user()->name}}</h4>
                </div>
            </header>

            <!-- Page Content -->
            <main>
            	<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
    
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      @if(Auth::user()->usertype == 'admin')
      <th scope="col">Edit/Update</th>
      <th scope="col">Delete</th> @endif
    </tr>
  </thead>
  <tbody>
     @foreach ($user as $user)
    <tr>
      
	    
            <td>{{ $loop->iteration}}</td>
           <!--  <td width="50px"><img src="{{ asset('uploads/avatars/' . $user->avatar) }}" /></td> -->
            <td>{{ $user->name}}</td>
            <td>{{ $user->email}}</td>
@if(Auth::user()->usertype == 'admin')
           <td><a href="{{ url('user-destroy/'.$user->id) }}" class="btn btn-danger btn-sm">Delete</a></td>
       <td><a href="{{ url('user-edit/'.$user->id) }}" class="btn btn-success btn-sm">Update</a></td>
       @endif
            @endforeach
    </tr>
  </tbody>
</table>
 
            </main>
    </div>
    </div>

</body>
</html>
         
