import type { Swiper as SwiperType } from 'swiper'

type SwiperBreakpoints = {
	[width: number]: {
		slidesPerView: number
	}
}

type SwiperConfig = {
	slidesPerView: number
	spaceBetween: number
	navigation: {
		nextEl: string
		prevEl: string
	}
	breakpoints: SwiperBreakpoints
}

export const blockWCRelatedProductsCarouselInit = (): void => {
	const wrappers: NodeListOf<HTMLElement> = document.querySelectorAll('.wp-block-woocommerce-related-products')

	if (!wrappers.length) return

	import('swiper/bundle').then((swiper) => {
		const Swiper = swiper.default as typeof SwiperType

		wrappers.forEach((wrapper) => {
			const queryBlock = wrapper.querySelector('.wp-block-query')
			if (!queryBlock) return

			// Add class to specify this is the WooCommerce related products block
			queryBlock.classList.add('wc-related-products')

			const productsWrapper = queryBlock.querySelector('.wp-block-post-template')
			if (!productsWrapper) return

			let classes = productsWrapper.className.split(' ')
			classes = classes.filter((string) => string.includes('columns-'))
			const columnNumberDesktop = classes.map((classString) => parseInt(classString.replace('columns-', ''))).pop() || 4 // Default to 4 if no column number found

			// Setup Swiper JS structure (class & DOM)
			productsWrapper.classList.add('swiper-wrapper')

			const products = productsWrapper.querySelectorAll('.product')
			if (products.length) {
				products.forEach((product) => {
					product.classList.add('swiper-slide')
				})
			}

			// Wrap product list in a div
			const swiperContainer = document.createElement('div')
			swiperContainer.classList.add('swiper', 'swiper-related-products')
			productsWrapper.parentNode?.insertBefore(swiperContainer, productsWrapper)
			swiperContainer.appendChild(productsWrapper)

			// Append navigation
			const navPrevElement = document.createElement('div')
			navPrevElement.classList.add('swiper-button-prev')
			swiperContainer.appendChild(navPrevElement)

			const navNextElement = document.createElement('div')
			navNextElement.classList.add('swiper-button-next')
			swiperContainer.appendChild(navNextElement)

			const swiperConfig: SwiperConfig = {
				slidesPerView: 1,
				spaceBetween: 20,
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev'
				},
				breakpoints: {
					576: {
						slidesPerView: 2
					},
					768: {
						slidesPerView: 3
					},
					1200: {
						slidesPerView: columnNumberDesktop
					}
				}
			}

			// eslint-disable-next-line no-new
			new Swiper('.swiper-related-products', swiperConfig)
		})
	})
}

window.addEventListener('DOMContentLoaded', () => {
	blockWCRelatedProductsCarouselInit()
})
