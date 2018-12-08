(function($){
	var initLayout = function() {
		var hash = window.location.hash.replace('#', '');
		var currentTab = $('ul.navigationTabs a')
							.bind('click', showTab)
							.filter('a[rel="' + hash + '"]');
		if (currentTab.size() == 0) {
			currentTab = $('ul.navigationTabs a:first');
		}
		showTab.apply(currentTab.get(0));
		$('#colorpickerHolder').ColorPicker({flat: true});
		$('#colorpickerHolder2').ColorPicker({
			flat: true,
			color: '#00ff00',
			onSubmit: function(hsb, hex, rgb) {
				$('#colorSelector2 div').css('backgroundColor', '#' + hex);
			}
		});
		$('#colorpickerHolder2>div').css('position', 'absolute');
		var widt = false;
		$('#colorSelector2').bind('click', function() {
			$('#colorpickerHolder2').stop().animate({height: widt ? 0 : 173}, 500);
			widt = !widt;
		});
		$('#colorpickerField1, #colorpickerField2, #colorpickerField3').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).val(hex);
				$(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				$(this).ColorPickerSetColor(this.value);
			}
		})
		.bind('keyup', function(){
			$(this).ColorPickerSetColor(this.value);
		});
		$('#colorSelector').ColorPicker({
			color: '#0000ff',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector div').css('backgroundColor', '#' + hex);
			}
		});
		$('#colorSelector1').ColorPicker({
			color: $("#header_background").val(),
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector1 div').css('backgroundColor', '#' + hex);
				$("#header_background").val('#'+hex);
			}
		});
		$('#colorSelector2').ColorPicker({
			color: $("#color_talking_point_2").val(),
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector2 div').css('backgroundColor', '#' + hex);
				$("#color_talking_point_2").val('#'+hex);
			}
		});
		$('#colorSelector3').ColorPicker({
			color: $("#color_talking_point_3").val(),
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector3 div').css('backgroundColor', '#' + hex);
				$("#color_talking_point_3").val('#'+hex);
			}
		});
		$('#colorSelector4').ColorPicker({
			color: $("#color_talking_point_4").val(),
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector4 div').css('backgroundColor', '#' + hex);
				$("#color_talking_point_4").val('#'+hex);
			}
		});
		$('#colorSelector5').ColorPicker({
			color: $("#color_talking_point_5").val(),
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector5 div').css('backgroundColor', '#' + hex);
				$("#color_talking_point_5").val('#'+hex);
			}
		});
		$('#colorSelectQuote1').ColorPicker({
			color: $("#quote_color_talking_point_1").val(),
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelectQuote1 div').css('backgroundColor', '#' + hex);
				$("#quote_color_talking_point_1").val('#'+hex);
			}
		});
		$('#colorSelectQuote2').ColorPicker({
			color: $("#quote_color_talking_point_2").val(),
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelectQuote2 div').css('backgroundColor', '#' + hex);
				$("#quote_color_talking_point_2").val('#'+hex);
			}
		});
		$('#colorSelectQuote3').ColorPicker({
			color: $("#quote_color_talking_point_3").val(),
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelectQuote3 div').css('backgroundColor', '#' + hex);
				$("#quote_color_talking_point_3").val('#'+hex);
			}
		});
		$('#colorSelectQuote4').ColorPicker({
			color: $("#quote_color_talking_point_4").val(),
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelectQuote4 div').css('backgroundColor', '#' + hex);
				$("#quote_color_talking_point_4").val('#'+hex);
			}
		});
		$('#colorSelectQuote5').ColorPicker({
			color: $("#quote_color_talking_point_5").val(),
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelectQuote5 div').css('backgroundColor', '#' + hex);
				$("#quote_color_talking_point_5").val('#'+hex);
			}
		});
		$('#colorSelectorHeadings').ColorPicker({
			color: $("#headings_color").val(),
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelectorHeadings div').css('backgroundColor', '#' + hex);
				$("#headings_color").val('#'+hex);
			}
		});

		$('#colorSelectorQuotes').ColorPicker({
			color: $("#quotes_color").val(),
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelectorQuotes div').css('backgroundColor', '#' + hex);
				$("#quotes_color").val('#'+hex);
			}
		});
		$('#colorSelectorMediaDescription').ColorPicker({
			color: $("#media_description_color").val(),
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelectorMediaDescription div').css('backgroundColor', '#' + hex);
				$("#media_description_color").val('#'+hex);
			}
		});
	};
	
	var showTab = function(e) {
		var tabIndex = $('ul.navigationTabs a')
							.removeClass('active')
							.index(this);
		$(this)
			.addClass('active')
			.blur();
		$('div.tab')
			.hide()
				.eq(tabIndex)
				.show();
	};
	
	EYE.register(initLayout, 'init');
})(jQuery)