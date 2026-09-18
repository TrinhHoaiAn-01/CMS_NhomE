<?php
/** Module 3: chân trang của giao diện. */
?>
<section id="footer" class="cms-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4"><h2>Bình luận mới</h2></div>
            <div class="col-md-4"><h2>Chuyên mục</h2></div>
            <div class="col-md-4"><h2>Bài viết mới</h2></div>
        </div>
        <nav class="cms-footer-social" aria-label="Mạng xã hội">
            <a href="https://facebook.com" aria-label="Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
            <a href="https://instagram.com" aria-label="Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
            <a href="mailto:contact@fit.tdc.edu.vn" aria-label="Email"><i class="fa-solid fa-envelope" aria-hidden="true"></i></a>
        </nav>
        <p class="cms-footer-copy">&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></p>
    </div>
</section>
