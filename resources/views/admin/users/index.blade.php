@extends('admin.layout.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <style>
        .mdi {
            font-size: 22px;
        }

    </style>
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All {{ ucfirst($type) }}s</h4>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                @php $meta = json_decode($user?->meta?->value) @endphp
                                                @if (isset($meta?->photo))
                                                    <img style="height: 60px; width: 60px"
                                                        alt="{{ basename($meta->photo) }}"
                                                        title="{{ basename($meta->photo) }}"
                                                        src="{{ asset($meta->photo) }}" />
                                                @endif
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->status == 1)
                                                    <i class="mdi mdi-check-circle text-primary"></i>
                                                @else
                                                    <i class="mdi mdi-close-circle text-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm" style="border-radius: 0">Edit
                                                </a>
                                                <button type="button" class="btn btn-danger btn-sm" style="border-radius: 0">Delete </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
