export const variables = {}
variables.templateDirectory = wpparams.template_directory
variables.picturesDirectory = wpparams.pictures_directory
variables.pluginsDirectory = wpparams.plugins_directory
variables.ajaxURL = wpparams.ajax_url
variables.restURL = wpparams.rest_url
variables.restNonce = wpparams.rest_nonce // Mandatory pour l'utilisation de l'API Rest
variables.postsPerPage = wpparams.posts_per_page
variables.breakpoints = {} // Object that will contain the breakpoints
export const { __ } = wp.i18n // Translate lib passed in the register script
