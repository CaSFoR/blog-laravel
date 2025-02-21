@extends('master-dashboard.index')

@section('content-admin')

<table class="table table-hover mt-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Status</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
    <tr>
      <th scope="row">{{ $user->id }}</th>
      <td>{{ $user->name }}</td>
      <td>&commat;{{ $user->username }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->role->name }}</td>
      <td style="color: {{ $user->is_active ? 'blue' : 'gray' }};">
        {{ $user->is_active ? 'Active' : 'Inactive' }}
      </td>
      <td class="d-flex justify-content-center gap-2 align-items-center">
        <a href="{{ route('user.edit',$user->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger"
            onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>

@endsection