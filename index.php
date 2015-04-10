<?php
/**
 * @package                Joomla.Site
 * @subpackage	Templates.beez_20
 * @copyright        Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license                GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.filesystem.file');

// check modules
$showRightColumn	= ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
$showbottom			= ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
$showleft			= ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));

if ($showRightColumn==0 and $showleft==0) {
	$showno = 0;
}

JHtml::_('behavior.framework', true);

// get params
//$color				= $this->params->get('templatecolor');
//$logo				= $this->params->get('logo');
$navposition		= $this->params->get('navposition');
$app				= JFactory::getApplication();
$doc				= JFactory::getDocument();
$templateparams		= $app->getTemplate(true)->params;

$view = isset($_GET['view'])?$_GET['view']:'';
$option = isset($_GET['option'])?$_GET['option']:'';
$language = isset($_GET['language'])?$_GET['language']:'';
$view = isset($_GET['view'])?$_GET['view']:'';

$doc->addStyleSheet($this->baseurl.'/templates/system/css/system.css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/position.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/layout.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/print.css', $type = 'text/css', $media = 'print');
$files = JHtml::_('stylesheet', 'templates/'.$this->template.'/css/general.css', null, false, true);

$doc->addStyleSheet('templates/'.$this->template.'/css/onfabric.css');

$user = JFactory::getUser();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />

<!--[if lte IE 6]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ieonly.css" rel="stylesheet" type="text/css" />
<?php if ($color=="personal") : ?>
<style type="text/css">
#line {
	width:98% ;
}
.logoheader {
	height:200px;
}
#header ul.menu {
	display:block !important;
	width:98.2% ;
}
</style>
<?php endif; ?>
<![endif]-->

<!--[if IE 7]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie7only.css" rel="stylesheet" type="text/css" />
<![endif]-->

<meta content='width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;' name='viewport' />
<meta name="viewport" content="width=device-width" />

</head>

<body style="height:100%;">

	<div id="all" style="height:100%;">
		<div id="back" style="height:100%;">

			<?php if($user->id==0 && $option=='com_fabric' && $view=='register'): //Display pages?>
				
				<div id="main">
					<jdoc:include type="message" />
					<jdoc:include type="component" />
				</div><!-- end main -->
				
			<?php elseif($user->id==0 && ($view=='profile'  || $view=='messages')): //Display the custom login page?>
				<div id="fabric_content" style="background-image: url(templates/onfabrictheme/images/Fabric_LogIn-page-background.jpg); background-size:cover; min-height:100%;">
				
				<div class="wrapper body-wrapper">	
						
						<div id="loginTitle">
							<h2>onFabric Learning Community</h2>
						</div>
						
						<div id="loginFormWrapper">
							<div id="loginForm">
							<jdoc:include type="modules" name="position-1" />
							</div>
							<a class="registerButton" href="index.php?option=com_fabric&view=register">Register</a>
						</div>

						<div id="loginLogo">
							<div id="loginLogoWrapper">
								<img src="templates/onfabrictheme/images/logo_cogcentricVectors-white.png">
							</div>
						</div>
						
						
						<div style="clear:both;"></div>
						
						<jdoc:include type="message" />
						
						

						<div style="clear:both;"></div>
						<div id="line">
						<jdoc:include type="modules" name="position-0" />
						</div> <!-- end line -->
				</div><!-- end header -->
				<div style="clear:both;"></div>
				<div id="footer">
					<div class="wrapper">
						<!--
						<div class="quarter">
							<img style="float:left;margin-top:-5px;margin-left:-25px;padding-right: 5px;" src="images/cogcentric-logo-small-white.png" width="36"/>
							<h4>Cogcentric Labs</h4><br />
							<a>Services</a><br/>
							<a>Blog</a><br/>
							<a>Contact</a><br/>
						</div>
						<div class="quarter">
							<img style="float:left;margin-top:-5px;margin-left:-25px;padding-right: 5px;" src="images/fabric-roundel.png" width="36"/>
							<h4>Fabric</h4><br />
							<a>About</a><br/>
							<a>Download</a><br/>
						</div>
						<div class="quarter">
							<img style="float:left;margin-top:-5px;margin-left:-25px;padding-right: 5px;" src="images/fabric-roundel.png" width="36"/>
							<h4>onFabric</h4><br />
							<a>About</a><br/>
							<a>Register</a><br/>
						</div>
						-->
						<div style="clear:both;"></div>
					</div>
					<div style="clear:both;"></div>
				</div>
				</div>
			<?php elseif($option=='com_users'): //Display the custom login page?>
				<div id="fabric_content">
				<div id="topbar">
					<div class="wrapper">
						<a id="topmenu_button" href="index.php">Home</a>
						
						<a class="leftmenu_button">Services</a>
						<a class="leftmenu_button" href="http://blog.cogcentric.com">Blog</a>
						<a class="leftmenu_button">Contact</a>
						
						<!--<a id="usermenu_button" class="rightmenu_button">User</a>-->
						
						
						<div style="clear:both;"></div>
					</div>
				</div>
				
				<div class="wrapper page" style="margin-top:50px; background:#FFF; padding: 20px;">
					<div id="loginForm">
					<jdoc:include type="modules" name="position-1" />
					</div>
				</div>
				
				
				<div id="footer">
					<div class="wrapper">
						<div class="quarter">
							<h4>Cogcentric Labs</h4><br />
							<a>Services</a><br/>
							<a>Blog</a><br/>
							<a>Contact</a><br/>
						</div>
						<div class="quarter">
							<img style="float:left;margin-top:-5px;margin-left:-25px;padding-right: 5px;" src="images/fabric-roundel.png" width="36"/>
							<h4>Fabric</h4><br />
							<a>About</a><br/>
							<a>Download</a><br/>
						</div>
						<div class="quarter">
							<img style="float:left;margin-top:-5px;margin-left:-25px;padding-right: 5px;" src="images/fabric-roundel.png" width="36"/>
							<h4>onFabric</h4><br />
							<a>About</a><br/>
							<a>Register</a><br/>
						</div>
						
						<div style="clear:both;"></div>
					</div>
					<div style="clear:both;"></div>
				</div>
				</div>
			
			<?php else: //Display the actual site?>
						
						
				<div id="<?php echo $showRightColumn ? 'contentarea2' : 'contentarea'; ?>">
					<div>					
						<jdoc:include type="modules" name="position-2" />
					</div>
					<div id="<?php echo $showRightColumn ? 'wrapper' : 'wrapper2'; ?>" <?php if (isset($showno)){echo 'class="shownocolumns"';}?>>
						<div id="main">
							<jdoc:include type="message" />
							<jdoc:include type="component" />
						</div><!-- end main -->

					</div><!-- end wrapper -->
					<div style="clear:both;"></div>

				</div> <!-- end contentarea -->
						
			<?php endif;?>

		</div><!-- back -->

	</div><!-- all -->
	<div style="clear:both;"></div>

	<jdoc:include type="modules" name="debug" />


</body>
</html>
