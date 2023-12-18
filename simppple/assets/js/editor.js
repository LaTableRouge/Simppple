import '../scss/editor.scss' // mandatory for the Hot Module Reload

const { __ } = wp.i18n

// Register a variation for the block "group"
wp.blocks.registerBlockVariation('core/group', {
	name: 'simppple/group-shadow',
	title: __('Group with a shadow', 'simppple'),
	description: __('A variation of the group block with a drop shadow', 'simppple'),
	attributes: {
		className: 'group-shadow'
	}
})

wp.blocks.registerBlockVariation('core/table', {
	name: 'simppple/table-paginate',
	title: __('Table with pagination', 'simppple'),
	attributes: {
		className: 'table-paginate'
	}
})

// Gutenberg ready
if (document.querySelector('.block-editor__container')) {
	let blocksLoaded = false
	const blocksLoadedInterval = setInterval(function () {
		const editorWrapper = document.querySelector('.editor-styles-wrapper')
		if (editorWrapper) {
			blocksLoaded = true

			// DO code here
		}

		if (blocksLoaded) {
			clearInterval(blocksLoadedInterval)
		}
	}, 500)
}
