<?php
require_once('core/core.php');
require_once('core/core.db.php');
require_once('core/core.kwt.php');
require_once('core/core.frontend.php');
require_once('themes/themes.table.php');
// init defaults fields and variables
$main_content_html = '';
$main_content_css = '';
$main_content_jq = '';
// $theme_path defined in themes/themes.table.php


// init theme engine
$template_engine = new Theme($theme_path);

// load default index file for template
$tpl_index = new kwt($theme_path."/index.html", '<!--{', '}-->' );
$override = array(
    'theme_path' => $theme_path,
    'main_menu_content' => $template_engine->getMenu()
);

// $link = ConnectDB();

$action = $_GET['action'];

switch ($action) {
    case 'list' : {
        $innerfilename = $theme_path.'/list/list';
        /* prepare data */

        /* inner html */
        $inner_html = new kwt("{$innerfilename}.html", '<!--{', '}-->');
        $main_content_html  = $inner_html->get();

        /* inner css */
        $inner_css = new kwt("{$innerfilename}.css", '/*', '*/');
        $main_content_css   = $inner_css->get();

        /* inner jq */
        $inner_jq = new kwt("{$innerfilename}.js", '/*', '*/');
        $main_content_jq    = $inner_jq->get();
        break;
    }
    case 'view' : {
        $innerfilename = $theme_path.'/view/view';
        /* prepare data */

        /* inner html */
        $inner_html = new kwt("{$innerfilename}.html", '<!--{', '}-->');
        $main_content_html  = $inner_html->get();

        /* inner css */
        $inner_css = new kwt("{$innerfilename}.css", '/*', '*/');
        $main_content_css   = $inner_css->get();

        /* inner jq */
        $inner_jq = new kwt("{$innerfilename}.js", '/*', '*/');
        $main_content_jq    = $inner_jq->get();
        break;
    }
    case 'edit' : {
        $innerfilename = $theme_path.'/view/view';
        /* prepare data */

        /* inner html */
        $inner_html = new kwt("{$innerfilename}.html", '<!--{', '}-->');
        $main_content_html  = $inner_html->get();

        /* inner css */
        $inner_css = new kwt("{$innerfilename}.css", '/*', '*/');
        $main_content_css   = $inner_css->get();

        /* inner jq */
        $inner_jq = new kwt("{$innerfilename}.js", '/*', '*/');
        $main_content_jq    = $inner_jq->get();
        break;
    }
    case 'tagcloud' : { break; }
    case 'export' : { break; }
    case 'help' : {
        $innerfilename = $theme_path.'/help/help';
        /* prepare data */

        /* inner html */
        $inner_html = new kwt("{$innerfilename}.html", '<!--{', '}-->');
        $main_content_html  = $inner_html->get();

        /* inner css */
        $inner_css = new kwt("{$innerfilename}.css", '/*{', '}*/');
        $main_content_css   = $inner_css->get();

        /* inner jq */
        $inner_jq = new kwt("{$innerfilename}.js", '/*{', '}*/');
        $main_content_jq    = $inner_jq->get();

        break;
    }
} // switch action

$override['inner_html'] = $main_content_html;
$override['inner_css']  = $main_content_css;
$override['inner_jq']   = $main_content_jq;

$tpl_index->override($override);
$tpl_index->out();
?>