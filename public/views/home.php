<h1 class="welcome"> به <span class="zaferoon"> زعفرون </span> خوش آمدید :) </h1>
<h4 class="author">از <a href="https://github.com/ehsanm94">مُخی</a></h4>
<script type="text/javascript">
	var filters = {
		rates: [4],
		categories: ['اکشن']
	}
	$.ajax({
		type: "POST",
		url: config.url + 'games_list',
		data: {"filters" : JSON.stringify(filters)},
		cache: false,
		success: function(result){
			console.log(result)
		}
	})
</script>