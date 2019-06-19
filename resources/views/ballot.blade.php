@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($positions as $position)
                    <div class="card-header">{{ __($position->name) }}</div>
                    @foreach($position->candidates as $candidate)
                    <div class="card-body">
                        <form method="POST" action="{{ route('ballot-candidate') }}">
                            @csrf
                            <input type="hidden" name="ballot_code" value="ABC-0002">
                            <input type="hidden" name="seat_id" value=1>
                            <div class="form-group row mb-0">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary" name="candidate_code" value="{{ __($candidate->code) }}">
                                        {{ __($candidate->code) }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endforeach
                @endforeach

                <!-- <div class="card-header">{{ __('President') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('ballot-candidate') }}">
                        @csrf
                        <input type="hidden" name="ballot_code" value="ABC-0002">
                        <input type="hidden" name="seat_id" value=1>
                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" name="candidate_code" value="MACAPAGAL">
                                    {{ __('Macapagal') }}
                                </button>
                                <button type="submit"class="btn btn-primary" name="candidate_code" value="GARCIA">  
                                    {{ __('Garcia') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-header">{{ __('Senator') }}</div>                
                <div class="card-body">
                    <form method="POST" action="{{ route('ballot-candidate') }}">
                        @csrf
                        <input type="hidden" name="ballot_code" value="ABC-0002">       
                        <input type="hidden" name="seat_id" value=5>
                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" name="candidate_code" value="OSIAS">
                                    {{ __('Osias') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection
