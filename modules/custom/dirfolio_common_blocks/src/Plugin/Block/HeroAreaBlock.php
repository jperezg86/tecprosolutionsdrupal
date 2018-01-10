<?php
	namespace Drupal\dirfolio_common_blocks\Plugin\Block;
	use Drupal\Core\Block\BlockBase;
	/**
	* Provides a user details block.
	*
	* @Block(
	* id = "hero_area_block",
	* admin_label = @Translation("Hero Area Block!")
	* )
	*/
	class HeroAreaBlock extends BlockBase {
		/**
		* {@inheritdoc}
		*/
		public function build() {
			return array(
				"#theme" => "hero_area"
			);
		}
	}