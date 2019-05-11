@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Upload Company's Logo
    </h1>
</section>

{{-- <div class="col-md-3">
    <div class="form-group"> --}}
            <div class="content">
                    @include('adminlte-templates::common.errors')
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="row" style="padding-left: 20px">
  <label>Upload Logo</label>

    <form action="{{route('companies.uploadimage')}}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- <input type="hidden" name="company_id" value="{{$company->id}}"/> --}}

        <input type="file"  name="logo_path"/>
     <br>
     <input type="submit" class="btn btn-success" value="upload"/>
 </form>
{{-- </div>
</div> --}}
</div>
</div>
</div>
</div>
@endsection
