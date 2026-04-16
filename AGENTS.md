# AGENTS.md

This is a repository for a Dokuwiki plugin.

## Scope

These instructions apply to the whole repository.

## Coding style

The official coding style to apply to all new code is PSR-12:
<https://www.php-fig.org/psr/psr-12/>

## Project Intent

- Maintain this plugin as a conservative fork of `odtplus2dw` / `odt2dw`.
- Prefer surgical modernization over large rewrites.
- Keep working ODT import as the behavioral baseline.
- Treat DOC and DOCX import as higher-risk legacy paths that need explicit
  review before functional changes.

## Compatibility Targets

- Required compatibility: DokuWiki 2023 and PHP 7.4.
- Primary maintenance target: DokuWiki 2025 "Librarian" and PHP 8.2, 8.3, and
  newer compatible PHP 8 releases.
- When tradeoffs appear, preserve backward compatibility unless the change is
  clearly documented and intentionally approved.

## Change Strategy

- Do not start with major architectural rewrites.
- Prefer small, reviewable patches with narrow behavioral scope.
- Separate security hardening, refactoring, and feature work where practical.
- Keep public behavior stable unless the current behavior is clearly unsafe or
  broken.
- Preserve existing translation files unless the task specifically touches
  them.

## High-Risk Areas

- `action.php` is the core import pipeline and must be changed carefully.
- Any code that handles uploaded filenames, temporary directories, shell
  commands, archive extraction, or media writes needs extra scrutiny.
- Avoid introducing broader trust in DOC/DOCX conversion until the current
  execution model is reviewed and hardened.

## Preferred Direction

- Document support boundaries clearly in repository docs.
- Harden unsafe behavior before adding features.
- Extract isolated helper methods only when that reduces risk and improves test
  coverage or readability.
- Use modern PHP syntax only when it remains compatible with PHP 7.4 in the
  files being changed.

## Verification Expectations

- For non-trivial changes, describe expected impact on:
  - ODT import behavior
  - DOC/DOCX conversion behavior
  - DokuWiki 2023 compatibility
  - DokuWiki 2025 "Librarian" compatibility
  - PHP 7.4 and PHP 8.x compatibility
- Prefer adding or documenting reproducible checks before broad refactors.

## Documentation

- Keep architecture and maintenance decisions in `docs/decisions/`.
- Add a new ADR for significant compatibility, security, or design decisions.
- Keep repo-level agent guidance in this file and technical rationale in ADRs.
