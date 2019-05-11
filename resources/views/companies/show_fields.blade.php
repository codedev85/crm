<!-- Id Field -->
{{-- <div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $company->id !!}</p>
</div> --}}
<div class="row">
    <div class="col-md-7">
  <!-- Name Field -->
<div class="form-group">
        {{-- {!! Form::label('name', 'Name:') !!} --}}
        <h1>{!! $company->name !!}</h1>
    </div>
    <!-- Email Field -->
    <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            <p>{!! $company->email !!}</p>
        </div>

    <!-- Website Field -->
    <div class="form-group">
        {!! Form::label('website', 'Website:') !!}
        <br>
        <a href="{!! $company->website !!}">{!! $company->website !!}</a>
        {{-- <p>{!! $company->website !!}</p> --}}
    </div>


    <!-- User Id Field -->
    {{-- <div class="form-group">
        {!! Form::label('user_id', 'User Id:') !!}
        <p>{!! $company->user_id !!}</p>
    </div> --}}

    <!-- Deleted At Field -->
    {{-- <div class="form-group">
        {!! Form::label('deleted_at', 'Deleted At:') !!}
        <p>{!! $company->deleted_at !!}</p>
    </div> --}}

    <!-- Created At Field -->
    <div class="form-group">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{!! $company->created_at !!}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{!! $company->updated_at !!}</p>
    </div>
</div>
<div class="col-md-3">
        <div class="form-group">
                {{-- {!! Form::label('logo_path', 'Logo Path:') !!} --}}

    {{-- <a href="{!! route('companies.uploadimage') !!}> --}}

        <img src="{{asset('logo/public/logo/'.$company->logo_path )}}" height="100" width="100">


            </div>
</div>
{{-- <a href="{{route('companies.uploadimage', [$company->id])}}" class="btn btn-primary pull-right">Upload Image</a> --}}
{{-- <div class="col-md-3">
        <div class="form-group">
      <label>Change display picture</label>
        <form action="{{route('companies.uploadimage')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" value="{{$company->id}}"/>

            <input type="file"  name="logo_path"/>
         <br>
         <input type="submit" class="btn btn-success" value="upload"/>
     </form>
    </div>
</div> --}}
</div>

<!-- Logo Path Field -->


