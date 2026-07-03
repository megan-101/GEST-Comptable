@extends('app')

@section('content')

<h1 class="mt-4">Liste des Traces</h1>
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
        @forelse ($listeTracess as $Traces)
            <tr>
                <th scope="row">{{ $Traces->action }}</th>
                <td>{{ $Traces->message }}</td>
                <td>{{ $Traces->user_id }}</td>
                <td class="text-center">
                    <a href="{{ route('Traces.read', $Traces->user_id) }}" class="btn btn-outline-primary btn-sm">consulter</a>
                </td>
               
            </tr>
        @empty
            <tr>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
