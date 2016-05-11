
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
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap.js"></script>
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
		
		
		<link rel="stylesheet" href="css/jquery.dataTables.min.css">
  		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		 <script type="text/javascript">
			$j=jQuery.noConflict();
			$j(document).ready(function() {
				//$j('#mytable').DataTable();
				$j('#mytable').DataTable({
						responsive : true,
						language : {
							"sProcessing" : "Đang xử lý...",
							"sLengthMenu" : "Xem _MENU_ mục",
							"sZeroRecords" : "Không tìm thấy dòng nào phù hợp",
							"sInfo" : "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
							"sInfoEmpty" : "Đang xem 0 đến 0 trong tổng số 0 mục",
							"sInfoFiltered" : "(được lọc từ _MAX_ mục)",
							"sInfoPostFix" : "",
							"sSearch" : "Tìm:",
							"sUrl" : "",
							"oPaginate" : {
								"sFirst" : "Đầu",
								"sPrevious" : "Trước",
								"sNext" : "Tiếp",
								"sLast" : "Cuối"
							}
						}
				});
				$('#tbl-body').on('click', 'button#btn-xoa', function() {
					// lay ma dot dang ky
					var maLoai = $(this).siblings('input#hidden-ma').val();
					
					// set ma vao modal
					$('#modal-hidden-ma').val(maLoai);
				});
				
			} );
			
		</script>
	
		<script type="text/javascript">
			$j('.selectpicker').selectpicker();
		</script>
		
			
		
		
		
	</head>
		
	<body>
		<?php 
<<<<<<< HEAD
			$link = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
			mysqli_select_db($link,"qlgiaotrinh");
=======
			include("database.php");
>>>>>>> 2dcc4d09c3f403232b17717dda5bde50f742ad95
		?>
		
		
		
		<section id="header_area">
			<div class="wrapper header">
				<div class="clearfix header_top">
					<div class="clearfix logo floatleft">
						<a href=""><h1><span>GIÁO TRÌNH</span> BÁCH KHOA</h1></a>
					</div>
					<div class="clearfix search floatright">
						<?php 
							
							if(isset($_SESSION['userid'])){
								echo "<p style='display:inline;color:white'>Chào ".$_SESSION['name'].",</p>
										<a href='Controller_dangXuat.php'>LOGOUT</a>";
							}else{
								
								echo "<a href='admin_dangNhap.php'>LOGIN</a>";
							}
						?>
						
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
		
		