<?php
$get_terms = get_terms(["taxonomy" => "knowledge_base_catory", "hide_empty" => false, "parent" => 0]);
$post = get_queried_object();
global $wpdb;
$sql = 'select * from wp_termmeta WHERE meta_key = "mml_term_relative_page" and meta_value= '.$post->ID;
$terms = ( $wpdb->get_results($sql));
$term_id = null;
if ($terms){
    $term_id = $terms[0]->term_id;
    $term = get_term($term_id,'knowledge_base_catory');

}
$kw = $_GET['kw']?:'';


?>
<div class="knowledge-base-categories">
    <div class="flex-container">
        <div class="left">
            <form class="search-window" action="/" onsubmit="return false" >
                <input type="text" placeholder="Search..." name="s">
                <button><i class="fa fa-search"></i></button>
            </form>
            <div class="category">
                <h3>Categories</h3>
                <ul>
                    <?php   foreach ($get_terms as $get_term){ ?>
                    <li class="<?php echo  $get_term->term_id == $term_id ?'active':'' ?>"><a href="<?php echo  get_category_link($get_term) ?>"><?php echo  $get_term->name ?></a></li>
                    <?php   } ?>
                </ul>
            </div>
        </div>
        <div class="right">
            <div class="grid-container">

            </div>
            <div class="pagination">

            </div>
        </div>
    </div>
</div>
<script>
    var $ = jQuery;
    var kw = '';
    var term = '<?php echo  $term->slug ?>';
    function get_knowledgebase(page=1) {
        //处理参数
        kw = $('.search-window input').val()
        $.ajax({
                                    url: "/wp-admin/admin-ajax.php",

            dataType : 'json',

            type:'get',
            data:{
                'kw':kw,
                'page':page,
                 'action': 'knowledgebase_list',

                'term_id':term
                // 'per_page':per_page
            },
            success:function (data) {
                var html = '';
                if (data.data.length >0){
                    var arr = data.data;
                    for (var i=0;i<data.data.length;i++){


                        html +=`<div class="grid-item post-item-2">
                <a href="${arr[i].jump_url}">
                    <img src="${arr[i].img}" alt="${arr[i].alt}">
                </a>
                <div class="content">
                    <h3><a href="${arr[i].jump_url}">${arr[i].name}</a></h3>
                    <p>${arr[i].desc}</p>
                </div>
                <div class="post-date">${arr[i].date}</div>
            </div>`

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
                            get_knowledgebase(page);
                        }
                    });
                }
                jQuery("a.vp-a").YouTubePopUp();

                $('.loading').hide();
            },
        });

    }
    $(document).ready(function() {
        // if (kw !==''){
            get_knowledgebase()
        // }
        $('.search-window input').bind('keydown', function (event) {
            var event = window.event || arguments.callee.caller.arguments[0];
            if (event.keyCode == 13){
                get_knowledgebase()
            }
        });
        $('.search-window button').on('click',function (){
            get_knowledgebase()
        })

    })
</script>