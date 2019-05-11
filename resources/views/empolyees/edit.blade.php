@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Empolyee
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($empolyee, ['route' => ['empolyees.update', $empolyee->id], 'method' => 'patch']) !!}

                        @include('empolyees.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection