document.addEventListener("DOMContentLoaded", () => {

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
					addPlusForBtn(likeBtn);
				}
			});
		} 
	}	

	function initFunnyBtn() {
		if (funnyBtn.length) {

			funnyBtn.click((e) => {
				e.preventDefault();
				if (!isBtnPressed('funny')) {
					addPlusForBtn(funnyBtn);
				}
			});
		} 
	}

	function initAmazingBtn() {
		if (amazingBtn.length) {

			amazingBtn.click((e) => {
				e.preventDefault();
				if (!isBtnPressed('amazing')) {
					addPlusForBtn(amazingBtn);
				}
			});
		} 		
	}

	function initSadBtn() {
		if (sadBtn.length) {

			sadBtn.click((e) => {
				e.preventDefault();
				if (!isBtnPressed('sad')) {
					addPlusForBtn(sadBtn);
				}
			});
		} 		
	}

	function initAngryBtn() {
		if (angryBtn.length) {

			angryBtn.click((e) => {
				e.preventDefault();
				if (!isBtnPressed('angry')) {
					addPlusForBtn(angryBtn);
				}
			});
		} 		
	}

	function initUnlikeBtn() {
		if (unlikeBtn.length) {

			unlikeBtn.click((e) => {
				e.preventDefault();
				if (!isBtnPressed('unlike')) {
					addPlusForBtn(unlikeBtn);
				}
			});
		} 			
	}

	function isBtnPressed(emotion) {
		let result = true;
		let except;

		switch (emotion) {
			case 'like':
				if (!emotions['like']) {
					emotions['like'] = true;
					result = false;
					except = 'like';
				}
				break;

			case 'funny':
				if (!emotions['funny']) {
					emotions['funny'] = true;
					result = false;
					except = 'funny';
				}
				break;

			case 'amazing':
				if (!emotions['amazing']) {
					emotions['amazing'] = true;
					result = false;
					except = 'amazing';
				}
				break;

			case 'sad':
				if (!emotions['sad']) {
					emotions['sad'] = true;
					result = false;
					except = 'sad';
				}
				break;

			case 'angry':
				if (!emotions['angry']) {
					emotions['angry'] = true;
					result = false;
					except = 'angry';
				}
				break;

			case 'unlike':
				if (!emotions['unlike']) {
					emotions['unlike'] = true;
					result = false;
					except = 'unlike';
				}
				break;
		}

		searchMinusEmote(except);
		return result;
	}

	function searchMinusEmote(except) {
		for (let key in emotions) {
			if (emotions[key] == true && key != except) {
				minusBtnFactory(key);
				return true;
			}
		}
	}

	function minusBtnFactory(key) {
		switch (key) {
			case 'like':
				addMinusForBtn(likeBtn);
				emotions['like'] = false;
				break;
			case 'funny':
				addMinusForBtn(funnyBtn);
				emotions['funny'] = false;
				break;
			case 'amazing':
				addMinusForBtn(amazingBtn);
				emotions['amazing'] = false;
				break;
			case 'sad':
				addMinusForBtn(sadBtn);
				emotions['sad'] = false;
				break;
			case 'angry':
				addMinusForBtn(angryBtn);
				emotions['angry'] = false;
				break;
			case 'unlike':
				addMinusForBtn(unlikeBtn);
				emotions['unlike'] = false;
				break;
			
		}
	}

	function addPlusForBtn(btn) {
		let count = btn.children('.count').html();
		btn.children('.count').html(parseInt(count) + 1);
	}	

	function addMinusForBtn(btn) {
		let count = btn.children('.count').html();
		btn.children('.count').html(parseInt(count) - 1);
	}









})