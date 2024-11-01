<?php
require_once('wsp-functions.php');
class WordpresStackoverfloWidget extends WP_Widget {
    function WordpresStackoverfloWidget(){
        $wsp_widget_opts = array(
            'class' => 'wsplus',
            'desc' => 'Showcase Your Stackoverflow Profile'
        );
        $this->WP_Widget('WordpresStackoverfloWidget', 'StackOverflow+', $wsp_widget_opts);
    }
    function form($instance){
        $instance = wp_parse_args((array) $instance,
                                  array(
                                            'title' => '',
                                            'stackoverflow_id' => '',
                                            'avatar' => 'false',
                                            'accept_rate' => 'true',
                                            'badges' => 'true',
                                            'reputation' => 'true',
                                            'join_date' => 'true',
                                            'feed_type' => 'none',
                                            'no_of_fitems' => 5,
                                            'feed_title' => '',
                                            'link_to_profile' => 'true',
                                            'show_credits' => 'true'
                                        )
                                  );
        //Instance Element Shortcuts
        $title = $instance['title'];
        $stackoverflow_id = $instance['stackoverflow_id'];
        $avatar = $instance['avatar'];
        $accept_rate = $instance['accept_rate'];
        $link_to_profile = $instance['link_to_profile'];
        $badges = $instance['badges'];
        $reputation = $instance['reputation'];
        $join_date = $instance['join_date'];
        $feed_type = $instance['feed_type'];
        $no_of_fitems = $instance['no_of_fitems'];
        $feed_title = $instance['feed_title'];
        $show_credits = $instance['show_credits'];
        ?>
        <div>
            <strong style="text-decoration: underline;">General Options</strong>
            <br><br>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>">Widget Title: </label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" placeholder="Example: My Stackoverflow Stats" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('stackoverflow_id'); ?>">Enter your Stackoverflow id: </label>
                <input class="widefat" id="<?php echo $this->get_field_id('stackoverflow_id'); ?>" name="<?php echo $this->get_field_name('stackoverflow_id'); ?>" type="text" value="<?php echo attribute_escape($stackoverflow_id); ?>" placeholder="Example: 3726381" />
            </p>
            <strong style="text-decoration: underline;">Display Options</strong>
            <br><br>
            <p>
                <input class="checkbox" type="checkbox" value="true" id="<?php echo $this->get_field_id('avatar'); ?>" name="<?php echo $this->get_field_name('avatar'); ?>"<?php checked( $instance['avatar'], 'true' ); ?> />
                <label for="<?php echo $this->get_field_id('avatar'); ?>">Display Avatar</label><br>
                <input class="checkbox" type="checkbox" value="true" id="<?php echo $this->get_field_id('badges'); ?>" name="<?php echo $this->get_field_name('badges'); ?>"<?php checked( $instance['badges'], 'true' ); ?> />
                <label for="<?php echo $this->get_field_id('badges'); ?>">Display Badges</label><br>
                <input class="checkbox" type="checkbox" value="true" id="<?php echo $this->get_field_id('accept_rate'); ?>" name="<?php echo $this->get_field_name('accept_rate'); ?>"<?php checked( $instance['accept_rate'], 'true' ); ?> />
                <label for="<?php echo $this->get_field_id('accept_rate'); ?>">Show Accept Rate</label><br>
                <input class="checkbox" type="checkbox" value="true" id="<?php echo $this->get_field_id('reputation'); ?>" name="<?php echo $this->get_field_name( 'reputation' ); ?>"<?php checked( $instance['reputation'], 'true' ); ?> />
                <label for="<?php echo $this->get_field_id('reputation'); ?>">Display Reputation</label><br>
                <input class="checkbox" type="checkbox" value="true" id="<?php echo $this->get_field_id('join_date'); ?>" name="<?php echo $this->get_field_name( 'join_date' ); ?>"<?php checked( $instance['join_date'], 'true' ); ?> />
                <label for="<?php echo $this->get_field_id('join_date'); ?>">Display Join Date</label><br>
                <input class="checkbox" type="checkbox" value="true" id="<?php echo $this->get_field_id('link_to_profile'); ?>" name="<?php echo $this->get_field_name( 'link_to_profile' ); ?>"<?php checked( $instance['link_to_profile'], 'true' ); ?> />
                <label for="<?php echo $this->get_field_id('link_to_profile'); ?>">Show Link to Stackoverflow Profile</label><br>
                <input class="checkbox" type="checkbox" value="true" id="<?php echo $this->get_field_id('show_credits'); ?>" name="<?php echo $this->get_field_name( 'show_credits' ); ?>"<?php checked( $instance['show_credits'], 'true' ); ?> />
                <label for="<?php echo $this->get_field_id('show_credits'); ?>">Show Powered By Link</label><br>
            </p>
            <p>
                <strong style="text-decoration: underline;">QnA Feed Options</strong>
                <br><br>
                <div><label for="<?php echo $this->get_field_id('feed_type') ?>">Choose Feed Type:</label>
                <select id="<?php echo $this->get_field_id('feed_type') ?>" name="<?php echo $this->get_field_name('feed_type'); ?>">
                    <option <?php selected( $instance['feed_type'], 'none'); ?> value="none">None</option>
                    <option <?php selected( $instance['feed_type'], 'questions'); ?> value="questions">Questions</option>
                    <option <?php selected( $instance['feed_type'], 'answers'); ?> value="answers">Answers</option>
                </select></div>
                <p><label for="<?php echo $this->get_field_id('no_of_fitems') ?>">No. of items to show:</label><br>
                    <input class="widefat" id="<?php echo $this->get_field_id('no_of_fitems'); ?>" name="<?php echo $this->get_field_name('no_of_fitems'); ?>" type="text" value="<?php echo attribute_escape($no_of_fitems); ?>" />
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id('feed_title'); ?>">Feed Title: </label>
                    <input class="widefat" id="<?php echo $this->get_field_id('feed_title'); ?>" name="<?php echo $this->get_field_name('feed_title'); ?>" type="text" value="<?php echo attribute_escape($feed_title); ?>" placeholder="Example: My Recent Answers" />
                </p>
            </p>
            <p>
                <a href="http://techstricks.com/wordpress-stackoverflow-plus-plugin/">Detailed Documentation</a><br>
                <a href="mailto:admin@techstricks.com">Report Bugs or Issues</a>
            </p>
        </div>
        <?php
    }
    function update($new, $old){
        //TODO: Amyth: Compress with a Loop
        $instance = $old;
        $instance['title'] = $new['title'];
        $instance['stackoverflow_id'] = $new['stackoverflow_id'];
        $instance['avatar'] = $new['avatar'];
        $instance['accept_rate'] = $new['accept_rate'];
        $instance['link_to_profile'] = $new['link_to_profile'];
        $instance['badges'] = $new['badges'];
        $instance['reputation'] = $new['reputation'];
        $instance['join_date'] = $new['join_date'];
        $instance['feed_type'] = $new['feed_type'];
        $instance['no_of_fitems'] = $new['no_of_fitems'];
        $instance['feed_title'] = $new['feed_title'];
        $instance['show_credits'] = $new['show_credits'];
        return $instance;
    }
    
    function widget($args, $instance){
        $pfx = 'wsp-';
        extract($args, EXTR_SKIP);
        echo $before_widget;
        $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
        if (!empty($title))
            echo $before_title . $title . $after_title;;
            if (! $instance['stackoverflow_id'] == ''){
                // Get the User Profile Data from SO.
                $data = getUserData($instance['stackoverflow_id']);
                $profilefields = $data['items'][0];
                /* Now Check for User options
                  * and create the General Widget Layout
                  * According to the options user has chosen.
                */
                echo '<div id="'.$pfx.'widget"><div id="'.$pfx.'header-img">
                        <img src="'.plugins_url("images/so.png", __FILE__).'" />
                        </div><div id="'.$pfx.'layout-general">
                        <div class="'.$pfx.'layout-general-left-right"><div class="'.$pfx.'left">';
                
                //Show Avatar
                if($instance['avatar'] == 'true'){
                    echo '<div id="'.$pfx.'profile-image"><img src="'.$profilefields["profile_image"].'" alt="'.$profilefields["display_name"].'" /></div>';
                }
                //Show Badges
                if($instance['badges'] == 'true'){
                    echo '<div id="'.$pfx.'badges">
                            <div class="badge gold"></div>
                            <span id="'.$pfx.'badges-gold">'.$profilefields['badge_counts']['gold'].'</span>
                            <div class="badge silver"></div>
                            <span id="'.$pfx.'badges-silver">'.$profilefields['badge_counts']['silver'].'</span>
                            <div class="badge bronze"></div>
                            <span id="'.$pfx.'badges-bronze">'.$profilefields['badge_counts']['bronze'].'</span></div>';
                }
                echo '</div><div class="'.$pfx.'left">'; //Close the First Left Div and Open the Next One
                
                //Show Display Name
                echo '<div id="'.$pfx.'name"><strong>'.$profilefields['display_name'];
                
                //Show Reputation
                if ($instance['reputation'] == 'true'){
                    echo '<span id="'.$pfx.'reputation">('.$profilefields['reputation'].')</span></strong></div>';
                } else {
                    echo '</strong></div>';
                }
                
                
                
                //Show Accept Rate
                if($instance['accept_rate'] == 'true'){
                    echo'<div id="'.$pfx.'accept-rate"><strong>'.$profilefields["accept_rate"].'% Accept Rate</strong></div>';
                }
                
                //Show profile link
                if($instance['link_to_profile'] == 'true'){
                    echo '<div id="'.$pfx.'profile-button"><a class="'.$pfx.'profile-button" href="'.$profilefields["link"].'">View Profile</a></div>';
                }
                
                echo '</div><div class="wsp-clear"></div>'; //Close the Second Left Div alnd apply Cleaerfix
                
                //Show Join Date
                if($instance['join_date'] == 'true'){
                    echo '<div id="'.$pfx.'join-date">Join Date: '.date("d M Y", $profilefields["creation_date"]).'</div>';
                }
                        
                //Show Questions Feed
                if($instance['feed_type'] == 'questions'){
                    $feed = getUserData($instance['stackoverflow_id'], $type='questions');
                    $limiter = 0;
                    echo '<div class="'.$pfx.'feed"><div id="'.$pfx.'feed-title">'.$instance['feed_title'].'</div>';
                    while($limiter<=$instance['no_of_fitems'] - 1){
                        echo '<div class="'.$pfx.'feed-item">
                                <p class="'.$pfx.'feed-item-title">
                                <a href="'.$feed['items'][$limiter]['link'].'">
                                '.$feed['items'][$limiter]['title'].'
                                </a>
                                </p></div>
                        ';
                        $limiter++;
                    }
                    echo '</div>';
                    
                }
                //Show Answers Feed
                if($instance['feed_type'] == 'answers'){
                    $feed = getUserData($instance['stackoverflow_id'], $type='answers');
                    $limiter = 0;
                    $ids = '';
                    echo '<div class="'.$pfx.'feed"><div id="'.$pfx.'feed-title">'.$instance['feed_title'].'</div>';
                    while($limiter<=$instance['no_of_fitems'] - 1){
                        if ($ids == ''){
                            $ids = $ids.$feed['items'][$limiter]['question_id'];
                        } else {
                            $ids = $ids.';'.$feed['items'][$limiter]['question_id'];
                        }
                        $limiter++;
                    }
                    $answers = getUserData($ids, $type='byQuestionids');
                    foreach($answers['items'] as $ans){
                        echo '<div class="'.$pfx.'feed-item">
                                <p class="'.$pfx.'feed-item-title">
                                <a href="'.$ans['link'].'">
                                '.$ans['title'].'
                                </a>
                                </p></div>
                        ';
                    }
                    echo '</div>';
                }
                //Show Credits
                if($instance['show_credits'] == 'true'){
                    echo '<div id="'.$pfx.'footer-credit"><a href="http://techstricks.com/wordpress-stackoverflow-plus-plugin/">Powered by Stackoverflow+</a></div>';
                }
                echo "</div>";
            } else {
                echo '<div class="errors"><span class="error">You have not specified your Stackoverflow User Id, Please Configure the Plugin.</span></div>';
            }
        echo $after_widget;
    }
    
}
// Add the Widget to WP
add_action('widgets_init', create_function('', 'return register_widget("WordpresStackoverfloWidget");'));
?>