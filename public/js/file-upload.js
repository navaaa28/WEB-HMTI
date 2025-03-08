class FileUploader {
    constructor(options = {}) {
        this.options = {
            chunkSize: 1024 * 1024, // 1MB chunks
            maxRetries: 3,
            retryDelay: 1000,
            onProgress: null,
            onSuccess: null,
            onError: null,
            onCancel: null,
            ...options
        };

        this.uploadId = null;
        this.file = null;
        this.totalChunks = 0;
        this.uploadedChunks = 0;
        this.retryCount = 0;
        this.isUploading = false;
        this.shouldCancel = false;
    }

    async upload(file) {
        if (this.isUploading) {
            throw new Error('Upload already in progress');
        }

        this.file = file;
        this.isUploading = true;
        this.shouldCancel = false;

        try {
            // Start upload session
            const startResponse = await this.startUpload();
            this.uploadId = startResponse.uploadId;
            this.totalChunks = Math.ceil(file.size / this.options.chunkSize);

            // Upload chunks
            for (let i = 0; i < this.totalChunks; i++) {
                if (this.shouldCancel) {
                    await this.cancelUpload();
                    if (this.options.onCancel) {
                        this.options.onCancel();
                    }
                    return;
                }

                await this.uploadChunk(i);
                this.uploadedChunks++;

                // Update progress
                const progress = (this.uploadedChunks / this.totalChunks) * 100;
                if (this.options.onProgress) {
                    this.options.onProgress(progress);
                }
            }

            // Check final status
            const progress = await this.getProgress();
            if (progress.status === 'completed') {
                if (this.options.onSuccess) {
                    this.options.onSuccess(progress);
                }
            } else {
                throw new Error('Upload failed');
            }

        } catch (error) {
            if (this.options.onError) {
                this.options.onError(error);
            }
        } finally {
            this.isUploading = false;
        }
    }

    async startUpload() {
        const response = await fetch('/api/upload/start', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                fileName: this.file.name,
                totalSize: this.file.size
            })
        });

        if (!response.ok) {
            throw new Error('Failed to start upload');
        }

        return await response.json();
    }

    async uploadChunk(chunkIndex) {
        const start = chunkIndex * this.options.chunkSize;
        const end = Math.min(start + this.options.chunkSize, this.file.size);
        const chunk = this.file.slice(start, end);

        const formData = new FormData();
        formData.append('chunk', chunk);
        formData.append('uploadId', this.uploadId);
        formData.append('chunkIndex', chunkIndex);

        const response = await fetch('/api/upload/chunk', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData
        });

        if (!response.ok) {
            throw new Error('Failed to upload chunk');
        }

        const result = await response.json();
        if (!result.success) {
            throw new Error(result.message);
        }

        return result;
    }

    async getProgress() {
        const response = await fetch(`/api/upload/progress?uploadId=${this.uploadId}`, {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        });

        if (!response.ok) {
            throw new Error('Failed to get progress');
        }

        const result = await response.json();
        if (!result.success) {
            throw new Error(result.message);
        }

        return result.progress;
    }

    async cancelUpload() {
        if (!this.uploadId) {
            return;
        }

        const response = await fetch('/api/upload/cancel', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                uploadId: this.uploadId
            })
        });

        if (!response.ok) {
            throw new Error('Failed to cancel upload');
        }

        return await response.json();
    }

    cancel() {
        this.shouldCancel = true;
    }
}

// Example usage:
document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.querySelector('input[type="file"]');
    const progressBar = document.querySelector('.progress-bar');
    const progressText = document.querySelector('.progress-text');
    const cancelButton = document.querySelector('.cancel-upload');

    if (fileInput) {
        const uploader = new FileUploader({
            onProgress: (progress) => {
                if (progressBar) {
                    progressBar.style.width = `${progress}%`;
                }
                if (progressText) {
                    progressText.textContent = `${Math.round(progress)}%`;
                }
            },
            onSuccess: (result) => {
                console.log('Upload completed:', result);
                // Handle success (e.g., show success message, update UI)
            },
            onError: (error) => {
                console.error('Upload failed:', error);
                // Handle error (e.g., show error message)
            },
            onCancel: () => {
                console.log('Upload cancelled');
                // Handle cancellation (e.g., reset UI)
            }
        });

        fileInput.addEventListener('change', async (e) => {
            const file = e.target.files[0];
            if (file) {
                try {
                    await uploader.upload(file);
                } catch (error) {
                    console.error('Upload error:', error);
                }
            }
        });

        if (cancelButton) {
            cancelButton.addEventListener('click', () => {
                uploader.cancel();
            });
        }
    }
}); 