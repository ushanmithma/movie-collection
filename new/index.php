<?php require_once('inc/connection.php'); ?>
<?php

	$query = "SELECT COUNT(id) AS count FROM movies";
	$result_set = mysqli_query($connection, $query);
	$result = mysqli_fetch_assoc($result_set);

	$movie_count = $result['count'];

	$rows_pre_page = 10;

	$last_page = ceil($movie_count / $rows_pre_page);

	if (isset($_GET['p']) and !empty($_GET['p']) and $_GET['p'] >= 1 and $_GET['p'] <= $last_page) {
		$page_no = $_GET['p'];
		
	} else {
		$page_no = 1;

	}

	$start = ($page_no - 1) * $rows_pre_page;
	
	$query = "SELECT id, name, release_date FROM movies ORDER BY release_date DESC, name LIMIT {$start}, {$rows_pre_page}";

	$result_set = mysqli_query($connection, $query);

	// Page controller

	// first page
	$first = "<a href=\"index.php?p=1\">First</a>";

	// last page
	$last_page_no = ceil($movie_count / $rows_pre_page);
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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=7">
	<link rel="stylesheet" href="css/home.css">
	<title>Movie - Collection</title>
</head>
<body>

	<input type="checkbox" name="dark-mode" id="dark-mode" style="position: fixed;" title="Dark Mode">
	<div class="container">
		<header><h1><a href="index.php?p=1">Movie Collection</a></h1><a href="enter.php">Enter Details</a></header>
		<form action="index.php" method="post"><input type="search" name="search" id="search" placeholder="Search..." onkeyup="searchq();" autocomplete="off"></form>
		<section class="movie-set">
			<div class="mov-area">
				<?php

					while ($result = mysqli_fetch_assoc($result_set)) {

						$mov_release_date = $result['release_date'];
						$explode_date = explode('-', $mov_release_date);

						$mov_folder_name = str_replace(': ', ' - ', $result['name']);
						$year = $explode_date[0];

						echo '<a href="view.php?id=' . $result['id'] . '">' . '<img src="movies/' . $mov_folder_name . ' (' . $year . ')/poster.jpg" title="' . $result['name'] . ' (' . $year . ')" alt="' . $result['name'] . ' (' . $year . ')' . '">' . '</a>';

					}

				?>
			</div>
		</section>
		<footer>
			<?php echo '<h3>' . $first .'</h3><h3>' . $prev . '</h3><h3>Page ' . $page_no . ' of ' . $last_page_no . '</h3><h3>' . $next . '</h3><h3>' . $last . '</h3>'; ?>
		</footer>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#dark-mode").click(function(){
				if ($(this).is(":checked")) {
					$("body").css({"background-color":"#1b1b1b", "color":"#fff"});
					$(".mov-area a img").css("border","1px solid #fff");
				} else if ($(this).is(":not(:checked)")) {
					$("body").css({"background-color":"#fff", "color":"#000"});
					$(".mov-area a img").css("border","1px solid #000");
				}
			});
		});

		function searchq() {
			var search_txt = $("input[name='search']").val();
			$.post("inc/search.php", {searchVal: search_txt}, function(output) {
				$(".mov-area").html(output);
			});
		}
	</script>
</body>
</html>