<?php use App\Application as Application; ?>
<!DOCTYPE XHTML>


<!DOCTYPE html lang="en-US">
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Euclid Free Responsive Html5 Themes</title>

<link rel='stylesheet' id='reset-css'  href='assets/<?php echo $this->TemplateName; ?>/css/reset.css' type='text/css' media='all' />
<link rel='stylesheet' id='superfish-css'  href='assets/<?php echo $this->TemplateName; ?>/css/superfish.css' type='text/css' media='all' />
<link rel='stylesheet' id='fontawsome-css'  href='assets/<?php echo $this->TemplateName; ?>/css/font-awsome/css/font-awesome.css' type='text/css' media='all' />
<link rel='stylesheet' id='orbit-css-css'  href='assets/<?php echo $this->TemplateName; ?>/css/orbit.css' type='text/css' media='all' />
<link rel='stylesheet' id='style-css'  href='assets/<?php echo $this->TemplateName; ?>/css/style.css' type='text/css' media='all' />
<link rel='stylesheet' id='color-scheme-css'  href='assets/<?php echo $this->TemplateName; ?>/css/color/green.css' type='text/css' media='all' />
<link rel="stylesheet" href="assets/<?php echo $this->TemplateName; ?>/css/zerogrid.css" type="text/css" media="screen">
<link rel="stylesheet" href="assets/<?php echo $this->TemplateName; ?>/css/responsive.css" type="text/css" media="screen">
<script type='text/javascript' src='assets/<?php echo $this->TemplateName; ?>/js/jquery.js'></script>
<script type='text/javascript' src='assets/<?php echo $this->TemplateName; ?>/js/jquery-migrate.min.js'></script>
<script type='text/javascript' src='assets/<?php echo $this->TemplateName; ?>/js/jquery-1.10.2.min.js'></script>
<script type='text/javascript' src='assets/<?php echo $this->TemplateName; ?>/js/jquery.carouFredSel-6.2.1-packed.js'></script>
<script type='text/javascript' src='assets/<?php echo $this->TemplateName; ?>/js/hoverIntent.js'></script>
<script type='text/javascript' src='assets/<?php echo $this->TemplateName; ?>/js/superfish.js'></script>
<script type='text/javascript' src='assets/<?php echo $this->TemplateName; ?>/js/orbit.min.js'></script>
 <script src="assets/<?php echo $this->TemplateName; ?>/js/css3-mediaqueries.js"></script>
</head>

<body class="page page-id-56 page-template-default">

	<!-- Start Header -->
    <div class="container zerogrid">
        <div class="col-full"><div class="wrap-col">
        	<div id="header-nav-container">
            
                    <a href="#">
                    <img src="assets/<?php echo $this->TemplateName; ?>/images/logo.png" id="logo" />
                    </a>
                    
					<!-- Navigation Menu -->         
                    <ul class="sf-menu">
                        <?php foreach ($this->MenuItems as $MenuItem): ?>
                            <li class="menu-item">
                                <a href="<?php echo $MenuItem->getValue()->URL; ?>"><?php echo $MenuItem->getValue()->Title; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>	
                    <!-- End Navigation Menu -->
                    
                    <div class="clear"></div>
                    
            </div>
			</div>
        </div>
    <div class="clear"></div> 
    </div>
    <div class="spacing-30"></div>
    <!-- End Header -->  
