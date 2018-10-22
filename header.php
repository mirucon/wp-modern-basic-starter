<?php
/**
 * The template for displaying header.
 *
 * @package Modern_Basic
 */

namespace Modern_Basic\Header {

	use Modern_Basic\Inc\Template\Template_Header_Helper;

	?>

	<!DOCTYPE html>
	<html <?php language_attributes(); ?>>
		<head>
			<?php echo Template_Header_Helper::get_head_part(); // WPCS: XSS OK. ?>
		</head>

	<body <?php body_class(); ?>>

		<?php echo Template_Header_Helper::get_skip_link(); // WPCS: XSS OK. ?>

		<?php echo Template_Header_Helper::get_header_part(); // WPCS: XSS OK. ?>

	<?php
}
