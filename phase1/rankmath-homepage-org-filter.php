<?php
/**
 * Health Express – homepage only: stop Rank Math outputting its own Organization.
 * The "MedicalClinic Schema" snippet now outputs the workbook's MedicalOrganization
 * with the same @id (https://healthexpressuc.com/#organization); two different
 * entities on one @id conflict. Rank Math's WebSite/WebPage keep pointing at
 * #organization, which then resolves to the MedicalOrganization.
 * Code Snippets: PHP snippet, "Only run on site front-end".
 */
add_filter( 'rank_math/json_ld', function ( $data ) {
	if ( is_front_page() && isset( $data['publisher'] ) ) {
		unset( $data['publisher'] );
	}
	return $data;
}, 99 );
