<!DOCTYPE html>
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
		<div class="col-md-6 .col-md-offset-6" style="display: inline-block">
			<input type="text" class="form-control" width="30%" placeholder="검색">
		</div>
		<div class="col-md-6" style="display: inline-block">
			<button class="btn btn-info" type="button" id="btn_write">글쓰기</button>
		</div>

		<div class="col-md-12 .col-md-offset-6">
			<table class="table">
				<thead>
				<tr>
					<th>카테고리</th>
					<th>등록일</th>
					<th>제목</th>
					<th>내용</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($result as $row):?>

					<tr class="tr_list" code="<?=$row->id?>">
						<td><?php echo $row->category;?></td>
						<td><?php echo $row->regdate;?></td>
						<td><?php echo $row->title;?></td>
						<td><?php echo $row->content;?></td>
					</tr>
				<?php endforeach;?>
				</tbody>
			</table>
			<ul class="pagination">
				<?=$page?>
			</ul>
		</div>


	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>

<script type="text/javascript">
    $(function(){
        //글쓰기 버튼
        $('#btn_write').click(function(){
            location.href='http://localhost/Codeigniter3/hello/hello_write';
        });

        $('.tr_list').click(function(){
            var id = $(this).attr('code');
            console.log(id);

            $(location).attr('href',"<?= site_url('/hello/hello_modify'); ?>/" + id);
        });
    });
</script>
