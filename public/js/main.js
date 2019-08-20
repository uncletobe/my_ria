/*jshint esversion: 6 */
document.addEventListener("DOMContentLoaded", () => {
  initCarousel();
  initShowMoreButton();
  initHeaderMenu();
  initShareBlock();
  initCloseShareBlock();
  initAuthIcon();
  initSearchIcon();
  initCloseAuthorWindow();
  initCloseSearchModal();
  initCloseSearchModalIcon();
  initHiddenHeader();
  initRecommendCarousel();
  initFancyBox();
  initCloseSocialBlockOnFancyBox();
  initRegisterBtn();
  initRestorePwdBtn();
  initAuthBtn();
  initFormBackBtn();
  userRegister();
});

window.onload = function() {
  getStopForArticleSharebar();
  initArticleSharebar();
  initArticleSharebarMoreBtn();
  initCommentLikeBtn();
};

var targetModal;
var stopForArticleSharebar;
var isOpenedModal = false;
const headerHeight = 60;
const socialBlockMargin = 20;
const modal = document.querySelector(".modal-share-full");

function initCarousel() {
  if($("#news-carousel").length) {
    $("#news-carousel").owlCarousel({
      loop: false,
      margin: 20,
      items: 3,
      slideBy: 3,
      navSpeed: 100,
      nav: true,
      dots: false,
      mouseDrag: true,
      navText: [
        '<i class="fas fa-chevron-left"></i>',
        '<i class="fas fa-chevron-right"></i>'
      ],
      responsiveClass: true,
      responsive: {
        0: {
          items: 1
        },
        480: {
          items: 2
        },
        768: {
          items: 3
        }
      }
    });
  }
}

function initShowMoreButton(singleEl = null) {
  const modalSocialBlock = document.querySelector(".share-more-block");

  if(modalSocialBlock) {
	  modalSocialBlock.style.textCss = null;

	  if (singleEl === null) {
	    const moreBtnList = document.querySelectorAll(".more");

	    moreBtnList.forEach(function(element) {
	      element.addEventListener("click", () => {
	        showModalSocial(modalSocialBlock);
	      });
	    });

	    modal.addEventListener("click", () => {
	      showModalSocial(modalSocialBlock);
	    });
	  } else {
	    singleEl.addEventListener("click", () => {
	      showModalSocial(modalSocialBlock);
	    });
	  }
  }
}

function showModalSocial(modalSocialBlock) {
  isOpenedModal = !isOpenedModal;
  clearClassesSocialBlock(modalSocialBlock);

  if (isOpenedModal) {
    openModalSocialBlock(modalSocialBlock);
  } else {
    closeModalSocialBlock(modalSocialBlock);
    // modal.removeEventListener('click', arguments.callee); //от утечек памяти
  }
}

function openModalWindow() {
  modal.style.display = "block";

  if (isFbActive()) {
    modal.style.background = "unset";
    return;
  }

  hideOverflowBody();
}

function closeModalWindow() {
  modal.style.display = "none";

  if (isFbActive()) return;

  destroyBodyOverflow();
}

function isFbActive() {
  return document.querySelector(".fancybox-active");
}

function openModalSocialBlock(modalSocialBlock) {
  modalSocialBlock.style.display = "block";
  openModalWindow();
}

function closeModalSocialBlock(modalSocialBlock) {
  modalSocialBlock.style.display = "none";
  closeModalWindow();
}

function hideOverflowBody() {
  document.body.style = "overflow: hidden; padding-right: 17px";
  document.querySelector(".header__menu").style = "padding-right: 25px; display: block;";
}

function destroyBodyOverflow() {
  document.body.style = "";
  document.querySelector(".header__menu").style = "display: block;";
}

function initHeaderMenu() {
  const header = document.querySelector(".header");
  const svgList = document.querySelectorAll(
    ".header__menu a:not(.article-header)"
  );

  if (header) {

    handleScroll(header, svgList);

    window.addEventListener("scroll", () => {
      handleScroll(header, svgList);
    });
    window.addEventListener("resize", () => {
      checkScreenWidthForHeader(header, svgList);
    });

    document.querySelector('.header__menu').style.display = 'block';
  }
}

function checkScreenWidthForHeader(header, svgList) {
  if (window.innerWidth <= 767) {
    header.style.height = "";

    svgList.forEach(function(svg) {
      svg.style.cssText = null;
    });
  }
}

function handleScroll(header, svgList) {
  let screenWidth = window.innerWidth;

  if (window.scrollY >= 200 && screenWidth > 767) {
    header.style.height = "46px";

    svgList.forEach(function(svg) {
      svg.style.cssText = "padding: 6px 5px;" + "width: 40px";
    });

    return;
  } else if (window.scrollY < 180 && screenWidth > 767) {
    header.style.height = "60px";

    svgList.forEach(function(svg) {
      svg.style.cssText = "padding: 10px 7px;" + "width: 54px";
    });

    return;
  }

  checkScreenWidthForHeader(header, svgList);
}

function initShareBlock(where = document) {
  const moreList = where.querySelectorAll("[data-name=share-more]");

  moreList.forEach(function(element) {
    element.onclick = e => {
      targetModal = element;
      e.preventDefault();

      socialModalXY();
    };
  });

  window.addEventListener("resize", chageXYSocialModalWithResize);
}

function initCloseShareBlock() {
  document.body.addEventListener("click", event => {
    const socialBlock = document.querySelector(".share-more-block.pointer");

    if (socialBlock) {
      event.stopPropagation();

      if (
        !socialBlock.contains(event.target) &&
        event.target.tagName !== "A" &&
        event.target.tagName !== "I"
      ) {
        clearClassesSocialBlock(socialBlock);
      }
    }
  });
}

function socialModalXY() {
  let zIndex = "150;";
  const socialBlock = document.querySelector(".share-more-block");
  const coords = targetModal.getBoundingClientRect();
  const margin = 5;

  if (targetModal.closest(".fancybox-inner") !== null) {
    zIndex = "99996;";
  }

  const installCss =
    "display: block;" +
    "position: absolute;" +
    "opacity: 0;" +
    "z-index: " +
    zIndex;

  socialBlock.style.cssText = installCss;
  socialBlock.classList.add("pointer", "pointer-bottom");

  let top = coords.top - socialBlock.offsetHeight - margin;

  if (top - headerHeight < 0) {
    top = coords.top + socialBlockMargin + margin;
    socialBlock.classList.remove("pointer-bottom");
  }

  top += window.scrollY;

  socialBlock.style.cssText =
    installCss +
    "top: " +
    top +
    "px;" +
    "left: " +
    (coords.left - socialBlock.offsetWidth + 16) +
    "px;" +
    "bottom: auto;" +
    "right: auto;" +
    "opacity: 1;";

    // console.log('lect-click: ', coords.left,
    //   'offsetWidth: ', socialBlock.offsetWidth,
    //   'left: ', coords.left - socialBlock.offsetWidth + 16
    //   );

  // console.log(
  // "top - ",
  // coords.top,
  // "right - ",
  // coords.right,
  // "left - ",
  // coords.left,
  // "bottom - ",
  // coords.bottom,
  // "block - ", socialBlock.offsetWidth
  // );
}

function chageXYSocialModalWithResize() {
  const socialBlock = document.querySelector(".share-more-block.pointer");

  if (window.innerWidth <= 991 && socialBlock) {
    clearClassesSocialBlock(socialBlock);
    return false;
  }

  if (socialBlock) {
    socialModalXY();
  }
}

function initAuthIcon() {
  const authIcons = document.querySelectorAll(".header__menu-login");
  const authWindow = document.querySelector(".auth-window");

  authIcons.forEach(function(element) {
    element.onclick = function(e) {
      e.preventDefault();
      openModalWindow();
      authWindow.style.display = "flex";
    };
  });
}

function initCloseAuthorWindow() {
  const closeIcons = document.querySelectorAll(".close-auth-window");

  if(closeIcons.length > 0) {
    closeIcons.forEach(function(element, index) {
      element.onclick = (e) => {
        element.parentNode.parentNode.style.display = 'none';
        closeModalWindow();
      }
    });
  }
}

function initSearchIcon() {
  const searchIcons = document.querySelectorAll(".header__menu-search");
  const searchWindow = document.querySelector(".search-window");

  searchIcons.forEach(function(element) {
    element.onclick = function(e) {
      e.preventDefault();
      searchWindow.style.display = "flex";
      document.querySelector(".input--search").focus();
      hideOverflowBody();
    };
  });
}

function initCloseSearchModal() {
  const searchWindow = document.querySelector(".search-window");
  const searchBody = document.querySelector(".search-window-body");

  searchWindow.addEventListener("click", () => {
    if (window.innerWidth <= 767) return false;

    const target = event.target;

    if (!searchBody.contains(target)) {
      searchWindow.style.display = "none";
      destroyBodyOverflow();
    }
  });
}

function initCloseSearchModalIcon() {
  const closeIcon = document.querySelector(".close-search-window");

  closeIcon.addEventListener("click", () => {
    document.querySelector(".search-window").style = "";
    destroyBodyOverflow();
  });
}

function initHiddenHeader() {
  const hHeader = document.querySelector(".hidden-header");

  if (hHeader) {
    window.addEventListener("scroll", () => {
      showHiddenHeader(hHeader);
    });
  }
}

function showHiddenHeader(hHeader) {
  if (window.scrollY >= 47) {
    hHeader.style.top = "0";

    return;
  }

  if (window.scrollY <= 35) {
    hHeader.style.top = "-46px";
  }
}

function initArticleSharebar() {
  if (window.innerWidth <= 767) return false;

  const shareBar = document.querySelector(".article__sharebar");

  if (shareBar) {
    const coords = getArticleSharebarCoords();

    shareBar.style.left = coords.left - 80 + "px";
    shareBar.style.display = "flex";

    changeArticleSharebarPos(shareBar);

    window.addEventListener("scroll", () => {
      changeArticleSharebarPos(shareBar);
    });

    window.addEventListener("resize", () => {
      changeArticleSharebarPosLeft(shareBar);
      getStopForArticleSharebar();

      if (window.Scroll >= stopForArticleSharebar - 30) {
        ArticleSharebarAbsolutePos(shareBar);
      }
    });
  }
}

function changeArticleSharebarPos(shareBar) {
  let windowScroll = window.scrollY;

  //console.log(`${window.scrollY}, stop: ${stopForArticleSharebar},`);

  let shareBarTop = shareBar.style.top;

  if (windowScroll < 47) {
    shareBar.style.top = "250px";
    return;
  }

  if (windowScroll > 47 && windowScroll < 200) {
    if (shareBarTop === "250px" || !shareBarTop) {
      shareBar.style.top = "140px";
      return;
    }

    return;
  }

  if (windowScroll > 200 && windowScroll < stopForArticleSharebar - 30) {
    shareBar.style.top = "86px";

    if (shareBar.style.position === "absolute") {
      shareBar.style.position = "fixed";
      shareBar.style.left = changeArticleSharebarPosLeft(shareBar);
    }

    return;
  }

  if (windowScroll >= stopForArticleSharebar - 30) {
    ArticleSharebarAbsolutePos(shareBar);
    return;
  }
}

function getArticleSharebarCoords() {
  const artBody = document.querySelector(".article__body");
  return artBody.getBoundingClientRect();
}

function changeArticleSharebarPosLeft(shareBar) {
  if (window.innerWidth <= 767) {
    shareBar.style.cssText = null;
    return false;
  }

  let coords = getArticleSharebarCoords();

  if (shareBar.style.position !== "absolute") {
    shareBar.style.left = coords.left - 80 + "px";
    shareBar.style.display = "flex";
  }
}

function ArticleSharebarAbsolutePos(shareBar) {
  shareBar.style.top = stopForArticleSharebar + 35 + "px";
  shareBar.style.position = "absolute";
  shareBar.style.left = getArticleSharebarAbsolutePosLeft();
}

function getStopForArticleSharebar() {
  let topOffset = 300;
  if (window.innerWidth <= 767) return false;

  const botEl = document.querySelector(".recommend-carousel__title");
  let stop = null;

  if (botEl) {
    const botElCoords = botEl.getBoundingClientRect();
    const comments = document.querySelector('.comments');

    if(!comments) topOffset = 375;

    stop = window.scrollY + botElCoords.top - topOffset;
  }

  stopForArticleSharebar = stop;
}

function getArticleSharebarAbsolutePosLeft() {
  let result = "";
  const article = document.querySelector(".article");
  const page = document.querySelector(".page");

  const articleXY = article.getBoundingClientRect();
  const pageXY = page.getBoundingClientRect();

  //console.log(`Comments left: ${commentsXY.left}, pageLeft: ${pageXY.left}`);
  result = Math.abs(pageXY.left - articleXY.left) - 80 + "px";

  return result;
}

function initArticleSharebarMoreBtn() {
  const moreBtn = document.querySelector(".article__sharebar .auth-more");
  const socialBlock = document.querySelector(".share-more-block");

  if (moreBtn) {
    moreBtn.onclick = e => {
      let place = document.querySelector(".article__sharebar .auth-more i");
      e.preventDefault();

      articleSharebarSocialBlockXY(socialBlock, place);
    };

    window.addEventListener("scroll", () => {
      hideArticleSharebarSocialBlock(socialBlock);
    });
    window.addEventListener("resize", () => {
      hideArticleSharebarSocialBlock(socialBlock);
    });
  }
}

function articleSharebarSocialBlockXY(socialBlock, place) {
  const coords = place.getBoundingClientRect();

  socialBlock.classList.add("pointer", "pointer-left");

  let top = coords.top - socialBlock.offsetHeight / 2 - 20;

  const installCss =
    "display: block;" + "position: fixed;" + "opacity: 0;" + "z-index: 150;";

  socialBlock.style.cssText =
    installCss +
    "top: " +
    top +
    "px;" +
    "left: " +
    (coords.left + 40) +
    "px;" +
    "bottom: auto;" +
    "right: auto;" +
    "opacity: 1;" +
    "z-index: 150;";
}

function clearClassesSocialBlock(socialBlock) {
  if (socialBlock) {
    socialBlock.classList.remove("pointer", "pointer-bottom", "pointer-left");
    socialBlock.style.cssText = null;
  }
}

function hideArticleSharebarSocialBlock(socialBlock) {
  if (socialBlock.classList.contains("pointer-left")) {
    clearClassesSocialBlock(socialBlock);
  }
}

function initRecommendCarousel() {
  const recommendCarousel = $("#recommend-carousel");

  if (recommendCarousel && recommendCarousel.length) {
    recommendCarousel.owlCarousel({
      loop: false,
      margin: 10,
      items: 15,
      slideBy: 1,
      navSpeed: 100,
      nav: true,
      dots: false,
      mouseDrag: true,
      navText: [
        '<i class="fas fa-chevron-left"></i>',
        '<i class="fas fa-chevron-right"></i>'
      ],
      responsiveClass: true,
      responsive: {
        0: {
          items: 3
        },
        480: {
          items: 4
        },
        768: {
          items: 5
        },
        991: {
          items: 6
        }
      }
    });
  }
}

function initFancyBox() {
  const img = $(".article__img");

  if (img.length) {
    $(".article__img").fancybox({
      buttons: ["close"],
      // animationDuration: 350,
      animationEffect: false
    });
  }
}

function initCloseSocialBlockOnFancyBox() {
  const img = document.querySelector(".article__img img");
  const menu = document.querySelector(".header__menu");

  if (img) {
    img.addEventListener("click", () => {
      menu.style = "padding-right: 25px;";

      window.setTimeout(() => {
        const where = document.querySelector(".fancybox-inner");
        const closeBtn = document.querySelector(".fancybox-button--close");
        const moreBtn = where.querySelector(".more");
        const fbWindow = document.querySelector(".fancybox-stage");

        initShowMoreButton(moreBtn);
        initShareBlock(where);

        closeBtn.onclick = () => {
          menu.style = "";
          openCloseSocialBlockOnFB();
        };

        fbWindow.onclick = () => {
          openCloseSocialBlockOnFB();
        };
      }, 0);
    });
  }
}

function openCloseSocialBlockOnFB() {
  const windowWidth = window.innerWidth;
  const socialBlock = document.querySelector(".share-more-block.pointer");
  const modalSocialBlock = document.querySelector(".share-more-block");

  if (windowWidth <= 991) {
    if (modalSocialBlock && modalSocialBlock.style.display === "block") {
      showModalSocial(modalSocialBlock);
      return;
    }
  } else {
    if (socialBlock && socialBlock.style.display === "block") {
      clearClassesSocialBlock(socialBlock);
      return;
    }
  }
}

function initCommentLikeBtn() {
  let likeBtns = document.querySelectorAll(".comment__like-btn");
  const tape = document.querySelector(".assessment-tape");

  if (likeBtns.length > 0) {
    likeBtns.forEach(function(element) {
      element.addEventListener("click", () => {
        changeAssessTapeXY(element);
      });
    });

    window.onresize = () => {
      clearAssessTape(tape);
    };

    window.onclick = e => {
      hideCommentLikeBtn(e, tape);
    };
  }
}

function changeAssessTapeXY(element) {
  const coords = element.getBoundingClientRect();
  const tape = document.querySelector(".assessment-tape");
  const btnHeight = 34;
  const margin = 10;
  const tapeHeight = 112;
  const tapeWidth = 405;

  let top;
  let left;

  if (window.innerWidth > 767) {
    top = coords.top + 34 + margin + window.scrollY + "px;";
    left = coords.left + 12 - tapeWidth / 2 + "px;";
  } else {
    tape.classList.add("pointer-left");
    top =
      coords.top + window.scrollY - (tapeHeight / 2 - btnHeight / 2) + "px;";
    left = coords.left - 10 - tapeWidth + "px;";
  }

  tape.style.cssText =
    "display: block;" + "position: absolute;" + "top: " + top + "left: " + left;
}

function clearAssessTape(tape) {
  tape.style.cssText = null;
  tape.classList.remove("pointer-left");
}

function hideCommentLikeBtn(e, tape) {
  if (!tape.contains(e.target) && !e.target.closest(".comment__like-btn")) {
    clearAssessTape(tape);
  }
}

function initRegisterBtn() {
  const regBtn = document.querySelector('.register-btn');
  const regWindow = document.querySelector('.register-window');
  const authWindow = document.querySelector('.auth-window');

  if (regBtn) {
    regBtn.onclick = (e) => {
      e.preventDefault();
      authWindow.style.display = 'none';
      regWindow.style.display = 'flex';
    }
  }
}

function initRestorePwdBtn() {
  const pwdBtn = document.querySelector('.restore-password-btn');
  const authWindow = document.querySelector('.auth-window');
  const resWindow = document.querySelector('.restore-window');

  if (pwdBtn) {
    pwdBtn.onclick = (e) => {
      e.preventDefault();
      authWindow.style.display = 'none';
      resWindow.style.display = 'flex';
    }
  }
}

function initAuthBtn() {
  const authBtn = document.querySelector('.auth-btn');
  const regWindow = document.querySelector('.register-window');

  clearInputErrors();
  backToAuthWindow(authBtn, regWindow);
}

function initFormBackBtn() {
  const backBtn = document.querySelector('.form-btn-back');
  const resWindow = document.querySelector('.restore-window');

  clearInputErrors();
  backToAuthWindow(backBtn, resWindow);
}

function backToAuthWindow(btn, activeWindow) {
const authWindow = document.querySelector('.auth-window');

  if (btn) {
    btn.onclick = (e) => {
      e.preventDefault();
      clearInputErrors();
      activeWindow.style.display = 'none';
      authWindow.style.display = 'flex';
    }
  }
}

function userRegister() {
  const btn = document.querySelector('.register--btn');
  const inputEmail = document.querySelector('#registerEmail');
  const inputPwd = document.querySelector('#registerPassword');
  const checkbox = document.querySelector('#agreementCheck');
  const action = 'http://ria.local/user/register';
  let isValid = false;

  $('.register-window__body form').submit(function(event) {
    return false;
  });

  if (btn) {
    btn.onclick = (e) => {

      isValid = inputEmail.validity.valid && 
      inputPwd.validity.valid &&
      checkbox.validity.valid;

      if (isValid) {
        e.preventDefault();
        clearInputErrors();
        btn.blur();

        let data = {
          email: inputEmail.value, 
          password:inputPwd.value, 
          chekbox: checkbox.value
        }

        sendDataToServer(action, data);
      }
      
    }
  }
}

function sendDataToServer(action, data) {

  // fetch(action, {
  //   headers: {
  //     'Content-Type': 'application/json',
  //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //   },
  //   method: 'POST',
  //   cache: 'no-cache',
  //   credentials: 'same-origin',
  //   body: JSON.stringify(data),
  // })
  // .then(res => console.log(res));

  $.ajax({
    url: action,
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    type: 'POST',
    dataType: 'json',
    data: data,
  })
  .done(function(result) {
    window.location.reload();
    console.log('succes', result);
  })
  .fail(function(result) {

      if (!result.hasOwnProperty('responseJSON')) return false;
      handleAuthErrors(result.responseJSON.errors);
  }) 

}

function handleAuthErrors(errors) {
  const emailLabel = $('.email-group');
  const pwdLabel = $('.password-group');
  let invalid = '<div class="invalid-feedback">';

  if (errors['email']) {
    emailLabel.append(invalid + errors['email'][0] + '</div>');
    $('input[name=email]').addClass('is-invalid');
  } else {
    $('input[name=email]').addClass('is-valid');
  }

  if (errors['password']) {
    pwdLabel.append(invalid + errors['password'][0] + '</div>');
    $('input[name=password]').addClass('is-invalid');
  } else {
    $('input[name=password]').addClass('is-valid');
  }

}

function clearInputErrors() {
  $('input[type=email]').removeClass('is-valid is-invalid');
  $('input[type=password]').removeClass('is-valid is-invalid');
  $('.invalid-feedback').remove();
}