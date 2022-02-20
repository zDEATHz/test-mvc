
<!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1><?= $pageData['title']; ?></h1>
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
						
							<!--<form role="form" action="/<?=PUBLIC_DIR;?>/index/<?php echo $pageData['tasks']['id'] ? "edit?id=".$pageData['tasks']['id'] : 'add' ?>" method="post"> -->
							<form role="form" action="<?=URL;?>index/<?php echo $pageData['tasks']['id'] ? "edit?id=".$pageData['tasks']['id']."&action=edit" : 'edit?action=add' ?>" method="post">
								<div class="form-group">
		        				 	<label for="register-username"><i class="icon-user"></i> <b>Автор</b></label>
									<input class="form-control" id="register-username" type="text" name="user" value="<?= $pageData['tasks']['user']; ?>"  placeholder="">
								</div>
								<div class="form-group">
		        				 	<label for="register-password"><i class="icon-lock"></i> <b>Email</b></label>
									<input class="form-control" id="register-password" type="email" name="email" value="<?= $pageData['tasks']['email']; ?>"  placeholder="">
								</div>
								
								<div class="form-group">
		        				 	<label for="register-password2"><i class="icon-lock"></i> <b>Текст</b></label>
									<textarea rows="10" id="register-password2" cols="45" class="form-control" type="text" name="content" placeholder=""><?= $pageData['tasks']['content']; ?></textarea>
								</div>
								
								<div class="form-group">
		        				 	<?php 
									$status = $pageData['tasks']['status'] == 1 ? 'checked' : '';
									echo ($pageData['isAdmin']) == true ? '<label for="task-status"><i class="icon-lock"></i> <b>Выполнено</b></label> <input type="checkbox" name="status" id="task-status" '.$status.' data-toggle="toggle" data-size="xs" value="'.$pageData['tasks']['status'].'">  ' : ''; ?>
								</div>
								
								<input type="hidden" name="id" value="<?= $pageData['tasks']['id']; ?>">
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
