@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('bku.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="tanggal" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal') }}</label>

                            <div class="col-md-6">
                                <input id="tanggal" type="text" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal') }}" autocomplete="tanggal" autofocus>

                                @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="bukti" class="col-md-4 col-form-label text-md-end">{{ __('Bukti') }}</label>

                            <div class="col-md-6">
                                <input id="bukti" type="text" class="form-control @error('bukti') is-invalid @enderror" name="bukti" value="{{ old('bukti') }}" autocomplete="bukti" autofocus>

                                @error('bukti')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="uraian" class="col-md-4 col-form-label text-md-end">{{ __('Uraian') }}</label>

                            <div class="col-md-6">
                                <input id="uraian" type="text" class="form-control @error('uraian') is-invalid @enderror" name="uraian" value="{{ old('uraian') }}" autocomplete="uraian" autofocus>

                                @error('uraian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="debet" class="col-md-4 col-form-label text-md-end">{{ __('Debet') }}</label>

                            <div class="col-md-6">
                                <input id="debet" type="text" class="form-control @error('debet') is-invalid @enderror" name="debet" value="{{ old('debet') }}" autocomplete="debet" autofocus>

                                @error('debet')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kredit" class="col-md-4 col-form-label text-md-end">{{ __('Kredit') }}</label>

                            <div class="col-md-6">
                                <input id="kredit" type="text" class="form-control @error('kredit') is-invalid @enderror" name="kredit" value="{{ old('kredit') }}" autocomplete="kredit" autofocus>

                                @error('kredit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="saldo" class="col-md-4 col-form-label text-md-end">{{ __('Saldo') }}</label>

                            <div class="col-md-6">
                                <input id="saldo" type="text" class="form-control @error('saldo') is-invalid @enderror" name="saldo" value="{{ old('saldo') }}" autocomplete="saldo" autofocus>

                                @error('saldo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('bku.index') }}"class="btn btn-sm btn-outline-success">{{ __('Back') }}</a>
                                <button type="submit" class="btn btn-sm btn-outline-success">
                                    {{ __('Save') }}
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