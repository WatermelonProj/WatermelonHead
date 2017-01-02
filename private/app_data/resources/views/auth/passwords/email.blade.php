@extends('default.default')

@section('title', 'Esqueci Minha Senha - Watermelon Project')
@section('content')
<div class="container">
    <div class="row">
        <div class="medium-32 medium-offset-8">
          <h2>Esqueci Minha Senha</h2>
              @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif

              <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                  {{ csrf_field() }}

                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <label for="email" class="medium-6 control-label columns">Email</label>

                      <div class="medium-42 columns">
                          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                          @if ($errors->has('email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="medium-24 medium-offset-16">
                          <button type="submit" class="button primary">
                              Enviar link para alterar a senha
                          </button>
                      </div>
                  </div>
              </form>
        </div>
    </div>
</div>
@endsection
