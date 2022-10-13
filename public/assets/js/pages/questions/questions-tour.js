$(function () {
	function setCookie(name, value, days) {
		var expires = "";
		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			expires = "; expires=" + date.toUTCString();
		}
		document.cookie = name + "=" + (value || "") + expires + "; path=/";
	}

	const t = new Shepherd.Tour({
		defaultStepOptions: {
			classes: "shadow-md bg-purple-dark",
			scrollTo: 0,
			cancelIcon: {
				enabled: 1
			}
		},
		useModalOverlay: 1
	});
	const e = "btn btn-sm btn-outline-primary";
	const a = "btn btn-sm btn-primary btn-next";

	Shepherd.on(['close', 'cancel'].forEach(event => t.on(event, () => {
		window.scrollTo(0, 0);
		setCookie('tutorial', true, 1);
	})))

	t.addStep({
		title: "Добро пожаловать!",
		text: "Вы попали в систему тестирования ИСОиП АБИТУРИЕНТ. <br/> Давайте я Вам все покажу?",
		buttons: [{
			action: t.cancel,
			classes: e,
			text: "Пропустить"
		}, {
			text: "Далее",
			classes: a,
			action: t.next
		}]
	}),
		t.addStep({
			title: "Тема вопросов",
			text: "Здесь Вы можете увидеть тему вашего тестирования.",
			attachTo: {
				element: "#questions_type",
				on: "bottom"
			},
			buttons: [{
				text: "Далее",
				classes: a,
				action: t.next
			}]
		}), t.addStep({
			title: "Номер вопроса",
			text: "Номер текущего вопроса и их количество отображается здесь.",
			attachTo: {
				element: "#question_counter",
				on: "right"
			},
			buttons: [{
				text: "Назад",
				classes: e,
				action: t.back
			}, {
				text: "Далее",
				classes: a,
				action: t.next
			}]
		}), t.addStep({
			scrollTo: 1,
			title: "Текст вопроса",
			text: "Внимательно прочтите вопрос.",
			attachTo: {
				element: "#question_text",
				on: "top"
			},
			buttons: [{
				text: "Назад",
				classes: e,
				action: t.back
			}, {
				text: "Далее",
				classes: a,
				action: t.next
			}]
		})

	if ($("#question_attach").length) {
		t.addStep({
			title: "Разновидность вопросов",
			text: "Некоторые вопросы требуют просмотра небольшого видео или картинки. <br/>",
			attachTo: {
				element: "#question_attach",
				on: "top"
			},
			buttons: [{
				text: "Назад",
				classes: e,
				action: t.back
			}, {
				text: "Далее",
				classes: a,
				action: t.next
			}]
		})
	} else {
		t.addStep({
			title: "Разновидность вопросов",
			text: "Некоторые вопросы требуют просмотра небольшого видео или картинки. <br/> Когда такой вопрос Вам попадется, Вы все поймете.",
			buttons: [{
				text: "Назад",
				classes: e,
				action: t.back
			}, {
				text: "Далее",
				classes: a,
				action: t.next
			}]
		})
	}

	t.addStep({
		scrollTo: 1,
		title: "Ответы",
		text: "Выберите ответ, который вы считаете правильным.",
		attachTo: {
			element: "#question_answers",
			on: "top"
		},
		buttons: [{
			text: "Назад",
			classes: e,
			action: t.back
		}, {
			text: "Далее",
			classes: a,
			action: t.next
		}]
	})

	t.addStep({
		scrollTo: 1,
		title: "Далее",
		text: "После выбора ответа кнопка станет яркой и Вы сможете перейти к следующему вопросу.",
		attachTo: {
			element: "#next_question",
			on: "top"
		},
		buttons: [{
			text: "Назад",
			classes: e,
			action: t.back
		}, {
			text: "Далее",
			classes: a,
			action: t.next
		}]
	})

	t.addStep({
		title: "Конец",
		text: "Удачи, абитуриент!",
		buttons: [{
			text: "Закрыть",
			classes: a,
			action: t.cancel
		}]
	})

	if ($('#isTutorial').length) {
		setTimeout(function () {
			window.scrollTo(0, 0);
			t.start();
		}, 1000)
	}

	$(document).on('click', '#show_tour', function () {
		window.scrollTo(0, 0);
		t.start();
	})
})