# PwQuickFixes

## A message to Russian 🇷🇺 people

If you currently live in Russia, please read [this message](https://github.com/Roave/SecurityAdvisories/blob/latest/ToRussianPeople.md).

[![SWUbanner](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/banner2-direct.svg)](https://github.com/vshymanskyy/StandWithUkraine/blob/main/docs/README.md)

---

This module is intended to serve as a collection of ProcessWire fixes that can easily
be enabled via checkboxes in the module's config. It is NOT intended to be a replacement
for github issue reports or pull requests!

The idea is that we have a place where we can put fixes for issues that are not yet fixed
in the core until they get properly fixed there.

It is also not my intention to put pressure on Ryan to fix issues quicker. The idea is
that we have a place where we can share our fixes across projects and across users and
maybe get a better feeling on the "impact" of different issues. The module could also
make it easier for Ryan to test issue reports and the solutions provided by the community:

## Intended Workflow

* Identify an issue
* Create the related files in the `fixes` folder of this module
* Create a PR so that I can merge the fix and everybody can use/test/improve it
* Create an issue [in the official PW issues repo](https://github.com/processwire/processwire-issues/issues)
and link the fix in your description

## Usage

Just add your fixes in the `fixes` folder and activate them in the config of this
module (via checkbox). See the `Foo` example module how to add JS and CSS.

![img](https://i.imgur.com/otzd452.gif)
