<?php

	$connection = mysqli_connect('localhost', 'root', '', 'movie_list');

	if (mysqli_connect_errno()) {
		die('Database connection failed' . mysqli_connect_errno());
	} else {
		// echo "Connection successful";
	}

	$check = "SELECT COUNT(m_id) AS count FROM movie_data";
	$counter = mysqli_query($connection, $check);
	$count = mysqli_fetch_assoc($counter);
	$mov_cou = $count['count'];
	$month_list = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

	if (isset($_GET['id']) and !empty($_GET['id']) and $_GET['id'] >= 1 and $_GET['id'] <= $mov_cou) {

		$mov_id = $_GET['id'];

		$query = "SELECT name, rel_date, length, size, color FROM movie_data WHERE m_id = '{$mov_id}'";
		$result_set = mysqli_query($connection, $query);

		if (isset($result_set)) {
			$result = mysqli_fetch_assoc($result_set);

			$name = $result['name'];
			$rel_date = $result['rel_date'];
			$date = explode('-', $rel_date);
			$year = $date[0];
			$month_num = $date[1];
			$day = $date[2];

			for ($i=0; $i <= 11; $i++) { 
				if ($month_num - 1 == $i) {
					$month = $month_list[$i];
				}
			}

			$length = $result['length'];
			$size = $result['size'];
			$color = $result['color'];
		}
	} else {
		$mov_id = 1;

		$query = "SELECT name, rel_date, length, size, color FROM movie_data WHERE m_id = '{$mov_id}'";
		$result_set = mysqli_query($connection, $query);

		if (isset($result_set)) {
			$result = mysqli_fetch_assoc($result_set);

			$name = $result['name'];
			$rel_date = $result['rel_date'];
			$date = explode('-', $rel_date);
			$year = $date[0];
			$month_num = $date[1];
			$day = $date[2];

			for ($i=1; $i <= 12; $i++) {
				if ($month_num - 1 == $i) {
					$month = $month_list[$i];
				}
			}

			$length = $result['length'];
			$size = $result['size'];
			$color = $result['color'];
		}
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title><?php echo $name . ' (' . $year . ')'; ?> - Movie Collection</title>
	<link rel="icon" href="icon.ico" type="icon/x-icon" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="styles/view.css" />
</head>
<style type="text/css">
	body { background: <?php echo $color; ?>; }
	.movie-name h3 { background: <?php echo $color; ?>; }
</style>
<body>
	<div class="movie-data clearfix">
		<div class="movie-details">
			<table>
				<tr>
					<td rowspan="5"><img class="movie-image" src="images/<?php echo $mov_id; ?>.jpg" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" /></td>
				</tr>
				<tr>
					<td class="movie-name" colspan="2"><?php echo $name; ?></td>
				</tr>
				<tr>
					<td>Released</td>
					<td><?php echo $day . ' ' . $month . ', ' . $year; ?></td>
				</tr>
				<tr>
					<td>Length</td>
					<td><?php echo $length; ?></td>
				</tr>
				<tr>
					<td>Size</td>
					<td><?php echo $size; ?></td>
				</tr>
			</table>
		</div><!-- .movie-details -->
	</div><!-- .movie-data -->
</body>
</html>