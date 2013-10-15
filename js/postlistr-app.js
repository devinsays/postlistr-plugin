window.wp = window.wp || {};

(function($) {
	var postlistr;

	postlistr = wp.postlistr = { model: {}, view: {}, controller: {} };

	postlistr.model.Post = Backbone.Model.extend({});

	postlistr.model.Posts = Backbone.Collection.extend({
		model: postlistr.model.Post,
		parse: function(response) {
			return response.posts;
		}
	});

	postlistr.view.PostView = Backbone.View.extend({
		template: wp.template('postlistr'),
		render: function() {
			this.$el.html( _.template( $('#tmpl-postlistr').html(), this.model.attributes) );
			return this;
		}
	});

	postlistr.view.PostList = Backbone.View.extend({
		render: function() {
			var $postList = this.$el;
			$postList.empty();
			this.collection.each(function(model) {
				var postView = new postlistr.view.PostView({
					model: model
				});
				postView.render().$el.appendTo($postList);
			});
			return this;
		},
		initialize: function() {
			this.collection.fetch(); // Auto-load when created
			this.listenTo(this.collection, 'sync reset', this.render);
		}
	});

	postlistr.view.BlogForm = Backbone.View.extend({
		events: {
			'submit form': 'loadPosts'
		},
		loadPosts: function(evt) {
			var blog, newBlogUrl;
			evt.preventDefault();
			// Get whatever the user entered
			blog = this.$el.find('input').val();
			// Strip slashes
			blog = blog.replace(/\//g, '');
			if (!blog) {
				// Nothing was entered
				return;
			}
			newBlogUrl = ['http://public-api.wordpress.com/rest/v1/sites/', blog, '/posts/?number=10&callback=?'].join('');

			// Hi developer!
			console.log(newBlogUrl);

			this.collection.url = newBlogUrl;
			this.collection.reset();
			this.collection.fetch({
				reset: true
			});
		}
	});

	postlistr.view.LoadingSpinner = Backbone.View.extend({
		toggle: function() {
			if (this.collection.length > 0) {
				this.$el.hide();
			} else {
				this.$el.show();
			}
		},
		initialize: function() {
			this.listenTo(this.collection, 'reset add', this.toggle);
		}
	});

	var posts = new postlistr.model.Posts([], {
		url: 'http://public-api.wordpress.com/rest/v1/sites/publisherdemo.wordpress.com/posts/?number=10&callback=?'
	});

	var postList = new postlistr.view.PostList({
		collection: posts,
		el: '#postlistr-app'
	});

	var blogForm = new postlistr.view.BlogForm({
		el: '.listr-header',
		collection: posts
	});

	var spinner = new postlistr.view.LoadingSpinner({
		el: '#postlistr-spinner',
		collection: posts
	});

}(jQuery));