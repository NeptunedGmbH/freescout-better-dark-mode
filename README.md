# Better Dark Mode

Extra dark surfaces for the official [FreeScout Dark Mode](https://freescout.net/module/dark-mode/) module. This is an add-on. It does not include that module's source.

The stylesheet loads only when the official module is active and FreeScout has marked its license as activated. This add-on never reads the license key and never sends it anywhere. With no activated license, it does nothing.

## Installation

1. Install the official Dark Mode module and activate its license.
2. Place this module in `Modules/BetterDarkMode` and activate it.

The rules hang off the `dm` class, which the official module sets. They cover tables, accordions, the customer list, Select2, modals such as "Add folder", and the Workflow Packs graph.
