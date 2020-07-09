@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Подтвердите свой E-Mail</div>

        <div class="card-body">
          @if(session('resent'))
            <div class="alert alert-success" role="alert">
              Новая ссылка была отправлена вам на почту
            </div>
          @endif

          Проверьте почту
          <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="p-0 m-0 align-baseline btn btn-link">Отправить еще одну</button>.
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
