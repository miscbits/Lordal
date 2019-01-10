@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">{{$user->name}}</div>
                        <div class="col-md-6">{{$user->email}}</div>
                        <div class="col-md-6">{{$user->student->cell_number}}</div>
                        <div class="col-md-6">{{$user->student->github_username}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Labs - Assigned</div>
                <div class="card-body">
                    <div class="row">
                        {{$user->student->assessments}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Labs - Completed</div>
                <div class="card-body">
                    <div class="row">
                        {{$user->student->assessments}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Assessments - Assigned</div>
                <div class="card-body">
                    <div class="row">
                        {{$user->student->assessments}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Assessments - Completed</div>
                <div class="card-body">
                    <div class="row">
                        {{$user->student->assessments}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
