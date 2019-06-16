Running Total {}

@foreach($positions as $position)
{!! $position->name !!}
@foreach($position->candidates->sortByDesc('votes') as $candidate)
  {!! mb_str_pad($candidate->code . " ", 14, ".", STR_PAD_RIGHT) !!}{!! str_pad($candidate->votes->count(), 4, " ", STR_PAD_LEFT) !!}
@endforeach

@endforeach