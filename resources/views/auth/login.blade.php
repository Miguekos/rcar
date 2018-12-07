<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | SCHETTINI</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="loginnew/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginnew/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginnew/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginnew/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginnew/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginnew/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginnew/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="loginnew/vendor/select2/select2.min.css"> -->
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="loginnew/vendor/daterangepicker/daterangepicker.css"> -->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginnew/css/util.css">
	<link rel="stylesheet" type="text/css" href="loginnew/css/main.css">
<!--===============================================================================================-->
<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet" type="text/css">
  <link href="loginnew/vuetify.min.css" rel="stylesheet" type="text/css"></link>
</head>
<body style="background-color: #666666;">
  <div id="app">
      <v-app>


	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="{{ route('login') }}" method="POST" class="login100-form">
          {{ csrf_field() }}


					<span class="login100-form-title p-b-43">
						<img src="loginnew/images/logo.png" alt="logo" width="30%"><br>
						SCHETTINI RENT A CAR<br>
            <h6 style="color: grey">Bienvenido, por favor inicia sesion</h6>
					</span>

					<div data-validate = "Ingrese un email valido: ex@abc.xyz">
						<!-- <input class="input100" type="text" name="email"> -->
						<!-- <span class="focus-input100"></span> -->
						<!-- <span class="label-input100">Email</span> -->

          <v-text-field
          autofocus
          value=""
          name="email"
          type="email"
          label="Email"
          ></v-text-field>


					</div>

					<div data-validate="Password es obligatoria">
						<!-- <input class="input100" type="password" name="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span> -->
            <v-text-field
              label="Login"
              name="password"
              type="password"
            ></v-text-field>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Recuerdame
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>


					 <v-flex xs12 sm6>
						<!-- <button class="login100-form-btn">
							Login
						</button> -->
            <v-btn type="submit" block dark color="black">Login</v-btn>
					</v-flex>

					<!-- <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div> -->
				</form>

				<div class="login100-more" style="background-image: url('loginnew/images/bg-01.png');">
				</div>
			</div>
		</div>
	</div>






      </v-app>
    </div>
  <script src="/loginnew/vue.js"></script>
  <script src="/loginnew/vuetify.js"></script>
  <script>
    new Vue({ el: '#app' })
  </script>
<!--===============================================================================================-->
	<script src="loginnew/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="loginnew/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="loginnew/vendor/bootstrap/js/popper.js"></script>
	<script src="loginnew/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<!-- <script src="loginnew/vendor/select2/select2.min.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="loginnew/vendor/daterangepicker/moment.min.js"></script> -->
	<!-- <script src="loginnew/vendor/daterangepicker/daterangepicker.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="loginnew/vendor/countdowntime/countdowntime.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="loginnew/js/main.js"></script> -->


</body>
</html>
