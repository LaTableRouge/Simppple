import 'swiper/css/bundle'
import 'gridjs/dist/theme/mermaid.css'
import '../styles/front.scss' // mandatory for the Hot Module Reload

import { putScrollbarSizeInCSSVariables } from './common/functions'
import { adminBar } from './components/admin-bar'
import { getHeaderHeight } from './components/header'
import { inputNumber } from './components/html-components/input-quantity'
import { pictureErrorHandler } from './components/picture-error'

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

	// Put color scheme in localStorage
	const userPrefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
	const userPreferences = userPrefersDark ? 'dark' : 'light'
	let colorScheme = userPreferences

	const storageColorScheme = localStorage.getItem('theme_color_scheme')
	if (storageColorScheme) {
		colorScheme = storageColorScheme
	} else {
		localStorage.setItem('theme_color_scheme', userPreferences)
	}

	document.documentElement.dataset.theme = colorScheme
})
