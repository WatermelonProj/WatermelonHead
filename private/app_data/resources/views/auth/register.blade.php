@extends('default.default')

@section('title', 'Cadastro - Watermelon Project')
@section('content')
<div class="container">
    <div class="row">
        <div class="medium-32 medium-offset-8">
          <h2>Cadastro</h2>
          <!--  Error handle -->
          @if($errors->any())
          <div class="row collapse">
              <ul class="alert-box warning radius">
                  @foreach($errors->all() as $error)
                      <li> {{ $error }} </li>
                  @endforeach
              </ul>
          </div>
          @endif
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
              {{ csrf_field() }}

              <div class="row{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label for="name" class="medium-6 columns">Nome</label>

                  <div class="medium-42 columns">
                      <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                      @if ($errors->has('name'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="row{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email" class="medium-6 columns">Email</label>

                  <div class="medium-42 columns">
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="row{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password" class="medium-6 columns">Senha</label>

                  <div class="medium-42 columns">
                      <input id="password" type="password" class="form-control" name="password" required>

                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="row">
                  <label for="password-confirm" class="medium-6 columns">Repita a senha</label>

                  <div class="medium-42 columns">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                  </div>
              </div>

              <div class="row">
                  <label for="password-confirm" class="medium-6 columns">Data de Nascimento</label>

                  <div class="medium-42 columns">
                      <input id="nascimentoUsuario" type="date" class="form-control" name="nascimentoUsuario" required>
                  </div>
              </div>

              <div class="row">
                  <div class="medium-24 medium-offset-12 columns">
                      <button type="submit" class="button">
                          Cadastrar
                      </button>
                  </div>
              </div>
          </form>
        </div>
    </div>
</div>
@endsection

@section('script:import')
  <script src="/js/jquery.mask.min.js"></script>
@endsection
@section('script')
  <script>
    $(document).ready(function(){
      $("#nascimentoUsuario").mask("00/00/0000");
    });
  </script>
@endsection
