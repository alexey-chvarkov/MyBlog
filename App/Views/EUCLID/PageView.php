<?php use App\Models\Page as Page; ?>
    <!-- Start Main Container -->
    <div class="container zerogrid">
        
    <div class="col-full page-conainer">
	<div class="wrap-col">
    <div class="post-margin">
    <h5 class="page-title"><?php echo $this->Page->getValue()->Title; ?></h5>
    
    <!-- Start Entry -->
    <p><?php echo $this->Page->getValue()->Content; ?></p>


<div class="symple-clear-floats"></div>
    <!-- End Entry -->
    
    </div>
	</div>
    </div>
    
    <div class="clear"></div>
        </div>
	<!-- End Main Container -->
