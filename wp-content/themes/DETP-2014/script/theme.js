(function($){

	$.widget('detp.theme', {
		options: {
			galleryEl: '.detp-gallery',
			teamEl: '.our-team',
			projectEl: '.our-work',
			blogEl: '.our-blog'
		},

		_create:function(){
			var self=this;
			// Get Gallery
			var posts = this._getImages({
				'action'	:'get_gallery',
				'options'	: {
					'posts_per_page' : -1,
					'post_type'		 : ['gallery']
				}
			});

			var gallery = this._getHtml(posts, 'gallery');
	
			$(this.options.galleryEl)
				.append(gallery)
				.gallery({
					data: posts
				});


			// Get Team
			var team = this._getPosts({
				'action'	:'get_posts',
				'options'	: {
					'posts_per_page' : 6,
					'post_type'		 : ['team']
				}				
			});

			var teamHtml = this._getHtml(team, 'team');
			$(this.options.teamEl)
				.append(teamHtml);

			$('.profile').click(function(){
				self._openMember(this);
			});

			// Get Work
			var project = this._getPosts({
				'action'	:'get_posts',
				'options'	: {
					'posts_per_page' : 6,
					'post_type'		 : ['project']
				}				
			});

			var projectHtml = this._getHtml(project, 'project');
			$(this.options.projectEl)
				.append(projectHtml);

			// Get Blog
			var posts = this._getPosts({
				'action'	:'get_posts',
				'options'	: {
					'posts_per_page' 	: 6,
					'post_type'			: ['post']
				}				
			});

			var blogHtml = this._getHtml(posts, 'blog');
			$(this.options.blogEl)
				.append(blogHtml);



		},
		_openMember: function(elem){
			var self = this;
			var member = $(elem).parents('.member');
			var id = member.attr('member-id');

			if ( member.is('.open') ) {
				self._closeMember(member);
			} else {

				//Close Open Member
				this._closeMember( $(this.element).find('.member.open') );
				$(this.element).find('.team-bios .member-bio.open').removeClass('open');

				//Open New Member
				member.addClass('open');
				$(this.element).find('.team-bios .member-bio[member-id="'+ id +'"]').addClass('open');

			}

			
		},

		_closeMember: function(elem){
			var self = this;
			var id = $(elem).attr('member-id');
			$(elem).removeClass('open');
			$(this.element).find('.team-bios .member-bio[member-id="'+ id +'"]').removeClass('open');
			$(elem).find('.profile').on('click', function(){
				self._openMember(elem);
			})
		},

		_getImages: function(args){
			var self = this;

			var posts = [];

			$.ajax({
				url 	: myAjax.ajaxurl,
		        type 	: 'POST',
		        async	: false,
		        data 	: args,
		        success	: function(response){
				        	response = $.parseJSON(response);
				        	posts = response.newposts;
	        			  }
			});
			return posts;
		},

		_getPosts: function (args){
			var self = this;

			var posts = [];

			$.ajax({
				url		: myAjax.ajaxurl,
				type 	: 'POST',
				async	: false,
				data	: args,
				success	: function(response){
					posts = $.parseJSON(response);
				}
			})

			return posts;
		},

		_getHtml: function(data, view){
			var posts = {
				posts : data
			}

			var html = new EJS({url:'/wp-content/themes/DETP-2014/script/templates/'+ view +'.ejs'}).render(posts);
			return html;
		}
	})

	$.widget('detp.gallery', {
		options: {
			autoplay: 	true,
			playSpeed: 	5000
		},
		_create: function(){
			var self = this;
			var $controls = this.element.find('.controls');

			$controls.find('.next').click(function(){ self._goToNext(); });
			$controls.find('.prev').click(function(){ self._goToPrev(); });
			$controls.find('.play_pause').on('click',function(){ 
				if( self.options.playing ){
					self._pauseGallery();
				}else {
					self._playGallery();
				}
			});


			if ( this.options.autoplay ) { this._playGallery(); }


		}
		,_goToNext:function(){
			var $active 	= this.element.find('.active');
			var activeIndex = $active.attr('img-index');
			var $next 		= $active.next().length ? $active.next() : $active.parent().find('img').first();

			$active.removeClass('active');
			$next.addClass('active');

		}
		,_goToPrev:function(){
			var $active 	= this.element.find('.active');
			var activeIndex = $active.attr('img-index');
			var $prev 		= $active.prev().length ? $active.prev() : $active.parent().find('img').last();

			$active.removeClass('active');
			$prev.addClass('active');
		}
		,_playGallery:function(){
			var self = this;
			self.options.interval = setInterval(function(){ self._goToNext() }, self.options.playSpeed);
			this.options.playing = true;
		}
		,_pauseGallery:function(){
			clearInterval(this.options.interval);
			this.options.playing = false;
		}
		,_loadMore:function(){}
	})

	$(document).ready(function(){
		$('.detp-theme').theme();
	});

})(jQuery);