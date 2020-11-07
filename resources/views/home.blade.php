@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Well Come</div>
                    <h2>Select Your Coice! </h2>
                   <div class="card-body ">
                    <div class="row">
                        <div class="col-6">
                         <div class="form-control">
                              <a class="btn btn-success btn-lg" href="/freelance1">Continue as Frelancer</a>
     
                         </div>
                        </div>
                        <div class="col-4">
                         <div class="form-control">
                            <a class="btn btn-success btn-lg btn-" href="/company2">Continue as Client</a> 
                         </div>
                        </div>
                         
                     </div>
 
                   </div>
 
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
