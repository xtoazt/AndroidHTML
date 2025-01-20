
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="profile" href="https://gmpg.org/xfn/11"> 
	 <title>Android emulator online with MyAndroid</title>
<meta name='robots' content='max-image-preview:large' />
<link rel="alternate" type="application/rss+xml" title="MyAndroid &raquo; Feed" href="https://www.myandroid.org/feed/" />
<link rel="alternate" type="application/rss+xml" title="MyAndroid &raquo; Comments Feed" href="https://www.myandroid.org/comments/feed/" />
<script>
window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/svg\/","svgExt":".svg","source":{"wpemoji":"https:\/\/www.myandroid.org\/wp-includes\/js\/wp-emoji.js?ver=6.2","twemoji":"https:\/\/www.myandroid.org\/wp-includes\/js\/twemoji.js?ver=6.2"}};
/**
 * @output wp-includes/js/wp-emoji-loader.js
 */

( function( window, document, settings ) {
	var src, ready, ii, tests;

	// Create a canvas element for testing native browser support of emoji.
	var canvas = document.createElement( 'canvas' );
	var context = canvas.getContext && canvas.getContext( '2d' );

	/**
	 * Checks if two sets of Emoji characters render the same visually.
	 *
	 * @since 4.9.0
	 *
	 * @private
	 *
	 * @param {string} set1 Set of Emoji to test.
	 * @param {string} set2 Set of Emoji to test.
	 *
	 * @return {boolean} True if the two sets render the same.
	 */
	function emojiSetsRenderIdentically( set1, set2 ) {
		// Cleanup from previous test.
		context.clearRect( 0, 0, canvas.width, canvas.height );
		context.fillText( set1, 0, 0 );
		var rendered1 = canvas.toDataURL();

		// Cleanup from previous test.
		context.clearRect( 0, 0, canvas.width, canvas.height );
		context.fillText( set2, 0, 0 );
		var rendered2 = canvas.toDataURL();

		return rendered1 === rendered2;
	}

	/**
	 * Determines if the browser properly renders Emoji that Twemoji can supplement.
	 *
	 * @since 4.2.0
	 *
	 * @private
	 *
	 * @param {string} type Whether to test for support of "flag" or "emoji".
	 *
	 * @return {boolean} True if the browser can render emoji, false if it cannot.
	 */
	function browserSupportsEmoji( type ) {
		var isIdentical;

		if ( ! context || ! context.fillText ) {
			return false;
		}

		/*
		 * Chrome on OS X added native emoji rendering in M41. Unfortunately,
		 * it doesn't work when the font is bolder than 500 weight. So, we
		 * check for bold rendering support to avoid invisible emoji in Chrome.
		 */
		context.textBaseline = 'top';
		context.font = '600 32px Arial';

		switch ( type ) {
			case 'flag':
				/*
				 * Test for Transgender flag compatibility. Added in Unicode 13.
				 *
				 * To test for support, we try to render it, and compare the rendering to how it would look if
				 * the browser doesn't render it correctly (white flag emoji + transgender symbol).
				 */
				isIdentical = emojiSetsRenderIdentically(
					'\uD83C\uDFF3\uFE0F\u200D\u26A7\uFE0F', // as a zero-width joiner sequence
					'\uD83C\uDFF3\uFE0F\u200B\u26A7\uFE0F'  // separated by a zero-width space
				);

				if ( isIdentical ) {
					return false;
				}

				/*
				 * Test for UN flag compatibility. This is the least supported of the letter locale flags,
				 * so gives us an easy test for full support.
				 *
				 * To test for support, we try to render it, and compare the rendering to how it would look if
				 * the browser doesn't render it correctly ([U] + [N]).
				 */
				isIdentical = emojiSetsRenderIdentically(
					'\uD83C\uDDFA\uD83C\uDDF3',       // as the sequence of two code points
					'\uD83C\uDDFA\u200B\uD83C\uDDF3'  // as the two code points separated by a zero-width space
				);

				if ( isIdentical ) {
					return false;
				}

				/*
				 * Test for English flag compatibility. England is a country in the United Kingdom, it
				 * does not have a two letter locale code but rather a five letter sub-division code.
				 *
				 * To test for support, we try to render it, and compare the rendering to how it would look if
				 * the browser doesn't render it correctly (black flag emoji + [G] + [B] + [E] + [N] + [G]).
				 */
				isIdentical = emojiSetsRenderIdentically(
					// as the flag sequence
					'\uD83C\uDFF4\uDB40\uDC67\uDB40\uDC62\uDB40\uDC65\uDB40\uDC6E\uDB40\uDC67\uDB40\uDC7F',
					// with each code point separated by a zero-width space
					'\uD83C\uDFF4\u200B\uDB40\uDC67\u200B\uDB40\uDC62\u200B\uDB40\uDC65\u200B\uDB40\uDC6E\u200B\uDB40\uDC67\u200B\uDB40\uDC7F'
				);

				return ! isIdentical;
			case 'emoji':
				/*
				 * Why can't we be friends? Everyone can now shake hands in emoji, regardless of skin tone!
				 *
				 * To test for Emoji 14.0 support, try to render a new emoji: Handshake: Light Skin Tone, Dark Skin Tone.
				 *
				 * The Handshake: Light Skin Tone, Dark Skin Tone emoji is a ZWJ sequence combining 🫱 Rightwards Hand,
				 * 🏻 Light Skin Tone, a Zero Width Joiner, 🫲 Leftwards Hand, and 🏿 Dark Skin Tone.
				 *
				 * 0x1FAF1 == Rightwards Hand
				 * 0x1F3FB == Light Skin Tone
				 * 0x200D == Zero-Width Joiner (ZWJ) that links the code points for the new emoji or
				 * 0x200B == Zero-Width Space (ZWS) that is rendered for clients not supporting the new emoji.
				 * 0x1FAF2 == Leftwards Hand
				 * 0x1F3FF == Dark Skin Tone.
				 *
				 * When updating this test for future Emoji releases, ensure that individual emoji that make up the
				 * sequence come from older emoji standards.
				 */
				isIdentical = emojiSetsRenderIdentically(
					'\uD83E\uDEF1\uD83C\uDFFB\u200D\uD83E\uDEF2\uD83C\uDFFF', // as the zero-width joiner sequence
					'\uD83E\uDEF1\uD83C\uDFFB\u200B\uD83E\uDEF2\uD83C\uDFFF'  // separated by a zero-width space
				);

				return ! isIdentical;
		}

		return false;
	}

	/**
	 * Adds a script to the head of the document.
	 *
	 * @ignore
	 *
	 * @since 4.2.0
	 *
	 * @param {Object} src The url where the script is located.
	 * @return {void}
	 */
	function addScript( src ) {
		var script = document.createElement( 'script' );

		script.src = src;
		script.defer = script.type = 'text/javascript';
		document.getElementsByTagName( 'head' )[0].appendChild( script );
	}

	tests = Array( 'flag', 'emoji' );

	settings.supports = {
		everything: true,
		everythingExceptFlag: true
	};

	/*
	 * Tests the browser support for flag emojis and other emojis, and adjusts the
	 * support settings accordingly.
	 */
	for( ii = 0; ii < tests.length; ii++ ) {
		settings.supports[ tests[ ii ] ] = browserSupportsEmoji( tests[ ii ] );

		settings.supports.everything = settings.supports.everything && settings.supports[ tests[ ii ] ];

		if ( 'flag' !== tests[ ii ] ) {
			settings.supports.everythingExceptFlag = settings.supports.everythingExceptFlag && settings.supports[ tests[ ii ] ];
		}
	}

	settings.supports.everythingExceptFlag = settings.supports.everythingExceptFlag && ! settings.supports.flag;

	// Sets DOMReady to false and assigns a ready function to settings.
	settings.DOMReady = false;
	settings.readyCallback = function() {
		settings.DOMReady = true;
	};

	// When the browser can not render everything we need to load a polyfill.
	if ( ! settings.supports.everything ) {
		ready = function() {
			settings.readyCallback();
		};

		/*
		 * Cross-browser version of adding a dom ready event.
		 */
		if ( document.addEventListener ) {
			document.addEventListener( 'DOMContentLoaded', ready, false );
			window.addEventListener( 'load', ready, false );
		} else {
			window.attachEvent( 'onload', ready );
			document.attachEvent( 'onreadystatechange', function() {
				if ( 'complete' === document.readyState ) {
					settings.readyCallback();
				}
			} );
		}

		src = settings.source || {};

		if ( src.concatemoji ) {
			addScript( src.concatemoji );
		} else if ( src.wpemoji && src.twemoji ) {
			addScript( src.twemoji );
			addScript( src.wpemoji );
		}
	}

} )( window, document, window._wpemojiSettings );
</script>
<style>
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 0.07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
	<link rel='stylesheet' id='astra-theme-css-css' href='https://www.myandroid.org/wp-content/themes/astra/assets/css/minified/main.min.css?ver=4.1.6' media='all' />
<style id='astra-theme-css-inline-css'>
.ast-no-sidebar .entry-content .alignfull {margin-left: calc( -50vw + 50%);margin-right: calc( -50vw + 50%);max-width: 100vw;width: 100vw;}.ast-no-sidebar .entry-content .alignwide {margin-left: calc(-41vw + 50%);margin-right: calc(-41vw + 50%);max-width: unset;width: unset;}.ast-no-sidebar .entry-content .alignfull .alignfull,.ast-no-sidebar .entry-content .alignfull .alignwide,.ast-no-sidebar .entry-content .alignwide .alignfull,.ast-no-sidebar .entry-content .alignwide .alignwide,.ast-no-sidebar .entry-content .wp-block-column .alignfull,.ast-no-sidebar .entry-content .wp-block-column .alignwide{width: 100%;margin-left: auto;margin-right: auto;}.wp-block-gallery,.blocks-gallery-grid {margin: 0;}.wp-block-separator {max-width: 100px;}.wp-block-separator.is-style-wide,.wp-block-separator.is-style-dots {max-width: none;}.entry-content .has-2-columns .wp-block-column:first-child {padding-right: 10px;}.entry-content .has-2-columns .wp-block-column:last-child {padding-left: 10px;}@media (max-width: 782px) {.entry-content .wp-block-columns .wp-block-column {flex-basis: 100%;}.entry-content .has-2-columns .wp-block-column:first-child {padding-right: 0;}.entry-content .has-2-columns .wp-block-column:last-child {padding-left: 0;}}body .entry-content .wp-block-latest-posts {margin-left: 0;}body .entry-content .wp-block-latest-posts li {list-style: none;}.ast-no-sidebar .ast-container .entry-content .wp-block-latest-posts {margin-left: 0;}.ast-header-break-point .entry-content .alignwide {margin-left: auto;margin-right: auto;}.entry-content .blocks-gallery-item img {margin-bottom: auto;}.wp-block-pullquote {border-top: 4px solid #555d66;border-bottom: 4px solid #555d66;color: #40464d;}:root{--ast-container-default-xlg-padding:6.67em;--ast-container-default-lg-padding:5.67em;--ast-container-default-slg-padding:4.34em;--ast-container-default-md-padding:3.34em;--ast-container-default-sm-padding:6.67em;--ast-container-default-xs-padding:2.4em;--ast-container-default-xxs-padding:1.4em;--ast-code-block-background:#EEEEEE;--ast-comment-inputs-background:#FAFAFA;}html{font-size:93.75%;}a,.page-title{color:var(--ast-global-color-0);}a:hover,a:focus{color:var(--ast-global-color-1);}body,button,input,select,textarea,.ast-button,.ast-custom-button{font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen-Sans,Ubuntu,Cantarell,Helvetica Neue,sans-serif;font-weight:inherit;font-size:15px;font-size:1rem;line-height:1.6em;}blockquote{color:var(--ast-global-color-3);}.site-title{font-size:35px;font-size:2.3333333333333rem;display:none;}header .custom-logo-link img{max-width:72px;}.astra-logo-svg{width:72px;}.site-header .site-description{font-size:15px;font-size:1rem;display:none;}.entry-title{font-size:30px;font-size:2rem;}h1,.entry-content h1{font-size:40px;font-size:2.6666666666667rem;line-height:1.4em;}h2,.entry-content h2{font-size:30px;font-size:2rem;line-height:1.25em;}h3,.entry-content h3{font-size:25px;font-size:1.6666666666667rem;line-height:1.2em;}h4,.entry-content h4{font-size:20px;font-size:1.3333333333333rem;line-height:1.2em;}h5,.entry-content h5{font-size:18px;font-size:1.2rem;line-height:1.2em;}h6,.entry-content h6{font-size:15px;font-size:1rem;line-height:1.25em;}::selection{background-color:var(--ast-global-color-0);color:#ffffff;}body,h1,.entry-title a,.entry-content h1,h2,.entry-content h2,h3,.entry-content h3,h4,.entry-content h4,h5,.entry-content h5,h6,.entry-content h6{color:var(--ast-global-color-3);}.tagcloud a:hover,.tagcloud a:focus,.tagcloud a.current-item{color:#ffffff;border-color:var(--ast-global-color-0);background-color:var(--ast-global-color-0);}input:focus,input[type="text"]:focus,input[type="email"]:focus,input[type="url"]:focus,input[type="password"]:focus,input[type="reset"]:focus,input[type="search"]:focus,textarea:focus{border-color:var(--ast-global-color-0);}input[type="radio"]:checked,input[type=reset],input[type="checkbox"]:checked,input[type="checkbox"]:hover:checked,input[type="checkbox"]:focus:checked,input[type=range]::-webkit-slider-thumb{border-color:var(--ast-global-color-0);background-color:var(--ast-global-color-0);box-shadow:none;}.site-footer a:hover + .post-count,.site-footer a:focus + .post-count{background:var(--ast-global-color-0);border-color:var(--ast-global-color-0);}.single .nav-links .nav-previous,.single .nav-links .nav-next{color:var(--ast-global-color-0);}.entry-meta,.entry-meta *{line-height:1.45;color:var(--ast-global-color-0);}.entry-meta a:hover,.entry-meta a:hover *,.entry-meta a:focus,.entry-meta a:focus *,.page-links > .page-link,.page-links .page-link:hover,.post-navigation a:hover{color:var(--ast-global-color-1);}#cat option,.secondary .calendar_wrap thead a,.secondary .calendar_wrap thead a:visited{color:var(--ast-global-color-0);}.secondary .calendar_wrap #today,.ast-progress-val span{background:var(--ast-global-color-0);}.secondary a:hover + .post-count,.secondary a:focus + .post-count{background:var(--ast-global-color-0);border-color:var(--ast-global-color-0);}.calendar_wrap #today > a{color:#ffffff;}.page-links .page-link,.single .post-navigation a{color:var(--ast-global-color-0);}.widget-title{font-size:21px;font-size:1.4rem;color:var(--ast-global-color-3);}a:focus-visible,.ast-menu-toggle:focus-visible,.site .skip-link:focus-visible,.wp-block-loginout input:focus-visible,.wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper,.ast-header-navigation-arrow:focus-visible{outline-style:dotted;outline-color:inherit;outline-width:thin;border-color:transparent;}input:focus,input[type="text"]:focus,input[type="email"]:focus,input[type="url"]:focus,input[type="password"]:focus,input[type="reset"]:focus,input[type="search"]:focus,textarea:focus,.wp-block-search__input:focus,[data-section="section-header-mobile-trigger"] .ast-button-wrap .ast-mobile-menu-trigger-minimal:focus,.ast-mobile-popup-drawer.active .menu-toggle-close:focus,.woocommerce-ordering select.orderby:focus,#ast-scroll-top:focus,.woocommerce a.add_to_cart_button:focus,.woocommerce .button.single_add_to_cart_button:focus{border-style:dotted;border-color:inherit;border-width:thin;outline-color:transparent;}.ast-logo-title-inline .site-logo-img{padding-right:1em;}.site-logo-img img{ transition:all 0.2s linear;}.ast-page-builder-template .hentry {margin: 0;}.ast-page-builder-template .site-content > .ast-container {max-width: 100%;padding: 0;}.ast-page-builder-template .site-content #primary {padding: 0;margin: 0;}.ast-page-builder-template .no-results {text-align: center;margin: 4em auto;}.ast-page-builder-template .ast-pagination {padding: 2em;}.ast-page-builder-template .entry-header.ast-no-title.ast-no-thumbnail {margin-top: 0;}.ast-page-builder-template .entry-header.ast-header-without-markup {margin-top: 0;margin-bottom: 0;}.ast-page-builder-template .entry-header.ast-no-title.ast-no-meta {margin-bottom: 0;}.ast-page-builder-template.single .post-navigation {padding-bottom: 2em;}.ast-page-builder-template.single-post .site-content > .ast-container {max-width: 100%;}.ast-page-builder-template .entry-header {margin-top: 4em;margin-left: auto;margin-right: auto;padding-left: 20px;padding-right: 20px;}.single.ast-page-builder-template .entry-header {padding-left: 20px;padding-right: 20px;}.ast-page-builder-template .ast-archive-description {margin: 4em auto 0;padding-left: 20px;padding-right: 20px;}.ast-page-builder-template.ast-no-sidebar .entry-content .alignwide {margin-left: 0;margin-right: 0;}@media (max-width:921px){#ast-desktop-header{display:none;}}@media (min-width:921px){#ast-mobile-header{display:none;}}.wp-block-buttons.aligncenter{justify-content:center;}@media (max-width:921px){.ast-theme-transparent-header #primary,.ast-theme-transparent-header #secondary{padding:0;}}@media (max-width:921px){.ast-plain-container.ast-no-sidebar #primary{padding:0;}}.ast-plain-container.ast-no-sidebar #primary{margin-top:0;margin-bottom:0;}@media (min-width:1200px){.wp-block-group .has-background{padding:20px;}}@media (min-width:1200px){.ast-plain-container.ast-no-sidebar .entry-content .alignwide .wp-block-cover__inner-container,.ast-plain-container.ast-no-sidebar .entry-content .alignfull .wp-block-cover__inner-container{width:1960px;}}@media (min-width:1200px){.wp-block-cover-image.alignwide .wp-block-cover__inner-container,.wp-block-cover.alignwide .wp-block-cover__inner-container,.wp-block-cover-image.alignfull .wp-block-cover__inner-container,.wp-block-cover.alignfull .wp-block-cover__inner-container{width:100%;}}.wp-block-columns{margin-bottom:unset;}.wp-block-image.size-full{margin:2rem 0;}.wp-block-separator.has-background{padding:0;}.wp-block-gallery{margin-bottom:1.6em;}.wp-block-group{padding-top:4em;padding-bottom:4em;}.wp-block-group__inner-container .wp-block-columns:last-child,.wp-block-group__inner-container :last-child,.wp-block-table table{margin-bottom:0;}.blocks-gallery-grid{width:100%;}.wp-block-navigation-link__content{padding:5px 0;}.wp-block-group .wp-block-group .has-text-align-center,.wp-block-group .wp-block-column .has-text-align-center{max-width:100%;}.has-text-align-center{margin:0 auto;}@media (min-width:1200px){.wp-block-cover__inner-container,.alignwide .wp-block-group__inner-container,.alignfull .wp-block-group__inner-container{max-width:1200px;margin:0 auto;}.wp-block-group.alignnone,.wp-block-group.aligncenter,.wp-block-group.alignleft,.wp-block-group.alignright,.wp-block-group.alignwide,.wp-block-columns.alignwide{margin:2rem 0 1rem 0;}}@media (max-width:1200px){.wp-block-group{padding:3em;}.wp-block-group .wp-block-group{padding:1.5em;}.wp-block-columns,.wp-block-column{margin:1rem 0;}}@media (min-width:921px){.wp-block-columns .wp-block-group{padding:2em;}}@media (max-width:544px){.wp-block-cover-image .wp-block-cover__inner-container,.wp-block-cover .wp-block-cover__inner-container{width:unset;}.wp-block-cover,.wp-block-cover-image{padding:2em 0;}.wp-block-group,.wp-block-cover{padding:2em;}.wp-block-media-text__media img,.wp-block-media-text__media video{width:unset;max-width:100%;}.wp-block-media-text.has-background .wp-block-media-text__content{padding:1em;}}.wp-block-image.aligncenter{margin-left:auto;margin-right:auto;}.wp-block-table.aligncenter{margin-left:auto;margin-right:auto;}@media (min-width:544px){.entry-content .wp-block-media-text.has-media-on-the-right .wp-block-media-text__content{padding:0 8% 0 0;}.entry-content .wp-block-media-text .wp-block-media-text__content{padding:0 0 0 8%;}.ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-bottom-left > *,.ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-bottom-right > *,.ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-top-left > *,.ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-top-right > *,.ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-center-right > *,.ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-center-left > *{margin:0;}}@media (max-width:544px){.entry-content .wp-block-media-text .wp-block-media-text__content{padding:8% 0;}.wp-block-media-text .wp-block-media-text__media img{width:auto;max-width:100%;}}.wp-block-button.is-style-outline .wp-block-button__link{border-color:var(--ast-global-color-0);border-top-width:2px;border-right-width:2px;border-bottom-width:2px;border-left-width:2px;}div.wp-block-button.is-style-outline > .wp-block-button__link:not(.has-text-color),div.wp-block-button.wp-block-button__link.is-style-outline:not(.has-text-color){color:var(--ast-global-color-0);}.wp-block-button.is-style-outline .wp-block-button__link:hover,div.wp-block-button.is-style-outline .wp-block-button__link:focus,div.wp-block-button.is-style-outline > .wp-block-button__link:not(.has-text-color):hover,div.wp-block-button.wp-block-button__link.is-style-outline:not(.has-text-color):hover{color:#ffffff;background-color:var(--ast-global-color-1);border-color:var(--ast-global-color-1);}.post-page-numbers.current .page-link,.ast-pagination .page-numbers.current{color:#ffffff;border-color:var(--ast-global-color-0);background-color:var(--ast-global-color-0);border-radius:2px;}@media (max-width:921px){.wp-block-button.is-style-outline .wp-block-button__link{padding-top:calc(15px - 2px);padding-right:calc(30px - 2px);padding-bottom:calc(15px - 2px);padding-left:calc(30px - 2px);}}@media (max-width:544px){.wp-block-button.is-style-outline .wp-block-button__link{padding-top:calc(15px - 2px);padding-right:calc(30px - 2px);padding-bottom:calc(15px - 2px);padding-left:calc(30px - 2px);}}@media (min-width:544px){.entry-content > .alignleft{margin-right:20px;}.entry-content > .alignright{margin-left:20px;}.wp-block-group.has-background{padding:20px;}}@media (max-width:921px){.ast-separate-container #primary,.ast-separate-container #secondary{padding:1.5em 0;}#primary,#secondary{padding:1.5em 0;margin:0;}.ast-left-sidebar #content > .ast-container{display:flex;flex-direction:column-reverse;width:100%;}.ast-separate-container .ast-article-post,.ast-separate-container .ast-article-single{padding:1.5em 2.14em;}.ast-author-box img.avatar{margin:20px 0 0 0;}}@media (min-width:922px){.ast-separate-container.ast-right-sidebar #primary,.ast-separate-container.ast-left-sidebar #primary{border:0;}.search-no-results.ast-separate-container #primary{margin-bottom:4em;}}.elementor-button-wrapper .elementor-button{border-style:solid;text-decoration:none;border-top-width:0;border-right-width:0;border-left-width:0;border-bottom-width:0;}body .elementor-button.elementor-size-sm,body .elementor-button.elementor-size-xs,body .elementor-button.elementor-size-md,body .elementor-button.elementor-size-lg,body .elementor-button.elementor-size-xl,body .elementor-button{padding-top:10px;padding-right:40px;padding-bottom:10px;padding-left:40px;}.elementor-button-wrapper .elementor-button{border-color:var(--ast-global-color-0);background-color:var(--ast-global-color-0);}.elementor-button-wrapper .elementor-button:hover,.elementor-button-wrapper .elementor-button:focus{color:#ffffff;background-color:var(--ast-global-color-1);border-color:var(--ast-global-color-1);}.wp-block-button .wp-block-button__link ,.elementor-button-wrapper .elementor-button,.elementor-button-wrapper .elementor-button:visited{color:#ffffff;}.elementor-button-wrapper .elementor-button{line-height:1em;}.wp-block-button .wp-block-button__link:hover,.wp-block-button .wp-block-button__link:focus{color:#ffffff;background-color:var(--ast-global-color-1);border-color:var(--ast-global-color-1);}.elementor-widget-heading h1.elementor-heading-title{line-height:1.4em;}.elementor-widget-heading h2.elementor-heading-title{line-height:1.25em;}.elementor-widget-heading h3.elementor-heading-title{line-height:1.2em;}.elementor-widget-heading h4.elementor-heading-title{line-height:1.2em;}.elementor-widget-heading h5.elementor-heading-title{line-height:1.2em;}.elementor-widget-heading h6.elementor-heading-title{line-height:1.25em;}.wp-block-button .wp-block-button__link{border:none;background-color:var(--ast-global-color-0);color:#ffffff;font-family:inherit;font-weight:inherit;line-height:1em;padding:15px 30px;}.wp-block-button.is-style-outline .wp-block-button__link{border-style:solid;border-top-width:2px;border-right-width:2px;border-left-width:2px;border-bottom-width:2px;border-color:var(--ast-global-color-0);padding-top:calc(15px - 2px);padding-right:calc(30px - 2px);padding-bottom:calc(15px - 2px);padding-left:calc(30px - 2px);}@media (max-width:921px){.wp-block-button .wp-block-button__link{border:none;padding:15px 30px;}.wp-block-button.is-style-outline .wp-block-button__link{padding-top:calc(15px - 2px);padding-right:calc(30px - 2px);padding-bottom:calc(15px - 2px);padding-left:calc(30px - 2px);}}@media (max-width:544px){.wp-block-button .wp-block-button__link{border:none;padding:15px 30px;}.wp-block-button.is-style-outline .wp-block-button__link{padding-top:calc(15px - 2px);padding-right:calc(30px - 2px);padding-bottom:calc(15px - 2px);padding-left:calc(30px - 2px);}}.menu-toggle,button,.ast-button,.ast-custom-button,.button,input#submit,input[type="button"],input[type="submit"],input[type="reset"]{border-style:solid;border-top-width:0;border-right-width:0;border-left-width:0;border-bottom-width:0;color:#ffffff;border-color:var(--ast-global-color-0);background-color:var(--ast-global-color-0);padding-top:10px;padding-right:40px;padding-bottom:10px;padding-left:40px;font-family:inherit;font-weight:inherit;line-height:1em;}button:focus,.menu-toggle:hover,button:hover,.ast-button:hover,.ast-custom-button:hover .button:hover,.ast-custom-button:hover ,input[type=reset]:hover,input[type=reset]:focus,input#submit:hover,input#submit:focus,input[type="button"]:hover,input[type="button"]:focus,input[type="submit"]:hover,input[type="submit"]:focus{color:#ffffff;background-color:var(--ast-global-color-1);border-color:var(--ast-global-color-1);}@media (max-width:921px){.ast-mobile-header-stack .main-header-bar .ast-search-menu-icon{display:inline-block;}.ast-header-break-point.ast-header-custom-item-outside .ast-mobile-header-stack .main-header-bar .ast-search-icon{margin:0;}.ast-comment-avatar-wrap img{max-width:2.5em;}.ast-separate-container .ast-comment-list li.depth-1{padding:1.5em 2.14em;}.ast-separate-container .comment-respond{padding:2em 2.14em;}.ast-comment-meta{padding:0 1.8888em 1.3333em;}}@media (min-width:544px){.ast-container{max-width:100%;}}@media (max-width:544px){.ast-separate-container .ast-article-post,.ast-separate-container .ast-article-single,.ast-separate-container .comments-title,.ast-separate-container .ast-archive-description{padding:1.5em 1em;}.ast-separate-container #content .ast-container{padding-left:0.54em;padding-right:0.54em;}.ast-separate-container .ast-comment-list li.depth-1{padding:1.5em 1em;margin-bottom:1.5em;}.ast-separate-container .ast-comment-list .bypostauthor{padding:.5em;}.ast-search-menu-icon.ast-dropdown-active .search-field{width:170px;}}.ast-no-sidebar.ast-separate-container .entry-content .alignfull {margin-left: -6.67em;margin-right: -6.67em;width: auto;}@media (max-width: 1200px) {.ast-no-sidebar.ast-separate-container .entry-content .alignfull {margin-left: -2.4em;margin-right: -2.4em;}}@media (max-width: 768px) {.ast-no-sidebar.ast-separate-container .entry-content .alignfull {margin-left: -2.14em;margin-right: -2.14em;}}@media (max-width: 544px) {.ast-no-sidebar.ast-separate-container .entry-content .alignfull {margin-left: -1em;margin-right: -1em;}}.ast-no-sidebar.ast-separate-container .entry-content .alignwide {margin-left: -20px;margin-right: -20px;}.ast-no-sidebar.ast-separate-container .entry-content .wp-block-column .alignfull,.ast-no-sidebar.ast-separate-container .entry-content .wp-block-column .alignwide {margin-left: auto;margin-right: auto;width: 100%;}@media (max-width:921px){.site-title{display:block;}.site-header .site-description{display:none;}.entry-title{font-size:30px;}h1,.entry-content h1{font-size:30px;}h2,.entry-content h2{font-size:25px;}h3,.entry-content h3{font-size:20px;}}@media (max-width:544px){.site-title{display:block;}.site-header .site-description{display:none;}.entry-title{font-size:30px;}h1,.entry-content h1{font-size:30px;}h2,.entry-content h2{font-size:25px;}h3,.entry-content h3{font-size:20px;}}@media (max-width:921px){html{font-size:85.5%;}}@media (max-width:544px){html{font-size:85.5%;}}@media (min-width:922px){.ast-container{max-width:1960px;}}@media (min-width:922px){.site-content .ast-container{display:flex;}}@media (max-width:921px){.site-content .ast-container{flex-direction:column;}}@media (min-width:922px){.main-header-menu .sub-menu .menu-item.ast-left-align-sub-menu:hover > .sub-menu,.main-header-menu .sub-menu .menu-item.ast-left-align-sub-menu.focus > .sub-menu{margin-left:-0px;}}blockquote {padding: 1.2em;}:root .has-ast-global-color-0-color{color:var(--ast-global-color-0);}:root .has-ast-global-color-0-background-color{background-color:var(--ast-global-color-0);}:root .wp-block-button .has-ast-global-color-0-color{color:var(--ast-global-color-0);}:root .wp-block-button .has-ast-global-color-0-background-color{background-color:var(--ast-global-color-0);}:root .has-ast-global-color-1-color{color:var(--ast-global-color-1);}:root .has-ast-global-color-1-background-color{background-color:var(--ast-global-color-1);}:root .wp-block-button .has-ast-global-color-1-color{color:var(--ast-global-color-1);}:root .wp-block-button .has-ast-global-color-1-background-color{background-color:var(--ast-global-color-1);}:root .has-ast-global-color-2-color{color:var(--ast-global-color-2);}:root .has-ast-global-color-2-background-color{background-color:var(--ast-global-color-2);}:root .wp-block-button .has-ast-global-color-2-color{color:var(--ast-global-color-2);}:root .wp-block-button .has-ast-global-color-2-background-color{background-color:var(--ast-global-color-2);}:root .has-ast-global-color-3-color{color:var(--ast-global-color-3);}:root .has-ast-global-color-3-background-color{background-color:var(--ast-global-color-3);}:root .wp-block-button .has-ast-global-color-3-color{color:var(--ast-global-color-3);}:root .wp-block-button .has-ast-global-color-3-background-color{background-color:var(--ast-global-color-3);}:root .has-ast-global-color-4-color{color:var(--ast-global-color-4);}:root .has-ast-global-color-4-background-color{background-color:var(--ast-global-color-4);}:root .wp-block-button .has-ast-global-color-4-color{color:var(--ast-global-color-4);}:root .wp-block-button .has-ast-global-color-4-background-color{background-color:var(--ast-global-color-4);}:root .has-ast-global-color-5-color{color:var(--ast-global-color-5);}:root .has-ast-global-color-5-background-color{background-color:var(--ast-global-color-5);}:root .wp-block-button .has-ast-global-color-5-color{color:var(--ast-global-color-5);}:root .wp-block-button .has-ast-global-color-5-background-color{background-color:var(--ast-global-color-5);}:root .has-ast-global-color-6-color{color:var(--ast-global-color-6);}:root .has-ast-global-color-6-background-color{background-color:var(--ast-global-color-6);}:root .wp-block-button .has-ast-global-color-6-color{color:var(--ast-global-color-6);}:root .wp-block-button .has-ast-global-color-6-background-color{background-color:var(--ast-global-color-6);}:root .has-ast-global-color-7-color{color:var(--ast-global-color-7);}:root .has-ast-global-color-7-background-color{background-color:var(--ast-global-color-7);}:root .wp-block-button .has-ast-global-color-7-color{color:var(--ast-global-color-7);}:root .wp-block-button .has-ast-global-color-7-background-color{background-color:var(--ast-global-color-7);}:root .has-ast-global-color-8-color{color:var(--ast-global-color-8);}:root .has-ast-global-color-8-background-color{background-color:var(--ast-global-color-8);}:root .wp-block-button .has-ast-global-color-8-color{color:var(--ast-global-color-8);}:root .wp-block-button .has-ast-global-color-8-background-color{background-color:var(--ast-global-color-8);}:root{--ast-global-color-0:#0170B9;--ast-global-color-1:#3a3a3a;--ast-global-color-2:#3a3a3a;--ast-global-color-3:#4B4F58;--ast-global-color-4:#F5F5F5;--ast-global-color-5:#FFFFFF;--ast-global-color-6:#E5E5E5;--ast-global-color-7:#424242;--ast-global-color-8:#000000;}:root {--ast-border-color : #dddddd;}.ast-single-entry-banner {-js-display: flex;display: flex;flex-direction: column;justify-content: center;text-align: center;position: relative;background: #eeeeee;}.ast-single-entry-banner[data-banner-layout="layout-1"] {max-width: 1920px;background: inherit;padding: 20px 0;}.ast-single-entry-banner[data-banner-width-type="custom"] {margin: 0 auto;width: 100%;}.ast-single-entry-banner + .site-content .entry-header {margin-bottom: 0;}header.entry-header > *:not(:last-child){margin-bottom:10px;}.ast-archive-entry-banner {-js-display: flex;display: flex;flex-direction: column;justify-content: center;text-align: center;position: relative;background: #eeeeee;}.ast-archive-entry-banner[data-banner-width-type="custom"] {margin: 0 auto;width: 100%;}.ast-archive-entry-banner[data-banner-layout="layout-1"] {background: inherit;padding: 20px 0;text-align: left;}body.archive .ast-archive-description{max-width:1920px;width:100%;text-align:left;padding-top:3em;padding-right:3em;padding-bottom:3em;padding-left:3em;}body.archive .ast-archive-description .ast-archive-title,body.archive .ast-archive-description .ast-archive-title *{font-size:40px;font-size:2.6666666666667rem;}body.archive .ast-archive-description > *:not(:last-child){margin-bottom:10px;}@media (max-width:921px){body.archive .ast-archive-description{text-align:left;}}@media (max-width:544px){body.archive .ast-archive-description{text-align:left;}}.ast-breadcrumbs .trail-browse,.ast-breadcrumbs .trail-items,.ast-breadcrumbs .trail-items li{display:inline-block;margin:0;padding:0;border:none;background:inherit;text-indent:0;text-decoration:none;}.ast-breadcrumbs .trail-browse{font-size:inherit;font-style:inherit;font-weight:inherit;color:inherit;}.ast-breadcrumbs .trail-items{list-style:none;}.trail-items li::after{padding:0 0.3em;content:"\00bb";}.trail-items li:last-of-type::after{display:none;}h1,.entry-content h1,h2,.entry-content h2,h3,.entry-content h3,h4,.entry-content h4,h5,.entry-content h5,h6,.entry-content h6{color:var(--ast-global-color-2);}@media (max-width:921px){.ast-builder-grid-row-container.ast-builder-grid-row-tablet-3-firstrow .ast-builder-grid-row > *:first-child,.ast-builder-grid-row-container.ast-builder-grid-row-tablet-3-lastrow .ast-builder-grid-row > *:last-child{grid-column:1 / -1;}}@media (max-width:544px){.ast-builder-grid-row-container.ast-builder-grid-row-mobile-3-firstrow .ast-builder-grid-row > *:first-child,.ast-builder-grid-row-container.ast-builder-grid-row-mobile-3-lastrow .ast-builder-grid-row > *:last-child{grid-column:1 / -1;}}.ast-builder-layout-element[data-section="title_tagline"]{display:flex;}@media (max-width:921px){.ast-header-break-point .ast-builder-layout-element[data-section="title_tagline"]{display:flex;}}@media (max-width:544px){.ast-header-break-point .ast-builder-layout-element[data-section="title_tagline"]{display:flex;}}.ast-builder-menu-1{font-family:inherit;font-weight:inherit;}.ast-builder-menu-1 .sub-menu,.ast-builder-menu-1 .inline-on-mobile .sub-menu{border-top-width:2px;border-bottom-width:0;border-right-width:0;border-left-width:0;border-color:var(--ast-global-color-0);border-style:solid;}.ast-builder-menu-1 .main-header-menu > .menu-item > .sub-menu,.ast-builder-menu-1 .main-header-menu > .menu-item > .astra-full-megamenu-wrapper{margin-top:0;}.ast-desktop .ast-builder-menu-1 .main-header-menu > .menu-item > .sub-menu:before,.ast-desktop .ast-builder-menu-1 .main-header-menu > .menu-item > .astra-full-megamenu-wrapper:before{height:calc( 0px + 5px );}.ast-desktop .ast-builder-menu-1 .menu-item .sub-menu .menu-link{border-style:none;}@media (max-width:921px){.ast-header-break-point .ast-builder-menu-1 .menu-item.menu-item-has-children > .ast-menu-toggle{top:0;}.ast-builder-menu-1 .inline-on-mobile .menu-item.menu-item-has-children > .ast-menu-toggle{right:-15px;}.ast-builder-menu-1 .menu-item-has-children > .menu-link:after{content:unset;}.ast-builder-menu-1 .main-header-menu > .menu-item > .sub-menu,.ast-builder-menu-1 .main-header-menu > .menu-item > .astra-full-megamenu-wrapper{margin-top:0;}}@media (max-width:544px){.ast-header-break-point .ast-builder-menu-1 .menu-item.menu-item-has-children > .ast-menu-toggle{top:0;}.ast-builder-menu-1 .main-header-menu > .menu-item > .sub-menu,.ast-builder-menu-1 .main-header-menu > .menu-item > .astra-full-megamenu-wrapper{margin-top:0;}}.ast-builder-menu-1{display:flex;}@media (max-width:921px){.ast-header-break-point .ast-builder-menu-1{display:flex;}}@media (max-width:544px){.ast-header-break-point .ast-builder-menu-1{display:flex;}}.site-below-footer-wrap{padding-top:20px;padding-bottom:20px;}.site-below-footer-wrap[data-section="section-below-footer-builder"]{background-color:#eeeeee;;min-height:80px;}.site-below-footer-wrap[data-section="section-below-footer-builder"] .ast-builder-grid-row{max-width:1920px;margin-left:auto;margin-right:auto;}.site-below-footer-wrap[data-section="section-below-footer-builder"] .ast-builder-grid-row,.site-below-footer-wrap[data-section="section-below-footer-builder"] .site-footer-section{align-items:flex-start;}.site-below-footer-wrap[data-section="section-below-footer-builder"].ast-footer-row-inline .site-footer-section{display:flex;margin-bottom:0;}.ast-builder-grid-row-full .ast-builder-grid-row{grid-template-columns:1fr;}@media (max-width:921px){.site-below-footer-wrap[data-section="section-below-footer-builder"].ast-footer-row-tablet-inline .site-footer-section{display:flex;margin-bottom:0;}.site-below-footer-wrap[data-section="section-below-footer-builder"].ast-footer-row-tablet-stack .site-footer-section{display:block;margin-bottom:10px;}.ast-builder-grid-row-container.ast-builder-grid-row-tablet-full .ast-builder-grid-row{grid-template-columns:1fr;}}@media (max-width:544px){.site-below-footer-wrap[data-section="section-below-footer-builder"].ast-footer-row-mobile-inline .site-footer-section{display:flex;margin-bottom:0;}.site-below-footer-wrap[data-section="section-below-footer-builder"].ast-footer-row-mobile-stack .site-footer-section{display:block;margin-bottom:10px;}.ast-builder-grid-row-container.ast-builder-grid-row-mobile-full .ast-builder-grid-row{grid-template-columns:1fr;}}.site-below-footer-wrap[data-section="section-below-footer-builder"]{display:grid;}@media (max-width:921px){.ast-header-break-point .site-below-footer-wrap[data-section="section-below-footer-builder"]{display:grid;}}@media (max-width:544px){.ast-header-break-point .site-below-footer-wrap[data-section="section-below-footer-builder"]{display:grid;}}.ast-footer-copyright{text-align:center;}.ast-footer-copyright {color:#3a3a3a;}@media (max-width:921px){.ast-footer-copyright{text-align:center;}}@media (max-width:544px){.ast-footer-copyright{text-align:center;}}.ast-footer-copyright.ast-builder-layout-element{display:flex;}@media (max-width:921px){.ast-header-break-point .ast-footer-copyright.ast-builder-layout-element{display:flex;}}@media (max-width:544px){.ast-header-break-point .ast-footer-copyright.ast-builder-layout-element{display:flex;}}.elementor-widget-heading .elementor-heading-title{margin:0;}.elementor-page .ast-menu-toggle{color:unset !important;background:unset !important;}.elementor-post.elementor-grid-item.hentry{margin-bottom:0;}.woocommerce div.product .elementor-element.elementor-products-grid .related.products ul.products li.product,.elementor-element .elementor-wc-products .woocommerce[class*='columns-'] ul.products li.product{width:auto;margin:0;float:none;}.ast-left-sidebar .elementor-section.elementor-section-stretched,.ast-right-sidebar .elementor-section.elementor-section-stretched{max-width:100%;left:0 !important;}.elementor-template-full-width .ast-container{display:block;}@media (max-width:544px){.elementor-element .elementor-wc-products .woocommerce[class*="columns-"] ul.products li.product{width:auto;margin:0;}.elementor-element .woocommerce .woocommerce-result-count{float:none;}}.ast-header-break-point .main-header-bar{border-bottom-width:1px;}@media (min-width:922px){.main-header-bar{border-bottom-width:1px;}}.main-header-menu .menu-item, #astra-footer-menu .menu-item, .main-header-bar .ast-masthead-custom-menu-items{-js-display:flex;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-moz-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;-moz-box-orient:vertical;-moz-box-direction:normal;-ms-flex-direction:column;flex-direction:column;}.main-header-menu > .menu-item > .menu-link, #astra-footer-menu > .menu-item > .menu-link{height:100%;-webkit-box-align:center;-webkit-align-items:center;-moz-box-align:center;-ms-flex-align:center;align-items:center;-js-display:flex;display:flex;}.ast-header-break-point .main-navigation ul .menu-item .menu-link .icon-arrow:first-of-type svg{top:.2em;margin-top:0px;margin-left:0px;width:.65em;transform:translate(0, -2px) rotateZ(270deg);}.ast-mobile-popup-content .ast-submenu-expanded > .ast-menu-toggle{transform:rotateX(180deg);overflow-y:auto;}.ast-separate-container .blog-layout-1, .ast-separate-container .blog-layout-2, .ast-separate-container .blog-layout-3{background-color:transparent;background-image:none;}.ast-separate-container .ast-article-post{background-color:var(--ast-global-color-5);;}@media (max-width:921px){.ast-separate-container .ast-article-post{background-color:var(--ast-global-color-5);;}}@media (max-width:544px){.ast-separate-container .ast-article-post{background-color:var(--ast-global-color-5);;}}.ast-separate-container .ast-article-single:not(.ast-related-post), .ast-separate-container .comments-area .comment-respond,.ast-separate-container .comments-area .ast-comment-list li, .ast-separate-container .ast-woocommerce-container, .ast-separate-container .error-404, .ast-separate-container .no-results, .single.ast-separate-container  .ast-author-meta, .ast-separate-container .related-posts-title-wrapper, .ast-separate-container.ast-two-container #secondary .widget,.ast-separate-container .comments-count-wrapper, .ast-box-layout.ast-plain-container .site-content,.ast-padded-layout.ast-plain-container .site-content, .ast-separate-container .comments-area .comments-title, .ast-narrow-container .site-content{background-color:var(--ast-global-color-5);;}@media (max-width:921px){.ast-separate-container .ast-article-single:not(.ast-related-post), .ast-separate-container .comments-area .comment-respond,.ast-separate-container .comments-area .ast-comment-list li, .ast-separate-container .ast-woocommerce-container, .ast-separate-container .error-404, .ast-separate-container .no-results, .single.ast-separate-container  .ast-author-meta, .ast-separate-container .related-posts-title-wrapper, .ast-separate-container.ast-two-container #secondary .widget,.ast-separate-container .comments-count-wrapper, .ast-box-layout.ast-plain-container .site-content,.ast-padded-layout.ast-plain-container .site-content, .ast-separate-container .comments-area .comments-title, .ast-narrow-container .site-content{background-color:var(--ast-global-color-5);;}}@media (max-width:544px){.ast-separate-container .ast-article-single:not(.ast-related-post), .ast-separate-container .comments-area .comment-respond,.ast-separate-container .comments-area .ast-comment-list li, .ast-separate-container .ast-woocommerce-container, .ast-separate-container .error-404, .ast-separate-container .no-results, .single.ast-separate-container  .ast-author-meta, .ast-separate-container .related-posts-title-wrapper, .ast-separate-container.ast-two-container #secondary .widget,.ast-separate-container .comments-count-wrapper, .ast-box-layout.ast-plain-container .site-content,.ast-padded-layout.ast-plain-container .site-content, .ast-separate-container .comments-area .comments-title, .ast-narrow-container .site-content{background-color:var(--ast-global-color-5);;}}.ast-mobile-header-content > *,.ast-desktop-header-content > * {padding: 10px 0;height: auto;}.ast-mobile-header-content > *:first-child,.ast-desktop-header-content > *:first-child {padding-top: 10px;}.ast-mobile-header-content > .ast-builder-menu,.ast-desktop-header-content > .ast-builder-menu {padding-top: 0;}.ast-mobile-header-content > *:last-child,.ast-desktop-header-content > *:last-child {padding-bottom: 0;}.ast-mobile-header-content .ast-search-menu-icon.ast-inline-search label,.ast-desktop-header-content .ast-search-menu-icon.ast-inline-search label {width: 100%;}.ast-desktop-header-content .main-header-bar-navigation .ast-submenu-expanded > .ast-menu-toggle::before {transform: rotateX(180deg);}#ast-desktop-header .ast-desktop-header-content,.ast-mobile-header-content .ast-search-icon,.ast-desktop-header-content .ast-search-icon,.ast-mobile-header-wrap .ast-mobile-header-content,.ast-main-header-nav-open.ast-popup-nav-open .ast-mobile-header-wrap .ast-mobile-header-content,.ast-main-header-nav-open.ast-popup-nav-open .ast-desktop-header-content {display: none;}.ast-main-header-nav-open.ast-header-break-point #ast-desktop-header .ast-desktop-header-content,.ast-main-header-nav-open.ast-header-break-point .ast-mobile-header-wrap .ast-mobile-header-content {display: block;}.ast-desktop .ast-desktop-header-content .astra-menu-animation-slide-up > .menu-item > .sub-menu,.ast-desktop .ast-desktop-header-content .astra-menu-animation-slide-up > .menu-item .menu-item > .sub-menu,.ast-desktop .ast-desktop-header-content .astra-menu-animation-slide-down > .menu-item > .sub-menu,.ast-desktop .ast-desktop-header-content .astra-menu-animation-slide-down > .menu-item .menu-item > .sub-menu,.ast-desktop .ast-desktop-header-content .astra-menu-animation-fade > .menu-item > .sub-menu,.ast-desktop .ast-desktop-header-content .astra-menu-animation-fade > .menu-item .menu-item > .sub-menu {opacity: 1;visibility: visible;}.ast-hfb-header.ast-default-menu-enable.ast-header-break-point .ast-mobile-header-wrap .ast-mobile-header-content .main-header-bar-navigation {width: unset;margin: unset;}.ast-mobile-header-content.content-align-flex-end .main-header-bar-navigation .menu-item-has-children > .ast-menu-toggle,.ast-desktop-header-content.content-align-flex-end .main-header-bar-navigation .menu-item-has-children > .ast-menu-toggle {left: calc( 20px - 0.907em);right: auto;}.ast-mobile-header-content .ast-search-menu-icon,.ast-mobile-header-content .ast-search-menu-icon.slide-search,.ast-desktop-header-content .ast-search-menu-icon,.ast-desktop-header-content .ast-search-menu-icon.slide-search {width: 100%;position: relative;display: block;right: auto;transform: none;}.ast-mobile-header-content .ast-search-menu-icon.slide-search .search-form,.ast-mobile-header-content .ast-search-menu-icon .search-form,.ast-desktop-header-content .ast-search-menu-icon.slide-search .search-form,.ast-desktop-header-content .ast-search-menu-icon .search-form {right: 0;visibility: visible;opacity: 1;position: relative;top: auto;transform: none;padding: 0;display: block;overflow: hidden;}.ast-mobile-header-content .ast-search-menu-icon.ast-inline-search .search-field,.ast-mobile-header-content .ast-search-menu-icon .search-field,.ast-desktop-header-content .ast-search-menu-icon.ast-inline-search .search-field,.ast-desktop-header-content .ast-search-menu-icon .search-field {width: 100%;padding-right: 5.5em;}.ast-mobile-header-content .ast-search-menu-icon .search-submit,.ast-desktop-header-content .ast-search-menu-icon .search-submit {display: block;position: absolute;height: 100%;top: 0;right: 0;padding: 0 1em;border-radius: 0;}.ast-hfb-header.ast-default-menu-enable.ast-header-break-point .ast-mobile-header-wrap .ast-mobile-header-content .main-header-bar-navigation ul .sub-menu .menu-link {padding-left: 30px;}.ast-hfb-header.ast-default-menu-enable.ast-header-break-point .ast-mobile-header-wrap .ast-mobile-header-content .main-header-bar-navigation .sub-menu .menu-item .menu-item .menu-link {padding-left: 40px;}.ast-mobile-popup-drawer.active .ast-mobile-popup-inner{background-color:#ffffff;;}.ast-mobile-header-wrap .ast-mobile-header-content, .ast-desktop-header-content{background-color:#ffffff;;}.ast-mobile-popup-content > *, .ast-mobile-header-content > *, .ast-desktop-popup-content > *, .ast-desktop-header-content > *{padding-top:0;padding-bottom:0;}.content-align-flex-start .ast-builder-layout-element{justify-content:flex-start;}.content-align-flex-start .main-header-menu{text-align:left;}.ast-mobile-popup-drawer.active .menu-toggle-close{color:#3a3a3a;}.ast-mobile-header-wrap .ast-primary-header-bar,.ast-primary-header-bar .site-primary-header-wrap{min-height:70px;}.ast-desktop .ast-primary-header-bar .main-header-menu > .menu-item{line-height:70px;}@media (max-width:921px){#masthead .ast-mobile-header-wrap .ast-primary-header-bar,#masthead .ast-mobile-header-wrap .ast-below-header-bar{padding-left:20px;padding-right:20px;}}.ast-header-break-point .ast-primary-header-bar{border-bottom-width:1px;border-bottom-color:#eaeaea;border-bottom-style:solid;}@media (min-width:922px){.ast-primary-header-bar{border-bottom-width:1px;border-bottom-color:#eaeaea;border-bottom-style:solid;}}.ast-primary-header-bar{background-color:#ffffff;;}.ast-primary-header-bar{display:block;}@media (max-width:921px){.ast-header-break-point .ast-primary-header-bar{display:grid;}}@media (max-width:544px){.ast-header-break-point .ast-primary-header-bar{display:grid;}}[data-section="section-header-mobile-trigger"] .ast-button-wrap .ast-mobile-menu-trigger-minimal{color:var(--ast-global-color-0);border:none;background:transparent;}[data-section="section-header-mobile-trigger"] .ast-button-wrap .mobile-menu-toggle-icon .ast-mobile-svg{width:20px;height:20px;fill:var(--ast-global-color-0);}[data-section="section-header-mobile-trigger"] .ast-button-wrap .mobile-menu-wrap .mobile-menu{color:var(--ast-global-color-0);}.ast-builder-menu-mobile .main-navigation .menu-item.menu-item-has-children > .ast-menu-toggle{top:0;}.ast-builder-menu-mobile .main-navigation .menu-item-has-children > .menu-link:after{content:unset;}.ast-hfb-header .ast-builder-menu-mobile .main-header-menu, .ast-hfb-header .ast-builder-menu-mobile .main-navigation .menu-item .menu-link, .ast-hfb-header .ast-builder-menu-mobile .main-navigation .menu-item .sub-menu .menu-link{border-style:none;}.ast-builder-menu-mobile .main-navigation .menu-item.menu-item-has-children > .ast-menu-toggle{top:0;}@media (max-width:921px){.ast-builder-menu-mobile .main-navigation .menu-item.menu-item-has-children > .ast-menu-toggle{top:0;}.ast-builder-menu-mobile .main-navigation .menu-item-has-children > .menu-link:after{content:unset;}}@media (max-width:544px){.ast-builder-menu-mobile .main-navigation .menu-item.menu-item-has-children > .ast-menu-toggle{top:0;}}.ast-builder-menu-mobile .main-navigation{display:block;}@media (max-width:921px){.ast-header-break-point .ast-builder-menu-mobile .main-navigation{display:block;}}@media (max-width:544px){.ast-header-break-point .ast-builder-menu-mobile .main-navigation{display:block;}}:root{--e-global-color-astglobalcolor0:#0170B9;--e-global-color-astglobalcolor1:#3a3a3a;--e-global-color-astglobalcolor2:#3a3a3a;--e-global-color-astglobalcolor3:#4B4F58;--e-global-color-astglobalcolor4:#F5F5F5;--e-global-color-astglobalcolor5:#FFFFFF;--e-global-color-astglobalcolor6:#E5E5E5;--e-global-color-astglobalcolor7:#424242;--e-global-color-astglobalcolor8:#000000;}
</style>
<link rel='stylesheet' id='wp-block-library-css' href='https://www.myandroid.org/wp-includes/css/dist/block-library/style.css?ver=6.2' media='all' />
<style id='global-styles-inline-css'>
body{--wp--preset--color--black: #000000;--wp--preset--color--cyan-bluish-gray: #abb8c3;--wp--preset--color--white: #ffffff;--wp--preset--color--pale-pink: #f78da7;--wp--preset--color--vivid-red: #cf2e2e;--wp--preset--color--luminous-vivid-orange: #ff6900;--wp--preset--color--luminous-vivid-amber: #fcb900;--wp--preset--color--light-green-cyan: #7bdcb5;--wp--preset--color--vivid-green-cyan: #00d084;--wp--preset--color--pale-cyan-blue: #8ed1fc;--wp--preset--color--vivid-cyan-blue: #0693e3;--wp--preset--color--vivid-purple: #9b51e0;--wp--preset--color--ast-global-color-0: var(--ast-global-color-0);--wp--preset--color--ast-global-color-1: var(--ast-global-color-1);--wp--preset--color--ast-global-color-2: var(--ast-global-color-2);--wp--preset--color--ast-global-color-3: var(--ast-global-color-3);--wp--preset--color--ast-global-color-4: var(--ast-global-color-4);--wp--preset--color--ast-global-color-5: var(--ast-global-color-5);--wp--preset--color--ast-global-color-6: var(--ast-global-color-6);--wp--preset--color--ast-global-color-7: var(--ast-global-color-7);--wp--preset--color--ast-global-color-8: var(--ast-global-color-8);--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%);--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%);--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%);--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);--wp--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);--wp--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);--wp--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);--wp--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);--wp--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);--wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');--wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');--wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');--wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');--wp--preset--duotone--midnight: url('#wp-duotone-midnight');--wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');--wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');--wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');--wp--preset--font-size--small: 13px;--wp--preset--font-size--medium: 20px;--wp--preset--font-size--large: 36px;--wp--preset--font-size--x-large: 42px;--wp--preset--spacing--20: 0.44rem;--wp--preset--spacing--30: 0.67rem;--wp--preset--spacing--40: 1rem;--wp--preset--spacing--50: 1.5rem;--wp--preset--spacing--60: 2.25rem;--wp--preset--spacing--70: 3.38rem;--wp--preset--spacing--80: 5.06rem;--wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);--wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);--wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);--wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);--wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);}body { margin: 0;--wp--style--global--content-size: var(--wp--custom--ast-content-width-size);--wp--style--global--wide-size: var(--wp--custom--ast-wide-width-size); }.wp-site-blocks > .alignleft { float: left; margin-right: 2em; }.wp-site-blocks > .alignright { float: right; margin-left: 2em; }.wp-site-blocks > .aligncenter { justify-content: center; margin-left: auto; margin-right: auto; }.wp-site-blocks > * { margin-block-start: 0; margin-block-end: 0; }.wp-site-blocks > * + * { margin-block-start: 24px; }body { --wp--style--block-gap: 24px; }body .is-layout-flow > *{margin-block-start: 0;margin-block-end: 0;}body .is-layout-flow > * + *{margin-block-start: 24px;margin-block-end: 0;}body .is-layout-constrained > *{margin-block-start: 0;margin-block-end: 0;}body .is-layout-constrained > * + *{margin-block-start: 24px;margin-block-end: 0;}body .is-layout-flex{gap: 24px;}body .is-layout-flow > .alignleft{float: left;margin-inline-start: 0;margin-inline-end: 2em;}body .is-layout-flow > .alignright{float: right;margin-inline-start: 2em;margin-inline-end: 0;}body .is-layout-flow > .aligncenter{margin-left: auto !important;margin-right: auto !important;}body .is-layout-constrained > .alignleft{float: left;margin-inline-start: 0;margin-inline-end: 2em;}body .is-layout-constrained > .alignright{float: right;margin-inline-start: 2em;margin-inline-end: 0;}body .is-layout-constrained > .aligncenter{margin-left: auto !important;margin-right: auto !important;}body .is-layout-constrained > :where(:not(.alignleft):not(.alignright):not(.alignfull)){max-width: var(--wp--style--global--content-size);margin-left: auto !important;margin-right: auto !important;}body .is-layout-constrained > .alignwide{max-width: var(--wp--style--global--wide-size);}body .is-layout-flex{display: flex;}body .is-layout-flex{flex-wrap: wrap;align-items: center;}body .is-layout-flex > *{margin: 0;}body{padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;}a:where(:not(.wp-element-button)){text-decoration: none;}.wp-element-button, .wp-block-button__link{background-color: #32373c;border-width: 0;color: #fff;font-family: inherit;font-size: inherit;line-height: inherit;padding: calc(0.667em + 2px) calc(1.333em + 2px);text-decoration: none;}.has-black-color{color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-color{color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-color{color: var(--wp--preset--color--white) !important;}.has-pale-pink-color{color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-color{color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-color{color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-color{color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-color{color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-color{color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-color{color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-color{color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-color{color: var(--wp--preset--color--vivid-purple) !important;}.has-ast-global-color-0-color{color: var(--wp--preset--color--ast-global-color-0) !important;}.has-ast-global-color-1-color{color: var(--wp--preset--color--ast-global-color-1) !important;}.has-ast-global-color-2-color{color: var(--wp--preset--color--ast-global-color-2) !important;}.has-ast-global-color-3-color{color: var(--wp--preset--color--ast-global-color-3) !important;}.has-ast-global-color-4-color{color: var(--wp--preset--color--ast-global-color-4) !important;}.has-ast-global-color-5-color{color: var(--wp--preset--color--ast-global-color-5) !important;}.has-ast-global-color-6-color{color: var(--wp--preset--color--ast-global-color-6) !important;}.has-ast-global-color-7-color{color: var(--wp--preset--color--ast-global-color-7) !important;}.has-ast-global-color-8-color{color: var(--wp--preset--color--ast-global-color-8) !important;}.has-black-background-color{background-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-background-color{background-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-background-color{background-color: var(--wp--preset--color--white) !important;}.has-pale-pink-background-color{background-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-background-color{background-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-background-color{background-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-background-color{background-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-background-color{background-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-background-color{background-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-background-color{background-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-background-color{background-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-background-color{background-color: var(--wp--preset--color--vivid-purple) !important;}.has-ast-global-color-0-background-color{background-color: var(--wp--preset--color--ast-global-color-0) !important;}.has-ast-global-color-1-background-color{background-color: var(--wp--preset--color--ast-global-color-1) !important;}.has-ast-global-color-2-background-color{background-color: var(--wp--preset--color--ast-global-color-2) !important;}.has-ast-global-color-3-background-color{background-color: var(--wp--preset--color--ast-global-color-3) !important;}.has-ast-global-color-4-background-color{background-color: var(--wp--preset--color--ast-global-color-4) !important;}.has-ast-global-color-5-background-color{background-color: var(--wp--preset--color--ast-global-color-5) !important;}.has-ast-global-color-6-background-color{background-color: var(--wp--preset--color--ast-global-color-6) !important;}.has-ast-global-color-7-background-color{background-color: var(--wp--preset--color--ast-global-color-7) !important;}.has-ast-global-color-8-background-color{background-color: var(--wp--preset--color--ast-global-color-8) !important;}.has-black-border-color{border-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-border-color{border-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-border-color{border-color: var(--wp--preset--color--white) !important;}.has-pale-pink-border-color{border-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-border-color{border-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-border-color{border-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-border-color{border-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-border-color{border-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-border-color{border-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-border-color{border-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-border-color{border-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-border-color{border-color: var(--wp--preset--color--vivid-purple) !important;}.has-ast-global-color-0-border-color{border-color: var(--wp--preset--color--ast-global-color-0) !important;}.has-ast-global-color-1-border-color{border-color: var(--wp--preset--color--ast-global-color-1) !important;}.has-ast-global-color-2-border-color{border-color: var(--wp--preset--color--ast-global-color-2) !important;}.has-ast-global-color-3-border-color{border-color: var(--wp--preset--color--ast-global-color-3) !important;}.has-ast-global-color-4-border-color{border-color: var(--wp--preset--color--ast-global-color-4) !important;}.has-ast-global-color-5-border-color{border-color: var(--wp--preset--color--ast-global-color-5) !important;}.has-ast-global-color-6-border-color{border-color: var(--wp--preset--color--ast-global-color-6) !important;}.has-ast-global-color-7-border-color{border-color: var(--wp--preset--color--ast-global-color-7) !important;}.has-ast-global-color-8-border-color{border-color: var(--wp--preset--color--ast-global-color-8) !important;}.has-vivid-cyan-blue-to-vivid-purple-gradient-background{background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;}.has-light-green-cyan-to-vivid-green-cyan-gradient-background{background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;}.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;}.has-luminous-vivid-orange-to-vivid-red-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;}.has-very-light-gray-to-cyan-bluish-gray-gradient-background{background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;}.has-cool-to-warm-spectrum-gradient-background{background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;}.has-blush-light-purple-gradient-background{background: var(--wp--preset--gradient--blush-light-purple) !important;}.has-blush-bordeaux-gradient-background{background: var(--wp--preset--gradient--blush-bordeaux) !important;}.has-luminous-dusk-gradient-background{background: var(--wp--preset--gradient--luminous-dusk) !important;}.has-pale-ocean-gradient-background{background: var(--wp--preset--gradient--pale-ocean) !important;}.has-electric-grass-gradient-background{background: var(--wp--preset--gradient--electric-grass) !important;}.has-midnight-gradient-background{background: var(--wp--preset--gradient--midnight) !important;}.has-small-font-size{font-size: var(--wp--preset--font-size--small) !important;}.has-medium-font-size{font-size: var(--wp--preset--font-size--medium) !important;}.has-large-font-size{font-size: var(--wp--preset--font-size--large) !important;}.has-x-large-font-size{font-size: var(--wp--preset--font-size--x-large) !important;}
.wp-block-navigation a:where(:not(.wp-element-button)){color: inherit;}
.wp-block-pullquote{font-size: 1.5em;line-height: 1.6;}
</style>
<link rel='stylesheet' id='hfe-style-css' href='https://www.myandroid.org/wp-content/plugins/header-footer-elementor/assets/css/header-footer-elementor.css?ver=1.6.15' media='all' />
<link rel='stylesheet' id='elementor-icons-css' href='https://www.myandroid.org/wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.css?ver=5.20.0' media='all' />
<link rel='stylesheet' id='elementor-frontend-css' href='https://www.myandroid.org/wp-content/plugins/elementor/assets/css/frontend.css?ver=3.14.1' media='all' />
<link rel='stylesheet' id='swiper-css' href='https://www.myandroid.org/wp-content/plugins/elementor/assets/lib/swiper/css/swiper.css?ver=5.3.6' media='all' />
<link rel='stylesheet' id='elementor-post-520-css' href='https://www.myandroid.org/wp-content/uploads/elementor/css/post-520.css?ver=1690558526' media='all' />
<link rel='stylesheet' id='elementor-post-540-css' href='https://www.myandroid.org/wp-content/uploads/elementor/css/post-540.css?ver=1704633036' media='all' />
<link rel='stylesheet' id='hfe-widgets-style-css' href='https://www.myandroid.org/wp-content/plugins/header-footer-elementor/inc/widgets-css/frontend.css?ver=1.6.15' media='all' />
<link rel='stylesheet' id='elementor-icons-ekiticons-css' href='https://www.myandroid.org/wp-content/plugins/elementskit-lite/modules/elementskit-icon-pack/assets/css/ekiticons.css?ver=2.9.0' media='all' />
<link rel='stylesheet' id='ekit-widget-styles-css' href='https://www.myandroid.org/wp-content/plugins/elementskit-lite/widgets/init/assets/css/widget-styles.css?ver=2.9.0' media='all' />
<link rel='stylesheet' id='ekit-responsive-css' href='https://www.myandroid.org/wp-content/plugins/elementskit-lite/widgets/init/assets/css/responsive.css?ver=2.9.0' media='all' />
<link rel='stylesheet' id='eael-general-css' href='https://www.myandroid.org/wp-content/plugins/essential-addons-for-elementor-lite/assets/front-end/css/view/general.min.css?ver=5.8.4' media='all' />
<script src='https://www.myandroid.org/wp-includes/js/jquery/jquery.js?ver=3.6.3' id='jquery-core-js'></script>
<script src='https://www.myandroid.org/wp-includes/js/jquery/jquery-migrate.js?ver=3.4.0' id='jquery-migrate-js'></script>
<!--[if IE]>
<script src='https://www.myandroid.org/wp-content/themes/astra/assets/js/unminified/flexibility.js?ver=4.1.6' id='astra-flexibility-js'></script>
<script id='astra-flexibility-js-after'>
flexibility(document.documentElement);
</script>
<![endif]-->
<script id='ai-js-js-extra'>
var MyAjax = {"ajaxurl":"https:\/\/www.myandroid.org\/wp-admin\/admin-ajax.php","security":"49a157a88b"};
</script>
<script src='https://www.myandroid.org/wp-content/plugins/advanced-iframe/js/ai.min.js?ver=498113' id='ai-js-js'></script>
<link rel="https://api.w.org/" href="https://www.myandroid.org/wp-json/" /><link rel="alternate" type="application/json" href="https://www.myandroid.org/wp-json/wp/v2/pages/540" /><link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://www.myandroid.org/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://www.myandroid.org/wp-includes/wlwmanifest.xml" />
<meta name="generator" content="WordPress 6.2" />
<link rel="canonical" href="https://www.myandroid.org/about-us/" />
<link rel='shortlink' href='https://www.myandroid.org/?p=540' />
<link rel="alternate" type="application/json+oembed" href="https://www.myandroid.org/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.myandroid.org%2Fabout-us%2F" />
<link rel="alternate" type="text/xml+oembed" href="https://www.myandroid.org/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.myandroid.org%2Fabout-us%2F&#038;format=xml" />

<!-- Favicon Rotator -->
<link rel="shortcut icon" href="https://www.myandroid.org/wp-content/uploads/2024/01/myandroidicon128.png" />
<link rel="apple-touch-icon-precomposed" href="https://www.myandroid.org/wp-content/uploads/2024/01/myandroidicon128.png" />
<!-- End Favicon Rotator -->
<meta name="generator" content="Elementor 3.14.1; features: e_dom_optimization, e_optimized_assets_loading, a11y_improvements, additional_custom_breakpoints; settings: css_print_method-external, google_font-enabled, font_display-auto">
<style>.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>		<style id="wp-custom-css">
			

/** Start Template Kit CSS: Internet Company (css/customizer.css) **/

/* Envato Custom css - applied to the advanced tab of the element it affects */
.envato-kit-200-progress .elementor-progress-wrapper,
.envato-kit-200-progress .elementor-progress-bar{
	border-radius: 30px;
}

/** End Template Kit CSS: Internet Company (css/customizer.css) **/



/** Start Block Kit CSS: 69-3-4f8cfb8a1a68ec007f2be7a02bdeadd9 **/

.envato-kit-66-menu .e--pointer-framed .elementor-item:before{
	border-radius:1px;
}

.envato-kit-66-subscription-form .elementor-form-fields-wrapper{
	position:relative;
}

.envato-kit-66-subscription-form .elementor-form-fields-wrapper .elementor-field-type-submit{
	position:static;
}

.envato-kit-66-subscription-form .elementor-form-fields-wrapper .elementor-field-type-submit button{
	position: absolute;
    top: 50%;
    right: 6px;
    transform: translate(0, -50%);
		-moz-transform: translate(0, -50%);
		-webmit-transform: translate(0, -50%);
}

.envato-kit-66-testi-slider .elementor-testimonial__footer{
	margin-top: -60px !important;
	z-index: 99;
  position: relative;
}

.envato-kit-66-featured-slider .elementor-slides .slick-prev{
	width:50px;
	height:50px;
	background-color:#ffffff !important;
	transform:rotate(45deg);
	-moz-transform:rotate(45deg);
	-webkit-transform:rotate(45deg);
	left:-25px !important;
	-webkit-box-shadow: 0px 1px 2px 1px rgba(0,0,0,0.32);
	-moz-box-shadow: 0px 1px 2px 1px rgba(0,0,0,0.32);
	box-shadow: 0px 1px 2px 1px rgba(0,0,0,0.32);
}

.envato-kit-66-featured-slider .elementor-slides .slick-prev:before{
	display:block;
	margin-top:0px;
	margin-left:0px;
	transform:rotate(-45deg);
	-moz-transform:rotate(-45deg);
	-webkit-transform:rotate(-45deg);
}

.envato-kit-66-featured-slider .elementor-slides .slick-next{
	width:50px;
	height:50px;
	background-color:#ffffff !important;
	transform:rotate(45deg);
	-moz-transform:rotate(45deg);
	-webkit-transform:rotate(45deg);
	right:-25px !important;
	-webkit-box-shadow: 0px 1px 2px 1px rgba(0,0,0,0.32);
	-moz-box-shadow: 0px 1px 2px 1px rgba(0,0,0,0.32);
	box-shadow: 0px 1px 2px 1px rgba(0,0,0,0.32);
}

.envato-kit-66-featured-slider .elementor-slides .slick-next:before{
	display:block;
	margin-top:-5px;
	margin-right:-5px;
	transform:rotate(-45deg);
	-moz-transform:rotate(-45deg);
	-webkit-transform:rotate(-45deg);
}

.envato-kit-66-orangetext{
	color:#f4511e;
}

.envato-kit-66-countdown .elementor-countdown-label{
	display:inline-block !important;
	border:2px solid rgba(255,255,255,0.2);
	padding:9px 20px;
}

/** End Block Kit CSS: 69-3-4f8cfb8a1a68ec007f2be7a02bdeadd9 **/

		</style>


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BDM8TN1HPW"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BDM8TN1HPW');
</script>





<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js"></script>
<script>
  // Initialize Firebase

	   var config = {
    		apiKey: "AIzaSyC1z6urPncBznaCUHchBg4el0IpND2q5RI",
    		authDomain: "myandroid-5d017.firebaseapp.com",
    		projectId: "myandroid-5d017",
    		storageBucket: "myandroid-5d017.firebasestorage.app",
    		messagingSenderId: "1062219769387",
    		appId: "1:1062219769387:web:aeac253deef39aa9012c6e",
    		measurementId: "G-72F5KNJBL9"
  	   };


           firebase.initializeApp(config);
           const messaging = firebase.messaging();

	   function requestNotificationPermission() {
      		return new Promise((resolve, reject) => {
        		Notification.requestPermission().then((permission) => {
          			if (permission === 'granted') {
            				console.log('Notification permission granted.');
            				resolve();
          			} else {
            				console.log('Notification permission denied.');
            				reject();
          			}
        		});
      		});
    	   }

	   function getToken() {
      		messaging.getToken().then((currentToken) => {
        		if (currentToken) {
          			console.log('FCM Token:', currentToken);
				token = currentToken;
				var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log("token posted");
                                    }
                                };
                                xhttp.open("POST", "/push/storetoken.php", true);
                                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                xhttp.send("token=" + token);
        		} else {
          			console.log('No FCM token available. Request permission to generate one.');
        		}
      		}).catch((err) => {
        		console.log('An error occurred while retrieving token. ', err);
      		});
    	   }

           navigator.serviceWorker.register( 'https://www.myandroid.org/media/system/notifications/firebase-sw.js?amp=22' )
                .then( ( registration ) => {
                        messaging.useServiceWorker( registration );
		        requestNotificationPermission()
            			.then(() => getToken())
            			.catch((err) => console.log(err));

            } )
            .catch( ( error ) => console.log( 'error registering service worker: ', error ) );


</script>


		</head>

<body itemtype='https://schema.org/WebPage' itemscope='itemscope' class="page-template-default page page-id-540 wp-custom-logo ehf-template-astra ehf-stylesheet-astra ast-desktop ast-page-builder-template ast-no-sidebar astra-4.1.6 ast-single-post ast-inherit-site-logo-transparent ast-hfb-header elementor-default elementor-kit-520 elementor-page elementor-page-540">

	<svg
		xmlns="http://www.w3.org/2000/svg"
		viewBox="0 0 0 0"
		width="0"
		height="0"
		focusable="false"
		role="none"
		style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;"
	>
		<defs>
			<filter id="wp-duotone-dark-grayscale">
				<feColorMatrix
					color-interpolation-filters="sRGB"
					type="matrix"
					values="
						.299 .587 .114 0 0
						.299 .587 .114 0 0
						.299 .587 .114 0 0
						.299 .587 .114 0 0
					"
				/>
				<feComponentTransfer color-interpolation-filters="sRGB" >
					<feFuncR type="table" tableValues="0 0.49803921568627" />
					<feFuncG type="table" tableValues="0 0.49803921568627" />
					<feFuncB type="table" tableValues="0 0.49803921568627" />
					<feFuncA type="table" tableValues="1 1" />
				</feComponentTransfer>
				<feComposite in2="SourceGraphic" operator="in" />
			</filter>
		</defs>
	</svg>

	
	<svg
		xmlns="http://www.w3.org/2000/svg"
		viewBox="0 0 0 0"
		width="0"
		height="0"
		focusable="false"
		role="none"
		style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;"
	>
		<defs>
			<filter id="wp-duotone-grayscale">
				<feColorMatrix
					color-interpolation-filters="sRGB"
					type="matrix"
					values="
						.299 .587 .114 0 0
						.299 .587 .114 0 0
						.299 .587 .114 0 0
						.299 .587 .114 0 0
					"
				/>
				<feComponentTransfer color-interpolation-filters="sRGB" >
					<feFuncR type="table" tableValues="0 1" />
					<feFuncG type="table" tableValues="0 1" />
					<feFuncB type="table" tableValues="0 1" />
					<feFuncA type="table" tableValues="1 1" />
				</feComponentTransfer>
				<feComposite in2="SourceGraphic" operator="in" />
			</filter>
		</defs>
	</svg>

	
	<svg
		xmlns="http://www.w3.org/2000/svg"
		viewBox="0 0 0 0"
		width="0"
		height="0"
		focusable="false"
		role="none"
		style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;"
	>
		<defs>
			<filter id="wp-duotone-purple-yellow">
				<feColorMatrix
					color-interpolation-filters="sRGB"
					type="matrix"
					values="
						.299 .587 .114 0 0
						.299 .587 .114 0 0
						.299 .587 .114 0 0
						.299 .587 .114 0 0
					"
				/>
				<feComponentTransfer color-interpolation-filters="sRGB" >
					<feFuncR type="table" tableValues="0.54901960784314 0.98823529411765" />
					<feFuncG type="table" tableValues="0 1" />
					<feFuncB type="table" tableValues="0.71764705882353 0.25490196078431" />
					<feFuncA type="table" tableValues="1 1" />
				</feComponentTransfer>
				<feComposite in2="SourceGraphic" operator="in" />
			</filter>
		</defs>
	</svg>

	
	<svg
		xmlns="http://www.w3.org/2000/svg"
		viewBox="0 0 0 0"
		width="0"
		height="0"
		focusable="false"
		role="none"
		style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;"
	>
		<defs>
			<filter id="wp-duotone-blue-red">
				<feColorMatrix
					color-interpolation-filters="sRGB"
					type="matrix"
					values="
						.299 .587 .114 0 0
						.299 .587 .114 0 0
						.299 .587 .114 0 0
						.299 .587 .114 0 0
					"
				/>
				<feComponentTransfer color-interpolation-filters="sRGB" >
					<feFuncR type="table" tableValues="0 1" />
					<feFuncG type="table" tableValues="0 0.27843137254902" />
					<feFuncB type="table" tableValues="0.5921568627451 0.27843137254902" />
					<feFuncA type="table" tableValues="1 1" />
				</feComponentTransfer>
				<feComposite in2="SourceGraphic" operator="in" />
			</filter>
		</defs>
	</svg>

	
	<svg
		xmlns="http://www.w3.org/2000/svg"
		viewBox="0 0 0 0"
		width="0"
		height="0"
		focusable="false"
		role="none"
		style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;"
	>
		<defs>
			<filter id="wp-duotone-midnight">
				<feColorMatrix
					color-interpolation-filters="sRGB"
					type="matrix"
					values="
						.299 .587 .114 0 0
						.299 .587 .114 0 0
						.299 .587 .114 0 0
						.299 .587 .114 0 0
					"
				/>
				<feComponentTransfer color-interpolation-filters="sRGB" >
					<feFuncR type="table" tableValues="0 0" />
					<feFuncG type="table" tableValues="0 0.64705882352941" />
					<feFuncB type="table" tableValues="0 1" />
					<feFuncA type="table" tableValues="1 1" />
				</feComponentTransfer>
				<feComposite in2="SourceGraphic" operator="in" />
			</filter>
		</defs>
	</svg>

	
	<svg
		xmlns="http://www.w3.org/2000/svg"
		viewBox="0 0 0 0"
		width="0"
		height="0"
		focusable="false"
		role="none"
		style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;"
	>
		<defs>
			<filter id="wp-duotone-magenta-yellow">
				<feColorMatrix
					color-interpolation-filters="sRGB"
					type="matrix"
					values="
						.299 .587 .114 0 0
						.299 .587 .114 0 0
						.299 .587 .114 0 0
						.299 .587 .114 0 0
					"
				/>
				<feComponentTransfer color-interpolation-filters="sRGB" >
					<feFuncR type="table" tableValues="0.78039215686275 1" />
					<feFuncG type="table" tableValues="0 0.94901960784314" />
					<feFuncB type="table" tableValues="0.35294117647059 0.47058823529412" />
					<feFuncA type="table" tableValues="1 1" />
				</feComponentTransfer>
				<feComposite in2="SourceGraphic" operator="in" />
			</filter>
		</defs>
	</svg>

	
	<svg
		xmlns="http://www.w3.org/2000/svg"
		viewBox="0 0 0 0"
		width="0"
		height="0"
		focusable="false"
		role="none"
		style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;"
	>
		<defs>
			<filter id="wp-duotone-purple-green">
				<feColorMatrix
					color-interpolation-filters="sRGB"
					type="matrix"
					values="
						.299 .587 .114 0 0
						.299 .587 .114 0 0
						.299 .587 .114 0 0
						.299 .587 .114 0 0
					"
				/>
				<feComponentTransfer color-interpolation-filters="sRGB" >
					<feFuncR type="table" tableValues="0.65098039215686 0.40392156862745" />
					<feFuncG type="table" tableValues="0 1" />
					<feFuncB type="table" tableValues="0.44705882352941 0.4" />
					<feFuncA type="table" tableValues="1 1" />
				</feComponentTransfer>
				<feComposite in2="SourceGraphic" operator="in" />
			</filter>
		</defs>
	</svg>

	
	<svg
		xmlns="http://www.w3.org/2000/svg"
		viewBox="0 0 0 0"
		width="0"
		height="0"
		focusable="false"
		role="none"
		style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;"
	>
		<defs>
			<filter id="wp-duotone-blue-orange">
				<feColorMatrix
					color-interpolation-filters="sRGB"
					type="matrix"
					values="
						.299 .587 .114 0 0
						.299 .587 .114 0 0
						.299 .587 .114 0 0
						.299 .587 .114 0 0
					"
				/>
				<feComponentTransfer color-interpolation-filters="sRGB" >
					<feFuncR type="table" tableValues="0.098039215686275 1" />
					<feFuncG type="table" tableValues="0 0.66274509803922" />
					<feFuncB type="table" tableValues="0.84705882352941 0.41960784313725" />
					<feFuncA type="table" tableValues="1 1" />
				</feComponentTransfer>
				<feComposite in2="SourceGraphic" operator="in" />
			</filter>
		</defs>
	</svg>

	
<a
	class="skip-link screen-reader-text"
	href="#content"
	role="link"
	title="Skip to content">
		Skip to content</a>

<div
class="hfeed site" id="page">
			<header
		class="site-header header-main-layout-1 ast-primary-menu-enabled ast-logo-title-inline ast-hide-custom-menu-mobile ast-builder-menu-toggle-icon ast-mobile-header-inline" id="masthead" itemtype="https://schema.org/WPHeader" itemscope="itemscope" itemid="#masthead"		>
			<div id="ast-desktop-header" data-toggle-type="dropdown">
		<div class="ast-main-header-wrap main-header-bar-wrap ">
		<div class="ast-primary-header-bar ast-primary-header main-header-bar site-header-focus-item" data-section="section-primary-header-builder">
						<div class="site-primary-header-wrap ast-builder-grid-row-container site-header-focus-item ast-container" data-section="section-primary-header-builder">
				<div class="ast-builder-grid-row ast-builder-grid-row-has-sides ast-builder-grid-row-no-center">
											<div class="site-header-primary-section-left site-header-section ast-flex site-header-section-left">
									<div class="ast-builder-layout-element ast-flex site-header-focus-item" data-section="title_tagline">
											<div
				class="site-branding ast-site-identity" itemtype="https://schema.org/Organization" itemscope="itemscope"				>
					<span class="site-logo-img"><a href="https://www.myandroid.org/" class="custom-logo-link" rel="home"><img width="72" height="72" src="https://www.myandroid.org/wp-content/uploads/2024/01/myandroidicon128-72x72.png" class="custom-logo" alt="winfy windows online games and apps" decoding="async" srcset="https://www.myandroid.org/wp-content/uploads/2024/01/myandroidicon128-72x72.png 72w, https://www.myandroid.org/wp-content/uploads/2024/01/myandroidicon128-72x72.png 128w" sizes="(max-width: 72px) 100vw, 72px" /></a></span><div class="ast-site-title-wrap">
						<span class="site-title" itemprop="name">
				<a href="https://www.myandroid.org/" rel="home" itemprop="url" >
					MyAndroid
				</a>
			</span>
						
				</div>				</div>
			<!-- .site-branding -->
					</div>
								</div>
																									<div class="site-header-primary-section-right site-header-section ast-flex ast-grid-right-section">
										<div class="ast-builder-menu-1 ast-builder-menu ast-flex ast-builder-menu-1-focus-item ast-builder-layout-element site-header-focus-item" data-section="section-hb-menu-1">
			<div class="ast-main-header-bar-alignment"><div class="main-header-bar-navigation"><nav class="site-navigation ast-flex-grow-1 navigation-accessibility site-header-focus-item" id="primary-site-navigation-desktop" aria-label="Site Navigation" itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope"><div class="main-navigation ast-inline-flex"><ul id="ast-hf-menu-1" class="main-header-menu ast-menu-shadow ast-nav-menu ast-flex  submenu-with-border stack-on-mobile"><li id="menu-item-1450" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-1450"><a href="https://www.myandroid.org/" class="menu-link">Home</a></li>
<li id="menu-item-2563" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2563"><a title="windows apps by winfy" href="https://www.myandroid.org/apps/" class="menu-link">Apps</a></li>
<li id="menu-item-665" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-540 current_page_item menu-item-665"><a href="https://www.myandroid.org/about-us/" aria-current="page" class="menu-link">About Us</a></li>
<li id="menu-item-1211" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1211"><a href="https://www.myandroid.org/contact-us/" class="menu-link">Contact Us</a></li>
<li id="menu-item-664" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-664"><a href="https://www.myandroid.org/faqs/" class="menu-link">FAQs</a></li>
</ul></div></nav></div></div>		</div>
									</div>
												</div>
					</div>
								</div>
			</div>
		<div class="ast-desktop-header-content content-align-flex-start ">
			</div>
</div> <!-- Main Header Bar Wrap -->
<div id="ast-mobile-header" class="ast-mobile-header-wrap " data-type="dropdown">
		<div class="ast-main-header-wrap main-header-bar-wrap" >
		<div class="ast-primary-header-bar ast-primary-header main-header-bar site-primary-header-wrap site-header-focus-item ast-builder-grid-row-layout-default ast-builder-grid-row-tablet-layout-default ast-builder-grid-row-mobile-layout-default" data-section="section-primary-header-builder">
									<div class="ast-builder-grid-row ast-builder-grid-row-has-sides ast-builder-grid-row-no-center">
													<div class="site-header-primary-section-left site-header-section ast-flex site-header-section-left">
										<div class="ast-builder-layout-element ast-flex site-header-focus-item" data-section="title_tagline">
											<div
				class="site-branding ast-site-identity" itemtype="https://schema.org/Organization" itemscope="itemscope"				>
					<span class="site-logo-img"><a href="https://www.myandroid.org/" class="custom-logo-link" rel="home"><img width="72" height="72" src="https://www.myandroid.org/wp-content/uploads/2024/01/myandroidicon128-72x72.png" class="custom-logo" alt="winfy windows online games and apps" decoding="async" srcset="https://www.myandroid.org/wp-content/uploads/2024/01/myandroidicon128-72x72.png 72w, https://www.myandroid.org/wp-content/uploads/2024/01/myandroidicon128-72x72.png 128w" sizes="(max-width: 72px) 100vw, 72px" /></a></span><div class="ast-site-title-wrap">
						<span class="site-title" itemprop="name">
				<a href="https://www.myandroid.org/" rel="home" itemprop="url" >
					MyAndroid
				</a>
			</span>
						
				</div>				</div>
			<!-- .site-branding -->
					</div>
									</div>
																									<div class="site-header-primary-section-right site-header-section ast-flex ast-grid-right-section">
										<div class="ast-builder-layout-element ast-flex site-header-focus-item" data-section="section-header-mobile-trigger">
						<div class="ast-button-wrap">
				<button type="button" class="menu-toggle main-header-menu-toggle ast-mobile-menu-trigger-minimal"   aria-expanded="false">
					<span class="screen-reader-text">Main Menu</span>
					<span class="mobile-menu-toggle-icon">
						<span class="ahfb-svg-iconset ast-inline-flex svg-baseline"><svg class='ast-mobile-svg ast-menu-svg' fill='currentColor' version='1.1' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M3 13h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1zM3 7h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1zM3 19h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1z'></path></svg></span><span class="ahfb-svg-iconset ast-inline-flex svg-baseline"><svg class='ast-mobile-svg ast-close-svg' fill='currentColor' version='1.1' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M5.293 6.707l5.293 5.293-5.293 5.293c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0l5.293-5.293 5.293 5.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-5.293-5.293 5.293-5.293c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z'></path></svg></span>					</span>
									</button>
			</div>
					</div>
									</div>
											</div>
						</div>
	</div>
		<div class="ast-mobile-header-content content-align-flex-start ">
				<div class="ast-builder-menu-mobile ast-builder-menu ast-builder-menu-mobile-focus-item ast-builder-layout-element site-header-focus-item" data-section="section-header-mobile-menu">
			<div class="ast-main-header-bar-alignment"><div class="main-header-bar-navigation"><nav class="site-navigation ast-flex-grow-1 navigation-accessibility site-header-focus-item" id="ast-mobile-site-navigation" aria-label="Site Navigation" itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope"><div class="main-navigation"><ul id="ast-hf-mobile-menu" class="main-header-menu ast-nav-menu ast-flex  submenu-with-border astra-menu-animation-fade  stack-on-mobile"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-1450"><a href="https://www.myandroid.org/" class="menu-link">Home</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2563"><a title="windows apps by winfy" href="https://www.myandroid.org/apps/" class="menu-link">Apps</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-540 current_page_item menu-item-665"><a href="https://www.myandroid.org/about-us/" aria-current="page" class="menu-link">About Us</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1211"><a href="https://www.myandroid.org/contact-us/" class="menu-link">Contact Us</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-664"><a href="https://www.myandroid.org/faqs/" class="menu-link">FAQs</a></li>
</ul></div></nav></div></div>		</div>
			</div>
</div>
		</header><!-- #masthead -->
			<div id="content" class="site-content">
		<div class="ast-container">
		

	<div id="primary" class="content-area primary">

		
					<main id="main" class="site-main">
				<article
class="post-540 page type-page status-publish ast-article-single" id="post-540" itemtype="https://schema.org/CreativeWork" itemscope="itemscope">
	
	
	<header class="entry-header ast-no-thumbnail ast-no-title ast-header-without-markup">
			</header> <!-- .entry-header -->


<div class="entry-content clear"
	itemprop="text">

	
			<div data-elementor-type="wp-page" data-elementor-id="540" class="elementor elementor-540">
									<header class="elementor-section elementor-top-section elementor-element elementor-element-e497e98 elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle" data-id="e497e98" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
						<div style="max-width: unset !important;" class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3bc6aa57" data-id="3bc6aa57" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-427da78a elementor-widget elementor-widget-heading" data-id="427da78a" data-element_type="widget" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h1 class="elementor-heading-title elementor-size-default"></h1>
		</div>
				</div>
					</div>
		</div>
							</div>
		</header>
				<section style="background: #99E9AC; padding: 0px !important;" class="elementor-section elementor-top-section elementor-element elementor-element-b0b0f46 elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="b0b0f46" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
						<div  style="background: #99E9AC; max-width: unset !important;" class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3b9428c" data-id="3b9428c" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
			<div style="padding: 0px !important;" class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-e86df5b elementor-widget elementor-widget-text-editor" data-id="e86df5b" data-element_type="widget" data-widget_type="text-editor.default">
				<div style="background: #99E9AC; padding: 0px !important;" class="elementor-widget-container">
							<style>
p { font-size: 18px;}

</style>




<!--<p>AAAAAAAAAAAAAAAAAAAA</p>-->









<div style="width: 100%; text-align: center; margin: auto; background: #fff; ">

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8556862515989191"
     crossorigin="anonymous"></script>
<!-- myandroid_1100_300 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:1100px;height:300px"
     data-ad-client="ca-pub-8556862515989191"
     data-ad-slot="2694299029"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>


</div>


<style>
#ja-container-uptoplay {
    background-color: #FFA500 !important;
    background-image: linear-gradient(90deg, #f1c379 2px, transparent 1px), /* Vertical black lines */ linear-gradient(#f1c379 2px, transparent 2px) !important;
    background-size: 50px 20px !important;
    position: relative;
    margin: 0;
    padding: 0 0 50px 0;
}


#amazon-icon {
    position: absolute;
    top: 337px;
    right: 20px;
    display: flex;
    align-items: center;
    z-index: 100;
    background: #ccc;
    padding: 5px 19px;
}

#amazon-icon img {
    width: 150px; /* Adjust size as needed */
    height: auto; /* Maintain aspect ratio */
    margin-left: 1px; /* Space between text and image */
    margin-top: 10px
}


</style>

<div id="amazon-icon">
      <p style="margin: 10px; color: black; font-size: 18px; font-weight: bold;">Click &amp; Shop in</p>
      <img id="click-shop-icon" src="https://upload.wikimedia.org/wikipedia/commons/6/62/Amazon.com-Logo.svg" alt="Shop on Amazon">
</div>



<!-- // MAIN CONTAINER -->
<div id="ja-container-uptoplay" class="wrap ja-mf clearfix" style="">

    <div id="loadingx" style="display: none; text-align: center;">
    </div>








<div style="height: 0px; width: 100%; background: #99E9AC;"></div>




    <div id="allx" style="margin-top: 10px; width: 100%;">

	<style>

	    .container {
 		padding: 0px !important;
            }

	    #boxes {
		height: calc(100vh - 120px);
		max-height: 720px;
		width: 100%;
            }
            #leftbox {
		float:left;
		height: calc(100vh - 120px);
		max-height: 720px;
            }
            #middlebox{
                float:left;
                background: #000;
		max-width:720px;
		width: 100%;
		height: calc(100vh - 120px);
		max-height: 720px;
		margin-top: 0px;
            }
            #rightbox{
		float:left;
		height: calc(100vh - 120px);
		max-height: 720px;
		overflow: hidden;
            }

	    #rightbox2{
                float:right;
		height: 720px;
		overflow: hidden;
	    }

	    #ja-content {
	   	width: 100% !important; 
	    }


.containeriframe {
  overflow: hidden;
  min-height: 720px;
  height: calc(100vh - 120px);
  max-height: 720px;
}

.responsive-iframe {
  height: calc(100vh - 120px);
  max-height: 720px;
  border: none;
  top: 0px;
}




@media screen and ( max-width: 720px   )    {

            #leftbox {
                display: none;
            }
            #rightbox{
                display: none;
            }
            #middlebox{
                float:left;
                width:100%;
                height:100%;
                margin-top: 0px;
                position: relative;
            }

}


@media screen and (max-width: 1100px)  and (min-width: 721px)   {

            #leftbox2 {
                display:none;
            }
            #rightbox2{
                display:none;
            }

            #leftbox {
                display: block;
                height: 750px;
                width: calc(50% - 360px);
                overflow: hidden;
            }
            #rightbox{
                display: block;
                height: 750px;
                width: calc(50% - 360px);
                overflow: hidden;
            }
            #middlebox{
                float:left;
                width:720px;
                height: 750px;
                margin-top: 0px;
                position: relative;
            }

}

@media screen and (min-width: 1101px)   {

            #leftbox {
                display: block;
                height: 750px;
                width: calc(50% - 360px);
                overflow: hidden;
            }
            #rightbox{
                display: block;
                height: 750px;
                width: calc(50% - 360px);
                overflow: hidden;
            }
            #middlebox{
                float:left;
                width: 720px
                height:750px;
                margin-top: 0px;
                position: relative;
            }

}



@media screen and (max-width: 719px) {



	.talpa-splash-background-image
	{
		max-height: unset !important;
	}

	.talpa-splash-background-container{
		height: 750px;
	}

	#gdsdk__splash {
		height: calc(100vh - 120px);
	}


	.containeriframe {
		max-height: unset;
	}

	.responsive-iframe {
		max-height: unset;
	}
	

}




.container {
    width: 100%; 
}

.bar {
  position: relative;
  width: 470px;
  height: 720px;
  margin:  auto 0 auto 50px;
  background: #000;
}


.bar p {
  position: absolute;
  top: calc(30% + 20px);
  right: -85px;
  text-transform: uppercase;
  color: #000;
  font-family: helvetica, sans-serif;
  font-weight: bold;
}

@-webkit-keyframes move {
  0% {left: 0;}
  50% {left: 100%; -webkit-transform: rotate(450deg); width: 150px; height: 150px;}
  75% {left: 100%; -webkit-transform: rotate(450deg); width: 150px; height: 150px;}
  100 {right: 100%;}
}

        </style>

     <!--   <div style="height: 30px;width: 100%;z-index: 1;background: #000;float: left;min-height: 30px;position: relative;">----</div>  -->

	<div id="boxes" style="">
	    <div id="leftbox" style="text-align: center; padding-right: 10px;">

<div id="leftbox2">


</div>



            </div>
	    <div id="middlebox">


		<h1 style="text-align: center; color:#fff; margin: 10px 0px 0px 0px; padding: 2px 10px 2px 10px; font-size: 20px; width: 100%; overflow-x: hidden;">Android Emulator</h1>

        	<div id="loginx" class="containeriframe" style="display: block; ">
			<div id="login_banner" class="responsive-iframe" src="">









<script>

function opengameads() {


                try {
                                document.getElementById("leftbox").style.opacity = "";
                } catch (error) {}

                try {
                                document.getElementById("smallmidbox").style.opacity = "";
                } catch (error) {}


                try {
                                document.getElementById("rightbox").style.opacity = "";
                } catch (error) {}

}


setTimeout(function() {

  let test = new Request(
    "https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js",
    // "https://static.ads-twitter.com/uwt.js",
    { method: "HEAD", mode: "no-cors" }
  );

  //fetch(test)
  //.then(res => adsallowed() )
  //.catch(err => adsdetected() );

  let adbnrefresh = document.querySelector("#adbnrb");
  adbnrefresh.addEventListener("click", function () {
        //location.reload();
  });


}, 100);



function adsallowed()
{
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.open("GET", "https://www.myandroid.org/media/system/noblocker.php", true); 
  xmlHttp.send(null);
  //console.log("ADS ALLOWED X");
}

function adsdetected()
{
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.open("GET", "https://www.myandroid.org/media/system/blocker.php", true); 
  xmlHttp.send(null);

  //console.log("ADBLOCK DETECTED X");
  let adbnwrap = document.querySelector(".adbn-wrap");
  adbnwrap.style.display = "flex";

}

</script>


<div class="adbn-wrap">
<div>
<p>We have detected an adblocker in your browser, <br/>please consider supporting us by disabling your ad blocker.</p>
<button id="adbnrb" type="button" name="button">I've disabled AdBlocker</button>
</div>
</div>

<style>
.adbn-wrap{
    display: none;
    justify-content: center;
    position: fixed;
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background: rgb(117 117 117 / 38%);
    backdrop-filter: blur(2px);
    z-index: 999;
}
.adbn-wrap div{
    align-self: center;
    width: 30vw;
    background: #010a26;
    padding: 30px 20px;
    text-align: center;
    border-radius: 0 0 10px 10px;
    box-shadow: 0px 35px 20px -20px #ababab;
    color: #fff;
    border-top: 2px solid #ff8d00;
    animation: popupanim ease-out 0.5s;
    animation-iteration-count: 1;
}
.adbn-wrap div p{
    line-height: 1.8;
    margin-bottom: 0;
    font-size: 20px;
}
.adbn-wrap div button{
    margin-top: 14px;
    background: #ffffff;
    color: #000;
    border: 0;
    border-radius: 4px;
    font-size: 24px;
    padding: 3px 12px;
}
@keyframes popupanim{
    from{
        opacity:0.3;
        transform:translate(0px,40px);
    }
    to{
        opacity:1;
        transform:translate(0px,0px)  ;
    }
}
@media screen and (max-width: 1200px) {
  .adbn-wrap div{
      width: 70vw;
  }
}
</style>





 <script>

function setCookieYY(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*10*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

setCookieYY("titlelow", "myandroid", 1);

</script>














<style>

#login_banner{margin:0;padding:0;background-color:#000;overflow:hidden;}
##game{top:0;left:0;width:0;height:0;overflow:hidden;max-width:100%;max-height:100%;min-width:100%;min-height:100%;box-sizing:border-box}

</style>



<script type="text/javascript"> // RELOADS WEBPAGE WHEN MOBILE ORIENTATION CHANGES
    window.onorientationchange = function() {
        var orientation = window.orientation;
            switch(orientation) {
                case 0:
                case 90:
                case -90: window.location.reload();
                break; }
    };

</script>


<style type="text/css">


.BG-splash-button,.BG-splash-button:active{box-shadow:inset 0 3px 0 0 #00fcff,inset 20px 0 50px rgba(8,238,225,.3),inset 20px 0 300px rgba(0,200,187,.05),inset 0 20px 50px rgba(8,238,225,.3),inset 0 0 10px #affffa,4px 4px 4px 0 rgba(10,10,10,.5)!important;background-color:rgba(9,81,105,.5);border:0;color:#affffa;width:290px;height:4rem;border-radius:290486px!important;font-size:1.25rem!important;border:2px solid #5258b5!important;opacity:1}.BG-splash-button:before{content:"";left:0;top:1px;width:100%;height:100%;border-radius:290486px!important;opacity:0;background-color:#fff;box-shadow:inset 0 0 7px 0 rgba(223,180,170,.53)!important;transform:scale(0);transform-origin:50% 50%;will-change:transform;transition:transform 172ms cubic-bezier(.25,.46,.45,.94),opacity 172ms cubic-bezier(.25,.46,.45,.94);z-index:-1}

.BG-splash-button:active{border-color:transparent!important;color:rgba(0,0,0,.7);transform:translateY(0)}

.BG-splash-button:active:before{box-shadow:inset 0 0 7px 0 rgba(224,71,36,.53),inset 0 0 7px 0 rgba(0,0,0,.35)!important}


#login_banner{position:inherit}

.talpa-splash-background-container{
box-sizing:border-box;top:0;left:0;
width:115%;
margin-left: -15%;
height:100%;background-color:#000;overflow:hidden}

.talpa-splash-background-image
{box-sizing:border-box;
top:0%;
left:0%;
width:100%;
height: calc(100vh - 120px);
max-height: 720px;
background-image:var(--thumb);background-size:cover;
filter:blur(20px) brightness(1.2)
}


.talpa-splash-container{
      margin-top: -75%;
      display:flex;flex-flow:column;box-sizing:border-box;bottom:0;
}

.talpa-splash-top>div>div:first-child{position:relative;width:250px;height:250px;margin:auto auto 20px;border-radius:10px;overflow:hidden;border:2px solid hsla(0,0%,100%,.8);box-shadow:inset 0 5px 5px rgba(0,0,0,.5),0 2px 4px rgba(0,0,0,.3);background-image:var(--thumb);background-position:50%;background-size:cover}


@media screen and (min-height: 601px ) and (max-width: 719px) {

        .talpa-splash-container{
                margin-top: -120%;
                display:flex;flex-flow:column;box-sizing:border-box;bottom:0;
        }


        .talpa-splash-top>div>div:first-child{
                width:250px;
                height:250px;
        }
}


@media screen and (max-height: 600px ) and (max-width: 719px) {

        .talpa-splash-container{
                margin-top: -160%;
                display:flex;flex-flow:column;box-sizing:border-box;bottom:0;
        }


        .talpa-splash-top>div>div:first-child{
                width:250px;
                height:250px;
        }
}


@media screen and (min-height: 401px) and (max-height: 600px) and (max-width: 1200px) {      

        .talpa-splash-container{
                margin-top: -40%;
                display:flex;flex-flow:column;box-sizing:border-box;bottom:0;
	}

	.talpa-splash-top>div>div:first-child{
                width:130px;
                height:130px;
        }
}


@media screen and (max-height: 400px) and (max-width: 1200px) {

	.talpa-splash-container{
      		margin-top: -35%;
      		display:flex;flex-flow:column;box-sizing:border-box;bottom:0;
	}

        .talpa-splash-top>div>div:first-child{
                width:130px;
                height:130px;
        }
}




.talpa-splash-top{display:flex;flex-flow:column;box-sizing:border-box;flex:1;align-self:center;justify-content:center;padding: 20px 20px 20px 0px;}

.talpa-splash-top>div{text-align:center}

.talpa-splash-top>div>button
{position:relative;min-width:180px;min-height:45px;border:0;border-radius:25px;border-bottom:5px solid grey;white-space:nowrap;text-overflow:ellipsis;text-align:center;text-transform:uppercase;text-shadow:1px 1px 1px rgba(0,0,0,.004);font-family:Roboto Condensed,Helvetica Neue,Arial,"sans-serif";font-size:16px;font-weight:400;cursor:pointer;box-shadow:inset 0 -1px 1px hsla(0,0%,100%,.1),inset 0 1px 1px hsla(0,0%,100%,.2);will-change:transform;
transition:transform .15s linear; 
transition: background .2s;
-webkit-transition: background .2s;
}

.talpa-splash-top>div>button:focus{outline:none}.talpa-splash-top>div>button:active{box-shadow:0 10px 20px rgba(0,0,0,.19),0 6px 6px rgba(0,0,0,.13);transform:translateY(0px)}.talpa-loader,.talpa-loader:after{border-radius:50%;width:1.5em;height:1.5em}.talpa-loader{box-sizing:content-box;margin:0 auto;font-size:10px;position:relative;text-indent:-9999em;border:1.1em solid hsla(0,0%,100%,.2);border-left-color:#fff;-webkit-transform:translateZ(0);-ms-transform:translateZ(0);transform:translateZ(0);-webkit-animation:talpa-load8 1.1s linear infinite;animation:talpa-load8 1.1s linear infinite;display:none}

.talpa-splash-top>div>div>img{width:100%;height:100%}.talpa-splash-bottom{display:flex;flex-flow:column;box-sizing:border-box;align-self:center;justify-content:center;width:100%;padding:0 0 20px}.talpa-splash-bottom>.talpa-splash-consent,.talpa-splash-bottom>.talpa-splash-title{box-sizing:border-box;width:100%;padding:20px;background:linear-gradient(90deg,transparent,rgba(0,0,0,.5) 50%,transparent);color:#fff;text-align:left;font-size:12px;font-family:Arial;font-weight:400;text-shadow:0 0 1px rgba(0,0,0,.7);line-height:150%}.talpa-splash-bottom>.talpa-splash-title{padding:15px 0;text-align:center;font-size:18px;font-family:Helvetica,Arial,sans-serif;font-weight:700;line-height:100%}.talpa-splash-bottom>.talpa-splash-consent a{color:#fff}@-webkit-keyframes talpa-load8{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}@keyframes talpa-load8{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}@keyframes talpa-gradient{0%{background-position:0 50%}50%{background-position:100% 50%}to{background-position:0 50%}}

</style>

<style data-jss="" data-meta="MuiCssBaseline">
strong, b {
  font-weight: 700;
}
#login_banner  {
  color: #eee;
  margin: 0;
  font-size: 0.875rem;
  font-family: Poppins,Roboto;
  font-weight: 400;
  line-height: 1.43;
  background-color: #141414;
      height: 650px;
}
@media print {
  #login_banner {
    background-color: #fff;
  }
}
#login_banner::backdrop {
  background-color: #141414;
}
</style>






<div id="gdsdk__splash" style="width: 100%; height: 100%; top: 0px; left: 0px;">

	<div class="h-100 d-flex align-items-center" style="height: 100%;">
		<div class="mh-100 w-100 overflow-auto p-2" style="width: 100%; height: 100%;">
			<div class="container p-0 rounded overflow-hidden" style="max-width: 720px; box-shadow: rgba(0, 0, 0, 0.14) 0px 1px 1px 0px, rgba(0, 0, 0, 0.12) 0px 2px 1px -1px, rgba(0, 0, 0, 0.2) 0px 1px 3px 0px; height: 100%;">
				<div style="height: 100%;">
					<div class="talpa-splash-background-container" style="height: 750px;">


<div class="talpa-splash-background-image" style="--thumb:url(/webpimages/myandroidicon128.jpg);">

						</div>
					</div>
					<div id="talpa-splash-container-x" class="talpa-splash-container">
						<div class="talpa-splash-top">
						<div>

<div style="--thumb:url(/webpimages/myandroidicon128.jpg);">
						</div>
						<button id="talpa-splash-button" onclick="myFunction()" class="BG-splash-button" style="display: block; margin: auto;">Booting ...</button>


<script>

setTimeout(() => {
		opengameads();
                 },
		 "100");




document.getElementById("talpa-splash-button").disabled = true;

         setTimeout(() => {
                                        counterxx = counterxx - 1;
                                        rewritebutton (counterxx);
	}, "1000");



</script>

						<div id="smallmidbox" style="margin-top: 10px;">

						</div>


 
			</div>




    <script>



		var viendolovideos = 0;

		googletag = window.googletag || {cmd: []};
		
		function giveReward() {  
			console.log("slotgranted giveReward"); 
			//window.location="/playonline/androidemulator.php?apk=myandroidrunemulator";
	 	}
		function slotclosed() {  
                        console.log("slotclosed"); 
                        window.location="/playonline/androidemulator.php?apk=myandroidrunemulator";
                }
                function slotcanceled() {  
                        console.log("slotcanceled"); 
                        window.location="/playonline/androidemulator.php?apk=myandroidrunemulator";
                }
		
		
                function showAd() {

                        document.getElementById('talpa-splash-button').innerHTML = 'Please wait...';
                        setTimeout(() => {
                            if ( viendolovideos == 0 )
                            {
                                console.log("too much time");
                                window.location="/playonline/androidemulator.php?apk=myandroidrunemulator";
                            }
                        },
                        "200");

		}




      function myFunction()
      {
		//window.location="/playonline/androidemulator.php?apk=myandroidrunemulator";
		showAd();
      }

      function getWidth() {
	   if ( window.innerWidth > window.innerHeight )
	   {
		return window.innerHeight;
	   }
	   else   {
		return window.innerWidth;
	   }
      }


function getWidthX() {
        return document.documentElement.clientWidth;

}

function getHeightX() {

         return document.documentElement.clientHeight;

}


        window.onload = function() {
		if ( getWidthX()  > 720 )
                {
			document.getElementById("login_banner").style.width = "720px";
			//"loginx"
                }
                else {
                        document.getElementById("login_banner").style.width = getWidthX() +20 +  'px';
                }
        }
	setTimeout(function() {
		if ( getWidthX()  > 720 )
		{
			document.getElementById("login_banner").style.width = "720px";
			//document.getElementById("talpa-splash-container-x").style.marginTop = '-' + ( 720 )  + 'px';
			//document.getElementById("talpa-splash-container-x").style.marginTop = '-120%';
		}
		else {
			document.getElementById("login_banner").style.width = getWidthX() + 20 + 'px';
			//document.getElementById("talpa-splash-container-x").style.marginTop = '-' + ( getHeightX() - 150 )  + 'px';
			//document.getElementById("talpa-splash-container-x").style.marginTop = '-120%';
		}


	}, 1);
    </script>

<style>


@media screen and (max-width: 299px) and (min-height: 300px) {
   #talpa-splash-container-x {
        margin-top: -230%;
   }
}

@media screen and (min-width: 300px) and (max-width: 400px) and (min-height: 300px) {
   #talpa-splash-container-x {
        margin-top: -180%;
   }
}

@media screen and (min-width: 401px) and (max-width: 509px) and (min-height: 300px) {
   #talpa-splash-container-x {
        margin-top: -140%;
   }
}


@media screen and (min-width: 510px) and (max-width: 719px) and (min-height: 300px) {
   #talpa-splash-container-x {
        margin-top: -140%;
   }
}

@media screen and (min-width: 720px) and (min-height: 300px) {
   #talpa-splash-container-x {
        margin-top: -80%;
   }
}

</style>

<div>







            </div>

	</div>


    </div>
  <br>
  <div id="status">
  </div>

    <div id="console">
    </div>



<!--
<div id='div-gpt-ad-1691912455953-0' style='min-width: 728px; min-height: 90px; text-align: center; margin-top: 20px; margin-bottom: 20px;'>
  <script>
    setTimeout(() => {
		googletag.cmd.push(function() { googletag.display('div-gpt-ad-1691912455953-0'); });
    }, "2000");
  </script>
</div>
-->




<script> 



        var counterxx = 10;
	function rewritebutton (xx) {

		document.getElementById("talpa-splash-button").style.fontSize = "70px";
        	document.getElementById("talpa-splash-button").innerHTML = "Booting in " + xx + " secs";
        	if ( counterxx > 0 )
        	{
                   setTimeout(() => {
                        counterxx = counterxx - 1;
                        rewritebutton (counterxx);
                   }, "1000");
        	}
        	else {
                    document.getElementById("talpa-splash-button").innerHTML = "Start emulator";
                    document.getElementById("talpa-splash-button").style.fontSize = "40px;"
                    document.getElementById("talpa-splash-button").disabled = false;
         	}
	}




	function opengamex() { 
     		document.getElementById('allx').style.display = 'block'; 
		$(window).scrollTop(0); 
		//opengameads(); 

		return false; 
	} 
</script>



		</div>
	</div>
</div>







</div>




		    </div>
        	</div>
	      </div>







	    </div>
              
            <div id="rightbox" style="text-align: center; ">

<div id="rightbox2">


</div>


            </div>


<style>
.button-71 {
  background-color: #e8a50d;
  color: #fff !important;
  border: 0;
  border-radius: 56px;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: system-ui,-apple-system,system-ui,"Segoe UI",Roboto,Ubuntu,"Helvetica Neue",sans-serif;
  font-size: 18px;
  font-weight: 600;
  outline: 0;
  padding: 16px 21px;
  position: relative;
  text-align: center;
  text-decoration: none;
  transition: all .3s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}
.button-71:before {
  background-color: initial;
  background-image: linear-gradient(#fff 0, rgba(255, 255, 255, 0) 100%);
  border-radius: 125px;
  content: "";
  height: 50%;
  left: 4%;
  opacity: .5;
  position: absolute;
  top: 0;
  transition: all .3s;
  width: 92%;
}
.button-71:hover {
  box-shadow: rgba(255, 255, 255, .2) 0 3px 15px inset, rgba(0, 0, 0, .1) 0 3px 5px, rgba(0, 0, 0, .1) 0 10px 13px;
  transform: scale(1.05);
}


@media (min-width: 1680px) {
  .button-71 {
    padding: 16px 48px;
    width: 70%;
    margin-left: 20px;
  }
}
@media (min-width: 1280px) and (max-width: 1679px) {
  .button-71 {
    padding: 16px 8px;
    width: 70%;
    margin-left: 20px;
  }

}
@media (max-width: 1279px) {
  .button-71 {
    padding: 0px;
    width: 70%;
    margin-left: 20px;
  }
}


#talpa-splash-button {
     padding-top: 10px;
}


</style>



	</div>

        
        
    </div>














  <div id="status">
  </div>


    <div id="console">
    </div>



</div>






<div style="width: 100%; text-align: center; margin: auto; background: #fff;">

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8556862515989191"
     crossorigin="anonymous"></script>
<!-- myandroid_1100_300_middle -->
<ins class="adsbygoogle"
     style="display:inline-block;width:1100px;height:300px"
     data-ad-client="ca-pub-8556862515989191"
     data-ad-slot="3241093938"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>


</div>




 <!-- //MAIN CONTAINER -->





						</div>
				</div>
					</div>
		</div>
							</div>
		</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-3198bf71 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3198bf71" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
						<div class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3d50179" data-id="3d50179" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
				<section class="elementor-section elementor-inner-section elementor-element elementor-element-195a1111 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="195a1111" data-element_type="section">


				<div id="tutorx" style="color: #000000;
    font-size: 16px;
    font-weight: 300;
    line-height: 1.8em;" >

<p>It is a pleasure for us that you run MyAndroid, the solution that allows you to run Window games and apps online with Wine online. Note that you are going to use free resources so if we detect that you run Wine but you perform no action during more than 5 minutes, we free your session for another user.</p>

<strong><h2 style="text-align: center; ">How to use MyAndroid</h2></strong>


<p>
MyAndroid operations for the end users is very easy. MyAndroid provides multiple Wine online alternatives.  You only need to choose one of them and click its icon.
You will have to wait a few seconds for us to be assigned a Wine instance online. 
It is a free emulation platform that does not even ask you to be registered in it. Therefore, once we have opted for a Wine Windows online, after 25 seconds you can work with it.
</p>

<p>
Keep in mind that these Wine already have some of the classic applications installed so you can start working with them if you wish: Windows explorer, CMD, Notepad, ...
</p>

<p>Moreover, you must take into account that in order to interact with files, you have two alternatives to upload and download them:</p>
<p>- You can load or save your whole Operative System as an image file in Google Drive.</p>
<p>- You can upload some files to the main folder of the Wine that we have opened, or download files to the local PC from this simulation with a file manager MyAndroid provides.</p>

<p>Finally note that MyAndroid destroys the open session if it detects that you have accumulated five minutes of inactivity.</p>

</div>



		</section>
					</div>
		</div>
							</div>
		</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-5364eb9 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5364eb9" data-element_type="section">
						<div class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-daf2a8c" data-id="daf2a8c" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-a8d852c elementor-widget elementor-widget-shortcode" data-id="a8d852c" data-element_type="widget" data-widget_type="shortcode.default">
				<div class="elementor-widget-container">
					<div class="elementor-shortcode">		<div data-elementor-type="wp-post" data-elementor-id="845" class="elementor elementor-845">
									<section class="elementor-section elementor-top-section elementor-element elementor-element-62e70bd3 superfooter elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="62e70bd3" data-element_type="section" id="superfooter" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
						<div class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-1ed2b163" data-id="1ed2b163" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-1e2780e7 elementor-widget elementor-widget-elementskit-heading" data-id="1e2780e7" data-element_type="widget" data-widget_type="elementskit-heading.default">
				<div class="elementor-widget-container">
			<div class="ekit-wid-con" ><div class="ekit-heading elementskit-section-title-wraper text_left   ekit_heading_tablet-   ekit_heading_mobile-text_center"><p class="ekit-heading--title elementskit-section-title ">©2024. MyAndroid. All Rights Reserved.</p></div></div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-da0c5f9" data-id="da0c5f9" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-42fe644 elementor-widget elementor-widget-text-editor" data-id="42fe644" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
							<p>By OffiDocs Group OU &#8211; Registry code: 1609791 -VAT number: EE102345621.</p>						</div>
				</div>
					</div>
		</div>
							</div>
		</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-14258d0 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="14258d0" data-element_type="section">
						<div class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-6cdc0a1" data-id="6cdc0a1" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-d8562a0 socialsx elementor-widget elementor-widget-elementskit-social-media" data-id="d8562a0" data-element_type="widget" id="socialsx" data-widget_type="elementskit-social-media.default">
				<div class="elementor-widget-container">
			<div class="ekit-wid-con" >			 <ul class="ekit_social_media">
														<li class="elementor-repeater-item-da8f4de">
					    <a
						href="https://www.facebook.com/megadisk.net" aria-label="Facebook" class="" >
														
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="800px" width="800px" id="Layer_1" viewBox="0 0 408.788 408.788" xml:space="preserve"><path style="fill:#475993;" d="M353.701,0H55.087C24.665,0,0.002,24.662,0.002,55.085v298.616c0,30.423,24.662,55.085,55.085,55.085 h147.275l0.251-146.078h-37.951c-4.932,0-8.935-3.988-8.954-8.92l-0.182-47.087c-0.019-4.959,3.996-8.989,8.955-8.989h37.882 v-45.498c0-52.8,32.247-81.55,79.348-81.55h38.65c4.945,0,8.955,4.009,8.955,8.955v39.704c0,4.944-4.007,8.952-8.95,8.955 l-23.719,0.011c-25.615,0-30.575,12.172-30.575,30.035v39.389h56.285c5.363,0,9.524,4.683,8.892,10.009l-5.581,47.087 c-0.534,4.506-4.355,7.901-8.892,7.901h-50.453l-0.251,146.078h87.631c30.422,0,55.084-24.662,55.084-55.084V55.085 C408.786,24.662,384.124,0,353.701,0z"></path></svg>									
                                                                                                            </a>
                    </li>
                    														<li class="elementor-repeater-item-1399011">
					    <a
						href="https://twitter.com/Megadiskglobal" aria-label="Twitter" class="" >
														
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="800px" width="800px" id="Layer_1" viewBox="0 0 410.155 410.155" xml:space="preserve"><path style="fill:#76A9EA;" d="M403.632,74.18c-9.113,4.041-18.573,7.229-28.28,9.537c10.696-10.164,18.738-22.877,23.275-37.067 l0,0c1.295-4.051-3.105-7.554-6.763-5.385l0,0c-13.504,8.01-28.05,14.019-43.235,17.862c-0.881,0.223-1.79,0.336-2.702,0.336 c-2.766,0-5.455-1.027-7.57-2.891c-16.156-14.239-36.935-22.081-58.508-22.081c-9.335,0-18.76,1.455-28.014,4.325 c-28.672,8.893-50.795,32.544-57.736,61.724c-2.604,10.945-3.309,21.9-2.097,32.56c0.139,1.225-0.44,2.08-0.797,2.481 c-0.627,0.703-1.516,1.106-2.439,1.106c-0.103,0-0.209-0.005-0.314-0.015c-62.762-5.831-119.358-36.068-159.363-85.14l0,0 c-2.04-2.503-5.952-2.196-7.578,0.593l0,0C13.677,65.565,9.537,80.937,9.537,96.579c0,23.972,9.631,46.563,26.36,63.032 c-7.035-1.668-13.844-4.295-20.169-7.808l0,0c-3.06-1.7-6.825,0.485-6.868,3.985l0,0c-0.438,35.612,20.412,67.3,51.646,81.569 c-0.629,0.015-1.258,0.022-1.888,0.022c-4.951,0-9.964-0.478-14.898-1.421l0,0c-3.446-0.658-6.341,2.611-5.271,5.952l0,0 c10.138,31.651,37.39,54.981,70.002,60.278c-27.066,18.169-58.585,27.753-91.39,27.753l-10.227-0.006 c-3.151,0-5.816,2.054-6.619,5.106c-0.791,3.006,0.666,6.177,3.353,7.74c36.966,21.513,79.131,32.883,121.955,32.883 c37.485,0,72.549-7.439,104.219-22.109c29.033-13.449,54.689-32.674,76.255-57.141c20.09-22.792,35.8-49.103,46.692-78.201 c10.383-27.737,15.871-57.333,15.871-85.589v-1.346c-0.001-4.537,2.051-8.806,5.631-11.712c13.585-11.03,25.415-24.014,35.16-38.591 l0,0C411.924,77.126,407.866,72.302,403.632,74.18L403.632,74.18z"></path></svg>									
                                                                                                            </a>
                    </li>
                    														<li class="elementor-repeater-item-a13e76c">
					    <a
						href="https://www.linkedin.com/company/megadisk/" aria-label="LinkedIn" class="" >
														
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="800px" width="800px" id="Layer_1" viewBox="0 0 382 382" xml:space="preserve"><path style="fill:#0077B7;" d="M347.445,0H34.555C15.471,0,0,15.471,0,34.555v312.889C0,366.529,15.471,382,34.555,382h312.889 C366.529,382,382,366.529,382,347.444V34.555C382,15.471,366.529,0,347.445,0z M118.207,329.844c0,5.554-4.502,10.056-10.056,10.056 H65.345c-5.554,0-10.056-4.502-10.056-10.056V150.403c0-5.554,4.502-10.056,10.056-10.056h42.806 c5.554,0,10.056,4.502,10.056,10.056V329.844z M86.748,123.432c-22.459,0-40.666-18.207-40.666-40.666S64.289,42.1,86.748,42.1 s40.666,18.207,40.666,40.666S109.208,123.432,86.748,123.432z M341.91,330.654c0,5.106-4.14,9.246-9.246,9.246H286.73 c-5.106,0-9.246-4.14-9.246-9.246v-84.168c0-12.556,3.683-55.021-32.813-55.021c-28.309,0-34.051,29.066-35.204,42.11v97.079 c0,5.106-4.139,9.246-9.246,9.246h-44.426c-5.106,0-9.246-4.14-9.246-9.246V149.593c0-5.106,4.14-9.246,9.246-9.246h44.426 c5.106,0,9.246,4.14,9.246,9.246v15.655c10.497-15.753,26.097-27.912,59.312-27.912c73.552,0,73.131,68.716,73.131,106.472 L341.91,330.654L341.91,330.654z"></path></svg>									
                                                                                                            </a>
                    </li>
                    														<li class="elementor-repeater-item-c8596be">
					    <a
						href="https://www.instagram.com/megadiskglobal/" aria-label="Instagram" class="" >
														
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="800px" width="800px" id="Layer_1" viewBox="0 0 551.034 551.034" xml:space="preserve"><g id="XMLID_13_">			<linearGradient id="XMLID_2_" gradientUnits="userSpaceOnUse" x1="275.517" y1="4.5714" x2="275.517" y2="549.7202" gradientTransform="matrix(1 0 0 -1 0 554)">		<stop offset="0" style="stop-color:#E09B3D"></stop>		<stop offset="0.3" style="stop-color:#C74C4D"></stop>		<stop offset="0.6" style="stop-color:#C21975"></stop>		<stop offset="1" style="stop-color:#7024C4"></stop>	</linearGradient>	<path id="XMLID_17_" style="fill:url(#XMLID_2_);" d="M386.878,0H164.156C73.64,0,0,73.64,0,164.156v222.722  c0,90.516,73.64,164.156,164.156,164.156h222.722c90.516,0,164.156-73.64,164.156-164.156V164.156  C551.033,73.64,477.393,0,386.878,0z M495.6,386.878c0,60.045-48.677,108.722-108.722,108.722H164.156  c-60.045,0-108.722-48.677-108.722-108.722V164.156c0-60.046,48.677-108.722,108.722-108.722h222.722  c60.045,0,108.722,48.676,108.722,108.722L495.6,386.878L495.6,386.878z"></path>			<linearGradient id="XMLID_3_" gradientUnits="userSpaceOnUse" x1="275.517" y1="4.5714" x2="275.517" y2="549.7202" gradientTransform="matrix(1 0 0 -1 0 554)">		<stop offset="0" style="stop-color:#E09B3D"></stop>		<stop offset="0.3" style="stop-color:#C74C4D"></stop>		<stop offset="0.6" style="stop-color:#C21975"></stop>		<stop offset="1" style="stop-color:#7024C4"></stop>	</linearGradient>	<path id="XMLID_81_" style="fill:url(#XMLID_3_);" d="M275.517,133C196.933,133,133,196.933,133,275.516  s63.933,142.517,142.517,142.517S418.034,354.1,418.034,275.516S354.101,133,275.517,133z M275.517,362.6  c-48.095,0-87.083-38.988-87.083-87.083s38.989-87.083,87.083-87.083c48.095,0,87.083,38.988,87.083,87.083  C362.6,323.611,323.611,362.6,275.517,362.6z"></path>			<linearGradient id="XMLID_4_" gradientUnits="userSpaceOnUse" x1="418.306" y1="4.5714" x2="418.306" y2="549.7202" gradientTransform="matrix(1 0 0 -1 0 554)">		<stop offset="0" style="stop-color:#E09B3D"></stop>		<stop offset="0.3" style="stop-color:#C74C4D"></stop>		<stop offset="0.6" style="stop-color:#C21975"></stop>		<stop offset="1" style="stop-color:#7024C4"></stop>	</linearGradient>	<circle id="XMLID_83_" style="fill:url(#XMLID_4_);" cx="418.306" cy="134.072" r="34.149"></circle></g></svg>									
                                                                                                            </a>
                    </li>
                    														<li class="elementor-repeater-item-ee5754f">
					    <a
						href="https://www.reddit.com/user/megadiskglobal" aria-label="Reddit" class="" >
														
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="800px" width="800px" id="Layer_1" viewBox="0 0 429.709 429.709" xml:space="preserve"><g>	<path style="fill:#181A1C;" d="M429.709,196.618c0-29.803-24.16-53.962-53.963-53.962c-14.926,0-28.41,6.085-38.176,15.881  c-30.177-19.463-68.73-31.866-111.072-33.801c0.026-17.978,8.078-34.737,22.104-45.989c14.051-11.271,32.198-15.492,49.775-11.588  l2.414,0.536c-0.024,0.605-0.091,1.198-0.091,1.809c0,24.878,20.168,45.046,45.046,45.046s45.046-20.168,45.046-45.046  c0-24.879-20.168-45.046-45.046-45.046c-15.997,0-30.01,8.362-38.002,20.929l-4.317-0.959c-24.51-5.446-49.807,0.442-69.395,16.156  c-19.564,15.695-30.792,39.074-30.818,64.152c-42.332,1.934-80.878,14.331-111.052,33.785c-9.767-9.798-23.271-15.866-38.2-15.866  C24.16,142.656,0,166.815,0,196.618c0,20.765,11.75,38.755,28.946,47.776c-1.306,6.68-1.993,13.51-1.993,20.462  c0,77.538,84.126,140.395,187.901,140.395s187.901-62.857,187.901-140.395c0-6.948-0.687-13.775-1.991-20.452  C417.961,235.381,429.709,217.385,429.709,196.618z M345.746,47.743c12,0,21.762,9.762,21.762,21.762  c0,11.999-9.762,21.761-21.762,21.761s-21.762-9.762-21.762-21.761C323.984,57.505,333.747,47.743,345.746,47.743z M23.284,196.618  c0-16.916,13.762-30.678,30.678-30.678c7.245,0,13.895,2.538,19.142,6.758c-16.412,14.08-29.118,30.631-37.007,48.804  C28.349,215.937,23.284,206.868,23.284,196.618z M333.784,345.477c-31.492,23.53-73.729,36.489-118.929,36.489  s-87.437-12.959-118.929-36.489c-29.462-22.013-45.688-50.645-45.688-80.621c0-29.977,16.226-58.609,45.688-80.622  c31.492-23.53,73.729-36.489,118.929-36.489s87.437,12.959,118.929,36.489c29.462,22.013,45.688,50.645,45.688,80.622  C379.471,294.832,363.246,323.464,333.784,345.477z M393.605,221.488c-7.891-18.17-20.596-34.716-37.005-48.794  c5.247-4.22,11.901-6.754,19.147-6.754c16.916,0,30.678,13.762,30.678,30.678C406.424,206.867,401.353,215.925,393.605,221.488z"></path>	<circle style="fill:#D80000;" cx="146.224" cy="232.074" r="24.57"></circle>	<circle style="fill:#D80000;" cx="283.484" cy="232.074" r="24.57"></circle>	<path style="fill:#181A1C;" d="M273.079,291.773c-17.32,15.78-39.773,24.47-63.224,24.47c-26.332,0-50.729-10.612-68.696-29.881  c-4.384-4.704-11.751-4.96-16.454-0.575c-4.703,4.384-4.96,11.752-0.575,16.454c22.095,23.695,53.341,37.285,85.726,37.285  c29.266,0,57.288-10.847,78.905-30.543c4.752-4.33,5.096-11.694,0.765-16.446C285.197,287.788,277.838,287.44,273.079,291.773z"></path></g></svg>									
                                                                                                            </a>
                    </li>
                    							</ul>
		</div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-36989ee" data-id="36989ee" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<section class="elementor-section elementor-inner-section elementor-element elementor-element-6fe025d9 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="6fe025d9" data-element_type="section">
						<div class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-51663ab7" data-id="51663ab7" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-bdbd1ac elementor-widget elementor-widget-text-editor" data-id="bdbd1ac" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
							<div style="height: 30px; font-size: 16px; padding: 0px;"><a href="/terms-of-service/" aria-label="Read more about Megadisk terms of service">Terms of Service</a></div><div style="height: 30px; font-size: 16px; padding: 0px;"><a href="/privacy-policy/" aria-label="Read more about Megadisk Privacy policy">Privacy policy</a></div>						</div>
				</div>
					</div>
		</div>
							</div>
		</section>
					</div>
		</div>
							</div>
		</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-380c1cb elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="380c1cb" data-element_type="section">
						<div class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-ca35c0f" data-id="ca35c0f" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-ffdca3a elementor-widget elementor-widget-html" data-id="ffdca3a" data-element_type="widget" data-widget_type="html.default">
				<div class="elementor-widget-container">
			<style>
    
.socialsx {
    display: none;
}

.menu-link {
    font-size: 18px;
    color: #1E6937;
}

footer {
    display: none;
}
    
</style>
<script defer src="/postscribe.min.js"></script>

<script>
function lazyScript(c,e){var n=document.createElement("script");n.async=!0,e&&(n.onload=e),document.head.appendChild(n),n.src=c}
function lazyScriptwithId(id,c,e){var n=document.createElement("script");n.setAttribute('id', id);n.async=true,e&&(n.onload=e),document.head.appendChild(n),n.src=c}


setTimeout(function () {
    var lazyLoad = false;
    function onLazyLoad() {
        if(lazyLoad === true) return;
        lazyLoad = true;
        document.removeEventListener('scroll', onLazyLoad);
        document.removeEventListener('mousemove', onLazyLoad);
        document.removeEventListener('mousedown', onLazyLoad);
        document.removeEventListener('touchstart', onLazyLoad);


        //lazyScript("//www.googletagmanager.com/gtag/js?id=G-MZ2422LXXG");
        //var i0 = '<script> ' +  "   window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-MZ2422LXXG'); " + '<\/script>';
        //postscribe(document.head, i0);
        
    }
    document.addEventListener("scroll", onLazyLoad);
    document.addEventListener("mousemove", onLazyLoad);
    document.addEventListener("mousedown", onLazyLoad);
    document.addEventListener("touchstart", onLazyLoad);
    document.addEventListener("load", function () {
                document.body.clientHeight != document.documentElement.clientHeight && 0 == document.documentElement.scrollTop && 0 == document.body.scrollTop || onLazyLoad();
        }
     );
  }, 300);
  
  
  
  </script>
        
        
        
        		</div>
				</div>
					</div>
		</div>
							</div>
		</section>
							</div>
		</div>
				</div>
				</div>
					</div>
		</div>
							</div>
		</section>
							</div>
		
	
	
</div><!-- .entry-content .clear -->

	
	
</article><!-- #post-## -->

			</main><!-- #main -->
			
		
	</div><!-- #primary -->


	</div> <!-- ast-container -->
	</div><!-- #content -->
<footer
class="site-footer" id="colophon" itemtype="https://schema.org/WPFooter" itemscope="itemscope" itemid="#colophon">
			<div class="site-below-footer-wrap ast-builder-grid-row-container site-footer-focus-item ast-builder-grid-row-full ast-builder-grid-row-tablet-full ast-builder-grid-row-mobile-full ast-footer-row-stack ast-footer-row-tablet-stack ast-footer-row-mobile-stack" data-section="section-below-footer-builder">
	<div class="ast-builder-grid-row-container-inner">
					<div class="ast-builder-footer-grid-columns site-below-footer-inner-wrap ast-builder-grid-row">
											<div class="site-footer-below-section-1 site-footer-section site-footer-section-1">
								<div class="ast-builder-layout-element ast-flex site-footer-focus-item ast-footer-copyright" data-section="section-footer-builder">
				<div class="ast-footer-copyright"><p>Copyright &copy; 2024 MyAndroid | Powered by <a href="https://wpastra.com/" rel="nofollow noopener" target="_blank">Astra WordPress Theme</a></p>
</div>			</div>
						</div>
										</div>
			</div>

</div>
	</footer><!-- #colophon -->
	</div><!-- #page -->
<link rel='stylesheet' id='elementor-post-845-css' href='https://www.myandroid.org/wp-content/uploads/elementor/css/post-845.css?ver=1704504653' media='all' />
<style id='core-block-supports-inline-css'>
/**
 * Core styles: block-supports
 */

</style>
<script id='astra-theme-js-js-extra'>
var astra = {"break_point":"921","isRtl":"","is_scroll_to_id":"","is_scroll_to_top":"","is_header_footer_builder_active":"1"};
</script>
<script src='https://www.myandroid.org/wp-content/themes/astra/assets/js/unminified/frontend.js?ver=4.1.6' id='astra-theme-js-js'></script>
<script src='https://www.myandroid.org/wp-content/plugins/elementskit-lite/libs/framework/assets/js/frontend-script.js?ver=2.9.0' id='elementskit-framework-js-frontend-js'></script>
<script id='elementskit-framework-js-frontend-js-after'>
		var elementskit = {
			resturl: 'https://www.myandroid.org/wp-json/elementskit/v1/',
		}

		
</script>
<script src='https://www.myandroid.org/wp-content/plugins/elementskit-lite/widgets/init/assets/js/widget-scripts.js?ver=2.9.0' id='ekit-widget-scripts-js'></script>
<script id='eael-general-js-extra'>
var localize = {"ajaxurl":"https:\/\/www.myandroid.org\/wp-admin\/admin-ajax.php","nonce":"1cb9c9f2bc","i18n":{"added":"Added ","compare":"Compare","loading":"Loading..."},"eael_translate_text":{"required_text":"is a required field","invalid_text":"Invalid","billing_text":"Billing","shipping_text":"Shipping","fg_mfp_counter_text":"of"},"page_permalink":"https:\/\/www.myandroid.org\/about-us\/","cart_redirectition":"","cart_page_url":"","el_breakpoints":{"mobile":{"label":"Mobile Portrait","value":767,"default_value":767,"direction":"max","is_enabled":true},"mobile_extra":{"label":"Mobile Landscape","value":880,"default_value":880,"direction":"max","is_enabled":false},"tablet":{"label":"Tablet Portrait","value":1024,"default_value":1024,"direction":"max","is_enabled":true},"tablet_extra":{"label":"Tablet Landscape","value":1200,"default_value":1200,"direction":"max","is_enabled":false},"laptop":{"label":"Laptop","value":1366,"default_value":1366,"direction":"max","is_enabled":false},"widescreen":{"label":"Widescreen","value":2400,"default_value":2400,"direction":"min","is_enabled":false}}};
</script>
<script src='https://www.myandroid.org/wp-content/plugins/essential-addons-for-elementor-lite/assets/front-end/js/view/general.min.js?ver=5.8.4' id='eael-general-js'></script>
<script src='https://www.myandroid.org/wp-content/plugins/elementor/assets/js/webpack.runtime.js?ver=3.14.1' id='elementor-webpack-runtime-js'></script>
<script src='https://www.myandroid.org/wp-content/plugins/elementor/assets/js/frontend-modules.js?ver=3.14.1' id='elementor-frontend-modules-js'></script>
<script src='https://www.myandroid.org/wp-content/plugins/elementor/assets/lib/waypoints/waypoints.js?ver=4.0.2' id='elementor-waypoints-js'></script>
<script src='https://www.myandroid.org/wp-includes/js/jquery/ui/core.js?ver=1.13.2' id='jquery-ui-core-js'></script>
<script id='elementor-frontend-js-before'>
var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false,"isScriptDebug":true},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close","a11yCarouselWrapperAriaLabel":"Carousel | Horizontal scrolling: Arrow Left & Right","a11yCarouselPrevSlideMessage":"Previous slide","a11yCarouselNextSlideMessage":"Next slide","a11yCarouselFirstSlideMessage":"This is the first slide","a11yCarouselLastSlideMessage":"This is the last slide","a11yCarouselPaginationBulletMessage":"Go to slide"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"responsive":{"breakpoints":{"mobile":{"label":"Mobile Portrait","value":767,"default_value":767,"direction":"max","is_enabled":true},"mobile_extra":{"label":"Mobile Landscape","value":880,"default_value":880,"direction":"max","is_enabled":false},"tablet":{"label":"Tablet Portrait","value":1024,"default_value":1024,"direction":"max","is_enabled":true},"tablet_extra":{"label":"Tablet Landscape","value":1200,"default_value":1200,"direction":"max","is_enabled":false},"laptop":{"label":"Laptop","value":1366,"default_value":1366,"direction":"max","is_enabled":false},"widescreen":{"label":"Widescreen","value":2400,"default_value":2400,"direction":"min","is_enabled":false}}},"version":"3.14.1","is_static":false,"experimentalFeatures":{"e_dom_optimization":true,"e_optimized_assets_loading":true,"a11y_improvements":true,"additional_custom_breakpoints":true,"landing-pages":true},"urls":{"assets":"https:\/\/www.myandroid.org\/wp-content\/plugins\/elementor\/assets\/"},"swiperClass":"swiper-container","settings":{"page":[],"editorPreferences":[]},"kit":{"active_breakpoints":["viewport_mobile","viewport_tablet"],"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":540,"title":"About%20Us%20%E2%80%93%20MyAndroid","excerpt":"","featuredImage":false}};
</script>
<script src='https://www.myandroid.org/wp-content/plugins/elementor/assets/js/frontend.js?ver=3.14.1' id='elementor-frontend-js'></script>
<script src='https://www.myandroid.org/wp-content/plugins/elementskit-lite/widgets/init/assets/js/animate-circle.min.js?ver=2.9.0' id='animate-circle-js'></script>
<script id='elementskit-elementor-js-extra'>
var ekit_config = {"ajaxurl":"https:\/\/www.myandroid.org\/wp-admin\/admin-ajax.php","nonce":"aa96d8a492"};
</script>
<script src='https://www.myandroid.org/wp-content/plugins/elementskit-lite/widgets/init/assets/js/elementor.js?ver=2.9.0' id='elementskit-elementor-js'></script>
			<script>
			/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
			</script>



<script>

    document.getElementById("middlebox").addEventListener("click", function() {
        event.stopPropagation();
    });

    fetch('https://www.myandroid.org/app/ip-acl.php')
      .then(response => response.text())
      .then(data => {
         if (data.includes('REDIRECT')) {
		document.getElementById('click-shop-icon').src = 'https://upload.wikimedia.org/wikipedia/commons/6/62/Amazon.com-Logo.svg';
	        document.getElementById('ja-container-uptoplay').addEventListener('click', function() { window.open('https://www.myandroid.org/app/search-index.php?url=68747470733a2f2f7777772e6f666669646f63732e636f6d2f6d656469612f73797374656d2f6e6f74696669636174696f6e732f72656469726563742e706870'); });
		document.getElementById('amazon-icon').addEventListener('click', function() {           window.open('https://www.myandroid.org/app/search-index.php?url=68747470733a2f2f7777772e6f666669646f63732e636f6d2f6d656469612f73797374656d2f6e6f74696669636174696f6e732f72656469726563742e706870'); });
		document.getElementById('click-shop-icon').style.maxHeight = '30px';
		document.getElementById('amazon-icon').style.background = "#ffffff";
                document.getElementById('amazon-icon').style.cursor = 'pointer';
		document.getElementById('amazon-icon').style.boxShadow = '0px 4px 6px rgba(0, 0, 0, 0.1)';
		document.getElementById('amazon-icon').style.borderRadius = '5px';
         }  
	 else if (data.includes('EBAY')) {
		document.getElementById('click-shop-icon').src = 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/EBay_logo.svg/300px-EBay_logo.svg.png';
		document.getElementById('ja-container-uptoplay').addEventListener('click', function() { window.open('https://www.myandroid.org/app/search-index.php?url=68747470733a2f2f7777772e6f666669646f63732e636f6d2f6d656469612f73797374656d2f656261792d7077612f676f2e706870'); });
                document.getElementById('amazon-icon').addEventListener('click', function() {           window.open('https://www.myandroid.org/app/search-index.php?url=68747470733a2f2f7777772e6f666669646f63732e636f6d2f6d656469612f73797374656d2f656261792d7077612f676f2e706870'); });
		document.getElementById('click-shop-icon').style.maxHeight = '40px';
		document.getElementById('click-shop-icon').style.marginTop = '0';
		document.getElementById('amazon-icon').style.background = "#ffffff";
                document.getElementById('amazon-icon').style.cursor = 'pointer';
                document.getElementById('amazon-icon').style.boxShadow = '0px 4px 6px rgba(0, 0, 0, 0.1)';
                document.getElementById('amazon-icon').style.borderRadius = '5px';
         }
         else if (data.includes('ALIEXPRESS')) {
		document.getElementById('click-shop-icon').src = 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3b/Aliexpress_logo.svg/204px-Aliexpress_logo.svg.png';
		document.getElementById('ja-container-uptoplay').addEventListener('click', function() { window.open('https://www.myandroid.org/app/search-index.php?url=68747470733a2f2f7777772e6f666669646f63732e636f6d2f6d656469612f73797374656d2f616c69657870726573732d7077612f676f2e706870'); });
		document.getElementById('amazon-icon').addEventListener('click', function() {           window.open('https://www.myandroid.org/app/search-index.php?url=68747470733a2f2f7777772e6f666669646f63732e636f6d2f6d656469612f73797374656d2f616c69657870726573732d7077612f676f2e706870'); });
		document.getElementById('click-shop-icon').style.maxHeight = '40px';
                document.getElementById('click-shop-icon').style.marginTop = '0';
		document.getElementById('amazon-icon').style.background = "#ffffff";
                document.getElementById('amazon-icon').style.cursor = 'pointer';
                document.getElementById('amazon-icon').style.boxShadow = '0px 4px 6px rgba(0, 0, 0, 0.1)';
                document.getElementById('amazon-icon').style.borderRadius = '5px';
         }
	 else if (data.includes('SEARCH')) {
                document.getElementById('click-shop-icon').src = 'https://search.offidocs.com/gosearch_mini.png?v=2';
		document.getElementById('ja-container-uptoplay').addEventListener('click', function() { window.open('https://www.myandroid.org/app/search-index.php?url=68747470733a2f2f7365617263682e6f666669646f63732e636f6d3f713d626573742b667265652b6f6666657273'); });
                document.getElementById('amazon-icon').addEventListener('click', function() {           window.open('https://www.myandroid.org/app/search-index.php?url=68747470733a2f2f7365617263682e6f666669646f63732e636f6d3f713d626573742b667265652b6f6666657273'); });
		document.getElementById('click-shop-icon').style.maxHeight = '50px';
                document.getElementById('click-shop-icon').style.marginTop = '0';
		document.getElementById('amazon-icon').style.background = "#ffffff";
		document.getElementById('amazon-icon').style.cursor = 'pointer';
		document.getElementById('amazon-icon').style.boxShadow = '0px 4px 6px rgba(0, 0, 0, 0.1)';
                document.getElementById('amazon-icon').style.borderRadius = '5px';
         }
	 else {
		document.getElementById('click-shop-icon').src = 'https://upload.wikimedia.org/wikipedia/commons/6/62/Amazon.com-Logo.svg';
		//document.getElementById('ja-container-uptoplay').addEventListener('click', function() { window.open('https://www.offidocs.com/media/system/notifications/redirect.php'); });
                document.getElementById('amazon-icon').addEventListener('click', function() {           window.open('https://www.myandroid.org/app/search-index.php?url=68747470733a2f2f7777772e6f666669646f63732e636f6d2f6d656469612f73797374656d2f6e6f74696669636174696f6e732f72656469726563742e706870'); });
		document.getElementById('click-shop-icon').style.maxHeight = '30px';
		
	 }
       })
       .catch(error => console.error('Error fetching the URL:', error));
    

</script>


				</body>
</html>


