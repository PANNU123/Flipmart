@extends('welcome')
@section('content')

@foreach ($allcategory as $allcategoies)
    <h4>{{$allcategoies->category_name}}</h4>
@endforeach
@endsection