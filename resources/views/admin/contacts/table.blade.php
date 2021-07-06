<table class="table table-responsive" id="contacts-table">
    <thead>
        <tr>
            <th>Phone</th>
        <th>In</th>
        <th>Fb</th>
        <th>Vk</th>
        <th>Email</th>
        <th>Schedule</th>
        <th>Address</th>
        <th>Map</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($contacts as $contact)
        <tr>
            <td>{!! $contact->phone !!}</td>
            <td>{!! $contact->in !!}</td>
            <td>{!! $contact->fb !!}</td>
            <td>{!! $contact->vk !!}</td>
            <td>{!! $contact->email !!}</td>
            <td>{!! $contact->schedule !!}</td>
            <td>{!! $contact->address !!}</td>
            <td>{!! $contact->map !!}</td>
            <td>
                {!! Form::open(['route' => ['contacts.destroy', $contact->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('contacts.show', [$contact->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('contacts.edit', [$contact->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>