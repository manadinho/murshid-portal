<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{  asset('css/login-style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
                          <input id="uname" placeholder="Email Adress" type="text" name="email" required>
                          <svg class="icon">
                              <use xlink:href="#icon-person"></use>
                          </svg>
                      </div>
                      <div class="field">
                            <input id="upass" placeholder="Password" type="password" name="password" required>
                            <svg class="icon">
                                <use xlink:href="#icon-lock"></use>
                            </svg>
                            <svg class="icon-eye upass-icon-eye" onclick="togglePassVisibility('upass');">
                                <use href="#icon-eye-hidden"></use>
                            </svg>                          
                      </div>                                          
                     <button type="submit"> Login
                            <svg class="icon">
                                <use xlink:href="#icon-arrow-right-outline"></use>
                            </svg>
                     </button>
                      <div class="field small">
                        <a href="#forgot" tabindex="5" class="forgot-password">Forgot Password?</a>
                      </div>
                      <div class="google-login">
                            <a href="{{ route('google.redirect') }}" style="text-decoration: none;">
                                <button type="button" class="google-button">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1" x="0px" y="0px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" aria-hidden="true" focusable="false" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12
                                        c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24
                                        c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                        <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657
                                        C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
                                        <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36
                                        c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
                                        <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571
                                        c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                    </svg>Login with Google
                                </button>
                            </a>
                      </div>
                </form>
            </div>
            <div class="content w100" id="contentTwo">
                <form method="POST" action="{{ route('register') }}">
                    @csrf                    
                    <div class="field">
                        <input id="rmail" placeholder="Your email" type="email" name="email" required>
                        <svg class="icon">
                            <use xlink:href="#icon-mail"></use>
                        </svg>
                    </div>
                    <div class="field">
                        <input id="rname" placeholder="Choose a username" type="text" name="name" required>
                        <svg class="icon">
                            <use xlink:href="#icon-person"></use>
                        </svg>
                    </div>
                    <div class="field">
                        <input id="rpass" placeholder="Password" type="password" name="password" required>
                        <svg class="icon">
                            <use xlink:href="#icon-lock"></use>
                        </svg>
                        <svg class="icon-eye rpass-icon-eye" onclick="togglePassVisibility('rpass');">
                            <use href="#icon-eye-hidden"></use>
                        </svg>                          
                    </div>  
                    <div class="field">
                        <input id="cpass" placeholder="Confirm password" type="password" name="password_confirmation" required>
                        <svg class="icon">
                            <use xlink:href="#icon-lock"></use>
                        </svg>
                        <svg class="icon-eye cpass-icon-eye" onclick="togglePassVisibility('cpass');">
                            <use href="#icon-eye-hidden"></use>
                        </svg>                          
                    </div>
                    <button type="submit"> Sign up
                        <svg class="icon">
                            <use xlink:href="#icon-arrow-right-outline"></use>
                        </svg>
                    </button>
                    <div class="google-login">
                        <a href="{{ route('google.redirect') }}" style="text-decoration: none;">
                            <button type="button" class="google-button">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1" x="0px" y="0px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" aria-hidden="true" focusable="false" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12
                                    c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24
                                    c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                    <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657
                                    C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
                                    <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36
                                    c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
                                    <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571
                                    c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                </svg>Login with Google
                            </button>
                        </a>
                  </div>
                  <div class="field small">
                            By clicking Register, you agree to the <a href="#terms">Terms
                        and Conditions</a> set out by this site, including our <a href="#cookies">Cookie Use</a>.
                  </div>
                </form>
            </div>
      </div>
  </div>
  <div id="forgot" class="pop w100">
      <div class="dialog">
          <h2>Password Recovery</h2>
          <a href="#">&#x2715;</a>
            <!-- Email Address -->
            {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
            <form id="myForm">
                <div class="field">
                    <input id="email" type="email" name="email" placeholder="E-mail" required>
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
          <symbol id="icon-eye-hidden" viewBox="0 0 24 24">
              <path d="M12 9c1.641 0 3 1.359 3 3s-1.359 3-3 3-3-1.359-3-3 1.359-3 3-3zM12 17.016c2.766 0 5.016-2.25 5.016-5.016s-2.25-5.016-5.016-5.016-5.016 2.25-5.016 5.016 2.25 5.016 5.016 5.016zM12 4.5c5.016 0 9.281 3.094 11.016 7.5-1.734 4.406-6 7.5-11.016 7.5s-9.281-3.094-11.016-7.5c1.734-4.406 6-7.5 11.016-7.5z"></path>
              <rect id="visible" style="stroke-width:3;" width="19.118645" height="0.40677965" x="6.4119263" y="-3.57639"
                  transform="matrix(0.54941993,0.83554637,-0.83554637,0.54941993,0,0)" />
          </symbol>
          <symbol id="icon-eye-view" viewBox="0 0 24 24">
            <path d="M12 9c1.641 0 3 1.359 3 3s-1.359 3-3 3-3-1.359-3-3 1.359-3 3-3zM12 17.016c2.766 0 5.016-2.25 5.016-5.016s-2.25-5.016-5.016-5.016-5.016 2.25-5.016 5.016 2.25 5.016 5.016 5.016zM12 4.5c5.016 0 9.281 3.094 11.016 7.5-1.734 4.406-6 7.5-11.016 7.5s-9.281-3.094-11.016-7.5c1.734-4.406 6-7.5 11.016-7.5z"></path>
        </symbol>
  </svg>
        <script>

              document.getElementById('myForm').addEventListener('submit', function (event) {
                event.preventDefault();
                resetRequest(document.getElementById('email').value);
            });

            function resetRequest(email) {
                $.ajax({
                    url: "{{ route('password.email') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "email": email,
                    },
                    success: function (response) {
                        var jsonResponse = @json(session('json_response', ['success' => true, 'message' => 'Password Reset Link Sent']));
                        if (jsonResponse.success) {
                            alert(jsonResponse.message);
                        } else {
                            alert('Error: ' + jsonResponse.message);
                        }
                    }
                });
            }
        </script>
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script>
            function togglePassVisibility(inputId) {
                const passwordField = document.getElementById(inputId);
                const eyeIcon = document.querySelector(`.${inputId}-icon-eye use`);

                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    eyeIcon.setAttribute('href', '#icon-eye-view');
                } else {
                    passwordField.type = 'password';
                    eyeIcon.setAttribute('href', '#icon-eye-hidden');
                }
                }
        </script>

  </body>
</html>