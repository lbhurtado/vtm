Electronic Ballot #{!! $ballotId !!}

@foreach($positions as $position => $polls)
{!! $position !!}
@foreach($polls as $index => $poll)
  {{ str_pad(str_limit(strtoupper($poll['candidate']), 10, ""), 10, " ", STR_PAD_RIGHT) }}
@endforeach
@endforeach