<?php
$services = get_terms(["taxonomy" => "services", "hide_empty" => false, "parent" => 0]);
$industries = get_terms(["taxonomy" => "industries", "hide_empty" => false, "parent" => 0]);

?>

<div class="cases-categories">
    <div class="flex-container">
        <div class="left">
            <div class="category">
                <h2>Category</h2>
                <div class="type-list">
                    <div class="type-item" id="services">
                        <h4>Services</h4>
                        <ul>
                            <?php foreach ($services as $service) { ?>
                                <li service="<?php echo $service->slug ?>" class="">
                                    <div class="icon-wrap"><i class="far fa-dot-circle"></i><i
                                                class="far far fa-circle"></i></div>
                                    <p><?php echo $service->name ?></p>
                                </li>
                            <?php } ?>

                        </ul>
                    </div>
                    <div class="type-item" id="industries">
                        <h4>Industries</h4>
                        <ul>
                            <?php foreach ($industries as $service) { ?>
                                <li industries="<?php echo $service->slug ?>" class="">
                                    <div class="icon-wrap"><i class="far fa-dot-circle"></i><i
                                                class="far far fa-circle"></i></div>
                                    <p><?php echo $service->name ?></p>
                                </li>
                            <?php } ?>

                        </ul>
                    </div>

                </div>
                <div class="btn-wrap">
                    <a href="javascript:;" class="clear"><i class="fas fa-times"></i> Clear Filter</a>
                </div>
            </div>
            <div class="email-form-wrap">
                <?php echo do_shortcode('[contact-form-7 id="955" title="email form"]') ?>
            </div>
        </div>
        <div class="right">
            <div class="grid-container">
                <div class="grid-item post-item-2" style="display: none">
                    <a href="javascript:;">
                        <img src="/wp-content/uploads/2022/05/Mask-group-31.jpg" alt="">
                    </a>
                    <div class="content">
                        <h3><a href="javascript:;">Case Name 01</a></h3>
                        <p>We follow a strict quality control system to ensure only the superior quality prototypes and
                            finished parts can leave the factory and guarantee you peace of mind purchasing.guarantee
                            you peace of mind purchasing.</p>
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
    var industries = '';
    var services = '';
    function get_cases(page=1) {
        //处理参数
        services = $('#services li.active').eq(0).attr('service')
        industries = $('#industries li.active').eq(0).attr('industries')


        $.ajax({
                        url: "/wp-admin/admin-ajax.php",

            dataType : 'json',
            type:'get',
            data:{
                'industries':industries,
                'services':services,
                'page':page,
                                'action': 'cases_list',

                // 'per_page':per_page
            },
            success:function (data) {
                var html = '';
                if (data.data.length >0){
                    var arr = data.data;
                    for (var i=0;i<data.data.length;i++){
                        // arr[i].

                        // html +='<div class="grid-item"><a href="'+arr[i].jump_url+'"><img src="'+arr[i].img+'" alt="'+arr[i].alt+'"><h3>'+arr[i].name+'</h3></a></div>';

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
                            get_cases(page);
                        }
                    });
                }
                jQuery("a.vp-a").YouTubePopUp();

                $('.loading').hide();
            },
        });

    }
    $(document).ready(function() {
        get_cases()
        $('.type-list li').on('click',function (){
            get_cases()
        })
    })
</script>