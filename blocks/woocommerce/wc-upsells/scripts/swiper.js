export const blockWCUpsellsCarouselInit = () => {
	const wrappers = document.querySelectorAll('.product-wrapper__infos-wrapper .upsells:not(.wc-upsells)')
	if (wrappers.length) {
		import('swiper/bundle').then((swiper) => {
			const Swiper = swiper.default

			wrappers.forEach((wrapper) => {
				// Ajoute une classe pour bien spécifier que c'est le bloc woocommerce des produits associés
				wrapper.classList.add('wc-upsells')

				const productsWrapper = wrapper.querySelector('.products')
				if (productsWrapper) {
					// Mise en place d'une structure pour Swiper JS (class & DOM)
					productsWrapper.classList.add('swiper-wrapper')

					const products = productsWrapper.querySelectorAll('.product')
					if (products.length) {
						products.forEach((product) => {
							product.classList.add('swiper-slide')
						})
					}

					// Wrap de la liste des produits dans une div
					const swiperContainer = document.createElement('div')
					swiperContainer.classList.add('swiper', 'swiper-upsells')
					productsWrapper.parentNode.insertBefore(swiperContainer, productsWrapper)
					swiperContainer.appendChild(productsWrapper)

					// Append de la navigation
					const navPrevElement = document.createElement('div')
					navPrevElement.classList.add('swiper-button-prev')
					swiperContainer.appendChild(navPrevElement)
					const navNextElement = document.createElement('div')
					navNextElement.classList.add('swiper-button-next')
					swiperContainer.appendChild(navNextElement)

					// eslint-disable-next-line no-new
					new Swiper('.swiper-upsells', {
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
					})
				}
			})
		})
	}
}

blockWCUpsellsCarouselInit()
