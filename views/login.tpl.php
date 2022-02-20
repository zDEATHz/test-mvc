<!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Login</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
			<div class="row">
					<div style="margin: 0 auto; width: 850px;"><h3 style="color: red"><?= $pageData['message']; ?></h3></div>
				</div>
				<div class="row">
					<div class="col-sm-5">
						<div class="basic-login">
						
						
							
							
							<?php if($pageData['isAdmin'] == true){ ?>
							<form role="form" role="form" action="<?=URL;?>user/logout" method="get">
								<div class="form-group">
								<label for="submit"><i class="icon-lock"></i> <b>Вы авторизованы</b></label>
									<button id="submit" type="submit" class="btn pull-right">Выйти</button>
									<div class="clearfix"></div>
								</div>
							</form>
							<?php } else{ ?>
							
							<form role="form" role="form" action="<?=URL;?>user/login" method="post">
								<div class="form-group">
		        				 	<label for="login-username"><i class="icon-user"></i> <b>Имя</b></label>
									<input class="form-control" name="login" id="login-username" type="text" placeholder="">
								</div>
								<div class="form-group">
		        				 	<label for="login-password"><i class="icon-lock"></i> <b>Пароль</b></label>
									<input class="form-control" name="password" id="login-password" type="password" placeholder="">
								</div>
								<div class="form-group">
									<button type="submit" class="btn pull-right">Войти</button>
									<div class="clearfix"></div>
								</div>
							</form>
							
							
							<?php } ?>
							
						</div>
					</div>
					<div class="col-sm-7 social-login">
						<p>Or login with your Facebook or Twitter</p>
						<div class="social-login-buttons">
							<a href="#" class="btn-facebook-login">Login with Facebook</a>
							<a href="#" class="btn-twitter-login">Login with Twitter</a>
						</div>
						<div class="clearfix"></div>
						<div class="not-member">
							<p>Not a member? <a href="page-register.html">Register here</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
