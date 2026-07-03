@extends('app')

@section('content')

<h1 class="mt-4">Liste des Logs</h1>
<hr />


<table class="table table-striped table-bordered mt-2">
    <thead class="table-dark">
        <tr>
            <th scope="col">Action</th>
            <th scope="col">Message</th>
            <th scope="col">User_id</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($logs as $log)
            <tr>
                <th scope="row">{{ $log->action }}</th>
                <td>{{ $log->message }}</td>
                <td class="text-center">
                    <a href="{{ route('logs.read', $log->id) }}" class="btn btn-outline-primary btn-sm">consulter</a>
                </td>
               
            </tr>
        @empty
            <tr>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
