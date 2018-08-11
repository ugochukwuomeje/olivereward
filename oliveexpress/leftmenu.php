<div class="col-md-3 sidebar_box">
	   	 <div class="sidebar">
			<div class="menu_box">
		    <h3 class="menu_head"><a href='index.php' style='color:white'>Products Menu</a></h3>
			  <ul class="menu">
				
					<?php
					$sql_class = "SELECT * FROM class";
					$class_query = $con->query($sql_class);
					
					while($row_class = mysqli_fetch_array($class_query))
							{
									$classid = $row_class['sn'];
									$classname = $row_class['name'];
				
						$sql_category = "SELECT * FROM categories WHERE class = '$classid'";
						$category_query = $con->query($sql_category);
						
						echo"<li class='item1'><a href='#'><img class='arrow-img' src='images/f_menu.png' alt=''/> $classname</a>";
							echo"<ul class='cute'>";
							
							while($row_category = mysqli_fetch_array($category_query)){
								
								$category_name  = $row_category['cat_title'];
								$catid = $row_category['cat_id'];
								echo"<li class='subitem1'><a href='index.php?cat=$catid'>$category_name </a></li>";
								
							}
							echo"</ul>";
						echo"</li>";
							}
					?>
				</ul>
		</div>
				<!--initiate accordion-->
		<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });
			
			});
		</script>
       </div>
		   
	   </div> 