<!DOCTYPE HTML>
<html>
<head>
<title>Home</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
 <!-- Custom Theme files -->
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="keywords" content="" />

<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
			$()
		});
        //页面加载调用
        window.onload=function(){
            //每1秒刷新时间
            setInterval("NowTime()",10);
        };
        function check(i){
            var num;
            i<10?num="0"+i:num=i;
            return num;
        }
        function NowTime(){
            var time=new Date();
            var year=time.getFullYear();
            var month=time.getMonth()+1;
            var day=time.getDate();

            //获取时分秒
            var h=time.getHours();
            var m=time.getMinutes();
            var s=time.getSeconds();

            //检查是否小于10
            h=check(h);
            m=check(m);
            s=check(s);
            document.getElementById('nowtime').innerHTML=year+"-"+month+"-"+day;
        }
    </script>

 <!---- start-smoth-scrolling---->
</head>
	<div>
		<!-- container -->
			<!-- header -->
			<div id="home" class="header">
				<div class="container">
				<!-- top-hedader -->
				<div class="top-header">
					<!-- /logo -->
					<!--top-nav---->
					<div class="top-nav">
					<div class="navigation">
					<div class="logo">
						<h1><a href="index.php"><span>B</span>orrok</a></h1>
					</div>
					<div class="navigation-right">
						<span class="menu"><img src="images/menu.png" alt=" " /></span>
						<nav class="link-effect-3" id="link-effect-3">
							<ul class="nav1 nav nav-wil">
								<li class="active"><a data-hover="Home" href="index.php">Home</a></li>
								<li><a class="scroll" data-hover="Services" href="#services" >Services</a></li>
								<li><a class="scroll" data-hover="Comments" href="#comment">Comments</a></li>
                                <li><a class="scroll" data-hover="Contact" href="#contact">Contact</a></li>
                                <li><a data-hover="Booklist" href="books.php">Booklist</a></li>
								<li><a  data-hover="About" href="ABOUT.html">About</a></li>
								<li><a  data-hover="Account" href="profile.php">Account</a></li>
							</ul>
						</nav>
							<!-- script-for-menu -->
								<script>
								   $( "span.menu" ).click(function() {
									 $( "ul.nav1" ).slideToggle( 300, function() {
									 // Animation complete.
									  });
									 });
								</script>
							<!-- /script-for-menu -->
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- /top-hedader -->
				</div>
			<div class="banner-info">
				<div class="col-md-7 header-right">
					<h1>Hi !</h1>
					<h6>THIS IS THE BOOK BORROWING WEBSITE </h6>
					<ul class="address">

					<li>
							<ul class="address-text">
								<li><b>Brand Name</b></li>
								<li>BORROK</li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>Current Date</b></li>
                                <li id="nowtime">
								</li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>Author: </b></li>
								<li>刘力宾 ( Bill ) & 饶明杰 ( Raymon ) </li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>E-MAIL </b></li>
								<li><a href="mailto:example@mail.com">szu2018152002@163.com</a></li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>WEBSITE </b></li>
								<li><a href="#">www.borrok.com</a></li>
							</ul>
						</li>

					</ul>
				</div>
				<div class="clearfix"> </div>

		      </div>
			</div>
		</div>
	</div>
			<!-- about -->

			<!-- /about -->
			<!-- services -->
			<div id="services" class="services">
				<div class="container">
					<div class="service-head one text-center ">
						<h4>THINGS TO DO</h4>
						<h3>WEB <span>SERVICES</span></h3>
						<span class="border two"></span>
					</div>
					<!-- services-grids -->
					<div class="wthree_about_right_grids w3l-agile">
				<div class="col-md-6 wthree_about_right_grid">
					<div class="col-xs-4 wthree_about_right_grid_left">
						<div class="hvr-rectangle-in">
							<i class="glyphicon glyphicon-book"></i>
						</div>
					</div>
					<div class="col-xs-8 wthree_about_right_grid_right">
						<h4>Book Borrow</h4>
						<p>You can borrow our ebook through this webpage. Register and sign up, you can
						have a very convenient process to get all books in BORROK library.  </p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-6 wthree_about_right_grid">
					<div class="col-xs-4 wthree_about_right_grid_left">
						<div class="hvr-rectangle-in">
							<i class="glyphicon glyphicon-user"></i>
						</div>
					</div>
					<div class="col-xs-8 wthree_about_right_grid_right">
						<h4>Sign up and Register</h4>
						<p>By  Register and signing up , you can have a better experience with all the services in this
						website. All new users can have the chance to upgrade into a manager.</p></div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-6 wthree_about_right_grid">
					<div class="col-xs-4 wthree_about_right_grid_left">
						<div class="hvr-rectangle-in">
							<i class="glyphicon glyphicon-lock"></i>
						</div>
					</div>
					<div class="col-xs-8 wthree_about_right_grid_right">
						<h4>Believable Safety </h4>
						<p>Our website will show every effort to make sure every user's safety, every step we will
						make sure our registered user's privacy will not be invaded. </p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-6 wthree_about_right_grid">
					<div class="col-xs-4 wthree_about_right_grid_left">
						<div class="hvr-rectangle-in">
							<i class="glyphicon glyphicon-list-alt"></i>
						</div>
					</div>
					<div class="col-xs-8 wthree_about_right_grid_right">
						<h4>Not Commerical</h4>
						<p>This Webpage is not appropriate for commercial use, please do not use it as a commercial website. </p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>

					<!-- services-grids -->
				</div>
			</div>
			<!-- services -->
			<div class="tlinks">Collect from <a href="http://www.cssmoban.com/" >手机网站模板</a></div>

		<!-- top-grids -->
		<div class="blog" id="comment">
			<div class="container">
				<div class="service-head-blue text-center">
					<h4>TOP REWARDED </h4>
					<h3>BOOK  <span>COMMENTS</span></h3>
					<span class="border-blue one"></span>
				</div>
				<div class="news-grid w3l-agile">
					<div class="col-md-6 news-img">
						<a href="#" data-toggle="modal" data-target="#myModal1"> <img src="images/bookpic13.jpg" class="img-responsive"></a>

					</div>
					<div class="col-md-6 news-text">
						<h3> <a href="#" data-toggle="modal" data-target="#myModal1">EXHALATION</a></h3>
						<ul class="news">
							<li><i class="glyphicon glyphicon-star"></i><i>Nebula Award</i></li>
							<li><i class="glyphicon glyphicon-star"></i> <i>Hugo Award</i></li>
							<li><i class="glyphicon glyphicon-star"></i><i>Locus Award</i> </li>
						</ul>
						<p>From an award-winning science fiction writer (whose short story 'The Story of Your Life' was the basis for the Academy Award-nominated movie Arrival), the long-awaited second collection of stunningly original, humane, and already celebrated short stories.</p>
						<a href="#" data-toggle="modal" data-target="#myModal1" class="read hvr-shutter-in-horizontal">Read More</a>

					</div>

					<div class="clearfix"></div>
				</div>

				<div class="news-grid">
					<div class="col-md-6 news-text two">
						<h3> <a href="#" data-toggle="modal" data-target="#myModal1">Even More than Yesterday [Hardcover]</a></h3>
						<ul class="news">
							<li><i class="glyphicon glyphicon-user"></i> <a href="#">
								<i>by M.H. Clark  (Author), Jill Labieniec (Illustrator)</i></a></li>
						</ul>
						<p> This book makes a wonderful anniversary or Valentine's Day gift—or as a wedding present, it becomes a perfect way to celebrate the couple s new chapter together. Celebrate those special everyday moments and say I love you with Even More Than Yesterday.</p>
						<a href="#" data-toggle="modal" data-target="#myModal1" class="read hvr-shutter-in-horizontal">Read More</a>

					</div>
					<div class="col-md-6 news-img two">
						<a href="#" data-toggle="modal" data-target="#myModal1"> <img src="images/pic15.jpg" alt=" " class="img-responsive"></a>

					</div>
					<div class="clearfix"></div>
				</div>

				<div class="news-grid">
					<div class="col-md-6 news-img">
						<a href="#" data-toggle="modal" data-target="#myModal1"> <img src="images/pic12.jpg" alt=" " class="img-responsive"></a>

					</div>
					<div class="col-md-6 news-text">
						<h3> <a href="#" data-toggle="modal" data-target="#myModal1">Histories of Violence</a></h3>
						<ul class="news">
							<li><i class="glyphicon glyphicon-star"></i><i>The Boston Globe Annual Book</i></li>
							<li><i class="glyphicon glyphicon-star"></i> <i>Lambda Literary Award</i></li>
						</ul>
						<p>
							As a victim, I lost my right to silence. Overnight, as if everyone had Red's face, it scared me. No one can understand the pain inside me, and no one realizes my hesitation and fear.
							Harm is like a movie that never ends, and I become the only audience. Maybe only escape can change the painful life ...
						</p>
						<a href="#" data-toggle="modal" data-target="#myModal1" class="read hvr-shutter-in-horizontal">Read More</a>

					</div>

					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- top-grids -->
		<!-- /blog-pop-->
		<div class="modal ab fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog about" role="document">
				<div class="modal-content about">
					<div class="modal-header">
						<button type="button" class="close ab" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body about">
						<div class="about">

							<div class="about-inner">

								<img src="images/bookpic13.jpg" alt="about"/>
								<h4 class="tittle">EXHALATION</h4>
								<p>Nebula Award  </p>
								<p> Hugo Award</p>
								<p>Locus Award</p>
								<p>
									From an award-winning science fiction writer (whose short story 'The Story of Your Life' was the basis for the Academy Award-nominated movie Arrival), the long-awaited second collection of stunningly original, humane, and already celebrated short stories.
								</p>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- //blog-pop-->
		<!-- portfolio -->
	<div class="portfolio" id="list">
				<div class="service-head text-center">
						<h4>OUR BOOKS</h4>
						<h3>SOME <span>BOOKLIST</span></h3>
						<span class="border"></span>
					</div>
			<div class="portfolio-grids">
				<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="text/javascript">
									$(document).ready(function () {
										$('#horizontalTab').easyResponsiveTabs({
											type: 'default', //Types: default, vertical, accordion
											width: 'auto', //auto or any width like 600px
											fit: true   // 100% fit in a container
										});
									});

				</script>
				<div class="sap_tabs">
					<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						<ul class="resp-tabs-list">
							<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>POPULAR</span></li>
							<li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>NEWEST</span></li>
							<li class="resp-tab-item" aria-controls="tab_item-3" role="tab"><span>REWARDED</span></li>
							<li class="resp-tab-item"  role="tab"><a href="books.php"><span>VIEW MORE</span></a></li>
						</ul>
						<div class="resp-tabs-container">
							    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
								<div class="col-md-3 team-gd ">
									<div class="thumb">
										<a href="#portfolioModal5" class="portfolio-link b-link-diagonal b-animate-go" data-toggle="modal"><img src="images/pic6.jpg" alt="">
										</a>
									</div>
								</div>
								<div class="col-md-3 team-gd  ">
									<div class="thumb">
										<a href="#portfolioModal6" class="portfolio-link b-link-diagonal b-animate-go" data-toggle="modal"><img src="images/pic9.jpg" alt="">

										</a>
									</div>
								</div>
								<div class="col-md-3 team-gd ">
										<a href="#portfolioModal7" class="portfolio-link b-link-diagonal b-animate-go" data-toggle="modal"><img src="images/pic7.jpg" alt="">
										</a>
								</div>
									<div class="col-md-3 team-gd ">
										<a href="#portfolioModal7" class="portfolio-link b-link-diagonal b-animate-go" data-toggle="modal"><img src="images/pic10.jpg" alt="">
										</a>
									</div>
								<div class="clearfix"></div>
							</div>
							    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
								<div class="col-md-3 team-gd ">

										<a href="#portfolioModal2" class="portfolio-link b-link-diagonal b-animate-go" data-toggle="modal"><img src="images/pic9.jpg" alt="">

										</a>

								</div>
								<div class="col-md-3 team-gd ">

										<a href="#portfolioModal4" class="portfolio-link b-link-diagonal b-animate-go" data-toggle="modal"><img src="images/pic6.jpg" alt="">

										</a>

								</div>
								<div class="col-md-3 team-gd">

										<a href="#portfolioModal5" class="portfolio-link b-link-diagonal b-animate-go" data-toggle="modal"><img src="images/pic10.jpg" alt="">

										</a>

								</div>
									<div class="col-md-3 team-gd ">
										<a href="#portfolioModal7" class="portfolio-link b-link-diagonal b-animate-go" data-toggle="modal"><img src="images/pic13.jpg" alt="">
										</a>
									</div>
								<div class="clearfix"></div>
							</div>
								<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">
								<div class="col-md-3 team-gd ">

										<a href="#portfolioModal5" class="portfolio-link b-link-diagonal b-animate-go" data-toggle="modal"><img src="images/pic10.jpg" alt="">

										</a>

								</div>
								<div class="col-md-3 team-gd">

										<a href="#portfolioModal6" class="portfolio-link b-link-diagonal b-animate-go" data-toggle="modal"><img src="images/pic11.jpg" alt="">

										</a>

								</div>
								<div class="col-md-3 team-gd ">
										<a href="#portfolioModal7" class="portfolio-link b-link-diagonal b-animate-go" data-toggle="modal"><img src="images/pic13.jpg" alt="">
										</a>
								</div>
									<div class="col-md-3 team-gd ">
										<a href="#portfolioModal7" class="portfolio-link b-link-diagonal b-animate-go" data-toggle="modal"><img src="images/pic7.jpg" alt="">
										</a>
									</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
	<!-- //portfolio -->

	</div>
			<!-- /header -->
<div class="footer" id="contact">
	<div class="container">
	<div class="service-head one text-center">
						<h4>CONTACT US</h4>
						<h3>GET <span>IN TOUCH WITH US</span></h3>
						<span class="border two"></span>
					</div>
		<div class="mail_us">
			<div class="col-md-6 mail_left">
				<div class="contact-grid1-left">
					<div class="contact-grid1-left1">
						<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						<h4>Contact By Email</h4>
						<ul>
							<li> Bill: <a href="mailto:info@example.com">2018152097@email.szu.edu.cn</a></li>
							<li> Raymon: <a href="mailto:info@example.com">szu2018152002@163.com</a></li>
						</ul>
					</div>
				</div>
					<div class="contact-grid1-left">
						<div class="contact-grid1-left1">
							<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
							<h4>Contact By Phone</h4>
							<ul>
                                <li> Bill : +86 138-8312-0906</li>
								<li> Raymon : +86 134-2051-0830</li>
							</ul>
						</div>
					</div>
					<div class="contact-grid1-left">
						<div class="contact-grid1-left1">
							<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
							<h4>Looking For Address</h4>
							<ul>
								<li>Address: Shenzhen University </li>
							</ul>
						</div>
					</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-6 mail_right">
				<form action="#" method="post">
					<input type="text" name="Name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
					<input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					<input type="text" name="Mobile number" value="Mobile number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Mobile number';}" required="">
					<textarea name="Message..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required>Message...</textarea>
					<input type="submit" id="postbtn" onclick="" value="Send">
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="copy_right text-center">
			<p>Copyright &copy; 2019. Borrok All rights reserved.</p>
			 <ul class="social-icons two">
							<li><a href="#"> </a></li>
							<li><a href="#" class="fb"> </a></li>
							<li><a href="#" class="in"> </a></li>
							<li><a href="#" class="dott"> </a></li>
						</ul>
		</div>
	</div>
</div>
			<!-- //footer -->
		<!-- /container -->
<div class="portfolio-modal modal fade slideanim" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content port-modal">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
			<div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <div class="modal-body">
						<h3>Image-Title</h3>
                        <img src="images/pic4.jpg" class="img-responsive img-centered" alt="">
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade slideanim" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content port-modal">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
			<div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <div class="modal-body">
						<h3>Image-Title</h3>
                        <img src="images/pic9.jpg" class="img-responsive img-centered" alt="">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade slideanim" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content port-modal">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
			<div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <div class="modal-body">
						<h3>Image-Title</h3>
                        <img src="images/pic5.jpg" class="img-responsive img-centered" alt="">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade slideanim" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content port-modal">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
			<div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <div class="modal-body">
						<h3>Image-Title</h3>
                        <img src="images/pic6.jpg" class="img-responsive img-centered" alt="">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade slideanim" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content port-modal">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
			<div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <div class="modal-body">
						<h3>Image-Title</h3>
                        <img src="images/pic10.jpg" class="img-responsive img-centered" alt="">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade slideanim" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content port-modal">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
			<div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <div class="modal-body">
						<h3>Image-Title</h3>
                        <img src="images/pic11.jpg" class="img-responsive img-centered" alt="">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade slideanim" id="portfolioModal7" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content port-modal">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
			<div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <div class="modal-body">
						<h3>Image-Title</h3>
                        <img src="images/pic13.jpg" class="img-responsive img-centered" alt="">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade slideanim" id="portfolioModal8" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content port-modal">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
			<div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <div class="modal-body">
						<h3>Image-Title</h3>
                        <img src="images/pic14.jpg" class="img-responsive img-centered" alt="">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade slideanim" id="portfolioModal9" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content port-modal">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
			<div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <div class="modal-body">
                        <img src="images/pic1.jpg" class="img-responsive img-centered" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
						<script type="text/javascript">
									$(document).ready(function() {
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
	<script src="js/bootstrap.js"></script>
	

	</body>
</html>

