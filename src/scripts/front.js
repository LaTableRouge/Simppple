import 'swiper/css/bundle'
import 'gridjs/dist/theme/mermaid.css'
import '../styles/front.scss' // mandatory for the Hot Module Reload

import { putScrollbarSizeInCSSVariables } from './common/functions'
import { adminBar } from './components/admin-bar'
import { getHeaderHeight } from './components/header'
import { inputNumber } from './components/html-components/input-quantity'
import { pictureErrorHandler } from './components/picture-error'

import.meta.glob(['../../blocks/**/scripts/*.js', '!**/build/*.js'], { query: '?blocks', eager: true })
import.meta.glob('../../patterns/**/scripts/*.js', { query: '?patterns', eager: true })
import.meta.glob('../../parts/**/scripts/*.js', { query: '?parts', eager: true })
import.meta.glob('../../templates/**/scripts/*.js', { query: '?templates', eager: true })

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
