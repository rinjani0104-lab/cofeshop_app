<div class="loading-overlay" id="loadingOverlay">
    <div class="loading-spinner">
        <div class="spinner-border text-brown" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="loading-text mt-3">Loading...</div>
    </div>
</div>

<style>
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 251, 245, 0.9);
        backdrop-filter: blur(5px);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }
    
    .loading-overlay.show {
        opacity: 1;
        visibility: visible;
    }
    
    .loading-spinner {
        text-align: center;
        animation: fadeIn 0.3s ease;
    }
    
    .spinner-border {
        width: 3rem;
        height: 3rem;
        border-width: 0.25em;
    }
    
    .loading-text {
        color: var(--brown);
        font-weight: 500;
        letter-spacing: 1px;
        animation: pulse 1.5s ease-in-out infinite;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.5;
        }
    }
    
    /* Coffee-themed spinner alternative */
    .coffee-spinner {
        width: 60px;
        height: 60px;
        position: relative;
    }
    
    .coffee-spinner::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 4px solid rgba(92, 61, 46, 0.1);
        border-top-color: var(--brown);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
    
    .coffee-spinner::after {
        content: '☕';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 20px;
        color: var(--brown);
        animation: bounce 1s ease-in-out infinite;
    }
    
    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }
    
    @keyframes bounce {
        0%, 100% {
            transform: translate(-50%, -50%) scale(1);
        }
        50% {
            transform: translate(-50%, -50%) scale(1.1);
        }
    }
</style>

<script>
    class Loading {
        static show(message = 'Loading...') {
            let overlay = document.getElementById('loadingOverlay');
            
            if (!overlay) {
                overlay = document.createElement('div');
                overlay.className = 'loading-overlay';
                overlay.id = 'loadingOverlay';
                overlay.innerHTML = `
                    <div class="loading-spinner">
                        <div class="coffee-spinner"></div>
                        <div class="loading-text">${message}</div>
                    </div>
                `;
                document.body.appendChild(overlay);
            }
            
            const textElement = overlay.querySelector('.loading-text');
            if (textElement && message) {
                textElement.textContent = message;
            }
            
            setTimeout(() => {
                overlay.classList.add('show');
            }, 10);
            
            return overlay;
        }
        
        static hide() {
            const overlay = document.getElementById('loadingOverlay');
            if (overlay) {
                overlay.classList.remove('show');
                setTimeout(() => {
                    if (overlay.parentNode) {
                        overlay.parentNode.removeChild(overlay);
                    }
                }, 300);
            }
        }
        
        static async wrap(promise, message = 'Loading...') {
            this.show(message);
            try {
                const result = await promise;
                this.hide();
                return result;
            } catch (error) {
                this.hide();
                throw error;
            }
        }
    }
    
    // Make Loading globally available
    window.Loading = Loading;
    
    // Example usage:
    // Loading.show('Processing order...');
    // Loading.hide();
    // await Loading.wrap(fetch('/api/data'), 'Loading data...');
</script>