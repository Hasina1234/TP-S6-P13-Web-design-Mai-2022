<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    if(!function_exists('img_loader'))
	{
		function img_loader($name)
		{
			return base_url()."/assets/img/".$name;
		}
	}

	if(!function_exists('css_loader'))
	{
		function css_loader($name)
		{
			return base_url()."/assets/css/".$name.".css";
		}
	}

	if(!function_exists('bootstrap_loader'))
	{
		function bootstrap_loader($name)
		{
			return base_url()."assets/vendor/bootstrap/css/".$name.".css";
		}
	}

	if(!function_exists('aos_loader'))
	{
		function aos_loader($name)
		{
			return base_url()."assets/vendor/aos/".$name.".css";
		}
	}

	if(!function_exists('icon_loader'))
	{
		function icon_loader($name)
		{
			return base_url()."assets/vendor/bootstrap-icons/".$name.".css";
		}
	}

	if(!function_exists('box_loader'))
	{
		function box_loader($name)
		{
			return base_url()."assets/vendor/boxicons/css/".$name.".css";
		}
	}

	if(!function_exists('swiper_loader'))
	{
		function swiper_loader($name)
		{
			return base_url()."assets/vendor/swiper/".$name.".css";
		}
	}

	if(!function_exists('glight_loader'))
	{
		function glight_loader($name)
		{
			return base_url()."assets/vendor/glightbox/css/".$name.".css";
		}
	}


	if(!function_exists('js_loader'))
	{
		function js_loader($name)
		{
			return base_url()."/assets/js/".$name.".js";
		}
	}

	if(!function_exists('aosJs_loader'))
	{
		function aosJs_loader($name)
		{
			return base_url()."assets/vendor/aos/".$name.".js";
		}
	}

	if(!function_exists('bootstrapJs_loader'))
	{
		function bootstrapJs_loader($name)
		{
			return base_url()."assets/vendor/bootstrap/js/".$name.".js";
		}
	}

	if(!function_exists('swiperJs_loader'))
	{
		function swiperJs_loader($name)
		{
			return base_url()."assets/vendor/swiper/".$name.".js";
		}
	}

	if(!function_exists('glightJs_loader'))
	{
		function glightJs_loader($name)
		{
			return base_url()."assets/vendor/glightbox/js/".$name.".js";
		}
	}

	if(!function_exists('map_loader'))
    {
        function map_loader($name)
        {
            return base_url()."/assets/map/".$name.".map";
        }
    }

?>