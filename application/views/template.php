<?php if($this->session->userdata('logged_in')): ?>

	<?php echo $_header; ?>

	<?php //echo $_top_menu; ?>

	<?php echo $_sidebar; ?>

	<?php echo $_content; ?>

	<?php echo $_footer; ?>

<?php else: ?>
    <?php redirect('login'); ?>
<?php endif; ?>