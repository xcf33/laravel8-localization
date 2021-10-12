@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Example Form') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('example-form', ['locale' => app()->getLocale()]) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="int_number" class="col-md-4 col-form-label text-md-right">{{ __('Enter a integer number') }}</label>

                            <div class="col-md-6">
                                <input id="int_number" type="text" class="form-control @error('int_number') is-invalid @enderror" name="int_number" value="{{ old('int_number') }}" autofocus>

                                @error('int_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
