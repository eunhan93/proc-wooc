<?php 


// 회원가입 폼 필드 추가

function add_tml_registration_form_fields() {
	tml_add_form_field( 'register', 'phone_number', array(
		'type'     => 'text',
		'label'    => '전화번호',
		'value'    => tml_get_request_value( 'phone_number', 'post' ),
		'id'       => 'phone_number',
		'priority' => 15,
	) );
	// tml_add_form_field( 'register', 'last_name', array(
	// 	'type'     => 'text',
	// 	'label'    => 'Last Name',
	// 	'value'    => tml_get_request_value( 'last_name', 'post' ),
	// 	'id'       => 'last_name',
	// 	'priority' => 15,
	// ) );
}
add_action( 'init', 'add_tml_registration_form_fields' );




// 새로운 회원가입 폼 추가

// 액션 추가

function register_client_registration_action() {
	tml_register_action( 'client_registration', array(
		'title'              => 'Client Registration',
		'slug'               => 'client-registration',
		'callback'           => 'tml_registration_handler',
		'show_on_forms'      => false,
		'show_nav_menu_item' => ! is_user_logged_in(),
	) );
}
add_action( 'init', 'register_client_registration_action', 5 );


// 폼 생성

function register_client_registration_form() {
	// First, we'll register the form
	tml_register_form( 'client_registration', array(
		'action' => tml_get_action_url( 'client_registration' ),
	) );

	// Now we'll copy all fields from the default registration form
	foreach ( tml_get_form_fields( 'register' ) as $field ) {
		tml_add_form_field( 'client_registration', $field );
	}

	// Now we can add any custom fields
	tml_add_form_field( 'client_registration', 'first_name', array(
		'type'     => 'text',
		'label'    => 'First Name',
		'value'    => tml_get_request_value( 'first_name', 'post' ),
		'id'       => 'first_name',
		'priority' => 15,
	) );
	tml_add_form_field( 'client_registration', 'last_name', array(
		'type'     => 'text',
		'label'    => 'Last Name',
		'value'    => tml_get_request_value( 'last_name', 'post' ),
		'id'       => 'last_name',
		'priority' => 15,
	) );
	tml_add_form_field( 'client_registration', 'company', array(
		'type'     => 'text',
		'label'    => 'Company',
		'value'    => tml_get_request_value( 'company', 'post' ),
		'id'       => 'company',
		'priority' => 15,
	) );
}
add_action( 'init', 'register_client_registration_form', 5 );


// 유효성 검사

function validate_client_registration_form_fields( $errors ) {
	// We only want this callback to fire if our custom action is being run
	if ( tml_is_action( 'client_registration' ) ) {
		if ( empty( $_POST['first_name'] ) ) {
			$errors->add( 'empty_first_name', '<strong>ERROR</strong>: Please enter your first name.' );
		}
		if ( empty( $_POST['last_name'] ) ) {
			$errors->add( 'empty_last_name', '<strong>ERROR</strong>: Please enter your last name.' );
		}
		if ( empty( $_POST['company'] ) ) {
			$errors->add( 'empty_company', '<strong>ERROR</strong>: Please enter the name of your company.' );
		}
	}
	return $errors;
}
add_filter( 'registration_errors', 'validate_client_registration_form_fields' );



// 저장

function save_client_registration_form_fields( $user_id ) {
	// We only want this callback to fire if our custom action is being run
	if ( tml_is_action( 'client_registration' ) ) {
		if ( ! empty( $_POST['first_name'] ) ) {
			update_user_meta( $user_id, 'first_name', sanitize_text_field( $_POST['first_name'] ) );
		}
		if ( ! empty( $_POST['last_name'] ) ) {
			update_user_meta( $user_id, 'last_name', sanitize_text_field( $_POST['last_name'] ) );
		}
		if ( ! empty( $_POST['company'] ) ) {
			update_user_meta( $user_id, 'company', sanitize_text_field( $_POST['company'] ) );
		}

		// Perhaps we want to set a custom role for this type of registration? Use this.
		// $user = get_user_by( 'id', $user_id );
		// $user->set_role( 'client' );
	}
}
add_action( 'user_register', 'save_client_registration_form_fields' );





// 회원가입 폼 필드 삭제
// tml_remove_form_field()
