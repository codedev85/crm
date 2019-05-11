
<table class="table table-responsive mystyle" id="users-table">
    <thead>
        <tr>
        <th>Email</th>
        <th>Name</th>
        {{-- <th>First Name</th>
        <th>Last Name</th> --}}
        <th>User Role</th>
        <th>Company </th>

            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
                <td>
                        <a href="{!! route('users.show', [$user->id]) !!}">
                            {!! $user->email !!}
                        </a></td>
            <td>
                {!! $user->name !!}
           </td>
            {{-- <td>{!! $user->first_name !!}</td>
            <td>{!! $user->last_name !!}</td> --}}
            <td>{!! $user->role['name'] !!}</td>
            <td>{!! $user->company['name'] !!}</td>

            <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>

                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>

    @endforeach
    </tbody>
</table>
