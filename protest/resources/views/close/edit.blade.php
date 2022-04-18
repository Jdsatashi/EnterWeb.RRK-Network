@extends('layouts.app')
@section('content')
    <div class="container-md">
        <div class="row justify-content-center">
            <div class="col-md-6 pt-4">
                <div class="card">
                    <div class="card-header">{{ __('Edit closure date') }}</div>
                    <div class="card-body">
                        <form action="{{ __('/close/update/') }}{{ $close->id }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <div class="row mb-3">
                                        <label for="closure_date" class="col-md-6 col-form-label">Closure date</label>

                                        <input id="closure_date" type="date"
                                               class="form-control @error('closure_date') is-invalid @enderror"
                                               name="closure_date" value="{{ old('closure_date') }}" required
                                               autocomplete="closure_date" autofocus>

                                        @error('closure_date')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <div class="row mb-3">
                                        <label for="final_closure_date" class="col-md-6 col-form-label">Final closure date</label>

                                        <input id="final_closure_date" type="date"
                                               class="form-control @error('final_closure_date') is-invalid @enderror"
                                               name="final_closure_date" value="{{ old('final_closure_date') }}" required
                                               autocomplete="final_closure_date" autofocus>

                                        @error('final_closure_date')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0 pb-3">
                                <div class="col-md-4 offset-md-5">
                                    <button type="submit" class="btn btn-info">
                                        {{ __('Edit') }}
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
