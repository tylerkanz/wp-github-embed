<?php
add_shortcode('gh-repo', 'gh_repo_func');

function gh_repo_func()
{
    $response = fetch_from_github('https://api.github.com/repos/tylerkanz/tk-theme/git/trees/main');
    var_dump(json_decode($response['body']));
}
?>