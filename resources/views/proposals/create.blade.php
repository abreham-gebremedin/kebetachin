@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header abbgs text-white">
        <h2>Submit Proposal</h2>
    </div>




    <!------ Include the above in your HEAD tag ---------->

    <section class="testimonial " id="testimonial" style="margin:20px">

        <h2 class="pb-6">Answer Screening Questions</h2>


        <div class="jumbotron abbr">
            <form action="/submit/proposal" method="post">
                @csrf
                <table class="table ">
                    <thead>
                        <th><strong class="text-uppercase text-success">Screeninig Questions</strong>  </th>
                    </thead>
                    @php
                        $qn=0;
                    @endphp
                    @foreach ($job->screninig_questions as $screninig_question)
                     <tr>
                         <td>  <strong >{{"Question  "}}&nbsp&nbsp{{++$qn.":-"}}&nbsp&nbsp &nbsp{{$screninig_question->question}}</strong>
                         </td>
                     </tr>
                     <tr>
                           <td>
                               <input type="hidden" name="qid[]" value="{{$screninig_question->id}}">
                            <div class="form-group  ">
                                <label for="country">Write Your Answer Here... </label>
                                <textarea name="sq[]" class="form-control abbr"
                                placeholder="Add Subjective Screening question here......"  
                                value="" cols="20" rows="5"></textarea>
    
    
                     </div>
                           </td>
                     </tr>
                            
                    @endforeach
                </table>
                <a class="btn btn-success  btn-lg float-left" href=""><span class="fa fa-backward"></span> Back</a>
                <button type="submit" class="btn btn-success btn-lg float-right" >Next <span class="fa fa-forward"></span> </button>
            </form>           
           


        </div>



    </section>



</div>
@endsection