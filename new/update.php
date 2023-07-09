<?php require_once('inc/connection.php'); ?>
<?php

	$check = "SELECT COUNT(id) AS count FROM movies";
	$get_count = mysqli_query($connection, $check);
	$count = mysqli_fetch_assoc($get_count);
	$mov_count = $count['count'];

	if (isset($_GET['id']) and !empty($_GET['id']) and $_GET['id'] >= 1 and $_GET['id'] <= $mov_count) {

		$id = $_GET['id'];

		$get_query = "SELECT name, age_rating, runtime, imdb_rating, imdb_rating_count, release_date, genres, rotten_tomatoes, audience_score, rotten_rating_count, size, box_office, quality, directors, description, color, trailer, download_link, sub_download_link, keywords FROM movies WHERE id = '{$id}' LIMIT 1";

		$result_set_get_query = mysqli_query($connection, $get_query);

		if (isset($result_set_get_query)) {

			$get_query_result = mysqli_fetch_assoc($result_set_get_query);

			// Set Values to input fields

			$get_name = $get_query_result['name'];
			$get_age_rating = $get_query_result['age_rating'];
			$get_runtime = $get_query_result['runtime'];
			$get_imdb_rating = $get_query_result['imdb_rating'];
			$get_imdb_rating_count = $get_query_result['imdb_rating_count'];
			$get_release_date = $get_query_result['release_date'];
			$get_genre = $get_query_result['genres'];
			$get_rotten_tomatoes = $get_query_result['rotten_tomatoes'];
			$get_audience_score = $get_query_result['audience_score'];
			$get_rotten_rating_count = $get_query_result['rotten_rating_count'];
			$get_size = $get_query_result['size'];
			$get_box_office = $get_query_result['box_office'];
			$get_quality = $get_query_result['quality'];
			$get_directors = $get_query_result['directors'];
			$get_description = $get_query_result['description'];
			$get_color = $get_query_result['color'];
			$get_trailer = $get_query_result['trailer'];
			$get_download_link = $get_query_result['download_link'];
			$get_sub_download_link = $get_query_result['sub_download_link'];
			$get_keywords = $get_query_result['keywords'];

			// Set runtime value to input field

			$explode_runtime = explode('hr ', $get_runtime);
			$set_hours = $explode_runtime[0];
			$set_minutes = substr($explode_runtime[1], 0, -3);

			// Set genres values to checkbox

			$explode_genres = explode(', ', $get_genre);
			$explode_genres_len = count($explode_genres);

			// Set Size value to number field

			$set_size = substr($get_size, 0, -2);

			// Set Quality

			$explode_quality = explode(' ', $get_quality);
			$select_resolution = $explode_quality[0];
			$check_quality = $explode_quality[1];

			// Validation Part

			$errors = array();
			$imgerrors = array();

			if (isset($_POST['update'])) {

				if (!isset($_POST['name']) || strlen(trim($_POST['name'])) <1) {
					$errors[] = 'Movie Name is missing or invalid';
				}

				if (!isset($_POST['age-rating']) || strlen(trim($_POST['age-rating'])) <1) {
					$errors[] = 'Movie Age Rating is missing or invalid';
				}

				if (!isset($_POST['hours']) || strlen(trim($_POST['hours'])) <1) {
					$errors[] = 'Movie Hours is missing or invalid';
				}

				if (!isset($_POST['minutes']) || strlen(trim($_POST['minutes'])) <1) {
					$errors[] = 'Movie Minutes is missing or invalid';
				}

				if (!isset($_POST['imdb-rating']) || strlen(trim($_POST['imdb-rating'])) <1) {
					$errors[] = 'Movie IMDb Rating is missing or invalid';
				}

				if (!isset($_POST['imdb-rating-count']) || strlen(trim($_POST['imdb-rating-count'])) <1) {
					$errors[] = 'Movie IMDb Rating Count is missing or invalid';
				}

				if (!isset($_POST['release-date']) || strlen(trim($_POST['release-date'])) <1) {
					$errors[] = 'Movie Release Date is missing or invalid';
				}

				if (!isset($_POST['genre'])) {
					$errors[] = 'Movie Genre is missing or invalid';
				}

				if (!isset($_POST['rotten-tomatoes']) || strlen(trim($_POST['rotten-tomatoes'])) <1) {
					$errors[] = 'Movie Rotten Tomatoes rating is missing or invalid';
				}

				if (!isset($_POST['audience-score']) || strlen(trim($_POST['audience-score'])) <1) {
					$errors[] = 'Movie Rotten Tomatoes audience-score is missing or invalid';
				}

				if (!isset($_POST['rotten-rating-count']) || strlen(trim($_POST['rotten-rating-count'])) <1) {
					$errors[] = 'Movie Rotten Tomatoes user rating count is missing or invalid';
				}

				if (!isset($_POST['size']) || strlen(trim($_POST['size'])) <1) {
					$errors[] = 'Movie Size is missing or invalid';
				}

				if (!isset($_POST['box-office']) || strlen(trim($_POST['box-office'])) <1) {
					$errors[] = 'Movie Box Office is missing or invalid';
				}

				if (!isset($_POST['quality']) || strlen(trim($_POST['quality'])) <1) {
					$errors[] = 'Movie Quality is missing or invalid';
				}

				if (!isset($_POST['resolution']) || strlen(trim($_POST['resolution'])) <1) {
					$errors[] = 'Movie Resolution is missing or invalid';
				}

				if (!isset($_POST['directors']) || strlen(trim($_POST['directors'])) <1) {
					$errors[] = 'Movie Directors is missing or invalid';
				}

				if (!isset($_POST['description'])) {
					$errors[] = 'Movie Description is missing or invalid';
				}

				if (!isset($_POST['color']) || strlen(trim($_POST['color'])) <1) {
					$errors[] = 'Movie Colour is missing or invalid';
				}

				if (!isset($_POST['trailer']) || strlen(trim($_POST['trailer'])) <1) {
					$errors[] = 'Movie Trailer link is missing or invalid';
				}

				if (!isset($_POST['download-link']) || strlen(trim($_POST['download-link'])) <1) {
					$errors[] = 'Movie Download link is missing or invalid';
				}

				if (!isset($_POST['sub-download-link']) || strlen(trim($_POST['sub-download-link'])) <1) {
					$errors[] = 'Movie Subtitle Download link is missing or invalid';
				}

				if (!isset($_POST['keywords'])) {
					$errors[] = 'Movie Keywords is missing or invalid';
				}

				if (empty($errors)) {

					$name = mysqli_real_escape_string($connection, $_POST['name']);
					$age_rating = mysqli_real_escape_string($connection, $_POST['age-rating']);
					$hours = mysqli_real_escape_string($connection, $_POST['hours']);
					$minutes = mysqli_real_escape_string($connection, $_POST['minutes']);
					$imdb_rating = mysqli_real_escape_string($connection, $_POST['imdb-rating']);
					$imdb_rating_count = mysqli_real_escape_string($connection, $_POST['imdb-rating-count']);
					$release_date = mysqli_real_escape_string($connection, $_POST['release-date']);
					$genre = $_POST['genre'];
					$rotten_tomatoes = mysqli_real_escape_string($connection, $_POST['rotten-tomatoes']);
					$audience_score = mysqli_real_escape_string($connection, $_POST['audience-score']);
					$rotten_rating_count = mysqli_real_escape_string($connection, $_POST['rotten-rating-count']);
					$size = mysqli_real_escape_string($connection, $_POST['size']);
					$box_office = mysqli_real_escape_string($connection, $_POST['box-office']);
					$quality = mysqli_real_escape_string($connection, $_POST['quality']);
					$resolution = mysqli_real_escape_string($connection, $_POST['resolution']);
					$directors = mysqli_real_escape_string($connection, $_POST['directors']);
					$description = mysqli_real_escape_string($connection, $_POST['description']);
					$color = mysqli_real_escape_string($connection, $_POST['color']);
					$poster_image = $_FILES['poster-image'];
					$background_image = $_FILES['background-image'];
					$trailer = mysqli_real_escape_string($connection, $_POST['trailer']);
					$download_link = mysqli_real_escape_string($connection, $_POST['download-link']);
					$sub_download_link = mysqli_real_escape_string($connection, $_POST['sub-download-link']);
					$keywords = mysqli_real_escape_string($connection, $_POST['keywords']);

					// Validate Name

					if (isset($name)) {

						if (strlen($name) < 1000) {

							$new_name = trim($name);

						}

					}

					// Validate Age Rating

					if (isset($age_rating)) {

						if ($age_rating == "PG-13") {
							$new_age_rating = $age_rating;
						} else if ($age_rating == "G") {
							$new_age_rating = $age_rating;
						} else if ($age_rating == "PG") {
							$new_age_rating = $age_rating;
						} else if ($age_rating == "R-Rated") {
							$new_age_rating = $age_rating;
						} else {
							$new_age_rating = $age_rating;
						}

					}

					// Validate Runtime

					if (isset($hours) && isset($minutes)) {

						if ($hours < 12 && $minutes < 60) {

							$new_runtime = $hours . "hr " . $minutes . "min";

						} else {

							$errors[] = 'Invalid time';

						}

					}

					// Validate Release Date

					if (isset($release_date)) {

						$date = explode('-', $release_date);
						if (count($date) == 3) {

							if (checkdate($date[1], $date[2], $date[0])) {
								$new_release_date = $date[0] . '-' . $date[1] . '-' . $date[2];
							} else {
								$errors[] = 'Invalid date';
							}

						} else {

							$errors[] = 'Invalid date';

						}

					}

					// Validate IMDb Rating

					if (isset($imdb_rating)) {

						if (strpos($imdb_rating, '.') !== false) {

							if (strlen($imdb_rating) < 5) {
								
								if ($imdb_rating >= 1.0 && $imdb_rating <= 10.0) {
									$new_imdb_rating = $imdb_rating;
								} else {
									$errors[] = 'IMDb rating is less than 1 or grater than 10.0';
								}

							}

						} else {

							$new_imdb_rating = $imdb_rating;

						}

					}

					// Validate IMDb Rating Count

					if (isset($imdb_rating_count)) {

						if (strlen($imdb_rating_count) < 12) {

							if ($imdb_rating_count >= 1 && $imdb_rating_count <= 99999999999) {
								$new_imdb_rating_count = $imdb_rating_count;
							} else {
								$errors[] = 'IMDb rating count is less than 1 or grater than 99999999999';
							}

						} else {

							$errors[] = 'IMDb Rating count is much longer';

						}

					}

					// Validate Genres

					if (isset($genre)) {

						$genres_set = '';

						foreach ($genre as $name => $value) {
							
							$genres_set .= $value . ", ";

						}

						$new_genres = rtrim($genres_set, ", ");

					}

					// Validate Rotten Tomatoes Rating

					if (isset($rotten_tomatoes)) {

						if (strlen($rotten_tomatoes) < 4) {

							if ($rotten_tomatoes >= 1 && $rotten_tomatoes <= 100) {
								$new_rotten_tomatoes = $rotten_tomatoes;
							} else {
								$errors[] = 'Rotten Tomatoes rating is less than 1 or grater than 100';
							}

						} else {

							$errors[] = 'Rotten Tomatoes Rating is much longer';

						}

					}

					// Validate Rotten Tomatoes Audience Score Rating

					if (isset($audience_score)) {

						if (strlen($audience_score) < 4) {

							if ($audience_score >= 1 && $audience_score <= 100) {
								$new_audience_score = $audience_score;
							} else {
								$errors[] = 'Rotten Tomatoes User Audience Score is less than 1 or grater than 100';
							}

						} else {

							$errors[] = 'Rotten Tomatoes Rating is much longer';

						}

					}

					// Validate Rotten Tomatoes User Rating Count

					if (isset($rotten_rating_count)) {

						if (strlen($rotten_rating_count) < 12) {

							if ($rotten_rating_count >= 1 && $rotten_rating_count <= 99999999999) {
								$new_rotten_rating_count = $rotten_rating_count;
							} else {
								$errors[] = 'Rotten Tomatoes User Rating count is less than 1 or grater than 99999999999';
							}

						} else {

							$errors[] = 'Rotten Tomatoes User Rating count is much longer';

						}

					}

					// Validate Size

					if (isset($size)) {

						// Check whether it is MB or GB

						if ($size < 1024 && $size > 0) {

							if (strpos($size, '.') !== false) {
								if ($size < 10) {
									$new_size = $size . "GB";
								} else {
									$new_size = $size . "MB";
								}
							} else {
								$new_size = $size . "MB";
							}

						} else {

							$errors[] = 'Invalid file size';

						}

					}

					// Validate Box Office

					if (isset($box_office)) {

						if (strlen($box_office) < 12) {

							if ($box_office >= 1 && $box_office <= 99999999999) {
								$new_box_office = $box_office;
							} else {
								$errors[] = 'Box Office value is less than 1 or grater than 99999999999';
							}

						} else {

							$errors[] = 'Box office value is much longer';

						}

					}

					// Validate Quality

					if (isset($quality) && isset($resolution)) {

						// Check resolution

						if ($resolution == "1080p") {
							$new_quality = $resolution ." ";
						} else if ($resolution == "720p") {
							$new_quality = $resolution ." ";
						} else {
							$new_quality = $resolution ." ";
						}

						// Check quality

						if ($quality == "WEB") {
							$new_quality .= $quality;
						} else if ($quality == "BRRip") {
							if ($new_quality == "480p ") {
								$new_quality = "720p BRRip";
							} else {
								$new_quality .= $quality;
							}
						} else {
							if ($new_quality == "480p " || $new_quality == "720p ") {
								$new_quality = "1080p 3D BluRay";
							} else {
								$new_quality .= $quality;
							}
						}

					}

					// Validate Directors

					if (isset($directors)) {

						$trim_directors = trim($directors);
						$new_directors = ucwords($trim_directors);

					}

					// Validate description

					if (isset($description)) {

						if (strlen($description) <= 10000) {

							$new_description = trim($description);

						}

					}

					// Validate Colour

					if (isset($color)) {

						$escape_color = trim($color);
						$lower_color = strtolower($escape_color);

						if (strpos($lower_color, '#') !== false) {
							$re_color = $lower_color;
						} else {
							$re_color = "#" . $lower_color;
						}

						if (strpos($re_color, '000000') !== false || strrpos($re_color, 'ffffff') !== false) {
							$errors[] = "Enter different colour without black (#000000) and white (#ffffff)";
						} else {
							$new_color = $re_color;
						}

					}

					// Poster Image Upload

					if (isset($poster_image)) {
						
						$file_name = $poster_image['name'];
						$file_type = $poster_image['type'];
						$tmp_name = $poster_image['tmp_name'];
						$file_error = $poster_image['error'];
						$file_size = $poster_image['size'];

						$folder_name = str_replace(': ', ' - ', $_POST['name']);

						$exploded_date = explode('-', $release_date);
						$year = $exploded_date[0];
						$upload_dir = './movies/' . $folder_name. ' (' . $year . ')/';

						if (is_dir($upload_dir) === false) {
							mkdir($upload_dir, 0777, true);
						}

						if ($file_type != "image/jpeg") {
							$imgerrors[] = 'Image file should be jpg.';
						}

						if ($file_error > 0) {
							$imgerrors[] = 'File may be invalid or corrupted.';
						}

						if ($file_size > 1000000) {
							$imgerrors[] = 'File size should be less than 1MB.';
						}

						if (empty($imgerrors)) {

							move_uploaded_file($tmp_name, $upload_dir . 'poster.jpg');

						}

					}

					// Background Image Upload

					if (isset($background_image)) {
						
						$file_name = $background_image['name'];
						$file_type = $background_image['type'];
						$tmp_name = $background_image['tmp_name'];
						$file_error = $background_image['error'];
						$file_size = $background_image['size'];

						$folder_name = str_replace(': ', ' - ', $_POST['name']);

						$exploded_date = explode('-', $release_date);
						$year = $exploded_date[0];
						$upload_dir = './movies/' . $folder_name. ' (' . $year . ')/';

						if (is_dir($upload_dir) === false) {
							mkdir($upload_dir, 0777, true);
						}

						if ($file_type != "image/jpeg") {
							$imgerrors[] = 'Image file should be jpg.';
						}

						if ($file_error > 0) {
							$imgerrors[] = 'File may be invalid or corrupted.';
						}

						if ($file_size > 1000000) {
							$imgerrors[] = 'File size should be less than 1MB.';
						}

						if (empty($imgerrors)) {

							move_uploaded_file($tmp_name, $upload_dir . 'background.jpg');

						}

					}

					// Validate Trailer

					if (isset($trailer)) {

						if (strpos($trailer, 'https://www.youtube.com/embed/') !== false || strpos($trailer, 'https://www.youtube.com/watch?v=') !== false || strpos($trailer, 'https://youtu.be/') !== false) {

							$get_yt_mov_id = substr($trailer, -11);
							$new_trailer = 'https://www.youtube.com/embed/' . $get_yt_mov_id;

						} else {

							$errors[] = 'Trailer link should be YouTube. (Embed)';

						}

					}

					// Validate Download Link

					if (isset($download_link)) {

						if (strlen($download_link) < 5000) {
							$new_download_link = $download_link;
						} else {
							$errors[] = 'Download Link must be least 5000 characters.';
						}

					}

					// Validate Subtitles Download Link

					if (isset($sub_download_link)) {

						if (strlen($sub_download_link) < 5000) {
							$new_sub_download_link = $sub_download_link;
						} else {
							$errors[] = 'Subtitle Download Link must be least 5000 characters.';
						}

					}

					// Validate keywords

					if (isset($keywords)) {

						if (strlen($keywords) <= 65535) {

							$new_keywords = trim($keywords);

						}

					}

					if (empty($errors)) {

						$update_query = "UPDATE movies SET name = '{$new_name}', age_rating = '{$new_age_rating}', runtime = '{$new_runtime}', imdb_rating = '{$new_imdb_rating}', imdb_rating_count = '{$new_imdb_rating_count}', release_date = '{$new_release_date}', genres = '{$new_genres}', rotten_tomatoes = '{$new_rotten_tomatoes}', audience_score = '{$new_audience_score}', rotten_rating_count = '{$new_rotten_rating_count}', size = '{$new_size}', box_office = '{$new_box_office}', quality = '{$new_quality}', directors = '{$new_directors}', description = '{$new_description}', color = '{$new_color}', trailer = '{$new_trailer}', download_link = '{$new_download_link}', sub_download_link = '{$sub_download_link}', keywords = '{$new_keywords}' WHERE id = '{$id}' LIMIT 1";

						$result = mysqli_query($connection, $update_query);

					}

				}

			}

		}

	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=7">
	<link rel="stylesheet" href="css/enter.css">
	<title>Update</title>
</head>
<body>

	<input type="checkbox" name="dark-mode" id="dark-mode" style="position: fixed;" title="Dark Mode">
	<div class="container">
		<form action="update.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend>Update film details</legend>
				<div class="messages">
					<?php
						if (isset($_POST['update'])) {
							if (isset($result)) {
								echo "<p class=\"success\">" . $_POST['name'] . " has been updated</p>";
								header('Location: view.php?id=' . $id);
							}
							if (!empty($errors) || !empty($imgerrors)) {
								echo "<div class=\"errors\">";
								foreach ($errors as $key => $value) {
									echo "<p>" . $value . "</p>";
								}
								if (!empty($imgerrors)) {
									foreach ($imgerrors as $key => $value) {
										echo "<p>" . $value . "</p>";
									}
								}
								echo "</div>";
							}
						}
					?>
				</div>
				<label>Name: </label>
					<input type="text" name="name" id="name" maxlength="255" placeholder="Enter film name" value="<?php if (isset($id)) { echo $get_name; } ?>">
				<label>Age Rating: </label>
					<input type="radio" name="age-rating" id="age-rating" value="PG-13" <?php if (isset($id)) { if ($get_age_rating == "PG-13") { echo 'checked'; } } else { echo 'checked'; } ?>> PG-13
					<input type="radio" name="age-rating" id="age-rating" value="G" <?php if (isset($id)) { if ($get_age_rating == "G") { echo 'checked'; } } ?>> G
					<input type="radio" name="age-rating" id="age-rating" value="PG" <?php if (isset($id)) { if ($get_age_rating == "PG") { echo 'checked'; } } ?>> PG
					<input type="radio" name="age-rating" id="age-rating" value="R-Rated" <?php if (isset($id)) { if ($get_age_rating == "R-Rated") { echo 'checked'; } } ?>> R-Rated
					<input type="radio" name="age-rating" id="age-rating" value="NC-17" <?php if (isset($id)) { if ($get_age_rating == "NC-17") { echo 'checked'; } } ?>> NC-17
				<label>Runtime: </label>
					<input type="number" name="hours" id="hours" min="1" max="20" value="<?php if (isset($id)) { echo $set_hours; } else { echo '2'; } ?>"> hr
					<input type="number" name="minutes" id="minutes" min="1" max="59" value="<?php if (isset($id)) { echo $set_minutes; } else { echo '30'; } ?>"> min
				<label>Rating: </label>
					<input type="number" name="imdb-rating" id="imdb-rating" min="0.1" max="10.0" value="<?php if (isset($id)) { echo $get_imdb_rating; } else { echo '6.0'; } ?>" step="0.1">
				<label>Rating Count: </label>
					<input type="number" name="imdb-rating-count" id="imdb-rating-count" min="0" max="99999999999" value="<?php if (isset($id)) { echo $get_imdb_rating_count; } else { echo '0'; } ?>" step="1">
				<label>Release date: </label>
					<input type="date" name="release-date" id="release-date" value="<?php if (isset($id)) { echo $get_release_date; } ?>" min="2001-01-01" max="<?php echo date('Y-m-d'); ?>">
				<label>Genres: </label>
					<ul>
						<li><input type="checkbox" name="genre[Action]" id="genre" value="Action" <?php if (isset($id)) { for ($i = 0; $i < $explode_genres_len; $i++) { if ($explode_genres[$i] == "Action") { echo 'checked'; } } } ?>> Action</li>
						<li><input type="checkbox" name="genre[Adventure]" id="genre" value="Adventure" <?php if (isset($id)) { for ($i = 0; $i < $explode_genres_len; $i++) { if ($explode_genres[$i] == "Adventure") { echo 'checked'; } } } ?>> Adventure</li>
						<li><input type="checkbox" name="genre[Animation]" id="genre" value="Animation" <?php if (isset($id)) { for ($i = 0; $i < $explode_genres_len; $i++) { if ($explode_genres[$i] == "Animation") { echo 'checked'; } } } ?>> Animation</li>
						<li><input type="checkbox" name="genre[Biography]" id="genre" value="Biography" <?php if (isset($id)) { for ($i = 0; $i < $explode_genres_len; $i++) { if ($explode_genres[$i] == "Biography") { echo 'checked'; } } } ?>> Biography</li>
						<li><input type="checkbox" name="genre[Comedy]" id="genre" value="Comedy" <?php if (isset($id)) { for ($i = 0; $i < $explode_genres_len; $i++) { if ($explode_genres[$i] == "Comedy") { echo 'checked'; } } } ?>> Comedy</li>
						<li><input type="checkbox" name="genre[Crime]" id="genre" value="Crime" <?php if (isset($id)) { for ($i = 0; $i < $explode_genres_len; $i++) { if ($explode_genres[$i] == "Crime") { echo 'checked'; } } } ?>> Crime</li>
						<li><input type="checkbox" name="genre[Drama]" id="genre" value="Drama" <?php if (isset($id)) { for ($i = 0; $i < $explode_genres_len; $i++) { if ($explode_genres[$i] == "Drama") { echo 'checked'; } } } ?>> Drama</li>
						<li><input type="checkbox" name="genre[Family]" id="genre" value="Family" <?php if (isset($id)) { for ($i = 0; $i < $explode_genres_len; $i++) { if ($explode_genres[$i] == "Family") { echo 'checked'; } } } ?>> Family</li>
						<li><input type="checkbox" name="genre[Fantasy]" id="genre" value="Fantasy" <?php if (isset($id)) { for ($i = 0; $i < $explode_genres_len; $i++) { if ($explode_genres[$i] == "Fantasy") { echo 'checked'; } } } ?>> Fantasy</li>
						<li><input type="checkbox" name="genre[Film-Noir]" id="genre" value="Film-Noir" <?php if (isset($id)) { for ($i = 0; $i < $explode_genres_len; $i++) { if ($explode_genres[$i] == "Film-Noir") { echo 'checked'; } } } ?>> Film-Noir</li>
						<li><input type="checkbox" name="genre[History]" id="genre" value="History" <?php if (isset($id)) { for ($i = 0; $i < $explode_genres_len; $i++) { if ($explode_genres[$i] == "History") { echo 'checked'; } } } ?>> History</li>
						<li><input type="checkbox" name="genre[Horror]" id="genre" value="Horror" <?php if (isset($id)) { for ($i = 0; $i < $explode_genres_len; $i++) { if ($explode_genres[$i] == "Horror") { echo 'checked'; } } } ?>> Horror</li>
						<li><input type="checkbox" name="genre[Music]" id="genre" value="Music" <?php if (isset($id)) { for ($i = 0; $i < $explode_genres_len; $i++) { if ($explode_genres[$i] == "Music") { echo 'checked'; } } } ?>> Music</li>
						<li><input type="checkbox" name="genre[Musical]" id="genre" value="Musical" <?php if (isset($id)) { for ($i = 0; $i < $explode_genres_len; $i++) { if ($explode_genres[$i] == "Musical") { echo 'checked'; } } } ?>> Musical</li>
						<li><input type="checkbox" name="genre[Mystery]" id="genre" value="Mystery" <?php if (isset($id)) { for ($i = 0; $i < $explode_genres_len; $i++) { if ($explode_genres[$i] == "Mystery") { echo 'checked'; } } } ?>> Mystery</li>
						<li><input type="checkbox" name="genre[Romance]" id="genre" value="Romance" <?php if (isset($id)) { for ($i = 0; $i < $explode_genres_len; $i++) { if ($explode_genres[$i] == "Romance") { echo 'checked'; } } } ?>> Romance</li>
						<li><input type="checkbox" name="genre[Sci-Fi]" id="genre" value="Sci-Fi" <?php if (isset($id)) { for ($i = 0; $i < $explode_genres_len; $i++) { if ($explode_genres[$i] == "Sci-Fi") { echo 'checked'; } } } ?>> Sci-Fi</li>
						<li><input type="checkbox" name="genre[Sport]" id="genre" value="Sport" <?php if (isset($id)) { for ($i = 0; $i < $explode_genres_len; $i++) { if ($explode_genres[$i] == "Sport") { echo 'checked'; } } } ?>> Sport</li>
						<li><input type="checkbox" name="genre[Thriller]" id="genre" value="Thriller" <?php if (isset($id)) { for ($i = 0; $i < $explode_genres_len; $i++) { if ($explode_genres[$i] == "Thriller") { echo 'checked'; } } } ?>> Thriller</li>
						<li><input type="checkbox" name="genre[War]" id="genre" value="War" <?php if (isset($id)) { for ($i = 0; $i < $explode_genres_len; $i++) { if ($explode_genres[$i] == "War") { echo 'checked'; } } } ?>> War</li>
						<li><input type="checkbox" name="genre[Western]" id="genre" value="Western" <?php if (isset($id)) { for ($i = 0; $i < $explode_genres_len; $i++) { if ($explode_genres[$i] == "Western") { echo 'checked'; } } } ?>> Western</li>
					</ul>
				<label>Rotten Tomatoes: </label>
					<input type="number" name="rotten-tomatoes" id="rotten-tomatoes" min="0" max="100" value="<?php if (isset($id)) { echo $get_rotten_tomatoes; } else { echo '0'; } ?>" step="1"> %
				<label>Audience Score: </label>
					<input type="number" name="audience-score" id="audience-score" min="0" max="100" value="<?php if (isset($id)) { echo $get_audience_score; } else { echo '0'; } ?>" step="1"> %
				<label>Rotten Tomatoes User Rating Count: </label>
					<input type="number" name="rotten-rating-count" id="rotten-rating-count" min="0" max="99999999999" value="<?php if (isset($id)) { echo $get_rotten_rating_count; } else { echo '0'; } ?>" step="1">
				<label>File size: </label>
					<input type="number" name="size" id="size" min="1" max="1023" value="<?php if (isset($id)) { echo $set_size; } else { echo '1'; } ?>" step="0.01"> MB or GB
				<label>Box Office: </label>
					<input type="number" name="box-office" id="box-office" min="1" max="99999999999" value="<?php if (isset($id)) { echo $get_box_office; } else { echo '1'; } ?>" step="1"> $
				<label>Quality: </label>
					<input type="radio" name="quality" id="quality" value="WEB" <?php if (isset($id)) { if ($check_quality == "WEB") { echo 'checked'; } } else { echo 'checked'; } ?>> WEB
					<input type="radio" name="quality" id="quality" value="BRRip" <?php if (isset($id)) { if ($check_quality == "BRRip") { echo 'checked'; } } ?>> BluRay
					<input type="radio" name="quality" id="quality" value="3D BluRay" <?php if (isset($id)) { if ($check_quality == "3D") { echo 'checked'; } } ?>> 3D BluRay
					<select name="resolution" id="resolution">
						<option value="1080p" <?php if (isset($id)) { if ($select_resolution == "1080p") { echo 'selected'; } } else { echo 'selected'; } ?>>1080p</option>
						<option value="720p" <?php if (isset($id)) { if ($select_resolution == "720p") { echo 'selected'; } } ?>>720p</option>
						<option value="480p" <?php if (isset($id)) { if ($select_resolution == "480p") { echo 'selected'; } } ?>>480p</option>
					</select>
				<label>Directors: </label>
					<input type="text" name="directors" id="directors" maxlength="255" placeholder="Enter Directors" value="<?php if (isset($id)) { echo $get_directors; } ?>">
				<label>Description</label>
					<textarea id="description" name="description" rows="5" cols="33" placeholder="Movie description..."><?php if (isset($id)) { echo $get_description; } ?></textarea>
				<label>Colour: </label>
					<input type="text" name="color" id="color" maxlength="7" placeholder="Enter hex color code" value="<?php if (isset($id)) { echo $get_color; } ?>">
				<label>Upload Movie Poster Image: </label>
					<pre>NOTE: Image file size should be 230px 345px. (YTS)</pre>
					<input type="file" name="poster-image" id="poster-image" accept="image/jpeg">
				<label>Upload Movie Background Image: </label>
					<pre>NOTE: Image file size should be 1920px 1080px.</pre>
					<input type="file" name="background-image" id="background-image" accept="image/jpeg">
				<label>Enter Movie Trailer Link: </label>
					<pre>NOTE: Trailer link should be YouTube.</pre>
					<input type="url" name="trailer" id="trailer" pattern="https://.*" placeholder="https://youtu.be/CJLYq0b81bo" value="<?php if (isset($id)) { echo $get_trailer; } ?>">
				<label>Enter Movie Download Link: </label>
					<pre>NOTE: Download link should be torrent.</pre>
					<input type="url" name="download-link" id="download-link" value="<?php if (isset($id)) { echo $get_download_link; } ?>">
				<label>Enter Movie Subtitle Download Link: </label>
					<input type="url" name="sub-download-link" id="sub-download-link" value="<?php if (isset($id)) { echo $get_sub_download_link; } ?>">
				<label>Keywords</label>
					<textarea id="keywords" name="keywords" rows="5" cols="33" placeholder="Keywords for movie..."><?php if (isset($id)) { echo $get_keywords; } ?></textarea>
				<button type="submit" name="update" id="update">Update</button>
			</fieldset>
		</form>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#dark-mode").click(function(){
				if ($(this).is(":checked")) {
					$("body").css({"background-color":"#1b1b1b", "color":"#fff"});
					$("label").css("color","yellow");
				} else if ($(this).is(":not(:checked)")) {
					$("body").css({"background-color":"#fff", "color":"#000"});
					$("label").css("color","blue");
				}
			});
		});
	</script>
</body>
</html>