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
			<p>Enter the URL of a WordPress.com or Jetpack JSON API-enabled blog</p>
			<input type="text" placeholder="Website URL" />
			<button type="submit" class="button">Load Posts</button>
			<img id="postlistr-spinner" class="waiting" src="<?php echo admin_url('images/wpspin_light.gif'); ?>" alt="" width="16">
		  </form>
		  <p class="description">Example: visualdemo.wordpress.com</p>
	</div>

	<div id="postlistr-app" class="container-fluid"></div>

</div>

<?php /* Underscore Template */ ?>

<script id="tmpl-postlistr" type="text/template">
<div class="row">
	<div>
	<% if ( featured_image ) { %>
		<img src="<%= featured_image %>" alt="Featured Image for <%- title %>"/>
	<% } %>
	</div>

	<div>
		<h4><a href="<%= URL %>"><%= title %></a></h4>
		<p class="meta">
			<em>Posted on <%= new Date( date ).toDateString() %> by <%= author.name %></em>
		</p>
	</div>
</div>
</script>