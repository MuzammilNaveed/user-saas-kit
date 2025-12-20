import axios from 'axios';

class MediaUploader {
    constructor() {
        this.fileQueue = [];
        this.init();
    }

    init() {
        this.dropzone = document.getElementById('media-dropzone');
        this.fileInput = document.getElementById('media-file-input');
        this.uploadBtn = document.getElementById('media-upload-action-btn');
        this.previewContainer = document.getElementById('media-preview-container');
        this.emptyState = document.getElementById('media-empty-state');
        this.previewState = document.getElementById('media-preview-state');
        this.addMoreInput = document.getElementById('media-add-more-input');
        this.urlInput = document.getElementById('media-url-input');
        this.urlBtn = document.getElementById('media-url-btn');

        if (!this.dropzone) return; 

        this.attachEvents();
    }

    attachEvents() {
        // Drag & Drop
        this.dropzone.addEventListener('dragover', (e) => {
            e.preventDefault();
            this.dropzone.classList.add('border-primary', 'bg-primary/5');
        });

        this.dropzone.addEventListener('dragleave', (e) => {
            e.preventDefault();
            this.dropzone.classList.remove('border-primary', 'bg-primary/5');
        });

        this.dropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            this.dropzone.classList.remove('border-primary', 'bg-primary/5');
            this.handleFiles(e.dataTransfer.files);
        });

        // File Inputs
        this.fileInput.addEventListener('change', (e) => this.handleFiles(e.target.files));
        if (this.addMoreInput) {
            this.addMoreInput.addEventListener('change', (e) => this.handleFiles(e.target.files));
        }

        // Upload Button
        if (this.uploadBtn) {
            this.uploadBtn.addEventListener('click', () => this.uploadQueue());
        }
        
        // URL Import
        if (this.urlBtn && this.urlInput) {
            this.urlBtn.addEventListener('click', () => this.importFromUrl());
        }
    }

    handleFiles(files) {
        if (!files.length) return;

        Array.from(files).forEach(file => {
            if (file.type.startsWith('image/')) {
                // Check if already in queue by name + size
                const exists = this.fileQueue.some(f => f.name === file.name && f.size === file.size);
                if (!exists) {
                    this.fileQueue.push(file);
                }
            }
        });

        this.renderPreviews();
    }
    
    importFromUrl() {
        const url = this.urlInput.value;
        if (!url) return;
        
        // For queueing URLs, we'll store them as objects with a type
        this.fileQueue.push({
            type: 'url',
            name: url, // Simplified name
            url: url,
            isUrl: true
        });
        
        this.urlInput.value = '';
        this.renderPreviews();
    }

    renderPreviews() {
        if (this.fileQueue.length === 0) {
            this.emptyState.style.display = 'block';
            this.previewState.style.display = 'none';
            // Disable upload button if queue is empty
            if (this.uploadBtn) this.uploadBtn.disabled = true;
            return;
        }

        this.emptyState.style.display = 'none';
        this.previewState.style.display = 'block';
        if (this.uploadBtn) this.uploadBtn.disabled = false;

        this.previewContainer.innerHTML = '';
        
        // Update count
        const countSpan = document.getElementById('media-file-count');
        const countLabel = document.getElementById('media-file-count-label');
        if (countSpan) countSpan.textContent = this.fileQueue.length;
        if (countLabel) countLabel.textContent = this.fileQueue.length;

        this.fileQueue.forEach((item, index) => {
            const wrapper = document.createElement('div');
            wrapper.className = 'group relative aspect-square rounded-lg overflow-hidden border border-gray-200 bg-gray-50';

            const img = document.createElement('img');
            img.className = 'w-full h-full object-cover';
            
            if (item.isUrl) {
                img.src = item.url;
            } else {
                const reader = new FileReader();
                reader.onload = (e) => img.src = e.target.result;
                reader.readAsDataURL(item);
            }

            const removeBtn = document.createElement('button');
            removeBtn.className = 'absolute top-1 right-1 w-5 h-5 flex items-center justify-center bg-black text-white rounded-full opacity-100 shadow-sm hover:bg-gray-800 transition-colors z-10';
            removeBtn.innerHTML = `<svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>`;
            removeBtn.onclick = (e) => {
                e.stopPropagation();
                this.removeFile(index);
            };

            wrapper.appendChild(img);
            wrapper.appendChild(removeBtn);
            this.previewContainer.appendChild(wrapper);
        });
    }

    removeFile(index) {
        this.fileQueue.splice(index, 1);
        this.renderPreviews();
    }

    async uploadQueue() {
        if (this.fileQueue.length === 0) return;

        this.setLoading(true);

        const uploadPromises = this.fileQueue.map(item => {
            if (item.isUrl) {
                return axios.post('/media', { url: item.url });
            } else {
                const formData = new FormData();
                formData.append('file', item);
                return axios.post('/media', formData, {
                    headers: { 'Content-Type': 'multipart/form-data' }
                });
            }
        });

        try {
            const results = await Promise.allSettled(uploadPromises);
            
            // Check for failures
            const failures = results.filter(r => r.status === 'rejected');
            if (failures.length > 0) {
                console.error('Some uploads failed', failures);
                alert('Some files failed to upload.');
            } else {
                // Success
                this.fileQueue = [];
                this.renderPreviews();
                // Close modal or show success message?
                // Let's reload page to show new media in the grid behind
                window.location.reload();
            }
        } catch (error) {
            console.error('Upload error:', error);
            alert('An unexpected error occurred during upload.');
        } finally {
            this.setLoading(false);
        }
    }

    setLoading(loading) {
        if (this.uploadBtn) {
            this.uploadBtn.disabled = loading;
            const textSpan = this.uploadBtn.querySelector('.btn-text');
            const loader = this.uploadBtn.querySelector('.btn-loader');
            
            if (textSpan && loader) {
                textSpan.style.display = loading ? 'none' : 'inline';
                loader.style.display = loading ? 'inline' : 'none';
            }
        }
    }
}

// Initialize on window load or when ready
document.addEventListener('DOMContentLoaded', () => {
   window.mediaUploader = new MediaUploader();
});

// Also export for manual init if needed
export default MediaUploader;
