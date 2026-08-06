<!-- 搜索功能 直接跳到搜索总页进行搜索 搜索板块为blog类型 -->
<?php
$categories = get_categories(['exclude'=>'1']);
$fields = get_fields(get_queried_object());
//var_dump(get_queried_object());
//var_dump($fields);die;
$post = get_queried_object();
global $wpdb;
$sql = 'select * from wp_termmeta WHERE meta_key = "mml_term_relative_page" and meta_value= '.$post->ID;
$terms = ( $wpdb->get_results($sql));
$term_id = null;
if ($terms){
    $term_id = $terms[0]->term_id;
    $term = get_term($term_id,'category');
}
?>
<div class="blog-categories">
    <div class="flex-container">
        <div class="left">
            <form class="search-window" action="/">
                <input type="text" placeholder="Search..." name="s">
                <input style="display: none" type="text" placeholder="Search..." name="t" value="post">
                <button><i class="fa fa-search"></i></button>
            </form>
            <div class="category">
                <h3>Categories</h3>
                <ul>
                    <?php   foreach ($categories as $category){ ?>
                    <li class="<?php echo $term_id == $category->term_id?'active':''  ?>" term-id="<?php echo  $category->slug ?>"><a href="<?php echo  get_category_link($category) ?>"><?php echo  $category->name ?></a></li>
                    <?php   } ?>
                </ul>
            </div>
            <?php   if ($fields['related_posts']){ ?>
            <div class="related-post">
                <h3>Related Posts</h3>
                <div class="related-post-list">
                    <?php   foreach ($fields['related_posts'] as $related_post){
                        $related_post = $related_post['post'];
                        $post = get_post($related_post);
                        $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
//                        $img = $img? $img[0]:'/wp-content/uploads/2022/05/Mask-group-26.jpg';
                        if ($img){
                            $img = $img[0];
                        }else{
                            $oldImg = get_post_meta($post->ID, 'featured_image_old')[0];
                            if ($oldImg){
                                $img = $oldImg;
                            }else{
                                $img = '/wp-content/uploads/2022/05/Mask-group-26.jpg';
                            }
                        }
                        ?>
                    <div class="related-post-item">
                        <a href="<?php echo  get_permalink($related_post) ?>">
                            <div class="img-wrap">
                                <?php echo  mml_get_lazyload_image_by_url($img) ?>
                            </div>
                            <div class="text-wrap">
                                <p><?php echo  $post->post_title ?></p>
                            </div>
                        </a>
                    </div>
                    <?php   } ?>
                </div>
            </div>
            <?php   } ?>
            <div class="email-form-wrap">
                <?php echo do_shortcode('[contact-form-7 id="955" title="email form"]')?>
            </div>
        </div>
        <div class="right">
            <div class="grid-container">
                <div style="display: none" class="grid-item post-item-2">
                    <a href="javascript:;">
                        <img src="/wp-content/uploads/2022/05/Mask-group-31.jpg" alt="">
                    </a>
                    <div class="content">
                        <h3><a href="javascript:;">Case Name 01</a></h3>
                        <p>We follow a strict quality control system to ensure only the superior quality prototypes and finished parts can leave the factory and guarantee you peace of mind purchasing.guarantee you peace of mind purchasing.</p>
                    </div>
                    <div class="post-date">March 3, 2022</div>
                </div>
            </div>
            <div class="pagination">
            </div>
        </div>
    </div>
</div>

<script>
    var $ = jQuery;
    var term_id = '<?php   if ($term_id){echo $term->slug;} ?>';
    function get_post_datas(page=1) {
        // term_id = $('.category li.active').eq(0).attr('term-id');
        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            dataType : 'json',
            type:'get',
            data:{
                'term_id':term_id,
				'action': 'posts_list',
                'page':page,
				'test': 'translate',
                // 'per_page':per_page
            },
            success:function (data) {
				console.log(data);
                var html = '';
                if (data.data.length >0){
                    var arr = data.data;
                    for (var i=0;i<data.data.length;i++){
                        // arr[i].


                        html +=`                <div class="grid-item post-item-2">
                    <a href="${arr[i].jump_url}">
                        <img src="${arr[i].img}" alt="${arr[i].alt}">
                    </a>
                    <div class="content">
                        <h3><a href="${arr[i].jump_url}">${arr[i].name}</a></h3>
                        <p>${arr[i].desc}</p>
                    </div>
                    <div class="post-date">${arr[i].date}</div>
                </div>
`
                    }
                }
                $('.grid-container').html(html)
                // $('.content mml-shopcart-items').html(html)

                if (data.page_num ==1 || data.page_num == 0){
                    $('.pagination').html('');
                }else{
                    $('.pagination').mmlpage(data.page, data.page_num, {
                        prev: '<i class="fas fa-caret-left"></i>',
                        next: '<i class="fas fa-caret-right"></i>',
                        pageClass:'mml-page',
                        activeClass:'active',
                        // href: '?page='
                        click:function (page) {
                            get_post_datas(page);
                        }
                    });
                }
                jQuery("a.vp-a").YouTubePopUp();

                $('.loading').hide();
            },
        });

    }
    $(document).ready(function() {
        get_post_datas()
        // $('.category li').on('click',function (){
        //     $(this).addClass('active').siblings().removeClass('active')
        //     get_post_datas()
        // })
    })
</script>