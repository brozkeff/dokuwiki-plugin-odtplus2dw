---
status: Accepted
date: 2026-04-16
---

# 0001 Surgical Modernization and Compatibility Baseline

## Context and Problem Statement

This repository is a maintenance fork in a chain of forks from `odt2dw` through
`odtplus2dw`. The plugin is valuable because ODT import works on modern PHP,
including tested local usage on PHP 8.2 and 8.3, while the older `odt2dw`
plugin no longer works reliably on PHP 8.

At the same time, the codebase is old, largely procedural, and contains
high-risk areas that should not be expanded casually:

- `action.php` mixes upload validation, conversion, archive extraction, and
  page/media writes in one class.
- DOC and DOCX handling currently depends on external conversion commands and
  legacy assumptions that are difficult to justify from a security and
  maintainability perspective.
- Temporary directory handling and archive extraction need hardening before
  any broader trust can be placed in the import pipeline.
- The project must remain usable on DokuWiki Release 2023-04-04b
  "Jack Jackrum" and PHP 7.4, while primary maintenance should target
  DokuWiki Release 2025-05-14 "Librarian" and PHP 8.2+.

The main question is how to stabilize and modernize the plugin without a risky
rewrite that would break existing users or make it harder to compare behavior
with the legacy implementation.

## Decision Drivers

- Preserve working ODT import behavior as the reference baseline.
- Keep compatibility with DokuWiki 2023-04-04b "Jack Jackrum" and PHP 7.4.
- Optimize ongoing maintenance for DokuWiki 2025-05-14 "Librarian" and
  PHP 8.2/8.3+.
- Reduce security and operational risk in the DOC/DOCX path before adding
  features.
- Prefer incremental refactoring that can be reviewed and regression-tested in
  small steps.
- Keep repository guidance clear for future maintainers and coding agents.

## Options Considered

### Option 1: Rewrite the plugin around a new import architecture

This could produce cleaner code faster in theory, but it would make regression
analysis difficult and create a large compatibility surface all at once.

### Option 2: Keep the current code mostly as-is and only apply hotfixes

This minimizes short-term disruption, but it preserves unsafe and fragile areas
and leaves maintainers without a clear roadmap.

### Option 3: Modernize surgically around a stable ODT baseline

Keep behaviorally compatible structure where possible, document target
platforms, treat ODT import as the primary supported path, and address
high-risk areas in small isolated changes.

## Decision Outcome

Chosen option: **Option 3, modernize surgically around a stable ODT baseline**.

The project will be maintained as a conservative fork. Work should proceed in
small, reviewable steps rather than major rewrites. ODT import is the primary
supported workflow and the baseline for regression checking. DOC and DOCX
support remain legacy compatibility paths that require extra scrutiny and must
not drive architecture or security compromises.

The first modernization wave should focus on:

1. documenting support boundaries and compatibility targets clearly;
2. isolating and hardening upload, temporary-file, command-execution, and ZIP
   extraction logic;
3. fixing correctness issues that affect current PHP 8.x behavior without
   changing user-visible behavior unnecessarily;
4. adding lightweight verification for the supported DokuWiki and PHP matrix
   before broader refactoring.

## Consequences

### Positive

- Maintainers get a clear rule set for future changes.
- Risky areas can be improved incrementally with smaller regression windows.
- Modern DokuWiki and PHP support becomes an explicit goal instead of an
  accidental outcome.
- The codebase remains understandable to users migrating from the historic
  plugin.

### Negative

- Some ugly legacy structure will remain for a while.
- DOC and DOCX functionality may need to be reduced, gated, or documented as
  experimental before it can be trusted.
- Progress may appear slower than with a rewrite, because each change is
  intentionally narrow.

## Follow-Up Work

- Audit and harden the command execution path used for DOC and DOCX conversion.
- Replace weak temporary directory handling with safer per-request workspace
  creation.
- Validate ZIP member extraction explicitly instead of trusting archive entries.
- Document a tested compatibility matrix for DokuWiki 2023, DokuWiki 2025
  "Librarian", PHP 7.4, PHP 8.2, and PHP 8.3.
