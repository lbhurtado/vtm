Matching Electronic Ballot

@foreach($positions as $position)

{{ str_pad($position->name, 14, ' ', STR_PAD_RIGHT) }} - {!! optional($position->pivot->candidate)->code !!}
@endforeach