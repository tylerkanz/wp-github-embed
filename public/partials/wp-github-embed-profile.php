<?php
add_shortcode('gh-profile', 'gh_profile_func');
function gh_profile_func($atts = array())
{
    ob_start();
    extract(shortcode_atts(array('user' => ''), $atts));
    $response = fetch_from_github('https://api.github.com/users/' . $user);
    $github_profile = json_decode($response['body']);

    if ($github_profile->login) {
        global $wpdb;
        $get_meta = $wpdb->get_results($wpdb->prepare('SELECT meta_value FROM ' . $wpdb->prefix . 'git_embed_meta WHERE meta_key="profile" AND user=%s', $user));
        if (!$get_meta) {
            $wpdb->insert($wpdb->prefix . 'git_embed_meta', array(
                'meta_key' => 'profile',
                'user' => $user,
                'meta_value' => serialize($github_profile)
            ));
        } else {
            $wpdb->update($wpdb->prefix . 'git_embed_meta', array('meta_value' => serialize($github_profile)), array('meta_key' => 'profile', 'user' => $user));
        }
    } else {
        $github_profile = unserialize($wpdb->get_results($wpdb->prepare('SELECT meta_value FROM ' . $wpdb->prefix . 'git_embed_meta WHERE meta_key="profile" AND user=%s', $user)));
    }

?>
    <div class="row mb-4">
        <div class="col-5-lg border border-secondary rounded p-4 mt-4 mx-auto">
            <div class="row align-items-center">
                <div class="col-3-lg ml-4 mr-4">
                    <img src="<?php echo $github_profile->avatar_url; ?>" style="max-width: 200px" class="rounded-circle border ">
                </div>
                <div class="col-lg border-bottom">
                    <ul class="list-group flex-row">
                        <li class="list-group-item bg-transparent border-0">
                            <a class="text-secondary" href="https://github.com/<?php echo $github_profile->login; ?>?tab=repositories">
                                <i class="fas fa-book mr-2"></i>Repositories
                            </a>
                            <span class="badge badge-primary badge-pill"><?php echo $github_profile->public_repos; ?></span>
                        </li>
                        <li class="list-group-item bg-transparent border-0">
                            <a>
                                <i class="far fa-file mr-2"></i>Gists
                            </a>
                            <span class="badge badge-primary badge-pill"><?php echo $github_profile->public_gists; ?></span>
                        </li>
                        <li class="list-group-item bg-transparent border-0">
                            <a class="text-secondary" href="https://github.com/<?php echo $github_profile->login; ?>?tab=followers">
                                <i class="fas fa-users mr-2"></i>Followers
                            </a>
                            <span class="badge badge-primary badge-pill"><?php echo $github_profile->followers; ?></span>
                        </li>
                        <li class="list-group-item bg-transparent border-0">
                            <a class="text-secondary" href="https://github.com/<?php echo $github_profile->login; ?>?tab=following">
                                <i class="fas fa-user-friends mr-2"></i>Following
                            </a>
                            <span class="badge badge-primary badge-pill"><?php echo $github_profile->following; ?></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-3 mt-4 ml-4">
                    <h3>Tyler Kanz</h3>
                    <hr class="ml-0 w-100">
                    <?php if ($github_profile->login) : ?>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-user"></i>
                            <a class="text-secondary mb-0 pl-2" href="https://github.com/<?php echo $github_profile->login; ?>">
                                <?php echo $github_profile->login; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if ($github_profile->company) : ?>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-building"></i>
                            <p class="mb-0 pl-2">
                                <?php echo $github_profile->company; ?>
                            </p>
                        </div>
                    <?php endif; ?>
                    <?php if ($github_profile->blog) : ?>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-globe"></i>
                            <a class="text-secondary mb-0 pl-2" href="<?php echo $github_profile->blog; ?>">
                                <?php echo $github_profile->blog; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if ($github_profile->location) : ?>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-map-marker"></i>
                            <p class="mb-0 pl-2">
                                <?php echo $github_profile->location; ?>
                            </p>
                        </div>
                    <?php endif; ?>
                    <?php if ($github_profile->created_at) : ?>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-calendar"></i>
                            <p class="mb-0 pl-2">
                                Est. <?php echo date("F j, Y", strtotime($github_profile->created_at)); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if ($github_profile->login) : ?>
                    <div class="col-6 mx-auto mt-4">
                        <h3>Bio</h3>
                        <hr class="ml-0 ">
                        <p><?php echo $github_profile->bio; ?></p>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-primary text-light" href="https://github.com/<?php echo $github_profile->login; ?>">View on GitHub <i class="fab fa-github"></i></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </div>
<?php
    return ob_get_clean();
}
