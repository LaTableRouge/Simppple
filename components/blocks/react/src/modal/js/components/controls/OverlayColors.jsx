import { PanelColorSettings } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n'

export default function OverlayColors(props) {
	const { attributes, setAttributes } = props

	return (
		<PanelColorSettings
			title={ __('Configuration des couleurs', 'highfive') }
			colorSettings={
				[
					{
						value: attributes['overlay-background-color'],
						label: __('Fond', 'highfive'),
						onChange: (value) => {
							setAttributes({ 'overlay-background-color': value })
						},
					},
				]
			}
       	/>
	)
}
