<?php
/**
 * Login Form
 *
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       2.2.6
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="col2-set" id="customer_login">

	<div class="col-1">

		<?php endif; ?>

		<h2><?php echo esc_html__( 'Login', 'woocommerce' ); ?></h2>

		<form method="post" class="login">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="form-row form-row-wide">
				<label for="username"><?php esc_html__( 'Username or email address', 'woocommerce' ); ?>
					<span class="required">*</span></label>
				<input type="text" class="input-text" name="username" id="username" value="<?php if ( !empty( $_POST['username'] ) ) {
					echo esc_attr( $_POST['username'] );
				} ?>" />
			</p>

			<p class="form-row form-row-wide">
				<label for="password"><?php echo esc_html__( 'Password', 'woocommerce' ); ?>
					<span class="required">*</span></label>
				<input class="input-text" type="password" name="password" id="password" />
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<p class="form-row">
				<?php wp_nonce_field( 'woocommerce-login' ); ?>
				<input type="submit" class="cortana-button style3 size-md" name="login" value="<?php echo esc_html__( 'Login', 'woocommerce' ); ?>" />
			</p>

			<p class="lost_password">
				<label for="rememberme" class="inline">
					<?php echo esc_html__( 'Remember me', 'woocommerce' ); ?>
					<input name="rememberme" type="checkbox" id="rememberme" value="forever" />
				</label>
				<a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php echo esc_html__( 'Lost your password?', 'woocommerce' ); ?></a>
			</p>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

		<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	</div>

	<div class="col-2">

		<h2><?php echo esc_html__( 'Register', 'woocommerce' ); ?></h2>

		<form method="post" class="register">

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="form-row form-row-wide">
					<label for="reg_username"><?php echo esc_html__( 'Username', 'woocommerce' ); ?>
						<span class="required">*</span></label>
					<input type="text" class="input-text" name="username" id="reg_username" value="<?php if ( !empty( $_POST['username'] ) ) {
						echo esc_attr( $_POST['username'] );
					} ?>" />
				</p>

			<?php endif; ?>

			<p class="form-row form-row-wide">
				<label for="reg_email"><?php echo esc_html__( 'Email address', 'woocommerce' ); ?>
					<span class="required">*</span></label>
				<input type="email" class="input-text" name="email" id="reg_email" value="<?php if ( !empty( $_POST['email'] ) ) {
					echo esc_attr( $_POST['email'] );
				} ?>" />
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="form-row form-row-wide">
					<label for="reg_password"><?php echo esc_html__( 'Password', 'woocommerce' ); ?>
						<span class="required">*</span></label>
					<input type="password" class="input-text" name="password" id="reg_password" />
				</p>

			<?php endif; ?>

			<!-- Spam Trap -->
			<div style="<?php echo( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;">
				<label for="trap"><?php echo esc_html__( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" />
			</div>

			<?php do_action( 'woocommerce_register_form' ); ?>
			<?php do_action( 'register_form' ); ?>

			<p class="form-row">
				<?php wp_nonce_field( 'woocommerce-register' ); ?>
				<input type="submit" class="cortana-button style3 size-md" name="register" value="<?php echo esc_html__( 'Register', 'woocommerce' ); ?>" />
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
