<?php
$title_substr = mb_substr($res->title, 0, 2);
$artist_substr = mb_substr($res->artist, 0, 2);
$genre_substr = mb_substr($res->genre, 0, 2);
$music_data = DB::table('music_lists')
	->where([
		['title', 'like', "$title_substr%"],
		['genre', 'like', "$genre_substr%"],
		['artist', 'like', "$artist_substr%"]
	])
	->first();
