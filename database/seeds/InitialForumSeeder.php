<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitialForumSeeder extends Seeder
{
    private $config = [
        'o_cur_version' => '1.5.11',
        'o_database_revision' => '21',
        'o_searchindex_revision' => '2',
        'o_parser_revision' => '2',
        'o_board_title' => 'My FluxBB Forum',
        'o_board_desc' => '<p><span>Unfortunately no one can be told what FluxBB is - you have to see it for yourself.</span></p>',
        'o_default_timezone' => '0',
        'o_time_format' => 'H:i:s',
        'o_date_format' => 'Y-m-d',
        'o_timeout_visit' => '1800',
        'o_timeout_online' => '300',
        'o_redirect_delay' => '1',
        'o_show_version' => '0',
        'o_show_user_info' => '1',
        'o_show_post_count' => '1',
        'o_signatures' => '1',
        'o_smilies' => '1',
        'o_smilies_sig' => '1',
        'o_make_links' => '1',
        'o_default_lang' => 'English',
        'o_default_style' => 'Air',
        'o_default_user_group' => '4',
        'o_topic_review' => '15',
        'o_disp_topics_default' => '30',
        'o_disp_posts_default' => '25',
        'o_indent_num_spaces' => '4',
        'o_quote_depth' => '3',
        'o_quickpost' => '1',
        'o_users_online' => '1',
        'o_censoring' => '0',
        'o_show_dot' => '0',
        'o_topic_views' => '1',
        'o_quickjump' => '1',
        'o_gzip' => '0',
        'o_additional_navlinks' => '',
        'o_report_method' => '0',
        'o_regs_report' => '0',
        'o_default_email_setting' => '1',
        'o_mailing_list' => 'admin@localhost',
        'o_avatars' => '1',
        'o_avatars_dir' => 'img/avatars',
        'o_avatars_width' => '60',
        'o_avatars_height' => '60',
        'o_avatars_size' => '10240',
        'o_search_all_forums' => '1',
        'o_base_url' => 'http://localhost',
        'o_admin_email' => 'admin@localhost',
        'o_webmaster_email' => 'admin@localhost',
        'o_forum_subscriptions' => '1',
        'o_topic_subscriptions' => '1',
        'o_smtp_host' => null,
        'o_smtp_user' => null,
        'o_smtp_pass' => null,
        'o_smtp_ssl' => '0',
        'o_regs_allow' => '1',
        'o_regs_verify' => '0',
        'o_announcement' => '0',
        'o_announcement_message' => 'Enter your announcement here.',
        'o_rules' => '0',
        'o_rules_message' => 'Enter your rules here',
        'o_maintenance' => '0',
        'o_maintenance_message' => 'The forums are temporarily down for maintenance. Please try again in a few minutes.',
        'o_default_dst' => '0',
        'o_feed_type' => '2',
        'o_feed_ttl' => '0',
        'p_message_bbcode' => '1',
        'p_message_img_tag' => '1',
        'p_message_all_caps' => '1',
        'p_subject_all_caps' => '1',
        'p_sig_all_caps' => '1',
        'p_sig_bbcode' => '1',
        'p_sig_img_tag' => '0',
        'p_sig_length' => '400',
        'p_sig_lines' => '4',
        'p_allow_banned_email' => '1',
        'p_allow_dupe_email' => '0',
        'p_force_guest_email' => '1',
    ];

    private $groups = [
        ['g_id' => 1, 'g_title' => 'Administrators', 'g_user_title' => 'Administrator', 'g_promote_min_posts' => 0, 'g_promote_next_group' => 0, 'g_moderator' => 0, 'g_mod_edit_users' => 0, 'g_mod_rename_users' => 0, 'g_mod_change_passwords' => 0, 'g_mod_ban_users' => 0, 'g_mod_promote_users' => 0, 'g_read_board' => 1, 'g_view_users' => 1, 'g_post_replies' => 1, 'g_post_topics' => 1, 'g_edit_posts' => 1, 'g_delete_posts' => 1, 'g_delete_topics' => 1, 'g_post_links' => 1, 'g_set_title' => 1, 'g_search' => 1, 'g_search_users' => 1, 'g_send_email' => 1, 'g_post_flood' => 0, 'g_search_flood' => 0, 'g_email_flood' => 0, 'g_report_flood' => 0],
        ['g_id' => 2, 'g_title' => 'Moderators', 'g_user_title' => 'Moderator', 'g_promote_min_posts' => 0, 'g_promote_next_group' => 0, 'g_moderator' => 1, 'g_mod_edit_users' => 1, 'g_mod_rename_users' => 1, 'g_mod_change_passwords' => 1, 'g_mod_ban_users' => 1, 'g_mod_promote_users' => 1, 'g_read_board' => 1, 'g_view_users' => 1, 'g_post_replies' => 1, 'g_post_topics' => 1, 'g_edit_posts' => 1, 'g_delete_posts' => 1, 'g_delete_topics' => 1, 'g_post_links' => 1, 'g_set_title' => 1, 'g_search' => 1, 'g_search_users' => 1, 'g_send_email' => 1, 'g_post_flood' => 0, 'g_search_flood' => 0, 'g_email_flood' => 0, 'g_report_flood' => 0],
        ['g_id' => 3, 'g_title' => 'Guests', 'g_user_title' => null, 'g_promote_min_posts' => 0, 'g_promote_next_group' => 0, 'g_moderator' => 0, 'g_mod_edit_users' => 0, 'g_mod_rename_users' => 0, 'g_mod_change_passwords' => 0, 'g_mod_ban_users' => 0, 'g_mod_promote_users' => 0, 'g_read_board' => 1, 'g_view_users' => 1, 'g_post_replies' => 0, 'g_post_topics' => 0, 'g_edit_posts' => 0, 'g_delete_posts' => 0, 'g_delete_topics' => 0, 'g_post_links' => 1, 'g_set_title' => 0, 'g_search' => 1, 'g_search_users' => 1, 'g_send_email' => 0, 'g_post_flood' => 60, 'g_search_flood' => 30, 'g_email_flood' => 0, 'g_report_flood' => 0],
        ['g_id' => 4, 'g_title' => 'Members', 'g_user_title' => null, 'g_promote_min_posts' => 0, 'g_promote_next_group' => 0, 'g_moderator' => 0, 'g_mod_edit_users' => 0, 'g_mod_rename_users' => 0, 'g_mod_change_passwords' => 0, 'g_mod_ban_users' => 0, 'g_mod_promote_users' => 0, 'g_read_board' => 1, 'g_view_users' => 1, 'g_post_replies' => 1, 'g_post_topics' => 1, 'g_edit_posts' => 1, 'g_delete_posts' => 1, 'g_delete_topics' => 1, 'g_post_links' => 1, 'g_set_title' => 0, 'g_search' => 1, 'g_search_users' => 1, 'g_send_email' => 1, 'g_post_flood' => 60, 'g_search_flood' => 30, 'g_email_flood' => 60, 'g_report_flood' => 60],
    ];

    private $guest = ['id' => 1, 'group_id' => 3, 'username' => 'Guest', 'password' => 'Guest', 'email' => 'Guest', 'title' => null, 'realname' => null, 'url' => null, 'jabber' => null, 'icq' => null, 'msn' => null, 'aim' => null, 'yahoo' => null, 'location' => null, 'signature' => null, 'disp_topics' => null, 'disp_posts' => null, 'email_setting' => 1, 'notify_with_post' => 0, 'auto_notify' => 0, 'show_smilies' => 1, 'show_img' => 1, 'show_img_sig' => 1, 'show_avatars' => 1, 'show_sig' => 1, 'timezone' => 0, 'dst' => 0, 'time_format' => 0, 'date_format' => 0, 'language' => 'English', 'style' => 'Air', 'num_posts' => 0, 'last_post' => null, 'last_search' => null, 'last_email_sent' => null, 'last_report_sent' => null, 'registered' => 0, 'registration_ip' => '0.0.0.0', 'last_visit' => 0, 'admin_note' => null, 'activate_string' => null, 'activate_key' => null];

    private $admin = ['id' => 2, 'group_id' => 1, 'username' => 'admin', 'password' => '', 'email' => 'admin@localhost', 'title' => null, 'realname' => null, 'url' => null, 'jabber' => null, 'icq' => null, 'msn' => null, 'aim' => null, 'yahoo' => null, 'location' => null, 'signature' => null, 'disp_topics' => null, 'disp_posts' => null, 'email_setting' => 1, 'notify_with_post' => 0, 'auto_notify' => 0, 'show_smilies' => 1, 'show_img' => 1, 'show_img_sig' => 1, 'show_avatars' => 1, 'show_sig' => 1, 'timezone' => 0, 'dst' => 0, 'time_format' => 0, 'date_format' => 0, 'language' => 'English', 'style' => 'Air', 'num_posts' => 1, 'last_post' => 0, 'last_search' => null, 'last_email_sent' => null, 'last_report_sent' => null, 'registered' => 0, 'registration_ip' => '127.0.0.1', 'last_visit' => 0, 'admin_note' => null, 'activate_string' => null, 'activate_key' => null];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Run it only once
        if (DB::table('categories')->count() > 0) {
            return;
        }

        $timestamp = time();
        $email = config('mail.from.address');

        DB::table('categories')->insert([
            'id' => 1,
            'cat_name' => 'Test category',
            'disp_position' => 1,
        ]);

        $this->config['o_base_url'] = config('app.url');
        $this->config['o_admin_email'] = $email;
        $this->config['o_webmaster_email'] = $email;
        $this->config['o_mailing_list'] = $email;
        $rows = [];
        foreach ($this->config as $key => $val) {
            $rows[] = ['conf_name' => $key, 'conf_value' => $val];
        }
        DB::table('config')->insert($rows);

        DB::table('forums')->insert([
            'id' => 1,
            'forum_name' => 'Test forum',
            'forum_desc' => 'This is just a test forum',
            'redirect_url' => null,
            'moderators' => null,
            'num_topics' => 1,
            'num_posts' => 1,
            'last_post' => $timestamp,
            'last_post_id' => 1,
            'last_poster' => $this->admin['username'],
            'sort_by' => 0,
            'disp_position' => 1,
            'cat_id' => 1.
        ]);

        DB::table('groups')->insert($this->groups);

        DB::table('posts')->insert([
            'id' => 1,
            'poster' => $this->admin['username'],
            'poster_id' => 2,
            'poster_ip' => '127.0.0.1',
            'poster_email' => null,
            'message' => 'If you are looking at this (which I guess you are), the install of FluxBB appears to have worked! Now log in and head over to the administration control panel to configure your forum.',
            'hide_smilies' => 0,
            'posted' => $timestamp,
            'edited' => null,
            'edited_by' => null,
            'topic_id' => 1,
        ]);

        DB::table('topics')->insert([
            'id' => 1,
            'poster' => $this->admin['username'],
            'subject' => 'Test topic',
            'posted' => $timestamp,
            'first_post_id' => 1,
            'last_post' => $timestamp,
            'last_post_id' => 1,
            'last_poster' => $this->admin['username'],
            'num_views' => 0,
            'num_replies' => 0,
            'closed' => 0,
            'sticky' => 0,
            'moved_to' => null,
            'forum_id' => 1,
        ]);

        DB::table('users')->insert([
            $this->guest,
            array_merge($this->admin, [
                'email' => $email,
                'password' => sha1('password'),
                'last_post' => $timestamp,
                'registered' => $timestamp,
                'last_visit' => $timestamp,
            ])
        ]);
    }
}
