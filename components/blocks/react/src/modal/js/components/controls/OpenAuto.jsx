import { ToggleControl } from '@wordpress/components'
import { __ } from '@wordpress/i18n'

export default function OpenAuto(props) {
	const { defaultValue, setAttributes } = props

	return (
		<ToggleControl
			label={ __('Ouverture automatique ?', 'highfive') }
			help={ defaultValue ? __('La modale s\'ouvrira lors du chargement de la page.', 'highfive') : __('La modale s\'ouvrira avec un évènement personnalisé.', 'highfive') }
			checked={ defaultValue }
			onChange={
				(value) => {
					setAttributes({ 'open-auto': value })
				}
			}
		/>
	)
}
