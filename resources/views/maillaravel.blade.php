@extends('master')
@section('content')
<html>
<head>

  <title> Home </title>

  <link rel="stylesheet" href="/css/bootstrap.min.css">  

  <style>
  body{
    margin-top:2em;
  }
</style>

</head>
<body>
  <div class="container"> 

    {{-- <div class="form-group col-md-8">    
      <div class="col-md-10"> <br> --}}


        <form action="{{ url('create') }}" method="post">

          <div class="form-group"> 
            <label for="subject"> Subject: </label> 
            <input type="text" name="subject" id="subject" class="form-control">
          </div>

          <div class="form-group"> 
            <label for="sender_name"> Sender Name: </label>
            <input type="text" name="sender_name" id="sender_name" class="form-control"> 
          </div>

          <div class="form-group"> 
            <label for="sender_email"> Sender Email: </label>
            <input type="text" name="sender_email" id="sender_email" class="form-control">
          </input>
        </div>

        <div class="form-group"> 
          <label for="recipient_name"> Recipient Name: </label>
          <input type="text" name="recipient_name" id="recipient_name" class="form-control"></input>
        </div>
        
        <div class="form-group"> 
          <label for="recipient_email"> Recipient Email: </label>
          <input type="text" name="recipient_email" id="recipient_email" class="form-control"></input>
        </div>
        
        <div class="form-group"> 
          <label for="content"> Content : </label>
          <input type="textarea" name="content" id="content" class="form-control"></input>
        </div>
        <input type="submit" value="Send" class="btn btn-primary">
      </center>  
    </div>
  {{-- </div>
  </div> --}}
</body>
</html>
@yield('content') 
@endsection