<!-- 板块在当前页面（/knowledge-base/）进行搜索 -->
<?php

$kw = $_GET['kw']?:'';
?>
<div class="knowledge-search">
    <form action="/knowledge-base/" onsubmit="return false">
        <input type="text" placeholder="Search..." name="kw" value="<?php echo  $kw ?>">
        <button><i class="fas fa-search"></i></button>
    </form>
    <div class="search-result-wrap second-wrap">
        <div class="grid-container">
            <div class="grid-item post-item-2" style="display: none">
                <a href="javascript:;">
                    <img src="/wp-content/uploads/2022/05/Mask-group-31.jpg" alt="">
                </a>
                <div class="content">
                    <h3><a href="javascript:;">Case Name 01</a></h3>
                    <p>We follow a strict quality control system to ensure only the superior quality prototypes and finished parts can leave the factory and guarantee you peace of mind purchasing.</p>
                </div>
                <div class="post-date">March 3, 2022</div>
            </div>
        </div>
        <div class="pagination">

        </div>
    </div>
</div>

<script>
    var $ = jQuery;
    //var kw = '<?php //echo  $kw ?>//';
    function get_knowledgebase(page=1) {
        //处理参数
        var kw = $('.knowledge-search input').val()
        $.ajax({
           url: "/wp-admin/admin-ajax.php",

            dataType : 'json',
            type:'get',
            data:{
                'kw':kw,
                'page':page,
                                      'action': 'knowledgebase_list',
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
            get_knowledgebase()
        // $('.knowledge-search input').bind('keydown', function (event) {
        //     var event = window.event || arguments.callee.caller.arguments[0];
        //     if (event.keyCode == 13){
        //         get_knowledgebase()
        //     }
        // });
        $('.knowledge-search button').on('click',function (){
            get_knowledgebase()
        })
    })
</script>