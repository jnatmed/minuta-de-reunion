document.addEventListener('DOMContentLoaded', function() {
    const dropZone = document.getElementById('drop-zone');
    const fileInput = document.getElementById('file-input');
    
    dropZone.addEventListener('click', () => fileInput.click());
    
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('dragover');
    });
    
    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('dragover');
    });
    
    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('dragover');
    
        const files = e.dataTransfer.files;
        if (files.length) {
            fileInput.files = files;
            dropZone.textContent = files[0].name;
        }
    });
    
    fileInput.addEventListener('change', () => {
        if (fileInput.files.length) {
            dropZone.textContent = fileInput.files[0].name;
        }
    });
})