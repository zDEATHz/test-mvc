
<!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Добавить задачу</h1>
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
						
							<form role="form" action="<?=URL;?>index/add" method="post">
								<div class="form-group">
		        				 	<label for="register-username"><i class="icon-user"></i> <b>Автор</b></label>
									<input class="form-control" type="text" name="user" value=""  placeholder="">
								</div>
								<div class="form-group">
		        				 	<label for="register-password"><i class="icon-lock"></i> <b>Email</b></label>
									<input class="form-control" type="text" name="email" value=""  placeholder="">
								</div>
								<div class="form-group">
		        				 	<label for="register-password2"><i class="icon-lock"></i> <b>Текст</b></label>
									<textarea rows="10" cols="45" class="form-control" type="text" name="content" placeholder=""></textarea>
								</div>
								<div class="form-group">
									<button type="submit" class="btn pull-right">Отправить</button>
									<div class="clearfix"></div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-sm-6 col-sm-offset-1 social-login">
						<p>You can use your Facebook or Twitter for registration</p>
						<div class="social-login-buttons">
							<a href="#" class="btn-facebook-login">Use Facebook</a>
							<a href="#" class="btn-twitter-login">Use Twitter</a>
						</div>
					</div>
				</div>
			</div>
		</div>
