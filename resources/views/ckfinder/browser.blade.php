<!DOCTYPE html>
<html>
<head>
    <title>CKFinder Browser</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .upload-area { 
            border: 2px dashed #ccc; 
            padding: 20px; 
            text-align: center; 
            margin-bottom: 20px; 
        }
        .image-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 10px; }
        .image-item { border: 1px solid #ddd; padding: 10px; text-align: center; cursor: pointer; }
        .image-item:hover { background-color: #f0f0f0; }
        .image-item img { max-width: 100px; max-height: 100px; }
    </style>
</head>
<body>
    <h2>CKFinder - Select Image</h2>
    
    <div class="upload-area">
        <input type="file" id="fileInput" accept="image/*" style="display: none;">
        <button onclick="document.getElementById('fileInput').click()">Upload New Image</button>
        <p>Or drag and drop images here</p>
    </div>
    
    <div class="image-grid" id="imageGrid">
        <!-- Images will be loaded here -->
    </div>
    
    <script>
        // Upload functionality
        document.getElementById('fileInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                uploadFile(file);
            }
        });
        
        function uploadFile(file) {
            const formData = new FormData();
            formData.append('upload', file);
            
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            fetch('/ckfinder/connector?command=QuickUpload&type=Images', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': token
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.uploaded) {
                    addImageToGrid(data.url, data.fileName);
                    if (window.opener && window.opener.SetUrl) {
                        window.opener.SetUrl(data.url);
                        window.close();
                    }
                } else {
                    alert('Upload failed: ' + (data.error ? data.error.message : 'Unknown error'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Upload failed');
            });
        }
        
        function addImageToGrid(url, filename) {
            const imageGrid = document.getElementById('imageGrid');
            const imageItem = document.createElement('div');
            imageItem.className = 'image-item';
            imageItem.onclick = function() {
                if (window.opener && window.opener.SetUrl) {
                    window.opener.SetUrl(url);
                    window.close();
                }
            };
            
            imageItem.innerHTML = `
                <img src="${url}" alt="${filename}">
                <p>${filename}</p>
            `;
            
            imageGrid.appendChild(imageItem);
        }
        
        // Load existing images (optional)
        // You can implement this to show existing uploaded images
    </script>
</body>
</html>