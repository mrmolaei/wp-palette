<?php


namespace WP_Palette;


class Setup extends BaseClass
{

	public static function get_services()
	{
		return [
			Services\AdminPages::class,
			Services\Settings::class,
			Services\Assets::class,
			Services\ColorsPalette::class,
		];
	}

	public static function register_services()
	{

		$services = self::get_services();

		foreach ( $services as $class ) {
			$service = self::instantiate( $class );


			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

	public static function instantiate( $class )
	{
		return new $class;
	}


	public static function activate()
	{
		//Activate::activate();
	}

	public function deactivate()
	{
		//Deactivate::deactivate();
	}
}