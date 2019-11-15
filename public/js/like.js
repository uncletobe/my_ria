document.addEventListener("DOMContentLoaded", () => {

	const baseUrl = 'http://ria.local';
	const article = $('.article');
	const likeBtn = article.find('.like-icon');
	const funnyBtn = article.find('.funny-icon');
	const amazingBtn = article.find('.amazing-icon');
	const sadBtn = article.find('.sad-icon');
	const angryBtn = article.find('.angry-icon');
	const unlikeBtn = article.find('.unlike-icon');

	var emotions = {
		'like': false,
		'funny': false,
		'amazing': false,
		'sad': false,
		'angry': false,
		'unlike': false,
	};

	var action = getAction();

	initLikeBtn();
	initFunnyBtn();
	initAmazingBtn();
	initSadBtn();
	initAngryBtn();
	initUnlikeBtn();

	function getAction() {
		const pos = window.location.href.indexOf('author-article');
		if (pos > 0) {
			return '/author-article/';
		} else {
			return '/news/';
		}

		console.log(action);
	}

	function initLikeBtn() {
		if (likeBtn.length) {

			likeBtn.click((e) => {
				e.preventDefault();
				if (!isBtnPressed('like')) {
					sendDataToServer('like');
				}
			});
		} 
	}	

	function initFunnyBtn() {
		if (funnyBtn.length) {

			funnyBtn.click((e) => {
				e.preventDefault();
				if (!isBtnPressed('funny')) {
					sendDataToServer('funny');
				}
			});
		} 
	}

	function initAmazingBtn() {
		if (amazingBtn.length) {

			amazingBtn.click((e) => {
				e.preventDefault();
				if (!isBtnPressed('amazing')) {
					sendDataToServer('amazing');
				}
			});
		} 		
	}

	function initSadBtn() {
		if (sadBtn.length) {

			sadBtn.click((e) => {
				e.preventDefault();
				if (!isBtnPressed('sad')) {
					sendDataToServer('sad');
				}
			});
		} 		
	}

	function initAngryBtn() {
		if (angryBtn.length) {

			angryBtn.click((e) => {
				e.preventDefault();
				if (!isBtnPressed('angry')) {
					sendDataToServer('angry');
				}
			});
		} 		
	}

	function initUnlikeBtn() {
		if (unlikeBtn.length) {

			unlikeBtn.click((e) => {
				e.preventDefault();
				if (!isBtnPressed('unlike')) {
					sendDataToServer('unlike');
				}
			});
		} 			
	}

	function isBtnPressed(emotion) {
		let result = true;

		for(key in emotions) {
			if(emotion == key && emotions[key] == false) {
				emotions[key] = true;
				result = false;

			} else if (emotion != key && emotions[key] == true) {
				emotion[key] = false;
			}
		}


		// switch (emotion) {
		// 	case 'like':
		// 		if (!emotions['like']) {
		// 			emotions['like'] = true;
		// 			result = false;
		// 		}
		// 		break;

		// 	case 'funny':
		// 		if (!emotions['funny']) {
		// 			emotions['funny'] = true;
		// 			result = false;
		// 		}
		// 		break;

		// 	case 'amazing':
		// 		if (!emotions['amazing']) {
		// 			emotions['amazing'] = true;
		// 			result = false;
		// 		}
		// 		break;

		// 	case 'sad':
		// 		if (!emotions['sad']) {
		// 			emotions['sad'] = true;
		// 			result = false;
		// 		}
		// 		break;

		// 	case 'angry':
		// 		if (!emotions['angry']) {
		// 			emotions['angry'] = true;
		// 			result = false;
		// 		}
		// 		break;

		// 	case 'unlike':
		// 		if (!emotions['unlike']) {
		// 			emotions['unlike'] = true;
		// 			result = false;
		// 		}
		// 		break;
		// }

		return result;
	}

	function showEmotionCount(emotion, value) {

		let arr = {
			'like': likeBtn,
			'funny': funnyBtn,
			'amazing': amazingBtn,
			'sad': sadBtn,
			'angry': angryBtn,
			'unlike': unlikeBtn,
		};

		if (arr[emotion]) {
			arr[emotion].children('.count').html(value);
			//emotions[emotion] = false;
		}
	}	

	function sendDataToServer(plusEmotion) {

		let slug = getSlug();
		// let url = baseUrl + action + slug + '/addassessment';
		let url = baseUrl + '/addassessment';

		let data = {
			slug: slug,
			plusEmotion: plusEmotion,
		}

		fetch(url, {
		    headers: {
		      'Content-Type': 'application/json',
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
		    },
		    method: 'POST',
		    cache: 'no-cache',
		    credentials: 'same-origin',
		    body: JSON.stringify(data),
		  })
  		.then(res => res.json())
  		.then(res => {
  				handleResponseFromServer(res);
  		});
	}

  
	function getSlug() {
		let url = window.location.pathname;
		let arr = url.split('/');

		return arr[2];
	}

	function handleResponseFromServer(res) {

		if (res == 'not auth') {
				console.log('не авторизован');
		} else {

			for (let key in res) {
				showEmotionCount(key, res[key]);
			}
			console.log('Успех:', JSON.stringify(res))
		}
	}

})