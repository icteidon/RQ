<?php
header("Content-type: text/css");
if (isset($_GET['font'])) 
{ $font = $_GET['font'];}
else { $font = 'sans-serif'; }
if (isset($_GET['font_content'])) 
{ $font_content = $_GET['font_content'];}
else { $font_content = 'sans-serif'; }
if (isset($_GET['separator'])) 
{ $separator = $_GET['separator'];}
else { $separator = '60'; }
if (isset($_GET['height_container'])) 
{ $height_container = $_GET['height_container'];}
else { $height_container = '500'; }
if (isset($_GET['color_link'])) 
{ $color_link = $_GET['color_link'];}
else { $color_link = '336699'; }
?>


/**		FONT	**/

h1, .componentheading {
font-family: '<?php echo $font ; ?>', 'Yanone Kaffeesatz';
}

#menu_left li a, #menu_left li span.separator,
#menu_right li a, #menu_right li span.separator{
font-family: '<?php echo $font ; ?>', 'Yanone Kaffeesatz';
}

.left h3, .right h3, .user1 h3, .user2 h3, .user3 h3, 
.user4 h3, .user5 h3, .user6 h3 {
font-family: '<?php echo $font ; ?>', 'Yanone Kaffeesatz';
}

body {
font-family: '<?php echo $font_content ; ?>';
}

#logo span {
font-family: '<?php echo $font ; ?>', 'Yanone Kaffeesatz';
}


/**	separator	**/

.separator_header {
height:<?php echo $separator ; ?>px;
}

/**	height container	**/

#middle-site >div >div {
height: <?php echo $height_container ; ?>px;
min-height:<?php echo $height_container ; ?>px;
}

.center-table {
height: <?php echo $height_container ; ?>px;
}


/**
*			COLOR LINKS
**/

#logo span {
color:#<?php echo $color_link ; ?>;
}

/**			link		**/
a {
color:#<?php echo $color_link ; ?>;
}
a:hover {
color:#<?php echo $color_link ; ?>;
}

#breadcrumb a:hover {
color:#<?php echo $color_link ; ?>;
}

a.readon:hover {
color: #<?php echo $color_link ; ?>;
}

#bottom_site a:hover {
color:#<?php echo $color_link ; ?>;
}

/**		main menu left	**/

/** si est actif niveau 1 	**/
#menu_left #current a, #menu_left #current span.separator {
color:#<?php echo $color_link ; ?>;
}
/** si est actif niveau 2+ 	**/
#menu_left ul #current a, #menu_left ul #current span.separator,
#menu_left #current ul a:hover, #menu_left #current ul span.separator:hover {
color:#<?php echo $color_link ; ?>;
}
/** si parent actif et enfant actif **/
#menu_left li.parent.active li a:hover, #menu_left li li.parent.active li a:hover, #menu_left li li li.parent.active li a:hover, #menu_left li.parent.active li span.separator:hover,
#menu_left li.parent.active li li span.separator:hover, #menu_left li.parent.active li li a:hover {
color:#<?php echo $color_link ; ?>;
}
/** si est parent actif niveau 1	**/
#menu_left li.parent.active a, #menu_left li.parent.active span.separator {
color:#<?php echo $color_link ; ?>;
}
/** si est parent actif niveau 2+	**/
#menu_left li li.parent.active a, #menu_left li li li.parent.active a, #menu_left li li li li.parent.active a,
#menu_left li.parent.active li.parent.active a, #menu_left li li.parent.active li.parent.active a, #menu_left li li li.parent.active li.parent.active a,
#menu_left li li.parent.active span.separator, #menu_left li.parent.active li.parent.active span.separator{
color:#<?php echo $color_link ; ?>;
}
/** si est survol niveau 1	**/
#menu_left li a:hover, #menu_left li.parent a:hover, #menu_left li.sfhover span.separator, #menu_left li.sfhover a,
#menu_left li span.separator:hover, #menu_left li.parent span.separator:hover, #menu_left li.sfhover span.separator {
color:#<?php echo $color_link ; ?>;
}
/** si est survol niveau 2+	**/
#menu_left li li a:hover, #menu_left li li li a:hover, #menu_left li.parent li a:hover, #menu_left li.parent li li a:hover,
#menu_left li.parent.active li.parent a:hover, #menu_left li li.parent.active li.parent a:hover, #menu_left li li li.parent.active li.parent a:hover,
#menu_left li.parent.active li.parent.active a:hover, #menu_left li li.parent.active li.parent.active a:hover, #menu_left li li li.parent.active li.parent.active a:hover,
#menu_left li li span.separator:hover, #menu_left li.parent li span.separator:hover, #menu_left li.parent.active li.parent span.separator:hover,
#menu_left li li.sfhover a, #menu_left li li.sfhover span.separator, #menu_left li li li.sfhover a, #menu_left li li li.sfhover span.separator {
color:#<?php echo $color_link ; ?>;
}
/** si courant survol niveau 1	**/
#menu_left li.active a:hover, #menu_left li.active span.separator:hover {
color:#<?php echo $color_link ; ?>;
}
/** si courant survol niveau 2+	**/
#menu_left li#current li a:hover, #menu_left li#current li span.separator:hover {
color:#<?php echo $color_link ; ?>;
}
#menu_left li a:hover, #menu_left li span.separator:hover {
color:#<?php echo $color_link ; ?>;
}
#menu_left #current li.parent li a:hover, #menu_left #current li.parent li span.separator:hover {
color:#<?php echo $color_link ; ?>;
}
#menu_left li:hover a, #menu_left li:hover span.separator, #menu_left li.active a, #menu_left li.active span.separator,
#menu_left li.sfhover a, #menu_left li.sfhover span.separator {
color:#<?php echo $color_link ; ?>;
}


/**		main menu right	**/

/** si est actif niveau 1 	**/
#menu_right #current a, #menu_right #current span.separator {
color:#<?php echo $color_link ; ?>;
}
/** si est actif niveau 2+ 	**/
#menu_right ul #current a, #menu_right ul #current span.separator,
#menu_right #current ul a:hover, #menu_right #current ul span.separator:hover {
color:#<?php echo $color_link ; ?>;
}
/** si parent actif et enfant actif **/
#menu_right li.parent.active li a:hover, #menu_right li li.parent.active li a:hover, #menu_right li li li.parent.active li a:hover, #menu_right li.parent.active li span.separator:hover,
#menu_right li.parent.active li li span.separator:hover, #menu_right li.parent.active li li a:hover {
color:#<?php echo $color_link ; ?>;
}
/** si est parent actif niveau 1	**/
#menu_right li.parent.active a, #menu_right li.parent.active span.separator {
color:#<?php echo $color_link ; ?>;
}
/** si est parent actif niveau 2+	**/
#menu_right li li.parent.active a, #menu_right li li li.parent.active a, #menu_right li li li li.parent.active a,
#menu_right li.parent.active li.parent.active a, #menu_right li li.parent.active li.parent.active a, #menu_right li li li.parent.active li.parent.active a,
#menu_right li li.parent.active span.separator, #menu_right li.parent.active li.parent.active span.separator{
color:#<?php echo $color_link ; ?>;
}
/** si est survol niveau 1	**/
#menu_right li a:hover, #menu_right li.parent a:hover, #menu_right li.sfhover span.separator, #menu_right li.sfhover a,
#menu_right li span.separator:hover, #menu_right li.parent span.separator:hover, #menu_right li.sfhover span.separator {
color:#<?php echo $color_link ; ?>;
}
/** si est survol niveau 2+	**/
#menu_right li li a:hover, #menu_right li li li a:hover, #menu_right li.parent li a:hover, #menu_right li.parent li li a:hover,
#menu_right li.parent.active li.parent a:hover, #menu_right li li.parent.active li.parent a:hover, #menu_right li li li.parent.active li.parent a:hover,
#menu_right li.parent.active li.parent.active a:hover, #menu_right li li.parent.active li.parent.active a:hover, #menu_right li li li.parent.active li.parent.active a:hover,
#menu_right li li span.separator:hover, #menu_right li.parent li span.separator:hover, #menu_right li.parent.active li.parent span.separator:hover,
#menu_right li li.sfhover a, #menu_right li li.sfhover span.separator, #menu_right li li li.sfhover a, #menu_right li li li.sfhover span.separator {
color:#<?php echo $color_link ; ?>;
}
/** si courant survol niveau 1	**/
#menu_right li.active a:hover, #menu_right li.active span.separator:hover {
color:#<?php echo $color_link ; ?>;
}
/** si courant survol niveau 2+	**/
#menu_right li#current li a:hover, #menu_right li#current li span.separator:hover {
color:#<?php echo $color_link ; ?>;
}
#menu_right li a:hover, #menu_right li span.separator:hover {
color:#<?php echo $color_link ; ?>;
}
#menu_right #current li.parent li a:hover, #menu_right #current li.parent li span.separator:hover {
color:#<?php echo $color_link ; ?>;
}
#menu_right li:hover a, #menu_right li:hover span.separator, #menu_right li.active a, #menu_right li.active span.separator,
#menu_right li.sfhover a, #menu_right li.sfhover span.separator {
color:#<?php echo $color_link ; ?>;
}

/* 
*	left and right menu
*/

.submenu li a:hover, .submenu li.active a, .submenu li span.separator:hover, .submenu li.active span.separator {
color:#<?php echo $color_link ; ?>;
}
.submenu li li a:hover, .submenu li li#current a, .submenu li li#current.parent a,
.submenu li#current li a:hover, .submenu li.active li a:hover, .submenu li.parent li a:hover,
.submenu li li span.separator:hover, .submenu li li#current span.separator, .submenu li li#current.parent span.separator,
.submenu li#current li span.separator:hover, .submenu li.active li span.separator:hover, .submenu li.parent li span.separator:hover {
color:#<?php echo $color_link ; ?>;
}
.submenu ul li li li a:hover, .submenu ul li li li#current a, .submenu ul li li li.active a,
.submenu li.active li#current li a:hover {
color:#<?php echo $color_link ; ?>;
}
.submenu li li li a:hover, .submenu li li li#current a, .submenu li li li.active a, .submenu li li li#current.parent a,
.submenu li li#current li a:hover, .submenu li li.active li a:hover, .submenu li li.parent li a:hover {
color:#<?php echo $color_link ; ?>;
}


/**	BOTTOM MENU		**/

#bottom_menu li a:hover, #bottom_menu li span.separator:hover, #bottom_menu li.active a {
color:#<?php echo $color_link ; ?>;
}