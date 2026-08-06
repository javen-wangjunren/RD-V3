<?php

/**
 * Section 的基类（抽象类）。
 *
 * 代码顺序：
 *     抽象类定义
 *            实例属性
 *            抽象方法
 *     静态属性
 *     构造函数
 *     实例函数
 *     静态函数
 */
abstract class MML_Section_Base {

	/**
	 * 唯一标识。每个 Section 都需要一个唯一标识。可设置为 css class ，也可设置为 HTML 标签的 id 属性。
	 *
	 * String
	 */
	protected $id;

	/**
	 * 样式参数。跟样式有关的设定通过这个参数传递。如颜色、尺寸等。
	 *
	 * Array
	 */
	protected $style;

	/**
	 * 内容参数。跟内容有关的设定通过这个参数进行传递。如文案、图片等。
	 *
	 * Array
	 */
	protected $content;

	/**
	 * 设置默认值
	 */
	abstract protected function set_default_value();

	/**
	 * 输出 <style></style> 的相关内容。
	 */
	abstract public function style();

	/**
	 * 输出 HTML 结构
	 */
	abstract public function html();

	/**
	 * 输出对应的 Javascript 。
	 */
	abstract public function script();

	// abstract public function get_style_args();
	// abstract public function get_content_args();

	public static $dir = 'sections';

	/**
	 * 构造函数。
	 *
	 * @param String $id 必填。唯一标识。
	 * @param Array $style 选填。样式参数。默认值由各个子类决定。
	 * @param Array $content 选填。内容参数。默认值由各个子类决定。
	 */
	function __construct($id, $style, $content) {
		$this->id = $id;
		if (is_array($style)) {
			$this->style = $style;
		} else {
			$this->style = [];
		}
		if (is_array($content)) {
			$this->content = $content;
		} else {
			$this->content = [];
		}
		$this->set_default_value();
		$this->set_default_style('class', '');
		$this->set_default_style('bg_color', '');
		$this->set_default_style('bg_image', '');
		$this->set_default_style('background_attachment', '');
		$this->set_default_style('margin_top', '');
		$this->set_default_style('padding_top', '');
		$this->set_default_style('padding_bottom', '');
		$this->set_default_style('margin_bottom', '');
		$this->set_default_style('title_color', '#333');
		$this->set_default_style('subtitle_color', '#666');
		$this->set_default_style('desc_color', '#808080');
		$this->set_default_style('custom_css', '');
		$this->set_default_content('title', 'Title');
		$this->set_default_content('subtitle', 'Sub Title');
		$this->set_default_content('desc', 'This is the description.');
	}

	protected function import_css ($name = '') {
		// echo $this->get_name();
		if (!$name) {
			$name = static::class;
		}
		$file = self::get_dir().$name.'/'.$name.'.css';
		$content = file_get_contents($file);
		return preg_replace('/_id_/', $this->id, $content);
	}

	protected function get_html_tag ($tag, $attrs, $content = '', $auto_close = false) {
		$html = '';

		$html .= "<$tag";

		foreach ($attrs as $key => $value) {
			$html .= " $key=";
			$html .= '"';
			$html .= $value;
			$html .= '"';
		}

		if ($auto_close) {
			$html .= ' />';
		} else {
			$html .= ">$content";
			$html .= "</$tag>";
		}
		return $html;
	}

	protected function display_tag_img ($src, $alt = '', $css_class = '') {
		if (strpos($src, 'uploads') > -1) {
			if (function_exists('getImageAlt')) {
				$alt = getImageAlt($src);
			}
		}
		echo $this->get_html_tag('img', [
			'class' => 'lazyload ' . $css_class,
			'src' => 'data:image/gif;base64,R0lGODdhAQABAPAAAP///wAAACwAAAAAAQABAEACAkQBADs=',
			'alt' => $alt,
			'data-src' => $src,
		], '', true);
	}

	/**
	 * echo id
	 */
	protected function eid () {
		echo $this->id;
	}

	/**
	 * echo style
	 */
	protected function est ($key) {
		echo $this->gst($key);
	}

	/**
	 * echo content
	 */
	protected function eco ($key) {
		_e($this->gco($key));
	}

	
	/**
	 * get content
	 */
	protected function gco ($key) {
		return $this->gcos($key, $this->content);
	}

	/**
	 * get style
	 */
	protected function gst ($key) {
		return $this->gcos($key, $this->style);
	}

	/**
	 * set default style
	 */
	protected function init_style ($default_style) {
		$this->style = $this->inherit_data($this->style, $default_style);
	}

	/**
	 * set default content
	 */
	protected function init_content ($default_content) {
		$this->content = $this->inherit_data($this->content, $default_content);
	}

	protected function css_margin_top () {
		if (isset($this->style['margin_top']) && $this->style['margin_top']) {
			echo 'margin-top: ' . $this->style['margin_top'] . ';' . "\n";
		}
	}

	protected function css_padding_top () {
		if (isset($this->style['padding_top']) && $this->style['padding_top']) {
			echo 'padding-top: ' . $this->style['padding_top'] . ';' . "\n";
		}
	}

	protected function css_padding_bottom () {
		if (isset($this->style['padding_bottom']) && $this->style['padding_bottom']) {
			echo 'padding-bottom: ' . $this->style['padding_bottom'] . ';' . "\n";
		}
	}

	protected function css_margin_bottom () {
		if (isset($this->style['margin_bottom']) && $this->style['margin_bottom']) {
			echo 'margin-bottom: ' . $this->style['margin_bottom'] . ';' . "\n";
		}
	}

	protected function css_bg_color () {
		if (isset($this->style['bg_color']) && $this->style['bg_color']) {
			echo 'background-color: ' . $this->style['bg_color'] . ';' . "\n";
		}
	}

	protected function css_attr ($css_key, $style_key) {
		if (isset($this->style[$style_key]) && $this->style[$style_key]) {
			echo "$css_key: " . $this->style[$style_key] . ';' . "\n";
		}
	}

	protected function css_attr_color ($style_key) {
		$this->css_attr('color', $style_key);
	}

	protected function css_custom () {
		if (isset($this->style['custom_css']) && $this->style['custom_css']) {
			echo $this->style['custom_css'];
		}
	}

	protected function css_bg_image () {
		if (isset($this->style['bg_image']) && $this->style['bg_image']) {
			echo 'background-image: url(' . $this->style['bg_image'] . ');' . "\n";
			echo 'background-repeat: no-repeat;' . "\n";
			echo 'background-position: center;' . "\n";
			echo '-webkit-background-size: cover;' . "\n";
			echo 'background-size: cover;' . "\n";
			if (!empty($this->style['background_attachment'])) {
				echo 'background-attachment: ' . $this->style['background_attachment'] . ";\n";
			}
		}
	}

	/**
	 * Set default value if the value is not set.
	 */
	protected function set_default_style ($key, $value) {
		if (!isset($this->style[$key])) {
			$this->style[$key] = $value;
		}
	}

	/**
	 * Set default value if the value is not set.
	 */
	protected function set_default_content ($key, $value) {
		if (!isset($this->content[$key])) {
			$this->content[$key] = $value;
		}
	}

	protected function get_name_class () {
		return preg_replace('/_/', '-', strtolower(static::class));
	}

	protected function echo_default_classes () {
		$this->eid();
		echo ' ';
		echo $this->get_name_class();
		echo ' mml-section';
		if (isset($this->style['class']) && $this->style['class']) {
			echo ' ';
			echo $this->style['class'];
		}
	}

	protected function has_content($key) {
		return (bool)$this->gco($key);
	}

	/**
	 * 设置列数。不调用此方法，是不会添加 'columns' 到 style 数组的。 (除非是从参数传进来。)
	 */
	protected function set_style_columns ($default_columns = 3) {
		if (!isset($this->style['columns'])) { // 如果未传参，则设为默认值。
			$this->style['columns'] = $default_columns;
		}
		if (!is_numeric($this->style['columns'])) { // 如果参数不是数值，改为默认值。
			$this->style['columns'] = $default_columns;
		}
	}

	/**
	 * 输出 mml-cols-* 类(css class)
	 */
	protected function echo_columns_class () {
		if (empty($this->style['columns'])) { // 未设值，不输出。
			return;
		}
		if (!is_numeric($this->style['columns'])) { // 不是数值，不输出。
			return;
		}
		$col = intval($this->style['columns']);
		if ($col < 2 || $col > 10) { // 仅支持 mml-cols-2 至 mml-cols-10 ，其他值不输出。
			return;
		}
		echo 'mml-cols-' . $col;
	}

	public function get_style_args () {
		$result = [];
		foreach ($this->style as $key => $value) {
			$arg = [
				'key' => $key,
				'type' => is_string($value) || is_int($value)
					? 'text'
					: (is_array($value)
						? 'array'
						: ''),
				'desc' => '',
				'default_value' => ''.$value,
			];
			$result[] = $arg;
		}
		return $result;
	}

	public function get_content_args () {
		$result = [];
		foreach ($this->content as $key => $value) {
			$arg = [
				'key' => $key,
				'type' => is_string($value)
					? 'text'
					: (is_array($value)
						? 'array'
						: ''),
				'desc' => '',
				'default_value' => $value,
			];
			if ($arg['type'] === 'array') {
				$arr = [];
				$item = $value[0];
				foreach ($item as $k => $v) {
					$arr[] = [
						'key' => $k,
						'default_value' => $v
					];
				}
				$arg['items'] = $arr;
			}
			$result[] = $arg;
		}
		return $result;
	}

	public static function get_dir () {
		return get_template_directory() . '/sections/';
	}

	public static function get_file ($name, $load = true) {
		$dir = self::$dir;
		return locate_template("$dir/$name/$name.php", $load, $load);
	}

	/**
	 * get content or style
	 */
	private function gcos ($key, $cos) {
		$keys = explode('.', $key);
		foreach ($keys as $k) {
			if (isset($cos[$k])) {
				$cos = $cos[$k];
			} else {
				$cos = '';
				break;
			}
		}

		return $cos;
	}

	private function inherit_data( $arr, $meta ) {
		if ( is_array( $meta ) && $meta ) {
			$meta_copy = $meta;

			foreach ( $meta as $k => $v ) {
				if ( is_int( $k ) ) {	//当 $meta 为二维数组时，$meta 的数量适应 $arr的数量
					$arr_num = count( $arr );
					$meta_num = count( $meta_copy );
					if ( $meta_num > $arr_num ) {
						$meta_copy = array_slice( $meta_copy, 0, $arr_num );
					}
				}

				if ( isset( $meta_copy[$k] ) ) {
					if ( !isset( $arr[$k] ) || gettype( $arr[$k] ) != gettype( $v ) ) {	//键不存在或是数据类型不同以 $meta 为准，经处理键值数据类型一致
						$arr[$k] = $v;
					}

					if ( $arr[$k] != $meta_copy[$k] && is_array( $arr[$k] ) ) {	//键值数组类型递归处理，键值都相等直接跳过
						$arr[$k] = $this->inherit_data( $arr[$k], $meta_copy[$k] );
					}
				}
			}
		}
		return $arr;
	}
	
}
