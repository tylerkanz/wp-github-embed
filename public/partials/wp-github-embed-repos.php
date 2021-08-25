<?php
/* Ran into API limits WILL come back to this 
add_shortcode('gh-repo', 'gh_repo_func');
function gh_repo_func()
{
    $response = fetch_from_github('https://api.github.com/repos/tylerkanz/tk-theme/git/trees/main');
    $tree = json_decode($response['body']);

    $directories_files = array();
    foreach ($tree->tree as $tree_object) {
        if ($tree_object->type == 'tree') {
            $commit_response = fetch_from_github('https://api.github.com/repos/tylerkanz/tk-theme/commits?path=' . $tree_object->path);
            $commits = json_decode($commit_response['body']);
            $commits = array_slice($commits, 0, 1);
         
            var_dump($commits);
            $directories_files[] = array('folder'=>$tree_object->path);
        }
    }
    foreach ($tree->tree as $tree_object) {
        if ($tree_object->type != 'tree') {
            $directories_files[] = array('file' => $tree_object->path);
        }
    }
    var_dump($directories_files); 
    
} */
?>