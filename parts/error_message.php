<?php if (isset($_SESSION['error'])) : ?>
    <div class="alert alert-danger text-center" id="error-message" role="alert">
        <!-- Shows error message -->
        <?= $_SESSION['error']; ?>
        <?php
            // Remove error from session after displaying it
            unset( $_SESSION['error'] );
        ?>
    </div>
<?php endif; ?>

