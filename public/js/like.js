window.onload = () => {

	const likeBtn = $('.like-icon');
	const funnyBtn = $('.funny-icon');
	const amazingBtn = $('.amazing-icon');
	const sadBtn = $('.sad-icon');
	const angryBtn = $('.angry-icon');
	const unlikeBtn = $('.unlike-icon');

	var emotions = {
		'like': false,
		'funny': false,
		'amazing': false,
		'sad': false,
		'angry': false,
		'unlike': false,
	};

	initLikeBtn();
	initFunnyBtn();
	initAmazingBtn();
	initSadBtn();
	initAngryBtn();
	initUnlikeBtn();

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

		switch (emotion) {
			case 'like':
				if (!emotions['like']) {
					emotions['like'] = true;
					result = false;
				}
				break;

			case 'funny':
				if (!emotions['funny']) {
					emotions['funny'] = true;
					result = false;
				}
				break;

			case 'amazing':
				if (!emotions['amazing']) {
					emotions['amazing'] = true;
					result = false;
				}
				break;

			case 'sad':
				if (!emotions['sad']) {
					emotions['sad'] = true;
					result = false;
				}
				break;

			case 'angry':
				if (!emotions['angry']) {
					emotions['angry'] = true;
					result = false;
				}
				break;

			case 'unlike':
				if (!emotions['unlike']) {
					emotions['unlike'] = true;
					result = false;
				}
				break;
		}

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

		arr[emotion].children('.count').html(value);
	}	

	function sendDataToServer(plusEmotion) {

		let slug = getSlug();
		let url = '/news/' + slug + '/addassessment';

		let data = {
			slug: slug,
			plusEmotion: plusEmotion,
		}

		fetch(url, {
		    headers: {
		      'Content-Type': 'application/json',
		    },
		    method: 'POST',
		    cache: 'no-cache',
		    credentials: 'same-origin',
		    body: JSON.stringify(data),
		  })
  		.then(res => res.json())
  		.then(res => {

  				for (let key in res) {
  					showEmotionCount(key, res[key]);
  				}
  				console.log('Успех:', JSON.stringify(res))
  			});
	}

  
	function getSlug() {
		let url = window.location.pathname;
		let arr = url.split('/');

		return arr[2];
	}

}