// Menu Mobile Toggle
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('.nav-menu');
    
    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });
    }

    // Fechar menu ao clicar em um link
    const navLinks = document.querySelectorAll('.nav-menu a');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            navMenu.classList.remove('active');
        });
    });

    // Scroll Suave
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Animação ao scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.feature-card, .service-card, .stat-item').forEach(el => {
        observer.observe(el);
    });
});

// Validação do Formulário de Contato
function validateContactForm(event) {
    event.preventDefault();
    
    const form = event.target;
    const name = form.querySelector('[name="name"]').value.trim();
    const email = form.querySelector('[name="email"]').value.trim();
    const subject = form.querySelector('[name="subject"]').value.trim();
    const message = form.querySelector('[name="message"]').value.trim();
    
    // Limpar mensagens de erro anteriores
    clearErrors();
    
    let isValid = true;
    
    // Validar nome
    if (name === '') {
        showError('name', 'Por favor, preencha seu nome');
        isValid = false;
    }
    
    // Validar email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === '') {
        showError('email', 'Por favor, preencha seu e-mail');
        isValid = false;
    } else if (!emailRegex.test(email)) {
        showError('email', 'Por favor, insira um e-mail válido');
        isValid = false;
    }
    
    // Validar assunto
    if (subject === '') {
        showError('subject', 'Por favor, preencha o assunto');
        isValid = false;
    }
    
    // Validar mensagem
    if (message === '') {
        showError('message', 'Por favor, escreva sua mensagem');
        isValid = false;
    } else if (message.length < 10) {
        showError('message', 'A mensagem deve ter pelo menos 10 caracteres');
        isValid = false;
    }
    
    if (isValid) {
        // Aqui você pode adicionar a lógica para enviar o formulário
        showSuccessMessage();
        form.reset();
    }
    
    return false;
}

function showError(fieldName, message) {
    const field = document.querySelector(`[name="${fieldName}"]`);
    const formGroup = field.closest('.form-group');
    
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message';
    errorDiv.style.color = 'var(--error-color)';
    errorDiv.style.fontSize = '0.875rem';
    errorDiv.style.marginTop = '0.25rem';
    errorDiv.textContent = message;
    
    formGroup.appendChild(errorDiv);
    field.style.borderColor = 'var(--error-color)';
}

function clearErrors() {
    document.querySelectorAll('.error-message').forEach(el => el.remove());
    document.querySelectorAll('.form-group input, .form-group textarea').forEach(el => {
        el.style.borderColor = 'var(--border-color)';
    });
}

function showSuccessMessage() {
    const successDiv = document.createElement('div');
    successDiv.className = 'success-message';
    successDiv.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: var(--success-color);
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 0.5rem;
        box-shadow: var(--shadow-lg);
        z-index: 9999;
        animation: slideIn 0.3s ease-out;
    `;
    successDiv.textContent = 'Mensagem enviada com sucesso! Entraremos em contato em breve.';
    
    document.body.appendChild(successDiv);
    
    setTimeout(() => {
        successDiv.style.animation = 'slideOut 0.3s ease-out';
        setTimeout(() => successDiv.remove(), 300);
    }, 5000);
}

// Máscara para telefone
function phoneMask(input) {
    let value = input.value.replace(/\D/g, '');
    
    if (value.length <= 10) {
        value = value.replace(/(\d{2})(\d)/, '($1) $2');
        value = value.replace(/(\d{4})(\d)/, '$1-$2');
    } else {
        value = value.replace(/(\d{2})(\d)/, '($1) $2');
        value = value.replace(/(\d{5})(\d)/, '$1-$2');
    }
    
    input.value = value;
}

// Aplicar máscara ao campo de telefone
document.addEventListener('DOMContentLoaded', function() {
    const phoneInput = document.querySelector('[name="phone"]');
    if (phoneInput) {
        phoneInput.addEventListener('input', function() {
            phoneMask(this);
        });
    }
});

// Adicionar animações CSS
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);
