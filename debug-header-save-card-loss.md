# Debug Session: header-save-card-loss

> 状态：`[OPEN]`
> 会话 ID：`header-save-card-loss`
> 开始时间：2026-08-06

## 症状（Actual vs Expected）

- **Actual**：后台保存 Header 后刷新，多个 tab 的卡片内容随机变少；每次保存必丢。
- **Expected**：保存后所有已填内容完整保留。

## 复现步骤

1. 后台 RD Site Header 编辑页，在多个 tab 的 cards repeater 中填入卡片内容。
2. 点击「保存 Header」。
3. 刷新页面（或重新进入），部分 tab 的卡片条目缺失。

## 环境

- 线上 WordPress（Cloudways），PHP-FPM；`max_input_vars=8000`（已排除截断）。
- 已部署 `site-header-admin.js`（含递归 `__i__` 修复，commit 7421c90）并 Purge 缓存。
- 用户确认：新 JS 已生效；丢失表现为「刚填的卡片字段变少」；每次保存必丢、随机。

## 已排除

- PHP `max_input_vars` 截断（8000，远超表单规模）。
- 旧版 placeholder bug（递归替换已部署）。

## 假设（可证伪）

| ID | 假设 | 观察点 | 状态 |
|----|------|--------|------|
| A | 浏览器提交的 POST 数据本身不完整（JS/DOM 字段名冲突、`__i__` 残留、同名键覆盖） | JS submit 时统计字段名总数/重复/`__i__`/按 nav_item 分组，上报 Debug Server | 待验证 |
| B | PHP 解析/传输层丢失（同名数字键后覆盖前、某层被标量化） | PHP 端统计 `$_POST` raw 各级叶子数 | 待验证 |
| C | normalize() 清洗吞数据（arr() 对非数组返回 []、字段映射错位、mega_type 无效丢整项） | PHP 端对比 normalize 前后各级叶子数 | 待验证 |
| D | 落库后读回不一致（update_option 被覆盖 / Redis object cache 读到旧值） | PHP 端 update_option 后立即 get_option 对比 | 待验证 |
| E | 字段值特殊字符破坏 DOM（value 未转义导致后续字段名错位） | JS 端检查 DOM 结构完整性 | 待验证 |

## 插桩点

- `site-header-admin.js`：submit 事件 → 字段摘要上报 Debug Server（`debug-point A`）。
- `site-header-admin.php`：保存分支 → raw/normalized/readback 三级叶子数摘要，error_log + 页面顶部诊断输出（`debug-point A/B/C/D`）。

## 日志

- Debug Server：`http://127.0.0.1:7777`（`trae-debug-log-header-save-card-loss.ndjson`）
- PHP：error_log（Cloudways 日志）+ 保存后页面顶部诊断块

## 结论

（待分析）
