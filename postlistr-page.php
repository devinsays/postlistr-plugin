<?php
/**
 * Displays the PostListr Page
 *
 * @package   PostListr Plugin
 * @author    Devin Price <devin.price@wptheming.com>
 * @license   GPLv3+ - http://www.gnu.org/licenses/gpl.html
 * @link      http://wptheming.com
 */
?>

<div class="wrap">
	<?php screen_icon( 'options-general' ); ?>
	<h2><?php _e( 'PostListr (Backbone Example)', $this->slug  ); ?></h2>

	<div class="listr-header">
		<form>
			<p><?php _e( 'Enter the URL of a WordPress.com or Jetpack JSON API-enabled blog', $this->slug  ); ?></p>
			<input type="text" placeholder="<?php _e( 'Website URL', $this->slug  ); ?>" />
			<button type="submit" class="button"><?php _e( 'Load posts', $this->slug  ); ?></button>
			<img id="postlistr-spinner" class="waiting" src="<?php echo admin_url('images/wpspin_light.gif'); ?>" alt="" width="16">
		  </form>
		  <p class="description">Example: visualdemo.wordpress.com</p>
	</div>

	<div id="postlistr-app" class="container-fluid"></div>

</div>