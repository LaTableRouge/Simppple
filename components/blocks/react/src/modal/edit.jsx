import './scss/editor.scss'

import {InnerBlocks, useBlockProps} from '@wordpress/block-editor'
import { useEffect } from '@wordpress/element'

import { createInlineStyle } from './js/common/create-inline-style'
import CloseModal from './js/components/CloseModal'
import Controls from './js/components/Controls'

export default function Edit({ attributes, setAttributes }) {
	const blockProps = useBlockProps()

	const options = {...attributes}

	// Ajoute les options en fonction du breakpoint dans la config de la modale
	if (options.breakpoints.length > 0) {
		const breakpointObject = {}
		options.breakpoints.forEach((element) => {
			breakpointObject[`(min-width: ${element.breakpoint})`] = {
				...element.config
			}
		})
		options.breakpoints = breakpointObject
	}

	useEffect(() => {
		setAttributes( { blockId: blockProps.id } );
	}, [])

	return (
		<>
			<Controls setAttributes={setAttributes} attributes={attributes} />

			<section {...blockProps}>
				<style className='highfive-modal__config-style'>{createInlineStyle(options, blockProps.id)}</style>

				<div className="highfive-modal__inner-wrapper">
					<div className='highfive-modal__overlay js-close-modal'></div>

					<div className='highfive-modal__content'>
						<CloseModal className='content__close' />
						<InnerBlocks />
					</div>
				</div>
			</section>
		</>
	)
}
