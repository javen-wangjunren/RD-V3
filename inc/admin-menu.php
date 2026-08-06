<?php
if (is_admin()) {
    function admin_menu_rules() {
        $rules = [
            [
                'menu' => 'cfdb7-list.php',
                'submenus' => ['cfdb7-list.php','cfdb7-forms.php','cfdb7-settings.php'],
                'allow_cap' => null
            ],
        ];
        return apply_filters('admin_menu_rules', $rules);
    }
    function hide_admin_menus() {
        $rules = admin_menu_rules();
        if (!is_array($rules) || empty($rules)) return;
        foreach ($rules as $r) {
            if (!empty($r['allow_cap']) && current_user_can($r['allow_cap'])) {
                continue;
            }
            if (!empty($r['menu'])) {
                remove_menu_page($r['menu']);
                if (!empty($r['submenus']) && is_array($r['submenus'])) {
                    foreach ($r['submenus'] as $sm) {
                        remove_submenu_page($r['menu'], $sm);
                    }
                }
            }
        }
    }
    add_action('admin_menu', 'hide_admin_menus', 9999);
}
