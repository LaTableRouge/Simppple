import { __ } from '../../../../src/scripts/common/variables'

export const blockTableGridJSInit = () => {
	const gridElements = document.querySelectorAll('.table-paginate:not(.is-init)')
	if (gridElements.length) {
		import('gridjs').then((gridjs) => {
			const Grid = gridjs.Grid
			gridElements.forEach((element) => {
				element.classList.add('is-init')

				// Ajoute une wrapper dans lequel sera append le tableau
				const wrapper = /* html */ '<div class="table-paginate__grid-wrapper"></div>'
				element.insertAdjacentHTML('afterbegin', wrapper)

				// Création de l'instance du tableau interactif
				new Grid({
					from: element.querySelector('table'),
					language: {
						search: {
							placeholder: __('Search...', 'simppple')
						}
					},
					search: true,
					sort: true,
					pagination: {
						limit: 4,
						summary: false
					}
				}).render(element.querySelector('.table-paginate__grid-wrapper'))
			})
		})
	}
}

blockTableGridJSInit()
