# 3D Printing Materials 聚合页：Filter/Search 实现方案梳理（不建 Materials CPT）

更新时间：2026-06-23  
适用范围：当前站点材料详情页为 **Page**（例如 `/material/cnc-machining/aluminum-7075`），短期目标是做一个 **3D Printing Materials 聚合页**用于分发到材料详情页（如 `ABS 3D printing`、`PLA 3D printing` 等）。当前阶段：3D Printing 材料页尚未上线（从 0 开始持续新增）。

---

## 1. 目标与约束

### 1.1 目标

- 聚合页作为“材料库入口”，承载 40+ 材料的快速发现：按名称搜索、按类型/工艺筛选、快速跳转到材料详情页
- 支持“一个材料可用于多个工艺”的展示与筛选
- 后台维护成本低：非技术同学可维护材料列表与分类信息
- 不引入重型插件与复杂数据迁移（不强制建设 `materials` CPT）

### 1.2 约束与现状

- 现有材料详情多为 **Page**，URL 已上线，短期不适合做 CPT 迁移与重定向
- URL 规划建议采用无空格 slug（WordPress 会自动转为 `-` 或被 URL encode）：  
  - 聚合页（Hub）：`/material/3d-printing/`  
  - 单材料页：`/material/3d-printing/abs/`  
  - CNC 现有：`/material/cnc-machining/aluminum-7075/`（保持不动）
- 主题强依赖 ACF，并已配置 ACF Local JSON save/load 路径到主题的 `/acf-json`：  
  参考：[acf-setup.php](file:///Users/javen/Desktop/Javen%20Project/mml-theme/inc/acf-setup.php#L14-L45)
- 主题已有短代码体系，新增聚合页组件最贴近现有习惯：  
  参考：[functions.php require shortcodes](file:///Users/javen/Desktop/Javen%20Project/mml-theme/functions.php#L124-L141)、[nested-tabs shortcode](file:///Users/javen/Desktop/Javen%20Project/mml-theme/shortcodes/_nested-tabs.php)

---

## 2. 方案总览（按开发/维护成本从低到高）

### 方案 A（推荐 MVP）：ACF 维护“材料目录”，前端纯 JS Filter/Search（Client-side）

**核心思想**：不改变现有材料详情页类型；在后台用 ACF 维护一个“材料目录（Materials Directory）”，聚合页渲染全部卡片，然后用前端 JS 完成搜索/筛选。

#### A1. 数据放在哪：Option Page vs 聚合页本身

- **A1-1：ACF Option Page 存“材料目录”**
  - 优点：材料目录数据不绑定某个页面；未来做 “All Materials”/“按工艺聚合页”可复用同一份数据
  - 缺点：需要新增一个 ACF Options Sub Page（当前已有 General Settings 的 options page，可扩展）
- **A1-2（当前阶段更推荐）：聚合页 Page 上挂字段（ACF Field Group 绑定到该 Page）**
  - 优点：实现最快（只做一个页面）
  - 缺点：后续复用困难；如果多个聚合页需要同一份目录，会重复维护

补充说明（为什么当前阶段推荐 A1-2）：
- 目前 3D Printing 材料页尚未上线，从 0 开始新增，优先目标是把 `/material/3d-printing/` 作为“分发入口”快速上线
- A1-2 让你先把页面结构、前端 filter/search 交互跑通，未来再把数据源上移到 Options（A1-1）或演进到“自动拉取”（方案 B）不会推翻前端组件

#### A2. 后台字段结构（建议）

字段组：`3D Printing Materials Directory`

顶层字段：
- `materials`（Repeater）
  - `title`（Text）材料名（显示用）
  - `aliases`（Text）别名/关键词（用于搜索，建议用逗号分隔：`abs, abs-cf, abs cf`）
  - `permalink`（URL 或 Post Object）材料详情页链接（建议 Post Object 指向 Page，避免手填错误）
  - `cover_image`（Image）聚合页卡片图
  - `material_type`（Select）Metal / Plastic / Resin / Composite（用于 Tab 或过滤）
  - `processes`（Checkbox）FDM / SLA / SLS / SLM / DLP / MJF ...（用于过滤；支持多选）
  - `highlights`（Repeater 或 Checkbox）2-3 个短标签（如 High Strength / Heat Resistant / Smooth Surface）
  - `sort`（Number，可选）用于手动排序（默认为 0）

#### A3. 前端实现方式（建议“渐进增强”，兼顾 SEO）

- 服务端（PHP）先把 **全部材料卡片**输出成 HTML（搜索引擎能直接抓到内容）
- 同时在页面里输出一份 JSON 数据（可放在 `script[type="application/json"]` 或 data 属性）
- JS 在浏览器端做：
  - search：按 `title + aliases` 做包含匹配（40 条量级，O(n) 足够）
  - filters：按 `material_type`、`processes` 做多条件过滤
  - counts：Tab 上显示每个类型数量（过滤后动态刷新可选）

这种方式的好处是：
- 不需要任何 AJAX/REST，功能稳定、实现快
- 不需要改动站点数据结构（仍然是 Page）
- 过滤/搜索对 40+ 条目性能完全足够

#### A4. URL 与状态（可选增强）

为了可分享与可追踪，可选把筛选状态同步到 URL：
- `?q=abs&type=plastic&process=fdm,sla`
- 页面加载时读取 query params 初始化状态

---

### 方案 B（折中升级）：给“材料详情 Page”加结构化字段，聚合页自动拉取（Server-side + 可选 AJAX）

**核心思想**：仍然不建 CPT，但把每个材料 Page 变成“结构化数据源”。聚合页自动查询这些 Page 并生成列表，减少维护目录的重复工作。

#### B1. 实现方式

- 对材料 Page 增加统一的 ACF 字段组（material_type、processes、cover_image、aliases、highlights 等）
- 聚合页通过 `WP_Query` 拉取这些 Page（可按父页面、模板、特定 meta 字段筛选）
- Filter/Search 两种做法：
  - **B1-1：仍然 client-side**（聚合页一次性输出全部材料数据，JS 过滤）
  - **B1-2：AJAX/REST 动态查询**（筛选条件变更时请求后端，返回列表 HTML/JSON）

#### B2. 成本与风险

- 需要对现有 40+ Page 进行字段补全（工作量可控，但需要流程）
- 后端过滤（AJAX/REST）会增加开发与稳定性成本，但可为后续“分页/大规模/性能”做准备

---

### 方案 C（无需 ACF）：对 Page 启用 Taxonomy（material_type / material_process）

**核心思想**：不建 CPT，不用 ACF，也能实现“结构化分类 + 查询”。

- WordPress 支持给 `page` 绑定自定义 taxonomy（后台可直接勾选 term）
- 聚合页通过 `tax_query` 过滤
- 搜索用 WP 原生 `s`（或 client-side）

优点：
- 数据模型更接近 WP 原生，后续迁移到 CPT 成本更低
- 不依赖 ACF 字段组版本化（但仍可用 ACF 做额外字段）

缺点：
- UI/维护体验取决于后台 taxonomy 管理是否“足够友好”
- 如果你团队习惯 ACF，taxonomy 会有适应成本

---

## 3. 推荐路径（结合“只做分发 + 快速上线 + 未来可扩展”）

### 3.1 推荐结论

- **MVP 推荐：方案 A1-2（聚合页字段）+ client-side Filter/Search（渐进增强）**
- 中期（材料增多、维护开始痛）：
  - 数据复用需求出现：将目录数据上移到 Options（A1-1），多个聚合页复用同一份目录
  - 或希望“只维护材料详情页”：演进到方案 B（材料详情页结构化字段，聚合页自动拉取）
- 长期若要“真正材料库系统”（可筛选、可归档、可自动聚合、可复用模板）：再评估 CPT（不在本方案范围）

### 3.2 为什么 MVP 选 A

- 不需要先把材料页结构化、也不需要上 REST/AJAX，就能把“入口页 + 搜索/筛选”交付上线
- Filter/Search 不依赖后端接口与缓存策略，稳定性高
- 后续迁移到 B/C 也不会推翻前端组件（数据源替换即可）

---

## 4. 页面信息架构（聚合页作为“发现入口”）

### 4.1 页面模块建议

- Header：标题 + 一句话定位 + CTA（Request Quote）
- Controls（核心）：Search input + Filter chips（Process / Type / Highlights 可选）
- Tabs（可选）：All / Metals / Plastics / Resins / Composites（作为快捷视图）
- Grid：材料卡片网格（图片 1:1 + 名称 + 工艺标签 + 1-2 个亮点标签）
- Footer：Explore by Process（跳到工艺页）+ 全局 CTA

### 4.2 卡片信息密度建议（避免“CNC materials 长表格”问题）

每张卡片建议只展示：
- 图片 + 名称
- 工艺 tags（多选显示，用于表达“跨工艺可用”）
- 1-2 个 highlights（帮助用户快速判断）

不要在聚合页塞 lead time / wall thickness / price 等长表格信息；这些放到材料详情页或工艺页。

---

## 5. 实现落地建议（主题内的具体承载方式）

### 5.0 页面与 URL 结构（建议按层级 Page 组织）

- 创建父级 Page：`material`（如果已存在则跳过）
- 创建子页面（CNC）：`cnc-machining`（已存在则跳过）
- 创建子页面（3D Printing Hub）：`3d-printing`  
  - 该页面就是 `/material/3d-printing/`，挂本方案 A1-2 的字段组
- 未来每新增一个 3D 材料页：
  - 在 `3d-printing` 下创建子页面：`abs`、`pla`、`pa12` ...  
  - URL 自动为 `/material/3d-printing/abs/`

### 5.1 承载形式

建议以短代码承载，原因：
- 主题已有短代码体系，维护习惯一致
- 可被 Elementor/页面内容块插入

参考现有结构：
- 短代码文件放 `shortcodes/`，并由 `functions.php` require：  
  [functions.php](file:///Users/javen/Desktop/Javen%20Project/mml-theme/functions.php#L124-L141)

建议新增：
- `shortcodes/_material-library.php`（输出模块 HTML + JSON 数据壳）
- 同时在前端 enqueue 一段 JS（可独立文件或合入现有打包，视当前构建策略决定）

### 5.2 前端 JS 要点（MVP 版本）

- 输入框：`input` 事件 + debounce（150-250ms）
- 匹配字段：`title` + `aliases`（统一 lower-case）
- 过滤：type 多选 + process 多选（都用 AND 逻辑；同维度内用 OR）
- 渲染策略（两种都可）：
  - **推荐：服务端渲染全部卡片，JS 仅做 show/hide**（改动最小，SEO 友好）
  - 或 JS 全量渲染（更灵活，但 SEO 依赖 JS，且更容易引入渲染差异）

### 5.3 ACF JSON 同步建议（强烈建议做）

主题已配置 ACF Local JSON，但仓库中缺少 `acf-json/` 的字段组文件。建议：
- 在开发环境导出/同步字段组到 `/acf-json`
- 将该目录纳入版本控制

路径配置参考：[acf-setup.php](file:///Users/javen/Desktop/Javen%20Project/mml-theme/inc/acf-setup.php#L14-L45)

这样后续多人协作与迁移环境不会丢字段结构。

---

## 6. 里程碑（按“最小可用”拆分）

### M1：MVP（1 个聚合页可用）

- 后台可维护材料目录（当前建议聚合页字段）
- 聚合页网格展示 40+ 材料（图片+名称+tags）
- 支持：
  - 关键词搜索（title/aliases）
  - type 过滤（Metal/Plastic/Resin/Composite）
  - process 过滤（多选）

### M2：可分享与更好用

- URL 同步（query params），可复制链接分享当前筛选结果
- Tab 数量统计（动态 count）
- 空状态（无结果提示 + 清除筛选）

### M3：结构化复用（可选）

- 演进到方案 B：材料详情页字段化，聚合页自动拉取数据，减少手工目录维护
