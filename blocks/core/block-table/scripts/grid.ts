import { __ } from '../../../../src/scripts/common/variables'

// Define our own types for Grid configuration
type GridLanguage = {
	search: {
		placeholder: string
	}
}

type GridPagination = {
	limit: number
	summary: boolean
}

type GridConfig = {
	from: HTMLElement
	language: GridLanguage
	search: boolean
	sort: boolean
	pagination: GridPagination
}

/**
 * Initializes interactive tables with pagination, search, and sorting capabilities
 */
export const blockTableGridJSInit = (): void => {
	const gridElements: NodeListOf<HTMLElement> = document.querySelectorAll('.table-paginate:not(.is-init)')

	if (!gridElements.length) return

	import('gridjs').then(({ Grid }) => {
		gridElements.forEach((element: HTMLElement) => {
			element.classList.add('is-init')

			// Add wrapper for the table
			const wrapper = /* html */ '<div class="table-paginate__grid-wrapper"></div>'
			element.insertAdjacentHTML('afterbegin', wrapper)

			const gridWrapper = element.querySelector('.table-paginate__grid-wrapper')
			const sourceTable = element.querySelector('table')

			if (!gridWrapper || !sourceTable) return

			// Create interactive table instance
			const gridConfig: GridConfig = {
				from: sourceTable,
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
			}

			new Grid(gridConfig).render(gridWrapper)
		})
	})
}

// Initialize on DOMContentLoaded instead of immediate execution
window.addEventListener('DOMContentLoaded', () => {
	blockTableGridJSInit()
})
