import 'gridjs/dist/theme/mermaid.css'
import '../scss/front.scss' // mandatory for the Hot Module Reload

import { putScrollbarSizeInCSSVariables } from './common/functions'
import { variables } from './common/variables'
import { adminBar } from './components/admin-bar'
import { getCSSVariables } from './components/css-variables'
import { getHeaderHeight } from './components/header'
import { inputNumber } from './components/html-components/input-quantity'
import { pictureErrorHandler } from './components/picture-error'

import.meta.glob(['../../blocks/**/js/*.js', '!**/build/*.js'], { as: 'blocks', eager: true })
import.meta.glob('../../patterns/**/js/*.js', { as: 'patterns', eager: true })
import.meta.glob('../../parts/**/js/*.js', { as: 'parts', eager: true })
import.meta.glob('../../templates/**/js/*.js', { as: 'templates', eager: true })

window.addEventListener('DOMContentLoaded', (e) => {
	/*
	 * Add usefull values to css
	 * - scrollbar size
	 * - css breakpoints
	 * - header height
	 * */
	const cssBreakpoints = getCSSVariables('breakpoint')
	if (cssBreakpoints.length) {
		cssBreakpoints.forEach((breakpoint) => {
			const breakpointPrefix = breakpoint[0].split('-').pop()
			variables.breakpoints[breakpointPrefix] = breakpoint[1]
		})
	}
	putScrollbarSizeInCSSVariables()
	getHeaderHeight()

	/*
	 * Add '.has-admin-bar' class to html tag if admin bar is present
	 * Not mandatory if :has() has is fully supported in css
	 * */
	adminBar()

	/*
	 * Display a placeholder picture if the picture is 404
	 * */
	pictureErrorHandler()

	/*
	 * Improve the UX of the input[type="number"]
	 * */
	inputNumber()
})
