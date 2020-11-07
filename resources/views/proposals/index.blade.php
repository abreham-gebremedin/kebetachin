@extends('layouts.app')

@section('content')
   
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($company as $c)
            <tr>
                <th scope="row">{{$c->id}}</th>
                <td><a href="">{{$c->name}}</a></td>
             </tr>
        @endforeach
        </tbody>
    </table>
@endsection 