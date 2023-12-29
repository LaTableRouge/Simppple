/*
 * Add scrollbar size to root element
 * */
export const putScrollbarSizeInCSSVariables = () => {
	let timeout = false
	window.addEventListener('resize', () => {
		if (timeout) {
			window.cancelAnimationFrame(timeout)
		}

		timeout = window.requestAnimationFrame(() => {
			document.documentElement.style.setProperty('--scrollbarsize', `${window.innerWidth - document.documentElement.clientWidth}px`)
		})
	})

	setTimeout(() => {
		document.documentElement.style.setProperty('--scrollbarsize', `${window.innerWidth - document.documentElement.clientWidth}px`)
	}, 0)
}

export const removeElement = (element) => {
	if (element) {
		element.parentNode.removeChild(element)
	}
}

const request = (url, params = {}, method = 'GET', format = 'json') => {
	const options = {
		method
	}

	if (method === 'GET') {
		url += `?${new URLSearchParams(params)}`
	} else {
		let formData = params
		if (typeof params === 'object' && !(params instanceof FormData)) {
			formData = new FormData()
			for (const key in params) {
				formData.append(key, params[key])
			}
		}

		options.body = formData
	}

	return fetch(url, options).then((response) => (format === 'json' ? response.json() : response.text()))
}

export const get = (url, params, format) => request(url, params, 'GET', format)
export const post = (url, params, format) => request(url, params, 'POST', format)

export const delay = (n) => {
	n = n || 2000
	return new Promise((resolve) => {
		setTimeout(() => {
			resolve()
		}, n)
	})
}
