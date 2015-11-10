<?php

require_once dirname( __FILE__ ) . '/font.php';

/**
 * Font Awesome
 *
 * @package Icon_Picker
 * @author  Dzikri Aziz <kvcrvt@gmail.com>
 */
class Icon_Picker_Type_Font_Awesome extends Icon_Picker_Type_Font {

	/**
	 * Icon type ID
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $id = 'fa';

	/**
	 * Icon type name
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $name = 'Font Awesome';

	/**
	 * Icon type version
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $version = '4.4.0';

	/**
	 * Stylesheet ID
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $stylesheet_id = 'font-awesome';


	/**
	 * Get icon groups
	 *
	 * @since  0.1.0
	 * @return array
	 */
	public function get_groups() {
		$groups = array(
			array(
				'id'   => 'brand',
				'name' => __( 'Brand', 'menu-icons' ),
			),
			array(
				'id'   => 'chart',
				'name' => __( 'Charts', 'menu-icons' ),
			),
			array(
				'id'   => 'currency',
				'name' => __( 'Currency', 'menu-icons' ),
			),
			array(
				'id'   => 'directional',
				'name' => __( 'Directional', 'menu-icons' ),
			),
			array(
				'id'   => 'file-types',
				'name' => __( 'File Types', 'menu-icons' ),
			),
			array(
				'id'   => 'form-control',
				'name' => __( 'Form Controls', 'menu-icons' ),
			),
			array(
				'id'   => 'gender',
				'name' => __( 'Genders', 'menu-icons' ),
			),
			array(
				'id'   => 'medical',
				'name' => __( 'Medical', 'menu-icons' ),
			),
			array(
				'id'   => 'payment',
				'name' => __( 'Payment', 'menu-icons' ),
			),
			array(
				'id'   => 'spinner',
				'name' => __( 'Spinners', 'menu-icons' ),
			),
			array(
				'id'   => 'transportation',
				'name' => __( 'Transportation', 'menu-icons' ),
			),
			array(
				'id'   => 'text-editor',
				'name' => __( 'Text Editor', 'menu-icons' ),
			),
			array(
				'id'   => 'video-player',
				'name' => __( 'Video Player', 'menu-icons' ),
			),
			array(
				'id'   => 'web-application',
				'name' => __( 'Web Application', 'menu-icons' ),
			),
		);

		/**
		 * Filter genericon groups
		 *
		 * @since 0.1.0
		 * @param array $groups Icon groups.
		 */
		$groups = apply_filters( 'icon_picker_fa_groups', $groups );

		return $groups;
	}


	/**
	 * Get icon names
	 *
	 * @since  0.1.0
	 * @return array
	 */
	public function get_items() {
		$items = array(
			array(
				'group' => 'brand',
				'id'    => 'fa-500px',
				'name'  => '500px',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-adn',
				'name'  => 'ADN',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-amazon',
				'name'  => 'Amazon',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-android',
				'name'  => 'Android',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-angellist',
				'name'  => 'AngelList',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-apple',
				'name'  => 'Apple',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-black-tie',
				'name'  => 'BlackTie',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-behance',
				'name'  => 'Behance',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-behance-square',
				'name'  => 'Behance',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-bitbucket',
				'name'  => 'Bitbucket',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-bitbucket-square',
				'name'  => 'Bitbucket',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-buysellads',
				'name'  => 'BuySellAds',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-chrome',
				'name'  => 'Chrome',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-codepen',
				'name'  => 'CodePen',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-connectdevelop',
				'name'  => 'Connect + Develop',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-contao',
				'name'  => 'Contao',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-creative-commons',
				'name'  => 'Creative Commons',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-css3',
				'name'  => 'CSS3',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-dashcube',
				'name'  => 'Dashcube',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-delicious',
				'name'  => 'Delicious',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-deviantart',
				'name'  => 'deviantART',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-digg',
				'name'  => 'Digg',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-dribbble',
				'name'  => 'Dribbble',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-dropbox',
				'name'  => 'DropBox',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-drupal',
				'name'  => 'Drupal',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-empire',
				'name'  => 'Empire',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-expeditedssl',
				'name'  => 'ExpeditedSSL',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-facebook-official',
				'name'  => 'Facebook',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-facebook-square',
				'name'  => 'Facebook',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-facebook',
				'name'  => 'Facebook',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-firefox',
				'name'  => 'Firefox',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-flickr',
				'name'  => 'Flickr',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-fonticons',
				'name'  => 'FontIcons',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-forumbee',
				'name'  => 'Forumbee',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-foursquare',
				'name'  => 'Foursquare',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-get-pocket',
				'name'  => 'Pocket',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-git',
				'name'  => 'Git',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-git-square',
				'name'  => 'Git',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-github',
				'name'  => 'GitHub',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-github-alt',
				'name'  => 'GitHub',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-github-square',
				'name'  => 'GitHub',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-gittip',
				'name'  => 'GitTip',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-google',
				'name'  => 'Google',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-google-plus',
				'name'  => 'Google+',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-google-plus-square',
				'name'  => 'Google+',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-hacker-news',
				'name'  => 'Hacker News',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-houzz',
				'name'  => 'Houzz',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-html5',
				'name'  => 'HTML5',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-instagram',
				'name'  => 'Instagram',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-internet-explorer',
				'name'  => 'Internet Explorer',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-ioxhost',
				'name'  => 'IoxHost',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-joomla',
				'name'  => 'Joomla',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-jsfiddle',
				'name'  => 'JSFiddle',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-lastfm',
				'name'  => 'Last.fm',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-lastfm-square',
				'name'  => 'Last.fm',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-leanpub',
				'name'  => 'Leanpub',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-linkedin',
				'name'  => 'LinkedIn',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-linkedin-square',
				'name'  => 'LinkedIn',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-linux',
				'name'  => 'Linux',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-maxcdn',
				'name'  => 'MaxCDN',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-meanpath',
				'name'  => 'meanpath',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-medium',
				'name'  => 'Medium',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-odnoklassniki',
				'name'  => 'Odnoklassniki',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-odnoklassniki-square',
				'name'  => 'Odnoklassniki',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-opencart',
				'name'  => 'OpenCart',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-openid',
				'name'  => 'OpenID',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-opera',
				'name'  => 'Opera',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-optin-monster',
				'name'  => 'OptinMonster',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-pagelines',
				'name'  => 'Pagelines',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-pied-piper',
				'name'  => 'Pied Piper',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-pied-piper-alt',
				'name'  => 'Pied Piper',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-pinterest',
				'name'  => 'Pinterest',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-pinterest-p',
				'name'  => 'Pinterest',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-pinterest-square',
				'name'  => 'Pinterest',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-qq',
				'name'  => 'QQ',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-reddit',
				'name'  => 'reddit',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-reddit-square',
				'name'  => 'reddit',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-renren',
				'name'  => 'Renren',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-safari',
				'name'  => 'Safari',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-sellsy',
				'name'  => 'SELLSY',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-shirtsinbulk',
				'name'  => 'Shirts In Bulk',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-simplybuilt',
				'name'  => 'SimplyBuilt',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-skyatlas',
				'name'  => 'Skyatlas',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-skype',
				'name'  => 'Skype',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-slack',
				'name'  => 'Slack',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-slideshare',
				'name'  => 'SlideShare',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-soundcloud',
				'name'  => 'SoundCloud',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-spotify',
				'name'  => 'Spotify',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-stack-exchange',
				'name'  => 'Stack Exchange',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-stack-overflow',
				'name'  => 'Stack Overflow',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-steam',
				'name'  => 'Steam',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-steam-square',
				'name'  => 'Steam',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-stumbleupon',
				'name'  => 'StumbleUpon',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-stumbleupon-circle',
				'name'  => 'StumbleUpon',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-tencent-weibo',
				'name'  => 'Tencent Weibo',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-trello',
				'name'  => 'Trello',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-tripadvisor',
				'name'  => 'TripAdvisor',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-tumblr',
				'name'  => 'Tumblr',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-tumblr-square',
				'name'  => 'Tumblr',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-twitch',
				'name'  => 'Twitch',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-twitter',
				'name'  => 'Twitter',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-twitter-square',
				'name'  => 'Twitter',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-vimeo',
				'name'  => 'Vimeo',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-vimeo-square',
				'name'  => 'Vimeo',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-viacoin',
				'name'  => 'Viacoin',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-vine',
				'name'  => 'Vine',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-vk',
				'name'  => 'VK',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-weixin',
				'name'  => 'Weixin',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-weibo',
				'name'  => 'Wibo',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-whatsapp',
				'name'  => 'WhatsApp',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-wikipedia-w',
				'name'  => 'Wikipedia',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-windows',
				'name'  => 'Windows',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-wordpress',
				'name'  => 'WordPress',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-xing',
				'name'  => 'Xing',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-xing-square',
				'name'  => 'Xing',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-y-combinator',
				'name'  => 'Y Combinator',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-yahoo',
				'name'  => 'Yahoo!',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-yelp',
				'name'  => 'Yelp',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-youtube',
				'name'  => 'YouTube',
			),
			array(
				'group' => 'brand',
				'id'    => 'fa-youtube-square',
				'name'  => 'YouTube',
			),
			array(
				'group' => 'chart',
				'id'    => 'fa-area-chart',
				'name'  => __( 'Area Chart', 'menu-icons' ),
			),
			array(
				'group' => 'chart',
				'id'    => 'fa-bar-chart-o',
				'name'  => __( 'Bar Chart', 'menu-icons' ),
			),
			array(
				'group' => 'chart',
				'id'    => 'fa-line-chart',
				'name'  => __( 'Line Chart', 'menu-icons' ),
			),
			array(
				'group' => 'chart',
				'id'    => 'fa-pie-chart',
				'name'  => __( 'Pie Chart', 'menu-icons' ),
			),
			array(
				'group' => 'currency',
				'id'    => 'fa-bitcoin',
				'name'  => __( 'Bitcoin', 'menu-icons' ),
			),
			array(
				'group' => 'currency',
				'id'    => 'fa-dollar',
				'name'  => __( 'Dollar', 'menu-icons' ),
			),
			array(
				'group' => 'currency',
				'id'    => 'fa-euro',
				'name'  => __( 'Euro', 'menu-icons' ),
			),
			array(
				'group' => 'currency',
				'id'    => 'fa-gbp',
				'name'  => __( 'GBP', 'menu-icons' ),
			),
			array(
				'group' => 'currency',
				'id'    => 'fa-gg',
				'name'  => __( 'GBP', 'menu-icons' ),
			),
			array(
				'group' => 'currency',
				'id'    => 'fa-gg-circle',
				'name'  => __( 'GG', 'menu-icons' ),
			),
			array(
				'group' => 'currency',
				'id'    => 'fa-ils',
				'name'  => __( 'Israeli Sheqel', 'menu-icons' ),
			),
			array(
				'group' => 'currency',
				'id'    => 'fa-money',
				'name'  => __( 'Money', 'menu-icons' ),
			),
			array(
				'group' => 'currency',
				'id'    => 'fa-rouble',
				'name'  => __( 'Rouble', 'menu-icons' ),
			),
			array(
				'group' => 'currency',
				'id'    => 'fa-inr',
				'name'  => __( 'Rupee', 'menu-icons' ),
			),
			array(
				'group' => 'currency',
				'id'    => 'fa-try',
				'name'  => __( 'Turkish Lira', 'menu-icons' ),
			),
			array(
				'group' => 'currency',
				'id'    => 'fa-krw',
				'name'  => __( 'Won', 'menu-icons' ),
			),
			array(
				'group' => 'currency',
				'id'    => 'fa-jpy',
				'name'  => __( 'Yen', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-angle-down',
				'name'  => __( 'Angle Down', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-angle-left',
				'name'  => __( 'Angle Left', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-angle-right',
				'name'  => __( 'Angle Right', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-angle-up',
				'name'  => __( 'Angle Up', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-angle-double-down',
				'name'  => __( 'Angle Double Down', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-angle-double-left',
				'name'  => __( 'Angle Double Left', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-angle-double-right',
				'name'  => __( 'Angle Double Right', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-angle-double-up',
				'name'  => __( 'Angle Double Up', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-arrow-circle-o-down',
				'name'  => __( 'Arrow Circle Down', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-arrow-circle-o-left',
				'name'  => __( 'Arrow Circle Left', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-arrow-circle-o-right',
				'name'  => __( 'Arrow Circle Right', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-arrow-circle-o-up',
				'name'  => __( 'Arrow Circle Up', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-arrow-circle-down',
				'name'  => __( 'Arrow Circle Down', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-arrow-circle-left',
				'name'  => __( 'Arrow Circle Left', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-arrow-circle-right',
				'name'  => __( 'Arrow Circle Right', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-arrow-circle-up',
				'name'  => __( 'Arrow Circle Up', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-arrow-down',
				'name'  => __( 'Arrow Down', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-arrow-left',
				'name'  => __( 'Arrow Left', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-arrow-right',
				'name'  => __( 'Arrow Right', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-arrow-up',
				'name'  => __( 'Arrow Up', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-arrows',
				'name'  => __( 'Arrows', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-arrows-alt',
				'name'  => __( 'Arrows', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-arrows-h',
				'name'  => __( 'Arrows', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-arrows-v',
				'name'  => __( 'Arrows', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-caret-down',
				'name'  => __( 'Caret Down', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-caret-left',
				'name'  => __( 'Caret Left', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-caret-right',
				'name'  => __( 'Caret Right', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-caret-up',
				'name'  => __( 'Caret Up', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-caret-square-o-down',
				'name'  => __( 'Caret Down', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-caret-square-o-left',
				'name'  => __( 'Caret Left', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-caret-square-o-right',
				'name'  => __( 'Caret Right', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-caret-square-o-up',
				'name'  => __( 'Caret Up', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-chevron-circle-down',
				'name'  => __( 'Chevron Circle Down', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-chevron-circle-left',
				'name'  => __( 'Chevron Circle Left', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-chevron-circle-right',
				'name'  => __( 'Chevron Circle Right', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-chevron-circle-up',
				'name'  => __( 'Chevron Circle Up', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-chevron-down',
				'name'  => __( 'Chevron Down', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-chevron-left',
				'name'  => __( 'Chevron Left', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-chevron-right',
				'name'  => __( 'Chevron Right', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-chevron-up',
				'name'  => __( 'Chevron Up', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-hand-o-down',
				'name'  => __( 'Hand Down', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-hand-o-left',
				'name'  => __( 'Hand Left', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-hand-o-right',
				'name'  => __( 'Hand Right', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-hand-o-up',
				'name'  => __( 'Hand Up', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-long-arrow-down',
				'name'  => __( 'Long Arrow Down', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-long-arrow-left',
				'name'  => __( 'Long Arrow Left', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-long-arrow-right',
				'name'  => __( 'Long Arrow Right', 'menu-icons' ),
			),
			array(
				'group' => 'directional',
				'id'    => 'fa-long-arrow-up',
				'name'  => __( 'Long Arrow Up', 'menu-icons' ),
			),
			array(
				'group' => 'file-types',
				'id'    => 'fa-file',
				'name'  => __( 'File', 'menu-icons' ),
			),
			array(
				'group' => 'file-types',
				'id'    => 'fa-file-o',
				'name'  => __( 'File', 'menu-icons' ),
			),
			array(
				'group' => 'file-types',
				'id'    => 'fa-file-text',
				'name'  => __( 'File: Text', 'menu-icons' ),
			),
			array(
				'group' => 'file-types',
				'id'    => 'fa-file-text-o',
				'name'  => __( 'File: Text', 'menu-icons' ),
			),
			array(
				'group' => 'file-types',
				'id'    => 'fa-file-archive-o',
				'name'  => __( 'File: Archive', 'menu-icons' ),
			),
			array(
				'group' => 'file-types',
				'id'    => 'fa-file-audio-o',
				'name'  => __( 'File: Audio', 'menu-icons' ),
			),
			array(
				'group' => 'file-types',
				'id'    => 'fa-file-code-o',
				'name'  => __( 'File: Code', 'menu-icons' ),
			),
			array(
				'group' => 'file-types',
				'id'    => 'fa-file-excel-o',
				'name'  => __( 'File: Excel', 'menu-icons' ),
			),
			array(
				'group' => 'file-types',
				'id'    => 'fa-file-image-o',
				'name'  => __( 'File: Image', 'menu-icons' ),
			),
			array(
				'group' => 'file-types',
				'id'    => 'fa-file-pdf-o',
				'name'  => __( 'File: PDF', 'menu-icons' ),
			),
			array(
				'group' => 'file-types',
				'id'    => 'fa-file-powerpoint-o',
				'name'  => __( 'File: Powerpoint', 'menu-icons' ),
			),
			array(
				'group' => 'file-types',
				'id'    => 'fa-file-video-o',
				'name'  => __( 'File: Video', 'menu-icons' ),
			),
			array(
				'group' => 'file-types',
				'id'    => 'fa-file-word-o',
				'name'  => __( 'File: Word', 'menu-icons' ),
			),
			array(
				'group' => 'form-control',
				'id'    => 'fa-check-square',
				'name'  => __( 'Check', 'menu-icons' ),
			),
			array(
				'group' => 'form-control',
				'id'    => 'fa-check-square-o',
				'name'  => __( 'Check', 'menu-icons' ),
			),
			array(
				'group' => 'form-control',
				'id'    => 'fa-circle',
				'name'  => __( 'Circle', 'menu-icons' ),
			),
			array(
				'group' => 'form-control',
				'id'    => 'fa-circle-o',
				'name'  => __( 'Circle', 'menu-icons' ),
			),
			array(
				'group' => 'form-control',
				'id'    => 'fa-dot-circle-o',
				'name'  => __( 'Dot', 'menu-icons' ),
			),
			array(
				'group' => 'form-control',
				'id'    => 'fa-minus-square',
				'name'  => __( 'Minus', 'menu-icons' ),
			),
			array(
				'group' => 'form-control',
				'id'    => 'fa-minus-square-o',
				'name'  => __( 'Minus', 'menu-icons' ),
			),
			array(
				'group' => 'form-control',
				'id'    => 'fa-plus-square',
				'name'  => __( 'Plus', 'menu-icons' ),
			),
			array(
				'group' => 'form-control',
				'id'    => 'fa-plus-square-o',
				'name'  => __( 'Plus', 'menu-icons' ),
			),
			array(
				'group' => 'form-control',
				'id'    => 'fa-square',
				'name'  => __( 'Square', 'menu-icons' ),
			),
			array(
				'group' => 'form-control',
				'id'    => 'fa-square-o',
				'name'  => __( 'Square', 'menu-icons' ),
			),
			array(
				'group' => 'gender',
				'id'    => 'fa-genderless',
				'name'  => __( 'Genderless', 'menu-icons' ),
			),
			array(
				'group' => 'gender',
				'id'    => 'fa-mars',
				'name'  => __( 'Mars', 'menu-icons' ),
			),
			array(
				'group' => 'gender',
				'id'    => 'fa-mars-double',
				'name'  => __( 'Mars', 'menu-icons' ),
			),
			array(
				'group' => 'gender',
				'id'    => 'fa-mars-stroke',
				'name'  => __( 'Mars', 'menu-icons' ),
			),
			array(
				'group' => 'gender',
				'id'    => 'fa-mars-stroke-h',
				'name'  => __( 'Mars', 'menu-icons' ),
			),
			array(
				'group' => 'gender',
				'id'    => 'fa-mars-stroke-v',
				'name'  => __( 'Mars', 'menu-icons' ),
			),
			array(
				'group' => 'gender',
				'id'    => 'fa-mercury',
				'name'  => __( 'Mercury', 'menu-icons' ),
			),
			array(
				'group' => 'gender',
				'id'    => 'fa-neuter',
				'name'  => __( 'Neuter', 'menu-icons' ),
			),
			array(
				'group' => 'gender',
				'id'    => 'fa-transgender',
				'name'  => __( 'Transgender', 'menu-icons' ),
			),
			array(
				'group' => 'gender',
				'id'    => 'fa-transgender-alt',
				'name'  => __( 'Transgender', 'menu-icons' ),
			),
			array(
				'group' => 'gender',
				'id'    => 'fa-venus',
				'name'  => __( 'Venus', 'menu-icons' ),
			),
			array(
				'group' => 'gender',
				'id'    => 'fa-venus-double',
				'name'  => __( 'Venus', 'menu-icons' ),
			),
			array(
				'group' => 'gender',
				'id'    => 'fa-venus-mars',
				'name'  => __( 'Venus + Mars', 'menu-icons' ),
			),
			array(
				'group' => 'medical',
				'id'    => 'fa-heart',
				'name'  => __( 'Heart', 'menu-icons' ),
			),
			array(
				'group' => 'medical',
				'id'    => 'fa-heart-o',
				'name'  => __( 'Heart', 'menu-icons' ),
			),
			array(
				'group' => 'medical',
				'id'    => 'fa-heartbeat',
				'name'  => __( 'Heartbeat', 'menu-icons' ),
			),
			array(
				'group' => 'medical',
				'id'    => 'fa-h-square',
				'name'  => __( 'Hospital', 'menu-icons' ),
			),
			array(
				'group' => 'medical',
				'id'    => 'fa-hospital-o',
				'name'  => __( 'Hospital', 'menu-icons' ),
			),
			array(
				'group' => 'medical',
				'id'    => 'fa-medkit',
				'name'  => __( 'Medkit', 'menu-icons' ),
			),
			array(
				'group' => 'medical',
				'id'    => 'fa-stethoscope',
				'name'  => __( 'Stethoscope', 'menu-icons' ),
			),
			array(
				'group' => 'medical',
				'id'    => 'fa-user-md',
				'name'  => __( 'User MD', 'menu-icons' ),
			),
			array(
				'group' => 'payment',
				'id'    => 'fa-cc-amex',
				'name'  => 'American Express',
			),
			array(
				'group' => 'payment',
				'id'    => 'fa-credit-card',
				'name'  => __( 'Credit Card', 'menu-icons' ),
			),
			array(
				'group' => 'payment',
				'id'    => 'fa-cc-diners-club',
				'name'  => 'Diners Club',
			),
			array(
				'group' => 'payment',
				'id'    => 'fa-cc-discover',
				'name'  => 'Discover',
			),
			array(
				'group' => 'payment',
				'id'    => 'fa-google-wallet',
				'name'  => 'Google Wallet',
			),
			array(
				'group' => 'payment',
				'id'    => 'fa-cc-jcb',
				'name'  => 'JCB',
			),
			array(
				'group' => 'payment',
				'id'    => 'fa-cc-mastercard',
				'name'  => 'MasterCard',
			),
			array(
				'group' => 'payment',
				'id'    => 'fa-cc-paypal',
				'name'  => 'PayPal',
			),
			array(
				'group' => 'payment',
				'id'    => 'fa-paypal',
				'name'  => 'PayPal',
			),
			array(
				'group' => 'payment',
				'id'    => 'fa-cc-stripe',
				'name'  => 'Stripe',
			),
			array(
				'group' => 'payment',
				'id'    => 'fa-cc-visa',
				'name'  => 'Visa',
			),
			array(
				'group' => 'spinner',
				'id'    => 'fa-circle-o-notch',
				'name'  => __( 'Circle', 'menu-icons' ),
			),
			array(
				'group' => 'spinner',
				'id'    => 'fa-cog',
				'name'  => __( 'Cog', 'menu-icons' ),
			),
			array(
				'group' => 'spinner',
				'id'    => 'fa-refresh',
				'name'  => __( 'Refresh', 'menu-icons' ),
			),
			array(
				'group' => 'spinner',
				'id'    => 'fa-spinner',
				'name'  => __( 'Spinner', 'menu-icons' ),
			),
			array(
				'group' => 'transportation',
				'id'    => 'fa-ambulance',
				'name'  => __( 'Ambulance', 'menu-icons' ),
			),
			array(
				'group' => 'transportation',
				'id'    => 'fa-bicycle',
				'name'  => __( 'Bicycle', 'menu-icons' ),
			),
			array(
				'group' => 'transportation',
				'id'    => 'fa-bus',
				'name'  => __( 'Bus', 'menu-icons' ),
			),
			array(
				'group' => 'transportation',
				'id'    => 'fa-car',
				'name'  => __( 'Car', 'menu-icons' ),
			),
			array(
				'group' => 'transportation',
				'id'    => 'fa-fighter-jet',
				'name'  => __( 'Fighter Jet', 'menu-icons' ),
			),
			array(
				'group' => 'transportation',
				'id'    => 'fa-motorcycle',
				'name'  => __( 'Motorcycle', 'menu-icons' ),
			),
			array(
				'group' => 'transportation',
				'id'    => 'fa-plane',
				'name'  => __( 'Plane', 'menu-icons' ),
			),
			array(
				'group' => 'transportation',
				'id'    => 'fa-rocket',
				'name'  => __( 'Rocket', 'menu-icons' ),
			),
			array(
				'group' => 'transportation',
				'id'    => 'fa-ship',
				'name'  => __( 'Ship', 'menu-icons' ),
			),
			array(
				'group' => 'transportation',
				'id'    => 'fa-space-shuttle',
				'name'  => __( 'Space Shuttle', 'menu-icons' ),
			),
			array(
				'group' => 'transportation',
				'id'    => 'fa-subway',
				'name'  => __( 'Subway', 'menu-icons' ),
			),
			array(
				'group' => 'transportation',
				'id'    => 'fa-taxi',
				'name'  => __( 'Taxi', 'menu-icons' ),
			),
			array(
				'group' => 'transportation',
				'id'    => 'fa-train',
				'name'  => __( 'Train', 'menu-icons' ),
			),
			array(
				'group' => 'transportation',
				'id'    => 'fa-truck',
				'name'  => __( 'Truck', 'menu-icons' ),
			),
			array(
				'group' => 'transportation',
				'id'    => 'fa-wheelchair',
				'name'  => __( 'Wheelchair', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-align-left',
				'name'  => __( 'Align Left', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-align-center',
				'name'  => __( 'Align Center', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-align-justify',
				'name'  => __( 'Justify', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-align-right',
				'name'  => __( 'Align Right', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-bold',
				'name'  => __( 'Bold', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-clipboard',
				'name'  => __( 'Clipboard', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-columns',
				'name'  => __( 'Columns', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-copy',
				'name'  => __( 'Copy', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-cut',
				'name'  => __( 'Cut', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-paste',
				'name'  => __( 'Paste', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-eraser',
				'name'  => __( 'Eraser', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-files-o',
				'name'  => __( 'Files', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-font',
				'name'  => __( 'Font', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-header',
				'name'  => __( 'Header', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-indent',
				'name'  => __( 'Indent', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-outdent',
				'name'  => __( 'Outdent', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-italic',
				'name'  => __( 'Italic', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-link',
				'name'  => __( 'Link', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-unlink',
				'name'  => __( 'Unlink', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-list',
				'name'  => __( 'List', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-list-alt',
				'name'  => __( 'List', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-list-ol',
				'name'  => __( 'Ordered List', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-list-ul',
				'name'  => __( 'Unordered List', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-paperclip',
				'name'  => __( 'Paperclip', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-paragraph',
				'name'  => __( 'Paragraph', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-repeat',
				'name'  => __( 'Repeat', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-undo',
				'name'  => __( 'Undo', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-save',
				'name'  => __( 'Save', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-strikethrough',
				'name'  => __( 'Strikethrough', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-subscript',
				'name'  => __( 'Subscript', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-superscript',
				'name'  => __( 'Superscript', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-table',
				'name'  => __( 'Table', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-text-height',
				'name'  => __( 'Text Height', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-text-width',
				'name'  => __( 'Text Width', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-th',
				'name'  => __( 'Table Header', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-th-large',
				'name'  => __( 'TH Large', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-th-list',
				'name'  => __( 'TH List', 'menu-icons' ),
			),
			array(
				'group' => 'text-editor',
				'id'    => 'fa-underline',
				'name'  => __( 'Underline', 'menu-icons' ),
			),
			array(
				'group' => 'video-player',
				'id'    => 'fa-arrows-alt',
				'name'  => __( 'Arrows', 'menu-icons' ),
			),
			array(
				'group' => 'video-player',
				'id'    => 'fa-backward',
				'name'  => __( 'Backward', 'menu-icons' ),
			),
			array(
				'group' => 'video-player',
				'id'    => 'fa-compress',
				'name'  => __( 'Compress', 'menu-icons' ),
			),
			array(
				'group' => 'video-player',
				'id'    => 'fa-eject',
				'name'  => __( 'Eject', 'menu-icons' ),
			),
			array(
				'group' => 'video-player',
				'id'    => 'fa-expand',
				'name'  => __( 'Expand', 'menu-icons' ),
			),
			array(
				'group' => 'video-player',
				'id'    => 'fa-fast-backward',
				'name'  => __( 'Fast Backward', 'menu-icons' ),
			),
			array(
				'group' => 'video-player',
				'id'    => 'fa-fast-forward',
				'name'  => __( 'Fast Forward', 'menu-icons' ),
			),
			array(
				'group' => 'video-player',
				'id'    => 'fa-forward',
				'name'  => __( 'Forward', 'menu-icons' ),
			),
			array(
				'group' => 'video-player',
				'id'    => 'fa-pause',
				'name'  => __( 'Pause', 'menu-icons' ),
			),
			array(
				'group' => 'video-player',
				'id'    => 'fa-play',
				'name'  => __( 'Play', 'menu-icons' ),
			),
			array(
				'group' => 'video-player',
				'id'    => 'fa-play-circle',
				'name'  => __( 'Play', 'menu-icons' ),
			),
			array(
				'group' => 'video-player',
				'id'    => 'fa-play-circle-o',
				'name'  => __( 'Play', 'menu-icons' ),
			),
			array(
				'group' => 'video-player',
				'id'    => 'fa-step-backward',
				'name'  => __( 'Step Backward', 'menu-icons' ),
			),
			array(
				'group' => 'video-player',
				'id'    => 'fa-step-forward',
				'name'  => __( 'Step Forward', 'menu-icons' ),
			),
			array(
				'group' => 'video-player',
				'id'    => 'fa-stop',
				'name'  => __( 'Stop', 'menu-icons' ),
			),
			array(
				'group' => 'video-player',
				'id'    => 'fa-youtube-play',
				'name'  => __( 'YouTube Play', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-adjust',
				'name'  => __( 'Adjust', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-anchor',
				'name'  => __( 'Anchor', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-archive',
				'name'  => __( 'Archive', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-arrows',
				'name'  => __( 'Arrows', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-arrows-h',
				'name'  => __( 'Arrows', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-arrows-v',
				'name'  => __( 'Arrows', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-asterisk',
				'name'  => __( 'Asterisk', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-at',
				'name'  => __( 'At', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-balance-scale',
				'name'  => __( 'Balance', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-ban',
				'name'  => __( 'Ban', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-barcode',
				'name'  => __( 'Barcode', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-bars',
				'name'  => __( 'Bars', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-battery-empty',
				'name'  => __( 'Battery', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-battery-quarter',
				'name'  => __( 'Battery', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-battery-half',
				'name'  => __( 'Battery', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-battery-full',
				'name'  => __( 'Battery', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-bed',
				'name'  => __( 'Bed', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-beer',
				'name'  => __( 'Beer', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-bell',
				'name'  => __( 'Bell', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-bell-o',
				'name'  => __( 'Bell', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-bell-slash',
				'name'  => __( 'Bell', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-bell-slash-o',
				'name'  => __( 'Bell', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-binoculars',
				'name'  => __( 'Binoculars', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-birthday-cake',
				'name'  => __( 'Birthday Cake', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-bolt',
				'name'  => __( 'Bolt', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-book',
				'name'  => __( 'Book', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-bookmark',
				'name'  => __( 'Bookmark', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-bookmark-o',
				'name'  => __( 'Bookmark', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-bomb',
				'name'  => __( 'Bomb', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-briefcase',
				'name'  => __( 'Briefcase', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-bug',
				'name'  => __( 'Bug', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-building',
				'name'  => __( 'Building', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-building-o',
				'name'  => __( 'Building', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-bullhorn',
				'name'  => __( 'Bullhorn', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-bullseye',
				'name'  => __( 'Bullseye', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-calculator',
				'name'  => __( 'Calculator', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-calendar',
				'name'  => __( 'Calendar', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-calendar-o',
				'name'  => __( 'Calendar', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-calendar-check-o',
				'name'  => __( 'Calendar', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-calendar-minus-o',
				'name'  => __( 'Calendar', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-calendar-times-o',
				'name'  => __( 'Calendar', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-camera',
				'name'  => __( 'Camera', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-camera-retro',
				'name'  => __( 'Camera Retro', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-caret-square-o-down',
				'name'  => __( 'Caret Down', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-caret-square-o-left',
				'name'  => __( 'Caret Left', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-caret-square-o-right',
				'name'  => __( 'Caret Right', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-caret-square-o-up',
				'name'  => __( 'Caret Up', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-cart-arrow-down',
				'name'  => __( 'Cart Arrow Down', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-cart-plus',
				'name'  => __( 'Cart Plus', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-certificate',
				'name'  => __( 'Certificate', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-check',
				'name'  => __( 'Check', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-check-circle',
				'name'  => __( 'Check', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-check-circle-o',
				'name'  => __( 'Check', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-child',
				'name'  => __( 'Child', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-circle-thin',
				'name'  => __( 'Circle', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-clock-o',
				'name'  => __( 'Clock', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-clone',
				'name'  => __( 'Clone', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-cloud',
				'name'  => __( 'Cloud', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-cloud-download',
				'name'  => __( 'Cloud Download', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-cloud-upload',
				'name'  => __( 'Cloud Upload', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-code',
				'name'  => __( 'Code', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-code-fork',
				'name'  => __( 'Code Fork', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-coffee',
				'name'  => __( 'Coffee', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-cogs',
				'name'  => __( 'Cogs', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-comment',
				'name'  => __( 'Comment', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-comment-o',
				'name'  => __( 'Comment', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-comments',
				'name'  => __( 'Comments', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-comments-o',
				'name'  => __( 'Comments', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-commenting',
				'name'  => __( 'Commenting', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-commenting-o',
				'name'  => __( 'Commenting', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-compass',
				'name'  => __( 'Compass', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-copyright',
				'name'  => __( 'Copyright', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-credit-card',
				'name'  => __( 'Credit Card', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-crop',
				'name'  => __( 'Crop', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-crosshairs',
				'name'  => __( 'Crosshairs', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-cube',
				'name'  => __( 'Cube', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-cubes',
				'name'  => __( 'Cubes', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-i-cursor',
				'name'  => __( 'Cursor', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-cutlery',
				'name'  => __( 'Cutlery', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-dashboard',
				'name'  => __( 'Dashboard', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-database',
				'name'  => __( 'Database', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-desktop',
				'name'  => __( 'Desktop', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-diamond',
				'name'  => __( 'Diamond', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-download',
				'name'  => __( 'Download', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-edit',
				'name'  => __( 'Edit', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-ellipsis-h',
				'name'  => __( 'Ellipsis', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-ellipsis-v',
				'name'  => __( 'Ellipsis', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-envelope',
				'name'  => __( 'Envelope', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-envelope-o',
				'name'  => __( 'Envelope', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-envelope-square',
				'name'  => __( 'Envelope', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-eraser',
				'name'  => __( 'Eraser', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-exchange',
				'name'  => __( 'Exchange', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-exclamation',
				'name'  => __( 'Exclamation', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-exclamation-circle',
				'name'  => __( 'Exclamation', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-exclamation-triangle',
				'name'  => __( 'Exclamation', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-external-link',
				'name'  => __( 'External Link', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-external-link-square',
				'name'  => __( 'External Link', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-eye',
				'name'  => __( 'Eye', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-eye-slash',
				'name'  => __( 'Eye', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-eyedropper',
				'name'  => __( 'Eye Dropper', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-fax',
				'name'  => __( 'Fax', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-female',
				'name'  => __( 'Female', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-film',
				'name'  => __( 'Film', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-filter',
				'name'  => __( 'Filter', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-fire',
				'name'  => __( 'Fire', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-fire-extinguisher',
				'name'  => __( 'Fire Extinguisher', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-flag',
				'name'  => __( 'Flag', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-flag-checkered',
				'name'  => __( 'Flag', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-flag-o',
				'name'  => __( 'Flag', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-flash',
				'name'  => __( 'Flash', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-flask',
				'name'  => __( 'Flask', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-folder',
				'name'  => __( 'Folder', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-folder-open',
				'name'  => __( 'Folder Open', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-folder-o',
				'name'  => __( 'Folder', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-folder-open-o',
				'name'  => __( 'Folder Open', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-futbol-o',
				'name'  => __( 'Foot Ball', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-frown-o',
				'name'  => __( 'Frown', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-gamepad',
				'name'  => __( 'Gamepad', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-gavel',
				'name'  => __( 'Gavel', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-gear',
				'name'  => __( 'Gear', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-gears',
				'name'  => __( 'Gears', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-gift',
				'name'  => __( 'Gift', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-glass',
				'name'  => __( 'Glass', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-globe',
				'name'  => __( 'Globe', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-graduation-cap',
				'name'  => __( 'Graduation Cap', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-group',
				'name'  => __( 'Group', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-hand-lizard-o',
				'name'  => __( 'Hand', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-hand-paper-o',
				'name'  => __( 'Hand', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-hand-peace-o',
				'name'  => __( 'Hand', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-hand-pointer-o',
				'name'  => __( 'Hand', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-hand-rock-o',
				'name'  => __( 'Hand', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-hand-scissors-o',
				'name'  => __( 'Hand', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-hand-spock-o',
				'name'  => __( 'Hand', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-hdd-o',
				'name'  => __( 'HDD', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-headphones',
				'name'  => __( 'Headphones', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-home',
				'name'  => __( 'Home', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-hourglass-o',
				'name'  => __( 'Hourglass', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-hourglass-start',
				'name'  => __( 'Hourglass', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-hourglass-half',
				'name'  => __( 'Hourglass', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-hourglass-end',
				'name'  => __( 'Hourglass', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-hourglass',
				'name'  => __( 'Hourglass', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-history',
				'name'  => __( 'History', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-inbox',
				'name'  => __( 'Inbox', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-industry',
				'name'  => __( 'Industry', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-info',
				'name'  => __( 'Info', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-info-circle',
				'name'  => __( 'Info', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-key',
				'name'  => __( 'Key', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-keyboard-o',
				'name'  => __( 'Keyboard', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-language',
				'name'  => __( 'Language', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-laptop',
				'name'  => __( 'Laptop', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-leaf',
				'name'  => __( 'Leaf', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-legal',
				'name'  => __( 'Legal', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-lemon-o',
				'name'  => __( 'Lemon', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-level-down',
				'name'  => __( 'Level Down', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-level-up',
				'name'  => __( 'Level Up', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-life-ring',
				'name'  => __( 'Life Buoy', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-lightbulb-o',
				'name'  => __( 'Lightbulb', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-location-arrow',
				'name'  => __( 'Location Arrow', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-lock',
				'name'  => __( 'Lock', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-magic',
				'name'  => __( 'Magic', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-magnet',
				'name'  => __( 'Magnet', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-mail-forward',
				'name'  => __( 'Mail Forward', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-mail-reply',
				'name'  => __( 'Mail Reply', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-mail-reply-all',
				'name'  => __( 'Mail Reply All', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-male',
				'name'  => __( 'Male', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-map',
				'name'  => __( 'Map', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-map-o',
				'name'  => __( 'Map', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-map-marker',
				'name'  => __( 'Map Marker', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-map-pin',
				'name'  => __( 'Map Pin', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-map-signs',
				'name'  => __( 'Map Signs', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-meh-o',
				'name'  => __( 'Meh', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-microphone',
				'name'  => __( 'Microphone', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-microphone-slash',
				'name'  => __( 'Microphone', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-minus',
				'name'  => __( 'Minus', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-minus-circle',
				'name'  => __( 'Minus', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-mobile',
				'name'  => __( 'Mobile', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-mobile-phone',
				'name'  => __( 'Mobile Phone', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-moon-o',
				'name'  => __( 'Moon', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-mouse-pointer',
				'name'  => __( 'Mouse Pointer', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-music',
				'name'  => __( 'Music', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-newspaper-o',
				'name'  => __( 'Newspaper', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-object-group',
				'name'  => __( 'Object Group', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-object-ungroup',
				'name'  => __( 'Object Ungroup', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-paint-brush',
				'name'  => __( 'Paint Brush', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-paper-plane',
				'name'  => __( 'Paper Plane', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-paper-plane-o',
				'name'  => __( 'Paper Plane', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-paw',
				'name'  => __( 'Paw', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-pencil',
				'name'  => __( 'Pencil', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-pencil-square',
				'name'  => __( 'Pencil', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-pencil-square-o',
				'name'  => __( 'Pencil', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-phone',
				'name'  => __( 'Phone', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-phone-square',
				'name'  => __( 'Phone', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-picture-o',
				'name'  => __( 'Picture', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-plug',
				'name'  => __( 'Plug', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-plus',
				'name'  => __( 'Plus', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-plus-circle',
				'name'  => __( 'Plus', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-power-off',
				'name'  => __( 'Power Off', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-print',
				'name'  => __( 'Print', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-puzzle-piece',
				'name'  => __( 'Puzzle Piece', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-qrcode',
				'name'  => __( 'QR Code', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-question',
				'name'  => __( 'Question', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-question-circle',
				'name'  => __( 'Question', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-quote-left',
				'name'  => __( 'Quote Left', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-quote-right',
				'name'  => __( 'Quote Right', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-random',
				'name'  => __( 'Random', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-rebel',
				'name'  => __( 'Rebel', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-recycle',
				'name'  => __( 'Recycle', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-registered',
				'name'  => __( 'Registered', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-reply',
				'name'  => __( 'Reply', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-reply-all',
				'name'  => __( 'Reply All', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-retweet',
				'name'  => __( 'Retweet', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-road',
				'name'  => __( 'Road', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-rss',
				'name'  => __( 'RSS', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-rss-square',
				'name'  => __( 'RSS Square', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-search',
				'name'  => __( 'Search', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-search-minus',
				'name'  => __( 'Search Minus', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-search-plus',
				'name'  => __( 'Search Plus', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-server',
				'name'  => __( 'Server', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-share',
				'name'  => __( 'Share', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-share-alt',
				'name'  => __( 'Share', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-share-alt-square',
				'name'  => __( 'Share', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-share-square',
				'name'  => __( 'Share', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-share-square-o',
				'name'  => __( 'Share', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-shield',
				'name'  => __( 'Shield', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-shopping-cart',
				'name'  => __( 'Shopping Cart', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-sign-in',
				'name'  => __( 'Sign In', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-sign-out',
				'name'  => __( 'Sign Out', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-signal',
				'name'  => __( 'Signal', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-sitemap',
				'name'  => __( 'Sitemap', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-sliders',
				'name'  => __( 'Sliders', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-smile-o',
				'name'  => __( 'Smile', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-sort',
				'name'  => __( 'Sort', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-sort-asc',
				'name'  => __( 'Sort ASC', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-sort-desc',
				'name'  => __( 'Sort DESC', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-sort-down',
				'name'  => __( 'Sort Down', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-sort-up',
				'name'  => __( 'Sort Up', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-sort-alpha-asc',
				'name'  => __( 'Sort Alpha ASC', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-sort-alpha-desc',
				'name'  => __( 'Sort Alpha DESC', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-sort-amount-asc',
				'name'  => __( 'Sort Amount ASC', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-sort-amount-desc',
				'name'  => __( 'Sort Amount DESC', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-sort-numeric-asc',
				'name'  => __( 'Sort Numeric ASC', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-sort-numeric-desc',
				'name'  => __( 'Sort Numeric DESC', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-spoon',
				'name'  => __( 'Spoon', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-star',
				'name'  => __( 'Star', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-star-half',
				'name'  => __( 'Star Half', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-star-half-o',
				'name'  => __( 'Star Half', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-star-half-empty',
				'name'  => __( 'Star Half Empty', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-star-half-full',
				'name'  => __( 'Star Half Full', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-star-o',
				'name'  => __( 'Star', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-sticky-note',
				'name'  => __( 'Sticky Note', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-sticky-note-o',
				'name'  => __( 'Sticky Note', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-street-view',
				'name'  => __( 'Street View', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-suitcase',
				'name'  => __( 'Suitcase', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-sun-o',
				'name'  => __( 'Sun', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-tablet',
				'name'  => __( 'Tablet', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-tachometer',
				'name'  => __( 'Tachometer', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-tag',
				'name'  => __( 'Tag', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-tags',
				'name'  => __( 'Tags', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-tasks',
				'name'  => __( 'Tasks', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-television',
				'name'  => __( 'Television', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-terminal',
				'name'  => __( 'Terminal', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-thumb-tack',
				'name'  => __( 'Thumb Tack', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-thumbs-down',
				'name'  => __( 'Thumbs Down', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-thumbs-up',
				'name'  => __( 'Thumbs Up', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-thumbs-o-down',
				'name'  => __( 'Thumbs Down', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-thumbs-o-up',
				'name'  => __( 'Thumbs Up', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-ticket',
				'name'  => __( 'Ticket', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-times',
				'name'  => __( 'Times', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-times-circle',
				'name'  => __( 'Times', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-times-circle-o',
				'name'  => __( 'Times', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-tint',
				'name'  => __( 'Tint', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-toggle-down',
				'name'  => __( 'Toggle Down', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-toggle-left',
				'name'  => __( 'Toggle Left', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-toggle-right',
				'name'  => __( 'Toggle Right', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-toggle-up',
				'name'  => __( 'Toggle Up', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-toggle-off',
				'name'  => __( 'Toggle Off', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-toggle-on',
				'name'  => __( 'Toggle On', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-trademark',
				'name'  => __( 'Trademark', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-trash',
				'name'  => __( 'Trash', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-trash-o',
				'name'  => __( 'Trash', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-tree',
				'name'  => __( 'Tree', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-trophy',
				'name'  => __( 'Trophy', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-tty',
				'name'  => __( 'TTY', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-umbrella',
				'name'  => __( 'Umbrella', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-university',
				'name'  => __( 'University', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-unlock',
				'name'  => __( 'Unlock', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-unlock-alt',
				'name'  => __( 'Unlock', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-unsorted',
				'name'  => __( 'Unsorted', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-upload',
				'name'  => __( 'Upload', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-user',
				'name'  => __( 'User', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-users',
				'name'  => __( 'Users', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-user-plus',
				'name'  => __( 'User: Add', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-user-times',
				'name'  => __( 'User: Remove', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-user-secret',
				'name'  => __( 'User: Password', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-video-camera',
				'name'  => __( 'Video Camera', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-volume-down',
				'name'  => __( 'Volume Down', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-volume-off',
				'name'  => __( 'Volume Of', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-volume-up',
				'name'  => __( 'Volume Up', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-warning',
				'name'  => __( 'Warning', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-wifi',
				'name'  => __( 'WiFi', 'menu-icons' ),
			),
			array(
				'group' => 'web-application',
				'id'    => 'fa-wrench',
				'name'  => __( 'Wrench', 'menu-icons' ),
			),
		);

		/**
		 * Filter genericon items
		 *
		 * @since 0.1.0
		 * @param array $items Icon names.
		 */
		$items = apply_filters( 'icon_picker_fa_items', $items );

		return $items;
	}
}
