import { PanelColorSettings } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n'

export default function CloseButtonColor(props) {
	const { attributes, setAttributes } = props

	return (
		<PanelColorSettings
			title={ __('Configuration des couleurs', 'highfive') }
			colorSettings={
				[
					{
						value: attributes['close-button-color'],
						label: __('Texte/icone', 'highfive'),
						onChange: (value) => {
							setAttributes({ 'close-button-color': value })
						},
					},
					{
						value: attributes['close-button-border-color'],
						label: __('Bordure', 'highfive'),
						onChange: (value) => {
							setAttributes({ 'close-button-border-color': value })
						},
					},
					{
						value: attributes['close-button-background-color'],
						label: __('Fond', 'highfive'),
						onChange: (value) => {
							setAttributes({ 'close-button-background-color': value })
						},
					},
				]
			}
       	/>
	)
}
