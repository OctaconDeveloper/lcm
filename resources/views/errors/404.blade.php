@extends('layouts.app2')
@section('content')
    <div class="d-flex flex-column flex-center flex-column-fluid p-10">
        <h1 class="fw-semibold mb-10" style="color: #A3A3C7">Seems there is nothing here</h1>
        <a href="{{url()->previous()}}" class="btn btn-primary">Return Back</a>
    </div>
@endsection
