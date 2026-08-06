<div id="toc" class="toc"></div>
<script>
(function($) {
    $(document).ready(function () {
      const list = []
      let defaultIndex = -1
      // 获取所有 h2 和 h3 标题元素
      const headings = $('.blog-content').find('h2, h3')

      headings.each(function(index, ele) {
        // 为每个标题元素添加 id
        $(ele).attr('id', 'm-toc-' + index)
        const tagName = $(ele).prop('tagName')
        if(tagName == 'H2') {
          defaultIndex += 1
          list.push({
            href: '#'+ $(ele).attr('id'),
            text: $(ele).text(),
            children: []
          })
        }else {
          list[defaultIndex].children.push({
            href: '#'+ $(ele).attr('id'),
            text: $(ele).text()
          })
        }
      })

      // 生成目录
      const toc = $('#toc')
      const ul = $('<ul class="first-level"></ul>')
      list.forEach(item => {
        const li = $('<li></li>')
        li.append(`<a href="${item.href}" rel="nofollow, noindex">${item.text}</a>`)
        if(item.children.length > 0) {
          const ul2 = $('<ul class="second-level"></ul>')
          item.children.forEach(item2 => {
            const li2 = $('<li></li>')
            li2.append(`<a href="${item2.href}" rel="nofollow, noindex">${item2.text}</a>`)
            ul2.append(li2)
          })
          li.append(ul2)
        }
        ul.append(li)
      })
      toc.append(ul)

      // 监听滚动事件
      $(window).scroll(function() {
        const scrollTop = $(window).scrollTop()
        const headings = $('.blog-content').find('h2, h3')
        let current = null
        headings.each(function(index, ele) {
          const offsetTop = $(ele).offset().top
          if(offsetTop - scrollTop > 0) {
            current = ele
            return false
          }
        })
        if(current) {
          const id = $(current).attr('id')
          toc.find('a').removeClass('active')
          toc.find(`a[href="#${id}"]`).addClass('active')
        }
      })

      // 监听点击事件
      toc.find('a').click(function() {
        toc.find('a').removeClass('active')
        $(this).addClass('active')
        const href = $(this).attr('href')
        const height = $(href).height()
        const offsetTop = $(href).offset().top
        $('html, body').animate({
          scrollTop: offsetTop - height - 30
        }, 800)
      })

      // 折叠二级目录
      toc.find('.first-level > li ').click(function(e) {
        const target = e.target
        if(e.target.tagName == 'A') {
          return false
        }
        $(this).siblings().removeClass('active')
        $(this).toggleClass('active')
      })

      // 默认展开第一个一级目录
      // toc.find('.first-level > li:first-child').addclass('active')
      toc.find('.first-level > li').each(function(index,ele) {
        if($(ele).find('.second-level').length > 0) {
          $(ele).addClass('active')
          return false
        }
      })
    })
  })(jQuery)

</script>