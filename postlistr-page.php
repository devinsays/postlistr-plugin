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

	<div class="updated below-h2 spinner"><p><img class="waiting" src="<?php echo admin_url('images/wpspin_light.gif'); ?>" alt="" width="16">Loading content.</p></div>

	<div class="listr-header">
		<form>
			<p>Enter the URL of a WordPress.com or Jetpack JSON API-enabled blog</p>
			<input type="text" placeholder="Website URL" />
			<button type="submit" class="button">Load Posts</button>
		  </form>
		  <p class="description">Example: visualdemo.wordpress.com</p>
	</div>

	<div id="postlistr-app" class="container-fluid"></div>

</div>