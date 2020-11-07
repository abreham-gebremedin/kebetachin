@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <h5><i class="icon fas fa-check"></i> Alert!</h5>
        <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('failure'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
       <strong>{{ $message }}</strong>
</div>
 @endif

@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <i class="icon fas fa-ban"></i> Alert!
        <strong>Whoops!</strong> There were some problems.
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif