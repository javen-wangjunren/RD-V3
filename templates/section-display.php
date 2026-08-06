<?php
/**
 * Template Name: Section Display
 * Template Post Type: page
 */

get_header();

function show_section ($name, $content = [], $style = []) {
	echo '<div>';
	echo "<div class=\"divider\" id=\"$name\">$name</div>";
	mtf_section($name, strtolower($name), $style, $content);
	echo '</div>';
}

?>

<style>
	.divider {
		padding: 10px;
		background-color: #f3f3f3;
	}

	.my {
		position: fixed;
		top: 80px;
		right: 10px;
		padding: 10px;
		background-color: white;
		/* border: 1px solid gray; */
		box-shadow: 0px 0px 20px rgba(200, 200, 200, .5);
	}

	.my .wrap {
		padding-top: 10px;
		padding-right: 10px;
		height: 500px;
		overflow-y: scroll;
	}
	.my a {
		color: #037aff;
		text-decoration: none;
	}
	.my a:hover {
		text-decoration: underline;
	}
</style>

<?php show_section('V1_Banner_001', [
	'subtitle' => 'MML Rocks',
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.',
	'button1_text' => '',
	'button2_text' => '',
	'items'	=> []
], [
	'bg_image' => 'https://via.placeholder.com/1920x700/?text=Image',
]); ?>

<?php show_section('V1_Banner_002', [
	'subtitle' => 'MML Rocks',
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.',
	'items'	=> []
], [
	'bg_image' => 'https://via.placeholder.com/1920x700/ccc/fff/?text=Image'
]); ?>

<?php show_section('V1_Banner_003', [
	'subtitle' => 'MML Rocks',
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.',
	'button1_text' => '',
	'button2_text' => '',
	'items'	=> [
		[
			'image' => [ 'src' => 'https://via.placeholder.com/20x20/00a978/fafafa?text=IMG', 'alt' => 'image' ],
			'title' => 'Digital Branding'
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/20x20/00a978/fafafa?text=IMG', 'alt' => 'image' ],
			'title' => 'Search Engine Optimization'
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/20x20/00a978/fafafa?text=IMG', 'alt' => 'image' ],
			'title' => 'Social Media Marketing'
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/20x20/00a978/fafafa?text=IMG', 'alt' => 'image' ],
			'title' => 'Web Design & Web Development'
		],
	]
], [
	'bg_image' => 'https://via.placeholder.com/1920x700/?text=Image',
]); ?>

<?php show_section('V1_Banner_004', [
	'subtitle' => 'MML Rocks',
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.',
	'items'	=> [
		[
			'icon' => '',
			'image' => [ 'src' => 'https://via.placeholder.com/20x20/00a978/fafafa?text=IMG', 'alt' => 'image' ],
			'title' => 'Digital Branding'
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/20x20/00a978/fafafa?text=IMG', 'alt' => 'image' ],
			'title' => 'Search Engine Optimization'
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/20x20/00a978/fafafa?text=IMG', 'alt' => 'image' ],
			'title' => 'Social Media Marketing'
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/20x20/00a978/fafafa?text=IMG', 'alt' => 'image' ],
			'title' => 'Web Design & Web Development'
		],
	]
], [
	'bg_image' => 'https://via.placeholder.com/1920x700/?text=Image',
]); ?>

<?php show_section('V1_Banner_005', [
	'form_shortcode' => '[contact-form-7 id="14" title="Banner 005"]',
	'title' => 'We Bring Impactful Digital Solutions',
	'subtitle' => 'MML Digi',
	'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.',
]); ?>

<?php show_section('V1_Banner_006', [
	'title' 	=> 'We Bring Impactful Digital Solutions',
	'desc'		=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.',
	'button_1' 	=> [
		'link'		=> '#1',
		'text'		=> 'Button 1'
	],
	'button_2' 	=> [
		'link'		=> '#2',
		'text'		=> 'Button 2'
	]
]); ?>

<?php show_section('V1_Banner_007', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam velit maiores aut omnis quisquam in temporibus, saepe hic. Ducimus nam beatae voluptatibus consectetur asperiores officia reiciendis cumque atque iure sed.</p>',
]); ?>

<?php show_section('V1_Blog_Box_001', [
	'title' 	=> 'We Bring Impactful Digital Solutions',
	'desc'		=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.',
	'items'	=> [
		[
			'text' => 'Nihil officia laudantium ex itaque eos hic incidunt repellat beatae!',
			'date' => 'October 3rd, 2019',
		],
		[
			'text' => 'Ab libero amet, quis repellendus tempora alias optio illo laborum! Doloribus, maxime dignissimos!',
			'date' => 'October 3rd, 2019',
		],
		[
			'text' => 'Provident, natus autem voluptatibus necessitatibus nemo, ab obcaecati illum consectetur error beatae.',
			'date' => 'October 3rd, 2019',
		],
	],
]); ?>

<?php show_section('V1_Blog_Box_002', [
	'blogs'	=> [
		[
			'title' => 'Accusamus laborum aliquam ex provident nostrum natus eveniet tempora nesciunt est qui',
			'desc' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas, enim facilis amet placeat eligendi ab ratione tenetur maxime officiis pariatur totam veniam quibusdam delectus beatae iste quia et corrupti est ipsa. Maiores nobis ullam placeat odit assumenda nam sunt rerum at consequuntur, quod eveniet autem tempora repellendus facere, accusamus alias.',
			'date' => 'October 3rd, 2019',
		],
		[
			'title' => 'Accusamus laborum aliquam ex provident nostrum natus eveniet tempora nesciunt est qui',
			'desc' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas, enim facilis amet placeat eligendi ab ratione tenetur maxime officiis pariatur totam veniam quibusdam delectus beatae iste quia et corrupti est ipsa. Maiores nobis ullam placeat odit assumenda nam sunt rerum at consequuntur, quod eveniet autem tempora repellendus facere, accusamus alias.',
			'date' => 'October 3rd, 2019',
		],
		[
			'title' => 'Accusamus laborum aliquam ex provident nostrum natus eveniet tempora nesciunt est qui',
			'desc' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas, enim facilis amet placeat eligendi ab ratione tenetur maxime officiis pariatur totam veniam quibusdam delectus beatae iste quia et corrupti est ipsa. Maiores nobis ullam placeat odit assumenda nam sunt rerum at consequuntur, quod eveniet autem tempora repellendus facere, accusamus alias.',
			'date' => 'October 3rd, 2019',
		],
	],
	'categories' => [
		[
			'text'	=> 'Perspiciatis suscipit',
			'link'	=> '#',
			'is_active' => 'y',
		],
		[
			'text'	=> 'Inventore molestiae',
			'link'	=> '#',
			'is_active' => '',
		],
		[
			'text'	=> 'Praesentium mollitia',
			'link'	=> '#',
			'is_active' => '',
		],
		[
			'text'	=> 'Repudiandae nesciunt',
			'link'	=> '#',
			'is_active' => '',
		],
	],
]); ?>

<?php show_section('V1_Blog_Box_003', [
	'blogs'	=> [
		[
			'title' => 'Accusamus laborum aliquam ex provident nostrum natus eveniet tempora nesciunt est qui',
			'desc' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas, enim facilis amet placeat eligendi ab ratione tenetur maxime officiis pariatur totam veniam quibusdam delectus beatae iste quia et corrupti est ipsa. Maiores nobis ullam placeat odit assumenda nam sunt rerum at consequuntur, quod eveniet autem tempora repellendus facere, accusamus alias.',
			'date' => 'October 3rd, 2019',
		],
		[
			'title' => 'Accusamus laborum aliquam ex provident nostrum natus eveniet tempora nesciunt est qui',
			'desc' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas, enim facilis amet placeat eligendi ab ratione tenetur maxime officiis pariatur totam veniam quibusdam delectus beatae iste quia et corrupti est ipsa. Maiores nobis ullam placeat odit assumenda nam sunt rerum at consequuntur, quod eveniet autem tempora repellendus facere, accusamus alias.',
			'date' => 'October 3rd, 2019',
		],
		[
			'title' => 'Accusamus laborum aliquam ex provident nostrum natus eveniet tempora nesciunt est qui',
			'desc' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas, enim facilis amet placeat eligendi ab ratione tenetur maxime officiis pariatur totam veniam quibusdam delectus beatae iste quia et corrupti est ipsa. Maiores nobis ullam placeat odit assumenda nam sunt rerum at consequuntur, quod eveniet autem tempora repellendus facere, accusamus alias.',
			'date' => 'October 3rd, 2019',
		],
	],
	'categories' => [],
]); ?>

<?php show_section('V1_Blog_Detail_001', [
	'blog'	=> [
		'title'	=> 'Lorem ipsum dolor amet locavore prism mumblecore art party',
		'content'	=> '<img src="https://via.placeholder.com/830x420/096/ccc?text=Image" alt="">'.
		'<h3>Lorem ipsum</h3>'.
		'<p>Lorem ipsum dolor amet locavore prism mumblecore art party 90\'s taiyaki vegan church-key direct trade ugh you probably haven\'t heard of them hot chicken tbh post-ironic. Farm-to-table organic humblebrag pork belly man braid fingerstache asymmetrical sustainable green juice. Vape lomo jianbing mlkshk prism. Butcher 3 wolf moon bicycle rights hashtag cred scenester flannel tacos pop-up cardigan post-ironic bitters marfa photo booth letterpress.</p>'.
		'<h3>Hashtag fam knausgaard dreamcatcher banjo.</h3>'.
		'<p>Messenger bag deep v quinoa air plant bicycle rights iPhone pabst YOLO hexagon. Beard coloring book DIY forage jianbing drinking vinegar. Literally church-key raw denim, cronut migas ethical jianbing polaroid hella pickled keffiyeh man braid messenger bag bespoke letterpress.</p>',
	],
	'items' => [
		[
			'text'		=> 'Lorem ipsum dolor amet locavore ...',
			'link'	=> '#'
		],
		[
			'text'		=> 'Lorem ipsum dolor amet locavore ...',
			'link'	=> '#'
		],
		[
			'text'		=> 'Lorem ipsum dolor amet locavore ...',
			'link'	=> '#'
		],
		[
			'text'		=> 'Lorem ipsum dolor amet locavore ...',
			'link'	=> '#'
		],
	],
]); ?>

<?php show_section('V1_Breadcrumbs_001', [
	'items' => [
		[ 'text' => 'Page 1', 'link' => '#' ],
		[ 'text' => 'Page 2', 'link' => '#' ],
	],
]); ?>

<?php show_section('V1_Breadcrumbs_002', [
	'items' => [
		[ 'text' => 'Page 1', 'link' => '#' ],
		[ 'text' => 'Page 2', 'link' => '#' ],
	],
]); ?>

<?php show_section('V1_Case_Detail_001', [
	'sidebar_title' => 'Wonderful!<br />Share this Case:',
	'sidebar_text' => 'This is What I Need, <a href="#">Contact</a> to Customize.',
	'title' => 'Case Title',
	'desc' => '<img src="https://via.placeholder.com/830x420/096/ccc?text=Image" alt="">'.
		'<h3>Lorem ipsum</h3>'.
		'<p>Lorem ipsum dolor amet locavore prism mumblecore art party 90\'s taiyaki vegan church-key direct trade ugh you probably haven\'t heard of them hot chicken tbh post-ironic. Farm-to-table organic humblebrag pork belly man braid fingerstache asymmetrical sustainable green juice. Vape lomo jianbing mlkshk prism. Butcher 3 wolf moon bicycle rights hashtag cred scenester flannel tacos pop-up cardigan post-ironic bitters marfa photo booth letterpress.</p>'.
		'<h3>Hashtag fam knausgaard dreamcatcher banjo.</h3>'.
		'<p>Messenger bag deep v quinoa air plant bicycle rights iPhone pabst YOLO hexagon. Beard coloring book DIY forage jianbing drinking vinegar. Literally church-key raw denim, cronut migas ethical jianbing polaroid hella pickled keffiyeh man braid messenger bag bespoke letterpress.</p>',
]); ?>

<?php show_section('V1_Case_Detail_002', [
	'title' => 'Case Title',
	'subtitle' => 'We bring impactful digital solutions.',
	'desc' => '<img src="https://via.placeholder.com/830x420/096/ccc?text=Image" alt="">'.
		'<h3>Lorem ipsum</h3>'.
		'<p>Lorem ipsum dolor amet locavore prism mumblecore art party 90\'s taiyaki vegan church-key direct trade ugh you probably haven\'t heard of them hot chicken tbh post-ironic. Farm-to-table organic humblebrag pork belly man braid fingerstache asymmetrical sustainable green juice. Vape lomo jianbing mlkshk prism. Butcher 3 wolf moon bicycle rights hashtag cred scenester flannel tacos pop-up cardigan post-ironic bitters marfa photo booth letterpress.</p>'.
		'<h3>Hashtag fam knausgaard dreamcatcher banjo.</h3>'.
		'<p>Messenger bag deep v quinoa air plant bicycle rights iPhone pabst YOLO hexagon. Beard coloring book DIY forage jianbing drinking vinegar. Literally church-key raw denim, cronut migas ethical jianbing polaroid hella pickled keffiyeh man braid messenger bag bespoke letterpress.</p>',
]); ?>

<?php show_section('V1_Case_Detail_003', [
	'desc' => '<img src="https://via.placeholder.com/147x40/096/eee?text=LOGO" alt="" class="case-logo">'
		. '<time class="case-time">Date: Feb, 2020</time>'
		. '<h4>• Demand</h4>'
		. '<ol>'
		. '	<li>Shaman yr flexitarian occupy hot chicken lo-fi;</li>'
		. '	<li>Shaman yr flexitarian occupy hot chicken lo-fi;</li>'
		. '	<li>Shaman yr flexitarian occupy hot chicken lo-fi;</li>'
		. '</ol>'
		. '<h4>• Solution</h4>'
		. '<ol>'
		. '	<li>Rooklyn pour-over activated charcoal hoodie raclette skateboard chia;</li>'
		. '	<li>Rooklyn pour-over activated charcoal hoodie raclette skateboard chia;</li>'
		. '	<li>Rooklyn pour-over activated charcoal hoodie raclette skateboard chia;</li>'
		. '</ol>'
		. '<h4>• Feedback</h4>'
		. '<p>Ennui chartreuse cronut viral sartorial ethical truffaut chambray salvia tofu shoreditch. Wayfarers hell of lo-fi typewriter kinfolk chambray.</p>',
	'images' => [
		[ 'src' => 'https://via.placeholder.com/580x435/096/eee?text=Image1', 'alt' => 'image1' ],
		[ 'src' => 'https://via.placeholder.com/580x435/096/eee?text=Image2', 'alt' => 'image2' ],
		[ 'src' => 'https://via.placeholder.com/580x435/096/eee?text=Image3', 'alt' => 'image3' ],
		[ 'src' => 'https://via.placeholder.com/580x435/096/eee?text=Image4', 'alt' => 'image4' ],
	],
]); ?>

<?php show_section('V1_Case_Detail_004', [
	'desc' => '<p>Lorem ipsum dolor sit amet augue. Sed eu sem urna elit, non odio. Aenean lacus tellus quis ante. Fusce enim. Aliquam ultricies porta. Aenean ac eros sed arcu. Mauris nunc posuere cubilia Curae, Nullam et ipsum. Aliquam quis elit.</p>'
		. '<p>Pellentesque habitant morbi tristique commodo. Suspendisse vitae lectus varius quis, tellus.Donec ullamcorper in, dapibus quam hendrerit eget, bibendum a, bibendum tempus. Pellentesque ac ipsum. Vestibulum non sem. Mauris purus. Class aptent taciti sociosqu ad litora torquent per inceptos hymenaeos. Sed.</p>',
	'share_text' => 'Share This Project:',
	'links_title' => 'Project Navigation',
	'links' => [
		[ 'text' => 'Project Title 1 July 22, 2020', 'link' => '#', ],
		[ 'text' => 'Project Title 2 July 22, 2020', 'link' => '#', ],
		[ 'text' => 'Project Title 3 July 22, 2020', 'link' => '#', ],
	],
]); ?>

<?php show_section('V1_Case_Studies_001', [
	'title' => 'Successful Cases',
	'subtitle' => 'We bring impactful digital solutions.',
	'items' => [
		[
			'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image' ],
			'heading' => 'Case 1 - Location',
			'content' => '<ul class="list">'
				. '<li>Literally church-key raw denim.</li>'
				. '<li>Shaman yr flexitarian occupy hot chicken lo-fi.</li>'
				. '<li>Coloring book hammock vinyl</li>'
				. '</ul>',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image' ],
			'heading' => 'Case 2 - Location',
			'content' => 'Alias, nesciunt nemo distinctio adipisci praesentium saepe corporis aut, recusandae numquam exercitationem molestias! Aut, voluptatum molestias sint debitis reprehenderit ex quod maiores?',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image' ],
			'heading' => 'Case 3 - Location',
			'content' => 'Recusandae iusto inventore eum asperiores quasi harum quo, possimus, eligendi animi consequatur suscipit explicabo exercitationem molestiae velit modi iste error molestias voluptas?',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image' ],
			'heading' => 'Case 4 - Location',
			'content' => 'something here',
			'link' => '#',
		],
	],
]); ?>

<?php show_section('V1_Case_Studies_002', [
	'title' => 'Brand Case Studies',
	'desc' => '<p>Street art bushwick hammock live-edge woke direct trade. Yuccie mixtape neutra hell of. Vape brooklyn vegan try-hard.</p>'
		. '<p>Ennui chartreuse cronut viral sartorial ethical truffaut chamb shoreditch. Wayfarers hell of lo-fi typewriter kinfolk.</p>',
	'button' => [ 'text' => 'Check All Cases', 'link' => '#', ],
	'items' => [
		[
			'image' => [ 'src' => 'https://via.placeholder.com/580x271/', 'alt' => 'image' ],
			'heading' => 'CASE STUDY: Case Title 1',
			'content' => 'Food truck salvia roof party, man bun irony chicharrones pickled lo-fi vinyl locavore shoreditch succulents skateboard. Humblebrag kickstarter bitters, man braid live-edge hot chicken hella. +1 you probably haven\'t heard of them health goth, enamel pin.',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/580x271/', 'alt' => 'image' ],
			'heading' => 'CASE STUDY: Case Title 2',
			'content' => 'Food truck salvia roof party, man bun irony chicharrones pickled lo-fi vinyl locavore shoreditch succulents skateboard. Humblebrag kickstarter bitters, man braid live-edge hot chicken hella. +1 you probably haven\'t heard of them health goth, enamel pin.',
			'link' => '#',
		],
	],
]); ?>

<?php show_section('V1_Case_Studies_003', [
	'title' => 'We Bring Impactful Digital Solutions',
	'subtitle' => 'Real Projects',
	'items' => [
		[
			'image' => [ 'src' => 'https://via.placeholder.com/380x285/096/eee/', 'alt' => 'image' ],
			'heading' => 'Project Name',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/380x285/096/eee/', 'alt' => 'image' ],
			'heading' => 'Project Name 2',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/380x285/096/eee/', 'alt' => 'image' ],
			'heading' => 'Project Name 3',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/380x285/096/eee/', 'alt' => 'image' ],
			'heading' => 'Project Name 4',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/380x285/096/eee/', 'alt' => 'image' ],
			'heading' => 'Project Name 5',
			'link' => '#',
		],
	],
]); ?>

<?php show_section('V1_Case_Studies_004', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => '',
		'tabs' => [
			[
				'name' => 'Project Category 1',
				'items' => [
					[
						'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image', ],
						'heading' => 'Heading a',
						'content' => '<ul><li>Sit amet consectetur adipisicing elit</li><li>Explicabo iste aliquid repellendus enim rem facere consequuntur sed mollitia eaque voluptatum</li><li>Winter is coming!</li></ul>',
					],
					[
						'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image', ],
						'heading' => 'Heading a',
						'content' => 'This is the content of long text. Suscipit incidunt commodi ducimus assumenda quod nulla maxime ab pariatur dolore consequatur, nesciunt iure aliquid perferendis! Corporis excepturi soluta pariatur quis maxime.',
					],
					[
						'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image', ],
						'heading' => 'Heading a',
						'content' => '<p>Ad explicabo ducimus iste voluptas, nemo corrupti repellat voluptatum vel?</p>'
							. '<p>Et, totam iste placeat rem sapiente error corporis eos sit expedita quaerat iure at odio. </p>',
					],
					[
						'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image', ],
						'heading' => 'Heading a',
						'content' => 'This is the content',
					],
					[
						'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image', ],
						'heading' => 'Heading a',
						'content' => 'This is the content',
					],
					[
						'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image', ],
						'heading' => 'Heading a',
						'content' => 'This is the content',
					],
				],
				'total_pages' => 5,
			],
			[
				'name' => 'Project Category 2',
				'items' => [
					[
						'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image', ],
						'heading' => 'Heading b',
						'content' => 'Tempore, ea excepturi fugiat natus officiis impedit doloribus eum debitis culpa ratione? Ad illum, accusamus nostrum et quasi ullam nam. Facilis, ipsam?',
					],
					[
						'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image', ],
						'heading' => 'Heading b',
						'content' => 'This is the content',
					],
					[
						'image' => [ 'src' => 'https://via.placeholder.com/380x285/', 'alt' => 'image', ],
						'heading' => 'Heading b',
						'content' => 'This is the content',
					],
				],
				'total_pages' => 5,
			],
		],
]); ?>

<?php show_section('V1_Categories_001', [
	'current_page' => '2',
	'total_pages' => '5',
	'menu_title' => 'Categories',
	'menus' => [
		[
			'text' => 'Category 1',
			'link' => '#',
			'active' => true,
			'submenus' => [
				[
					'text' => 'Category 1 - 1',
					'link' => '#',
					'active' => true,
					'submenus' => [
						[ 'text' => 'Category 1-1-1', 'link' => '#', 'active' => true ],
						[ 'text' => 'Category 1-1-2', 'link' => '#', 'active' => false ],
					]
				],
				[
					'text' => 'Category 1 - 2',
					'link' => '#',
					'active' => false,
					'submenus' => [
						[ 'text' => 'Category 1-2-1', 'link' => '#', 'active' => false ],
						[ 'text' => 'Category 1-2-2', 'link' => '#', 'active' => false ],
					]
				],
			]
		],
		[
			'text' => 'Category 2',
			'link' => '#',
			'active' => false,
			'submenus' => [
				[
					'text' => 'Category 2 - 1',
					'link' => '#',
					'active' => false,
					'submenus' => [
						[ 'text' => 'Category 2-1-1', 'link' => '#', 'active' => false ],
						[ 'text' => 'Category 2-1-2', 'link' => '#', 'active' => false ],
					]
				],
				[
					'text' => 'Category 2 - 2',
					'link' => '#',
					'active' => false,
					'submenus' => [
						[ 'text' => 'Category 2-2-1', 'link' => '#', 'active' => false ],
						[ 'text' => 'Category 2-2-2', 'link' => '#', 'active' => false ],
					]
				],
			]
		],
	],
	'items' => [
		[
			'image' => [ 'src' => 'https://via.placeholder.com/280x210/096/eee?text=Image', 'alt' => 'image' ],
			'title' => 'Product Name',
			'desc' => '',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/280x210/096/eee?text=Image', 'alt' => 'image' ],
			'title' => 'Product Name',
			'desc' => '',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/280x210/096/eee?text=Image', 'alt' => 'image' ],
			'title' => 'Product Name',
			'desc' => '',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/280x210/096/eee?text=Image', 'alt' => 'image' ],
			'title' => 'Product Name',
			'desc' => '',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/280x210/096/eee?text=Image', 'alt' => 'image' ],
			'title' => 'Product Name',
			'desc' => '',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/280x210/096/eee?text=Image', 'alt' => 'image' ],
			'title' => 'Product Name',
			'desc' => '',
			'link' => '#',
		],
	],
], [ 'product_text_align' => 'center', ]); ?>

<?php show_section('V1_Categories_002', [
	'current_page' => '2',
	'total_pages' => '5',
	'menu_title' => 'Categories',
	'menus' => [
		[
			'text' => 'Category 1',
			'link' => '#',
			'active' => true,
			'submenus' => [
				[
					'text' => 'Category 1 - 1',
					'link' => '#',
					'active' => true,
					'submenus' => [
						[ 'text' => 'Category 1-1-1', 'link' => '#', 'active' => true ],
						[ 'text' => 'Category 1-1-2', 'link' => '#', 'active' => false ],
					]
				],
				[
					'text' => 'Category 1 - 2',
					'link' => '#',
					'active' => false,
					'submenus' => [
						[ 'text' => 'Category 1-2-1', 'link' => '#', 'active' => false ],
						[ 'text' => 'Category 1-2-2', 'link' => '#', 'active' => false ],
					]
				],
			]
		],
		[
			'text' => 'Category 2',
			'link' => '#',
			'active' => false,
			'submenus' => [
				[
					'text' => 'Category 2 - 1',
					'link' => '#',
					'active' => false,
					'submenus' => [
						[ 'text' => 'Category 2-1-1', 'link' => '#', 'active' => false ],
						[ 'text' => 'Category 2-1-2', 'link' => '#', 'active' => false ],
					]
				],
				[
					'text' => 'Category 2 - 2',
					'link' => '#',
					'active' => false,
					'submenus' => [
						[ 'text' => 'Category 2-2-1', 'link' => '#', 'active' => false ],
						[ 'text' => 'Category 2-2-2', 'link' => '#', 'active' => false ],
					]
				],
			]
		],
	],
	'items' => [
		[
			'image' => [ 'src' => 'https://via.placeholder.com/280x210/096/eee?text=Image', 'alt' => 'image' ],
			'title' => 'Product Name',
			'desc' => 'Dignissimos, consequatur quis debitis sunt, eaque iusto, adipisci id necessitatibus eum maiores mollitia rerum quia excepturi facilis sapiente totam harum tenetur! Laudantium.',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/280x210/096/eee?text=Image', 'alt' => 'image' ],
			'title' => 'Product Name',
			'desc' => 'Dignissimos, consequatur quis debitis sunt, eaque iusto, adipisci id necessitatibus eum maiores mollitia rerum quia excepturi facilis sapiente totam harum tenetur! Laudantium.',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/280x210/096/eee?text=Image', 'alt' => 'image' ],
			'title' => 'Product Name',
			'desc' => 'Dignissimos, consequatur quis debitis sunt, eaque iusto, adipisci id necessitatibus eum maiores mollitia rerum quia excepturi facilis sapiente totam harum tenetur! Laudantium.',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/280x210/096/eee?text=Image', 'alt' => 'image' ],
			'title' => 'Product Name',
			'desc' => 'Dignissimos, consequatur quis debitis sunt, eaque iusto, adipisci id necessitatibus eum maiores mollitia rerum quia excepturi facilis sapiente totam harum tenetur! Laudantium.',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/280x210/096/eee?text=Image', 'alt' => 'image' ],
			'title' => 'Product Name',
			'desc' => 'Dignissimos, consequatur quis debitis sunt, eaque iusto, adipisci id necessitatibus eum maiores mollitia rerum quia excepturi facilis sapiente totam harum tenetur! Laudantium.',
			'link' => '#',
		],
		[
			'image' => [ 'src' => 'https://via.placeholder.com/280x210/096/eee?text=Image', 'alt' => 'image' ],
			'title' => 'Product Name',
			'desc' => 'Dignissimos, consequatur quis debitis sunt, eaque iusto, adipisci id necessitatibus eum maiores mollitia rerum quia excepturi facilis sapiente totam harum tenetur! Laudantium.',
			'link' => '#',
		],
	],
]); ?>

<?php show_section('V1_Clients_001', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.',
	'button_text_1' => 'CTA Button',
	'button_link_1' => '#1',
	'button_text_2' => 'CTA Button',
	'button_link_2' => '#2',
]); ?>

<?php show_section('V1_Clients_002', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.',
	'items' => [
		[ 'name' => 'Arthur Grady', 'title' => 'Wholesaler', 'desc' => 'We were happy to choose Lumigy products as we not only recognised the brand, but they were also recommended to us by our trusted local electrical wholesaler. As with any large project it was not without its challenges. We had to meet deadline criteria but everything has worked out very well. The previous fittings installed were a lot darker, less energy efficient and required constant maintenance. The new fittings light up our hotel as the light output is brilliant!' ],
		[ 'name' => 'Keith Cadwallader', 'title' => 'Contracts Manager', 'desc' => 'We choose Lumigy for a number of reasons but mainly because Lumigy listens to technical feedback from installers. The service we received on this project, from the proposed lighting design to technical advice, was excellent. The Garden lights have been installed for over 7 months now and the client is very happy with the cost savings as well as the quality of light in the warehouse.' ],
		[ 'name' => 'Steven Cochrane', 'title' => 'Electrician', 'desc' => 'As one of the largest football stadiums in the UK with a seating capacity of over 50,000 supporters, we strive to ensure the lighting in the stand is first class. The stadium is partly covered so there must be sufficient lighting to allow our patrons to move around safely. The Lumigy post light is the perfect LED solution, not only is the light output excellent but we also reap massive energy savings while reducing our carbon footprint.' ],
	],
]); ?>

<?php show_section('V1_Clients_003', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.',
	'items' => [
		[ 'name' => 'Arthur Grady', 'title' => 'Wholesaler', 'desc' => 'We were happy to choose Lumigy products as we not only recognised the brand, but they were also recommended to us by our trusted local electrical wholesaler. As with any large project it was not without its challenges. We had to meet deadline criteria but everything has worked out very well. The previous fittings installed were a lot darker, less energy efficient and required constant maintenance. The new fittings light up our hotel as the light output is brilliant!' ],
		[ 'name' => 'Keith Cadwallader', 'title' => 'Contracts Manager', 'desc' => 'We choose Lumigy for a number of reasons but mainly because Lumigy listens to technical feedback from installers. The service we received on this project, from the proposed lighting design to technical advice, was excellent. The Garden lights have been installed for over 7 months now and the client is very happy with the cost savings as well as the quality of light in the warehouse.' ],
		[ 'name' => 'Steven Cochrane', 'title' => 'Electrician', 'desc' => 'As one of the largest football stadiums in the UK with a seating capacity of over 50,000 supporters, we strive to ensure the lighting in the stand is first class. The stadium is partly covered so there must be sufficient lighting to allow our patrons to move around safely. The Lumigy post light is the perfect LED solution, not only is the light output excellent but we also reap massive energy savings while reducing our carbon footprint.' ],
		[ 'name' => 'Arthur Grady', 'title' => 'Wholesaler', 'desc' => 'We were happy to choose Lumigy products as we not only recognised the brand, but they were also recommended to us by our trusted local electrical wholesaler. As with any large project it was not without its challenges. We had to meet deadline criteria but everything has worked out very well. The previous fittings installed were a lot darker, less energy efficient and required constant maintenance. The new fittings light up our hotel as the light output is brilliant!' ],
		[ 'name' => 'Keith Cadwallader', 'title' => 'Contracts Manager', 'desc' => 'We choose Lumigy for a number of reasons but mainly because Lumigy listens to technical feedback from installers. The service we received on this project, from the proposed lighting design to technical advice, was excellent. The Garden lights have been installed for over 7 months now and the client is very happy with the cost savings as well as the quality of light in the warehouse.' ],
		[ 'name' => 'Steven Cochrane', 'title' => 'Electrician', 'desc' => 'As one of the largest football stadiums in the UK with a seating capacity of over 50,000 supporters, we strive to ensure the lighting in the stand is first class. The stadium is partly covered so there must be sufficient lighting to allow our patrons to move around safely. The Lumigy post light is the perfect LED solution, not only is the light output excellent but we also reap massive energy savings while reducing our carbon footprint.' ],
		[ 'name' => 'Arthur Grady', 'title' => 'Wholesaler', 'desc' => 'We were happy to choose Lumigy products as we not only recognised the brand, but they were also recommended to us by our trusted local electrical wholesaler. As with any large project it was not without its challenges. We had to meet deadline criteria but everything has worked out very well. The previous fittings installed were a lot darker, less energy efficient and required constant maintenance. The new fittings light up our hotel as the light output is brilliant!' ],
	],
]); ?>

<?php show_section('V1_Cta_001', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Committed to the SEO-friendly strategic contents and amazing design echoing together to enlighten your brand.',
	'button_text' => 'Contact Us',
], [
	'bg_image' => 'http://placehold.it/1920x380/'
]); ?>

<?php show_section('V1_Cta_002', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Committed to the SEO-friendly strategic contents and amazing design echoing together to enlighten your brand.',
	'button_text' => '',
	'form_shortcode' => '[contact-form-7 id="8" title="CTA 002"]',
]); ?>

<?php show_section('V1_Cta_003', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Committed to the SEO-friendly strategic contents and amazing design echoing together to enlighten your brand.',
	'right_title' => 'Explore Your Digital Solutions'
]); ?>

<?php show_section('V1_Cta_004', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Committed to the SEO-friendly strategic contents and amazing design echoing together to enlighten your brand.',
	'btn_text' => 'Contact Us'
], [
	'bg_image' => 'http://placehold.it/1920x265/'
]); ?>

<?php show_section('V1_Cta_005', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Committed to the SEO-friendly strategic contents and amazing design echoing together to enlighten your brand.',
	'items' => [
		[ 'text' => 'MML is a reliable digital solution provider and expert. Contact us to upgrade your weapon.' ],
		[ 'text' => '+86-20-81534532<br />info@mmldigi.com' ],
	]
]); ?>

<?php show_section('V1_Cta_006', [
	'title' => 'We Bring Impactful Digital Solutions',
	'subtitle' => 'The Digital Marketing Expert',
	'desc' => 'Room A3-01, 1904 Creative Industrial Park, Osaka Warehouse, 36 Xinmin Eighth Street, Xinhua Road, Haizhu District, Guangzhou',
	'items' => [
		[ 'text' => '+86-20-81534532' ],
		[ 'text' => 'info@mmldigi.com' ],
	],
	'links' => [
		[ 'text' => 'About Us' ],
		[ 'text' => 'Products' ],
		[ 'text' => 'Solutions' ],
		[ 'text' => 'Services' ],
		[ 'text' => 'Support' ],
		[ 'text' => 'Contact Us' ],
	]
]); ?>

<?php show_section('V1_Cta_007', [
	'title' => 'We Bring Impactful Digital Solutions',
	'items' => [
		[ 'text' => 'Offer 1' ],
		[ 'text' => 'Offer 2' ],
		[ 'text' => 'Offer 3' ],
	],
]); ?>

<?php show_section('V1_Faq_001', [
	'items' => [
		[ 'question' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium blanditiis obcaecati ex?', 'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate laborum ipsa autem officiis, enim reiciendis ipsum nobis voluptates sequi vero.' ],
		[ 'question' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit eos molestiae nostrum?', 'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat amet odit consequuntur, corporis eveniet repellendus libero molestias vitae aliquid dolore.' ],
		[ 'question' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id commodi veniam voluptates?', 'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta earum, ipsam aliquam labore asperiores natus cumque animi laudantium dolor vel.' ],
	],
]); ?>

<?php show_section('V1_Faq_002', [
	'title' => 'Q&A with Your Concerns Solved in Advance',
	'items' => [
		[ 'question' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium blanditiis obcaecati ex?', 'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate laborum ipsa autem officiis, enim reiciendis ipsum nobis voluptates sequi vero.' ],
		[ 'question' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit eos molestiae nostrum?', 'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat amet odit consequuntur, corporis eveniet repellendus libero molestias vitae aliquid dolore.' ],
		[ 'question' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id commodi veniam voluptates?', 'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta earum, ipsam aliquam labore asperiores natus cumque animi laudantium dolor vel.' ],
	],
]); ?>

<?php show_section('V1_Faq_003', [
	'title' => 'FAQ',
	'desc' => 'Expedita aspernatur optio doloribus voluptatibus aliquid dolor voluptatum doloremque consectetur.',
	'items' => [
		[ 'question' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium blanditiis obcaecati ex?', 'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate laborum ipsa autem officiis, enim reiciendis ipsum nobis voluptates sequi vero.' ],
		[ 'question' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit eos molestiae nostrum?', 'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat amet odit consequuntur, corporis eveniet repellendus libero molestias vitae aliquid dolore.' ],
		[ 'question' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id commodi veniam voluptates?', 'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta earum, ipsam aliquam labore asperiores natus cumque animi laudantium dolor vel.' ],
	],
]); ?>

<?php show_section('V1_Faq_004', [
	'title' => 'More Support',
	'subtitle' => 'Your 24/7/365 Support',
	'desc' => 'Lorem ipsum dolor amet locavore prism mumblecore art party 90\'s taiyaki vegan church-key direct trade ugh you probably haven\'t heard of them hot chicken tbh post-ironic.',
	'questions' => [
		[ 'question' => 'Tempora omnis culpa animi eius, quas molestias impedit?' ],
		[ 'question' => 'Accusantium itaque est voluptatum provident, sapiente autem?' ],
		[ 'question' => 'Adipisicing elit. Id commodi veniam voluptates?' ],
	],
]); ?>

<?php show_section('V1_Feature_001', [
	'title'	=> 'We Bring Impactful Digital Solutions',
	'items'	=> [
		['src' => 'https://via.placeholder.com/980x480/444/e9eef4?text=1', 'alt' => ''],
		['src' => 'https://via.placeholder.com/980x480/444/e9eef4?text=2', 'alt' => ''],
		['src' => 'https://via.placeholder.com/980x480/444/e9eef4?text=3', 'alt' => ''],
	],
	'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>',
	'detail'=> '<h3>We Bring Impactful Digital Solutions</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>
				<h3>We Bring Impactful Digital Solutions</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>'
]); ?>

<?php show_section('V1_Feature_002', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.',
]); ?>

<?php show_section('V1_Feature_003', [
	'subtitle' => 'MML Digital',
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
	'right_name' => 'Ben Tompson',
	'right_desc' => '“We help Saas companies find their voice, grow the ARR monster and scale internationally.”',
]); ?>

<?php show_section('V1_Feature_004', [
	'items'	=> [
		[
			'subtitle'	=> 'PREHEADING',
			'title'		=> 'TITLE',
			'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>',
			'btns'		=> [
				'obverse' => ['link' => 'javascript:;', 'text' => 'BUTTON'],
				'reverse' => ['link' => 'javascript:;', 'text' => 'BUTTON']
			],
			'image'		=> ['src' => 'https://via.placeholder.com/480x354/585f6b/e9eef4?text=I', 'alt' => ''],
			'video'		=> ''
		],
		[
			'subtitle'	=> 'PREHEADING',
			'title'		=> 'TITLE',
			'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>',
			'btns'		=> [
				'obverse' => ['link' => 'javascript:;', 'text' => 'BUTTON'],
				'reverse' => ['link' => 'javascript:;', 'text' => 'BUTTON']
			],
			'image'		=> ['src' => 'https://via.placeholder.com/480x354/585f6b/e9eef4?text=I', 'alt' => ''],
			'video'		=> 'javascript:;'
		]
	]
]); ?>

<?php show_section('V1_Feature_005', [
	'items'	=> [
		[
			'subtitle'	=> 'PREHEADING',
			'title'		=> 'TITLE',
			'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>',
			'btns'		=> [
				'obverse' => ['link' => 'javascript:;', 'text' => 'BUTTON'],
				'reverse' => ['link' => 'javascript:;', 'text' => 'BUTTON']
			],
			'image'		=> ['src' => 'https://via.placeholder.com/480x354/585f6b/e9eef4?text=I', 'alt' => ''],
			'video'		=> ''
		]
	]
], [ 'reverse' => '' ]); // mml-reverse ?>

<?php show_section('V1_Feature_006', [
	'items' => [
		[
			'subtitle' 	=> 'MML Digital',
			'title'		=> 'We Bring Impactful Digital Solutions',
			'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic</p>',
			'list'		=> [
				['image' => ['src' => 'https://via.placeholder.com/70x70/009a78/f1f1f1?text=Image', 'alt' => '']],
				['image' => ['src' => 'https://via.placeholder.com/70x70/009a78/f1f1f1?text=Image', 'alt' => '']]
			],
			'video'		=> [
				'cover'	=> ['src' => 'https://via.placeholder.com/480x354/585f6b/e9eef4?text=I', 'alt' => ''],
				'link'	=> 'javascript:;'
			]
		],
		[
			'subtitle' 	=> 'MML Digital',
			'title'		=> 'We Bring Impactful Digital Solutions',
			'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic</p>',
			'list'		=> [
				['image' => ['src' => 'https://via.placeholder.com/70x70/009a78/f1f1f1?text=Image', 'alt' => '']],
				['image' => ['src' => 'https://via.placeholder.com/70x70/009a78/f1f1f1?text=Image', 'alt' => '']]
			],
			'video'		=> [
				'cover'	=> ['src' => 'https://via.placeholder.com/480x354/585f6b/e9eef4?text=I', 'alt' => '']
			]
		]
	]	
], [ 'reverse' => '' ]); // mml-reverse ?>

<?php show_section('V1_Feature_007', [
	'subtitle' => 'MML Digital',
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
	'images' => [],
], [ 'reverse' => '' ]); // mml-reverse ?>

<?php show_section('V1_Feature_008', [
	'items'	=> [
		[
			'subtitle'	=> 'MML Digital',
			'title'		=> 'We Bring Impactful Digital Solutions',
			'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic</p>',
			'list'		=> [
				[
					'image'	=> ['src' => 'https://via.placeholder.com/20x20/aaa/fff?text=I', 'alt' => ''],
					'title'	=> 'Digital'
				],
				[
					'image'	=> ['src' => 'https://via.placeholder.com/20x20/aaa/fff?text=I', 'alt' => ''],
					'title'	=> 'Digital'
				]
			],
			'image'		=> ['src' => 'https://via.placeholder.com/480x354/585f6b/e9eef4?text=I', 'alt' => ''],
			'video'		=> 'xx'
		],
		[
			'subtitle'	=> 'MML Digital',
			'title'		=> 'We Bring Impactful Digital Solutions',
			'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic</p>',
			'list'		=> [
				[
					'image'	=> ['src' => 'https://via.placeholder.com/20x20/aaa/fff?text=I', 'alt' => ''],
					'title'	=> 'Digital'
				],
				[
					'image'	=> ['src' => 'https://via.placeholder.com/20x20/aaa/fff?text=I', 'alt' => ''],
					'title'	=> 'Digital'
				]
			],
			'image'		=> ['src' => 'https://via.placeholder.com/480x354/585f6b/e9eef4?text=I', 'alt' => ''],
			'video'		=> ''
		]
	]
], [ 'reverse' => '' ]); // mml-reverse ?>

<?php show_section('V1_Feature_009', [
	'items'	=> [
		[
			'subtitle'	=> 'MML Digital',
			'title'		=> 'We Bring Impactful Digital Solutions',
			'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic</p>',
			'list'		=> [
				[
					'image'	=> ['src' => 'https://via.placeholder.com/20x20/aaa/fff?text=I', 'alt' => ''],
					'title'	=> 'Digital'
				],
				[
					'image'	=> ['src' => 'https://via.placeholder.com/20x20/aaa/fff?text=I', 'alt' => ''],
					'title'	=> 'Digital'
				]
			],
			'image'		=> ['src' => 'https://via.placeholder.com/480x354/585f6b/e9eef4?text=I', 'alt' => ''],
			'video'		=> 'xx'
		]
	]
], [ 'reverse' => '' ]); // mml-reverse ?>

<?php show_section('V1_Feature_010', [
	'items'	=> [
		[
			'subtitle'	=> 'MML Digital',
			'title'		=> 'We Bring Impactful Digital Solutions',
			'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic</p>',
			'list'		=> [
				[
					'image'	=> ['src' => 'https://via.placeholder.com/20x20/aaa/fff?text=I', 'alt' => ''],
					'title'	=> 'Digital'
				],
				[
					'image'	=> ['src' => 'https://via.placeholder.com/20x20/aaa/fff?text=I', 'alt' => ''],
					'title'	=> 'Digital'
				]
			],
			'btns'		=> [
				'obverse' => ['link' => 'javascript:;', 'text' => 'BUTTON'],
				'reverse' => ['link' => 'javascript:;', 'text' => 'BUTTON']
			],
			'image'		=> ['src' => 'https://via.placeholder.com/480x354/585f6b/e9eef4?text=I', 'alt' => ''],
			'video'		=> 'xx'
		],
		[
			'subtitle'	=> 'MML Digital',
			'title'		=> 'We Bring Impactful Digital Solutions',
			'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic</p>',
			'list'		=> [
				[
					'image'	=> ['src' => 'https://via.placeholder.com/20x20/aaa/fff?text=I', 'alt' => ''],
					'title'	=> 'Digital'
				],
				[
					'image'	=> ['src' => 'https://via.placeholder.com/20x20/aaa/fff?text=I', 'alt' => ''],
					'title'	=> 'Digital'
				]
			],
			'btns'		=> [
				'obverse' => ['link' => 'javascript:;', 'text' => 'BUTTON'],
				'reverse' => ['link' => 'javascript:;', 'text' => 'BUTTON']
			],
			'image'		=> ['src' => 'https://via.placeholder.com/480x354/585f6b/e9eef4?text=I', 'alt' => ''],
			'video'		=> ''
		]
	]
], [ 'reverse' => '' ]); // mml-reverse ?>

<?php show_section('V1_Feature_011', [
	'items'	=> [
		[
			'subtitle'	=> 'MML Digital',
			'title'		=> 'We Bring Impactful Digital Solutions',
			'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic</p>',
			'list'		=> [
				[
					'image'	=> ['src' => 'https://via.placeholder.com/20x20/aaa/fff?text=I', 'alt' => ''],
					'title'	=> 'Digital'
				],
				[
					'image'	=> ['src' => 'https://via.placeholder.com/20x20/aaa/fff?text=I', 'alt' => ''],
					'title'	=> 'Digital'
				]
			],
			'btns'		=> [
				'obverse' => ['link' => 'javascript:;', 'text' => 'BUTTON'],
				'reverse' => ['link' => 'javascript:;', 'text' => 'BUTTON']
			],
			'image'		=> ['src' => 'https://via.placeholder.com/480x354/585f6b/e9eef4?text=I', 'alt' => ''],
			'video'		=> 'xx'
		]
	]
], [ 'reverse' => '' ]); // mml-reverse ?>

<?php show_section('V1_Feature_012', [
	'subtitle' => 'MML Digital',
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed culpa, recusandae repellendus consequuntur magnam beatae harum porro ut omnis natus exercitationem illum delectus, neque blanditiis iure sint quia, enim incidunt?',
	'items' => [
		[ 'text' => 'Digital Branding' ],
		[ 'text' => 'Social Media Marketing' ],
		[ 'text' => 'Search Engine Optimization' ],
		[ 'text' => 'Web Design & Web Development' ],
		[ 'text' => 'Sed ut iure expedita' ],
		[ 'text' => 'Pariatur voluptatum officia' ],
	]
], [ 'reverse' => '' ]); // mml-reverse ?>

<?php show_section('V1_Feature_013', [
	'subtitle' => 'MML Digital',
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed culpa, recusandae repellendus consequuntur magnam beatae harum porro ut omnis natus exercitationem illum delectus, neque blanditiis iure sint quia, enim incidunt?',
	'client_word' => '"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam aspernatur ducimus rem, distinctio temporibus quidem officiis aut quae optio provident pariatur mollitia alias totam? Qui, laudantium mollitia. Maiores, accusantium voluptatem!"',
	'client_name' => 'Angela Jensen, Procurement Manager',
], [ 'reverse' => '' ]); // mml-reverse ?>

<?php show_section('V1_Feature_014', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed culpa, recusandae repellendus consequuntur magnam beatae harum porro ut omnis natus exercitationem illum delectus, neque blanditiis iure sint quia, enim incidunt?',
	'items' => [
		[ 'more' => '' ],
		[ 'more' => '' ],
		[ 'more' => '' ],
	],
]); ?>

<?php show_section('V1_Feature_015', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed culpa, recusandae repellendus consequuntur magnam beatae harum porro ut omnis natus exercitationem illum delectus, neque blanditiis iure sint quia, enim incidunt?',
	'items' => [
		[ 'more' => '' ],
		[ 'more' => '' ],
		[ 'more' => '' ],
		[ 'more' => '' ],
		[ 'more' => '' ],
		[ 'more' => '' ],
	],
]); ?>

<?php show_section('V1_Feature_016', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed culpa, recusandae repellendus consequuntur magnam beatae harum porro ut omnis natus exercitationem illum delectus, neque blanditiis iure sint quia, enim incidunt?',
]); ?>

<?php show_section('V1_Feature_017', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Tempore excepturi fugiat nostrum, nam sunt libero officia iure, rerum repudiandae magnam, deserunt ea doloribus quod minima aliquam laboriosam quam sed explicabo dolore voluptatum! Ratione rem itaque quidem! Cupiditate, minima.',
	'items' => [
		[
			'title' => 'Digital Branding',
			'text' => 'Placeat nisi optio sed qui culpa ipsum excepturi tempore atque, cumque reprehenderit.',
			'details' => [
				[ 'Lead time', '2-3 Weeks' ],
				[ 'Monthly Capacity', '100,000+' ],
				[ 'Full dimensional report', 'Included' ],
				[ 'Inspection report', 'Included' ],
				[ 'Product assembly', 'Available' ],
			],
		],
		[
			'title' => 'Social Media Marketing',
			'text' => 'Reprehenderit consequatur architecto fugit omnis voluptatum praesentium doloribus sunt consectetur aliquam voluptate.',
			'details' => [
				[ 'Lead time', '2-3 Weeks' ],
				[ 'Monthly Capacity', '100,000+' ],
				[ 'Full dimensional report', 'Included' ],
				[ 'Inspection report', 'Included' ],
				[ 'Product assembly', 'Available' ],
			],
		],
		[
			'title' => 'Search Engine Optimization',
			'text' => 'Quaerat optio, voluptatum nemo quia iste cum et ipsum sit assumenda dignissimos. Maxime ea debitis odio unde similique!',
			'details' => [
				[ 'Lead time', '2-3 Weeks' ],
				[ 'Monthly Capacity', '100,000+' ],
				[ 'Full dimensional report', 'Included' ],
				[ 'Inspection report', 'Included' ],
				[ 'Product assembly', 'Available' ],
			],
		],
	],
]); ?>

<?php show_section('V1_Feature_018', [
	'slider' => [
		[
			'title' => 'We Bring Impactful Digital Solutions',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</p>',
			'items' => [
				[
					'image' => ['src' => 'https://via.placeholder.com/280x206/585f6b/e9eef4?text=I', 'alt' => ''],
					'link'	=> 'javascript:;',
					'title' => 'Heading',
					'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
				],
				[
					'image' => ['src' => 'https://via.placeholder.com/280x206/585f6b/e9eef4?text=I', 'alt' => ''],
					'link'	=> 'javascript:;',
					'title' => 'Heading',
					'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
				]
			]
		],
		[
			'title' => 'We Bring Impactful Digital Solutions',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</p>',
			'items' => [
				[
					'image' => ['src' => 'https://via.placeholder.com/280x206/585f6b/e9eef4?text=I', 'alt' => ''],
					'link'	=> 'javascript:;',
					'title' => 'Heading',
					'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
				],
				[
					'image' => ['src' => 'https://via.placeholder.com/280x206/585f6b/e9eef4?text=I', 'alt' => ''],
					'link'	=> 'javascript:;',
					'title' => 'Heading',
					'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
				]
			]
		]
	]
]); ?>

<?php show_section('V1_Feature_019', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Tempore excepturi fugiat nostrum, nam sunt libero officia iure, rerum repudiandae magnam, deserunt ea doloribus quod minima aliquam laboriosam quam sed explicabo dolore voluptatum! Ratione rem itaque quidem! Cupiditate, minima.',
	'items' => [
		[ 'question' => 'Ducimus ut', 'answer' => 'Suscipit aliquam eius dignissimos, cupiditate ut quia ducimus officia veritatis!', 'image' => ['src' => 'https://via.placeholder.com/492x310/097/fff', 'alt' => ''] ],
		[ 'question' => 'Culpa dolorum', 'answer' => 'Amet modi eum rerum deserunt recusandae? Iste non quis eveniet.' ],
		[ 'question' => 'Cupiditate tempora', 'answer' => 'Beatae laboriosam nihil fugiat quidem ipsam eius modi rem aliquam!' ],
	],
]); ?>

<?php show_section('V1_Feature_020', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Tempore excepturi fugiat nostrum, nam sunt libero officia iure, rerum repudiandae magnam, deserunt ea doloribus quod minima aliquam laboriosam quam sed explicabo dolore voluptatum! Ratione rem itaque quidem! Cupiditate, minima.',
	'tabs' => [
		[
			'label' => 'Tab 1', // tab 标签
			'title' => 'Voluptatibus, asperiores',
			'text' => '这个是完整形态。有 Title, Description, Features, Button. 后面的 Tab 会展示其他情形。 Dolores ipsam error veritatis ratione, animi nisi voluptatem velit voluptates facilis maxime.',
			'src' => 'https://via.placeholder.com/570x369/096/fff?text=Image%201',
			'features' => [
				[ 'src' => 'https://via.placeholder.com/20x20/096/fff?text=I', 'alt' => 'img', 'text' => 'Autem qui' ], // 有 html 则显示 html ，无则显示 src 和 alt
				[ 'src' => 'https://via.placeholder.com/20x20/096/fff?text=I', 'alt' => 'img', 'text' => 'Asperiores laboriosam' ], // html 举例: <i class="fas fa-globe"></i>
			],
		],
		[
			'label' => 'Tab 2', // tab 标签
			'title' => '',
			'text' => '没有 Title。 Dolores ipsam error veritatis ratione, animi nisi voluptatem velit voluptates facilis maxime.',
			'src' => 'https://via.placeholder.com/570x369/096/fff?text=Image%202',
			'features' => [
				[ 'src' => 'https://via.placeholder.com/20x20/096/fff?text=I', 'alt' => 'img', 'text' => 'Autem qui' ], // 有 html 则显示 html ，无则显示 src 和 alt
				[ 'src' => 'https://via.placeholder.com/20x20/096/fff?text=I', 'alt' => 'img', 'text' => 'Asperiores laboriosam' ], // html 举例: <i class="fas fa-globe"></i>
			],
		],
		[
			'label' => 'Tab 3', // tab 标签
			'title' => '没有 Description',
			'text' => '',
			'src' => 'https://via.placeholder.com/570x369/096/fff?text=Image%203',
			'features' => [
				[ 'src' => 'https://via.placeholder.com/20x20/096/fff?text=I', 'alt' => 'img', 'text' => 'Autem qui' ], // 有 html 则显示 html ，无则显示 src 和 alt
				[ 'src' => 'https://via.placeholder.com/20x20/096/fff?text=I', 'alt' => 'img', 'text' => 'Asperiores laboriosam' ], // html 举例: <i class="fas fa-globe"></i>
			],
		],
		[
			'label' => 'Tab 4', // tab 标签
			'title' => 'Praesentium hic',
			'text' => '没有 Features。 Dolores ipsam error veritatis ratione, animi nisi voluptatem velit voluptates facilis maxime.',
			'src' => 'https://via.placeholder.com/570x369/096/fff?text=Image%204',
			'features' => [],
		],
		[
			'label' => 'Tab 5', // tab 标签
			'title' => 'Sapiente cum',
			'text' => '没有 Button。 Dolores ipsam error veritatis ratione, animi nisi voluptatem velit voluptates facilis maxime.',
			'src' => 'https://via.placeholder.com/570x369/096/fff?text=Image%205',
			'button_text' => '',
			'features' => [
				[ 'src' => 'https://via.placeholder.com/20x20/096/fff?text=I', 'alt' => 'img', 'text' => 'Autem qui' ], // 有 html 则显示 html ，无则显示 src 和 alt
				[ 'src' => 'https://via.placeholder.com/20x20/096/fff?text=I', 'alt' => 'img', 'text' => 'Asperiores laboriosam' ], // html 举例: <i class="fas fa-globe"></i>
			],
		],
	],
]); ?>

<?php show_section('V1_Feature_021', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Tempore excepturi fugiat nostrum, nam sunt libero officia iure, rerum repudiandae magnam, deserunt ea doloribus quod minima aliquam laboriosam quam sed explicabo dolore voluptatum! Ratione rem itaque quidem! Cupiditate, minima.',
	'tabs' => [
		[
			'label' => 'Tab 1',
		],
		[
			'label' => 'Tab 2',
		],
	],
]); ?>

<?php show_section('V1_Feature_022', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Tempore excepturi fugiat nostrum, nam sunt libero officia iure, rerum repudiandae magnam, deserunt ea doloribus quod minima aliquam laboriosam quam sed explicabo dolore voluptatum! Ratione rem itaque quidem! Cupiditate, minima.',
	'items' => [
		[
			'title' => 'Incidunt eaque',
			'features' => [
				[
					'src' => 'https://via.placeholder.com/70x70/096/fff?text=Image',
					'alt' => 'alt',
					'heading' => 'Ipsam quidem',
					'text' => 'libero cupiditate eligendi soluta laboriosam est.',
				],
				[
					'src' => 'https://via.placeholder.com/70x70/096/fff?text=Image',
					'alt' => 'alt',
					'heading' => 'Cumque voluptate',
					'text' => 'Placeat incidunt natus aut laudantium quas ratione, quia iusto aliquid.',
				],
			],
		],
		[
			'title' => 'Incidunt eaque',
			'features' => [
				[
					'src' => 'https://via.placeholder.com/70x70/096/fff?text=Image',
					'alt' => 'alt',
					'heading' => 'Ipsam quidem',
					'text' => 'libero cupiditate eligendi soluta laboriosam est.',
				],
				[
					'src' => 'https://via.placeholder.com/70x70/096/fff?text=Image',
					'alt' => 'alt',
					'heading' => 'Cumque voluptate',
					'text' => 'Placeat incidunt natus aut laudantium quas ratione, quia iusto aliquid.',
				],
			],
		],
	],
]); ?>

<?php show_section('V1_Feature_023', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Tempore excepturi fugiat nostrum, nam sunt libero officia iure, rerum repudiandae magnam, deserunt ea doloribus quod minima aliquam laboriosam quam sed explicabo dolore voluptatum! Ratione rem itaque quidem! Cupiditate, minima.',
	'items' => [
		[
			'heading' => 'Incidunt eaque',
			'text' => 'Ipsa laudantium molestias deleniti ratione eligendi, recusandae dolorum odio totam reiciendis! Ea!',
			'features' => [
				[
					'src' => 'https://via.placeholder.com/20x20/096/fff?text=Img',
					'alt' => 'alt',
					'text' => 'libero cupiditate eligendi soluta laboriosam est.',
				],
				[
					'src' => 'https://via.placeholder.com/20x20/096/fff?text=Img',
					'alt' => 'alt',
					'text' => 'Placeat incidunt natus aut laudantium quas ratione, quia iusto aliquid.',
				],
			],
		],
		[
			'heading' => 'Incidunt eaque',
			'text' => 'Illo, eos debitis! Dignissimos doloremque nihil deserunt minima commodi, incidunt eaque? Incidunt.',
			'features' => [
				[
					'src' => 'https://via.placeholder.com/20x20/096/fff?text=Img',
					'alt' => 'alt',
					'text' => 'libero cupiditate eligendi soluta laboriosam est.',
				],
				[
					'src' => 'https://via.placeholder.com/20x20/096/fff?text=Img',
					'alt' => 'alt',
					'text' => 'Placeat incidunt natus aut laudantium quas ratione, quia iusto aliquid.',
				],
			],
		],
		[
			'heading' => 'Incidunt eaque',
			'text' => 'Illo, eos debitis! Dignissimos doloremque nihil deserunt minima commodi, incidunt eaque? Incidunt.',
			'features' => [
				[
					'src' => 'https://via.placeholder.com/20x20/096/fff?text=Img',
					'alt' => 'alt',
					'text' => 'libero cupiditate eligendi soluta laboriosam est.',
				],
				[
					'src' => 'https://via.placeholder.com/20x20/096/fff?text=Img',
					'alt' => 'alt',
					'text' => 'Placeat incidunt natus aut laudantium quas ratione, quia iusto aliquid.',
				],
			],
		],
	],
]); ?>

<?php show_section('V1_Feature_024', [
	'items' => [
		[ 'text' => 'Molestiae vitae' ],
		[ 'text' => 'Veniam vel' ],
		[ 'text' => 'Voluptates ipsum' ],
		[ 'text' => 'Repudiandae fugiat' ],
	],
]); ?>

<?php show_section('V1_Feature_025', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed culpa, recusandae repellendus consequuntur magnam beatae harum porro ut omnis natus exercitationem illum delectus, neque blanditiis iure sint quia, enim incidunt?',
	'items' => [
		[ 'text' => 'Digital Branding' ],
		[ 'text' => 'Social Media Marketing' ],
		[ 'text' => 'Search Engine Optimization' ],
		[ 'text' => 'Web Design & Web Development' ],
	]
]); ?>

<?php show_section('V1_Feature_026', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed culpa, recusandae repellendus consequuntur magnam beatae harum porro ut omnis natus exercitationem illum delectus, neque blanditiis iure sint quia, enim incidunt?',
	'items' => [
		[ 'heading' => 'Heading', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut.' ],
		[ 'heading' => 'Heading', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut.' ],
		[ 'heading' => 'Heading', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut.' ],
		[ 'heading' => 'Heading', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut.' ],
		[ 'heading' => 'Heading', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut.' ],
		[ 'heading' => 'Heading', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut.' ],
	]
]); ?>

<?php show_section('V1_Feature_027', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed culpa, recusandae repellendus consequuntur magnam beatae harum porro ut omnis natus exercitationem illum delectus, neque blanditiis iure sint quia, enim incidunt?',
	'items' => [
		[ 'heading' => 'Heading 1', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 1.', 'more' => '' ],
		[ 'heading' => 'Heading 2', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 2.', 'more' => '' ],
		[ 'heading' => 'Heading 3', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 3.', 'more' => '' ],
		[ 'heading' => 'Heading 4', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 4.', 'more' => '' ],
		[ 'heading' => 'Heading 5', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 5.', 'more' => '' ],
		[ 'heading' => 'Heading 6', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 6.', 'more' => '' ],
	]
]); ?>

<?php show_section('V1_Feature_028', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed culpa, recusandae repellendus consequuntur magnam beatae harum porro ut omnis natus exercitationem illum delectus, neque blanditiis iure sint quia, enim incidunt?',
	'items' => [
		[ 'heading' => 'Heading 1', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 1.' ],
		[ 'heading' => 'Heading 2', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 2.' ],
		[ 'heading' => 'Heading 3', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 3.' ],
		[ 'heading' => 'Heading 4', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 4.' ],
		[ 'heading' => 'Heading 5', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 5.' ],
		[ 'heading' => 'Heading 6', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 6.' ],
	]
]); ?>

<?php show_section('V1_Feature_029', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed culpa, recusandae repellendus consequuntur magnam beatae harum porro ut omnis natus exercitationem illum delectus, neque blanditiis iure sint quia, enim incidunt?',
	'items' => [
		[ 'heading' => 'Heading 1', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 1.' ],
		[ 'heading' => 'Heading 2', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 2.' ],
		[ 'heading' => 'Heading 3', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 3.' ],
		[ 'heading' => 'Heading 4', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 4.' ],
		[ 'heading' => 'Heading 5', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 5.' ],
		[ 'heading' => 'Heading 6', 'text' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 6.' ],
	]
]); ?>

<?php show_section('V1_Feature_030', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed culpa, recusandae repellendus consequuntur magnam beatae harum porro ut omnis natus exercitationem illum delectus, neque blanditiis iure sint quia, enim incidunt?',
	'items' => [
		[ 'heading' => 'Heading 1', 'content' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 1.' ],
		[ 'heading' => 'Heading 2', 'content' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 2.' ],
		[ 'heading' => 'Heading 3', 'content' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 3.' ],
		[ 'heading' => 'Heading 4', 'content' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 4.' ],
		[ 'heading' => 'Heading 5', 'content' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 5.' ],
		[ 'heading' => 'Heading 6', 'content' => 'Impedit atque vero nam doloremque similique corporis iusto necessitatibus ut 6.' ],
	]
]); ?>

<?php show_section('V1_Feature_031', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed culpa, recusandae repellendus consequuntur magnam beatae harum porro ut omnis natus exercitationem illum delectus, neque blanditiis iure sint quia, enim incidunt?',
	'items' => [
		[
			'image' 	=> ['src' => 'https://via.placeholder.com/63x63/096/fff?text=Image', 'alt' => 'Image'],
			'title'		=> 'Heading 3',
			'content'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.'
		],
		[
			'image' 	=> ['src' => 'https://via.placeholder.com/63x63/096/fff?text=Image', 'alt' => 'Image'],
			'title'		=> 'Heading 3',
			'content'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.'
		]
	]
]); ?>

<?php show_section('V1_Feature_032', [
	'title' 		=> 'We Bring Impactful Digital Solutions',
	'desc' 			=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.',
	'button_text_1' => 'CTA Button',
	'button_link_1' => '#1',
	'button_text_2' => 'CTA Button',
	'button_link_2' => '#2',
	'items' => [
		[ 'count' => '60', 'unit' => 'million', 'text' => 'Digital Branding' ],
		[ 'count' => '60', 'unit' => 'million', 'text' => 'Digital Branding' ],
		[ 'count' => '60', 'unit' => 'million', 'text' => 'Digital Branding' ],
		[ 'count' => '60', 'unit' => 'million', 'text' => 'Digital Branding' ]
	]
]); ?>

<?php show_section('V1_Feature_035', [
	'person'	=> [
		'image'		=> ['src' => 'https://via.placeholder.com/500x387/e9eef4/5d6777?text=I', 'alt' => ''],
		'name'		=> 'Ben',
		'slogan'	=> '<p>“We help Saas companies find their voice, grow the ARR monster and scale internationally.”</p>'
	],
	'subtitle'	=> 'MML DIGITAL',
	'title'		=> 'We Bring Impactful Digital Solutions',
	'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>',
	'btns'		=> [
		'obverse' => ['link' => 'javascript:;', 'text' => 'BUTTON1'],
		'reverse' => ['link' => 'javascript:;', 'text' => 'BUTTON2']
	]
]); ?>

<?php show_section('V1_Feature_037', [
	'subtitle'	=> 'MML DIGITAL',
	'title'		=> 'We Bring Impactful Digital Solutions',
	'desc'		=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic',
	'list'		=> [
		[
			'icon' 	=> '',
			'image' => ['src' => 'https://via.placeholder.com/64x64/e9eef4/5d6777?text=I', 'alt' => 'image' ],
			'title' => 'title'
		],
		[
			'icon' 	=> '',
			'image' => ['src' => 'https://via.placeholder.com/64x64/e9eef4/5d6777?text=I', 'alt' => 'image' ],
			'title' => 'title'
		]
	],
	'slider'	=> [
		[
			'video' => 'javascript:;',
			'image' => ['src' => 'https://via.placeholder.com/600x576/e9eef4/5d6777?text=A', 'alt' => '']
		],
		[
			'video' => '',
			'image' => ['src' => 'https://via.placeholder.com/600x576/e9eef4/5d6777?text=B', 'alt' => '']
		],
		[
			'video' => '',
			'image' => ['src' => 'https://via.placeholder.com/600x576/e9eef4/5d6777?text=C', 'alt' => '']
		]
	]
]); ?>

<?php show_section('V1_Feature_043', [
	'title'		=> 'We Bring Impactful Digital Solutions',
	'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>',
	'items'		=> [
		'class'		=> 'slicker',
		'content'	=> [
			[
				'image'	=> ['src' => 'https://via.placeholder.com/64x64/e9eef4/5d6777?text=I', 'alt' => ''],
				'title'	=> 'Heading'
			],
			[
				'image'	=> ['src' => 'https://via.placeholder.com/64x64/e9eef4/5d6777?text=I', 'alt' => ''],
				'title'	=> 'Heading'
			]
		]
	],
	'btns'		=> [
		'obverse' => ['link' => 'javascript:;', 'text' => 'BUTTON1'],
		'reverse' => ['link' => 'javascript:;', 'text' => 'BUTTON2']
	]
]); ?>

<?php show_section('V1_Feature_045', [
	'title'		=> 'We Bring Impactful Digital Solutions',
	'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>',
	'table'		=> [
		'class'		=> 'bordered',
		'content'	=> '<table>
							<tr>
								<td>Model</td><td>WFFN 18x2</td><td>WFFN 25x2</td>
							</tr>
							<tr>
								<td>Model</td><td>WFFN 18x2</td><td>WFFN 25x2</td>
							</tr>
							<tr>
								<td>Model</td><td>WFFN 18x2</td><td>WFFN 25x2</td>
							</tr>
						</table>'
	],
	'btns'		=> [
		'obverse' => ['link' => 'javascript:;', 'text' => 'BUTTON1'],
		'reverse' => ['link' => 'javascript:;', 'text' => 'BUTTON2']
	]
]); ?>

<?php show_section('V1_Feature_046', [
	'title'		=> 'We Bring Impactful Digital Solutions',
	'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>',
	'items'		=> [
		'class'		=> 'mml-cols-2',
		'content'	=> [
			[
				'title'	=> 'Heading 3',
				'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>'
			],
			[
				'title'	=> 'Heading 3',
				'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>'
			],
		]
	],
	'btns'		=> [
		'obverse' => ['link' => 'javascript:;', 'text' => 'BUTTON1'],
		'reverse' => ['link' => 'javascript:;', 'text' => 'BUTTON2']
	]
]); ?>

<?php show_section('V1_Feature_047', [
	'title'		=> 'We Bring Impactful Digital Solutions',
	'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>',
	'table'		=> [
		'class'		=> 'striped',
		'content'	=> '<table>
							<tr>
								<td>Model</td><td>WFFN 18x2</td><td>WFFN 25x2</td>
							</tr>
							<tr>
								<td>Model</td><td>WFFN 18x2</td><td>WFFN 25x2</td>
							</tr>
							<tr>
								<td>Model</td><td>WFFN 18x2</td><td>WFFN 25x2</td>
							</tr>
						</table>'
	],
	'btns'		=> [
		'obverse' => ['link' => 'javascript:;', 'text' => 'BUTTON1'],
		'reverse' => ['link' => 'javascript:;', 'text' => 'BUTTON2']
	]
]); ?>

<?php show_section('V1_Feature_048', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
	'table' => '<table>
					<tr><td>Model</td><td>WFFN 18x2</td><td>WFFN 25x2</td></tr>
					<tr><td>Model</td><td>WFFN 18x2</td><td>WFFN 25x2</td></tr><tr>
					<td>Model</td><td>WFFN 18x2</td><td>WFFN 25x2</td></tr>
				</table>'
]); ?>

<?php show_section('V1_Feature_049', [
	'title'	=> 'We Bring Impactful<br>Digital Solutions',
	'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>',
	'items'	=> [
		[
			'image' 	=> ['src' => 'https://via.placeholder.com/380x285/585f6b/e9eef4?text=I', 'alt' => ''],
			'download'	=> 'javascript:;',
			'title'		=> 'Heading 4',
			'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
		],
		[
			'image' 	=> ['src' => 'https://via.placeholder.com/380x285/585f6b/e9eef4?text=I', 'alt' => ''],
			'download'	=> 'javascript:;',
			'title'		=> 'Heading 4',
			'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
		],
		[
			'image' 	=> ['src' => 'https://via.placeholder.com/380x285/585f6b/e9eef4?text=I', 'alt' => ''],
			'download'	=> 'javascript:;',
			'title'		=> 'Heading 4',
			'desc'		=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
		]
	]
]); ?>

<?php show_section('V1_Feature_050', [
	'title'	=> 'We Bring Impactful Digital Solutions',
	'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>',
	'items'	=> [
		['title' => 'Digital Branding', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</p>'],
		['title' => 'Social Media Marketing', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</p>']
	],
	'image'	=> ['src' => 'https://via.placeholder.com/580x435/585f6b/e9eef4?text=I', 'alt' => ''],
	'btns'	=> [
		'obverse' => ['link' => 'javascript:;', 'text' => 'BUTTON 1'],
		'reverse' => ['link' => 'javascript:;', 'text' => 'BUTTON 2']
	]
]); ?>

<?php show_section('V1_Feature_051', [
	'title'	=> 'We Bring Impactful Digital Solutions',
	'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>',
	'items'	=> [
		[
			'tab'		=> 'Tab 1',
			'content'	=> '<h3>Tab 1</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar.</p>',
			'image'		=> ['src' => 'https://via.placeholder.com/580x400/585f6b/e9eef4?text=I', 'alt' => ''],
			'list'		=> [
				[
					'image' => ['src' => 'https://via.placeholder.com/20x20/585f6b/e9eef4?text=I', 'alt' => ''],
					'icon'	=> '',
					'title'	=> 'Digital Branding'
				],
				[
					'image' => ['src' => 'https://via.placeholder.com/20x20/585f6b/e9eef4?text=I', 'alt' => ''],
					'icon'	=> '',
					'title'	=> 'Digital Branding'
				]
			],
			'btn'		=> ['link' => 'javascript:;', 'text' => 'BUTTON 1']
		],
		[
			'tab'		=> 'Tab 2',
			'content'	=> '<h3>Tab 2</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar.</p>',
			'image'		=> ['src' => 'https://via.placeholder.com/580x400/585f6b/e9eef4?text=I', 'alt' => ''],
			'list'		=> [
				[
					'image' => ['src' => 'https://via.placeholder.com/20x20/585f6b/e9eef4?text=I', 'alt' => ''],
					'icon'	=> '',
					'title'	=> 'Digital Branding'
				],
				[
					'image' => ['src' => 'https://via.placeholder.com/20x20/585f6b/e9eef4?text=I', 'alt' => ''],
					'icon'	=> '',
					'title'	=> 'Digital Branding'
				]
			],
			'btn'		=> ['link' => 'javascript:;', 'text' => 'BUTTON 1']
		]
	]
]); ?>

<?php show_section('V1_Feature_057', [
	'title'	=> 'We Bring Impactful Digital Solutions',
	'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.</p>',
	'items'	=> [
		[
			'image' => ['src' => 'https://via.placeholder.com/63x63/585f6b/e9eef4?text=I', 'alt' => ''],
			'title'	=> 'Digital Branding',
			'desc'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum'
		],
		[
			'image' => ['src' => 'https://via.placeholder.com/63x63/585f6b/e9eef4?text=I', 'alt' => ''],
			'title'	=> 'Digital Branding',
			'desc'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum'
		],
		[
			'image' => ['src' => 'https://via.placeholder.com/63x63/585f6b/e9eef4?text=I', 'alt' => ''],
			'title'	=> 'Digital Branding',
			'desc'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum'
		],
		[
			'image' => ['src' => 'https://via.placeholder.com/63x63/585f6b/e9eef4?text=I', 'alt' => ''],
			'title'	=> 'Digital Branding',
			'desc'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum'
		],
		[
			'image' => ['src' => 'https://via.placeholder.com/63x63/585f6b/e9eef4?text=I', 'alt' => ''],
			'title'	=> 'Digital Branding',
			'desc'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum'
		]
	]
]); ?>

<?php show_section('V1_Gallery_001', [
	
]); ?>

<?php show_section('V1_Product_Detail_001', [
	'title' 	=> 'Product Title',
	'desc'		=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.',
	'slider' 	=> [
		[
			'image' => ['src' => 'https://via.placeholder.com/580x435/ececec/f1f1f1?text=I', 'alt' => ''],
			'video' => 'xxx'
		],
		[
			'image' => ['src' => 'https://via.placeholder.com/580x435/ececec/f1f1f1?text=I', 'alt' => ''],
			'video' => ''
		]
	],
	'items'		=> [
		'title' => 'Highlights',
		'list'	=> '<ul>
						<li>Digital branding</li>
						<li>Social media marketing</li>
						<li>Search engine optimization</li>
					</ul>',
		'icons'	=> [
			['src' => 'https://via.placeholder.com/30x30/03a67b/f1f1f1?text=I', 'alt' => ''],
			['src' => 'https://via.placeholder.com/30x30/03a67b/f1f1f1?text=I', 'alt' => ''],
		]
	],
	'btn'		=> [
		'reverse' => ['link' => 'javascript:;', 'text' => 'Request A Quote'],
		'obverse' => ['link' => 'javascript:;', 'text' => 'Download Datasheet']
	]
]); ?>

<?php show_section('V1_Product_Detail_002', [
	'title' 	=> 'Product Title',
	'desc'		=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.',
	'slider' 	=> [
		[
			'image' => ['src' => 'https://via.placeholder.com/580x435/ececec/f1f1f1?text=I', 'alt' => ''],
			'video' => 'YYY'
		],
		[
			'image' => ['src' => 'https://via.placeholder.com/580x435/ececec/f1f1f1?text=I', 'alt' => ''],
			'video' => ''
		]
	],
	'items'		=> [
		'q&a' => [
			[
				'question' 	=> 'Free Sample Available',
				'answer'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.'
			],
			[
				'question' 	=> 'Free Sample Available',
				'answer'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.'
			]
		]
	],
	'btn'		=> [
		'reverse' => ['link' => 'javascript:;', 'text' => 'Request A Quote'],
		'obverse' => ['link' => 'javascript:;', 'text' => 'Download Datasheet']
	]
]); ?>

<?php show_section('V1_Portfolio_001', [
	'title' 	=> 'Relevant Project Portfolios',
	'desc'		=> '<p>Committed to the SEO-friendly strategic contents and amazing design echoing together to enlighten your brand.</p>',
	'products'	=> [
		'column'	=> 3,
		'psize'		=> 6,
		'pnow'		=> 1,
		'ptotal'	=> 10
	],
	'param'		=> [
		'url'	=> '/wp-common/api-mock.php',
		'data'	=> [
			'psize'	=> 6,
			'pid'	=> 1
		]
	]
]); ?>

<?php show_section('V1_Portfolios_Gallery_003', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' 	=> 'Committed to the SEO-friendly strategic contents and amazing design echoing together to enlighten your brand.',
	'items' => [
		[
			'image' => ['src' => 'https://via.placeholder.com/330x250/ececec/f1f1f1?text=I', 'alt' => ''],
			'title' => 'By Fit',
			'desc'	=> 'Mustache retro semiotics palo santo wolf crucifix green juice cloud bread ethical. Bespoke kombucha tilde wolf.'
		],
		[
			'image' => ['src' => 'https://via.placeholder.com/330x250/ececec/f1f1f1?text=I', 'alt' => ''],
			'title' => 'By Style',
			'desc'	=> 'Mustache retro semiotics palo santo wolf crucifix green juice cloud bread ethical. Bespoke kombucha tilde wolf.'
		],
		[
			'image' => ['src' => 'https://via.placeholder.com/330x250/ececec/f1f1f1?text=I', 'alt' => ''],
			'title' => 'By Material',
			'desc'	=> 'Mustache retro semiotics palo santo wolf crucifix green juice cloud bread ethical. Bespoke kombucha tilde wolf.'
		],
		[
			'image' => ['src' => 'https://via.placeholder.com/330x250/ececec/f1f1f1?text=I', 'alt' => ''],
			'title' => 'By Size',
			'desc'	=> 'Mustache retro semiotics palo santo wolf crucifix green juice cloud bread ethical. Bespoke kombucha tilde wolf.'
		]
	]
]); ?>

<?php show_section('V1_History_001', [
	'title'		=> 'We Bring Impactful Digital Solutions',
	'subtitle'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.',
	'features'	=> [
		['title' => '2018-2014', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.'],
		['title' => '2014-2010', 'content' => 'Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.'],
		['title' => '2010-2006', 'content' => 'Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.'],
	]
]); ?>

<?php show_section('V1_History_002', [
	'title'		=> 'We Bring Impactful Digital Solutions',
	'subtitle' 	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.',
	'features' 	=> [
		[
			'image' 	=> ['src' => 'https://via.placeholder.com/200x120/00a978/f1f1f1?text=I', 'alt' => ''],
			'title' 	=> '2018-2014',
			'content'	=> 'Lorem ipsum dolor sit amet.'
		],
		[
			'image' 	=> ['src' => 'https://via.placeholder.com/200x120/00a978/f1f1f1?text=I', 'alt' => ''],
			'title' 	=> '2014-2010',
			'content' 	=> 'Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.'
		],
		[
			'image' 	=> ['src' => 'https://via.placeholder.com/200x120/00a978/f1f1f1?text=I', 'alt' => ''],
			'title' 	=> '2010-2006',
			'content' 	=> 'Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.'
		]
	]
]); ?>

<?php show_section('V1_History_003', [
	'title'	=> 'We Bring Impactful Digital Solutions',
	'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>',
	'items'	=> [
		[
			'title'	=> '2019-2020',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>'
		],
		[
			'title'	=> '2019-2020',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>'
		],
		[
			'title'	=> '2019-2020',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>'
		]
	]
]); ?>

<?php show_section('Footer_001', [
	'content' => 'The only overseas digital marketing company recognized by Mr. Hua in foreign trade.',
	'title1' => 'Products',
	'title2' => 'Capability',
	'title3' => 'Quick Link',
	'title4' => 'Contact Information',
]); ?>

<?php show_section('V1_Team_001', [
	'title'		=> 'Meet Our Team',
	'desc'		=> 'Butcher 3 wolf moon bicycle rights hashtag cred scenester flannel tacos pop-up cardigan post-ironic bitters marfa photo booth letterpress:',
	'image'		=> ['src' => 'https://via.placeholder.com/570x388/00a978/f1f1f1?text=I', 'alt' => ''],
	'features'	=> [
		['title' => 'Marketing Team'],
		['title' => 'Design Team']
	]
]); ?>

<?php show_section('V1_Team_002', [
	'title'	=> 'A Passionate and Inspirational Team',
	'desc'	=> "Lorem ipsum dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you probably haven't heard of them hot chicken tbh post-ironic. Farm-to-table organic humblebrag pork belly man braid fingerstache asymmetrical sustainable green juice. Vape lomo jianbing mlkshk prism.",
	'image'	=> ['src' => 'https://via.placeholder.com/1180x442/00a978/f1f1f1?text=I', 'alt' => ''],
	'team'	=> [
		['title' => 'Design Team', 'content' => 'Butcher 3 wolf moon bicycle rights hashtag cred scenester flannel tacos pop-up cardigan post-ironic bitters marfa photo booth letterpress.'],
		['title' => 'Engineer', 'content' => 'Butcher 3 wolf moon bicycle rights hashtag cred scenester flannel tacos pop-up cardigan post-ironic bitters marfa photo booth letterpress.']
	]
]); ?>

<?php show_section('V1_Team_003', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed culpa, recusandae repellendus consequuntur magnam beatae harum porro ut omnis natus exercitationem illum delectus, neque blanditiis iure sint quia, enim incidunt?',
	'items' => [
		[
			'name'		=> 'Seven Xia',
			'title'		=> 'CEO',
			'desc'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.'
		],
		[
			'name'		=> 'Eight Xia',
			'title'		=> 'CEO',
			'desc'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.'
		],
		[
			'name'		=> 'Nine Xia',
			'title'		=> 'CEO',
			'desc'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.'
		]
	]
]); ?>

<?php show_section('V1_Team_004', [
	'title'	=> 'A Proactive Team',
	'desc'	=> "Lorem ipsum dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you probably haven't heard of them hot chicken tbh post-ironic. Farm-to-table organic humblebrag pork belly man braid fingerstache asymmetrical sustainable.",
	'image'	=> ['src' => 'https://via.placeholder.com/580x368/00a978/f1f1f1?text=I', 'alt' => ''],
	'items'	=> [
		[
			'image'		=> ['src' => 'https://via.placeholder.com/380x388/00a978/eee?text=Image%201', 'alt' => ''],
			'name' 		=> 'Name1',
			'position'	=> 'Position1',
			'desc' 		=> 'Desc1'
		],
		[
			'image'		=> ['src' => 'https://via.placeholder.com/380x388/00a978/eee?text=Image%202', 'alt' => ''],
			'name' 		=> 'Name2',
			'position'	=> 'Position2',
			'desc' 		=> 'Desc2'
		],
		[
			'image'		=> ['src' => 'https://via.placeholder.com/380x388/00a978/eee?text=Image%203', 'alt' => ''],
			'name' 		=> 'Name3',
			'position'	=> 'Position3',
			'desc' 		=> 'Desc3'
		]
	]
]); ?>

<?php show_section('V1_Team_005', [
	'title'	=> 'A Proactive Team',
	'items'	=> [
		[
			'image'		=> ['src' => 'https://via.placeholder.com/380x388/00a978/eee?text=Image%201', 'alt' => ''],
			'name'		=> 'Ben Chen',
			'position'	=> 'CEO & Founders'
		],
		[
			'image'		=> ['src' => 'https://via.placeholder.com/380x388/00a978/eee?text=Image%202', 'alt' => ''],
			'name'		=> 'John Mai',
			'position'	=> 'Head of Engineering'
		],
		[
			'image'		=> ['src' => 'https://via.placeholder.com/380x388/00a978/eee?text=Image%203', 'alt' => ''],
			'name'		=> 'Christine Luo',
			'position'	=> 'Customer Service'
		],
		[
			'image'		=> ['src' => 'https://via.placeholder.com/380x388/00a978/eee?text=Image%204', 'alt' => ''],
			'name'		=> 'Julie Lin',
			'position'	=> 'Head of Quality Control'
		],
		[
			'image'		=> ['src' => 'https://via.placeholder.com/380x388/00a978/eee?text=Image%205', 'alt' => ''],
			'name'		=> 'Steven Mo',
			'position'	=> 'Head of Installation Team'
		],
		[
			'image'		=> ['src' => 'https://via.placeholder.com/380x388/00a978/eee?text=Image%206', 'alt' => ''],
			'name'		=> 'Eddie Guan',
			'position'	=> 'Training Manager'
		]
	]
]); ?>

<?php show_section('V1_Team_006', [
	'title'	=> 'Team Spirit, Brand Value',
	'desc'	=> "<p>Lorem ipsum dolor amet locavore prism mumblecore art party 90's church-key direct trade ugh you probably:</p>
				<ul>
					<li>Street art hammock live-edge woke direct trade.</li>
					<li>Street art hammock live-edge woke direct trade.</li>
					<li>Street art hammock live-edge woke direct trade.</li>
					<li>Street art hammock live-edge woke direct trade.</li>
				</ul>",
	'items'	=> [
		[
			'image'	=> ['src' => 'https://via.placeholder.com/200x262/00a978/f1f1f1?text=I', 'alt' => ''],
			'name'	=> 'Tommy'
		],
		[
			'image'	=> ['src' => 'https://via.placeholder.com/200x262/00a978/f1f1f1?text=I', 'alt' => ''],
			'name'	=> 'Vivianna'
		],
		[
			'image'	=> ['src' => 'https://via.placeholder.com/200x262/00a978/f1f1f1?text=I', 'alt' => ''],
			'name'	=> 'Wellson'
		],
		[
			'image'	=> ['src' => 'https://via.placeholder.com/200x262/00a978/f1f1f1?text=I', 'alt' => ''],
			'name'	=> 'David'
		]
	]
]); ?>

<?php show_section('V1_Team_009', [
	'title'	=> 'A Team of High Professionalism and Devotion',
	'desc'	=> "<p>Lorem ipsum dolor amet locavore prism mumblecore art party 90's taiyaki vegan church-key direct trade ugh you probably haven't heard of them hot chicken tbh post-ironic. Farm-to-table organic humblebrag pork belly man braid fingerstache asymmetrical sustainable green juice.</p>",
	'items'	=> [
		[
			'image'		=> ['src' => 'https://via.placeholder.com/380x296/585f6b/e9eef4?text=I', 'alt' => ''],
			'name'		=> 'Seven Xia',
			'position'	=> 'CEO & Founder',
			'desc'		=> "<p>Trust is the cornerstone to all customer experiences. That's what I believe, and what I insist in business.</p>"
		],
		[
			'image'		=> ['src' => 'https://via.placeholder.com/380x296/585f6b/e9eef4?text=I', 'alt' => ''],
			'name'		=> 'Seven Xia',
			'position'	=> 'CEO & Founder',
			'desc'		=> "<p>Trust is the cornerstone to all customer experiences. That's what I believe, and what I insist in business.</p>"
		]
	]
]); ?>

<?php show_section('V1_Testimonials_001', [
	'title' => 'Our Client\'s Testimonials',
	'desc' => '',
	'items' => [
		[
			'name' => 'Keith Cadwallader',
			'title' => 'Contracts Manager',
			'desc' => 'We choose Lumigy for a number of reasons but mainly because Lumigy listens to technical feedback from installers. The service we received on this project, from the proposed lighting design to technical advice, was excellent. The Garden lights have been installed for over 7 months now and the client is very happy with the cost savings as well as the quality of light in the warehouse.',
		],
		[
			'name' => 'Steven Cochrane',
			'title' => 'Electrician',
			'desc' => 'As one of the largest football stadiums in the UK with a seating capacity of over 50,000 supporters, we strive to ensure the lighting in the stand is first class. The stadium is partly covered so there must be sufficient lighting to allow our patrons to move around safely. The Lumigy post light is the perfect LED solution, not only is the light output excellent but we also reap massive energy savings while reducing our carbon footprint.',
		],
	]
]); ?>
<?php show_section('V1_Testimonials_002', [
	'title' => 'Testimonials',
	'desc' => '',
	'items' => [
		[
			'name' => 'Adrian Harmon',
			'title' => 'CEO, Wholesale Brand',
			'desc' => '"Food truck salvia roof party, man bun irony chicharrones pickled lo-fi vinyl locavore shoreditch succulents skateboard. Humblebrag kickstarter bitters, man braid live-edge hot chicken hella."',
		],
		[
			'name' => 'Nate Raymond',
			'title' => 'GM, Brand Owner',
			'desc' => '"Food truck salvia roof party, man bun irony chicharrones pickled lo-fi vinyl locavore shoreditch succulents skateboard. Humblebrag kickstarter bitters, man braid live-edge hot chicken hella."',
		],
		[
			'name' => 'Myah Pollard',
			'title' => 'Director, Distributing Company',
			'desc' => '"Food truck salvia roof party, man bun irony chicharrones pickled lo-fi vinyl locavore shoreditch succulents skateboard. Humblebrag kickstarter bitters, man braid live-edge hot chicken hella."',
		],
	]
]); ?>
<?php show_section('V1_Testimonials_003', [
	'title' => 'Voices of Our Clients',
	'desc' => '',
	'items' => [
		[
			'name' => 'David Tompson',
			'title' => 'Brand Manager',
			'desc' => 'Street art bushwick hammock live-edge woke direct trade. Yuccie mixtape neutra hell of. Vape brooklyn vegan try-hard.',
		],
		[
			'name' => 'Eric Ottoman',
			'title' => 'Purchase Manager',
			'desc' => 'Street art bushwick hammock live-edge woke direct trade. Yuccie mixtape neutra hell of. Vape brooklyn vegan try-hard.',
		],
		[
			'name' => 'Wayman Watt',
			'title' => 'Brand Name',
			'desc' => 'Street art bushwick hammock live-edge woke direct trade. Yuccie mixtape neutra hell of. Vape brooklyn vegan try-hard.',
		],
		[
			'name' => 'Laisa Rispon',
			'title' => 'Brand Name',
			'desc' => 'Street art bushwick hammock live-edge woke direct trade. Yuccie mixtape neutra hell of. Vape brooklyn vegan try-hard.',
		],
	]
]); ?>
<?php show_section('V1_Testimonials_004', [
	'title' => 'Testimonial',
	'desc' => 'Check out what our clients are talking about our products.',
	'items' => [
		[
			'name' => 'Noah',
			'country' => 'Denmark',
			'desc' => 'Street art bushwick hammock live-edge woke direct trade.',
			'project' => 'Engineering Project',
		],
		[
			'name' => 'Olivia',
			'country' => 'Britain',
			'desc' => 'Street art bushwick hammock live-edge woke direct trade.',
			'project' => 'Wholesale Distribution',
		],
		[
			'name' => 'Daniel',
			'country' => 'Spain',
			'desc' => 'Street art bushwick hammock live-edge woke direct trade.',
			'project' => 'Interior Project',
		],
		[
			'name' => 'Giovanni',
			'country' => 'Italy',
			'desc' => 'Street art bushwick hammock live-edge woke direct trade.',
			'project' => 'Trading Business',
		],
		[
			'name' => 'Benjamin',
			'country' => 'US',
			'desc' => 'Street art bushwick hammock live-edge woke direct trade.',
			'project' => 'Custom Project',
		],
		[
			'name' => 'Issac',
			'country' => 'Australia',
			'desc' => 'Street art bushwick hammock live-edge woke direct trade.',
			'project' => 'Exterior Project',
		],
	]
]); ?>

<?php show_section('V1_Testimonials_005', [
	'items' => [
        [
            'title' => "Our Client's Testimonials",
            'desc'  => '<p>We choose Lumigy for a number of reasons but mainly because Lumigy listens to technical feedback from installers. The service we received on this project, from the proposed lighting design to technical advice, was excellent. The Garden lights have been installed for over 7 months now and the client is very happy with the cost savings as well as the quality of light in the warehouse.</p>',
            'meta'  => 'Keith Cadwallader, Contracts Manager'
        ],
        [
            'title' => "Our Client's Testimonials",
            'desc'  => '<p>We choose Lumigy for a number of reasons but mainly because Lumigy listens to technical feedback from installers. The service we received on this project, from the proposed lighting design to technical advice, was excellent. The Garden lights have been installed for over 7 months now and the client is very happy with the cost savings as well as the quality of light in the warehouse.</p>',
            'meta'  => 'Keith Cadwallader, Contracts Manager'
        ]
    ]
]); ?>

<?php show_section('V1_Video_001', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.',
	'items' => [
		[
			'video_url' => '#',
			'heading' => 'Heading 3',
			'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.',
		],
	]
], [ 'columns' => 1 ]); ?>

<?php show_section('V1_Video_002', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.',
	'items' => [
		[
			'video_url' => '#',
			'heading' => 'Heading 3',
			'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.',
		],
		[
			'video_url' => '#',
			'heading' => 'Heading 3',
			'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.',
		],
	]
], [ 'columns' => 2 ]); ?>

<?php show_section('V1_Video_003', [
	'title' => 'We Bring Impactful Digital Solutions',
	'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.',
	'items' => [
		[
			'video_url' => '#',
			'heading' => 'Heading 3',
			'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.',
		],
		[
			'video_url' => '#',
			'heading' => 'Heading 3',
			'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.',
		],
		[
			'video_url' => '#',
			'heading' => 'Heading 3',
			'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.',
		],
	]
]); ?>

<?php show_section('V1_Process_Flow_001', [
	'title'	=> 'We Bring Impactful Digital Solutions',
	'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>',
	'items'	=> [
		[
			'index' => 1,
			'image' => ['src' => 'https://via.placeholder.com/20x20/585f6b/e9eef4?text=I', 'alt' => ''],
			'icon'	=> '',
			'title'	=> 'Heading 4',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
		],
		[
			'index' => 1,
			'image' => ['src' => 'https://via.placeholder.com/20x20/585f6b/e9eef4?text=I', 'alt' => ''],
			'icon'	=> '',
			'title'	=> 'Heading 4',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
		],
		[
			'index' => 1,
			'image' => ['src' => 'https://via.placeholder.com/20x20/585f6b/e9eef4?text=I', 'alt' => ''],
			'icon'	=> '',
			'title'	=> 'Heading 4',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
		],
		[
			'index' => 1,
			'image' => ['src' => 'https://via.placeholder.com/20x20/585f6b/e9eef4?text=I', 'alt' => ''],
			'icon'	=> '',
			'title'	=> 'Heading 4',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
		],
		[
			'index' => 1,
			'icon'	=> '<i class="fas fa-check"></i>',
			'title'	=> 'Heading 4',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
		],
		[
			'index' => 1,
			'icon'	=> '<i class="fas fa-check"></i>',
			'title'	=> 'Heading 4',
			'desc'	=> '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum</p>'
		],
	]
]); ?>

<div class="my">
	<div>
		<span>目录</span>
		<span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
		<a href="">Reload</a>
	</div>
	<div class="wrap"></div>
</div>

<style><?php do_action('mml_theme_ac_section_style'); ?></style>

<script>
(function ($) {

$(document).ready(function () {
	$('.divider').each(function (index, item) {
		var $obj = $(item)
		var $name = $obj.text()
		$('<div><a href="#' + $name + '">'+$name+'</a></div>').appendTo('.my .wrap')
	})
})

})(jQuery)
</script>

<?
get_footer();
