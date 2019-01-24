@extends('layouts.app')

@section('content')
	<submission-form :assignment="{{$assignment}}"></submission-form>
 @endsection