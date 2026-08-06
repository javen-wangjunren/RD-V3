# 站点重做 Action Plan（WordPress + ACF + Tailwind + GitHub）

更新时间：2026-06-26  
适用范围：`mml-theme` 站点重做项目的实施路线图、阶段划分、里程碑定义  
前提假设：

- 技术路线初步确定为 `WordPress + ACF + Tailwind`
- 代码以 `GitHub` 为唯一同步与协作入口
- 重做目标不是“复刻旧页面”，而是“重建内容模型 + 平稳迁移 SEO 资产 + 提升可维护性”
- 当前站点存在 `508` 个 `post`、`200+` 个 `page`、`9` 个语言版本、`100+` 重定向规则

关联文档：

- [site-rebuild-feasibility-assessment.md](file:///Users/javen/Desktop/Javen%20Project/mml-theme/doc/site-rebuild-feasibility-assessment.md)
- [theme-codebase-audit.md](file:///Users/javen/Desktop/Javen%20Project/mml-theme/doc/theme-codebase-audit.md)

---

## 1. 总体目标

本项目建议拆成 **6 个阶段** 推进，而不是直接进入“设计页面 + 开发模板”。

核心原因：

- 这是一个老站迁移项目，不是纯新站开发
- 成败关键在于内容模型、URL 兼容、SEO 迁移、多语言策略，而不是单页视觉还原
- `WordPress + ACF + Tailwind` 虽然比 Headless 稳，但如果没有阶段化治理，仍然会把旧问题带到新系统里

建议总节奏：

1. Phase 0：项目启动与现状盘点
2. Phase 1：信息架构与内容模型设计
3. Phase 2：工程底座与开发规范落地
4. Phase 3：试点域开发与迁移验证
5. Phase 4：全站迁移与模板交付
6. Phase 5：上线切换与稳定期观察

---

## 2. 里程碑总览

| Milestone | 阶段 | 目标结果 |
| --- | --- | --- |
| M0 | Phase 0 | 现状盘点完成，范围、风险、技术路线、责任边界明确 |
| M1 | Phase 1 | 新站内容模型、URL 规则、SEO 兼容策略、组件边界完成评审 |
| M2 | Phase 2 | 新代码仓、开发规范、ACF 版本化、Tailwind 基础主题、GitHub 流程全部跑通 |
| M3 | Phase 3 | `Material / Service / Surface Finish` 试点域完成开发与迁移验证 |
| M4 | Phase 4 | 全站主要内容迁移完成，模板与功能闭环完成，具备上线条件 |
| M5 | Phase 5 | 正式切换完成，SEO/流量/404/表单/重定向稳定，旧站进入退役阶段 |

---

## 3. Phase 0：项目启动与现状盘点

### 3.1 目标

建立统一认知，避免“边做边猜”。

这一阶段不以开发页面为目标，而是要回答四个问题：

1. 旧站到底有哪些内容资产？
2. 哪些 URL、SEO 资产、语言版本必须被保留？
3. 哪些 Page 要转成 CPT？
4. 本次项目的边界、节奏和交付责任是什么？

### 3.2 关键任务

- 梳理内容资产：
  - `post / page / 现有 CPT / taxonomy / media / forms / 下载资源`
- 梳理 URL 资产：
  - 全量 URL
  - canonical
  - sitemap
  - 301/302 规则
- 梳理 SEO 资产：
  - title
  - meta description
  - hreflang
  - schema
  - breadcrumb
- 梳理多语言机制：
  - 当前 9 语言是人工内容、插件翻译，还是混合模式
- 梳理插件与集成：
  - 表单
  - CRM/webhook
  - 追踪脚本
  - 下载链路
- 梳理高风险历史逻辑：
  - 主题中的自定义 SEO 输出
  - 主题中的 redirect 逻辑
  - 主题中的 REST / 外部接口 / 注入代码配置

### 3.3 交付物

- `content-inventory.csv`
- `url-inventory.csv`
- `redirect-inventory.csv`
- `seo-asset-inventory.csv`
- `plugin-dependency-inventory.csv`
- `page-type-inventory.xlsx`
- `phase-0-findings.md`

### 3.4 Milestone：M0

**M0 达成标准：**

- 技术路线确认：`WordPress + ACF + Tailwind`
- 项目范围明确：本次纳入哪些页面类型、哪些功能、哪些语言
- 风险清单明确：多语言、SEO、redirect、media、表单、第三方集成
- 旧站资产台账可查
- 核心团队对“先建模、再开发”的推进方式达成一致

### 3.5 管理提醒

- 这一阶段要指定唯一项目 owner
- 要明确“谁负责 SEO 资产确认、谁负责内容确认、谁负责技术方案确认”
- 如果 Phase 0 产出不完整，不建议进入开发

---

## 4. Phase 1：信息架构与内容模型设计

### 4.1 目标

把旧站“页面堆内容”的状态，转成可长期维护的结构化模型。

### 4.2 关键任务

- 定义内容类型边界：
  - 哪些保留 `Page`
  - 哪些改成 `CPT`
- 建立目标模型：
  - `material`
  - `service`
  - `surface_finish`
  - `industry`
  - `ebook`
  - `case_study`
  - `job`
  - `author_profile`
- 设计 taxonomy：
  - `process`
  - `industry`
  - `material_family`
  - 其他业务分类
- 定义字段 schema：
  - SEO 字段
  - 结构化业务字段
  - 关联字段
  - 列表页筛选字段
- 定义 URL 规则：
  - 新 URL 是否保留旧 slug
  - CPT URL 结构如何设计
  - 多语言 URL 如何映射
- 定义模板边界：
  - 通用组件
  - 页面模板
  - 列表页模板
  - 落地页模板
- 定义 SEO 兼容策略：
  - meta 迁移
  - canonical 策略
  - hreflang 策略
  - schema 输出策略

### 4.3 交付物

- `content-model-schema.md`
- `page-to-model-mapping.xlsx`
- `url-strategy.md`
- `seo-migration-strategy.md`
- `component-boundary.md`
- `language-strategy.md`

### 4.4 Milestone：M1

**M1 达成标准：**

- 新站的 `CPT / Taxonomy / ACF 字段` 已完成评审
- Page 到新模型的映射规则已确定
- URL 设计与 redirect 策略已确认
- 多语言处理策略已定稿
- SEO 兼容方案已明确，不再停留在“上线前再看”

### 4.5 管理提醒

- 这一阶段的关键不是“字段写得多细”，而是“边界清楚”
- 如果内容模型仍然模糊，后续开发一定返工

---

## 5. Phase 2：工程底座与开发规范落地

### 5.1 目标

在正式做页面前，先把未来 1-2 年可维护的工程底座搭起来。

### 5.2 关键任务

- 建立新 GitHub 仓库策略：
  - 默认主分支
  - 开发分支
  - PR 审查规则
  - 发布 tag 规则
- 建立环境策略：
  - local
  - staging
  - production
- 建立 WordPress 工程结构：
  - 主题目录结构
  - `acf-json/`
  - `mu-plugins/`
  - 配置与环境变量
- 建立 ACF 版本化机制：
  - Local JSON
  - 字段命名规范
  - group 拆分规则
- 建立 Tailwind 设计基线：
  - 色板
  - 字体
  - spacing
  - 组件 token
- 建立前端组件规范：
  - 页面模板
  - section 模块
  - 可复用 partial
- 建立协作规范：
  - GitHub PR 模板
  - issue 模板
  - 环境同步与数据库同步规则
- 建立质量机制：
  - 基础 lint
  - 构建检查
  - 关键页面回归清单

### 5.3 交付物

- `repository-strategy.md`
- `branching-and-release.md`
- `theme-architecture.md`
- `acf-governance.md`
- `tailwind-design-foundation.md`
- `coding-standards.md`
- `deployment-runbook.md`

### 5.4 Milestone：M2

**M2 达成标准：**

- GitHub 代码协作流程跑通
- 新主题骨架已建立
- `acf-json` 已纳入版本控制
- Tailwind 基础主题可用
- 环境同步规则明确
- 开发团队已能在统一规范下开始做模块

### 5.5 管理提醒

- 这一阶段必须坚持“GitHub 是唯一事实来源”
- 禁止继续走“线上后台直接改结构、代码仓不同步”的老路
- 建议把主题内的插件型功能逐步迁移到 `mu-plugins` 或独立插件

---

## 6. Phase 3：试点域开发与迁移验证

### 6.1 目标

先用最关键、最具代表性的内容域验证整套方案。

建议试点域：

- `Material`
- `Service`
- `Surface Finish`

原因：

- 数量足够多
- 业务价值高
- 最能暴露 Page -> CPT 重构中的真实问题

### 6.2 关键任务

- 完成试点域的 CPT / Taxonomy / ACF 配置
- 完成试点域前台模板与 Tailwind 组件
- 完成试点域数据迁移脚本
- 完成旧 URL -> 新实体映射
- 完成试点域 SEO meta 导入
- 完成试点域 redirect 验证
- 完成试点域内容编辑流程验证
- 完成试点域 QA：
  - 页面渲染
  - 多语言
  - 表单
  - 下载
  - 内链

### 6.3 交付物

- 试点域 CPT 与字段配置
- 试点域模板与样式
- `pilot-migration-script.md`
- `pilot-qa-report.md`
- `pilot-redirect-validation.csv`
- `pilot-seo-diff-report.md`

### 6.4 Milestone：M3

**M3 达成标准：**

- 试点域在 staging 可完整运行
- 旧内容已迁移到新模型
- 核心 URL 与 SEO 数据映射可验证
- 编辑团队能在新后台完成内容维护
- 试点结果足以支持全站推广，而不是继续回退到旧模式

### 6.5 管理提醒

- 如果试点域无法闭环，不要急着推进全站
- 试点的意义就是提前暴露迁移脚本、模型设计、编辑体验的问题

---

## 7. Phase 4：全站迁移与模板交付

### 7.1 目标

在试点验证通过后，把整套方案扩展到全站主要内容域。

### 7.2 建议优先级

1. 首页与主流量入口页
2. `Service`
3. `Material`
4. `Surface Finish`
5. `Industry`
6. `Case Study`
7. `Blog / Ebook / Author / Job`
8. 政策、关于我们、招聘、赞助等普通 Page

### 7.3 关键任务

- 按页面类型批量建立模板
- 批量导入内容、媒体、SEO 字段
- 生成批量 redirect 规则
- 对接表单、CRM、埋点、下载链路
- 清理不再需要的旧主题耦合逻辑
- 对关键页面做视觉与结构回归
- 完成 staging 全站验收

### 7.4 交付物

- 全站模板清单
- 全站迁移执行记录
- `redirect-master.csv`
- `seo-migration-report.md`
- `integration-checklist.md`
- `staging-uat-report.md`

### 7.5 Milestone：M4

**M4 达成标准：**

- 全站主要内容已迁移完成
- 所有重点页面已通过验收
- redirect 规则已准备完毕
- 表单、下载、埋点、SEO 输出都已通过验证
- 项目具备上线条件

### 7.6 管理提醒

- 这一阶段最怕的是“页面做完了，但系统没有验收闭环”
- 必须用清单化方式做迁移进度和验收进度管理

---

## 8. Phase 5：上线切换与稳定期观察

### 8.1 目标

安全切站，确保业务连续、SEO 波动可控、问题能快速回滚。

### 8.2 关键任务

- 确认最终内容冻结窗口
- 执行最终 delta 数据同步
- 执行 redirect 上线
- 切换 sitemap、robots、canonical、hreflang
- 验证表单、下载、追踪、通知
- 监控 Search Console、GA、服务器日志、404 日志
- 准备回滚预案
- 制定旧站退役计划

### 8.3 交付物

- `launch-checklist.md`
- `go-live-runbook.md`
- `rollback-plan.md`
- `hypercare-dashboard.md`
- `post-launch-issue-log.md`

### 8.4 Milestone：M5

**M5 达成标准：**

- 新站正式切换成功
- 关键流量页可访问，redirect 无大面积异常
- 表单、下载、埋点、通知全部正常
- 404、SEO 报错、索引异常处于可控范围
- 旧站进入只读/退役准备阶段

### 8.5 稳定期建议

上线后建议保留 `2-4 周` 稳定观察期，重点看：

- 自然流量变化
- 索引收录变化
- Search Console 报错
- 表单提交量变化
- 高流量 URL 的点击与跳出变化

---

## 9. 建议的项目管理节奏

### 9.1 推荐会议节奏

- 每周 1 次项目例会：看阶段状态、风险、依赖
- 每周 1 次内容/SEO 专项会：确认 URL、meta、语言、redirect
- 每周 1 次开发同步会：看模块开发、迁移脚本、阻塞项

### 9.2 推荐看板维度

- 内容模型
- 模板开发
- 迁移脚本
- SEO 迁移
- 多语言
- Redirect
- 表单与集成
- QA/UAT
- 上线准备

### 9.3 推荐负责人划分

- PM/Owner：项目节奏、范围、风险、里程碑
- Tech Lead：架构、代码规范、仓库与发布流程
- SEO Owner：URL、meta、hreflang、redirect、Search Console
- Content Owner：内容确认、迁移校对、语言内容确认
- QA Owner：验收标准、回归清单、上线前检查

---

## 10. 一个现实可执行的时间框架

如果资源是正常配置，而不是非常豪华团队，建议按下面的量级预估：

- Phase 0：`2-3 周`
- Phase 1：`2-3 周`
- Phase 2：`2-4 周`
- Phase 3：`3-5 周`
- Phase 4：`6-10 周`
- Phase 5：`2-4 周`

整体建议预期：

- **保守预估：4-6 个月**
- 如果中途还要补多语言策略、补历史数据、清洗 redirect，周期可能继续拉长

---

## 11. 当前最建议立刻启动的事项

如果你要把这个 Action Plan 落到本周动作，我建议现在先开 3 条线：

### 11.1 线 1：资产盘点线

- 导出全量 URL
- 导出 redirect
- 导出 page 类型
- 导出 SEO 资产

### 11.2 线 2：建模线

- 先做 `Material / Service / Surface Finish` 的 schema 草案
- 确认保留 Page 与转 CPT 的边界

### 11.3 线 3：工程底座线

- 建 GitHub 仓库规则
- 建新主题骨架
- 建 `acf-json`
- 建 Tailwind 主题配置

---

## 12. 最后的建议

这次项目最重要的不是“赶紧开发”，而是：

- 先把 Phase 0 和 Phase 1 做扎实
- 用 Phase 3 的试点证明方案可行
- 再用 Phase 4 扩到全站

如果这个顺序不乱，`WordPress + ACF + Tailwind + GitHub` 这条路线是完全有机会做成一个长期可维护版本的。
