<?php
	
	$connection = mysqli_connect('localhost', 'root', '', 'movie_list');

	$query = "SELECT COUNT(m_id) AS all_mov FROM movie_data";
	$result_set = mysqli_query($connection, $query);
	$result = mysqli_fetch_assoc($result_set);

	$all_mov = $result['all_mov'];

	$rows_pre_page = 15;

	$last_page = ceil($all_mov / $rows_pre_page);

	if (isset($_GET['p']) and !empty($_GET['p']) and $_GET['p'] >= 1 and $_GET['p'] <= $last_page) {
		$page_no = $_GET['p'];
		
	} else {
		$page_no = 1;

	}

	$start = ($page_no - 1) * $rows_pre_page;
	
	$query = "SELECT m_id, name, rel_date FROM movie_data ORDER BY rel_date DESC, name LIMIT {$start}, {$rows_pre_page}";

	$result_set = mysqli_query($connection, $query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Movie Collection - Home</title>
	<link rel="icon" href="icon.ico" type="icon/x-icon" sizes="16x16">
	<link rel="stylesheet" href="styles/main.css" />
</head>
<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
<body>
	<div class="wrapper">
		<div class="main-head">
			<h1>Movie Collection</h1>
		</div>
		<div class="mov-search">
			<form action="index.php" method="post">
				<input type="text" name="search" placeholder="Search for movie..." onkeyup="searchq();" autocomplete="off">
			</form>
		</div>
	</div>
	<?php

		echo '<div class="mov-img">';

		while ($result = mysqli_fetch_assoc($result_set)) {

			$released = $result['rel_date'];
			$date = explode('-', $released);

			$year = $date[0];

			// echo $result['m_id'] . ' - ' . $result['name'] . '<br>';
			echo '<a href="view.php?id=' . $result['m_id'] . '" target="_blank">' . '<img data-original="images/' . $result['m_id'] . '.jpg" title="' . $result['name'] . ' (' . $year . ')" alt="' . $result['name'] . '" class="lazy">' . '</a>';

		}

		echo '</div>';

		// first page
		$first = "<a href=\"index.php?p=1\">First</a>";

		// last page
		// ceil(): round-up next value
		$last_page_no = ceil($all_mov / $rows_pre_page);
		$last = "<a href=\"index.php?p={$last_page_no}\">Last</a>";

		// next page
		if ($page_no >= $last_page_no) {
			$next = "<span>Next</span>";
			$last = "<span>Last</span>";
			
		} else {
			$next_page_no = $page_no + 1;
			$next = "<a href=\"index.php?p={$next_page_no}\">Next</a>";
		}

		// previous page
		if ($page_no <= 1) {
			$prev = "<span>Previous</span>";
			$first = "<span>First</span>";
			
		} else {
			$prev_page_no = $page_no - 1;
			$prev = "<a href=\"index.php?p={$prev_page_no}\">Previous</a>";
		}


	?>
	<div class="footer">
		<div class="data-enter"><a href="enter.php" target="_blank">Enter Movie Data »</a></div>
		<div class="controls"><?php echo '<p>' . $first . ' | ' . $prev . ' | ' . 'Page ' . $page_no . ' of ' . $last_page_no . ' | ' . $next . ' | ' . $last . '</p>'; ?></div>
	</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha256-rXnOfjTRp4iAm7hTAxEz3irkXzwZrElV2uRsdJAYjC4=" crossorigin="anonymous"></script>
<script type="text/javascript">
	function searchq() {
		var search_txt = $("input[name='search']").val();
		$.post("search.php", {searchVal: search_txt}, function(output) {
			$(".mov-img").html(output);
		});
	}
	$(function(){
		$('.lazy').lazyload({
			effect: "fadeIn"
		});
	});
</script>
</body>
</html>