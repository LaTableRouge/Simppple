import { TextControl } from '@wordpress/components'
import { __ } from '@wordpress/i18n'

export default function OpenSelector(props) {
	const { defaultValue, setAttributes } = props

	return (
		<TextControl
			label={ __('Sélecteur d\'ouverture de la modale', 'highfive') }
			type="text"
			value={ defaultValue || "" }
			help={ __('Le sélécteur d\'élément qui va ouvrir la modale.', 'highfive') }
			onChange={
				(value) => {
					setAttributes({ 'open-selector': value })
				}
			}
		/>
	)
}
