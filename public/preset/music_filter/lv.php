<?php
$title_substr = mb_substr($music_data->title, 0, 3);
$artist_substr = mb_substr($music_data->artist, 0, 3);
$genre_substr = mb_substr($music_data->genre, 0, 3);
$score_data = DB::table('scores_sp')
	->where([
		['title', 'like', "$title_substr%"],
		['genre', 'like', "$genre_substr%"],
		['artist', 'like', "$artist_substr%"]
	])
	->first();