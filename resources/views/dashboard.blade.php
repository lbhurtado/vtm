@extends('layouts.screen')

@section('content')
<div class="container">
  <div class="row no-gutters">
      <div class="col-sm-3">
        <table class="table table-sm table-dark">
          <tbody>
              <tr>
                <td>Ballot Id</td>
                <td>{{ $ballot->code }}</td>
              </tr>
              <tr>
                <td>Date</td>
                <td>14 Nov 1961</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
          </tbody>
        </table>
      </div>
      <div class="col-sm-6">
        <table class="table table-sm table-dark">
          <tbody>
              <tr>
                <td class="text-center">Currimao, Ilocos Norte</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="text-center">Precinct 0001A</td>
              </tr>
          </tbody>
        </table>
      </div>
      <div class="col-sm-3">
        <div class="mx-auto">
          <p class="text-white bg-dark">11 1530H May 2019</p>
        </div>
      </div>
  </div>
  <div class="row no-gutters">
    <div class="col-sm-3">
      <table class="table table-sm table-dark">
        <tbody>
          @foreach($ballot->positions as $position)
              @php 
                  $candidate = $position->pivot->candidate;                            
              @endphp
              <tr>
                <td>{{ $position->name }}</td>
                <td class="text-right">{{ $candidate->sequence }}</td>
                <td>{{ $candidate->code }}</td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-sm-6">
      <img class="img-fluid" src="{{ asset($ballot->image) }}">
    </div>
    <div class="col-sm-3">
      <table class="table table-sm table-dark">
        <tbody>
          @foreach($positions as $position)
            <tr>
              <td colspan="3">{{ $position->name }}</td>
            </tr>
            <?php $i = 0; ?>
            @foreach($position->candidates->sortByDesc('votes') as $candidate)
            <tr>
              <td>{{ ++$i }}.</td>
              <td>{{ $candidate->code }}</td>
              <td class="text-right">{{ $candidate->votes->count() }}</td>
            </tr>
              
            @endforeach  
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection