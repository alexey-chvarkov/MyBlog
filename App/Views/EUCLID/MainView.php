<?php
use App\Application as Application;
use App\Models\Post as Post;
?>

    <!-- Start Main Container -->
    <div class="container zerogrid">
    
        <!-- Start Posts Container -->
        <div class="col-2-3" id="post-container">
 			<div class="wrap-col">
                 
            <?php foreach (Application::$Database->Posts as $Post): ?>
                <!-- Start Post Item -->
                <div class="post">
                    <div class="post-margin">
                    
                    <h4 class="post-title"><a href="?p=post&id=<?php echo $Post->getValue()->PostId; ?>"><?php echo $Post->getValue()->Title; ?></a></h4>
                        <ul class="post-status">
                        <li><i class="fa fa-clock-o"></i>December 13, 2013</li>
                        <li><i class="fa fa-folder-open-o"></i><a href="#" title="View all posts in Illustration" rel="category">Illustration</a></li>
                        <li><i class="fa fa-comment-o"></i>No Comments</li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                    
                    <div class="featured-image">
                        <img src="<?php echo $Post->getValue()->Image; ?>" class="attachment-post-standard "  />                         
                    </div>
                                    
                <div class="post-margin">
                <p><?php echo $Post->getValue()->Preview; ?></p>
                </div>
                
                <ul class="post-social">
                <li><a href="#" target="_blank">
                <i class="fa fa-facebook"></i></a>
                </li>
                            
                <li>
                <a href="#" target="_blank">
                <i class="fa fa-twitter"></i></a>
                </li>
                            
                <li>
                <a href="#" target="_blank">
                <i class="fa fa-google-plus"></i></a>
                </li>
                
                <li>
                <a href="#" target="_blank">
                <i class="fa fa-linkedin"></i></a>
                </li>
                
                <li>
                <a href="#" class="readmore">Read More <i class="fa fa-arrow-circle-o-right"></i></a>
                </li>
                </ul>
                
                <div class="clear"></div>
                </div>
                <!-- End Post Item -->
            <?php endforeach; ?>
            
                 

            
                        
        <!-- Start Pagination -->
            <div class="spacing-20"></div><ul class="pagination"><li class='current'><a href=''>1</a></li><li><a href=''>2</a></li><li><a href=''>3</a></li><li><a href=''>4</a></li></ul>
        <!-- End Pagination -->
            
        <div class="clear"></div>
		</div>
        </div>
        <!-- End Posts Container -->
		

        <!-- Start Sidebar -->
    	<div class="col-1-3">
		<div class="wrap-col">


        <?php foreach($this->SideItems as $SideItems): ?>

            <!-- Start Widget -->
            <div class="widget-container">
                <h6 class="widget-title"><?php echo $SideItems->getValue()->Title ?></h6>		
                <div style="padding: 10px 20px;">
                    <?php echo $SideItems->getValue()->Content; ?>
                </div>
                <div class="clear"></div>
            </div>
            <!-- End Widget -->
        <?php endforeach; ?>

        <div class="clear"></div></div>    
        <div class="clear"></div>
        </div></div>        
        <!-- End Sidebar -->
    
    <div class="clear"></div>
    </div>
	<!-- End Main Container -->