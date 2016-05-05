
<head>
		<title>Giáo trình bách khoa</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/tooltipster.css" />
		<script src="js/jquery-2.1.1.min.js"></script>
		<!-- home slider-->
		<link href="css/pgwslider.css" rel="stylesheet">
		<!--bootrap-->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link href="style.css" rel="stylesheet" media="screen">	
		<link href="responsive.css" rel="stylesheet" media="screen">
		<!-- select option-->
		<script src="js/bootstrap-select.min.js"></script>
	

		<link rel="stylesheet" href="css/bootstrap-select.min.css">
		<!--validate-->
		<script src="js/jquery.validate.js"></script>
		
		<!--table-->
		<!--<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>-->
		<link rel="stylesheet" href="css/jquery.dataTables.min.css">
  		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="js/jquery.dataTables.min.js"></script>
		 <script type="text/javascript">
			$j=jQuery.noConflict();
			$j(document).ready(function() {
				$j('#mytable').DataTable();
			} );
			
		</script>
		<script type="text/javascript">
			
				$j('.selectpicker').selectpicker();

		
			
		</script>
		
	</head>
		
	<body>
		
		<?php 
			$link = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
			mysqli_select_db($link,"quanlygiaotrinh");
		?>
		
		<section id="header_area">
			<div class="wrapper header">
				<div class="clearfix header_top">
					<div class="clearfix logo floatleft">
						<a href=""><h1><span>GIÁO TRÌNH</span> BÁCH KHOA</h1></a>
					</div>
					<div class="clearfix search floatright">
						<form>
							<input type="text" placeholder="Search"/>
							<input type="submit" />
						</form>
					</div>
				</div>
				<div class="header_bottom">
					<nav>
						<ul id="nav">
							<li><a href="">Trang chủ</a></li>
							<li><a href="">Liên hệ</a></li>							
						</ul>
					</nav>
				</div>
			</div>
		</section>
		
		