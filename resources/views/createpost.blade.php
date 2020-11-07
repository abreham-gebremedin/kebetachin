<!-- createpost.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel Tag System Tutorial With Example</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>       
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/multi-input.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>

 
  </head>
  <body>
    <div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
      <h2>Laravel Tag System Tutorial With Example</h2><br/>
      <form method="post" action="{{url('addpost')}}">
        @csrf
        
    
            <label for="Title">Title:</label>
            <input type="text" class="form-control" name="title">
          
           
              <label for="Body">Body:</label>
              <input type="text" class="form-control" name="body">
           
            <label for="Tags">Tags:</label>
              <input type="text"  data-role="tagsinput"  class="form-control"  >
             
      
              <select class="selectpicker" multiple data-live-search="true"  data-width="auto" name="tags[]" >
                <option>Mustard</option>
                <option>Ketchup</option>
                <option>Relish</option>
              </select>
                 
   
          <div class="form-group">
            <button type="submit" class="btn btn-success">Add Post</button>
        
          </div>
      </form>
    </div>
  </body>
</html>
