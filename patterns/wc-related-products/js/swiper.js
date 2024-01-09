import Swiper from 'swiper/bundle'

export const blockWCRelatedProductsCarouselInit = () => {
	const wrappers = document.querySelectorAll('.wp-block-woocommerce-related-products')
	if (wrappers.length) {
		wrappers.forEach((wrapper) => {
			const queryBlock = wrapper.querySelector('.wp-block-query')
			if (queryBlock) {
				// Ajoute une classe pour bien spécifier que c'est le bloc woocommerce des produits associés
				queryBlock.classList.add('wc-related-products')

				const productsWrapper = queryBlock.querySelector('.wp-block-post-template')
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
					swiperContainer.classList.add('swiper', 'swiper-related-products')
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
					new Swiper('.swiper-related-products', {
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
							}
						}
					})
				}
			}
		})
	}
}

blockWCRelatedProductsCarouselInit()
