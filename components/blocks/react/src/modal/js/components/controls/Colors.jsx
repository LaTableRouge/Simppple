import { PanelColorSettings } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n'

export default function Colors(props) {
	const { attributes, setAttributes } = props

	return (
		<PanelColorSettings
			title={ __('Configuration des couleurs', 'highfive') }
			colorSettings={
				[
					{
						value: attributes['background-color'],
						label: __('Fond', 'highfive'),
						onChange: (value) => {
							setAttributes({ 'background-color': value })
						},
					},
				]
			}
       	/>
	)
}
