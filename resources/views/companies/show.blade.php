@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Company
            <form action="{{route('companies.uploadimage',[$company->id])}}" method="GET">
                <input type="hidden" name="company_id" value="{{$company->id}}"/>
                <input type="submit" class="btn btn-primary pull-right" value="Upload Image">
            </form>
            {{-- <a href="{{route('companies.uploadimage', [$company->id])}}" class="btn btn-primary pull-right">Upload Image</a> --}}
        </h1>
        <div class="clearfix"></div>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('companies.show_fields')
                    <a href="{!! route('companies.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
