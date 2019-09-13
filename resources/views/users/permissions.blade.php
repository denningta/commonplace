@extends('layouts.master')

@section('content')

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Permissions</th>
      <th scope="col">Acct. Created</th>
      <th scope="col">Acct. Updated</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

@foreach( $users as $user)
    <tr>
      <th scope="row">{{ $user->id }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->permissions }}</td>
      <td>{{ $user->created_at }}</td>
       <td>{{ $user->updated_at }}</td>
       <td>
            <a class="btn btn-sm btn-outline-primary" href="{{ route('userUpdate', $user) }}">
                 <i class="fas fa-edit"></i>
            </a>
        </td>
        <td>
            <a class="btn btn-sm btn-outline-danger" href="">
                <i class="fa fa-trash"></i>
            </a>
       </td>
    </tr>
@endforeach

  </tbody>
</table>


@endsection