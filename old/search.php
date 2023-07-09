<?php

	$connection = mysqli_connect('localhost', 'root', '', 'movie_list');
	$output = '';

	// Collect
	if (isset($_POST['searchVal']) || !empty($_POST['searchVal']) || strlen(trim($_POST['searchVal'])) > 1) {
		$searchq = $_POST['searchVal'];
		// $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
		$query = "SELECT * FROM movie_data WHERE name LIKE '%{$searchq}%' ORDER BY rel_date DESC, name LIMIT 15";
		$result_set = mysqli_query($connection, $query);
		$count = mysqli_num_rows($result_set);
		
		if ($count == 0) {
			$output .= '<p style="color: #fff;">There was no search result!</p>';
		} else {
			while ($row = mysqli_fetch_assoc($result_set)) {
				$m_id = $row['m_id'];
				$name = $row['name'];
				$released = $row['rel_date'];
				$date = explode('-', $released);
				$year = $date[0];

				$output .= '<a href="view.php?id=' . $m_id . '" target="_blank">' . '<img data-original="./images/' . $m_id . '.jpg" title="' . $name . ' (' . $year . ')" alt="' . $name . '" class="lazy">' . '</a>';
			}
		}
	}

	echo $output;

?>