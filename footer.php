        <?php 
        $freetext3 = get_option('footer_free_text3'); // Free Text 3 ( Footer Left )
        $freetext4 = get_option('footer_free_text4'); // Free Text 2 ( Footer Right )
        ?>
            <!-- FOOTER --> 
            <div id="footer-wrapper">
                <div class="container">
                    <!-- COLUMNS (1/4) -->                  
                    <div class="columns three">
                      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("sosq_footer_1") ) ?>
                    </div>
                    <!-- END COLUMNS (1/4) -->  
                    <!-- COLUMNS (1/4) -->  
                    <div class="columns three">
                      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("sosq_footer_2") ) ?>
                    </div>
                    <!-- END COLUMNS (1/4) -->  
                    <!-- COLUMNS (1/4) -->
                    <div class="columns three">
                      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("sosq_footer_3") ) ?>
                    </div>
                    <!-- END COLUMNS (1/4) -->
                    <!-- COLUMNS (1/4) -->                  
                    <div class="columns three omega">
                      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("sosq_footer_4") ) ?>
                    </div>
                   <!-- COLUMNS (1/4) FLICKR PHOTO STREAM -->   
                </div><!-- End .container ( Footer )-->
                <!-- FOOTER BOTTOM -->  
                <div class="footer-bottom">
                    <div class="container">
                        <div class="columns seven">
                            <?php echo $freetext3 ?></div>
                        <div class="columns five omega taling-r"><?php echo $freetext4 ?></div>
                    </div>
                </div>
                <!-- END FOOTER BOTTOM -->  
            </div><!-- End #footer-wrapper -->
            <!-- END FOOTER --> 
        </div><!-- End #wrapper -->
        <?php $tarea = get_option('sosq_main_script_area'); $analytics = stripslashes( $tarea ); echo $analytics  ?>
        <?php wp_footer(); ?>
    </body>
</html>