<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Name:') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Name Field -->
{{-- <div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $user->name !!}</p>
</div> --}}

<!-- First Name Field -->
{{-- <div class="form-group">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{!! $user->first_name !!}</p>
</div> --}}

<!-- Last Name Field -->
{{-- <div class="form-group">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{!! $user->last_name !!}</p>
</div> --}}

<!-- Role Id Field -->
<div class="form-group">
    {!! Form::label('role_id', 'User Role:') !!}
    <p>{!! $user->role['name'] !!}</p>
</div>

<!-- Company Id Field -->
<div class="form-group">
    {!! Form::label('company_id', 'Company Id:') !!}
    <p>{!! $user->company['name'] !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $user->email !!}</p>
</div>

<!-- Password Field -->


<!-- Remember Token Field -->


<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $user->deleted_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $user->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $user->updated_at !!}</p>
</div>

