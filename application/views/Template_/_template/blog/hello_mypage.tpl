{#head}
<div class="container">
	<div class="row">
		<div class="col-md-6 .col-md-offset-6" style="display: inline-block">
			<input type="text" class="form-control" width="30%" placeholder="검색">
		</div>
		<div class="col-md-6" style="display: inline-block">
			<button class="btn btn-info" type="button" id="btn_write">글쓰기</button>
		</div>

        <div class="col-md-12 .col-md-offset-6" id="content-blog"></div>
		{page}
</div>

<script id="blog-template" type="text/x-handlebars-template">
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
			{[#each result]}
			<tr class="tr_list">
				<td>{[category]}</td>
				<td>{[regdate]}</td>
				<td>{[title]}</td>
				<td>{[content]}</td>
			</tr>
			{[/each]}
		</tbody>
	</table>
</script>

{#script}

<script type="text/javascript">
    $(function(){
		//글쓰기 버튼
        $('#btn_write').click(function(){
            $(location).attr('href',"{=site_url('/blog/hello_write')}");
        });

        $('.tr_list').click(function(){
            var id = $(this).attr('code');

            $(location).attr('href',"{=site_url('/blog/hello_write')}/" + id);
        });
    });

	//handlebar
    $(function() {
        var source = $("#blog-template").html();
        var template = Handlebars.compile(source);
        var data = {
			result: {row}
		};

        console.log(data);

        $("#content-blog").append(template(data));
    });

</script>

