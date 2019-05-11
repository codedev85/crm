<table class="table table-responsive" id="empolyees-table">
    <thead>
        <tr>
            <th>User Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($empolyees as $empolyee)
        <tr>
            <td>{!! $empolyee->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['empolyees.destroy', $empolyee->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('empolyees.show', [$empolyee->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('empolyees.edit', [$empolyee->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>