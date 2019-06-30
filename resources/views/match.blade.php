@extends('layouts.screen')

@section('content')
<div class="container-fluid">
    <div class="table-responsive-sm">
    <table class="table table-sm table-dark">
      <tbody>
        @foreach($ballot->positions as $position)
            @php 
                $candidate = $position->pivot->candidate;                            
            @endphp
            <tr>
              <td>{{ $position->name }}</td>
              <td>{{ $candidate->code }} ({{ $candidate->sequence }})</td>
            </tr>
        @endforeach
      </tbody>
    </table>
    </div>
</div>
@endsection