# 团队规范：Elementor 页面用 HTML 还是 Widget（RapidDirect WordPress）

更新时间：2026-06-25  
适用范围：RapidDirect 站点（WordPress + Elementor + 自研 Widgets 插件 `rd-elementor-widgets`）

---

## 1. 目的（为什么要立这个规范）

- 让页面交付速度快、还原度高，同时避免后续维护成本失控
- 明确哪些模块可以用「HTML 粘贴」快速落地，哪些必须做成 Widget/短代码组件
- 避免常见线上事故：白屏（fatal）、样式串台、缓存不生效、重复改 N 处、图片 URL 手动维护灾难

---

## 2. 一句话决策（优先级规则）

- **展示型 / 一次性 / 静态内容 → HTML 模块优先**
- **数据型 / 可复用 / 有状态交互 → Widget（或短代码）优先**

如果拿不准：先按「未来是否会反复维护」判断。会维护 → 不要用纯 HTML。

---

## 3. 什么时候可以用 HTML（允许范围）

满足以下条件时，允许使用 Elementor 的 HTML 小部件粘贴 AI 生成的 HTML：

- **只用于一个页面**（不需要在多个页面复用）
- **内容基本静态**：文案/图片/按钮，最多轻交互（横向滚动提示、简单 hover）
- **未来迭代频率低**：活动页、营销页、短周期 landing page
- **不依赖结构化数据**：不会出现 30+ 条目需要持续新增/筛选/分页的维护场景

典型适用：
- 营销展示模块（Hero、Feature list、静态 gallery、单 CTA 区块）

---

## 4. 什么时候必须做成 Widget（强制范围）

满足任一条件，就 **不得** 使用纯 HTML 粘贴方式，必须组件化（Widget 或短代码）：

- **内容是“列表型数据”且会持续增长**（例如材料库、案例库、对比表、FAQ）
- **存在状态交互**：
  - Search / Filter / Tabs / Pagination
  - URL 参数同步（`?q=`、`?process=`）
  - 多实例隔离要求（同页放多个模块）
- **需要复用**（同模块多个页面出现，或未来高概率复制）
- **需要版本化治理**：希望一次改动全站生效（样式、交互、可访问性）
- **涉及复杂脚本**（避免在 HTML 模块里塞大量 inline JS）

典型必须组件化：
- Material Library（筛选+分页+URL 状态）
- Tooling process / showcase 等交互组件

---

## 5. HTML 模块的硬性约束（必须遵守）

### 5.1 禁止全局 ID（防串台）

- HTML 模块内 **禁止** 使用固定 `id`（例如 `id="gallery"`）
- 如确需定位：使用 class + 在模块根节点挂唯一前缀（例如 `.rd-ai3d-generator`）并限定选择范围

### 5.2 CSS 必须 scope（防污染）

- CSS 必须以模块根节点开头，如：
  - `.rd-ai3d-generator ...`
- 禁止写 `body`, `h1`, `.elementor *` 这类全局选择器

### 5.3 禁止内联大段 `<script>`（或必须实例隔离）

- 原则：复杂交互不要在 HTML 模块里写 `<script>`
- 若确需 JS：必须限定在本模块根节点内查找元素，不能 `document.querySelector('#xxx')` 直接全局拿

### 5.4 图片与资源不可“手工替换 URL”作为长期工作流

允许在早期 PoC 里直接写 URL，但进入上线维护期必须改成可维护策略（见第 6 节）。

---

## 6. 图片/资源维护规范（解决“改 URL 很麻烦”）

### 6.1 优先使用 Elementor 原生控件管理图片

只要模块里图片是“可替换资源”，优先用 Elementor 的 Image/Gallery 控件，而不是硬写 `<img src="...">`。

### 6.2 如果必须用 HTML：用“占位标记 + 替换表”工作流

推荐在 HTML 里写占位标记：

```html
<img src="{{IMG_speaker}}" alt="..." />
```

并在同一页面（或同一文档）维护一个替换表：

```text
IMG_speaker = https://.../speaker.jpg
IMG_robot   = https://.../robot.jpg
```

这样改图时只改表，不改一堆 HTML。

### 6.3 图片规格统一（避免视觉与性能失控）

- 列表/卡片类图片：推荐 1:1，至少 800×800，推荐 1200×1200
- 单张大小控制（经验值）：150–350KB（WebP 优先）
- 背景色统一：推荐使用 `#F0F2F5` 或全站 `--img-bg`

---

## 7. 发布与排障最低 SOP（避免线上事故）

### 7.1 发布前（尤其是插件/Widget）

- **整包上传**：不要只上传主文件，必须同时上传 `widgets/` 与 `assets/` 依赖
- 强制核对：
  - `rd-elementor-widgets.php`
  - `widgets/*.php`
  - `assets/*.css/js`

### 7.2 缓存与版本号（避免“改了不生效”）

- 资源必须带版本号（推荐 filemtime），避免 `?ver=0.1.0` 永久缓存
- Cloudways 发布后：Purge cache + 必要时清 OPcache / 重启 PHP-FPM

### 7.3 白屏排查优先级

出现整站白屏 / Elementor 空白：

1) Cloudways / Nginx / PHP error log（优先）  
2) 浏览器 Network 主文档 response 是否被截断  
3) `wp-content/debug.log`（不保证可靠）  
4) 再进代码排查（include/register 二分）

---

## 8. 推荐落地方式（给团队的默认选择）

- 静态营销页：
  - 可用 HTML 模块快速实现
  - 但遵守 scope/无 ID/资源替换表规范
- 结构化目录页（Materials / Cases / Tools）：
  - 默认走 Widget
  - 数据在 Elementor Repeater 或 ACF（按实际维护成本演进）

---

## 9. 复盘结论（本项目经验）

- “新增组件后白屏”不代表新组件代码有问题，常见是 **部署不完整（漏传依赖文件）** 被触发
- WordPress 白屏类问题：**服务器 error log > wp debug.log > 浏览器 console**

