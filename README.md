# odtplusplus2dw Plugin

Create a dokuwiki page from a file.

- Fork repository: <https://github.com/brozkeff/dokuwiki-plugin-odtplus2dw>
- Upstream plugin: <http://www.dokuwiki.org/plugin:odtplus2dw>
- Original ancestor plugin: <http://www.dokuwiki.org/plugin:odt2dw>
- DokuWiki: <http://www.dokuwiki.org>

## Description

`odtplusplus2dw` is a maintenance fork of `odtplus2dw`, itself forked from
`odt2dw`. It imports documents into DokuWiki pages.

The primary supported path is ODT import.

DOCX and DOC import remain legacy compatibility paths. They now require an
explicit configuration opt-in because they depend on external converters and
increase the attack surface. They should be treated as experimental until
the conversion path is fully hardened.

## Usage

From a Dokuwiki page, click on the "Import file" button in the Page Tools.
Select a file and click upload.

## Installation

Install the plugin under the directory name `odtplusplus2dw`.

**External requirements for ODT import:**

- PHP `XSLTProcessor` support
- PHP `ZipArchive` support

**Additional optional requirements for legacy DOCX and DOC import:**

- `pandoc` for DOCX conversion
- `soffice` / LibreOffice for DOC conversion

If you run the DokuWiki server on Debian, you can accomplish these
requirements with the following steps:

- Install some packages needed:

`sudo apt-get install php-xml php-zip libreoffice-writer pandoc`

- If you wish, you can execute the script `installLatestPandoc.sh`
  (included with this plugin) to install the latest version of pandoc.
  Or you can install pandoc any other way. Check that the installed
  version is not very outdated, or the conversion can fail.

This fork no longer documents or recommends `sudo` for document conversion.
If you enable legacy DOCX or DOC import, run the required converters only in a
local setup you trust and validate.

## Configuration and Settings

The most important settings are:

- `enableUnsafeLegacyConverters`: disabled by default; enable only if you need
  DOCX or DOC import and have validated the local converter setup.
- `parserMimeTypeAuthorized`: ODT-focused by default.
- `parserMimeTypePandoc` and `parserMimeTypeSOffice`: legacy converter MIME
  lists used only when the opt-in is enabled.

## Compatibility

- Required compatibility target: DokuWiki 2023 and PHP 7.4
- Primary maintenance target: DokuWiki 2025 "Librarian" and PHP 8.2, 8.3, and
  newer compatible PHP 8 releases

## Changelog

See [CHANGELOG.md](CHANGELOG.md).
