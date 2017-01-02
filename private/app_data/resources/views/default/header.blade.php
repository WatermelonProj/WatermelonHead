<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/bower_components/foundation-icon-fonts/foundation-icons.css">
    <link rel="stylesheet" href="/css/app.css">
  </head>
    <body>
      <header>
        <div class="row">
          <div class="medium-12 small-36 columns" id="logo">
            <img src="/img/logo.svg" width="100%" />
          </div>
          <div class="medium-12 small-12 columns hide-for-medium">
            <ul class="menu li-floatRight" id="smallMenu">
              <li><a><i class="fi-list"></i></a></li>
            </ul>
          </div>
          <div class="medium-24 small-48 columns smallMenu hide-for-small-only">
            <nav>
              <ul class="menu">
                <li><a href="/">Início</a></li>
                <li><a href="#">Receitas</a></li>
                <li><a href="#">Cardápios</a></li>
                <li><a href="#">Usuários</a></li>
              </ul>
            </nav>
          </div>
          <div class="medium-12 small-48 columns textRight smallMenu hide-for-small-only">
            <ul class="menu li-floatRight">
              <li><a href="/login">Logar</a></li>
            </ul>
          </div>
        </div>
      </header>

      <!-- modal content -->

      <div class="reveal" id="modalLogin" data-reveal>
        <div class="row">
          <div class="large-48 columns auth-plain">
            <div class="signup-panel left-solid">
              <p class="welcome">Login</p>
              <div class="callout alert displayNone" id="alertaLogin">
                <h5>ERRO!</h5>
                <p></p>
              </div>
              <div class="row collapse">
                <div class="small-2 columns">
                  <span class="prefix"><i class="fi-torso-female loginIcons"></i></span>
                </div>
                <div class="small-46 columns">
                  <input type="text" name="login" id="loginLogin" placeholder="login">
                </div>
              </div>
              <div class="row collapse">
                <div class="small-2 columns">
                  <span class="prefix"><i class="fi-lock loginIcons"></i></span>
                </div>
                <div class="small-46 columns">
                  <input type="password" name="senha" id="senhaLogin" placeholder="senha">
                </div>
              </div>
              <a href="#" class="button" id="loginButton">Login </a>
              <input type="hidden" name="urlSiteP" id="urlSiteP" value="http://www.syslunch.xyz/">
            </div>
          </div>
         </div>
         <small>Para fechar essa caixa, clique em qualquer parte da página fora dela.</small>
      </div>
