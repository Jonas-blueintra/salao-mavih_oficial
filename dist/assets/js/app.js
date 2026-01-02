
// // Fade-in corrigido
// window.addEventListener('load', () => {
//   document.getElementById('mainContainer').classList.add('show');
// });

// // Mostrar / ocultar senha
// const senhaInput = document.getElementById('senha');
// const toggleBtn = document.getElementById('toggleSenha');

// toggleBtn.addEventListener('click', () => {
//   const isPassword = senhaInput.type === 'password';
//   senhaInput.type = isPassword ? 'text' : 'password';
//   toggleBtn.innerHTML = isPassword ? '<i class="bi bi-eye-slash"></i>' : '<i class="bi bi-eye"></i>';
// });

// // Login simulado com spinner
// const form = document.getElementById('loginForm');
// const btnLogin = document.getElementById('btnLogin');
// const btnText = document.getElementById('btnText');
// const btnSpinner = document.getElementById('btnSpinner');

// // form.addEventListener('submit', (e) => {
// //   e.preventDefault();

// //   btnText.textContent = 'Entrando...';
// //   btnSpinner.classList.remove('d-none');Fbt6n
// //   btnLogin.disabled = true;

// //   setTimeout(() => {
// //     btnSpinner.classList.add('d-none');
// //     btnText.textContent = 'Entrar';
// //     btnLogin.disabled = false;
// //     showAlert('Login realizado com sucesso!', 'success');
// //     form.reset();
// //   }, 2000);
// // });

// // Alert bonito
// function showAlert(message, type) {
//   const alertDiv = document.createElement('div');
//   alertDiv.className = `alert alert-${type} alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3`;
//   alertDiv.style.zIndex = '2000';
//   alertDiv.innerHTML = `
//     <strong>${message}</strong>
//     <button class="btn-close" data-bs-dismiss="alert"></button>
//   `;
//   document.body.appendChild(alertDiv);
//   setTimeout(() => alertDiv.classList.remove('show'), 3000);
//   setTimeout(() => alertDiv.remove(), 3500);
// }

