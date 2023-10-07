@extends('layouts.mainlayout')

@section('title', 'Banned Users')
    
@section('content')
    <h1>
        Banned Users List
    </h1>

    <div class="d-flex justify-content-end">
        <a href="/users" class="btn btn-primary me-3 mt-5">Back</a>
    </div>

    <div class="mt-5">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
    @endif
</div>


    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bannedUsers as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->username }}</td>
                    <td>
                        @if ($item->phone)
                            {{ $item->phone }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="/user-restore/{{$item->slug}}" class="btn btn-info">Restore</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection