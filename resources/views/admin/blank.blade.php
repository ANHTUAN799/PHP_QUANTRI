<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Quản trị</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- CKEditor 5 Classic từ CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    
    <style>
        body { 
            background: #ecf0f1; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
        }
        
        /* Header */
        .main-header {
            background: linear-gradient(135deg, #3498db 0%, #2ecc71 100%);
            color: white;
            padding: 15px 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .main-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        
        .user-info {
            text-align: right;
            color: white;
        }
        
        /* Sidebar */
        .main-sidebar {
            background: #2c3e50;
            position: fixed;
            top: 70px;
            left: 0;
            width: 250px;
            height: calc(100vh - 70px);
            overflow-y: auto;
            z-index: 999;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar-menu li {
            border-bottom: 1px solid #34495e;
        }
        
        .sidebar-menu li a {
            display: block;
            padding: 15px 20px;
            color: #bdc3c7;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .sidebar-menu li a:hover,
        .sidebar-menu li.active a {
            background: #34495e;
            color: #3498db;
            text-decoration: none;
        }
        
        .sidebar-menu li a i {
            margin-right: 10px;
            width: 20px;
        }
        
        /* Content */
        .content-wrapper {
            margin-left: 250px;
            margin-top: 70px;
            padding: 20px;
            min-height: calc(100vh - 90px);
        }
        
        .content-header h1 { 
            margin: 15px 0; 
            color: #2c3e50;
        }
        
        .box { 
            background: #fff; 
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            overflow: hidden;
        }
        
        .box-header { 
            padding: 15px 20px; 
            border-bottom: 1px solid #ecf0f1;
            background: #f8f9fa;
        }
        
        .box-header h3 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }
        
        .box-body { 
            padding: 20px; 
        }
        
        .box-danger .box-header { 
            background: #e74c3c;
            color: white;
            border-left: 5px solid #c0392b; 
        }
        
        .box-info .box-header { 
            background: #3498db;
            color: white;
            border-left: 5px solid #2980b9; 
        }
        
        .box-primary .box-header { 
            background: #9b59b6;
            color: white;
            border-left: 5px solid #8e44ad; 
        }
        
        .box-success .box-header {
            background: #27ae60;
            color: white;
            border-left: 5px solid #229954;
        }
        
        label a { 
            font-weight: 600; 
        }
        
        .form-group { 
            margin-bottom: 20px; 
        }
        
        .form-control {
            border-radius: 4px;
            border: 1px solid #ddd;
            padding: 10px;
        }
        
        .btn {
            border-radius: 4px;
            padding: 8px 16px;
        }
        
        .btn-primary {
            background: #3498db;
            border-color: #2980b9;
        }
        
        .btn-info {
            background: #17a2b8;
            border-color: #138496;
        }
        
        /* AI Button */
        .vietbaiAITuDong {
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 11px;
            margin-left: 10px;
        }
        
        .vietbaiAITuDong:hover {
            background: linear-gradient(45deg, #ff5252, #26c6da);
            color: white;
        }
        
        .huongdan {
            font-weight: normal;
            color: #7f8c8d;
            font-size: 12px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .main-sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }
            
            .main-sidebar.show {
                transform: translateX(0);
            }
            
            .content-wrapper {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="main-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fa fa-cogs"></i> Software CRM</h1>
                </div>
                <div class="col-md-6">
                    <div class="user-info">
                        <i class="fa fa-user"></i> Đỗ Thị Hồng Huệ
                        <div style="font-size: 12px; opacity: 0.8;">demodenmay.125.atoz.vn</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <aside class="main-sidebar">
        <ul class="sidebar-menu">
            <li class="active">
                <a href="/admin/blank.asp">
                    <i class="fa fa-home"></i> Home
                </a>
            </li>
            <li>
                <a href="/admin/account">
                    <i class="fa fa-users"></i> Tài khoản quản trị
                </a>
            </li>
            <li>
                <a href="/admin/website">
                    <i class="fa fa-globe"></i> Cấu hình web
                </a>
            </li>
            <li>
                <a href="/admin/content">
                    <i class="fa fa-edit"></i> Quản trị web
                </a>
            </li>
            <li>
                <a href="#" onclick="toggleSearchFunction()">
                    <i class="fa fa-search"></i> Tìm chức năng
                </a>
            </li>
        </ul>
        
        <!-- Search function (ẩn/hiện) -->
        <div id="searchFunction" style="display: none; padding: 15px; background: #34495e;">
            <input type="text" class="form-control" placeholder="Tìm chức năng..." style="font-size: 12px;">
        </div>
    </aside>

    <!-- Content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="col-md-12">
                <h1>Quản trị dữ liệu trên web</h1>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="">Soạn thảo</h3>
                            </div>
                            <div class="box-body">
                                <form class="form-horizontal" onsubmit="return false;">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tên (Title)</label>
                                        <div class="col-sm-10">
                                            <input name="CatName" class="form-control TieuDeBV" maxlength="150" 
                                                   placeholder="Nhập tiêu đề..." value="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Hình đại diện</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input id="xFilePath" name="Thumbnail" maxlength="150" class="form-control" 
                                                       placeholder="Đường dẫn hình..." value="">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-info btn-flat" type="button" onclick="openImageSelector()">
                                                        <i class="fa fa-folder-open"></i> Chọn file
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ChiTiet">
                                        <label class="col-sm-12">
                                            Chi tiết
                                            <span class="huongdan">
                                                Bạn có thể sử dụng 
                                                <button type="button" class="vietbaiAITuDong" onclick="generateAIContent()">
                                                    <i class="fa fa-comments"></i> AI ChatGPT viết nội dung
                                                </button>
                                            </span>
                                        </label>
                                        <div class="col-sm-12">
                                            <div id="editor"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="box box-danger">
                            <div class="box-header">
                                <h3 class="">Hợp đồng và các thông tin hỗ trợ</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-xs-2">
                                        <a href="/admin/quanlywebsite/dichvu/list.asp">Thông tin dịch vụ</a>
                                    </label>
                                    <div class="col-xs-10">
                                        Kiểm tra hợp đồng, thời gian hiệu lực và các thông tin khác của hợp đồng
                                    </div>
                                </div>
                                <div class="form-group has-error">
                                    <label class="col-xs-2">
                                        <a href="/admin/quanlywebsite/yeucau/list.asp">Hỗ trợ khách hàng</a>
                                    </label>
                                    <div class="col-xs-10">
                                        Gặp khó khăn hoặc có yêu cầu sửa đổi trang web, hãy vào mục hỗ trợ khách hàng và gửi yêu cầu cho Choixanh.net
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box box-info">
                            <div class="box-header">
                                <h3 class="">Dữ liệu hiển thị trên web</h3>
                            </div>
                            <div class="box-body">
                                <p>Những gì hiển thị trên web đều có trong mục Cấu hình banner và Quản trị nội dung</p>
                                <div class="form-group has-success">
                                    <label class="col-xs-2">
                                        <a href="/admin/quanlywebsite/bannerchinh/form.asp">Cấu hình banner</a>
                                    </label>
                                    <div class="col-xs-10">
                                        Cấu hình banner, logo, cũng như các thông tin cuối trang web như địa chỉ, bản quyền
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-2">
                                        <a href="/admin/part/parent/list.asp">Quản trị nội dung</a>
                                    </label>
                                    <div class="col-xs-10">
                                        Tất cả bài viết, nút bấm... trên web đều có trong quản trị nội dung. Có thể xem liên hệ, thành viên trong các nút bấm nếu được cấu hình
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="">Giao diện web</h3>
                            </div>
                            <div class="box-body">
                                <p>Chỉnh sửa giao diện web dành cho người dùng nâng cao trong
                                    <a href="/admin/cauhinhnangcao/html/form.asp">Quản lý thẻ html</a></p>
                                <div class="form-group">
                                    <label class="col-xs-2">CSS</label>
                                    <div class="col-xs-10">
                                        Viết thêm CSS để web hiển thị màu sắc, độ rộng, chiều cao...
                                    </div>
                                </div>
                                <div class="form-group has-error">
                                    <label class="col-xs-2">HTML head</label>
                                    <div class="col-xs-10">
                                        Thêm html vào thẻ head của trang web
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-2">HTML body top</label>
                                    <div class="col-xs-10">
                                        Thêm html vào đầu trang sau thẻ body của trang web
                                    </div>
                                </div>
                                <div class="form-group has-error">
                                    <label class="col-xs-2">HTML body bottom</label>
                                    <div class="col-xs-10">
                                        Thêm html vào cuối trang trước đóng thẻ body của trang web, nếu thêm bớt jquery hoặc javascript nên thêm tại khu vực này
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        function openImageSelector() {
            CKFinder.popup({
                chooseFiles: true,
                onInit: function(finder) {
                    finder.on('files:choose', function(evt) {
                        var file = evt.data.files.first();
                        document.getElementById('xFilePath').value = file.getUrl();
                    });
                    finder.on('file:choose:resizedImage', function(evt) {
                        document.getElementById('xFilePath').value = evt.data.resizedUrl;
                    });
                }
            });
        }

        function generateAIContent() {
            alert('Tính năng AI ChatGPT đang được phát triển!');
        }

        function toggleSearchFunction() {
            var searchDiv = document.getElementById('searchFunction');
            if (searchDiv.style.display === 'none') {
                searchDiv.style.display = 'block';
            } else {
                searchDiv.style.display = 'none';
            }
        }

        // Custom Upload Adapter cho CKEditor 5 với CSRF token
        class MyUploadAdapter {
            constructor(loader) {
                this.loader = loader;
            }

            upload() {
                return this.loader.file.then(file => new Promise((resolve, reject) => {
                    this._initRequest();
                    this._initListeners(resolve, reject, file);
                    this._sendRequest(file);
                }));
            }

            abort() {
                if (this.xhr) {
                    this.xhr.abort();
                }
            }

            _initRequest() {
                const xhr = this.xhr = new XMLHttpRequest();
                // Chuyển về CKFinder connector 
                xhr.open('POST', '/ckfinder/connector?command=QuickUpload&type=Images', true);
                
                // Thêm CSRF token
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }

            _initListeners(resolve, reject, file) {
                const xhr = this.xhr;
                const loader = this.loader;
                const genericErrorText = `Couldn't upload file: ${file.name}.`;

                xhr.addEventListener('error', () => {
                    console.error('Upload error');
                    reject(genericErrorText);
                });
                
                xhr.addEventListener('abort', () => {
                    console.log('Upload aborted');
                    reject();
                });
                
                xhr.addEventListener('load', () => {
                    if (xhr.status !== 200) {
                        return reject(`HTTP Error: ${xhr.status}`);
                    }
                    try {
                        const response = JSON.parse(xhr.responseText);
                        if (response.uploaded === 1) {
                            let imageUrl = response.url;

                            // Thay http://localhost thành domain hiện tại
                            imageUrl = imageUrl.replace(/^http:\/\/localhost(:\d+)?/, window.location.origin);

                            // Dùng URL object để chuẩn hóa path
                            try {
                                const urlObj = new URL(imageUrl);
                                urlObj.pathname = urlObj.pathname.replace(/\/{2,}/g, '/');
                                imageUrl = urlObj.href;
                            } catch (e) {
                                console.warn("URL parse error, fallback:", e);
                            }

                            resolve({ default: imageUrl });
                        } else {
                            reject(response.error ? response.error.message : 'Upload failed');
                        }
                    } catch (e) {
                        // Trường hợp CKFinder trả về dạng script callFunction(...)
                        const match = xhr.responseText.match(/callFunction\([^,]+,\s*"(.*?)"/);
                        if (match) {
                            let imageUrl = match[1];
                            imageUrl = imageUrl.replace(/^http:\/\/localhost(:\d+)?/, window.location.origin);
                            try {
                                const urlObj = new URL(imageUrl);
                                urlObj.pathname = urlObj.pathname.replace(/\/{2,}/g, '/');
                                imageUrl = urlObj.href;
                            } catch (e) {}
                            resolve({ default: imageUrl });
                        } else {
                            reject('Invalid response format');
                        }
                    }
                });

                if (xhr.upload) {
                    xhr.upload.addEventListener('progress', evt => {
                        if (evt.lengthComputable) {
                            loader.uploadTotal = evt.total;
                            loader.uploaded = evt.loaded;
                        }
                    });
                }
            }

            _sendRequest(file) {
                const data = new FormData();
                data.append('upload', file);
                console.log('Sending file:', file.name);
                this.xhr.send(data);
            }
        }

        function MyCustomUploadAdapterPlugin(editor) {
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                return new MyUploadAdapter(loader);
            };
        }

        // Khởi tạo CKEditor 5 Classic sau khi trang đã load
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    extraPlugins: [MyCustomUploadAdapterPlugin],
                    toolbar: [
                        'heading', '|', 
                        'bold', 'italic', 'link', 
                        'bulletedList', 'numberedList', 'blockQuote',
                        'insertTable', 'mediaEmbed', 
                        'imageUpload', 'undo', 'redo'
                    ]
                })
                .then(editor => {
                    window.editor = editor;
                    console.log('CKEditor 5 đã khởi tạo thành công!');
                })
                .catch(error => {
                    console.error('Lỗi khởi tạo CKEditor:', error);
                });
        });
    </script>

    <script src="{{ asset('js/ckfinder/ckfinder.js') }}"></script>
    @include('ckfinder::setup')
</body>
</html>