<!-- markdownlint-configure-file {"MD024": false} -->
# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this fork tracks releases using SemVer-style version numbers. Historic
upstream beta tags have been normalized into SemVer-compatible pre-release
entries where practical.

## [0.13.0-a1] - 2026-04-16

### Added

- Fork identity under the plugin name `odtplusplus2dw`.
- New maintainer for this fork: Martin "brozkeff" Malec.
- Repository-local guidance in `AGENTS.md`.
- Initial architecture decision record in
  `docs/decisions/0001 Surgical Modernization and Compatibility Baseline.md`.
- Config option `enableUnsafeLegacyConverters` to require explicit opt-in for
  legacy DOCX and DOC conversion.

### Changed

- Updated plugin metadata to point to the maintained fork.
- Moved the historical changelog out of `README.md` into this file.
- Disabled legacy DOCX and DOC import by default by narrowing default
  authorized MIME types to ODT-focused values.

### Fixed

- Sanitized uploaded filenames before creating temporary working files.
- Replaced predictable world-writable temporary directories with private
  per-request work directories.
- Escaped external converter command arguments and checked converter exit
  status before continuing.
- Removed `sudo` from the LibreOffice conversion command path.
- Fixed media upload ACL handling to use the current page name instead of an
  undefined `$ID` variable.
- Added basic ZIP entry validation before extraction.

## [0.12.0-beta]

### Fixed

- Fixed issue `#8` in the upstream `odtplus2dw` project.

## [0.11.0-beta]

### Changed

- Allowed uploaded filenames to contain spaces.
- Added French translation.

## [0.10.0-beta]

### Changed

- Renamed the plugin to `odtplus2dw`.
- Added DOCX and DOC support.
- Added Spanish translation.
- Removed outdated translations that were no longer maintained.

## [0.9.0]

### Fixed

- Adjusted method signatures to match the parent class.
- Added the import button.

## [0.8.0]

### Fixed

- Fixed bug `#9`.
- Fixed bug `#14`.

## [0.7.0]

### Fixed

- Fixed `parserPostDisplay` to work with `edit` and `preview`.
- Improved class existence checks.

## [0.6.0]

### Fixed

- Improved some English messages.
- Added Dutch message translation.
- Relaxed MIME type checking so it could be configured in the admin panel.
- Fixed the untranslated upload submit button.

## [0.5.0]

### Fixed

- Created the upload directory automatically when it did not already exist.
