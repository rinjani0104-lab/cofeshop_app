<div class="modal fade" id="mainModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Content will be loaded here -->
            </div>
            <div class="modal-footer" id="modalFooter">
                <button type="button" class="btn btn-outline-brown" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-brown" id="modalActionBtn">Confirm</button>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-content {
        border-radius: 15px;
        border: none;
        box-shadow: 0 10px 40px rgba(60, 42, 33, 0.15);
        overflow: hidden;
    }
    
    .modal-header {
        background: linear-gradient(135deg, var(--brown-dark), var(--brown));
        color: white;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        padding: 20px 30px;
    }
    
    .modal-title {
        font-weight: 600;
        font-size: 1.2rem;
    }
    
    .modal-header .btn-close {
        background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
        opacity: 0.8;
        transition: opacity 0.3s ease;
    }
    
    .modal-header .btn-close:hover {
        opacity: 1;
    }
    
    .modal-body {
        padding: 30px;
        color: var(--brown-dark);
        line-height: 1.6;
    }
    
    .modal-footer {
        border-top: 1px solid var(--cream);
        padding: 20px 30px;
        background: #faf9f7;
    }
    
    /* Custom modal sizes */
    .modal-sm .modal-content {
        max-width: 400px;
        margin: 0 auto;
    }
    
    .modal-lg .modal-content {
        max-width: 800px;
    }
    
    .modal-xl .modal-content {
        max-width: 1140px;
    }
    
    /* Animation */
    .modal.fade .modal-dialog {
        transform: translateY(-50px) scale(0.95);
        transition: all 0.3s ease;
    }
    
    .modal.show .modal-dialog {
        transform: translateY(0) scale(1);
    }
    
    /* Modal types */
    .modal.success .modal-header {
        background: linear-gradient(135deg, #28a745, #20c997);
    }
    
    .modal.error .modal-header {
        background: linear-gradient(135deg, #dc3545, #fd7e14);
    }
    
    .modal.warning .modal-header {
        background: linear-gradient(135deg, #ffc107, #fd7e14);
    }
    
    .modal.info .modal-header {
        background: linear-gradient(135deg, #17a2b8, #20c997);
    }
</style>

<script>
    class CustomModal {
        constructor() {
            this.modal = new bootstrap.Modal(document.getElementById('mainModal'));
            this.modalElement = document.getElementById('mainModal');
        }
        
        show({title, body, type = 'default', size = '', showClose = true, showAction = true, actionText = 'Confirm', onAction = null}) {
            // Set title
            document.getElementById('modalTitle').textContent = title;
            
            // Set body
            const modalBody = document.getElementById('modalBody');
            if (typeof body === 'string') {
                modalBody.innerHTML = body;
            } else if (body instanceof HTMLElement) {
                modalBody.innerHTML = '';
                modalBody.appendChild(body);
            }
            
            // Set type
            this.modalElement.className = `modal fade ${type} ${size}`;
            
            // Configure footer
            const footer = document.getElementById('modalFooter');
            const closeBtn = footer.querySelector('[data-bs-dismiss="modal"]');
            const actionBtn = document.getElementById('modalActionBtn');
            
            closeBtn.style.display = showClose ? '' : 'none';
            actionBtn.style.display = showAction ? '' : 'none';
            actionBtn.textContent = actionText;
            
            // Handle action button
            actionBtn.onclick = () => {
                if (onAction) {
                    onAction();
                }
                this.hide();
            };
            
            // Show modal
            this.modal.show();
            
            return new Promise((resolve) => {
                this.modalElement.addEventListener('hidden.bs.modal', () => resolve(false), { once: true });
                actionBtn.addEventListener('click', () => resolve(true), { once: true });
            });
        }
        
        hide() {
            this.modal.hide();
        }
        
        // Helper methods
        confirm(message, title = 'Please Confirm') {
            return this.show({
                title,
                body: `<p>${message}</p>`,
                type: 'warning',
                actionText: 'Yes, Continue'
            });
        }
        
        alert(message, title = 'Information') {
            return this.show({
                title,
                body: `<p>${message}</p>`,
                type: 'info',
                showAction: false
            });
        }
        
        success(message, title = 'Success!') {
            return this.show({
                title,
                body: `<div class="text-center py-3">
                          <i class="bi bi-check-circle-fill text-success fs-1 mb-3"></i>
                          <p>${message}</p>
                       </div>`,
                type: 'success',
                actionText: 'OK'
            });
        }
        
        error(message, title = 'Error') {
            return this.show({
                title,
                body: `<div class="text-center py-3">
                          <i class="bi bi-x-circle-fill text-danger fs-1 mb-3"></i>
                          <p>${message}</p>
                       </div>`,
                type: 'error',
                actionText: 'OK'
            });
        }
        
        // Form modal
        form(title, formHTML, onSubmit) {
            const form = document.createElement('form');
            form.innerHTML = formHTML;
            
            return this.show({
                title,
                body: form,
                onAction: () => {
                    if (onSubmit) {
                        onSubmit(new FormData(form));
                    }
                }
            });
        }
    }
    
    // Initialize modal globally
    const Modal = new CustomModal();
    window.Modal = Modal;
    
    // Example usage:
    // Modal.confirm('Are you sure you want to delete this item?');
    // Modal.success('Order placed successfully!');
    // const result = await Modal.form('Add Item', '<input type="text" class="form-control">', (data) => {...});
</script>