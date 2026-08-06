<?php
/**
 * 用于使用 Elementor 开发的定制化项目
 *
 * 目前实现的功能如下
 *     创建 Portfolio 时，自动创建对应的 Page 。有对应层级。编辑时可修改。
 *     访问 Portfolio Category 页面时自动跳转到对应的 Page。
 */

defined('ABSPATH') || die;

add_action( 'init', [ MML_For_Elementor_Projects::class, 'init' ] );

class MML_For_Elementor_Projects {
    private static $key_relative_page = 'mml_term_relative_page';
    private static $clone_page_content = 'mml_term_clone_page_content';
    private static $categories = [
        'portfolio-types',
        'product_categories',
        'category',
        'case_category',
        'news_category',
        'knowledge_base_catory'
    ];

    public static function init () {
        // 创建分类时
//        add_action('portfolio-types_add_form_fields', [ self::class, 'display_portfolio_category_relative_page_select' ]);
//        add_action('product_categories_add_form_fields', [ self::class, 'display_portfolio_category_relative_page_select' ]);
//        add_action('category_add_form_fields', [ self::class, 'display_portfolio_category_relative_page_select' ]);
//        // 创建成功
//        add_action('created_portfolio-types', [ self::class, 'create_page_for_portfolio_category' ], 10, 2);
//        add_action('created_product_categories', [ self::class, 'create_page_for_portfolio_category' ], 10, 2);
//        add_action('created_category', [ self::class, 'create_page_for_portfolio_category' ], 10, 2);
//        // 编辑分类
//        add_action('portfolio-types_edit_form', [ self::class, 'show_portfolio_category_relative_page' ], 10, 1);
//        add_action('product_categories_edit_form', [ self::class, 'show_portfolio_category_relative_page' ], 10, 1);
//        add_action('category_edit_form', [ self::class, 'show_portfolio_category_relative_page' ], 10, 1);
//        // 编辑保存
//        add_action('edited_portfolio-types', [ self::class, 'save_portfolio_category_relative_page' ], 10, 2);
//        add_action('edited_product_categories', [ self::class, 'save_portfolio_category_relative_page' ], 10, 2);
//        add_action('edited_category', [ self::class, 'save_portfolio_category_relative_page' ], 10, 2);
        //      // Portfolio Category 自动跳转到对应的 Page

        foreach (self::$categories as $category){
            add_action($category.'_add_form_fields', [ self::class, 'display_portfolio_category_relative_page_select' ]);
            add_action('created_'.$category, [ self::class, 'create_page_for_portfolio_category' ], 10, 2);
            add_action($category.'_edit_form', [ self::class, 'show_portfolio_category_relative_page' ], 10, 1);
            add_action('edited_'.$category, [ self::class, 'save_portfolio_category_relative_page' ], 10, 2);

        }

        add_action( 'wp', [ self::class, 'portfolio_category_redirect' ] );
    }

    public static function create_page_for_portfolio_category ($term_id, $term_taxonomy_id) {
        $term = get_term($term_id);

        if ($term instanceof WP_Term) {
            $page_id = isset($_POST[self::$key_relative_page]) ? $_POST[self::$key_relative_page] : '';
            $clone_page_id = isset($_POST[self::$clone_page_content]) ? $_POST[self::$clone_page_content] : '';
            if ( ! $page_id ) {
                if ($page_id === 0){//等于0 的时候不关联页面

                }else{
                    $parent = 0;
                    if ($term->parent) {
                        $parent = get_term_meta($term->parent, self::$key_relative_page, true);
                    }
                    if ($clone_page_id){
                        $page_id = self::duplicatePost($clone_page_id,$term->name,$term->slug,$parent);
                    }else{
                        $page_id = wp_insert_post([
                            'post_title' => $term->name,
                            'post_type' => 'page',
                            'post_name' => $term->slug,
                            'post_parent' => $parent,
                        ]);
                    }
                }

            }

            if ($page_id) {
                update_term_meta($term_id, self::$key_relative_page, $page_id);
            }
        }
    }

    public static function show_portfolio_category_relative_page ($term) {
        $page_id = get_term_meta($term->term_id, self::$key_relative_page, true); // string(0)"", string(2)"48"
        $page = false;
        if ($page_id) {
            $page = get_post($page_id);
        }
        $page_list = self::get_page_list();
        $list = [ get_option('page_on_front') => '首页' ,0=>'不克隆页面内容'];
        foreach ($page_list as $key => $value) {
            if ( ! $value->post_name ) { // 自动保存
                continue;
            }
            $list[$value->ID] = $value->post_title . ' (' . $value->post_name . ')' . ' ---- ' . $value->post_status;
        }
        ?><table class="form-table">
        <tbody>
        <tr class="form-field">
            <th scope="row">
                <label for="">关联页面</label>
            </th>
            <td>
                <?php echo self::get_select_html([
                    'list' => $list,
                    'attr' => [ 'name' => self::$key_relative_page ],
                    'selected' => $page_id,
                ]); ?>
                <p>用户查看该分类时，将显示该页面的内容。</p>
            </td>
        </tr>
        </tbody>
        </table><table class="form-table">
        <tbody>
        <tr class="form-field" style="display: none"><!-- 先不做编辑页面先，后期如果有需要再做-->
            <th scope="row">
                <label for="">克隆页面的内容（原内容会被替换）慎用！</label>
            </th>
            <td>
                <?php echo self::get_select_html([
                    'list' => $list,
                    'attr' => [ 'name' => self::$clone_page_content ],
                    'selected' => 0,
                ]); ?>
                <p></p>
            </td>
        </tr>
        </tbody>
        </table><?php
    }

    public static function display_portfolio_category_relative_page_select () {
        $page_list = self::get_page_list();
        $list = [ '' => '创建新页面' ];
        $home_page_id = get_option('page_on_front');
        $list[$home_page_id] = 'Home'   ;

        $clonelist = [];

        foreach ($page_list as $key => $value) {
            if ( ! $value->post_name ) {
                continue;
            }
            if ($value->ID == $home_page_id){
                continue;
            }
            $list[$value->ID] = $value->post_title . ' (' . $value->post_name . ')' . ' ---- ' . $value->post_status;
            $clonelist[$value->ID] = $value->post_title . ' (' . $value->post_name . ')' . ' ---- ' . $value->post_status;
        }
        $list[0] = '不关联页面';
        $clonelist[0] = '不克隆页面内容';

//        var_dump($list);die;
        ?><div class="form-field term-slug-wrap">
        <label for="<?php echo self::$key_relative_page; ?>">关联页面</label>
        <?php echo self::get_select_html([
            'list' => $list,
            'attr' => [ 'name' => self::$key_relative_page, 'id' => self::$key_relative_page ],
            'selected' => '',
        ]); ?>
        <p>用户查看该分类时，将显示该页面的内容。</p>

        <label for="<?php echo self::$clone_page_content; ?>">克隆页面内容</label>
        <?php echo self::get_select_html([
            'list' => $clonelist,
            'attr' => [ 'name' => self::$clone_page_content, 'id' => self::$clone_page_content ],
            'selected' => '',
        ]); ?>
        <p>只有创建新页面的时候才会生效</p>

        </div><?php
    }

    public static function save_portfolio_category_relative_page ($term_id, $term_taxonomy_id) {
        $page_id = isset($_POST[self::$key_relative_page]) ? $_POST[self::$key_relative_page] : '';
        $clone_page = isset($_POST[self::$clone_page_content]) ? $_POST[self::$clone_page_content] : '';
        if ($page_id) {
            update_term_meta($term_id, self::$key_relative_page, $page_id);

            //这里处理：编辑页克隆页面内容
            if ($clone_page !==0){

            }
        }else{
            delete_term_meta($term_id,self::$key_relative_page);
        }
    }

    public static function portfolio_category_redirect () {
		return;
        if ( is_admin() ) {
            return;
        }
        if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
            return;
        }
        $term = get_queried_object();
        if ( ! $term instanceof WP_Term) {
            return;
        }
//        if ($term->taxonomy !== 'portfolio-types' && $term->taxonomy !== 'product_categories' && $term->taxonomy !== 'category') {
//            return;
//        }

        if (!in_array($term->taxonomy,self::$categories)){
            return;
        }
        $page_id = get_term_meta($term->term_id, self::$key_relative_page, true); // string(0)"", string(2)"48"
        $url = '/';
        if ( $page_id ) {
            $url = get_permalink($page_id);
        }else{
            return;
        }

        header('HTTP/1.1 301 Moved Permanently');
        header('Location: ' . $url);
        die;
    }

    public static function get_related_term_id ( $page_id ) {
        if ( ! is_numeric( $page_id ) ) {
            echo 'wrong argument';
            return 0;
        }
        global $wpdb;
        // meta_id, term_id, meta_key, meta_value
        $sql = 'SELECT term_id FROM ' . $wpdb->prefix . 'termmeta'
            . ' WHERE meta_key = "' . self::$key_relative_page . '" AND meta_value = ' . $page_id
            . ' ORDER BY term_id ASC LIMIT 0,1';
        $result = $wpdb->get_results($sql);
        $term_id = '0';
        if ( count( $result ) > 0 ) {
            $term_id = $result[0]->term_id; // string
        }
        return intval($term_id);
    }

    // ================================ private functions ================================

    private static function get_page_list () {
        global $wpdb;
        $sql = 'SELECT ID, post_title, post_name, post_status FROM ' . $wpdb->prefix . 'posts'
            . ' WHERE post_type = "page" AND post_status <> "trash"'
            . ' ORDER BY post_title ASC';
        return $wpdb->get_results($sql);
    }

    private static function get_select_html ($args) {
        // 参数定义
        $list = isset($args['list']) ? $args['list'] : []; // 要显示的列表 [ 'value' => 'text', '值' => '要显示的文本' ]
        $attr = isset($args['attr']) ? $args['attr'] : ''; // HTML 属性
        $class = isset($args['class']) ? $args['class'] : []; // 要显示的列表 [ 'value' => 'text', '值' => '要显示的文本' ]
        $selected = isset($args['selected']) ? $args['selected'] : ''; // 选中的选项，以 value 来对比。
        $first_item = isset($args['first_item']) ? $args['first_item'] : false; // 是否添加第一个选项（默认选项） 。如果为 false ，first_item_value 和 first_item_text 将被忽略。
        $first_item_value = isset($args['first_item_value']) ? $args['first_item_value'] : ''; // 第一个选项的 value
        $first_item_text = isset($args['first_item_text']) ? $args['first_item_text'] : ''; // 第一个选项的 text

        // 规范参数
        if ( ! is_array( $list ) ) {
            $list = [];
        }
//var_dump($list);die;

        if ( ! is_array( $attr ) ) {
            $attr = [];
        }
        if ( ! is_string( $class ) ) {
            $class = '';
        }
        if ( ! is_string( $selected ) ) {
            $selected = '';
        }
        if ( ! is_string( $first_item_value ) ) {
            $first_item_value = '';
        }
        if ( ! is_string( $first_item_text ) ) {
            $first_item_text = '';
        }

        // 开始处理
        $html = '<select class="' . esc_attr($class) . '"';
        foreach ($attr as $key => $value) {
            $html .= ' ' . esc_attr($key) . '="' . esc_html($value) . '"';
        }
        $html .= '>';
        if ( $first_item ) {
            $html .= '<option value="' . esc_attr($first_item_value) . '">' . esc_html($first_item_text) . "</option>";
        }
        foreach ($list as $key => $value) {
            $html .= '<option value="' . esc_attr($key) . '"';
            if ($key == $selected) {
                $html .= ' selected';
            }
            $html .= '>' . esc_html($value) . "</option>";
        }
        $html .= '</select>';

        return $html;
    }




    private static function duplicatePost($post_id, $title,$slug,$parent){
        $post = get_post($post_id);
        $args = array(
            'comment_status' => $post->comment_status,
            'ping_status'    => $post->ping_status,
//        'post_author'    => $new_post_author,
            'post_content'   => $post->post_content,
            'post_excerpt'   => $post->post_excerpt,
            'post_name'      => $slug?:$post->post_name,
            'post_parent'    => $parent,
            'post_password'  => $post->post_password,
            'post_status'    => 'draft',
            'post_title'     => $title,
            'post_type'      => $post->post_type,
            'to_ping'        => $post->to_ping,
            'menu_order'     => $post->menu_order
        );
        $new_post_id = wp_insert_post($args);

        global $wpdb;
        $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM wp_postmeta WHERE post_id = $post_id");
        if (count($post_meta_infos)!=0){
            $sql_query = "INSERT INTO wp_postmeta (post_id, meta_key, meta_value) ";
            foreach ($post_meta_infos as $meta_info) {
                $meta_key = $meta_info->meta_key;
                if( $meta_key == '_wp_old_slug' || $meta_key == '_elementor_css' ) continue;
                $meta_value = addslashes($meta_info->meta_value);
                $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
            }
            $sql_query.= implode(" UNION ALL ", $sql_query_sel);
            $wpdb->query($sql_query);
        }
        return $new_post_id;
    }
}