<?php
require_once('core/core.php');
require_once('core/core.db.php');
require_once('core/core.kwt.php');
require_once('core/core.frontend.php');
require_once('themes/themes.table.php');

print_r($_GET,true);

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

$action = isset($_GET['action']) ? $_GET['action'] : 'list';

switch ($action) {
    case 'list' : {
        $innerfilename = $theme_path.'/list/list';
        /* prepare data */

        /* inner html */
        $inner_html = new kwt("{$innerfilename}.html", '<!--{', '}-->');

        /* inner css */
        $inner_css = new kwt("{$innerfilename}.css", '/*', '*/');

        /* inner jq */
        $inner_jq = new kwt("{$innerfilename}.js", '/*', '*/');
        break;
    }
    case 'view' : {
        $innerfilename = $theme_path.'/view/view';
        /* prepare data */

        /* inner html */
        $inner_html = new kwt("{$innerfilename}.html", '<!--{', '}-->');

        /* inner css */
        $inner_css = new kwt("{$innerfilename}.css", '/*', '*/');

        /* inner jq */
        $inner_jq = new kwt("{$innerfilename}.js", '/*', '*/');
        break;
    }
    case 'edit' : {
        $innerfilename = $theme_path.'/view/view';
        /* prepare data */

        /* inner html */
        $inner_html = new kwt("{$innerfilename}.html", '<!--{', '}-->');

        /* inner css */
        $inner_css = new kwt("{$innerfilename}.css", '/*', '*/');

        /* inner jq */
        $inner_jq = new kwt("{$innerfilename}.js", '/*', '*/');
        break;
    }
    case 'add' : {
        $innerfilename = $theme_path.'/add/add';
        /* prepare data */

        /* inner html */
        $inner_html = new kwt("{$innerfilename}.html", '<!--{', '}-->');

        /* inner css */
        $inner_css = new kwt("{$innerfilename}.css", '/*', '*/');

        /* inner jq */
        $inner_jq = new kwt("{$innerfilename}.js", '/*', '*/');
        break;
    }
    case 'tagcloud' : { break; }
    case 'export' : { break; }
    case 'help' : {
        $innerfilename = $theme_path.'/help/help';
        /* prepare data */

        /* inner html */
        $inner_html = new kwt("{$innerfilename}.html", '<!--{', '}-->');

        /* inner css */
        $inner_css = new kwt("{$innerfilename}.css", '/*{', '}*/');

        /* inner jq */
        $inner_jq = new kwt("{$innerfilename}.js", '/*{', '}*/');

        break;
    }
    case 'task': {
        /* задания-действия от скриптов */
        $task = $_GET['task'];
        $post = print_r($_POST, true);


        break;
    }
} // switch action
// $override['log'] = $post."<br>".print_r($_GET, true);
$override['inner_html'] = isset($inner_html) ? $inner_html->get() : '';
$override['inner_css'] = isset($inner_css) ? $inner_css->get() : '';
$override['inner_jq'] = isset($inner_jq) ? $inner_jq->get() : '';

$tpl_index->override($override);
$tpl_index->out();
?>