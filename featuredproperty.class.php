<?php

/**

 * 

 */

class featuredproperty extends WP_Widget 

{

	public function __construct() {

		parent::WP_Widget(

			'featuredproperty', 

			

			//title of the widget in the WP dashboard

			__('Featured Property'), 

			array('description'=>'This will create a featured property in a widget based on details you provide', 'class'=>'featuredpropertywidget')

		);

	}

	

	/**

	 * 

	 * @param type $instance

	 */

	public function form($instance)

	{

		// these are the default widget values

		$default = array( 

			'title' => __(''),

			'img'=> __(''),

			'link'=> __(''),

			'address'=> __(''),

			'citystatezip'=> __(''),

			'type'=> __(''),

			'beds'=> __(''),

			'baths'=> __(''),

			'house'=> __(''),

			'lot'=> __(''),

			'desc'=> __('')

			);

		$instance = wp_parse_args( (array)$instance, $default );
		
		// grab our label settings	
		$fpw_settings = get_option( 'fpw_settings' );

		//this is the html for the fields in the wp dashboard

		echo "\r\n";

		echo "<p>";

		echo "<label for='".$this->get_field_id('title')."'>" . __('Title') . ":</label> " ;

		echo "<input type='text' class='widefat' id='".$this->get_field_id('title')."' name='".$this->get_field_name('title')."' value='" . esc_attr($instance['title'] ) . "' />" ;

		echo "</p>";

		echo "<p>";

		echo "<label for='".$this->get_field_id('img')."'>" . __('Property Image URL') . ":</label> " ;

		echo "<input type='text' class='widefat' id='".$this->get_field_id('img')."' name='".$this->get_field_name('img')."' value='" . esc_attr( $instance['img'] ) . "' placeholder='full image url.' />" ;
		
		echo '<input class="upload_image_button button button-primary" type="button" value="Upload Image" />';

		echo "</p>";

		echo "</p>";

		echo "<p>";

		echo "<label for='".$this->get_field_id('link')."'>" . __('Link to Propert Details') . ":</label> " ;

		echo "<input type='text' class='widefat' id='".$this->get_field_id('link')."' name='".$this->get_field_name('link')."' value='" . esc_attr( $instance['link'] ) . "' placeholder='full property details url.' />" ;

		echo "</p>";

		echo "<p>";

		echo "<label for='".$this->get_field_id('address')."'>" . __('Property Address') . ":</label> " ;

		echo "<input type='text' class='widefat' id='".$this->get_field_id('address')."' name='".$this->get_field_name('address')."' value='" . esc_attr($instance['address'] ) . "' />" ;

		echo "</p>";

		echo "<p>";

		echo "<label for='".$this->get_field_id('citystatezip')."'>" . __('City, State Zipcode') . ":</label> " ;

		echo "<input type='text' class='widefat' id='".$this->get_field_id('citystatezip')."' name='".$this->get_field_name('citystatezip')."' value='" . esc_attr($instance['citystatezip'] ) . "' />" ;

		echo "</p>";

		echo "<p>";

		echo "<label for='".$this->get_field_id('type')."'>" . __(''. ($fpw_settings['fpw_text_field_type'] ? $fpw_settings['fpw_text_field_type'] : 'Property Type' )) . ":</label> " ;

		echo "<input type='text' class='widefat' id='".$this->get_field_id('type')."' name='".$this->get_field_name('type')."' value='" . esc_attr($instance['type'] ) . "' />" ;

		echo "</p>";

		echo "<p>";

		echo "<label for='".$this->get_field_id('beds')."'>" . __('' . ($fpw_settings['fpw_text_field_beds'] ? $fpw_settings['fpw_text_field_beds'] : 'Bedrooms' )) . ":</label> " ;

		echo "<input type='text' class='widefat' id='".$this->get_field_id('beds')."' name='".$this->get_field_name('beds')."' value='" . esc_attr($instance['beds'] ) . "' />" ;

		echo "</p>";

		echo "<p>";

		echo "<label for='".$this->get_field_id('baths')."'>" . __(''. ($fpw_settings['fpw_text_field_baths'] ? $fpw_settings['fpw_text_field_baths'] : 'Bathrooms' )) . ":</label> " ;

		echo "<input type='text' class='widefat' id='".$this->get_field_id('baths')."' name='".$this->get_field_name('baths')."' value='" . esc_attr($instance['baths'] ) . "' />" ;

		echo "</p>";

		echo "<p>";

		echo "<label for='".$this->get_field_id('house')."'>" . __(''. ($fpw_settings['fpw_text_field_house'] ? $fpw_settings['fpw_text_field_house'] : 'Home Square Footage' )) . ":</label> " ;

		echo "<input type='text' class='widefat' id='".$this->get_field_id('house')."' name='".$this->get_field_name('house')."' value='" . esc_attr($instance['house'] ) . "' />" ;

		echo "</p>";

		echo "<p>";

		echo "<label for='".$this->get_field_id('lot')."'>" . __(''. ($fpw_settings['fpw_text_field_lot'] ? $fpw_settings['fpw_text_field_lot'] : 'Lot Square Footage' )) . ":</label> " ;

		echo "<input type='text' class='widefat' id='".$this->get_field_id('lot')."' name='".$this->get_field_name('lot')."' value='" . esc_attr($instance['lot'] ) . "' />" ;

		echo "</p>";

		echo "<p>";

		echo "<label for='".$this->get_field_id('desc')."'>" . __(''. ($fpw_settings['fpw_text_field_desc'] ? $fpw_settings['fpw_text_field_desc'] : 'Description' )) . ":</label> " ;

		echo "<textarea class='widefat' id='".$this->get_field_id('desc')."' name='".$this->get_field_name('desc')."' value='" . '' . "' cols='20' rows='12'>". esc_attr($instance['desc'] ) ."</textarea>" ;

		echo "</p>";

	}

		

	/**

	 * 

	 * @param type $new_instance

	 * @param type $old_instance

	 * @return type

	 */

	public function update($new_instance, $old_instance) 

	{

		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);

		$instance['img'] = $new_instance['img'];

		$instance['link'] = $new_instance['link'];

		$instance['address'] = $new_instance['address'];

		$instance['citystatezip'] = $new_instance['citystatezip'];

		$instance['type'] = $new_instance['type'];

		$instance['beds'] = $new_instance['beds'];

		$instance['baths'] = $new_instance['baths'];

		$instance['house'] = $new_instance['house'];

		$instance['lot'] = $new_instance['lot'];

		$instance['desc'] = $new_instance['desc'];

		return $instance;

	}

		

	/**

	 * Renders the actual widget

	 * 

	 * @global post $post

	 * @param array $args 

	 * @param type $instance

	 */

	public function widget($args, $instance) 

	{

		extract($args, EXTR_SKIP);

		

		//global WP theme-driven "before widget" code

		echo $before_widget;

		

		$title = apply_filters( 'widget_title', $instance['title'] );

		if ( !empty( $title ) ) {

			echo $before_title . $title . $after_title;

		}

		

		if ( !empty( $instance['img'] ) ) {

		echo '<div class="well"><div class="row"><div class="col-md-12 fprop-image">';

		echo '<a href="'.$instance['link'].'" target="_blank"><img src="'.$instance['img'].'" class="img-responsive" /></a></div></div>';

		}

		

		echo '<div class="row"><div class="col-md-12 fprop-address">';

		echo ''.$instance['address'].'<br>'.$instance['citystatezip'].'</div></div>';

		// grab our label settings	
		$fpw_settings = get_option( 'fpw_settings' );


		if ( !empty( $instance['type'] ) ) {

		echo '<div class="row"><div class="col-md-6 fprop-attrb-title">' . ($fpw_settings['fpw_text_field_type'] ? $fpw_settings['fpw_text_field_type'] : 'Type' ) . ':</div>';

		echo '<div class="col-md-6 fprop-attrb">'.$instance['type'].'</div></div>';

		}

		

		if ( !empty( $instance['beds'] ) ) {

		echo '<div class="row"><div class="col-md-6 fprop-attrb-title">' . ($fpw_settings['fpw_text_field_beds'] ? $fpw_settings['fpw_text_field_beds'] : 'Beds' ) . ':</div>';

		echo '<div class="col-md-6 fprop-attrb">'.$instance['beds'].'</div></div>';

		}

		

		if ( !empty( $instance['baths'] ) ) {

		echo '<div class="row"><div class="col-md-6 fprop-attrb-title">' . ($fpw_settings['fpw_text_field_baths'] ? $fpw_settings['fpw_text_field_baths'] : 'Baths' ) . ':</div>';

		echo '<div class="col-md-6 fprop-attrb">'.$instance['baths'].'</div></div>';

		}

		

		if ( !empty( $instance['house'] ) ) {

		echo '<div class="row"><div class="col-md-6 fprop-attrb-title">' . ($fpw_settings['fpw_text_field_house'] ? $fpw_settings['fpw_text_field_house'] : 'Home Size' ) . ':</div>';

		echo '<div class="col-md-6 fprop-attrb">'.$instance['house'].'</div></div>';

		}

		

		if ( !empty( $instance['lot'] ) ) {

		echo '<div class="row"><div class="col-md-6 fprop-attrb-title">' . ($fpw_settings['fpw_text_field_lot'] ? $fpw_settings['fpw_text_field_lot'] : 'Lot Size' ) . ':</div>';

		echo '<div class="col-md-6 fprop-attrb">'.$instance['lot'].'</div></div>';

		}

		

		if ( !empty( $instance['desc'] ) ) {

		echo '<div class="row"><div class="col-md-12 fprop-attrb-title">' . ($fpw_settings['fpw_text_field_desc'] ? $fpw_settings['fpw_text_field_desc'] : 'Description' ) . ':</div>';

		echo '</div><div class="row"><div class="col-md-12 fprop-desc">';

		echo ''.$instance['desc'].'</div></div>';

		}

		echo '</div>';

		//echo '<div class="row"><div class="col-md-12" style="padding-top: 10px;" align="center"><a href="'.$instance['link'].'" target="_blank" class="btn btn-jenfay btn-xs">View This Property</a> <a href="/properties/" class="btn btn-jenfay btn-xs">View All Properties</a></div></div></div>';

		

			

		//global WP theme-driven "after widget" code

		echo $after_widget;

	}

}

