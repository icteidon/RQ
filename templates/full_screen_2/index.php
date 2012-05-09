<?php
/**
* @copyright  Copyright (C) 2010 - JoomSpirit. All rights reserved.
*/
defined('_JEXEC') or die('Restricted access');
$path = $this->baseurl.'/templates/'.$this->template;
$width_left = $this->params->get('width_left');
$width_right = $this->params->get('width_right');
$width = $this->params->get('width');
$width_content = $this->params->get('width_content');
$user1_width = $this->params->get('user1_width');
$user3_width = $this->params->get('user3_width');
$user4_width = $this->params->get('user4_width');
$user6_width = $this->params->get('user6_width');
$one_slide = $this->params->get('one_slide');
$slide_interval = $this->params->get('slide_interval');
$slide_transition = $this->params->get('slide_transition');
$font = $this->params->get('font');
$font_content = $this->params->get('font_content');
$separator = $this->params->get('separator');
$height_container = $this->params->get('height_container');
$color_link = $this->params->get('color_link');
$show_tooltips = $this->params->get('show_tooltips');
if ($this->params->get('fontSize') == '') 
{ $fontSize ='12px'; } 
else { $fontSize = $this->params->get('fontSize'); }
JHTML::_('behavior.mootools');
include_once(JPATH_ROOT . "/templates/" . $this->template . '/lib/php/layout.php');
?>
<?php echo '<?xml version="1.0" encoding="utf-8"?'.'>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />

<!--  Google fonts  -->
<?php if ($font != 'JosefinSansStdLight') : ?>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo $font ; ?>" />
<?php endif; ?>

<!-- style sheet links -->
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/main.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/nav.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/moomenuh.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/moomenuh_right.css" type="text/css" />
<link rel="stylesheet" media="screen" title="dynamic" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/dynamic_css.php&#63;font=<?php echo $font ; ?>&amp;font_content=<?php echo $font_content ; ?>&amp;separator=<?php echo $separator ; ?>&amp;height_container=<?php echo $height_container ; ?>&amp;color_link=<?php echo substr($color_link, 1) ; ?>" />

<!--[if lte IE 8]> 
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ie8.css" type="text/css" />
<![endif]-->
<!--[if lte IE 7]> 
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ie7.css" type="text/css" />
<![endif]-->
<!--[if lt IE 7]>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ie6.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/lib/js/iepngfix_tilebg.js"></script>
<style type="text/css">
* { behavior: url(<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/lib/js/iepngfix.htc) }
</style>
<![endif]-->

<!-- MOOMENU HORIZONTAL-->
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/lib/js/UvumiDropdown.js"></script>
<script type="text/javascript">
  var menu = new UvumiDropdown('menu_left');
  var menu = new UvumiDropdown('menu_right');
</script>

<!--  supersize  -->
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/lib/js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="http://dev.jquery.com/view/tags/ui/latest/ui/effects.core.js"></script>
<script type="text/javascript" src="http://dev.jquery.com/view/tags/ui/latest/ui/effects.slide.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/lib/js/supersized.js"></script>
<script type="text/javascript"> 
  var $j = jQuery.noConflict();
  
  $j(function(){
    $j.fn.supersized.options = {  
      startwidth: 4,  
      startheight: 3,
      vertical_center: 1,
      slideshow: <?php echo $one_slide ; ?>,
      navigation: 1,
      transition: <?php echo $slide_transition ; ?>, //0-None, 1-Fade, 2-slide top, 3-slide right, 4-slide bottom, 5-slide left
      pause_hover: 0,
      slide_counter: 1,
      slide_captions: 1,
      slide_interval: <?php echo $slide_interval ; ?>  
    };
    $j('#supersize').supersized(); 
  });
</script>

</head>



<body <?php echo ('style="font-size:'.$fontSize.';"');?> >


<?php if($this->countModules('supersized')) : ?>
<div id="supersize">
  <jdoc:include type="modules" name="supersized" style="joomspirit" />
</div>
<?php endif; ?>

<div id="site">

  <div class="separator_header"></div>

  <div id="top-site<?php if($this->countModules('frontpage')) echo "-frontpage" ; ?>" >
    <div style="width:<?php echo $width ; ?>;">

      <div id="menu">
      
        <?php if($this->countModules('menu_left')) : ?>
        <div class="menu_left">
          <jdoc:include type="modules" name="menu_left" style="xhtml" />
        </div>  
        <?php endif; ?>
        
        <?php if($this->countModules('menu_right')) : ?>
        <div class="menu_right">
          <jdoc:include type="modules" name="menu_right" style="xhtml" />
        </div>  
        <?php endif; ?>
        
      </div>  <!-- enf of menu  -->
      

      <?php if($this->countModules('logo')) : ?>
      <div align="left" id="logo" style="width:<?php echo $width ; ?>;">
        <jdoc:include type="modules" name="logo" style="joomspirit" />
      </div>  
      <?php endif; ?>
      
      
      <!--  translate  -->
      <?php if ($this->countModules( 'translate' )) : ?>
      <div id="translate">
        <jdoc:include type="modules" name="translate" style="xhtml" />
      </div>
      <?php endif; ?>
      
      <?php if($this->countModules('breadcrumb') ) : ?>
      <div id="breadcrumb">
        <jdoc:include type="modules" name="breadcrumb" style="xhtml" />
      </div>
      <?php endif; ?>  
      
    </div>  
  </div>  <!-- end of top-site  -->

  <div class="separator_header"></div>  
  
  <?php if( (! $this->countModules('frontpage')) && (! $this->countModules('content_one')) && (! $this->countModules('content_two')) && (! $this->countModules('content_three')) && (! $this->countModules('content_four')) ) : ?>
  
  <div id="middle-site" class="clearfix"  style="width:<?php echo $width_content ; ?>;">
    <div>
      <div>
    
        <table class="center-table">
        <tr class="no-border">
        <td valign="middle" class="no-border">
      
            <?php if($this->countModules('left')) : ?>
            <div class="left" style="width:<?php echo $width_left ; ?>;" >
              <jdoc:include type="modules" name="left" style="joomspirit" />
            </div>
            <?php endif; ?>
            
            <?php if($this->countModules('right')) : ?>
            <div class="right" style="width:<?php echo $width_right ; ?>;" >
              <jdoc:include type="modules" name="right" style="joomspirit" />
            </div>
            <?php endif; ?>
          
            <div id="content">

              <!--  USER 1, 2, 3 -->
              <?php if($this->countModules('user1') || $this->countModules('user2') || $this->countModules('user3')) : ?>
              <div id="users_top">
                                    
                <?php if($this->countModules('user1')) : ?>
                <div class="user1" <?php echo ('style="width:'.$user1_width.';"');?>>
                  <jdoc:include type="modules" name="user1" style="joomspirit" />
                </div>
                <?php endif; ?>
                          
                <?php if($this->countModules('user3')) : ?>
                <div class="user3" <?php echo ('style="width:'.$user3_width.';"');?>>
                  <jdoc:include type="modules" name="user3" style="joomspirit" />
                </div>
                <?php endif; ?>
              
                <?php if($this->countModules('user2')) : ?>
                <div class="user2">
                  <jdoc:include type="modules" name="user2" style="joomspirit" />
                </div>
                <?php endif; ?>
              
                <div class="clr"></div>
                          
              </div>
              <?php endif; ?>  <!--  END OF USERS TOP  -->
              
              <div id="main_component" >
            
                <!--  MAIN COMPONENT -->
                <jdoc:include type="message" />
                <jdoc:include type="component" />
                <?php echo $copy ; ?>
                  
              </div>
              
              <!--  USER 4, 5, 6 -->
              <?php if($this->countModules('user4') || $this->countModules('user5') || $this->countModules('user6')) : ?>
              <div id="users_bottom">
                                    
                <?php if($this->countModules('user4')) : ?>
                <div class="user4" <?php echo ('style="width:'.$user4_width.';"');?>>
                  <jdoc:include type="modules" name="user4" style="joomspirit" />
                </div>
                <?php endif; ?>
                          
                <?php if($this->countModules('user6')) : ?>
                <div class="user6" <?php echo ('style="width:'.$user6_width.';"');?>>
                  <jdoc:include type="modules" name="user6" style="joomspirit" />
                </div>
                <?php endif; ?>
              
                <?php if($this->countModules('user5')) : ?>
                <div class="user5">
                  <jdoc:include type="modules" name="user5" style="joomspirit" />
                </div>
                <?php endif; ?>
              
                <div class="clr"></div>
                          
              </div>
              <?php endif; ?>  <!--  END OF USERS BOTTOM  -->            
            
            </div>
        
            <div class="clr"></div>
            
        </td></tr></table>
    
      </div>
    </div>
  </div>  <!-- end of middle-site   -->
  
  
  
  
  <?php else : ?>
  
    <?php if($this->countModules('content_one')) : ?>
    <div class="content_one" >
      <jdoc:include type="modules" name="content_one" style="joomspirit" />
    </div>
    <?php endif; ?>
    
    <?php if($this->countModules('content_two')) : ?>
    <div class="content_two" >
      <jdoc:include type="modules" name="content_two" style="joomspirit" />
    </div>
    <?php endif; ?>
    
    <?php if($this->countModules('content_three')) : ?>
    <div class="content_three" >
      <jdoc:include type="modules" name="content_three" style="joomspirit" />
    </div>
    <?php endif; ?>
    
    <?php if($this->countModules('content_four')) : ?>
    <div class="content_four" >
      <jdoc:include type="modules" name="content_four" style="joomspirit" />
    </div>
    <?php endif; ?>  
    
  <?php endif; ?>
  
  
</div>  <!-- end of site  -->

<div id="bottom_site">
  <div style="width:<?php echo $width ; ?>;">

    <?php if ( ($this->countModules( 'syndicate' )) || ($this->countModules( 'bottom_menu' )) ) : ?>
    <div id="footer-right">
    
      <?php if ($this->countModules( 'syndicate' )) : ?>
      <div id="syndicate">
        <jdoc:include type="modules" name="syndicate" style="xhtml" />
      </div>
      <?php endif; ?>
          
      <?php if($this->countModules('bottom_menu')) : ?>
      <div id="bottom_menu">
        <jdoc:include type="modules" name="bottom_menu" style="xhtml" />
      </div>
      <?php endif; ?>
      
      <div class="bottom-left"></div>
      <div class="bottom-right"></div>    
    
    </div>
    <?php endif; ?>    
        
    <?php if ($this->countModules( 'adress' )) : ?>
    <div id="adress">
      <jdoc:include type="modules" name="adress" style="xhtml" />
      <div class="bottom-left"></div>
      <div class="bottom-right"></div>
    </div>
    <?php endif; ?>  
      
    <div class="clr"></div>
  
  </div>
  
  
</div>  <!-- end of bottom_site -->
</body>
</html>