<table class="table table-responsive" id="companies-table">
    <thead>
        <tr>
            <th>Company Name</th>
        <th>Website</th>
        <th>Email</th>
        {{-- <th>User Id</th> --}}
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companies as $company)
        <tr>
            <td>
            <a href="{!! route('companies.show', [$company->id]) !!}">
                {!! $company->name !!}
            </a></td>
            <td>{!! $company->website !!}</td>
            <td>{!! $company->email !!}</td>
            {{-- <td>{!! $company->user_id !!}</td> --}}
            <td>
                {!! Form::open(['route' => ['companies.destroy', $company->id], 'method' => 'delete']) !!}
                <div class='btn-group'>

                    <a href="{!! route('companies.edit', [$company->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
{{-- {{ $companies->links() }} --}}
