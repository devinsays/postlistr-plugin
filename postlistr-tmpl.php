<?php
/**
 * Underscore template for posts in postlistr
 *
 * @package   PostListr Plugin
 * @author    Devin Price <devin.price@wptheming.com>
 * @license   GPLv3+ - http://www.gnu.org/licenses/gpl.html
 * @link      http://wptheming.com
 */
?>

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