@extends('layouts.app')

@section('content')
 
    <div class="row justify-content-center">
             <div class="card">
                <div class="card-header abbgs text-white"><h2>User Profile</h2></div>

                 
                    
                 
<!------ Include the above in your HEAD tag ---------->

<section class="testimonial " id="testimonial" style="margin:20px">
    <div class="container">
        <div class="row ">
            
                <form id="quickForm" method="POST"  action="/freelancer4">
                    @csrf

                    <section>
                        <h2>Please select one or more Skills</h2>
                     
                        
                        <div class="bootstrap" class="form-group  " >
                            <script>$('select').selectpicker();
                    
                                $('select').multiselect({
                                columns: 4,
                                placeholder: 'Select Languages',
                                search: true,
                                selectAll: true
                            });
                                </script>
                        <select  required  class="selectpicker" data-style="btn-success" multiple data-live-search="true" data-width="auto" data-height="auto" name="skills[]" class="custom-scroll"  >
                               
                            
                    @foreach($sk as $s)
                             <option data-content="<span class='badge badge-success'>{{$s->skill_name}}</span>">{{$s->id}}</option>
                    @endforeach
                                                 
 
                                
                            </select>
                        </div>
                     </section>
                    <div class="form-row " >
                         
                            <button type="submit"  class="btn btn-lg border border-success " data-toggle="tooltip"
                        data-placement="bottom" title="Click submit button to finish registration" id="submit_button">Next</button>
                    </div>
                   
<!------ Include the above in your HEAD tag ---------->


                </form>
            </div>
        </div>
    
</section>

                    
      
        </div>
 </div>
@endsection
 