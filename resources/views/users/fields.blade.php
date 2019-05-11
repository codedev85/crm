<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- First Name Field -->
 <div class="form-group col-sm-6">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Role Id Field -->
<div class="form-group col-sm-6">
    <label>Select User Role</label>
    <br>
    {{-- {!! Form::label('role_id', 'Role Id:') !!}
    {!! Form::number('role_id', null, ['class' => 'form-control']) !!} --}}
    <select class="form-control">
            {{-- <option value="{{$users->role['id']}}">{{$users->role['name']}}</option> --}}

            <option value="">Select Role</option>
            {{-- <option  value="{{$user->role('id')}}">{{$user->role('name')}}</option> --}}
            {{-- <option  value="{{$role->id}}">{{$role->name}}</option> --}}
            @foreach($roles as $role)
        <option  value="{{$role->id}}">{{$role->name}}</option>
        @endforeach
    </select>
</div>

<!-- Company Id Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company Id:') !!}
    {!! Form::number('company_id', null, ['class' => 'form-control']) !!}
</div> --}}
<div class="form-group col-sm-6">
        <label>Company</label>
        <br>
         {!! Form::label('role_id', 'Role Id:') !!}
        {{-- {!! Form::number('role_id', null, ['class' => 'form-control']) !!} --}}
        <select class="form-control">
         {{-- <option  >Select Company</option> --}}
         {{-- <option  value="{{$company->id}}">{{$company->name}}</option> --}}
            @foreach($companies as $company)
            <option  value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
        </select>
    </div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {{-- {!! Form::label('password', 'Password:') !!} --}}
    {!! Form::hidden('password', ['class' => 'form-control']) !!}
</div>

<!-- Remember Token Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    {!! Form::text('remember_token', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
