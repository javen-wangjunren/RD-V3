# Debug Session: elementor-widget-white-screen

Status: OPEN
Started: 2026-06-23

## Symptom

- Activating the updated `rd-elementor-widgets` plugin causes pages and/or Elementor editor to go blank.
- Disabling the plugin restores the site.
- The regression started after adding the new `Material Library` widget and updating four plugin files.

## Scope

- Plugin: `wp-content/plugins/rd-elementor-widgets/`
- Suspect files:
  - `rd-elementor-widgets.php`
  - `widgets/material-library-widget.php`
  - `assets/material-library.css`
  - `assets/material-library.js`

## Initial Hypotheses

1. `widgets/material-library-widget.php` triggers a PHP fatal during widget registration.
2. The current server copy of `rd-elementor-widgets.php` or `material-library-widget.php` differs from the local validated version.
3. One or more Elementor control definitions used by `Material Library` are incompatible with the server's Elementor version.
4. The plugin registers the new widget successfully, but the Elementor editor crashes when loading widget metadata or assets.

## Evidence To Collect

- Browser/network response for the failing page/editor request
- Runtime console errors tied to the actual site page, not browser extensions
- Server-side behavior comparison with widget registration disabled vs enabled
- Static comparison between `Material Library` widget and existing working widgets

## Next Step

- Inspect the current widget implementation against existing working widgets and reproduce the failure with browser devtools/network evidence.

## Evidence Collected

- Browser devtools network on `https://www.rapiddirect.com/services/cnc-machining/` shows the main document request returns `200`, but the response body is truncated very early in `<head>`.
- Returned HTML contains only early scripts such as Debloat/Cloudflare snippets and does not contain a complete document structure.
- This rules out a frontend-only JS issue as the primary cause and points to a PHP fatal during page rendering.
- After fixing the syntax issue in `rd-elementor-widgets.php`, the remaining highest-probability fault domain is `widgets/material-library-widget.php`.

## Current Assessment

1. Hypothesis 1 is strengthened: `widgets/material-library-widget.php` likely triggers a runtime fatal during Elementor widget registration or metadata/control loading.
2. Hypothesis 2 remains possible but is now less likely for the main plugin file, since the syntax issue there has been corrected locally.
3. Hypothesis 3 is now the leading sub-hypothesis: one of the new control definitions or widget methods is incompatible with the server Elementor runtime.
