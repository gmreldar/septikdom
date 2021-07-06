Share = {
	facebook: function() {
		url = 'https://facebook.com/sharer/sharer.php?';
		url += 'u=' + window.location.href;
		Share.popup(url);
	},
	google: function() {
		url = 'https://plus.google.com/share?';
		url += 'url=' + window.location.href;
		Share.popup(url);
	},
	vk: function() {
		url = 'http://vk.com/share.php?';
		url += 'url=' + window.location.href;
		Share.popup(url);
	},
	gmail: function() {
		url = 'https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=';
		url += '&su=' + $(document).attr('title');
		url += '&body=' + window.location.href;
		Share.popup(url);
	},
	telegram: function() {
		url = 'https://telegram.me/share/url?';
		url += 'url=' + window.location.href;
		Share.popup(url);
	},
	ok: function() {
		url = 'https://connect.ok.ru/dk?st.cmd=WidgetSharePreview&';
		url += 'st.shareUrl=' + window.location.href;
		Share.popup(url);
	},
	twitter: function() {
		url = 'https://twitter.com/intent/tweet/?';
		url += 'url=' + window.location.href;
		Share.popup(url);
	},
	linkedin: function() {
		url = 'https://www.linkedin.com/shareArticle?';
		url += 'url=' + window.location.href;
		Share.popup(url);
	},
	pinterest: function() {
		url = 'https://www.pinterest.com/pin/create/button/?';
		url += 'url=' + window.location.href;
		url += '&media=' + $('link[rel=image_src]').attr("href");
		url += '&description=' + $(document).attr('title');
		Share.popup(url);
	},

	popup: function(url) {
		window.open(url, '', 'toolbar=0,status=0,width=626,height=436');
	}
};