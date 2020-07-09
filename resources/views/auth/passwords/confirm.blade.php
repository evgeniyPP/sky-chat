@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Подтвердите пароль</div>

        <div class="card-body">
          Подтвердите пароль перед началом

          <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="mb-0 form-group row">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  Подтвердите пароль
                </button>

                @if(Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                    Забыли пароль?
                  </a>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
