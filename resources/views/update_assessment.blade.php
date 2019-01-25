@extends('layouts.app')

@section('content')
	<view-assessment :assessment_id="{{$assessment_id}}"></view-assessment>
@endsection
