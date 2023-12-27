/*
 * Add '.has-admin-bar' class to html tag if admin bar is present
 * Will be obsolete when :has will be fully supported in CSS
 * */
export const adminBar = () => {
	const adminBar = document.querySelector('#wpadminbar')
	if (adminBar) {
		// Start on resize
		let timeout = false
		const delay = 250
		window.addEventListener(
			'resize',
			() => {
				clearTimeout(timeout)
				timeout = setTimeout(() => {
					if (!document.documentElement.classList.contains('admin-bar')) {
						document.documentElement.classList.add('has-admin-bar')
					}
				}, delay)
			},
			false
		)

		// Start on page load
		if (!document.documentElement.classList.contains('admin-bar')) {
			document.documentElement.classList.add('has-admin-bar')
		}
	}
}
