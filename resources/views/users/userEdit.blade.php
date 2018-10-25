@extends('layouts.master')

@section('content')

<form method="POST" action="{{ route('userUpdate') }}" name="card" id="card">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="row">
        <div class="col-sm-6 mt-3 mr-0 pr-3">
            User Since: {{ $user->created_at->toFormattedDateString() }}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 mt-3 mr-0 pr-3">
            Name:
            <input name="name" type="text" class="form-control form-control-md" value="{{ $user->name }}" autocomplete="off">     
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mt-3 mr-0 pr-3 mb-3">
            Email:
            <input name="email" type="text" class="form-control form-control-md" value="{{ $user->email }}" autocomplete="off">     
        </div>
    </div>

    @include('validate')

    <div class="row mt-5 ml-1">
        <button class="btn btn-sm btn-outline-primary mr-2" type="submit" form="card">
            <i class="fas fa-save"></i> Save Changes
        </button>
    </div>

</form>


@endsection
