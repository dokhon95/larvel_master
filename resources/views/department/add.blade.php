@extends('master')
@section('controller','Department')
@section('action','Add Department')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
    @include('errors.error') <!-- phan bat loi -->
    <form action="{!! route('department.store') !!}" method="post">
        <input type="hidden" name="_token" value="{!! csrf_token()!!}"/>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="name" placeholder="Please Enter Name Department" value="{!! old('name') !!}"/>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone" placeholder="Please Enter Phone Department" value="{!! old('phone') !!}" />
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>
@stop
