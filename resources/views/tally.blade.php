Running Total

@foreach($positions as $position)
{!! $position->name !!}
<?php $i = 0; ?>
@foreach($position->candidates->sortByDesc('votes') as $candidate)
  {!! mb_str_pad(str_pad(++$i . ".", 4, " ") . $candidate->code . " ", 15, ".", STR_PAD_RIGHT) !!}{!! str_pad($candidate->votes->count(), 4, " ", STR_PAD_LEFT) !!}
@endforeach

@endforeach