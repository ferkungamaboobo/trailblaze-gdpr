# GDPR Compliance
Plugin Name: GDPR Compliance

Plugin URI: https://www.trailblaze.marketing

Description: Alpha build of Trailblaze Marketing GDPR Compliance. Includes integrations with Gravity Forms and Tag Manager

Version: 0.0.01

License: GPLv2 or later

License URI: http://www.gnu.org/licenses/gpl-2.0.html

A WordPress Plugin for GDPR compliance with Google Tag Manager and Gravity Forms developed for Trailblaze Marketing

## Description
This is a plugin to help the team at [Trailblaze Marketing](https://www.trailblaze.marketing/) to make WordPress sites using Google Tag Manager compliant with GDPR regulations.

Without changes, it can do the following:
* Adds a pre-styled GDPR Cookie Consent banner that meets the requirement to provide explicit consent before tracking.
** This sets a consent cookie via javascript that sends a Google Tag Manager data layer event to enable 
* Installs Google Tag Manager with the ad storage consents denied by default.
* Adds an action to GravityForms to delete the submission from the entries database when the consent cookie is not set

## Installation
1. [Download](https://github.com/ferkungamaboobo/trailblaze-gdpr/archive/refs/heads/main.zip) the master file
1. Unzip it and upload the "trailblaze-gdpr" folder to your plugins directory.
1. Activate the plugin from the Plugins tab.

### Additional Installation Steps
Configuring Google Tag Manager is covered in the the [GitHub Wiki](https://github.com/ferkungamaboobo/trailblaze-gdpr/wiki).

To encrypt user data for the GravityForms entries, there is a paid plugin: [Gravity Forms Encrupted Fields](https://codecanyon.net/item/gravity-forms-encrypted-fields/18564931).

## Frequently Asked Questions

### What is in the pipeline to be created, fixed, or changed in the main plugin files? 

Check the [GitHub Issues](https://github.com/ferkungamaboobo/trailblaze-gdpr/issues) for the plugin to see if it's being addressed. Feel free to add to the issues or make a pull request to work on it yourself!

### Where would I learn about a given feature?
Check the [GitHub Wiki](https://github.com/ferkungamaboobo/trailblaze-gdpr/wiki) for the plugin.

## Changelog
The full changelog without version numbers can be seen at the [GitHub History](https://github.com/ferkungamaboobo/trailblaze-gdpr/commits/main) for the plugin.
