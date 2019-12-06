<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Blog</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
		  crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
		  crossorigin="anonymous">

</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h3>Blog</h3>
		</div>
		<br>
		<div class="col-md-3">
			<div class="dropdown">

				<button class="btn btn-defalut dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true" style="width: 100%;">
					카테고리
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
				</ul>
			</div>
		</div>
		<div class="col-md-1">
			<button class="btn btn-info">
				<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
			</button>
		</div>
	</div>
</div>
<hr>

<div class="container">
	<div class="row">
		<div class="col-md-12 .col-md-offset-6">

			<?php
			error_reporting(E_ALL);
			ini_set("display_errors", 1);

			?>

			<form id="fform" action="/hello/insert_writeForm">
				<div class="form-group">
					<label for="category">카 테 고 리</label>
					<select class="form-control" id="category" style="width: 30%">
						<option>- 선택 -</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
				<div class="form-group">
					<label for="title">제 목</label>
					<input type="text" class="form-control" id="title" >
				</div>
				<div class="form-group">
					<label for="regdate">날 짜</label>
					<input type="text" class="form-control" id="regdate">
				</div>
				<div class="form-group">
					<label for="content">내 용</label>
					<textarea class="form-control" id="content" rows="3"></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputFile">파일 업로드</label>
					<input type="file" id="exampleInputFile">
					<p class="help-block">여기에 블록레벨 도움말 예제</p>
				</div>
				<button type="button" class="btn btn-primary" id="btn_submit">업로드</button>
				<button type="button" class="btn btn-danger" id="btn_cancel">취소</button>

			</form>


		</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>

<script>
    $(function(){
        $('#btn_submit').click(function() {
            var category = $( "#category" ).val();
            var title = $( "#title" ).val();
            var regdate = $( "#regdate" ).val();
            var content = $( "#content" ).val();

            $.ajax({
				url: "<?=site_url('/hello/insert_writeForm'); ?>",
				data: {
                    category: category,
                    title: title,
                    regdate: regdate,
                    content: content
				},
				type: "POST",
				success: function (msg) {
                    alert(msg);
                    location.href='/Codeigniter3/hello';
                }
			});
        });

        //취소 버튼
        $('#btn_cancel').click(function(){
            location.href='/Codeigniter3/hello';
        });
	});

</script>
