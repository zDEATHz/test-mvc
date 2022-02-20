

        

        <!-- Homepage Slider -->
        <div class="homepage-slider">
        	<div id="sequence">
			
			

			</form>
				<ul class="sequence-canvas">
					<!-- Slide 1 -->
					<li class="bg4">
						<!-- Slide Title -->
						<h2 class="title">Responsive</h2>
						<!-- Slide Text -->
						<h3 class="subtitle">It looks great on desktops, laptops, tablets and smartphones</h3>
						<!-- Slide Image -->
						<img class="slide-img" src="/<?=URL;?>assets/img/homepage-slider/slide1.png" alt="Slide 1" />
					</li>
					<!-- End Slide 1 -->
					<!-- Slide 2 -->
					<li class="bg3">
						<!-- Slide Title -->
						<h2 class="title">Color Schemes</h2>
						<!-- Slide Text -->
						<h3 class="subtitle">Comes with 5 color schemes and it's easy to make your own!</h3>
						<!-- Slide Image -->
						<img class="slide-img" src="/<?=URL;?>assets/img/homepage-slider/slide2.png" alt="Slide 2" />
					</li>
					<!-- End Slide 2 -->
					<!-- Slide 3 -->
					<li class="bg1">
						<!-- Slide Title -->
						<h2 class="title">Feature Rich</h2>
						<!-- Slide Text -->
						<h3 class="subtitle">Huge amount of components and over 30 sample pages!</h3>
						<!-- Slide Image -->
						<img class="slide-img" src="/<?=URL;?>assets/img/homepage-slider/slide3.png" alt="Slide 3" />
					</li>
					<!-- End Slide 3 -->
				</ul>
				<div class="sequence-pagination-wrapper">
					<ul class="sequence-pagination">
						<li>1</li>
						<li>2</li>
						<li>3</li>
					</ul>
				</div>
			</div>
        </div>
        <!-- End Homepage Slider -->


		<!-- Services -->
        <div class="section">
	        <div class="container">
			
	        	<div class="row">
				<div style="margin: 0 0 0 24px;">
					
					<form role="form" action="/<?=URL;?>index/index" method="get" >
					
					<select class="btn btn-info dropdown-toggle" name="sort" id="sort">
						<option disabled selected>Сортировка</option>
						<option value="user">По пользователю</option>
						<option value="email">По email</option>
						<option value="status">По статусу</option>
					</select>
					

					</form>
				</div>
					
					<?php foreach ($pageData['tasks'] as $row) { ?>
						<div class="col-md-4 col-sm-6">
							<div class="service-wrapper">
								<img src="/<?=URL;?>assets/img/service-icon/ruler.png" alt="Service 1">
								<h3><?php echo $row["user"] ?></h3>
								<p><?php echo $row["content"]; ?></p>
								<p><?php echo $row["status"] == 1 ? 'Решено' : 'Не решено';?></p>
								<p><?php echo $row["edited"] == 0 ? '' : 'Редактировано администратором';?></p>
								<a href="/<?=URL;?>index/edit?id=<?php echo $row["id"];?>" class="btn">Редактировать</a>
							</div>
						</div>
					<?php } ?>
		
					
	        	</div>
				<div style="    display: flex; justify-content: space-around; width: 130px; margin: 0 auto;">
				
				
				<?php
					// TODO: оформить в виде виджета
				
					$pervpage = '';
					$page2left = '';
					$page1left = '';
					$page1right = '';
					$page2right = '';
					$nextpage = '';
					
					// Проверяем нужны ли стрелки назад
					if ($pageData['page'] != 1) $pervpage = '<a href= /'.URL.'index/index?page=1><<</a>
												   <a href= /'.URL.'index/index?page='. ($pageData['page'] - 1) .'><</a> ';
					// Проверяем нужны ли стрелки вперед
					if ($pageData['page'] != $pageData['totalPage']) $nextpage = ' <a href= /'.URL.'index/index?page='. ($pageData['page'] + 1) .'>></a>
													   <a href= /'.URL.'index/index?page=' .$pageData['totalPage']. '>>></a>';

					// Находим две ближайшие станицы с обоих краев, если они есть
					if($pageData['page'] - 2 > 0) $page2left = ' <a href= /'.URL.'index/index?page='. ($pageData['page'] - 2) .'>'. ($pageData['page'] - 2) .'</a> | ';
					if($pageData['page'] - 1 > 0) $page1left = '<a href= /'.URL.'index/index?page='. ($pageData['page'] - 1) .'>'. ($pageData['page'] - 1) .'</a> | ';
					if($pageData['page'] + 2 <= $pageData['totalPage']) $page2right = ' | <a href= /'.URL.'index/index?page='. ($pageData['page'] + 2) .'>'. ($pageData['page'] + 2) .'</a>';
					if($pageData['page'] + 1 <= $pageData['totalPage']) $page1right = ' | <a href= /'.URL.'index/index?page='. ($pageData['page'] + 1) .'>'. ($pageData['page'] + 1) .'</a>';

					// Вывод меню
					echo $pervpage.$page2left.$page1left.'<b>'.$pageData['page'].'</b>'.$page1right.$page2right.$nextpage;

				?>
				
				
				
				
				</div>
	        </div>
	    </div>
	    <!-- End Services -->
		
		<script>
			function setCookie(name,value,days) {
				var expires = "";
				if (days) {
					var date = new Date();
					date.setTime(date.getTime() + (days*24*60*60*1000));
					expires = "; expires=" + date.toUTCString();
				}
				document.cookie = name + "=" + (value || "")  + expires + "; path=/";
			}
			function getCookie(name) {
				var nameEQ = name + "=";
				var ca = document.cookie.split(';');
				for(var i=0;i < ca.length;i++) {
					var c = ca[i];
					while (c.charAt(0)==' ') c = c.substring(1,c.length);
					if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
				}
				return null;
			}
			function eraseCookie(name) {
				document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
			}


		$(document).ready(function() {
			$('#sort').change(function() {
			  // do stuff here;
			  let sort = $("#sort").val();
			  
			  
			  if((getCookie('sort_way') == 'desc') && (getCookie('sort') == sort)){
				  setCookie('sort_way','asc',7);
			  } else {
				  setCookie('sort_way','desc',7);
			  }
				setCookie('sort',sort,7);
			  location.reload();
			});
		});
		
		
		</script>

		

