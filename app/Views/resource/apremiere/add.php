<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Thêm phim mới </h3>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="post" action="/premiere/create" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Tên Phim (Movie Name)</label>
                                    <input type="text" class="form-control" id="exampleInputName1" placeholder="" name="name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Link ảnh (Thumb Url)</label>
                                    <input type="text" class="form-control" id="exampleInputName1" placeholder="" name="thumb_url">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Tên chính thức (Official Name)</label>
                                    <input type="text" class="form-control" id="exampleInputEmail3" placeholder="" name="origin_name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Năm phát hành (Year)</label>
                                    <input type="text" class="form-control" id="exampleInputEmail3" placeholder="" name="year">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Thời lượng (Time)</label>
                                    <input type="text" class="form-control" id="exampleInputEmail3" placeholder="" name="time">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Slug Phim (Slug)</label>
                                    <input type="text" class="form-control" id="exampleInputEmail3" placeholder="" name="slug">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Phụ đề (Lang)</label>
                                    <input type="text" class="form-control" id="exampleInputEmail3" placeholder="" name="lang">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Chất lượng (Quality)</label>
                                    <input type="text" class="form-control" id="exampleInputEmail3" placeholder="" name="quality">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleSelectStatus">Trạng thái (Status)</label>
                                    <select class="form-control" id="exampleSelectStatus" name="status">
                                        <option>Đang chiếu</option>
                                        <option>Tạm ngưng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleSelectGenre">Thể loại (Category)</label>
                                    <select class="form-control" id="exampleSelectGenre" name="category">
                                        <option>Hành động</option>
                                        <option>Hoạt hình</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Quốc gia (Country)</label>
                                    <input type="text" class="form-control" id="exampleInputEmail3" placeholder="" name="country">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Đường dẫn phim (Link Embed)</label>
                                    <input type="text" class="form-control" id="exampleInputEmail3" placeholder="" name="link_embed">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Mô tả (Content)</label>
                                    <input type="text" class="form-control" id="exampleInputEmail3" placeholder="" name="content">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Lưu</button>
                        <a href="/premiere/" class="btn btn-dark">Trở về</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace('content');
</script>