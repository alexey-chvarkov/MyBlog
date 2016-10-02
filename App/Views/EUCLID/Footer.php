<?php use App\Application as Application; ?>

    <!-- Start Footer -->
    <div class="spacing-30"></div>
    <div class="container zerogrid">
        <div id="footer-container" class="col-full">
        <div class="wrap-col">	
            <!-- Footer Copyright -->
            <p><?php echo Application::$Configuration->Copyright; ?></p>
            <!-- End Footer Copyright -->
            
            <!-- Footer Logo -->
			<img src="assets/<?php echo $this->TemplateName ?>/images/footer-logo.png" id="footer-logo" />
            <!-- End Footer Logo -->
        
        <div class="clear"></div>
		</div>
        </div>
    </div>
    <!-- End Footer -->


</body>
</html>