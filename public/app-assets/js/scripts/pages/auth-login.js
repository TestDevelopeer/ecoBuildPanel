/*=========================================================================================
  File Name: auth-login.js
  Description: Auth login js file.
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
	'use strict';

	var pageLoginForm = $('.auth-login-form');

	// jQuery Validation
	// --------------------------------------------------------------------
	if (pageLoginForm.length) {
		pageLoginForm.validate({
			/*
			* ? To enable validation onkeyup
			onkeyup: function (element) {
			  $(element).valid();
			},*/
			onfocusout: function (element) {
				$(element).valid();
			},
			rules: {
				'email': {
					required: true,
					email: true
				},
				'password': {
					required: true
				}
			},
			messages: {
				'email': {
					required: 'Введите Email',
					email: 'Неверный формат Email'
				},
				'password': {
					required: 'Введите пароль'
				}
			}
		});
	}
});
