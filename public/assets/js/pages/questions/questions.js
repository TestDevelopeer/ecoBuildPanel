function scrollTop() {
	window.scrollTo(0, 0);
}

$(function () {
	window.onbeforeunload = function () {
		scrollTop();
	}

	let currAnswerId = 0;
	$(document).on('change', '.answer_check', function () {
		if ($(this).is(':checked')) {
			currAnswerId = $(this).val();
			$('#next_question').removeAttr('disabled');
		}
	});

	$(document).on('click', '#next_question', function () {
		if (currAnswerId != 0) {
			let type = $('#questions_type').attr('data-type');
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: '/questions/save',
				type: 'post',
				data: { currAnswerId, type },
				dataType: 'json',
				success: function (res) {
					if (res.success === 1) {
						$('#question_block').html(res.question);
						scrollTop();
					} else if (res.success === 2) {
						$('#question_block').html('');
						Swal.fire({
							icon: "success",
							title: "Конец",
							text: 'Спасибо за участие!',
						}).then(() => {
							location.href = '/user/result'
						});
					} else {
						Swal.fire({
							icon: "error",
							title: "Ошибка!",
							text: res.error,
						});
					}
				},
				error: function (err) {
					Swal.fire({
						icon: "error",
						title: "Ошибка!",
						text: err.message,
					})
				}
			});
		} else {
			Swal.fire({
				icon: "error",
				title: "Упс...",
				text: 'Пожалуйста, выберите ответ',
			})
		}
	});
});