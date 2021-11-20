<?php
//Body
$font_family = !empty( $smof_data['xecuter_body_font_family'] ) ?  $smof_data['xecuter_body_font_family'] : 'iransans';

if($font_family == 'segoe' || $font_family == "nahid"){
	$css.=" 
		@font-face {
			font-family: 'sao-$font_family';
			src: url('".get_template_directory_uri()."/fonts/$font_family.woff') format('woff');
		}
	";
	 
}else{
	$css.=" 
		@font-face {
			font-family: 'sao-$font_family';
			font-weight:normal;
			font-weight:400;
			src: url('".get_template_directory_uri()."/fonts/$font_family.woff') format('woff');
		}
		@font-face {
			font-family: 'sao-$font_family';
			font-weight:bold;
			font-weight:700;
			src: url('".get_template_directory_uri()."/fonts/$font_family-bold.woff') format('woff');
		} 
	";
}
if($font_family == 'yekan'  ){
	$css.=" 
		@font-face {
			font-family: 'roboto';
			font-style: normal;
			font-weight: 400;
			src: local('Roboto'), local('Roboto-Regular'), url(https://fonts.gstatic.com/s/roboto/v16/CWB0XYA8bzo0kSThX0UTuA.woff2) format('woff2');
			unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
		}
		@font-face {
			font-family: 'roboto';
			font-style: bold;
			font-weight: 700;
			src: local('roboto Medium'), local('roboto-Medium'), url(https://fonts.gstatic.com/s/roboto/v16/RxZJdnzeo3R5zSexge8UUVtXRa8TVwTICgirnJhmVJw.woff2) format('woff2');
			unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
		}
	";
}

//Logo
 	
	
$logo_family = !empty( $smof_data['xecuter_logo_font_family'] ) ?  $smof_data['xecuter_logo_font_family'] : '';

 
if($font_family !== $logo_family){
 	if($logo_family == 'segoe' || $font_family == "nahid"){
		$css.=" 
			@font-face {
				font-family: 'sao-$font_family';
				src: url('".get_template_directory_uri()."/fonts/$font_family.woff') format('woff');
			}
		";
		 
	}elseif(!empty($logo_family)){
		$css.=" 
			@font-face {
				font-family: 'sao-$font_family';
				font-weight:normal;
				font-weight:400;
				src: url('".get_template_directory_uri()."/fonts/$font_family.woff') format('woff');
			}
			@font-face {
				font-family: 'sao-$font_family';
				font-weight:bold;
				font-weight:700;
				src: url('".get_template_directory_uri()."/fonts/$font_family-bold.woff') format('woff');
			} 
			
		";
	}
	if($logo_family == 'yekan'  ){
		$css.=" 
			@font-face {
				font-family: 'roboto';
				font-style: normal;
				font-weight: 400;
				src: local('Roboto'), local('Roboto-Regular'), url(https://fonts.gstatic.com/s/roboto/v16/CWB0XYA8bzo0kSThX0UTuA.woff2) format('woff2');
				unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
			}
			@font-face {
				font-family: 'roboto';
				font-style: bold;
				font-weight: 700;
				src: local('roboto Medium'), local('roboto-Medium'), url(https://fonts.gstatic.com/s/roboto/v16/RxZJdnzeo3R5zSexge8UUVtXRa8TVwTICgirnJhmVJw.woff2) format('woff2');
				unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
			}
		";
	}
}
?>