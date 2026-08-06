# 站点重做可行性评估与推进建议

更新时间：2026-06-26  
适用对象：当前 `mml-theme` 站点重构评估、方案预研、立项前讨论  
配套资料：

- 主题结构审计：[theme-codebase-audit.md](file:///Users/javen/Desktop/Javen%20Project/mml-theme/doc/theme-codebase-audit.md)
- 主题主入口：[functions.php](file:///Users/javen/Desktop/Javen%20Project/mml-theme/functions.php)
- 帮助中心等现有 CPT 注册：[functions.php:L821-L938](file:///Users/javen/Desktop/Javen%20Project/mml-theme/functions.php#L821-L938)
- 主题中 GTranslate / hreflang 相关痕迹：[functions.php:L1045-L1058](file:///Users/javen/Desktop/Javen%20Project/mml-theme/functions.php#L1045-L1058)
- 主题中 301 跳转逻辑痕迹：[for-elementor-projects.php:L196-L225](file:///Users/javen/Desktop/Javen%20Project/mml-theme/inc/for-elementor-projects.php#L196-L225)

---

## 1. 结论先说

这件事 **可行，但不是“换个前端框架”这么简单**，本质上是一次：

1. 内容模型重建  
2. SEO 资产迁移  
3. 多语言与 URL 体系重构  
4. 页面渲染系统替换  
5. 历史包袱清理

如果只把它当成“把 Elementor 页面还原成新技术栈页面”，大概率会在上线前后踩中以下问题：

- URL 变更导致自然流量下滑
- 多语言 `hreflang/canonical` 混乱
- Page 中承载的业务实体没有被结构化，后续又回到“页面堆内容”
- 301 规则、媒体资源、表单、埋点、SEO meta 漏迁
- 新站性能更快，但维护性和内容运营效率并没有本质改善

因此，这个项目应该按“**内容平台迁移项目**”来推进，而不是按“**前端改版项目**”推进。

---

## 2. 当前复杂度判断

基于现有资料，当前站点已经具备“中高复杂度重构项目”的典型特征：

- 内容量不小：用户已知约 `508` 个 `post`、`200+` 个 `page`
- `RD 页面统计.xlsx` 中 `Page` 工作表可见约 `228` 条页面记录
- 这些 `page` 中有大量其实是“业务实体页”，并非真正意义上的单一静态页面
- 当前站点有 `9` 个语言版本
- 已有 `100+` 条重定向规则
- 站点已运行 `7-8` 年，存在历史 SEO 资产沉淀
- 主题层同时存在多套渲染与内容入口，见 [theme-codebase-audit.md](file:///Users/javen/Desktop/Javen%20Project/mml-theme/doc/theme-codebase-audit.md)

从 `RD 页面统计.xlsx` 可见的页面分布，已经说明“Page 承担了过多可结构化内容”：

| 类型 | 数量 |
| --- | ---: |
| Material | 69 |
| Service | 44 |
| Ebook | 18 |
| Surface Finish | 18 |
| 单页 | 13 |
| Industry | 12 |
| Case Study | 12 |
| 聚合页 | 11 |
| Job | 7 |
| Author | 7 |
| NPI | 6 |
| Blog Archive | 5 |
| AI Creator | 3 |
| Platform | 2 |
| 首页 | 1 |

同时，分类维度已经很明显，例如：

- `CNC`: 55
- `Injection Molding`: 31
- `Fabrication`: 19
- `3d printing`: 13

这说明至少 `Material / Service / Surface Finish / Industry / Ebook / Author / Job` 这些领域，已经很接近应该被建模为 **CPT + Taxonomy + ACF Schema** 的状态，而不是继续作为普通 `Page` 靠页面内容硬拼。

---

## 3. 为什么现在适合重做

从维护性角度看，重做这件事不是“锦上添花”，而是逐步必要：

- 当前主题并存 `Elementor / Bricks / templates 短代码 / 自研 sections / 普通模板`
- 后台数据入口并存 `wp_options / Page / ACF / CPT / term meta`
- ACF 字段组未看到完整代码化/JSON 化落库，字段结构可追踪性弱
- SEO、多语言、跳转、表单、埋点等逻辑散落在主题不同文件中
- 业务实体以 `Page` 承载，后续新增、批量维护、关联管理都困难

这类站点在早期通常“上线很快、改一页也很快”，但随着页面数量与语言数量增加，会出现两个明显问题：

- 局部速度看起来还行，但整体维护成本越来越高
- 每次改版都像做一次“考古”，团队无法形成稳定规范

因此，如果领导层已经接受“本季度开始重做”，时机其实是合理的。

---

## 4. 可行性判断

### 4.1 结论

**可行，且应该做。**  
但前提是：先把“信息架构、内容模型、SEO 兼容策略、迁移路径”做扎实，再进入正式开发。

### 4.2 不建议的做法

以下做法风险很高：

- 直接跳过盘点，边设计边开发
- 先选技术栈，再倒推内容模型
- 把原来的 `Page` 逐页复制到新系统，而不重建内容结构
- 多语言、跳转、SEO meta 等等放到上线前再补
- 一次性 Big Bang 替换，但没有 URL 对照表和灰度验证

### 4.3 建议的核心原则

- 先定义 **内容模型**，再定义前端组件
- 先定义 **URL 与 SEO 兼容策略**，再决定页面路由
- 先明确 **谁是内容单一事实来源**，再决定是否 Headless
- 先做 **迁移台账**，再做页面还原

---

## 5. 技术路线评估

目前你们讨论的方向大致有两类：

1. `WordPress + ACF + Tailwind`，不再使用 Elementor  
2. `Astro/Next/React + Headless CMS`

这两类都能做，但适用条件不同。

### 5.1 方案 A：WordPress 继续做内容中台 + 自定义主题/模块开发

典型形态：

- WordPress 保留为 CMS
- 用 `CPT + Taxonomy + ACF` 重建内容模型
- 前台改成自定义主题模板、ACF Flexible Content、或轻量 Blocks
- 样式层使用 Tailwind 或常规组件化 CSS
- 不再依赖 Elementor

优点：

- 对当前团队迁移成本最低
- 内容编辑后台延续 WordPress 习惯
- SEO、媒体库、用户权限、表单、站点运营流程更容易平滑承接
- 多语言和历史内容迁移路径更清晰
- 可以分阶段替换，支持“旧站内容还在、新模型逐步接管”

风险：

- 如果模块边界不收紧，可能只是“从 Elementor 乱，变成 ACF 模板乱”
- 如果不做 schema 设计，仍然会继续把结构化内容塞回 Page

适合你们的前提：

- 内容团队仍然希望继续在 WP 后台工作
- 本次目标优先是“维护性 + SEO 安全迁移 + 工程规范提升”
- 暂时不需要很强的前后端彻底分离能力

### 5.2 方案 B：WordPress 做 Headless CMS + Astro 前台

典型形态：

- WordPress 作为内容后台
- 前台采用 Astro 输出静态/半静态页面
- 通过 REST / GraphQL 拉取内容
- SEO 页面由 Astro 生成，保留高速和较强开发自由度

优点：

- 对营销站、内容站很友好
- 性能和静态化能力通常优于传统 WP 主题
- 组件化边界更清晰
- 比 Next 更适合“内容展示型、应用交互不重”的站点

风险：

- 预览、增量发布、草稿流程、sitemap、重定向、表单接入都要重新设计
- 多语言、SEO、站内搜索、分页、canonical/hreflang 都要自己补完整
- 团队需要同时掌握 WP 内容建模和前端构建发布链路

适合你们的前提：

- 你们愿意保留 WordPress 作为后台
- 前端团队有能力建设静态构建和部署链路
- 站点主要是营销内容站，不是强交互 SaaS

### 5.3 方案 C：Next/React + Headless CMS

优点：

- 前端自由度最高
- 适合未来要做更多交互、会员、个性化、复杂表单、应用型能力

风险：

- 项目复杂度最高
- 编辑体验、预览、SEO、缓存、SSR/ISR、国际化、路由兼容都要自己搭
- 对当前这类历史站点来说，很容易把迁移工程做得过重

适合的前提：

- 已明确未来会演变成更强的应用平台
- 团队已有成熟的 React 平台化经验
- 能接受更长的建设周期和更高的 DevOps 成本

### 5.4 初步建议

如果本次核心目标是：

- 去掉 Elementor
- 提高维护性
- 平稳承接 SEO
- 重建内容模型
- 控制项目风险

那么 **优先建议在第一阶段保留 WordPress 作为内容中台**。  
前台可在两条里二选一：

- 稳妥优先：`WordPress + ACF + 定制主题/Tailwind`
- 进阶优先：`WordPress Headless + Astro`

我当前 **不建议一上来就直接切到 Next + 新 CMS**，除非你们已经明确具备：

- 较强的前端平台能力
- 完整的预览/发布/多语言/SEO 工程经验
- 充足测试资源和迁移窗口

---

## 6. 本项目真正难的点

### 6.1 难点不是“还原页面”，而是“重建结构”

你们现在最大的问题，不是页面长得像不像，而是：

- 哪些内容本质上是实体
- 哪些实体之间有关系
- 哪些 URL 必须保持
- 哪些 SEO 数据必须继承
- 哪些语言版本是真实内容，哪些是翻译层产物

如果这些不先梳理，新站无论什么技术栈，半年后都可能再次失控。

### 6.2 多语言是高风险项

代码里已经出现 GTranslate 痕迹和 `hreflang` 修补逻辑：

- [functions.php:L1045-L1058](file:///Users/javen/Desktop/Javen%20Project/mml-theme/functions.php#L1045-L1058)
- [notification-center.php](file:///Users/javen/Desktop/Javen%20Project/mml-theme/notification-center.php)

这意味着要先搞清楚：

- 9 个语言版本是“真实存储内容”，还是“插件翻译/代理翻译”
- 各语言 URL 是否一一对应
- `hreflang` 当前由谁生成
- canonical 是谁控制
- sitemap 是否语言分开

如果当前多语言大量依赖 GTranslate，而不是每种语言都在 CMS 中有独立内容，那么迁移难度会显著上升。  
因为这不再只是“搬内容”，而是要重新定义多语言策略。

### 6.3 SEO 资产不是只有 Title/Description

需要迁移和验证的 SEO 资产至少包括：

- URL
- slug
- title
- meta description
- canonical
- `hreflang`
- schema / structured data
- breadcrumb
- sitemap
- robots 规则
- 301/302 重定向
- 历史高流量页的内链结构

当前主题里已经能看到：

- Yoast meta 读取痕迹
- 自定义 SEO 文件机制
- Breadcrumb 对多个 SEO 插件的兼容逻辑
- 自定义 `hreflang` 清洗逻辑

所以，SEO 在这个项目里必须单独列为一个工作流，而不能并入“前端收尾”。

### 6.4 Redirect 需要独立治理

你提到已有 `100+` 重定向规则。  
这类规则不一定都在主题代码里，可能分散在：

- WordPress 插件
- `.htaccess` / Nginx / Cloudways 配置
- SEO 插件
- 历史营销活动脚本
- CDN/边缘规则

迁移前必须导出为一份完整台账：

- 来源
- 匹配规则
- 目标 URL
- 是否永久保留
- 是否可合并
- 是否与新路由冲突

### 6.5 Media 迁移比想象中更烦

除了文件本身，还要考虑：

- 文章/页面中的旧图片 URL
- 响应式图片 `srcset`
- alt/title/caption
- 媒体去重
- 外链图片或插件生成图片
- 多语言页面中的同图复用

如果未来仍然用 WordPress 做 CMS，媒体迁移相对简单。  
如果切到 Headless，自建媒体策略、CDN、图片处理链路都要补。

---

## 7. 建议的新内容模型方向

不是所有 `Page` 都应该变成 CPT，但以下类型明显值得结构化：

| 当前页面类型 | 建议目标模型 |
| --- | --- |
| Material | `material` CPT + `process` taxonomy + ACF 字段 |
| Service | `service` CPT + `process` taxonomy + 关联 material/case |
| Surface Finish | `surface_finish` CPT + 工艺关系字段 |
| Industry | `industry` CPT 或保留聚合页模板 |
| Ebook | `ebook` CPT |
| Author | `author_profile` CPT 或统一到用户/作者扩展模型 |
| Job | `job` CPT，已存在可重整 |
| Case Study | 复用现有 CPT，但要统一字段 |
| 聚合页 | 保留为模板页或路由页，不建议滥建 CPT |
| 政策/赞助/条款等单页 | 保留普通 Page |

原则很简单：

- **可重复、可筛选、可关联、可批量维护** 的内容，优先 CPT 化
- **一次性、制度性、纯说明类** 页面，可以保留普通 `Page`

---

## 8. 主要风险清单

### 8.1 高风险

- 多语言真实来源不清，导致迁移范围被低估
- URL 映射不完整，导致 SEO 下滑
- 旧站 Page 到新模型的映射关系不清，导致内容丢失或重复
- 301 规则未统一收敛，造成链式跳转和死链
- 旧站 SEO meta、schema、canonical、hreflang 漏迁
- 表单、埋点、CRM/Webhook、下载链路上线后失效

### 8.2 中风险

- 只做前端重写，不做字段 schema，导致新站继续失控
- 旧媒体资源路径变化，造成图片丢失或索引衰减
- 构建/发布链路比原系统复杂，团队接不住
- Headless 预览、草稿、搜索、分页、站点地图被低估

### 8.3 低估率很高但经常被漏掉的点

- 404 页面与 410 策略
- 站内搜索规则
- 作者页、标签页、归档页
- PDF/ebook 下载链接与追踪
- 表单提交后的跳转、埋点、邮件模板
- 第三方脚本注入、Cookie、Consent、Analytics

---

## 9. 推荐推进方式

### 9.1 不要直接进入开发，先做 Phase 0 盘点

第一步不是画页面，也不是选框架，而是建立一套迁移台账。

Phase 0 必须产出的文档：

1. 内容资产清单
2. URL 与重定向清单
3. SEO 资产清单
4. 多语言策略清单
5. 内容模型草案
6. 页面模板与组件清单
7. 第三方依赖清单

### 9.2 推荐的项目节奏

#### Phase 0：盘点与决策（2-4 周）

目标：

- 统一现状认知
- 明确技术路线
- 把高风险点前置暴露

产出：

- 全量 URL inventory
- 全量 redirect inventory
- 页面类型分组
- page -> target content model 映射表
- 多语言策略结论
- 技术选型 ADR
- SEO 迁移方案草案

#### Phase 1：内容模型设计（2-4 周）

目标：

- 确定哪些内容进 CPT
- 确定字段结构、taxonomy、关联关系

产出：

- CPT 列表
- Taxonomy 列表
- 字段 schema
- 编辑后台结构
- URL 规则设计

#### Phase 2：迁移底座建设（2-6 周）

目标：

- 先把“可迁移”做出来，不急着还原所有页面

产出：

- 数据迁移脚本
- media 映射策略
- old URL -> new entity 映射表
- 重定向规则生成机制
- SEO meta 导入机制

#### Phase 3：前台实现与模板还原（4-10 周）

目标：

- 用新模型驱动新模板
- 先完成高价值页面

建议优先级：

1. 首页/核心流量入口
2. Service
3. Material
4. Surface Finish
5. Industry / Case Study
6. Blog / Ebook / Author / Job

#### Phase 4：灰度验证与切换（2-4 周）

目标：

- 不追求“一次全对”，而追求“有监控地替换”

重点：

- 核心页面比对
- SEO 对照检查
- redirect 回归
- 404 监控
- Search Console / GA / 日志观察

---

## 10. 你们现在最该先做的 10 件事

1. 导出现网全量 URL 列表，区分 `page / post / CPT / taxonomy / media`
2. 导出所有重定向规则，统一到一个表
3. 明确 9 语言的真实内容来源和生成方式
4. 把 `Page` 按业务类型分组，确认哪些应改成 CPT
5. 导出现有 SEO meta、canonical、schema、breadcrumb 来源
6. 导出表单、下载、埋点、第三方 webhook 清单
7. 导出现有媒体库及引用路径策略
8. 选定“内容单一事实来源”，避免 CMS 双写
9. 选定技术路线，但前提是内容模型先过评审
10. 先做一个试点域，例如 `Material + Service`，不要一口气全站硬切

---

## 11. 对技术选型的实际建议

如果从“团队承接能力 + 历史 SEO 风险 + 多语言复杂度 + 迁移稳妥性”综合考虑，我建议这样判断：

### 11.1 如果你们要优先控制风险

优先选择：

- `WordPress + CPT + Taxonomy + ACF + 自定义主题/Tailwind`

原因：

- 最适合这类老站平稳迁移
- 内容团队不用被迫换后台工作流
- 多语言、媒体、SEO、编辑权限更容易延续
- 可以逐步替换，不一定全站同一天切

### 11.2 如果你们前端能力较强，且追求更好的前台工程边界

可考虑：

- `WordPress Headless + Astro`

原因：

- 对营销站比 Next 更轻、更稳
- 静态化和 SEO 能力足够强
- 组件开发体验会比传统 WP 主题更舒服

前提：

- 必须接受需要自己补 preview / sitemap / i18n / search / redirect / forms 等工程能力

### 11.3 暂不推荐的情况

如果现在连以下问题都还没盘清，就不建议直接上：

- 新 CMS + Next + 全站重构

因为这样会把三个变量一起放大：

- 内容模型重建
- CMS 切换
- 前端架构切换

对一个 7-8 年、9 语言、100+ redirect 的站点来说，风险偏高。

---

## 12. 项目管理上的注意事项

### 12.1 这是跨团队项目

至少涉及：

- 产品/市场/内容
- SEO
- 开发
- 设计
- 运维/发布

如果只由开发单独推进，很容易出现“技术上做完了，但业务资产没接住”的情况。

### 12.2 要建立“迁移冻结窗口”

否则会发生：

- 旧站内容持续更新
- 新站迁移脚本基于旧快照
- 上线前发现差异越来越大

建议至少定义：

- 内容冻结时间
- 冻结范围
- 例外流程
- 最终 delta 同步策略

### 12.3 必须接受“盘点阶段很值钱”

你说你之前没干过这种活，这很正常。  
这类项目最容易犯的错，就是觉得“先做几个页面看看”。  
实际上，真正决定成败的，往往是前面的：

- 盘点
- 建模
- URL 策略
- SEO 迁移方案

这几步做对了，后面的开发反而会顺很多。

---

## 13. 一个更稳妥的落地建议

如果让我给你一个现实可执行的建议，我会这样推进：

### 路线建议

第一阶段先不讨论“要不要完全离开 WordPress”，而是先做：

1. 现网资产盘点
2. 内容模型设计
3. 试点域迁移

试点推荐：

- `Material`
- `Service`
- `Surface Finish`

原因：

- 数量多
- 业务重要
- 当前最明显存在“Page 承载结构化内容”的问题

等这三个域跑通后，再决定：

- 继续用 WP 自定义主题
- 还是保留 WP 做 Headless，前台切 Astro

这会比一开始就拍脑袋决定全站 Headless 更稳。

---

## 14. 立项前建议的交付物

建议你们在正式开发前，至少把这些文档做出来：

1. `content-inventory.csv`
2. `url-inventory.csv`
3. `redirect-inventory.csv`
4. `seo-asset-inventory.csv`
5. `page-to-model-mapping.xlsx`
6. `content-model-schema.md`
7. `architecture-decision-record.md`
8. `migration-runbook.md`
9. `launch-checklist.md`
10. `rollback-plan.md`

---

## 15. 最后的判断

站点重做这件事：

- **不是太早了，而是已经到了该开始的时间点**
- **不是不能做，而是不能草率做**
- **不是先选框架，而是先建立迁移控制面**

对你个人来说，不需要因为“以前没做过”就怀疑自己。  
这类项目本来就不是靠经验拍脑袋完成的，而是靠：

- 盘点
- 建模
- 风险前置
- 分阶段推进

只要你把这次项目从“重画页面”转成“重建内容系统 + 安全迁移 SEO 资产”的思路，方向就对了。

---

## 16. 下一步建议

建议紧接着做两件事：

1. 先产出一份 `Phase 0 资产盘点模板`  
2. 再产出一份 `技术路线对比文档（WP 定制主题 vs WP Headless + Astro）`

如果继续往下推进，这两个文档会比直接开始还原页面更有价值。
