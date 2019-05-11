<!-- Password Field -->
@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Update Password:
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
     {{-- <div class="form-group col-sm-6">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>  --}}
{{-- </div> --}}
{{-- <div class="row" style="padding-left: 20px">
    <div class="form-group col-sm-6">
            {!! Form::label('confirm_password', 'Confirm Password:') !!}
            {!! Form::password('comfirn_password', ['class' => 'form-control']) !!}
        </div> 
    </div> --}}
        {{-- <div class="form-group col-sm-12">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
               
            </div> --}}
            <div class="row">

            <div class="col-md-4">
            <form action="" method="post">
                @csrf
                <input type="hidden" method="put"/>
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
                {{-- <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control"/> --}}
                <br>
                <input type="submit" value="Change password" class="btn btn-success"/>
            </form>
        </div>
        </div>
   </div>
</div>
</div>
</div>
@endsection