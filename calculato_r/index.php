<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>سامانه محاسبات چاپ سایت 724چاپـــــ</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="َArashAtaei">
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.css">
		<!-- DATE-PICKER -->
		<link rel="stylesheet" href="vendor/date-picker/css/datepicker.min.css">
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">

		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
	</head>
	<body style="overflow-x: hidden;">
		<div class="wrapper">
			<div class="image-holder">
				<img src="images/form-wizard.png" alt="">
			</div>
            <form action="">
            	<div class="form-header">
					<img src="images/logo100.png" alt="چاپ آنلاین | محاسبه چاپ کتاب آنلاین | 274 چاپ" >
					<br />
					<br />
					<a href="#">#چاپ آنلاین 724 چاپـــــ</a>
					<br />
					<br />
            		<h3>محاسبات آنلاین برای چاپ کتاب</h3>
            	</div>
            	<div id="wizard">
            		<!-- SECTION 1 -->
	                <h4></h4>
	                <section>
						<div class="form-row" style="margin-bottom: 26px;">
	                    	<label for="upload">
	                    		آپلود کتاب:
	                    	</label>
	                    	<div class="form-holder">
	                    		<button role="menuitem" class="btn btn-primary btn-block btn-lg" style="border-radius: 30px;" name="upload"><i class="zmdi zmdi-upload"></i> آپلود کن !</button>
								
	                    	</div>
	                    </div>
	                    <div class="form-row" style="margin-bottom: 26px;">
	                    	<label for="ghate_ketab">
	                    		قطع کتاب:
	                    	</label>
	                    	<div class="form-holder">
	                    		<select name="ghate_ketab" id="ghate_ketab" class="form-control">
									<option value="rahli_a4" class="option">رحلی   ( 280 * 210 ) ؛ A4</option>
									<option value="vaziri_b5" class="option">وزیری  ( 235 * 165 ) ؛ B5</option>
									<option value="roqei_b5" class="option">رُقعی ( 212 * 141 ) ؛ A5</option>
									<option value="kheshti" class="option">خشتی ( 220 * 220 )</option>
								</select>
								<i class="zmdi zmdi-caret-down"></i>
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="tirazhe_ketab">
	                    		تیـــــراژ:
	                    	</label>
	                    	<div class="form-holder">
								<input type="number" name="tirazhe_ketab" id="tirazhe_ketab" class="form-control">
								<i class="zmdi zmdi-plus-circle-o-duplicate"></i>
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="blackandwhitepages_ketab">
								تعداد صفحات سیاه و سفید:
	                    	</label>
	                    	<div class="form-holder">
								<input type="number" name="blackandwhitepages_ketab" id="blackandwhitepages_ketab" class="form-control">
								<i class="zmdi zmdi-plus-circle-o-duplicate"></i>
	                    	</div>
						</div>
						<div class="form-row">
	                    	<label for="blackandwhitepages_ketab">
								جنس صفحات سیاه و سفید:
	                    	</label>
	                    	<div class="form-holder">
								<select name="blackandwhitetype_ketab" id="blackandwhitetype_ketab" class="form-control">
									<option value="tahrir_70gr" class="option">تحریر 70 گرمی</option>
									<option value="tahrir_80gr" class="option">تحریر 80 گرمی</option>
									<option value="paper_beige" class="option">کاغذ کرم</option>
									<option value="bulky_paper" class="option">کاغذ بالکی</option>
									<option value="just_print" class="option">فقط چاپـــــ ( تامین کاغذ بر عهده مشتری )</option>
								</select>
								<i class="zmdi zmdi-caret-down"></i>
	                    	</div>
						</div>
	                    <div class="form-row">
	                    	<label for="coloredpages_ketab">
							تعداد صفحات رنگی:
	                    	</label>
	                    	<div class="form-holder">
								<input type="number" name="coloredpages_ketab" id="coloredpages_ketab" class="form-control">
								<i class="zmdi zmdi-plus-circle-o-duplicate"></i>
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="pagenature_ketab">
	                    		جنس صفحات رنگی:
	                    	</label>
	                    	<div class="form-holder">
								<select name="pagenature_ketab" id="pagenature_ketab" class="form-control">
									<option value="gelaseh_159gr" class="option">گلاسه 159 گرمی</option>
									<option value="gelaseh_135gr" class="option">گلاسه 135 گرمی</option>
									<option value="gelaseh_100gr" class="option">گلاسه 100 گرمی</option>
									<option value="tahrir_80gr" class="option">تحریر 80 گرمی</option>
									<option value="tahrir_70gr" class="option">تحریر 70 گرمی</option>
								</select>
								<i class="zmdi zmdi-caret-down"></i>
	                    	</div>
						</div>
						<div class="form-row">
	                    	<label for="pagenature_ketab">
	                    		بازه صفحات رنگی:
	                    	</label>
	                    	<div class="form-holder">
								<select name="pagenature_ketab" id="pagenature_ketab" class="form-control">
									<option value="in_one_season" class="option">در یک فصل</option>
									<option value="in_whole_context" class="option">در کل متن</option>
								</select>
								<i class="zmdi zmdi-caret-down"></i>
	                    	</div>
	                    </div>		
	                </section>
	                
					<!-- SECTION 2 -->
	                <h4></h4>
	                <section>
	                    <div class="form-row">
	                    	<label for="">
	                    		Date of Birth:
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control datepicker-here" data-language='en' data-date-format="dd - mm - yyyy" id="dp1">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Country of Birth:
	                    	</label>
	                    	<div class="form-holder">
	                    		<select name="" id="" class="form-control">
									<option value="united states" class="option">United States</option>
									<option value="united kingdom" class="option">United Kingdom</option>
									<option value="viet nam" class="option">Viet Nam</option>
								</select>
								<i class="zmdi zmdi-caret-down"></i>
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Your Email:
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control">
	                    	</div>
	                    </div>	
	                    <div class="form-row" style="margin-bottom: 3.4vh">
	                    	<label for="">
	                    		Phone Number:
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control">
	                    	</div>
	                    </div>	
	                    <div class="form-row" style="margin-bottom: 50px;">
	                    	<label for="">
	                    		Gender:
	                    	</label>
	                    	<div class="form-holder">
	                    		<div class="checkbox-circle">
									<label class="male">
										<input type="radio" name="gender" value="male" checked> Male<br>
										<span class="checkmark"></span>
									</label>
									<label class="female">
										<input type="radio" name="gender" value="female"> Female<br>
										<span class="checkmark"></span>
									</label>
									<label>
										<input type="radio" name="gender" value="transgender">Transgender<br>
										<span class="checkmark"></span>
									</label>
								</div>
	                    	</div>
	                    </div>		
	                </section>

	                <!-- SECTION 3 -->
	                <h4></h4>
	                <section>
	                    <div class="form-row">
	                    	<label for="">
	                    		Course ID:
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" placeholder="Ex. abc 12345 or abc 1234L">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Course Title:
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" placeholder="Ex. Intro to physic">
	                    	</div>
	                    </div>	
                     	<div class="form-row">
	                    	<label for="">
	                    		Section(s):
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" placeholder="Ex. 3679 or 33fa, 4295">
	                    	</div>
	                    </div>	
	                    <div class="form-row" style="margin-bottom: 38px">
	                    	<label for="">
	                    		Select Teacher:
	                    	</label>
	                    	<div class="form-holder">
	                    		<select name="" id="" class="form-control">
	                    			<option value="frances meyer" class="option">Frances Meyer</option>
									<option value="johan lucas" class="option">Johan Lucas</option>
									<option value="merry linn" class="option">Merry Linn</option>
								</select>
								<i class="zmdi zmdi-caret-down"></i>
	                    	</div>
	                    </div>	
	                    <div class="checkbox-circle" style="margin-bottom: 48px;">
							<label>
								<input type="checkbox" checked>I agree all statement in Terms & Conditions
								<span class="checkmark"></span>
							</label>
						</div>
	                </section>
            	</div>
            </form>
		</div>

		<script src="js/jquery-3.3.1.min.js"></script>
		
		<!-- JQUERY STEP -->
		<script src="js/jquery.steps.js"></script>

		<!-- DATE-PICKER -->
		<script src="vendor/date-picker/js/datepicker.js"></script>
		<script src="vendor/date-picker/js/datepicker.en.js"></script>

		<script src="js/main.js"></script>
<!-- Template created and distributed by Colorlib -->
</body>
</html>