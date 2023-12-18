/*
 * Pass the header height to the document css
 * */
export const getHeaderHeight = () => {
	const header = document.querySelector('body > .wp-site-blocks > header')
	if (header) {
		document.documentElement.style.setProperty('--header-height', `${Math.round(header.getBoundingClientRect().height)}px`)
	}

	let timeout = false
	window.addEventListener('resize', () => {
		if (timeout) {
			window.cancelAnimationFrame(timeout)
		}

		timeout = window.requestAnimationFrame(() => {
			const header = document.querySelector('body > .wp-site-blocks > header')
			if (header) {
				document.documentElement.style.setProperty('--header-height', `${Math.round(header.getBoundingClientRect().height)}px`)
			}
		})
	})
}
