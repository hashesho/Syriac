</main>

<footer id="footer" class="pb-0">
        <div class="footer-top">
            <div class="container">
                <div class="row text-center">

                    <div class="col-lg-4">
                        <div class="footer-info">
                            <h3><?php bloginfo('name') ?></h3>
                            <p><span>Syria, Middle East</span><br>
<!--                                 <strong>Phone: </strong> +1 5589 55488 55<br> -->
                                <strong>E-mail: </strong>Info@syriacscout.org<br>
                            </p>
                            <div class="social-links mt-3">
                                <p class="fw-bold">Follow Us</p>
                            <!--    <a href="#"><i class="fab fa-twitter"></i></a> -->
                                <a href="https://www.facebook.com/syriansyriacscout/"><i class="fab fa-facebook-f"></i></a>
                           <!--     <a href="#"><i class="fab fa-google-plus-g"></i></a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 footer-links">
                        <h4>Archives</h4>
                        <ul>
                           <?php wp_get_archives(); ?>
                        </ul>
                    </div>

                    <div class="col-lg-4 footer-links">
                        <h4>Categories</h4>
                        <ul>
                            <?php wp_list_categories('title_li='); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="fas fa-chevron-up"></i></a>

<?php wp_footer();?>
</body>
</html>