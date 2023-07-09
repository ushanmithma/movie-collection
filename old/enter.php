<?php

	$connection = mysqli_connect('localhost', 'root', '', 'movie_list');
	if (mysqli_connect_errno()) {
		die('Database connection failed' . mysqli_connect_errno());
	} else {
		// echo "Connection successful";
	}

	$errors = array();

	if (isset($_POST['go-button'])) {

		if (!isset($_POST['movie-name']) || strlen(trim($_POST['movie-name'])) <1) {
			$errors[] = 'Movie Name is missing or invalid';
		}

		if (!isset($_POST['release-date']) || strlen(trim($_POST['release-date'])) <1) {
			$errors[] = 'Movie Release Date is missing or invalid';
		}

		if (!isset($_POST['movie-length']) || strlen(trim($_POST['movie-length'])) <1) {
			$errors[] = 'Movie Length is missing or invalid';
		}

		if (!isset($_POST['movie-size']) || strlen(trim($_POST['movie-size'])) <1) {
			$errors[] = 'Movie Size is missing or invalid';
		}

		if (!isset($_POST['color-code']) || strlen(trim($_POST['color-code'])) <1) {
			$errors[] = 'Color code is missing';
		}

		if (empty($errors)) {

			$m_name = $_POST['movie-name'];
			$m_release_date = $_POST['release-date'];
			$m_length = $_POST['movie-length'];
			$m_size = $_POST['movie-size'];
			$c_code = $_POST['color-code'];

			$query = "SELECT * FROM movie_data WHERE name = '{$m_name}' LIMIT 1";

			$result_set = mysqli_query($connection, $query);

			if (mysqli_num_rows($result_set) == 1) {
				$errors[] = 'This movie is already exists';
			} else {

				$insert_query = "INSERT INTO movie_data (name, rel_date, length, size, color) VALUES ('{$m_name}', '{$m_release_date}', '{$m_length}', '{$m_size}', '{$c_code}')";

				$result = mysqli_query($connection, $insert_query);
			}
		}
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Movie Detalis Enter - Movie Collection</title>
	<link rel="icon" href="icon.ico" type="icon/x-icon" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="styles/enter.css" />
</head>
<body>
	<div class="wrapper">
		<div class="main-head">
			<h1>Movie Collection</h1>
		</div>
	</div>
	<div class="md-en">
		<form action="enter.php" method="post">
			<fieldset>
				<legend>Movie Data Enter</legend>
				<?php
					if (isset($_POST['go-button'])) {
						if (isset($errors) and !empty($errors)) {
							echo '<p class="error">-ERROR-</p>';
						}
						if (isset($result)) {
							echo '<p class="all-right">Movie is added</p>';
						}
					}
				?>
				<input type="text" name="movie-name" id="" placeholder="Name" />
				<input type="text" name="release-date" id="" placeholder="Release Date" />
				<input type="text" name="movie-length" id="" placeholder="Length" />
				<input type="text" name="movie-size" id="" placeholder="Size" />
				<input type="text" name="color-code" id="" placeholder="Color Code" />
				<button type="submit" name="go-button">Save in Database</button>
			</fieldset>
		</form>
	</div><!-- .md-en -->

	<div class="movies-in-db">
		
		<?php

			$count = "SELECT COUNT(m_id) AS view FROM movie_data";

			$count_view = mysqli_query($connection, $count);
			$view = mysqli_fetch_assoc($count_view);
			$mov_cou = $view['view'];

			if ($mov_cou) {

				echo "<h3>" . $mov_cou . " Movies are Found." . "</h3>";

			}

			$rows_pre_page = 15;

			$last_page = ceil($mov_cou / $rows_pre_page);

			if (isset($_GET['p']) and !empty($_GET['p']) and $_GET['p'] >= 1 and $_GET['p'] <= $last_page) {
				$page_no = $_GET['p'];
		
			} else {
				$page_no = 1;

			}

			$start = ($page_no - 1) * $rows_pre_page;
			
			$select_query = "SELECT m_id, name, rel_date, length, size FROM movie_data ORDER BY rel_date DESC, name LIMIT {$start}, {$rows_pre_page}";
			$result_view = mysqli_query($connection, $select_query);

			$table = '<table>';
			$table .= '<tr><th>Movie ID</th><th>Movie Name</th><th>Release Date</th><th>Length</th><th>Size</th></tr>';

			while ($record = mysqli_fetch_assoc($result_view)) {
				$table .= '<tr>';
				$table .= '<td>' . $record['m_id'] . '</td>';
				$table .= '<td>' . $record['name'] . '</td>';
				$table .= '<td>' . $record['rel_date'] . '</td>';
				$table .= '<td>' . $record['length'] . '</td>';
				$table .= '<td>' . $record['size']. '</td>';
				$table .= '</tr>';
			}


			$table .= '</table>';

			echo $table;
			// first page
			$first = "<a href=\"enter.php?p=1\">First</a>";

			// last page
			// ceil(): round-up next value
			$last_page_no = ceil($mov_cou / $rows_pre_page);
			$last = "<a href=\"enter.php?p={$last_page_no}\">Last</a>";

			// next page
			if ($page_no >= $last_page_no) {
				$next = "<span>Next</span>";
				$last = "<span>Last</span>";
			
			} else {
				$next_page_no = $page_no + 1;
				$next = "<a href=\"enter.php?p={$next_page_no}\">Next</a>";
			}

			// previous page
			if ($page_no <= 1) {
				$prev = "<span>Previous</span>";
				$first = "<span>First</span>";
			
			} else {
				$prev_page_no = $page_no - 1;
				$prev = "<a href=\"enter.php?p={$prev_page_no}\">Previous</a>";
			}

		?>

	</div>
	<div class="footer">
		<div class="controls"><?php echo '<p class="page_ctrl">' . $first . ' | ' . $prev . ' | ' . 'Page ' . $page_no . ' of ' . $last_page_no . ' | ' . $next . ' | ' . $last . '</p>'; ?></div>
	</div>

</body>
</html>