@extends('layouts.app')

@section('content')
 
    <h3>Review Details</h3>
    <form action="/store" method="post" >
        {{ csrf_field() }}
        <table class="table">
            <tr>
                <td>Name:</td>
                <td><strong>{{$company->name}}</strong></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><strong>{{$location->city}}</strong></td>
            </tr>
            
        </table>
        <a type="button" href="/location1" class="btn btn-warning">Back to Step 1</a>
        <a type="button" href="/company2" class="btn btn-warning">Back to Step 2</a>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endsection 