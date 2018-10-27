<?php
/**
 * The template for displaying footer.
 *
 * @package Modern_Basic
 */

namespace Modern_Basic\Footer {

	use Modern_Basic\Inc\Template\Template_Footer_Helper;

	echo Template_Footer_Helper::get_footer_part(); // WPCS: XSS OK.

	?>

	<?php wp_footer(); ?>

	</body>
	</html>

	<?php

}
