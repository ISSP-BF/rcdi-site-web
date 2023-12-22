<?php

namespace HelpieFaq\Features;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

if (!class_exists('\HelpieFaq\Features\Feature_Notice')) {
    class Feature_Notice
    {
        public $dismissed_option_name = 'helpie_faq_feature_notice_dismissed';

        public $version = '1.9.8';

        public $feature_page_url = 'https://helpiewp.com/category/updates/';

        public $content = 'Helpie FAQ - Shortcode Builder block for Gutenberg Available Now! Plus default block fix.';

        public function init()
        {

            $this->click_handler();

            if ($this->can_show_the_notice()) {
                add_action('admin_notices', array($this, 'print_feature_notice'));
            }
        }

        public function can_show_the_notice()
        {
            $dismissed_version = get_option($this->dismissed_option_name);

            if (!$dismissed_version || (version_compare(HELPIE_FAQ_VERSION, $this->version, '>=') && version_compare($this->version, $dismissed_version, '>'))) {
                return true;
            }

            return false;
        }

        public function print_feature_notice()
        {
            global $pluginator_security_agent;
            $html = '<div class="helpiefaq-notice helpiefaq-notice--feature notice is-dismissible">';

            $html .= '<img class="helpiefaq-notice__logo helpiefaq-notice__logo--small" src="' . HELPIE_FAQ_URL . '/assets/img/helpie_faq-logo.png" alt="Helpie FAQ Logo">';
            // content
            $html .= '<div class="helpiefaq-notice__body">';
            $html .= '<span class="helpiefaq-notice__content">What\'s new in Helpie FAQ:</span> ' . $this->get_content();
            $html .= '</div>';

            $html .= '<a role="button" class="notice-dismiss helpiefaq-no-underline" href="' . $pluginator_security_agent->add_query_arg(array('helpie_faq_feature_notice_dismissed' => 'true')) . '"></a>';
            $html .= '</div>';
            echo $html;
        }

        public function get_content()
        {
            $content = $this->content;
            $content .= '<a class="helpiefaq-notice__button helpiefaq-notice__featureLinkButton" href="' . $this->feature_page_url . '" target="_blank">See Product Updates</a>';
            return $content;
        }

        public function click_handler()
        {
            $notice_dismissed = isset($_GET['helpie_faq_feature_notice_dismissed']) ? $_GET['helpie_faq_feature_notice_dismissed'] : false;

            if ($notice_dismissed) {
                update_option($this->dismissed_option_name, HELPIE_FAQ_VERSION);
                global $pluginator_security_agent;
                $escape_uri = $pluginator_security_agent->remove_query_arg(array('helpie_faq_feature_notice_dismissed'));
                $this->redirect_to($escape_uri);
            }
        }

        public function redirect_to($url)
        {
            echo "<script type='text/javascript'>
                let url = '" . $url . "';
                window.location.href = url;
            </script>";
        }

        public function update_feature_notice_dismissal_data_via_ajax()
        {
            update_option($this->dismissed_option_name, HELPIE_FAQ_VERSION);

            $response = array(
                'status' => 'success',
                'data' => array(
                    'url' => $this->feature_page_url,
                ),
            );

            wp_send_json($response);
            wp_die();
        }
    }
}