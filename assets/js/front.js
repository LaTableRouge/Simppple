import 'swiper/css/bundle'
import 'gridjs/dist/theme/mermaid.css'
import '../scss/front.scss' // mandatory for the Hot Module Reload

import { putScrollbarSizeInCSSVariables } from './common/functions'
import { adminBar } from './components/admin-bar'
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
	 * - header height
	 * */
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
