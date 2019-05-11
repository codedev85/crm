<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Website Field -->
<div class="form-group col-sm-6">
    {!! Form::label('website', 'Website:') !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control' ,'required']) !!}
</div>

<!-- Logo Path Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('logo_path', 'Select a logo:') !!}
     {!! Form::file('logo_path', null, ['class' => 'form-control', 'files'=> 'true', 'enctype'=>'multipart/form-data']) !!}

</div> --}}

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {{-- {!! Form::label('user_id', 'User Id:') !!} --}}
{!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('companies.index') !!}" class="btn btn-default">Cancel</a>
</div>
{{--
<form action="company/store" method="post" enctype="multipart/form-data">
    @CSRF
      <div class="form-group">
        <label for="title">Company Name</label>
        <br>
        <input type="text" name="name" class="form-control">
      </div>
        <br>
        <label for="body">Website</label>
        <br>
        <label for="body">Email</label>
        <br>
        <div class="form-group">
        <input type="text" name="email"  class="form-control" >
        {{-- <br>  id="article-ckeditor" --}}

      {{-- </div>
        <div class="form-group">
        <input type="text" name="website"  class="form-control" >
        {{-- <br>  id="article-ckeditor" --}}



