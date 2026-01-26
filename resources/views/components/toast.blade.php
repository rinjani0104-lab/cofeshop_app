<div class="toast-container" id="toastContainer"></div>

<style>
    .toast-container {
        position: fixed;
        top: 100px;
        right: 20px;
        z-index: 9999;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    
    .toast {
        background: white;
        border-left: 4px solid var(--brown);
        border-radius: 8px;
        padding: 15px 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        min-width: 300px;
        max-width: 350px;
        animation: slideInRight 0.3s ease;
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }
    
    .toast.success {
        border-left-color: #28a745;
    }
    
    .toast.error {
        border-left-color: #dc3545;
    }
    
    .toast.warning {
        border-left-color: #ffc107;
    }
    
    .toast.info {
        border-left-color: #17a2b8;
    }
    
    .toast-icon {
        font-size: 1.2rem;
        flex-shrink: 0;
        margin-top: 2px;
    }
    
    .toast.success .toast-icon {
        color: #28a745;
    }
    
    .toast.error .toast-icon {
        color: #dc3545;
    }
    
    .toast-content {
        flex-grow: 1;
    }
    
    .toast-title {
        font-weight: 600;
        margin-bottom: 5px;
        color: var(--brown-dark);
    }
    
    .toast-message {
        color: #666;
        font-size: 0.9rem;
        line-height: 1.4;
    }
    
    .toast-close {
        background: none;
        border: none;
        color: #999;
        font-size: 1.2rem;
        cursor: pointer;
        padding: 0;
        margin-left: 10px;
        transition: color 0.3s ease;
    }
    
    .toast-close:hover {
        color: var(--brown-dark);
    }
    
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
    
    @media (max-width: 576px) {
        .toast-container {
            left: 20px;
            right: 20px;
            top: 80px;
        }
        
        .toast {
            min-width: auto;
            width: 100%;
        }
    }
</style>

<script>
    class Toast {
        static show({title, message, type = 'info', duration = 5000}) {
            const container = document.getElementById('toastContainer');
            if (!container) return;
            
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;
            
            const icons = {
                success: 'bi-check-circle-fill',
                error: 'bi-x-circle-fill',
                warning: 'bi-exclamation-triangle-fill',
                info: 'bi-info-circle-fill'
            };
            
            toast.innerHTML = `
                <i class="bi ${icons[type] || icons.info} toast-icon"></i>
                <div class="toast-content">
                    ${title ? `<div class="toast-title">${title}</div>` : ''}
                    <div class="toast-message">${message}</div>
                </div>
                <button class="toast-close" aria-label="Close">
                    <i class="bi bi-x"></i>
                </button>
            `;
            
            container.appendChild(toast);
            
            // Auto remove after duration
            const timer = setTimeout(() => {
                this.removeToast(toast);
            }, duration);
            
            // Close button
            toast.querySelector('.toast-close').addEventListener('click', () => {
                clearTimeout(timer);
                this.removeToast(toast);
            });
            
            return toast;
        }
        
        static removeToast(toast) {
            toast.style.animation = 'slideOutRight 0.3s ease forwards';
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.parentNode.removeChild(toast);
                }
            }, 300);
        }
        
        static success(message, title = 'Success') {
            return this.show({title, message, type: 'success'});
        }
        
        static error(message, title = 'Error') {
            return this.show({title, message, type: 'error'});
        }
        
        static warning(message, title = 'Warning') {
            return this.show({title, message, type: 'warning'});
        }
        
        static info(message, title = 'Info') {
            return this.show({title, message, type: 'info'});
        }
    }
    
    // Make Toast globally available
    window.Toast = Toast;
    
    // Example usage:
    // Toast.success('Item added to cart successfully!');
    // Toast.error('Failed to process order. Please try again.');
</script>