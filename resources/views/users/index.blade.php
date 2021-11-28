@extends('layouts.app')

@section('content')
    <div class="row mb-5">
        <div class="col-12 d-flex justify-content-around">
            <div class="">
                <h2>LIST OF USERS</h2>
            </div>
            <div class="">
                @can('user-create')
                    <a href="{{ route('users.create') }}" class="btn btn-success">Create a new Users</a>
                @endcan
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table w-100">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Team</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listUsers as $key => $user)
                            <tr>
                                <th>{{ ++$i }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->ficha }}</td>
                                <td>
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $v)
                                            <label class="badge badge-success">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">Show</a>

                                    @can('user-edit')
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                    @endcan
                                    @can('user-delete')
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $listUsers->render() !!}
            </div>
        </div>

    </div>


@endsection
