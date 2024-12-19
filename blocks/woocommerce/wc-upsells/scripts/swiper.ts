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

export const blockWCUpsellsCarouselInit = (): void => {
	const wrappers: NodeListOf<HTMLElement> = document.querySelectorAll('.product-wrapper__infos-wrapper .upsells:not(.wc-upsells)')

	if (!wrappers.length) return

	import('swiper/bundle').then((swiper) => {
		const Swiper = swiper.default as typeof SwiperType

		wrappers.forEach((wrapper) => {
			// Add class to specify this is the WooCommerce upsells block
			wrapper.classList.add('wc-upsells')

			const productsWrapper = wrapper.querySelector('.products')
			if (!productsWrapper) return

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
			swiperContainer.classList.add('swiper', 'swiper-upsells')
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
					}
				}
			}

			// eslint-disable-next-line no-new
			new Swiper('.swiper-upsells', swiperConfig)
		})
	})
}

window.addEventListener('DOMContentLoaded', () => {
	blockWCUpsellsCarouselInit()
})
