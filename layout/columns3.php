<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * OUC theme with the underlying Bootstrap theme.
 *
 * @package    theme
 * @subpackage ouc
 * @author     Pukunui Australia
 * @author     Based on code originally written by G J Bernard, Mary Evans, Bas Brands, Stuart Lamour and David Scotson.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Get the HTML for the settings bits.
$html = theme_ouc_get_html_for_settings($OUTPUT, $PAGE);
$haslogo = (!empty($PAGE->theme->settings->logo));

$pre = 'side-pre';
$post = 'side-post';
if (right_to_left()) {
    $regionbsid = 'region-bs-main-and-post';
    // In RTL the sides are reversed, so swap the 'oucblocks' method parameter....
    $temp = $pre;
    $pre = $post;
    $post = $temp;
} else {
    $regionbsid = 'region-bs-main-and-pre';
}

$hassidepre = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-pre', $OUTPUT));
$hassidepost = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-post', $OUTPUT));
$contentclass = 'span8';
$blockclass = 'span4';
if (!($hassidepre AND $hassidepost)) {
    // Two columns.
    $contentclass = 'span9';
    $blockclass = 'span3';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FontAwesome web fonts -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
    <!-- Google web fonts -->
    <link href='//fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<header role="banner" class="navbar <?php echo $html->navbarclass ?>">
	<div class="row-fluid mainheader">
	<div class="span3">
	<?php if (!$haslogo) { ?>
        <div class="setlogo"></div>
    <?php } else { ?>
         <a href="<?php echo $CFG->wwwroot; ?>" title="<?php print_string('home'); ?>"><div class="logo"></div></a>
    <?php } ?>
	</div>
	
	<div class="span8 coursename">
		<h1 class="coursetitle"><span id="lightblue">Course</span>&nbsp;:&nbsp;<?php echo $PAGE->heading ?></h1>
		<p>Centre for Professional Learning and Development (OLPD)</p>
	</div>
	
    <div class="span1 pull-right" id="profilepic">
    	<?php if (isloggedin()) { ?>
			<a href="<?php echo $CFG->wwwroot.'/user/profile.php?id='.$USER->id; ?>">
			<?php echo $OUTPUT->user_picture($USER); ?>
			</a> 
		<?php } ?>        
    </div>
	</div>
    <nav role="navigation" class="navbar-inner">
        <div class="container-fluid">
            <a class="brand" href="<?php echo $CFG->wwwroot;?>"><i class="icon-home"></i> <?php echo $SITE->shortname; ?></a>
            <a class="btn btn-navbar" data-toggle="workaround-collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse collapse">
                <?php echo $OUTPUT->custom_menu(); ?>
                <ul class="nav pull-right">
                    <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
                    <li class="navbar-text"><?php echo $OUTPUT->login_info() ?></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div id="page" class="container-fluid">

    <header id="page-header" class="clearfix">
        <div id="page-navbar" class="clearfix">
            <div class="breadcrumb-nav"><?php echo $OUTPUT->navbar(); ?></div>
            <nav class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></nav>
        </div>
        <div id="course-header">
            <?php echo $OUTPUT->course_header(); ?>
        </div>
    </header>

    <div id="page-content" class="row-fluid">
        <div id="<?php echo $regionbsid ?>" class="span9">
            <div class="row-fluid">
                <div id="region-main-ouc" class="<?php echo $contentclass; ?> pull-right">
                    <section id="region-main" class="row-fluid">
                        <?php
                        echo $OUTPUT->course_content_header();
                        echo $OUTPUT->main_content();
                        echo $OUTPUT->course_content_footer();
                        ?>
                    </section>
                </div>
                <?php echo $OUTPUT->oucblocks($pre, $blockclass.' desktop-first-column'); ?>
            </div>
        </div>
        <?php echo $OUTPUT->oucblocks($post, 'span3'); ?>
    </div>

    <footer id="page-footer">
        <div id="course-footer"><?php echo $OUTPUT->course_footer(); ?></div>
        <p class="helplink"><?php echo $OUTPUT->page_doc_link(); ?></p>
        <?php
        echo $html->footnote;
        echo $OUTPUT->login_info();
        echo $OUTPUT->home_link();
        echo $OUTPUT->standard_footer_html();
        ?>
    </footer>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>

</div>
</body>
</html>