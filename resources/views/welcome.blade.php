<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{  asset('css/login-style.css') }}" rel="stylesheet">
</head>
  <body>
  <div class="wrapper w100">
      <div class="container ">
            <input id='tab1' name="tabs" type='radio' checked />
            <input id='tab2' name="tabs" type='radio' />
            <div class="tabs w100">
              <label class="t1" for='tab1'>Login</label>
              <label class="t2" for='tab2'>Sign up</label>
            </div>
            <div class="content w100" id="contentOne">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                      <div class="field">
                          <input id="uname" placeholder="Email Adress" type="text" name="email">
                          <svg class="icon">
                              <use xlink:href="#icon-person"></use>
                          </svg>
                      </div>
                      <div class="field">
                          <input id="upass" placeholder="Password" type="password" name="password">
                          <svg class="icon">
                              <use xlink:href="#icon-lock"></use>
                          </svg>
                          <svg class="icon-eye" onclick="togglePassVisibility('upass');">
                              <use xlink:href="#icon-eye"></use>
                          </svg>
                      </div>
                      <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                      </x-primary-button>
                      <div class="field small">
                        <a href="#forgot" tabindex="5" class="forgot-password">Forgot Password?</a>
                      </div>
                      <div class="google-login">
                        <a href="{{ route('google.redirect') }}">
                            <button type="button" class="google-button">Login with Google</button>
                        </a>
                      </div>
                </form>
            </div>
            <div class="content w100" id="contentTwo">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                      <div class="field">
                          <input id="rname" placeholder="choose a username" type="text" name="name" required>
                          <svg class="icon">
                              <use xlink:href="#icon-person"></use>
                          </svg>
                      </div>
                      <div class="field">
                          <input id="rmail" placeholder="your email" type="email" name="email" required>
                          <svg class="icon">
                              <use xlink:href="#icon-mail"></use>
                          </svg>
                      </div>
                      <div class="field">
                          <input id="rpass" placeholder="choose a password" type="password" name="password" required>
                          <svg class="icon">
                              <use xlink:href="#icon-lock"></use>
                          </svg>
                          <svg class="icon-eye" onclick="togglePassVisibility('rpass');">
                              <use xlink:href="#icon-eye"></use>
                          </svg>
                      </div>
                        <div class="field">
                            <input id="rpass" placeholder="Confirm password" type="password" name="password_confirmation" required>
                            <svg class="icon">
                                <use xlink:href="#icon-lock"></use>
                            </svg>
                            <svg class="icon-eye" onclick="togglePassVisibility('rpass');">
                                <use xlink:href="#icon-eye"></use>
                            </svg>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            {{-- @if (Route::has('password.request'))
                                <a style="font-size: 15px">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif --}}
                            <button type="submit" class="sign-up"> Sign up
                                <svg class="icon">
                                    <use xlink:href="#icon-arrow-right-outline">
                                        {{ __('Register') }}
                                    </use>
                                </svg>
                            </button>
                        </div>
                        <div class="google-login">
                            <a href="{{ route('google.redirect') }}">
                                <button type="button" class="google-button">Login with Google</button>
                            </a>
                          </div>
                        <div class="field small">
                          By clicking Register, you agree to the <a href="#terms">Terms and Conditions</a> set out by this site, including our <a href="#cookies">Cookie Use</a>.
                        </div>
                </form>
            </div>
      </div>
  </div>

  <div id="forgot" class="pop w100">
      <div class="dialog">
          <h2>Password Recovery</h2>
          <a href="#">&#x2715;</a>
          <form action="javascript:return false;">
              <div class="field">
                  <input id="uname" placeholder="E-mail" type="email" name="recover" required>
                  <svg class="icon">
                      <use xlink:href="#icon-mail"></use>
                  </svg>
              </div>
              <button type="submit"> Send new password
                  <svg class="icon">
                      <use xlink:href="#icon-arrow-right-outline"></use>
                  </svg>
              </button>
          </form>
      </div>
  </div>
  <div id="terms" class="pop w100">
      <div class="dialog">
          <h2>Terms and Conditions</h2>
          <a href="#">&#x2715;</a>
          <div> By accessing this website, you are agreeing to be bound by these terms of service, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws. Mauris suscipit aliquet tellus sit amet venenatis.
            Nulla ac neque eu turpis rhoncus fringilla. In in lectus tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec tincidunt ultricies tristique. Vestibulum consectetur ultrices lacus, et scelerisque sem pharetra quis. Pellentesque
            blandit ex a ex congue vulputate ac eget mauris. Praesent aliquam vel purus sit amet hendrerit. In non leo est. Maecenas sed risus porta, pellentesque lacus sit amet, lacinia leo. Cras finibus ullamcorper ipsum, at bibendum urna efficitur id. Maecenas
            egestas in leo sit amet rhoncus. Nunc in orci sit amet tortor vulputate porta. Curabitur a semper elit. Morbi eleifend maximus ipsum nec scelerisque. Curabitur rhoncus non leo at elementum. Cras iaculis id nunc in viverra.
          </div>
      </div>
  </div>
  <div id="cookies" class="pop w100">
      <div class="dialog">
          <h2>Cookie Policy</h2>
          <a href="#">&#x2715;</a>
          <div>As is common practice with almost all professional websites this site uses cookies, which are tiny files that are downloaded to your computer, to improve your experience. 
          </div>
      </div>
  </div>
  <svg class="svg-icons">
          <symbol id="icon-person" viewBox="0 0 24 24">
              <path d="M12 14.016c2.672 0 8.016 1.313 8.016 3.984v2.016h-16.031v-2.016c0-2.672 5.344-3.984 8.016-3.984zM12 12c-2.203 0-3.984-1.781-3.984-3.984s1.781-4.031 3.984-4.031 3.984 1.828 3.984 4.031-1.781 3.984-3.984 3.984z"></path>
          </symbol>
          <symbol id="icon-lock" viewBox="0 0 24 24">
              <path d="M8.5 11c0 0.732 0.166 1.424 0.449 2.051l-3.949 3.949c0 0 0 0.672 0 1.5s0.896 1.5 2 1.5h2v-2h2v-2c0 0 2.329 0 2.5 0 2.762 0 5-2.238 5-5s-2.238-5-5-5-5 2.238-5 5zM13.5 13c-1.104 0-2-0.896-2-2 0-1.105 0.896-2.002 2-2.002 1.105 0 2 0.896 2 2.002 0 1.104-0.895 2-2 2z"></path>
          </symbol>
          <symbol id="icon-mail" viewBox="0 0 24 24">
              <path d="M12 11.016l8.016-5.016h-16.031zM20.016 18v-9.984l-8.016 4.969-8.016-4.969v9.984h16.031zM20.016 3.984c1.078 0 1.969 0.938 1.969 2.016v12c0 1.078-0.891 2.016-1.969 2.016h-16.031c-1.078 0-1.969-0.938-1.969-2.016v-12c0-1.078 0.891-2.016 1.969-2.016h16.031z"></path>
          </symbol>
          <symbol id="icon-arrow-right-outline" viewBox="0 0 24 24">
                  <path d="M13.293 7.293c-0.391 0.391-0.391 1.023 0 1.414l2.293 2.293h-7.586c-0.552 0-1 0.448-1 1s0.448 1 1 1h7.586l-2.293 2.293c-0.391 0.391-0.391 1.023 0 1.414 0.195 0.195 0.451 0.293 0.707 0.293s0.512-0.098 0.707-0.293l4.707-4.707-4.707-4.707c-0.391-0.391-1.023-0.391-1.414 0z"></path>
          </symbol>
          <symbol id="icon-eye" viewBox="0 0 24 24">
              <path d="M12 9c1.641 0 3 1.359 3 3s-1.359 3-3 3-3-1.359-3-3 1.359-3 3-3zM12 17.016c2.766 0 5.016-2.25 5.016-5.016s-2.25-5.016-5.016-5.016-5.016 2.25-5.016 5.016 2.25 5.016 5.016 5.016zM12 4.5c5.016 0 9.281 3.094 11.016 7.5-1.734 4.406-6 7.5-11.016 7.5s-9.281-3.094-11.016-7.5c1.734-4.406 6-7.5 11.016-7.5z"></path>
              <rect id="visible" style="stroke-width:3;" width="19.118645" height="0.40677965" x="6.4119263" y="-3.57639"
                  transform="matrix(0.54941993,0.83554637,-0.83554637,0.54941993,0,0)" />
          </symbol>
      </svg>
        <script>
              $ = id => {
                return document.getElementById(id);
                }
              togglePassVisibility = el => {
                $(el).type === "password"? 
                  $(el).type = "text"
                  : $(el).type = "password";
                $("visible").style.display === "none"?
                  $("visible").style.display = "block"
                  : $("visible").style.display = "none";
              }
        </script>
  </body>
</html>