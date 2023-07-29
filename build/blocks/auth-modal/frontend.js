/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************!*\
  !*** ./src/blocks/auth-modal/frontend.js ***!
  \*******************************************/
document.addEventListener('DOMContentLoaded', () => {
  const openModalBtn = document.querySelectorAll('.open-modal');
  const modalEl = document.querySelector('.wp-block-clearblocks-auth-modal');
  const modalCloseEl = document.querySelectorAll('.modal-overlay, .modal-btn-close');
  openModalBtn.forEach(el => {
    el.addEventListener('click', event => {
      event.preventDefault();
      modalEl.classList.add('modal-show');
    });
  });
  modalCloseEl.forEach(el => {
    el.addEventListener('click', event => {
      event.preventDefault();
      modalEl.classList.remove('modal-show');
    });
  });
  const tabs = document.querySelectorAll('.tabs a');
  const signinForm = document.querySelector('#signin-tab');
  const signupForm = document.querySelector('#signup-tab');
  tabs.forEach(tab => {
    tab.addEventListener('click', event => {
      event.preventDefault();
      tabs.forEach(currentTab => {
        currentTab.classList.remove('active-tab');
      });
      event.currentTarget.classList.add('active-tab');
      const activeTab = event.currentTarget.getAttribute('href');
      if (activeTab === '#signin-tab') {
        signinForm.style.display = 'block';
        signupForm.style.display = 'none';
      } else {
        signinForm.style.display = 'none';
        signupForm.style.display = 'block';
      }
    });
  });
  signupForm.addEventListener('submit', async e => {
    e.preventDefault();
    console.log('Begin submit event');
    const signupFieldset = signinForm.querySelector('fieldset');
    signupFieldset.setAttribute('disabled', true);
    const signupStatus = signupForm.querySelector('#signup-status');
    signupStatus.innerHTML = `
      <div class="modal-status modal-status-info">
        Please wait!, we are creating your account.
      </div>
    `;
    const formData = {
      username: signupForm.querySelector('#su-name').value,
      email: signupForm.querySelector('#su-email').value,
      password: signupForm.querySelector('#su-password').value
    };
    const response = await fetch(ccb_auth_rest.signup, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(formData)
    });
    const responsejSON = await response.json();
    if (responsejSON.status === 2) {
      console.log('Got responseJSON');
      console.log(responsejSON);
      signupStatus.innerHTML = `
        <div class="modal-status modal-status-success">
          Success! Your account has been created.
        </div>
      `;
      location.reload();
    } else {
      signupFieldset.removeAttribute('disabled');
      signupStatus.innerHTML = `
        <div class="modal-status modal-status-danger">
          Unable to create account! Please try again later.
        </div>
      `;
    }
  });
});
/******/ })()
;
//# sourceMappingURL=frontend.js.map