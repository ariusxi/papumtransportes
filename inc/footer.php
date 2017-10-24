    <!--contact start-->
    
    <div id="contact">
    	<div class="line5">					
			<div class="container">
				<div class="row Ama">
					<div class="col-md-12">
					<h3>Precisa de ajuda? Conte conosco!</h3>
					<p>Envie-nos a sua pergunta</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-xs-12 forma">
					<form action="" id="contato" method="post" enctype="multipart/form-data">
						<div id="feedback_c"></div>
						<input type="text" class="col-md-6 col-xs-12 name" id='name' placeholder='Nome *'/>
						<input type="text" class="col-md-6 col-xs-12 Email" id='email' placeholder='Email *'/>
						<textarea type="text" class="col-md-12 col-xs-12 Message" id='message' placeholder='Mensagem *'></textarea>
						<div class="cBtn col-xs-12">
							<button type="reset" class="clear"><i class="fa fa-times"></i>Limpar Formulário</button>
							<button type="submit" class="send"><i class="fa fa-share"></i>Enviar</button>
						</div>
					</form>
				</div>
				<div class="col-md-3 col-xs-12 cont">
					<ul>
						<li><i class="fa fa-home"></i>5512 Lorem Ipsum Vestibulum 666/13</li>
						<li><i class="fa fa-phone"></i>+1 800 789 50 12, +1 800 450 6935</li>
						<li><a href="#"><i class="fa fa-envelope"></i>mail@compname.com</li></a>
						<li><i class="fa fa-skype"></i>compname</li>
						<li><a href="#"><i class="fa fa-twitter"></i>Twitter</li></a>
						<li><a href="#"><i class="fa fa-facebook-square"></i>Facebook</li></a>
						<li><a href="#"><i class="fa fa-dribbble"></i>Dribbble</li></a>
						<li><a href="#"><i class="fa fa-flickr"></i>Flickr</li></a>
						<li><a href="#"><i class="fa fa-youtube-play"></i>YouTube</li></a>
					</ul>
				</div>
			</div>
		</div>
		<!--<div class="line6">
					<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d48386.401887313725!2d-73.9407136!3d40.7147117!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1402409149092" width="100%" height="700" frameborder="0" style="border:0"></iframe>			
		</div>-->
		<div class="container">
			<div class="row ftext">
				<div class="col-md-12">
				<a id="features"></a>
				<h3></h3>
				<p></p>
				</div>
				<div class="cBtn">
					<ul style="margin-top: 23px; margin-bottom: 0px; padding-left: 26px;">
						
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row ftext">
				<div class="col-md-12">
				<a id="features"></a>
				<h3></h3>
				<p> </p>
				</div>
				<div class="cBtn">
					<ul style="margin-top: 23px; margin-bottom: 0px; padding-left: 26px;">
						
					</ul>
			</div>
			</div>
		</div>
		<!--
		<div class="line7">
			<div class="container">
				<div class="row footer">
					<div class="col-md-12">
						<h3></h3>
						<p></p>
				 		<div class="fr">
						<div style="display: inline-block;">
							
						</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>-->
		<div class="lineBlack">
			<div class="container">
				<div class="row downLine">
					<div class="col-md-12 text-right">
						<!--input  id="searchPattern" type="search" name="pattern" value="Search the Site" onblur="if(this.value=='') {this.value='Search the Site'; }" onfocus="if(this.value =='Search the Site' ) this.value='';this.style.fontStyle='normal';" style="font-style: normal;"/-->
						<input  id="searchPattern" type="search" placeholder="Search the Site"/><i class="glyphicon glyphicon-search" style="font-size: 13px; color:#a5a5a5;" id="iS"></i>
					</div>
					<div class="col-md-6 text-left copy">
						<p>Copyright &copy; 2017 PaPumTransportes. </p>
					</div>
				
						<div class="soc col-md-12">
							<ul>
								<li class="soc1"><a href="https://www.linkedin.com/" target="_blank"></a></li>
								<li class="soc2"><a href="https://www.facebook.com/"></a></li>
								<li class="soc3"><a href="https://twitter.com/login?lang=pt"></a></li>
								<li class="soc4"><a href="#"></a></li>
								<li class="soc5"><a href=""></a></li>
								<li class="soc6"><a href="https://www.youtube.com/"></a></li>
								<li class="soc7"><a href="#"></a></li>
								<li class="soc8"><a href="#"></a></li>
								
							</ul>
						</div>
			
					<div class="col-md-6 text-right dm" style="float:right">
						<ul id="downMenu">
							<li class="active"><a href="#home">Home</a></li>
							<li><a href="#about">Avaliações</a></li>
							<li><a href="#project1">Categorias</a></li>
						
							<li class="last"><a href="#contact">Contacto</a></li>
							<!--li><a href="#features">Features</a></li-->
						</ul>
					</div>
				</div>
			</div>
		</div>
    </div>		
		
	<script type='text/javascript' src='<?php echo BASE; ?>js/functions.js'></script>
	<script type='text/javascript' src='<?php echo BASE; ?>js/script.js'></script>
	<script src="<?php echo BASE; ?>js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo BASE; ?>js/bootstrap.min.js"></script>
	<script src="<?php echo BASE; ?>js/jquery.slicknav.js"></script>
	<script>
			$(document).ready(function(){
			$(".bhide").click(function(){
				$(".hideObj").slideDown();
				$(this).hide(); //.attr()
				return false;
			});
			$(".bhide2").click(function(){
				$(".container.hideObj2").slideDown();
				$(this).hide(); // .attr()
				return false;
			});
				
			$('.heart').mouseover(function(){
					$(this).find('i').removeClass('fa-heart-o').addClass('fa-heart');
				}).mouseout(function(){
					$(this).find('i').removeClass('fa-heart').addClass('fa-heart-o');
				});
				
				function sdf_FTS(_number,_decimal,_separator)
				{
				var decimal=(typeof(_decimal)!='undefined')?_decimal:2;
				var separator=(typeof(_separator)!='undefined')?_separator:'';
				var r=parseFloat(_number)
				var exp10=Math.pow(10,decimal);
				r=Math.round(r*exp10)/exp10;
				rr=Number(r).toFixed(decimal).toString().split('.');
				b=rr[0].replace(/(\d{1,3}(?=(\d{3})+(?:\.\d|\b)))/g,"\$1"+separator);
				r=(rr[1]?b+'.'+rr[1]:b);

				return r;
}
				
			setTimeout(function(){
					$('#counter').text('0');
					$('#counter1').text('0');
					$('#counter2').text('0');
					setInterval(function(){
						
						var curval=parseInt($('#counter').text());
						var curval1=parseInt($('#counter1').text().replace(' ',''));
						var curval2=parseInt($('#counter2').text());
						if(curval<=707){
							$('#counter').text(curval+1);
						}
						if(curval1<=12280){
							$('#counter1').text(sdf_FTS((curval1+20),0,' '));
						}
						if(curval2<=245){
							$('#counter2').text(curval2+1);
						}
					}, 2);
					
				}, 500);
			});
	</script>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#menu').slicknav();
		
	});
	</script>
	
	<script type="text/javascript">
    $(document).ready(function(){
       
        var $menu = $("#menuF");
            
        $(window).scroll(function(){
            if ( $(this).scrollTop() > 100 && $menu.hasClass("default") ){
                $menu.fadeOut('fast',function(){
                    $(this).removeClass("default")
                           .addClass("fixed transbg")
                           .fadeIn('fast');
                });
            } else if($(this).scrollTop() <= 100 && $menu.hasClass("fixed")) {
                $menu.fadeOut('fast',function(){
                    $(this).removeClass("fixed transbg")
                           .addClass("default")
                           .fadeIn('fast');
                });
            }
        });
	});
    //jQuery
	</script>
	<script>
		/*menu*/
		function calculateScroll() {
			var contentTop      =   [];
			var contentBottom   =   [];
			var winTop      =   $(window).scrollTop();
			var rangeTop    =   200;
			var rangeBottom =   500;
			$('.navmenu').find('a').each(function(){
				contentTop.push( $( $(this).attr('href') ).offset().top );
				contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() );
			})
			$.each( contentTop, function(i){
				if ( winTop > contentTop[i] - rangeTop && winTop < contentBottom[i] - rangeBottom ){
					$('.navmenu li')
					.removeClass('active')
					.eq(i).addClass('active');				
				}
			})
		};
		
		$(document).ready(function(){
			calculateScroll();
			$(window).scroll(function(event) {
				calculateScroll();
			});
			$('.navmenu ul li a').click(function() {  
				$('html, body').animate({scrollTop: $(this.hash).offset().top - 80}, 800);
				return false;
			});
		});		
	</script>	
	<script type="text/javascript" charset="utf-8">

		jQuery(document).ready(function(){
			jQuery(".pretty a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true, social_tools: ''});
			
		});
	</script>
	</body>
	
</html>		