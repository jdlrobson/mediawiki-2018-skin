<?php
/**
 * BaseTemplate class for the 2018 skin
 *
 * @ingroup Skins
 */
class Skin2018Template extends BaseTemplate {
	/**
	 * Outputs the content of the page
	 */
	public function execute() {
		// Rearrange parts of $this->data for easier handling in the template
		unset( $this->data['nav_urls']['mainpage'] );
		if ( isset( $this->data['content_navigation']['actions']['watch'] ) ) {
			$this->data['watch_indicator']['watch'] = $this->data['content_navigation']['actions']['watch'];
			unset( $this->data['content_navigation']['actions']['watch'] );
		} else {
			$this->data['watch_indicator']['unwatch'] = $this->data['content_navigation']['actions']['unwatch'];
			unset( $this->data['content_navigation']['actions']['unwatch'] );
		}

		// Output <head>
		echo $this->get( 'headelement' );

		// Output <body> using Mustache
		$templateParser = new TemplateParser( __DIR__ . '/../resources/templates' );

		echo $templateParser->processTemplate(
			'main', $this->data
		);
	}
}
