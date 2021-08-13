@extends('layouts.dashboard')

@section('content')
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-8 align-self-center">
        <h3>Users</h3>
      </div>
      <div class="col-4">
        <form action="{{ route('dashboard.users') }}" method="get">
          <div class="input-group">
            <input type="text" class="form-control form-control-sm" name="q" value="{{ $request['q'] ?? '' }}">
            <div class="input-group-append">
              <button type="submit" class="btn btn-secondary btn-sm">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="card-body p-0">
    @if($users->total())
    <table class="table table-borderless table-striped table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Register</th>
          <th>Edited</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <th scope="row">{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</th>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->created_at }}</td>
          <td>{{ $user->updated_at }}</td>
          <td>
            <!-- penggunaan url kurang efektif -->
            <!-- <a href="{{ url('dashboard/user/edit/'. $user->id) }}" title="Edit" class="btn btn-success btn-sm"><i class="fas fa-pen"></i></a> -->
            <!-- penggunaan route lebih efektif -->
            <a href="{{ route('dashboard.users.edit', ['id' => $user->id]) }}" title="Edit" class="btn btn-success btn-sm"><i class="fas fa-pen"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    {{ $users->appends($request)->links() }}
    @else
    <h4 class="text-center p-3">{{ __('messages.no_data', ['module' => 'user']) }}</h4>
    @endif
  </div>
</div>
@endsection